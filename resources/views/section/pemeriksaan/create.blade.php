<form action="/pemeriksaan" method="POST">
    @csrf
    <input type="hidden" name="kunjungan_id" id="kunjungan_pemeriksaan">
    <div class="mb-2">
        <label for="">Dokter</label>
        <select name="pegawai_id" id="pegawai_id" class="form-select form-control">
            <option value="">Pilih Dokter</option>
            @foreach ($dokter as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-2">
        <label for="">Tindakan</label>
        <select name="tindakan_id" id="tindakan_id" onchange="getHargaTindakan()" class="form-select form-control">
            <option value="">Pilih Tindakan</option>
            @foreach ($tindakan as $item)
                <option value="{{ $item->id }}" data-harga={{ $item->harga }}>{{ $item->tindakan }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-2">
        <label for="">Harga</label>
        <input type="text" name="harga" id="harga_tindakan" class="form-control" readonly>
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
