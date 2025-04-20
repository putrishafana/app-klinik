<div class="row mx-2">
    <div class="col d-flex justify-content-end">
        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#tambah_data_wilayah">
            <i class="material-symbols-rounded opacity-5">add</i>
            Tambah Data
        </button>
    </div>
</div>
{{-- <table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Kategori Wilayah</th>
            <th>Induk Wilayah</th>
            <th>Nama Wilayah</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table> --}}

<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Data Wilayah</h6>
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
                                    Kategori Wilayah</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Induk Wilayah</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Nama Wilayah</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wilayah as $item)
                                <tr>
                                    <td class="text-center text-xs text-secondary mb-0">{{ $loop->iteration }}</td>
                                    <td class="text-xs text-secondary mb-0">
                                        @if ($item->type == 1)
                                            Provinsi
                                        @elseif ($item->type == 2)
                                            Kabupaten/Kota
                                        @elseif ($item->type == 3)
                                            Kecamatan
                                        @else
                                            Desa/Kelurahan
                                        @endif
                                    </td>
                                    <td class="text-xs text-secondary mb-0">{{ $item->Parent->name ?? '' }}</td>
                                    <td class="text-xs text-secondary mb-0">{{ $item->name ?? '' }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm mb-0 btn-success"
                                            onclick="updateWilayah({{ $item->id }})">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button type="button"
                                            class="btn btn-sm mb-0 ms-2 btn-danger btn-delete-wilayah"
                                            data-bs-target="#delete_data_wilayah" data-id="{{ $item->id }}"
                                            data-nama="{{ $item->name }}">
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
