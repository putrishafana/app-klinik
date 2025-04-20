@extends('layouts.main')

@section('section')
    <div class="container-fluid p-3">
        @include('section.pemeriksaan.pembayaran.table')

        <div class="modal fade" id="update_pembayaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
            style="margin-top: 50px">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="pembayaran">

                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="invoice_pembayaran" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true" style="margin-top: 50px">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Invoice Pembayaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="print_invoice">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updatePembayaran(id) {
            var url = '/pembayaran/' + id + '/edit';
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    $('#pembayaran').html(response);
                    $('#update_pembayaran').modal('show');
                },
                error: function() {
                    alert('Error fetching data!');
                }
            })
        }

        function invoicePembayaran(id) {
            var url = '/invoice/' + id;
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    $('#print_invoice').html(response);
                    $('#invoice_pembayaran').modal('show');
                },
                error: function() {
                    alert('Error fetching data!');
                }
            })
        }
    </script>
@endsection
