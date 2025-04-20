@extends('layouts.main')

@section('section')
    <div class="container-fluid p3">
        <button class="btn-underline" onclick="getTablePasien()">Data Pasien</button>
        <button class="btn-underline" onclick="getTablePendaftaran()">Data Pendaftaran</button>
        @include('section.pendaftaran-pasien.table')


        <div class="modal fade modal-pendaftaran" id="tambah_data_pasien_baru" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pendaftaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/pendaftaran-pasien" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <p class="mb-1">Data Pasien</p>
                                    <div class="mb-2">
                                        <label for="">NIK</label>
                                        <input type="text" name="nik" id="nik" placeholder="Masukkan NIK"
                                            class="form-control">
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Nama</label>
                                        <input type="text" name="nama" id="nama" placeholder="Masukkan Nama"
                                            class="form-control">
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                            placeholder="Masukkan Nama" class="form-control">
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-select form-control">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="1">Laki-Laki</option>
                                            <option value="2">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col mt-4">
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
                                </div>
                                <div class="col">
                                    <p class="mb-1">Data Pendaftaran</p>
                                    <div class="mb-2">
                                        <label for="">Tanggal Kunjungan</label>
                                        <input type="date" name="tanggal_kunjungan" id="tanggal_kunjungan"
                                            class="form-control">
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Keluhan</label>
                                        <textarea name="keluhan" id="" cols="10" rows="3" class="form-control"></textarea>
                                    </div>
                                </div>
                                <input type="hidden" name="pegawai_id" value="{{ Auth::user()->Pegawai->id }}">
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

        <div class="modal fade" id="tambah_data_pasien_lama" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pendaftaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/pendaftaran-pasien" method="POST">
                            @csrf
                            <div class="mb-2">
                                <label for="">Pasien</label>
                                <select name="pasien_id" id="pasien_id" class="form-select form-control">
                                    <option value="">Pilih Pasien</option>
                                    @foreach ($pasien as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="">Tanggal Kunjungan</label>
                                <input type="date" name="tanggal_kunjungan" id="tanggal_kunjungan"
                                    class="form-control">
                            </div>
                            <div class="mb-2">
                                <label for="">Keluhan</label>
                                <textarea name="keluhan" id="" cols="10" rows="3" class="form-control"></textarea>
                            </div>
                            <input type="hidden" name="pegawai_id" value="{{ Auth::user()->Pegawai->id }}">
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

        <div class="modal fade" id="update_data_pendaftaran" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true" style="margin-top: 50px">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Data User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="data_pendaftaran">

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="update_data_pasien" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true" style="margin-top: 50px">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Data Pasien</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="data_pasien">

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="create_pemeriksaan" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true" style="margin-top: 50px">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tindakan Pasien</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="create_data_pemeriksaan">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.btn-delete-pendaftaran').on('click', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');

            $('#delete_data_pendaftaran').modal('show');

            var form = $('#formHapusUser');
            form.attr('action', '/pendaftaran-pasien/' + id);
            $('#hapusUserMessage').text('Apakah Anda yakin ingin menghapus data pendaftaran ' + nama + ' ?');
        });

        function updatePasien(id) {
            var url = '/pasien/' + id + '/edit';
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    $('#data_pasien').html(response);
                    $('#update_data_pasien').modal('show');
                },
                error: function() {
                    alert('Error fetching data!');
                }
            })
        }

        function updatePendaftaran(id) {
            var url = '/pendaftaran-pasien/' + id + '/edit';
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    $('#data_pendaftaran').html(response);
                    $('#update_data_pendaftaran').modal('show');
                },
                error: function() {
                    alert('Error fetching data!');
                }
            })
        }

        function tindakanDokter(id) {
            var url = '/pemeriksaan-pasien/' + id;
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    $('#create_data_pemeriksaan').html(response);
                    $('#create_pemeriksaan').modal('show');
                    $('#kunjungan_pemeriksaan').val(id);
                },
                error: function() {
                    alert('Error fetching data!');
                }
            })
        }

        function getTablePasien() {
            $('#tablePasien').css('display', 'block');
            $('#tablePendaftaran').css('display', 'none');
        }

        function getTablePendaftaran() {
            $('#tablePendaftaran').css('display', 'block');
            $('#tablePasien').css('display', 'none');
        }

        function getHargaTindakan() {
            const select = document.getElementById('tindakan_id');
            const selectedOption = select.options[select.selectedIndex];
            const harga = selectedOption.getAttribute('data-harga') || '';

            document.getElementById('harga_tindakan').value = harga;
        }
    </script>
@endsection
