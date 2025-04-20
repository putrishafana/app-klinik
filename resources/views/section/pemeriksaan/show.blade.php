@extends('layouts.main')

@section('section')
    <div class="container-fluid p-3">
        <div class="card">
            <div class="card-header">
                Hasil Pemeriksaan
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col">
                        <div class="row">
                            <div class="col-3">
                                <p class="text-xs">Pemeriksa</p>
                                <p class="text-xs">Waktu Periksa</p>
                                <p class="text-xs">Nama Pasien</p>
                            </div>
                            <div class="col-auto">
                                <p class="text-xs">:</p>
                                <p class="text-xs">:</p>
                                <p class="text-xs">:</p>
                            </div>
                            <div class="col">
                                <p class="text-xs">Dr. {{ $pemeriksaan->Pegawai->nama ?? '' }}</p>
                                <p class="text-xs">{{ $pemeriksaan->waktu_periksa ?? '' }}</p>
                                <p class="text-xs">{{ $pemeriksaan->Kunjungan->Pasien->nama ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-2">
                                <p class="text-xs">Keluhan</p>
                                <p class="text-xs">Diagnosa</p>
                                <p class="text-xs">Catatan</p>
                            </div>
                            <div class="col-auto">
                                <p class="text-xs">:</p>
                                <p class="text-xs">:</p>
                                <p class="text-xs">:</p>
                            </div>
                            <div class="col">
                                <p class="text-xs">{{ $pemeriksaan->Kunjungan->keluhan ?? '' }}</p>
                                <p class="text-xs">{{ $pemeriksaan->diagnosa ?? '' }}</p>
                                <p class="text-xs">{{ $pemeriksaan->catatan ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @include('section.pemeriksaan.pelayanan-obat.table')

                <div class="row mt-2">
                    <div class="col d-flex justify-content-end">
                        <button class="btn btn-primary" onclick="pembayaranLanjutan({{ $pemeriksaan->id }})">
                            <i class="fa-solid fa-money-bill"></i>
                            Buat Tagihan
                        </button>
                    </div>
                </div>

                <div class="modal fade" id="tambah_pelayanan_obat" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Obat Pasien</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/pelayanan-obat" method="POST">
                                    @csrf
                                    <input type="hidden" name="pemeriksaan_id" value="{{ $pemeriksaan->id }}">
                                    <div class="mb-2">
                                        <label for="">Obat</label>
                                        <select name="obat_id" id="pilih_obat" class="form-control form-select"
                                            onchange="selectObat()">
                                            <option value="">Pilih Obat</option>
                                            @foreach ($obat as $item)
                                                <option value="{{ $item->id }}" data-harga="{{ $item->harga }}">
                                                    {{ $item->obat }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Dosis</label>
                                        <input type="text" name="dosis" id="dosis" class="form-control"
                                            placeholder="Masukkan Dosis Obat">
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Catatan</label>
                                        <input type="text" name="catatan" id="catatan" class="form-control"
                                            placeholder="Masukkan Catatan">
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Harga Satuan</label>
                                        <input type="text" name="harga_satuan" id="harga_satuan_obat"
                                            class="form-control" placeholder="Masukkan Harga Satuan" readonly>
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Jumlah</label>
                                        <input type="number" name="jumlah" id="jumlah_obat" class="form-control"
                                            placeholder="Masukkan Jumlah" readonly>
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Harga Total</label>
                                        <input type="text" name="total_harga" id="harga_total_obat" class="form-control"
                                            placeholder="Masukkan Harga Total" readonly>
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

                <div class="modal fade" id="update_pelayanan_obat" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" style="margin-top: 50px">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Obat Pasien</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="pelayanan_obat">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="delete_pelayanan_obat" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" style="margin-top: 50px">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hapus Obat
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="formHapusWilayah" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <p id="hapusWilayahMessage">Apakah anda yakin ingin menghapus data wilayah?</p>
                                    <div class="d-flex justify-content-center mt-2">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-danger ms-2">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="create_pembayaran_periksa" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 50px">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tagihan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="pembayaran_periksa">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function selectObat() {
            let selected = $('#pilih_obat option:selected');
            let harga = selected.data('harga') || 0;

            $('#harga_satuan_obat').val(harga);

            $('#jumlah_obat').removeAttr('readonly').val('');
            $('#harga_total_obat').val('');
        }

        $('#jumlah_obat').on('input', function() {
            let harga = parseFloat($('#harga_satuan_obat').val()) || 0;
            let jumlah = parseInt($(this).val()) || 0;
            let total = harga * jumlah;

            $('#harga_total_obat').val(total);
        });

        $('.btn-delete-pelayanan-obat').on('click', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');

            $('#delete_pelayanan_obat').modal('show');

            var form = $('#formHapusWilayah');
            form.attr('action', '/pelayanan-obat/' + id);
            $('#hapusWilayahMessage').text('Apakah Anda yakin ingin menghapus data obat ' + nama + ' ?');
        });

        function updatePelayananObat(id) {
            var url = '/pelayanan-obat/' + id + '/edit';
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    $('#pelayanan_obat').html(response);
                    $('#update_pelayanan_obat').modal('show');
                },
                error: function() {
                    alert('Error fetching data!');
                }
            })
        }

        function pembayaranLanjutan(id) {
            var url = '/pembayaran-periksa/' + id;
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    $('#pembayaran_periksa').html(response);
                    $('#create_pembayaran_periksa').modal('show');
                },
                error: function() {
                    alert('Error fetching data!');
                }
            })
        }
    </script>
@endsection
