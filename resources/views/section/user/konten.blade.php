@extends('layouts.main')

@section('section')
    <div class="container-fluid p3">
        @include('section.user.table')

        <div class="modal fade" id="tambah_data_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/user" method="POST">
                            @csrf
                            <div class="mb-2">
                                <label for="">Pegawai</label>
                                <select name="pegawai_id" id="pegawai_id" class="form-select form-control">
                                    <option value="">Pilih Pegawai Untuk Akun</option>
                                    @foreach ($pegawai as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }} - {{ $item->jabatan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required
                                    autocomplete="new-password" placeholder="Masukkan email">
                            </div>
                            <div class="mb-2">
                                <label for="">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Masukkan password">
                            </div>
                            <div class="mb-2">
                                <label for="">Role</label>
                                <select name="role" id="role" class="form-control form-select">
                                    <option value="">Pilih Role User</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Petugas Pendaftaran</option>
                                    <option value="3">Dokter</option>
                                    <option value="4">Kasir</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <div class="row">
                                    <div class="col d-flex justify-content-end">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-info ms-2">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="update_data_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
            style="margin-top: 50px">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Data User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="data_user">

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="delete_data_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
            style="margin-top: 50px">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data User
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formHapusUser" method="POST">
                            @method('DELETE')
                            @csrf
                            <p id="hapusUserMessage">Apakah anda yakin ingin menghapus data user?</p>
                            <div class="d-flex justify-content-center mt-2">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger ms-2">Hapus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.btn-delete-user').on('click', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');

            $('#delete_data_user').modal('show');

            var form = $('#formHapusUser');
            form.attr('action', '/user/' + id);
            $('#hapusUserMessage').text('Apakah Anda yakin ingin menghapus data user ' + nama + ' ?');
        });

        function updateUser(id) {
            var url = '/user/' + id + '/edit';
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    $('#data_user').html(response);
                    $('#update_data_user').modal('show');
                },
                error: function() {
                    alert('Error fetching data!');
                }
            })
        }
    </script>
@endsection
