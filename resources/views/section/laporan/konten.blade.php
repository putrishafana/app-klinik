@extends('layouts.main')

@section('section')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h6>Kunjungan Perbulan</h6>
                <canvas id="kunjunganChart"></canvas>
            </div>
            <div class="col">
                <h6>Tindakan</h6>
                <canvas id="tindakanChart"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <h6>Obat</h6>
                <canvas id="obatChart"></canvas>
            </div>

        </div>
    </div>


    <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
    <script>
        const kunjunganLabels = {!! json_encode($bulanLabels) !!};
        const kunjunganData = {!! json_encode($jumlahKunjungan) !!};

        const tindakanLabels = {!! json_encode($tindakanLabels) !!};
        const tindakanData = {!! json_encode($tindakanData) !!};

        const obatLabels = {!! json_encode($obatLabels) !!};
        const obatData = {!! json_encode($obatData) !!};

        new Chart(document.getElementById('kunjunganChart'), {
            type: 'bar',
            data: {
                labels: kunjunganLabels,
                datasets: [{
                    label: 'Jumlah Kunjungan per Bulan',
                    data: kunjunganData,
                    backgroundColor: '#4e73df'
                }]
            }
        });

        new Chart(document.getElementById('tindakanChart'), {
            type: 'bar',
            data: {
                labels: tindakanLabels,
                datasets: [{
                    label: 'Tindakan Terbanyak',
                    data: tindakanData,
                    backgroundColor: '#1cc88a'
                }]
            }
        });

        new Chart(document.getElementById('obatChart'), {
            type: 'bar',
            data: {
                labels: obatLabels,
                datasets: [{
                    label: 'Obat Paling Sering Diresepkan',
                    data: obatData,
                    backgroundColor: '#f6c23e'
                }]
            }
        });
    </script>
@endsection
