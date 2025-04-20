<form action="/pembayaran/{{ $pembayaran->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-2">
        <label for="">Tanggal Pembayaran</label>
        <input type="date" id="tanggal_bayar" name="tanggal_bayar" class="form-control">
    </div>
    <div class="mb-2">
        <label for="">Total Tagihan</label>
        <input type="text" id="total_tagihan" name="total_tagihan" class="form-control"
            value="{{ $pembayaran->total_tagihan }}">
    </div>
    <div class="mb-2">
        <label for="">Dibayar</label>
        <input type="text" name="dibayar" id="uang_bayar" onchange="getKembalian()" class="form-control">
    </div>
    <div class="mb-2">
        <label for="">Kembalian</label>
        <input type="text" name="kembali" id="uang_kembali" class="form-control" readonly>
    </div>
    <div class="mb-2">
        <label for="">Catatan</label>
        <input type="text" name="catatan" id="catatan" class="form-control">
    </div>
    <input type="hidden" name="kasir_id" value="{{ Auth::user()->Pegawai->id }}">
    <input type="hidden" name="pemeriksaan_id" value="{{ $pembayaran->Pemeriksaan->id }}">

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
    function getKembalian() {
        const totalTagihan = $('#total_tagihan').val();
        const uangBayar = $('#uang_bayar').val();

        const formKembalian = $('#uang_kembali');

        const uangKembali = uangBayar - totalTagihan;

        formKembalian.val(uangKembali);
    }
</script>
