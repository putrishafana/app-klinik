<form action="/user/{{ $user->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-2">
        <label for="">Pegawai</label>
        <select name="pegawai_id" id="pegawai_id" class="form-select form-control">
            <option value="">Pilih Pegawai Untuk Akun</option>
            @foreach ($pegawai as $item)
                <option value="{{ $item->id }}" {{ $user->pegawai_id == $item->id ? 'selected' : '' }}>
                    {{ $item->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-2">
        <label for="">Email</label>
        <input type="email" name="email" id="email" class="form-control" required autocomplete="new-password"
            placeholder="Masukkan email" value="{{ $user->email }}">
    </div>
    <div class="mb-2">
        <label for="">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password baru">
    </div>
    <div class="mb-2">
        <label for="">Role</label>
        <select name="role" id="role" class="form-control form-select">
            <option value="">Pilih Role User</option>
            <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Admin</option>
            <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>Petugas Pendaftaran</option>
            <option value="3" {{ $user->role == 3 ? 'selected' : '' }}>Dokter</option>
            <option value="4" {{ $user->role == 4 ? 'selected' : '' }}>Kasir</option>
        </select>
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
