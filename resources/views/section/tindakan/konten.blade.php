@extends('layouts.main')

@section('section')
    <div class="container-fluid p3">
        @include('section.tindakan.table')

        <div class="modal fade" id="tambah_data_tindakan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Tindakan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/tindakan" method="POST">
                            @csrf
                            <div class="mb-2">
                                <label for="">Nama Tindakan</label>
                                <input type="text" name="tindakan" id="name" class="form-control"
                                    placeholder="Masukkan Nama Tindakan">
                            </div>
                            <div class="mb-2">
                                <label for="">Deskripsi</label>
                                <textarea name="deskripsi" id="" cols="10" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="mb-2">
                                <label for="">Harga</label>
                                <input type="number" name="harga" id="harga" class="form-control"
                                    placeholder="Masukkan Harga">
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

        <div class="modal fade" id="update_data_tindakan" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true" style="margin-top: 50px">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Data Tindakan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="data_tindakan">

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="delete_data_tindakan" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true" style="margin-top: 50px">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Tindakan
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formHapusTindakan" method="POST">
                            @method('DELETE')
                            @csrf
                            <p id="hapusTindakanMessage">Apakah anda yakin ingin menghapus data tindakan?</p>
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
        $('.btn-delete-tindakan').on('click', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');

            $('#delete_data_tindakan').modal('show');

            var form = $('#formHapusTindakan');
            form.attr('action', '/tindakan/' + id);
            $('#hapusTindakanMessage').text('Apakah Anda yakin ingin menghapus data tindakan ' + nama + ' ?');
        });

        function updateTindakan(id) {
            var url = '/tindakan/' + id + '/edit';
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    $('#data_tindakan').html(response);
                    $('#update_data_tindakan').modal('show');
                },
                error: function() {
                    alert('Error fetching data!');
                }
            })
        }
    </script>
@endsection
