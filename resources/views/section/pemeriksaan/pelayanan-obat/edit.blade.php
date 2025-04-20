<form action="/pelayanan-obat/{{ $pelayananObat->id }}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="pemeriksaan_id" value="{{ $pelayananObat->pemeriksaan_id }}">
    <div class="mb-2">
        <label for="">Obat</label>
        <select name="obat_id" id="pilih_obat_update" class="form-control form-select" onchange="selectObatUpdate()">
            <option value="">Pilih Obat</option>
            @foreach ($obat as $item)
                <option value="{{ $item->id }}" {{ $pelayananObat->obat_id == $item->id ? 'selected' : '' }}
                    data-harga="{{ $item->harga }}">
                    {{ $item->obat }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-2">
        <label for="">Dosis</label>
        <input type="text" name="dosis" id="dosis" class="form-control" placeholder="Masukkan Dosis Obat"
            value="{{ $pelayananObat->dosis }}">
    </div>
    <div class="mb-2">
        <label for="">Catatan</label>
        <input type="text" name="catatan" id="catatan" class="form-control" placeholder="Masukkan Catatan"
            value="{{ $pelayananObat->catatan }}">
    </div>
    <div class="mb-2">
        <label for="">Harga Satuan</label>
        <input type="text" name="harga_satuan" id="harga_satuan_obat_update" class="form-control"
            placeholder="Masukkan Harga Satuan" value="{{ $pelayananObat->harga_satuan }}" readonly>
    </div>
    <div class="mb-2">
        <label for="">Jumlah</label>
        <input type="number" name="jumlah" id="jumlah_obat_update" class="form-control"
            value="{{ $pelayananObat->jumlah }}" placeholder="Masukkan Jumlah">
    </div>
    <div class="mb-2">
        <label for="">Harga Total</label>
        <input type="text" name="total_harga" id="harga_total_obat_update" class="form-control"
            placeholder="Masukkan Harga Total" readonly value="{{ $pelayananObat->total_harga }}">
    </div>
    <div class="mb-2">
        <div class="row">
            <div class="col d-flex justify-content-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-info ms-2">Simpan</button>
            </div>
        </div>
    </div>
</form>

<script>
    function selectObatUpdate() {
        let selected = $('#pilih_obat_update option:selected');
        let harga = selected.data('harga') || 0;

        $('#harga_satuan_obat_update').val(harga);
        updateHargaTotal();
    }

    function updateHargaTotal() {
        let harga = parseFloat($('#harga_satuan_obat_update').val()) || 0;
        let jumlah = parseInt($('#jumlah_obat_update').val()) || 0;
        let total = harga * jumlah;

        $('#harga_total_obat_update').val(total);
    }

    $('#jumlah_obat_update').on('input', function() {
        updateHargaTotal();
    });

    $(document).ready(function() {
        let selected = $('#pilih_obat_update option:selected');
        let harga = selected.data('harga') || 0;
        $('#harga_satuan_obat_update').val(harga);

        updateHargaTotal();
    });
</script>
