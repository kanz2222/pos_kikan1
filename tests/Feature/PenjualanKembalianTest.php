<?php

namespace Tests\Feature;

use App\Models\ItemPenjualan;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PenjualanKembalianTest extends TestCase
{
    use RefreshDatabase;

    public function test_cash_payment_calculates_change(): void
    {
        $role = Role::create(['name' => 'kasir']);
        $user = User::factory()->create([
            'role_id' => $role->id,
            'name' => 'Kasir Testing',
        ]);

        $sale = Penjualan::create([
            'user_id' => $user->id,
            'total_pembayaran' => 0,
            'metode_pembayaran' => 'CASH',
            'uang_diterima' => 0,
            'kembalian' => 0,
            'status' => 'OPEN',
        ]);

        $product = Produk::create([
            'user_id' => $user->id,
            'foto' => 'default.jpg',
            'nama' => 'Laptop Test',
            'harga_beli' => 40000,
            'harga_jual' => 50000,
            'stok' => 10,
        ]);

        ItemPenjualan::create([
            'penjualan_id' => $sale->id,
            'produk_id' => $product->id,
            'kuantitas' => 1,
            'harga_satuan' => 50000,
            'subtotal' => 50000,
        ]);

        $sale->refresh();
        $sale->update(['total_pembayaran' => $sale->itemPenjualan()->sum('subtotal')]);

        $response = $this->actingAs($user)
            ->from('/penjualan/' . $sale->id . '/edit')
            ->put('/penjualan/' . $sale->id, [
                'payment_method' => 'CASH',
                'uang_diterima' => 75000,
            ]);

        $response->assertRedirect(route('penjualan.index'));

        $sale->refresh();

        $this->assertSame('CASH', $sale->metode_pembayaran);
        $this->assertSame(75000, $sale->uang_diterima);
        $this->assertSame(25000, $sale->kembalian);
        $this->assertSame('COMPLETED', $sale->status);
    }

    public function test_cash_payment_rejects_insufficient_amount(): void
    {
        $role = Role::create(['name' => 'kasir']);
        $user = User::factory()->create([
            'role_id' => $role->id,
            'name' => 'Kasir Testing',
        ]);

        $sale = Penjualan::create([
            'user_id' => $user->id,
            'total_pembayaran' => 0,
            'metode_pembayaran' => 'CASH',
            'uang_diterima' => 0,
            'kembalian' => 0,
            'status' => 'OPEN',
        ]);

        $product = Produk::create([
            'user_id' => $user->id,
            'foto' => 'default.jpg',
            'nama' => 'Keyboard Test',
            'harga_beli' => 30000,
            'harga_jual' => 50000,
            'stok' => 10,
        ]);

        ItemPenjualan::create([
            'penjualan_id' => $sale->id,
            'produk_id' => $product->id,
            'kuantitas' => 1,
            'harga_satuan' => 50000,
            'subtotal' => 50000,
        ]);

        $sale->refresh();
        $sale->update(['total_pembayaran' => $sale->itemPenjualan()->sum('subtotal')]);

        $response = $this->actingAs($user)
            ->from('/penjualan/' . $sale->id . '/edit')
            ->put('/penjualan/' . $sale->id, [
                'payment_method' => 'CASH',
                'uang_diterima' => 40000,
            ]);

        $response->assertSessionHasErrors(['uang_diterima']);
    }
}
