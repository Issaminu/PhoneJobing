<?php
$success = [];
$fail = [];
$i = 0;
if ($calls) {
    foreach ($calls as $call) {
        if ($call->callCount) {
            $success[$i] = intval($call->saleCount);
            $fail[$i] = $call->callCount - $call->saleCount;
        } else {
            $success[$i] = 0;
            $fail[$i] = 0;
        }
        $i++;
    }
} else {
}
$allSuccess = json_encode($success);
$fails = json_encode($fail);
?>
<script>
    var options = {
        colors: ['#f0bc74', '#315b96', '#5d8fd4'],
        series: [{
            name: 'Ventes réussies',
            data: {!! $allSuccess !!},

        }, {
            name: 'Ventes échouées',
            data: {!! $fails !!}
        }, ],
        chart: {
            type: 'bar',
            stacked: true,

        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: Math.round((10 / (150 / {{ count(json_decode($allSuccess)) }})) * 100) + '%',
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
            categories: {!! $names !!},
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
        },
    };
    var chart = new ApexCharts(document.querySelector("#chart1"), options);
    chart.render();
</script>
