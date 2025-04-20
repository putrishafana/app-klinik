<form action="/tindakan/{{ $tindakan->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-2">
        <label for="">Nama Tindakan</label>
        <input type="text" name="tindakan" id="name" class="form-control" placeholder="Masukkan Nama Tindakan"
            value="{{ $tindakan->tindakan }}">
    </div>
    <div class="mb-2">
        <label for="">Deskripsi</label>
        <textarea name="deskripsi" id="" cols="10" rows="3" class="form-control">{{ $tindakan->deskripsi }}</textarea>
    </div>
    <div class="mb-2">
        <label for="">Harga</label>
        <input type="number" name="harga" id="harga" placeholder="Masukkan Harga" class="form-control"
            value="{{ $tindakan->harga }}">
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
