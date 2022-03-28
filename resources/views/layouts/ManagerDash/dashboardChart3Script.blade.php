<?php
$success = [];
$fail = [];
$i = 0;
foreach ($sales as $sale) {
    $success[$i] = intval($sale->saleCount);
    $fail[$i] = $sale->callCount - $sale->saleCount;

    $i++;
}
$successs = json_encode($success);
$fails = json_encode($fail);
?>
<script>
    var options = {
        colors: ['#f0bc74', '#315b96', '#5d8fd4'],
        series: [{
            name: 'Ventes réussies',
            data: [6, 15, 11, 7, 7, 16],

        }, {
            name: 'Ventes échouées',
            data: [7, 12, 15, 8, 11, 14],
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
    var chart = new ApexCharts(document.querySelector("#chart3"), options);
    chart.render();
</script>
