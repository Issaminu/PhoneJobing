<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Testing Page</title>
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="js/app.js"></script>
    {{-- <script>
    </script> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        #container {
            height: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            margin-left: 1rem;
            margin-right: 1rem;
            width: fit-content;
            height: fit-content;
        }


        .chart {
            width: fit-content;
            height: fit-content;
            left: 0;
            top: 0;
            position: relative;
        }

    </style>
</head>

<body>

    @include('layouts.navigation')
    <div>
        <div class="card card-body shadow mt-6 mb-6 ml-8 mr-8 pb-6" style="max-width: 46rem; max-height:25rem;">
            <div class="h3 mt-1 d-flex" style="justify-content: center;">Calls</div>
            <div class="container" id="container">
                <div id="main" style="width: 40rem; height:28rem;" class="chart"></div>
            </div>

        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/echarts@5.3.1/dist/echarts.min.js"></script>

    <script type="text/javascript">
        // Initialize the echarts instance based on the prepared dom
        var myChart = echarts.init(document.getElementById('main'), null, {

        });
        var chartDom = document.getElementById('main');
        var myChart = echarts.init(chartDom);
        var option;
        var app = {};

        const posList = [
            'left',
            'right',
            'top',
            'bottom',
            'inside',
            'insideTop',
            'insideLeft',
            'insideRight',
            'insideBottom',
            'insideTopLeft',
            'insideTopRight',
            'insideBottomLeft',
            'insideBottomRight'
        ];
        app.configParameters = {
            rotate: {
                min: -90,
                max: 90
            },

            align: {
                options: {
                    left: 'left',
                    center: 'center',
                    right: 'right'
                }
            },
            verticalAlign: {
                options: {
                    top: 'top',
                    middle: 'middle',
                    bottom: 'bottom'
                }
            },
            position: {
                options: posList.reduce(function(map, pos) {
                    map[pos] = pos;
                    return map;
                }, {})
            },
            distance: {
                min: 0,
                max: 100
            }
        };
        app.config = {
            rotate: 90,
            align: 'left',
            padding: 0,
            itemGap: 0,
            verticalAlign: 'middle',
            position: 'insideBottom',
            distance: 15,
            onChange: function() {
                const labelOption = {
                    rotate: app.config.rotate,
                    align: app.config.align,
                    verticalAlign: app.config.verticalAlign,
                    position: app.config.position,
                    distance: app.config.distance
                };
                myChart.setOption({
                    series: [{
                            label: labelOption
                        },
                        {
                            label: labelOption
                        },
                        {
                            label: labelOption
                        },
                        {
                            label: labelOption
                        }
                    ]
                });
            }
        };
        const labelOption = {
            show: true,
            position: app.config.position,
            distance: app.config.distance,
            align: app.config.align,
            verticalAlign: app.config.verticalAlign,
            rotate: app.config.rotate,
            formatter: '{c}  {name|{a}}',
            fontSize: 16,
            rich: {
                name: {}
            }
        };
        option = {
            tooltip: {
                trigger: 'axis',
                axisPointer: {
                    type: 'shadow'
                }
            },
            xAxis: [{
                type: 'category',
                axisTick: {
                    show: false
                },
                data: ['2012', '2013', '2014', '2015', '2016']
            }],
            yAxis: [{
                type: 'value'
            }],
            series: [{
                    name: 'Appels',
                    type: 'bar',
                    barGap: 0,
                    emphasis: {
                        focus: 'series'
                    },
                    data: [320, 332, 301, 334, 390]
                },
                {
                    name: 'Sale Success',
                    type: 'bar',
                    emphasis: {
                        focus: 'series'
                    },
                    data: [220, 182, 191, 234, 290]
                },
                {
                    name: 'Sale Fail',
                    type: 'bar',
                    emphasis: {
                        focus: 'series'
                    },
                    data: [150, 232, 201, 154, 190]
                },
                {
                    name: 'Appel Reporte',
                    type: 'bar',
                    emphasis: {
                        focus: 'series'
                    },
                    data: [98, 77, 101, 99, 40]
                }
            ]
        };

        option && myChart.setOption(option);

        // Display the chart using the configuration items and data just specified.
    </script>
</body>

</html>
