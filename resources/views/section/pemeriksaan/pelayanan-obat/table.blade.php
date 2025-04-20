<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Pemberian Obat</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="row mx-2">
                    <div class="col d-flex justify-content-end">
                        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#tambah_pelayanan_obat">
                            <i class="material-symbols-rounded opacity-5">add</i>
                            Tambah Obat
                        </button>
                    </div>
                </div>
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    No
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Obat</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Dosis</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Catatan</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Harga Satuan</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Jumlah</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Total Harga</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pemeriksaan->PelayananObat as $item)
                                <tr>
                                    <td class="text-center text-xs text-secondary mb-0">{{ $loop->iteration }}</td>
                                    <td class="text-xs text-secondary mb-0">{{ $item->Obat->obat ?? '' }}
                                    </td>
                                    <td class="text-xs text-secondary mb-0">{{ $item->dosis ?? '' }}</td>
                                    <td class="text-xs text-secondary mb-0">{{ $item->catatan ?? '' }}</td>
                                    <td class="text-xs text-secondary mb-0">{{ $item->harga_satuan ?? '' }}</td>
                                    <td class="text-xs text-secondary mb-0">{{ $item->jumlah ?? '' }}</td>
                                    <td class="text-xs text-secondary mb-0">{{ $item->total_harga ?? '' }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm mb-0 btn-success"
                                            onclick="updatePelayananObat({{ $item->id }})">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button type="button"
                                            class="btn btn-sm mb-0 ms-2 btn-danger btn-delete-pelayanan-obat"
                                            data-bs-target="#delete_pelayanan_obat" data-id="{{ $item->id }}"
                                            data-nama="{{ $item->Obat->obat }}">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
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
