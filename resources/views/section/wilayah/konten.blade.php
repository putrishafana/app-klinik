@extends('layouts.main')

@section('section')
    <div class="container-fluid p3">
        @include('section.wilayah.table')

        <div class="modal fade" id="tambah_data_wilayah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Wilayah</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/wilayah" method="POST">
                            @csrf
                            <div class="mb-2">
                                <label for="">Kategori Wilayah</label>
                                <select name="type" id="type_wilayah" class="form-control form-select"
                                    onchange="selectIndukWilayah()">
                                    <option value="">Pilih Kategori Wilayah</option>
                                    <option value="1">Provinsi</option>
                                    <option value="2">Kabupaten/Kota</option>
                                    <option value="3">Kecamatan</option>
                                    <option value="4">Desa/Kelurahan</option>
                                </select>
                            </div>
                            <div class="mb-2" id="parentWilayah" style="display: none">
                                <label for="">Induk Wilayah</label>
                                <select name="parent_id" id="type_wilayah" class="form-control form-select">
                                    <option value="">Pilih Kategori Wilayah</option>
                                    @foreach ($wilayah as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="">Nama Wilayah</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Masukkan Nama Wilayah">
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

        <div class="modal fade" id="update_data_wilayah" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true" style="margin-top: 50px">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Data Wilayah</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="data_wilayah">

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="delete_data_wilayah" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true" style="margin-top: 50px">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Wilayah
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formHapusWilayah" method="POST">
                            @method('DELETE')
                            @csrf
                            <p id="hapusWilayahMessage">Apakah anda yakin ingin menghapus data wilayah?</p>
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
        function selectIndukWilayah() {
            const selectedType = document.getElementById('type_wilayah').value;
            const parentWilayah = document.getElementById('parentWilayah');

            if (selectedType !== '1' && selectedType !== '') {
                parentWilayah.style.display = 'block';
            } else {
                parentWilayah.style.display = 'none';
            }
        }

        $('.btn-delete-wilayah').on('click', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');

            $('#delete_data_wilayah').modal('show');

            var form = $('#formHapusWilayah');
            form.attr('action', '/wilayah/' + id);
            $('#hapusWilayahMessage').text('Apakah Anda yakin ingin menghapus data wilayah ' + nama + ' ?');
        });

        function updateWilayah(id) {
            var url = '/wilayah/' + id + '/edit';
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    $('#data_wilayah').html(response);
                    $('#update_data_wilayah').modal('show');
                },
                error: function() {
                    alert('Error fetching data!');
                }
            })
        }

        function selectIndukWilayahUpdate() {
            const selectedType = document.getElementById('type_wilayah_update').value;
            const parentSection = document.getElementById('parentWilayahUpdate');
            if (selectedType !== '1' && selectedType !== '') {
                parentSection.style.display = 'block';
            }
        }
    </script>
@endsection
