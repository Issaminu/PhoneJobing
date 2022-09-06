<?php
use Carbon\Carbon;
$thisWeek = [];
$lastWeek = [];
if (count($ThisWeekCalls) > 0) {
    $thisWeek = [0, 0, 0, 0, 0, 0, 0];
    $lastWeek = [0, 0, 0, 0, 0, 0, 0];
}
if (Auth::user()->email == 'manager@gmail.com') {
    $thisWeek = json_encode([6, 15, 11, 7, 7, 16, 15]);
    $lastWeek = json_encode([7, 12, 15, 8, 11, 14, 11]);
} else {
    $i = 0;
    $ThisWeekCalls = $ThisWeekCalls->groupBy('callDate');
    $arrayKeys = array_keys($ThisWeekCalls->toArray());
    foreach ($ThisWeekCalls as $callsPerDate) {
        if (Carbon::parse($arrayKeys[$i])->dayOfWeek > 0) {
            $dayOfWeek = Carbon::parse($arrayKeys[$i])->dayOfWeek - 1;
        } else {
            $dayOfWeek = 6;
        }
        $thisWeek[$dayOfWeek] = count($callsPerDate);

        $i++;
    }

    $i = 0;
    $LastWeekCalls = $LastWeekCalls->groupBy('callDate');
    $arrayKeys = array_keys($LastWeekCalls->toArray());
    foreach ($LastWeekCalls as $callsPerDate) {
        if (Carbon::parse($arrayKeys[$i])->dayOfWeek > 0) {
            $dayOfWeek = Carbon::parse($arrayKeys[$i])->dayOfWeek - 1;
        } else {
            $dayOfWeek = 6;
        }
        $lastWeek[$dayOfWeek] = count($callsPerDate);

        $i++;
    }
    $thisWeek = json_encode($thisWeek);
    $lastWeek = json_encode($lastWeek);
}
?>
<script>
    var options = {
        series: [{
                name: "Cette semaine",
                data: {!! $thisWeek !!}
            },
            {
                name: "Semaine dernière",
                data: {!! $lastWeek !!}
            }
        ],
        chart: {
            zoom: {
                enabled: false,
            },
            height: 350,
            type: 'line',
            dropShadow: {
                enabled: false,
                color: '#000',
                top: 18,
                left: 7,
                blur: 10,
                opacity: 0.2
            },
            toolbar: {
                show: false,
            }

        },
        colors: ['#f0bc74', '#315b96'],
        dataLabels: {
            enabled: true,
            style: {

                fontSize: '12px',
                fontFamily: 'Inter',
                fontWeight: 400,
            }
        },
        stroke: {
            curve: 'smooth'
        },
        title: {
            text: '',
            align: 'left'
        },

        grid: {
            borderColor: '#e7e7e7',
            row: {
                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
            },
        },
        markers: {
            size: 1
        },
        xaxis: {
            categories: ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'],
            title: {
                text: ''
            },
            labels: {
                style: {
                    colors: [],
                    fontSize: '12px',
                    fontFamily: 'Inter',
                    fontWeight: 400,
                },
            },
        },
        yaxis: {
            title: {
                text: ''
            },
            labels: {
                style: {
                    colors: [],
                    fontSize: '12px',
                    fontFamily: 'Inter',
                    fontWeight: 400,
                },
            },
        },
        legend: {
            position: 'top',
            horizontalAlign: 'right',
            floating: true,
            offsetY: -25,
            offsetX: -5,
        },
        tooltip: {
            style: {
                colors: [],
                fontSize: '12px',
                fontFamily: 'Inter',
                fontWeight: 400,
            }
        },
    };

    var chart = new ApexCharts(document.querySelector("#chart3"), options);
    chart.render();
</script>
