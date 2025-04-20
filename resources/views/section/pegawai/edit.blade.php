<form action="/pegawai/{{ $pegawai->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-2">
        <label for="">Nama Pegawai</label>
        <input type="text" name="nama" id="name" class="form-control" placeholder="Masukkan Nama Pegawai"
            value="{{ $pegawai->nama }}">
    </div>
    <div class="mb-2">
        <label for="">Jabatan</label>
        <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Masukkan Jabatan"
            value="{{ $pegawai->jabatan }}">
    </div>
    <div class="mb-2">
        <label for="">Alamat</label>
        <textarea name="alamat" id="" cols="10" rows="3" class="form-control">{{ $pegawai->alamat }}</textarea>
    </div>
    <div class="mb-2">
        <label for="">Desa/Kelurahan</label>
        <select name="wilayah_id" id="wilayah_id" class="form-select form-control">
            <option value="">Pilih Desa/Kelurahan</option>
            @foreach ($wilayah as $item)
                <option value="{{ $item->id }}" {{ $pegawai->wilayah_id == $item->id ? 'selected' : '' }}>
                    {{ $item->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-2">
        <label for="">Telepon</label>
        <input type="text" name="no_telp" id="no_telp" class="form-control" placeholder="Masukkan Nomor Telepon"
            value="{{ $pegawai->no_telp }}">
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
