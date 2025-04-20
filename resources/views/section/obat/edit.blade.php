<form action="/obat/{{ $obat->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-2">
        <label for="">Nama Obat</label>
        <input type="text" name="obat" id="name" class="form-control" placeholder="Masukkan Nama Obat"
            value="{{ $obat->obat }}">
    </div>
    <div class="mb-2">
        <label for="">Stok</label>
        <input type="number" name="stok" id="stok" class="form-control" placeholder="Masukkan Stok"
            value="{{ $obat->stok }}">
    </div>
    <div class="mb-2">
        <label for="">Satuan</label>
        <input type="text" name="satuan" id="satuan" class="form-control" placeholder="Masukkan Satuan"
            value="{{ $obat->satuan }}">
    </div>
    <div class="mb-2">
        <label for="">Harga</label>
        <input type="number" name="harga" id="harga" class="form-control" placeholder="Masukkan Harga"
            value="{{ $obat->harga }}">
    </div>
    <div class="mb-2">
        <div class="row">
            <div class="col d-flex justify-content-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-info ms-2">Simpan</button>
            </div>
        </div>
    </div>
</form>
