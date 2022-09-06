<?php
$allSuccess = [0, 0, 0, 0, 0, 0, 0];
$allFails = [0, 0, 0, 0, 0, 0, 0];
if (Auth::user()->email == 'manager@gmail.com') {
    $allSuccess = json_encode([6, 15, 11, 7, 7, 16, 15]);
    $allFails = json_encode([7, 12, 15, 8, 11, 14, 11]);
} else {
    $i = 0;
    foreach ($ThisWeekCalls->groupBy('callDate') as $callsPerDate) {
        $success = 0;
        $fail = 0;
        foreach ($callsPerDate as $call) {
            if ($call->result == 'Vente réussie') {
                $success++;
            } elseif ($call->result == 'Vente non réalisée') {
                $fail++;
            }
        }
        $allSuccess[$i] = $success;
        $allFails[$i] = $fail;
        $i++;
    }
    $allSuccess = json_encode($allSuccess);
    $allFails = json_encode($allFails);
}
?>
<script>
    var options = {
        colors: ['#f0bc74', '#315b96', '#5d8fd4'],
        series: [{
            name: 'Ventes réussies',
            data: {!! $allSuccess !!},

        }, {
            name: 'Ventes échouées',
            data: {!! $allFails !!}
        }, ],
        chart: {
            type: 'bar',
            stacked: false,
            height: 410,
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '65%',
                borderRadius: 5
            },
        },
        dataLabels: {
            enabled: false,
        },

        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            type: 'category',
            categories: ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'],
            labels: {
                show: true,
                rotate: 0,
                rotateAlways: false,
                hideOverlappingLabels: false,
                showDuplicates: false,
                trim: false,
                minHeight: undefined,
                maxHeight: 120,
                style: {
                    colors: [],
                    fontSize: '12px',
                    fontFamily: 'Inter',
                    fontWeight: 400,
                    cssClass: 'apexcharts-xaxis-label',
                },
            },
        },
        yaxis: {
            labels: {
                style: {
                    colors: [],
                    fontSize: '12px',
                    fontFamily: 'Inter',
                    fontWeight: 400,
                    cssClass: 'apexcharts-xaxis-label',
                },
            },
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return val
                }
            },
            style: {
                colors: [],
                fontSize: '12px',
                fontFamily: 'Inter',
                fontWeight: 400,
            }
        }
    };
    var chart = new ApexCharts(document.querySelector("#chart2"), options);
    chart.render();
</script>
