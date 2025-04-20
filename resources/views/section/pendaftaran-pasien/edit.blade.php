<form action="/pendaftaran-pasien/{{ $pendaftaran->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-2">
        <label for="">Pasien</label>
        <select name="pasien_id" id="pasien_id" class="form-select form-control">
            <option value="">Pilih Pasien</option>
            @foreach ($pasien as $item)
                <option value="{{ $item->id }}" {{ $pendaftaran->pasien_id == $item->id ? 'selected' : '' }}>
                    {{ $item->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-2">
        <label for="">Tanggal Kunjungan</label>
        <input type="date" name="tanggal_kunjungan" id="tanggal_kunjungan" class="form-control"
            value="{{ $pendaftaran->tanggal_kunjungan }}">
    </div>
    <div class="mb-2">
        <label for="">Keluhan</label>
        <textarea name="keluhan" id="" cols="10" rows="3" class="form-control">{{ $pendaftaran->keluhan }}</textarea>
    </div>
    <input type="hidden" name="pegawai_id" value="{{ Auth::user()->Pegawai->id }}">
    <div class="mb-2">
        <div class="row">
            <div class="col d-flex justify-content-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-info ms-2">Simpan</button>
            </div>
        </div>
    </div>
</form>
