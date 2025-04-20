<form action="/wilayah/{{ $wilayah->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-2">
        <label for="">Kategori Wilayah</label>
        <select name="type" id="type_wilayah_update" class="form-control form-select"
            onchange="selectIndukWilayahUpdate()">
            <option value="">Pilih Kategori Wilayah</option>
            <option value="1" {{ $wilayah->type == 1 ? 'selected' : '' }}>Provinsi</option>
            <option value="2" {{ $wilayah->type == 2 ? 'selected' : '' }}>Kabupaten/Kota</option>
            <option value="3" {{ $wilayah->type == 3 ? 'selected' : '' }}>Kecamatan</option>
            <option value="4" {{ $wilayah->type == 4 ? 'selected' : '' }}>Desa/Kelurahan</option>
        </select>
    </div>
    <div class="mb-2" id="parentWilayahUpdate" style="display: none">
        <label for="">Induk Wilayah</label>
        <select name="parent_id" id="type_wilayah" class="form-control form-select">
            <option value="">Pilih Kategori Wilayah</option>
            @foreach ($allWilayah as $item)
                <option value="{{ $item->id }}" {{ $wilayah->parent_id == $item->id ? 'selected' : '' }}>
                    {{ $item->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-2">
        <label for="">Nama Wilayah</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan Nama Wilayah"
            value="{{ $wilayah->name }}">
    </div>
    <div class="mb-2">
        <div class="row">
            <div class="col d-flex justify-content-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-info ms-2">Update</button>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        selectIndukWilayahUpdate()
    })
</script>
