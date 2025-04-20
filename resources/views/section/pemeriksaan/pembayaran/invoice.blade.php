<style>
    @media print {
        body * {
            visibility: hidden;
        }

        #invoicePrintBody,
        #invoicePrintBody * {
            visibility: visible;
        }

        #invoicePrintBody {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            padding: 20px;
            background: white;
        }

        #invoicePrintBody button {
            display: none;
        }
    }
</style>
<div id="invoicePrintBody">
    <div class="row">
        <div class="col d-flex justify-content-center">
            <img src="{{ asset('img/pj-klinik.png') }}" width="20%">
        </div>
    </div>
    <h6 class="text-center">Invoice Pembayaran</h6>
    <div class="row">
        <div class="col-4">
            <p class="text-xs">Pemeriksa</p>
            <p class="text-xs">Nama Pasien</p>
            <p class="text-xs">Diagnosa</p>
            <p class="text-xs">Tanggal Pembayaran</p>
            <p class="text-xs">Kasir</p>
        </div>
        <div class="col-auto">
            <p class="text-xs">:</p>
            <p class="text-xs">:</p>
            <p class="text-xs">:</p>
            <p class="text-xs">:</p>
            <p class="text-xs">:</p>
        </div>
        <div class="col">
            <p class="text-xs">Dr. {{ $pembayaran->Pemeriksaan->Pegawai->nama ?? '' }}</p>
            <p class="text-xs">{{ $pembayaran->Pemeriksaan->Kunjungan->Pasien->nama ?? '' }}</p>
            <p class="text-xs">{{ $pembayaran->Pemeriksaan->diagnosa ?? '' }}</p>
            <p class="text-xs">{{ $pembayaran->tanggal_bayar ?? '' }}</p>
            <p class="text-xs">{{ $pembayaran->Kasir->Pegawai->nama ?? '' }}</p>
        </div>
    </div>

    <table class="table mb-0">
        <thead>
            <tr>
                <th class="text-xs">No</th>
                <th class="text-xs">Deskripsi</th>
                <th class="text-xs">Harga</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
                $total = 0;
            @endphp

            @foreach ($pembayaran->Pemeriksaan->PemeriksaanTindakan as $tindakan)
                <tr>
                    <td class="text-xs">{{ $no++ }}</td>
                    <td class="text-xs">{{ $tindakan->Tindakan->tindakan }}</td>
                    <td class="text-xs">
                        <div class="d-flex justify-content-between">
                            <span>Rp.</span>
                            <span>{{ number_format($tindakan->harga, 0, ',', '.') }}</span>
                        </div>
                    </td>
                </tr>
                @php $total += $tindakan->harga; @endphp
            @endforeach

            @foreach ($pembayaran->Pemeriksaan->PelayananObat as $obat)
                <tr>
                    <td class="text-xs">{{ $no++ }}</td>
                    <td class="text-xs">{{ $obat->Obat->obat }} ({{ $obat->jumlah }}x)</td>
                    <td class="text-xs">
                        <div class="d-flex justify-content-between">
                            <span>Rp.</span>
                            <span>{{ number_format($obat->jumlah * $obat->harga_satuan, 0, ',', '.') }}</span>
                        </div>
                    </td>
                </tr>
                @php $total += $obat->jumlah * $obat->harga_satuan; @endphp
            @endforeach

            <tr>
                <td colspan="2" align="right"><strong>Total</strong></td>
                <td>
                    <div class="d-flex justify-content-between">
                        <strong><span>Rp.</span></strong>
                        <span><strong>Rp{{ number_format($total, 0, ',', '.') }}</strong>
                        </span>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

</div>
<div class="row">
    <div class="col d-flex justify-content-end">
        <button type="button" class="btn btn-info" onclick="downloadInvoicePDF()">
            <i class="fa-solid fa-print"></i>
            Print
        </button>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
    async function downloadInvoicePDF() {
        const {
            jsPDF
        } = window.jspdf;
        const invoice = document.getElementById("invoicePrintBody");

        const canvas = await html2canvas(invoice, {
            scale: 2
        });
        const imgData = canvas.toDataURL("image/png");

        const pdf = new jsPDF('p', 'mm', 'b5');

        const margin = 10;
        const pdfWidth = pdf.internal.pageSize.getWidth() - 2 * margin;
        const pdfHeight = (canvas.height * pdfWidth) / canvas.width;

        pdf.addImage(imgData, 'PNG', margin, margin, pdfWidth, pdfHeight);
        pdf.save("invoice-pembayaran.pdf");
    }
</script>
