<form action="/pemeriksaan/{{ $pemeriksaan->id }}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="kunjungan_id" id="kunjungan_pemeriksaan">
    <div class="mb-2">
        <label for="">Dokter</label>
        <select name="pegawai_id" id="pegawai_id" class="form-select form-control">
            <option value="">Pilih Dokter</option>
            @foreach ($dokter as $item)
                <option value="{{ $item->id }}" {{ $pemeriksaan->pegawai_id == $item->id ? 'selected' : '' }}>
                    {{ $item->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-2">
        <label for="">Waktu Periksa</label>
        <input type="datetime-local" name="waktu_periksa" id="waktu_periksa" class="form-control"
            value="{{ \Carbon\Carbon::parse($pemeriksaan->waktu_periksa)->format('Y-m-d\TH:i') }}">
    </div>
    <div class="mb-2">
        <label for="">Diagnosa</label>
        <input type="text" name="diagnosa" id="diagnosa" class="form-control" value="{{ $pemeriksaan->diagnosa }}">
    </div>
    <div class="mb-2">
        <label for="">Catatan</label>
        <input type="text" name="catatan" id="catatan" class="form-control" value="{{ $pemeriksaan->catatan }}">
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
