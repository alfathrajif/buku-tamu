@extends('dashboard.layouts.main')
@section('content')
<h1 class="font-semibold text-lg mb-5">Statistik</h1>
<div class="w-full max-w-5xl px-5">
    <div class="w-full mt-8 flex flex-col gap-5">
        <div class="w-full">
            <div class="py-3 w-full text-center font-bold text-lg">Jumlah Tamu dalam Satu Tahun</div>
            <div>
                <canvas id="tamuChart"></canvas>
            </div>
        </div>
        <div class="w-full">
            <div class="py-3 w-full text-center font-bold text-lg">Jumlah Kunjungan Setiap Perusahaan</div>
            <div>
                <canvas id="kunjunganChart"></canvas>
            </div>
        </div>
    </div>
</div>
<script>
    let labelsTamus =  {{ Js::from($labelsTamus) }};
    let dataTamus =  {{ Js::from($dataTamus) }};

    const tc = document.getElementById("tamuChart");

    new Chart(tc, {
        type: "line",
        data: {
            labels: labelsTamus,
            datasets: [
                {
                    data: dataTamus,
                    backgroundColor: "rgb(34 197 94)",
                    borderColor: "rgb(34 197 94)",
                    borderWidth: 3,
                },
            ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
            plugins: {
                legend: {
                    display: false,
                },
            },
            tooltips: {
                callbacks: {
                    label: function (tooltipItem) {
                        return tooltipItem.yLabel;
                    },
                },
            },
        },
    });
</script>
<script>
    const kc = document.getElementById("kunjunganChart");

    let labelsEvent =  {{ Js::from($labelsEvent) }};
    let dataEvent =  {{ Js::from($dataEvent) }};

    console.log(labelsEvent);

    new Chart(kc, {
        type: "bar",
        data: {
            labels: labelsEvent,
            datasets: [
                {
                    data: dataEvent,
                    borderWidth: 1,
                },
            ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
            plugins: {
                legend: {
                    display: false,
                },
            },
            tooltips: {
                callbacks: {
                    label: function (tooltipItem) {
                        return tooltipItem.yLabel;
                    },
                },
            },
        },
    });

</script>
@endsection
