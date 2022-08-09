<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="js/app.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.33.2/apexcharts.min.js"
        integrity="sha512-iBEfFld2z1SAXCPmgoA40VQtqGP0cEJw4fy+t3ARW30uEfzf8hyrmm4mc5qdth3wZRPdKTv/auk5WH52klRVDg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.33.2/apexcharts.min.css"
        integrity="sha512-72LrFm5Wau6YFp7GGd7+qQJYkzRKj5UMQZ4aFuEo3WcRzO0xyAkVjK3NEw8wXjEsEG/skqvXKR5+VgOuzuqPtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    @include('layouts.navigation')
    <div style="display: flex;justify-content:center; margin-right:4rem">
        <div>
            <div style="display: flex;">
                <div>
                    <div class="card shadow mt-6 ml-16 pb-6"
                        style="width: 41rem; max-height:29rem; padding-bottom:1.5rem;">
                        <div class="h3 mt-1 d-flex drop-shadow" style="justify-content: center;">Résultats des appels
                            (par téléoperateur)</div>
                        <div style="max-width:40rem; height:4rem; color:#5d8fd4" id="chart1"></div>
                    </div>
                </div>
                @include('layouts.ManagerDash.dashboardChart1Script')
                <div>
                    <div>
                        <div class="card shadow mt-6 ml-8 pb-8 "
                            style="width: 43.5rem !important; max-height:29rem; padding-bottom:1.5rem;">
                            <div class="h3 mt-1 d-flex drop-shadow" style="justify-content: center;">Résultats des
                                appels
                                (7 jours)
                            </div>
                            <div class="ml-4" style="margin-top:-0.5rem; max-width:40rem; height:4rem; color:#5d8fd4"
                                id="chart3">
                            </div>
                            @include('layouts.ManagerDash.dashboardChart3Script')

                        </div>
                    </div>


                </div>
            </div>
            <div style="display: flex;">
                <div>
                    <div class="card shadow mt-8 mb-6 ml-16 pb-6"
                        style="width: 41rem; max-height:29rem; padding-bottom:1.5rem;">
                        <div class="h3 mt-1 d-flex" style="justify-content: center;">Nombre d'appels (7 jours)</div>
                        <div style="max-width:40rem; height:4rem; color:#5d8fd4" id="chart2"></div>
                    </div>
                </div>
                @include('layouts.ManagerDash.dashboardChart2Script')
                <div>
                    <div>
                        <div style="display: flex;">
                            <div class="card shadow mt-8 mb-6 ml-8 pb-6"
                                style="width: 21rem !important; height:8rem; padding-bottom:1.5rem;">
                                <div class="h4 mt-4 d-flex drop-shadow" style="justify-content: center;">Revenue
                                </div>
                                <div class="h1 d-flex drop-shadow"
                                    style="justify-content: center; text-size:9.7rem; font-weight: bold; color:#44cc8c">
                                    {{ $thisWeek->earnings }}<h1 class="ml-2" style="color: #315b96">MAD
                                    </h1>
                                </div>
                            </div>
                            <div class="card shadow mt-8 mb-6 ml-6 pb-6"
                                style="width: 21rem !important; height:8rem; padding-bottom:1.5rem;">
                                <div class="h4 mt-4  d-flex drop-shadow" style="justify-content: center;">Durée moyenne
                                    d'appel
                                </div>
                                <div class="h1 d-flex drop-shadow"
                                    style="justify-content: center; text-size:2.7rem; font-weight: bold; color:#44cc8c">
                                    <?php
                                    $totaltime = 0;
                                    foreach ($salesLastWeek as $sale) {
                                        $timestamp = strtotime($sale->callLength);
                                        $totaltime += $timestamp;
                                    }

                                    $average_time = $totaltime / count($salesLastWeek);
                                    echo date('m:s', $average_time);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="display: flex;">
                        <div class="card shadow mb-6 ml-8 pb-6"
                            style="width: 21rem !important; height:8rem; padding-bottom:1.5rem;">
                            <div class="mt-4 h4 d-flex drop-shadow" style="justify-content: center;">Nombre d'appels
                            </div>
                            <div class="h1 d-flex drop-shadow"
                                style="justify-content: center; text-size:2.7rem; font-weight: bold; color:#44cc8c">
                                {{-- {{ $thisWeek->count }} --}}
                                {{ 62 }}
                            </div>
                        </div>
                        <div class="card shadow mb-6 ml-6 pb-6"
                            style="width: 21rem !important; height:8rem; padding-bottom:1.5rem;">
                            <div class="h4 mt-4 d-flex drop-shadow" style="justify-content: center;">Nombre de ventes
                            </div>
                            <div class="h1 d-flex drop-shadow"
                                style="justify-content: center; text-size:2.7rem; font-weight: bold; color:#44cc8c">
                                {{-- {{ $thisWeek->sales }} --}}
                                {{ 51 }}
                            </div>
                        </div>
                    </div>
                    <div style="display: flex;">
                        <div class="card shadow  mb-6 ml-8 pb-6"
                            style="width: 21rem !important; height:8.5rem; padding-bottom:1.5rem;">
                            <div class="h4 mt-4 d-flex drop-shadow" style="justify-content: center;">Ratio de
                                vente
                            </div>
                            <div class="h1 d-flex drop-shadow"
                                style="justify-content: center; text-size:2.7rem; font-weight: bold; color:#44cc8c">
                                {{ $thisWeek->ratio }}<h1 style="color: #315b96">%</h1>
                            </div>
                        </div>
                        <div class="card shadow mb-6 ml-6 pb-6"
                            style="width: 21rem !important; height:8.5rem; padding-bottom:1.5rem;">
                            <div class="h4 mt-4 d-flex drop-shadow" style="justify-content: center;">Ratio de
                                vente précédente
                            </div>
                            <div class="h1 d-flex drop-shadow"
                                style="justify-content: center; text-size:2.7rem; font-weight: bold; color:#fc7248">
                                {{ $lastWeek->ratio }}<h1 style="color: #315b96">%</h1>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
