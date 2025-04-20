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
</div>

<div class="row">
    <table class="table align-items-center mb-0">
        <thead>
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Item</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Harga</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-xs text-secondary mb-0">Tindakan
                </td>
                <td class="text-xs text-secondary mb-0">
                    <div class="d-flex justify-content-between">
                        <span>Rp.</span>
                        <span>{{ $hargaTindakan }}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="text-xs text-secondary mb-0">Obat
                </td>
                <td class="text-xs text-secondary mb-0">
                    <div class="d-flex justify-content-between">
                        <span>Rp.</span>
                        <span>{{ $hargaObat }}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="text-xs text-secondary mb-0">Total Tagihan
                </td>
                <td class="text-xs text-secondary mb-0">
                    <div class="d-flex justify-content-between">
                        <span>Rp.</span>
                        <span>{{ $totalTagihan }}</span>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <form action="/pembayaran" method="POST">
        @csrf
        <input type="hidden" name="pemeriksaan_id" value="{{ $pemeriksaan->id }}">
        <input type="hidden" name="total_tagihan" value="{{ $totalTagihan }}">

        <div class="mx-2">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-info ms-2">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>
