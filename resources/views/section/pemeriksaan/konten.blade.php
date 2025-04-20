@extends('layouts.main')

@section('section')
    <div class="container-fluid p3">
        @include('section.pemeriksaan.table')

        <div class="modal fade" id="update_data_pemeriksaan" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true" style="margin-top: 50px">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Data Pemeriksaan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="data_pemeriksaan">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updatePemeriksaan(id) {
            var url = '/pemeriksaan/' + id + '/edit';
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    $('#data_pemeriksaan').html(response);
                    $('#update_data_pemeriksaan').modal('show');
                    $('#kunjungan_pemeriksaan').val(id);
                },
                error: function() {
                    alert('Error fetching data!');
                }
            })
        }

        function viewPemeriksaan(id) {
            var url = '/pemeriksaan/' + id;

            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {},
                error: function() {
                    alert('Error fetching data!');
                }
            })

        }
    </script>
@endsection
