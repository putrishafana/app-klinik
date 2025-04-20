@extends('layouts.main')

@section('section')
    <div class="container-fluid p3">
        @include('section.pegawai.table')

        <div class="modal fade" id="tambah_data_pegawai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pegawai</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/pegawai" method="POST">
                            @csrf
                            <div class="mb-2">
                                <label for="">Nama Pegawai</label>
                                <input type="text" name="nama" id="name" class="form-control"
                                    placeholder="Masukkan Nama Pegawai">
                            </div>
                            <div class="mb-2">
                                <label for="">Jabatan</label>
                                <input type="text" name="jabatan" id="jabatan" class="form-control"
                                    placeholder="Masukkan Jabatan">
                            </div>
                            <div class="mb-2">
                                <label for="">Alamat</label>
                                <textarea name="alamat" id="" cols="10" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="mb-2">
                                <label for="">Desa/Kelurahan</label>
                                <select name="wilayah_id" id="wilayah_id" class="form-select form-control">
                                    <option value="">Pilih Desa/Kelurahan</option>
                                    @foreach ($wilayah as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="">Telepon</label>
                                <input type="text" name="no_telp" id="no_telp" class="form-control"
                                    placeholder="Masukkan Nomor Telepon">
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

        <div class="modal fade" id="update_data_pegawai" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true" style="margin-top: 50px">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Data Pegawai</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="data_pegawai">

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="delete_data_pegawai" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true" style="margin-top: 50px">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Pegawai
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formHapusPegawai" method="POST">
                            @method('DELETE')
                            @csrf
                            <p id="hapusPegawaiMessage">Apakah anda yakin ingin menghapus data pegawai?</p>
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
        $('.btn-delete-pegawai').on('click', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');

            $('#delete_data_pegawai').modal('show');

            var form = $('#formHapusPegawai');
            form.attr('action', '/pegawai/' + id);
            $('#hapusPegawaiMessage').text('Apakah Anda yakin ingin menghapus data pegawai ' + nama + ' ?');
        });

        function updatePegawai(id) {
            var url = '/pegawai/' + id + '/edit';
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    $('#data_pegawai').html(response);
                    $('#update_data_pegawai').modal('show');
                },
                error: function() {
                    alert('Error fetching data!');
                }
            })
        }
    </script>
@endsection
