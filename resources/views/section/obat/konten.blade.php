@extends('layouts.main')

@section('section')
    <div class="container-fluid p3">
        @include('section.obat.table')

        <div class="modal fade" id="tambah_data_obat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Obat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/obat" method="POST">
                            @csrf
                            <div class="mb-2">
                                <label for="">Nama Obat</label>
                                <input type="text" name="obat" id="name" class="form-control"
                                    placeholder="Masukkan Nama Obat">
                            </div>
                            <div class="mb-2">
                                <label for="">Stok</label>
                                <input type="number" name="stok" id="stok" class="form-control"
                                    placeholder="Masukkan Stok">
                            </div>
                            <div class="mb-2">
                                <label for="">Satuan</label>
                                <input type="text" name="satuan" id="satuan" class="form-control"
                                    placeholder="Masukkan Satuan">
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

        <div class="modal fade" id="update_data_obat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
            style="margin-top: 50px">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Data Obat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="data_obat">

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="delete_data_obat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
            style="margin-top: 50px">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Obat
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formHapusObat" method="POST">
                            @method('DELETE')
                            @csrf
                            <p id="hapusObatMessage">Apakah anda yakin ingin menghapus data obat?</p>
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
        $('.btn-delete-obat').on('click', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');

            $('#delete_data_obat').modal('show');

            var form = $('#formHapusObat');
            form.attr('action', '/obat/' + id);
            $('#hapusObatMessage').text('Apakah Anda yakin ingin menghapus data obat ' + nama + ' ?');
        });

        function updateObat(id) {
            var url = '/obat/' + id + '/edit';
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    $('#data_obat').html(response);
                    $('#update_data_obat').modal('show');
                },
                error: function() {
                    alert('Error fetching data!');
                }
            })
        }
    </script>
@endsection
