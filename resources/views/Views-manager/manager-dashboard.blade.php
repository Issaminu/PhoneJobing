<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="js/app.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.33.2/apexcharts.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.33.2/apexcharts.min.css" />
</head>

<body>
    @include('layouts.navigation')
    <div style="display: flex;justify-content:center; margin-right:4rem">
        <div>
            <div style="display: flex;">
                <div>
                    <div class="card shadow mt-6 ml-16 pb-6" style="width: 41rem; max-height:29rem; padding-bottom:1.5rem;">
                        <div class="h3 mt-1 d-flex drop-shadow" style="justify-content: center;" title="Résultats des appels par téléoperateur dans les 7 jours précédents">Résultats des
                            appels
                            (par téléoperateur)</div>
                        <div style="max-width:40rem; height:4rem; color:#5d8fd4" id="chart1"></div>
                    </div>
                </div>
                @include('layouts.ManagerDash.dashboardChart1Script')
                <div>
                    <div>
                        <div class="card shadow mt-6 ml-8 pb-8 " style="width: 43.5rem !important; max-height:29rem; padding-bottom:1.5rem;">
                            <div class="h3 mt-1 d-flex drop-shadow" style="justify-content: center;" title="Résultats des appels par jours du semaine dans les 7 jours précédents">Résultats
                                des
                                appels
                                (7 jours)
                            </div>
                            <div class="ml-4" style="margin-top:-0.5rem; max-width:40rem; height:4rem; color:#5d8fd4" id="chart2">
                            </div>
                            @include('layouts.ManagerDash.dashboardChart2Script')

                        </div>
                    </div>


                </div>
            </div>
            <div style="display: flex;">
                <div>
                    <div class="card shadow mt-8 mb-6 ml-16 pb-6" style="width: 41rem; max-height:29rem; padding-bottom:1.5rem;">
                        <div class="h3 mt-1 d-flex" style="justify-content: center;" title="Nombre des appels par jour du semaine dans cette semaine en comparaison avec la semaine dernière">
                            Nombre d'appels (7 jours)</div>
                        <div style="max-width:40rem; height:4rem; color:#5d8fd4" id="chart3"></div>
                    </div>
                </div>
                @include('layouts.ManagerDash.dashboardChart3Script')
                <div>
                    <div style="display: flex;">
                        <div class="card shadow mt-8 mb-6 ml-8 pb-6" style="width: 21rem !important; height:8rem; padding-bottom:1.5rem;">
                            <div class="h4 mt-4 d-flex drop-shadow" style="justify-content: center;" title="Revenue totale de votre équipe dans la semaine précédente">Revenue
                            </div>
                            @if ($thisWeek->earnings == 0)
                            <div class="h1 d-flex drop-shadow" style="justify-content: center; text-size:9.7rem; font-weight: bold; color:#878787">
                                N/A
                            </div>
                            @else
                            <div class="h1 d-flex drop-shadow" style="justify-content: center; text-size:9.7rem; font-weight: bold; color:#315b96">
                                {{ $thisWeek->earnings }}
                                <h1 class="ml-2" style="color: #f0bc74">MAD
                                </h1>
                            </div>
                            @endif
                        </div>
                        <div class="card shadow mt-8 mb-6 ml-6 pb-6" style="width: 21rem !important; height:8rem; padding-bottom:1.5rem;">
                            <div class="h4 mt-4  d-flex drop-shadow" style="justify-content: center;" title="Durée moyenne de tout les appels qui ont été éffectués par votre téléoperateurs dans la semaine précédente">
                                Durée
                                moyenne
                                d'appel
                            </div>
                            @if (count($salesLastWeek) > 0)
                            <?php
                            $totaltime = 0;
                            foreach ($salesLastWeek as $sale) {
                                $timestamp = strtotime($sale->callLength);
                                $totaltime += $timestamp;
                            }
                            $average_time = $totaltime / count($salesLastWeek); ?>

                            <div class="h1 d-flex drop-shadow" style="justify-content: center; text-size:2.7rem; font-weight: bold; color:#f0bc74">
                                {{ date('m:s', $average_time) }}
                            </div>
                            @else
                            <div class="h1 d-flex drop-shadow" style="justify-content: center; text-size:2.7rem; font-weight: bold; color:#878787">
                                {{ 'N/A' }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div style="display: flex;">
                        <div class="card shadow mb-6 ml-8 pb-6" style="width: 21rem !important; height:8rem; padding-bottom:1.5rem;">
                            <div class="mt-4 h4 d-flex drop-shadow" style="justify-content: center;" title="Nombre d'appels qui ont términés avec une vente dans cette semaine">
                                Nombre
                                d'appels
                            </div>
                            @if ($thisWeek->count == 0)
                            <div class="h1 d-flex drop-shadow" style="justify-content: center; text-size:2.7rem; font-weight: bold; color:#878787">
                                N/A
                            </div>
                            @else
                            <div class="h1 d-flex drop-shadow" style="justify-content: center; text-size:2.7rem; font-weight: bold; color:#f0bc74">
                                {{ $thisWeek->count }}
                            </div>
                            @endif
                        </div>
                        <div class="card shadow mb-6 ml-6 pb-6" style="width: 21rem !important; height:8rem; padding-bottom:1.5rem;">
                            <div class="h4 mt-4 d-flex drop-shadow" style="justify-content: center;" title="Nombre d'appels qui sont éffectués par votre téléoperateurs dans cette semaine">
                                Nombre de
                                ventes
                            </div>
                            @if ($thisWeek->sales == 0)
                            <div class="h1 d-flex drop-shadow" style="justify-content: center; text-size:2.7rem; font-weight: bold; color:#878787">
                                N/A
                            </div>
                            @else
                            <div class="h1 d-flex drop-shadow" style="justify-content: center; text-size:2.7rem; font-weight: bold; color:#f0bc74">
                                {{ $thisWeek->sales }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <?php
                    $thisWeekColor = '#f0bc74';
                    $lastWeekColor = '#f0bc74';
                    if ($thisWeek->ratio > $lastWeek->ratio) {
                        $thisWeekColor = '#315b96';
                        $lastWeekColor = '#878787';
                    } elseif ($thisWeek->ratio < $lastWeek->ratio) {
                        $thisWeekColor = '#fc7248';
                        $lastWeekColor = '#878787';
                    }
                    ?>
                    <div style="display: flex;">
                        <div class="card shadow  mb-6 ml-8 pb-6" style="width: 21rem !important; height:8.5rem; padding-bottom:1.5rem;">
                            <div class="h4 mt-4 d-flex drop-shadow" style="justify-content: center;" title="Pourcentage d'appels qui ont términés avec une vente par rapport a nombre total d'appels dans cette semaine">
                                Ratio de
                                vente
                            </div>
                            @if ($thisWeek->ratio == 0)
                            <div class="h1 d-flex drop-shadow" style="justify-content: center; text-size:2.7rem; font-weight: bold; color:#878787">
                                N/A
                            </div>
                            @else
                            <div class="h1 d-flex drop-shadow" style="justify-content: center; text-size:2.7rem; font-weight: bold; color:{{ $thisWeekColor }}">
                                {{ $thisWeek->ratio }}
                                <h1 style="color: #f0bc74">%</h1>
                            </div>
                            @endif
                        </div>
                        <div class="card shadow mb-6 ml-6 pb-6" style="width: 21rem !important; height:8.5rem; padding-bottom:1.5rem;">
                            <div class="h4 mt-4 d-flex drop-shadow" style="justify-content: center;" title="Pourcentage d'appels qui ont términées avec une vente par rapport a nombre total d'appels dans la semaine précédente">
                                Ratio de
                                vente précédente
                            </div>
                            @if ($lastWeek->ratio == 0)
                            <div class="h1 d-flex drop-shadow" style="justify-content: center; text-size:2.7rem; font-weight: bold; color:#878787">
                                N/A
                            </div>
                            @else
                            <div class="h1 d-flex drop-shadow" style="justify-content: center; text-size:2.7rem; font-weight: bold; color:{{ $lastWeekColor }}">
                                {{ $lastWeek->ratio }}
                                <h1 style="color: #315b96">%</h1>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
