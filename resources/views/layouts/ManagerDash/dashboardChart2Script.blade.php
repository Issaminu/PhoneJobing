<script>
    var options = {
        series: [{
                name: "Cette semaine",
                data: [6, 15, 11, 7, 7, 16, 14]
            },
            {
                name: "Semaine dernière",
                data: [7, 12, 15, 8, 11, 14, 11]
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
            min: 5,
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

    var chart = new ApexCharts(document.querySelector("#chart2"), options);
    chart.render();
</script>
