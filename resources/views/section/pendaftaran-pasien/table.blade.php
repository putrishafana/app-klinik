<div class="row mx-2">
    <div class="col d-flex justify-content-end">
        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#tambah_data_pasien_baru">
            <i class="fa-solid fa-person-circle-plus"></i>
            Pasien Baru
        </button>
        <button class="btn btn-primary ms-2" data-bs-toggle="modal" data-bs-target="#tambah_data_pasien_lama">
            <i class="fa-solid fa-file-circle-plus"></i>
            Pasien Lama
        </button>
    </div>
</div>

<div class="row">
    <div class="col-12" id="tablePasien" style="display: none">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Data Pasien</h6>
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
                                    NIK</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Nama</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Tanggal Lahir</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Jenis Kelamin</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Alamat</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Telepon</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pasien as $item)
                                <tr>
                                    <td class="text-center text-xs text-secondary mb-0">{{ $loop->iteration }}</td>
                                    <td class="text-xs text-secondary mb-0">{{ $item->nik ?? '' }}</td>
                                    <td class="text-xs text-secondary mb-0">{{ $item->nama ?? '' }}</td>
                                    <td class="text-xs text-secondary mb-0">{{ $item->tanggal_lahir ?? '' }}</td>
                                    <td class="text-xs text-secondary mb-0">
                                        @if ($item->jenis_kelamin == 1)
                                            Laki-Laki
                                        @else
                                            Perempuan
                                        @endif
                                    </td>
                                    <td class="text-xs text-secondary mb-0">
                                        {{ $item->alamat ?? '' }}, {{ $item->Wilayah->name }},
                                        {{ $item->Wilayah->parent?->name }},
                                        {{ $item->Wilayah->parent?->parent?->name }},
                                        {{ $item->Wilayah->parent?->parent?->parent?->name }}</td>
                                    <td class="text-xs text-secondary mb-0">
                                        {{ $item->no_telp ?? '' }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm mb-0 btn-success"
                                            onclick="updatePasien({{ $item->id }})">
                                            <i class="fa-solid fa-pen-to-square"></i>
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

    <div class="col-12" id="tablePendaftaran" style="display: none">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Data Pendaftaran</h6>
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
                                    Tanggal Kunjungan</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Pasien</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Keluhan</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Petugas Pendaftaran</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Aksi</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendaftaran as $item)
                                <tr>
                                    <td class="text-center text-xs text-secondary mb-0">{{ $loop->iteration }}</td>
                                    <td class="text-xs text-secondary mb-0">{{ $item->tanggal_kunjungan ?? '' }}</td>
                                    <td class="text-xs text-secondary mb-0">{{ $item->Pasien->nama ?? '' }}</td>
                                    <td class="text-xs text-secondary mb-0">{{ $item->keluhan ?? '' }}</td>
                                    <td class="text-xs text-secondary mb-0">{{ $item->Pegawai->nama ?? '' }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm mb-0 btn-success"
                                            onclick="updatePendaftaran({{ $item->id }})">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        @if ($item->Pemeriksaan == null)
                                            <button type="button" class="btn btn-sm mb-0 btn-primary"
                                                onclick="tindakanDokter({{ $item->id }})">
                                                <i class="fa-solid fa-user-doctor"></i>
                                                Tindakan
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
