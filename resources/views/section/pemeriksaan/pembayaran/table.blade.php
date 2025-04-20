<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Data Pembayaran</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    No
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Nama Pasien</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Total Tagihan</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Keterangan</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pembayaran as $item)
                                <tr>
                                    <td class="text-center text-xs text-secondary mb-0">{{ $loop->iteration }}</td>
                                    <td class="text-xs text-secondary mb-0">
                                        {{ $item->Pemeriksaan->Kunjungan->Pasien->nama ?? '' }}</td>
                                    <td class="text-xs text-secondary mb-0">{{ $item->total_tagihan ?? '' }}</td>
                                    <td class="text-xs mb-0">
                                        @if ($item->tanggal_bayar == null)
                                            <span>Belum Bayar</span>
                                        @else
                                            <span>Lunas</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($item->tanggal_bayar == null)
                                            <button type="button" class="btn btn-sm mb-0 btn-success"
                                                onclick="updatePembayaran({{ $item->id }})">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-sm mb-0 btn-info"
                                                onclick="invoicePembayaran({{ $item->id }})">
                                                <i class="fa-solid fa-print"></i>
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
