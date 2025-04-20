<form action="/pasien/{{ $pasien->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-2">
        <label for="">NIK</label>
        <input type="text" name="nik" id="nik" placeholder="Masukkan NIK" class="form-control"
            value="{{ $pasien->nik }}">
    </div>
    <div class="mb-2">
        <label for="">Nama</label>
        <input type="text" name="nama" id="nama" placeholder="Masukkan Nama" class="form-control"
            value="{{ $pasien->nama }}">
    </div>
    <div class="mb-2">
        <label for="">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" id="tanggal_lahir" placeholder="Masukkan Nama" class="form-control"
            value="{{ $pasien->tanggal_lahir }}">
    </div>
    <div class="mb-2">
        <label for="">Jenis Kelamin</label>
        <select name="jenis_kelamin" id="jenis_kelamin" class="form-select form-control">
            <option value="">Pilih Jenis Kelamin</option>
            <option value="1" {{ $pasien->jenis_kelamin == 1 ? 'selected' : '' }}>Laki-Laki</option>
            <option value="2" {{ $pasien->jenis_kelamin == 2 ? 'selected' : '' }}>Perempuan</option>
        </select>
    </div>
    <div class="mb-2">
        <label for="">Alamat</label>
        <textarea name="alamat" id="" cols="10" rows="3" class="form-control">{{ $pasien->alamat }}</textarea>
    </div>
    <div class="mb-2">
        <label for="">Desa/Kelurahan</label>
        <select name="wilayah_id" id="wilayah_id" class="form-select form-control">
            <option value="">Pilih Desa/Kelurahan</option>
            @foreach ($wilayah as $item)
                <option value="{{ $item->id }}" {{ $pasien->wilayah_id == $item->id ? 'selected' : '' }}>
                    {{ $item->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-2">
        <label for="">Telepon</label>
        <input type="text" name="no_telp" id="no_telp" class="form-control" placeholder="Masukkan Nomor Telepon"
            value="{{ $pasien->no_telp }}">
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
