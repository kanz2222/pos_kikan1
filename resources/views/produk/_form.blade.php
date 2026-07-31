@csrf

@if (!empty($produk->foto))
<div class="mb-2">
    <label class="text-white fw-bold">Foto Saat Ini</label><br>
    <img src="{{ asset('storage/' . $produk->foto) }}"
        width="150"
        class="img-thumbnail">
</div>
@endif

<div class="row mb-3">
    <div class="col">
        <div>
            <label class="text-white fw-bold mb-1">Gambar</label>
            <input type="file"
                name="foto"
                onchange="previewImage(this)"
                class="form-control text-white @error('foto') is-invalid @enderror">
            @error('foto')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col">
        <div class="mb-2">
            <label class="text-white fw-bold mb-1">Preview Foto</label><br>
            <img id="preview" class="img-thumbnail mt-2" style="display:none" width="150">
        </div>
    </div>
</div>

<div class="mb-3">
    <label class="text-white fw-bold mb-1">Nama Produk</label><br>
    <input type="text" name="name"
            class="form-control text-white @error('name') is-invalid @enderror"
            value="{{ old('name', $produk->nama ?? '') }}">
    @error('name')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="mb-3">
    <label class="text-white fw-bold mb-1">Harga Beli</label><br>
    <input type="number" name="purchase_price"
            class="form-control text-white @error('purchase_price') is-invalid @enderror"
            value="{{ old('purchase_price', $produk->harga_beli ?? '') }}">
    @error('purchase_price')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="mb-3">
    <label class="text-white fw-bold mb-1">Harga Jual</label><br>
    <input type="number" name="selling_price"
            class="form-control text-white @error('selling_price') is-invalid @enderror"
            value="{{ old('selling_price', $produk->harga_jual ?? '') }}">
    @error('selling_price')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="mb-3">
    <label class="text-white fw-bold mb-1">Persediaan</label><br>
    <input type="number" name="stock"
            class="form-control text-white @error('stock') is-invalid @enderror"
            value="{{ old('stock', $produk->stok ?? '') }}">
    @error('stock')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<script>
    function previewImage(input) {
        const preview = document.getElementById('preview');
        const file = input.files[0];

        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        }
    }
</script>