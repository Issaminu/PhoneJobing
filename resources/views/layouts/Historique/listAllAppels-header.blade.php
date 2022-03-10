<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<div id="mainBody" class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4"
    style="margin-right:7rem;">

    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item" style="margin-top: 0.1rem;"><a href="/dashboard"><svg class="icon icon-xxs"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg></a></li>
                <li class="breadcrumb-item active" aria-current="page">Historique</li>
            </ol>
        </nav>
        <h2 class="h4">
            @if (Auth::user()->type === 'manager')
                Historique
            @else
                Votre Historique
            @endif
        </h2>
        <p class="mb-0">
            @if (Auth::user()->type === 'manager')
                @if ($callCount == 0)
                    votre équipe n'a pas effectué aucun appel.
                @elseif($callCount == 1)
                    votre équipe a effectué un seul appel.
                @else
                    Votre équipe a effectué {{ $callCount }} appels.
                @endif
            @else
                @if ($callCount == 0)
                    Vous n'a pas effectué aucun appel.
                @elseif($callCount == 1)
                    Vouz avez effectué un seul appel.
                @else
                    Vouz avez effectué {{ $callCount }} appels.
                @endif
            @endif
        </p>
    </div>
    @if (Auth::user()->type === 'teleoperateur')
        <div class="btn-toolbar mt-2"><a href="/dashboard"
                class="btn btn-sm btn-gray-800 d-inline-flex align-items-center"><svg xmlns="http://www.w3.org/2000/svg"
                    x="0px" y="0px" width="17" height="17" viewBox="0 0 172 172"
                    style=" fill:#000000; margin-right:0.15rem;">
                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                        stroke-linejoin="miter" stroke-miterlimit="10" style="mix-blend-mode: normal">
                        <path d="M0,172v-172h172v172z" fill="none"></path>
                        <g fill="#ffffff">
                            <path
                                d="M69.4364,121.69c1.36453,-2.32773 1.33587,-5.18867 -0.04013,-7.50493l-6.98893,-11.7304c-1.5652,-2.62587 -1.38173,-5.90533 0.4988,-8.31333c3.2508,-4.1624 8.7204,-10.86467 14.5512,-16.69547c5.8308,-5.8308 12.53307,-11.3004 16.69547,-14.5512c2.408,-1.88053 5.68747,-2.064 8.31333,-0.4988l11.7304,6.98893c2.31627,1.38173 5.20013,1.3932 7.52787,0.02867l29.40627,-17.2172c2.84373,-1.6684 4.24267,-4.98227 3.4572,-8.1872c-0.76253,-3.1132 -2.60867,-7.1552 -6.8456,-11.39213c-13.26693,-13.26693 -35.64413,-20.3132 -85.5356,29.57827c-49.89147,49.89147 -42.85093,72.2744 -29.584,85.54133c4.2484,4.2484 8.29613,6.0888 11.41507,6.85133c3.1992,0.774 6.49013,-0.602 8.1528,-3.44c4.1452,-7.0864 13.09493,-22.37147 17.24587,-29.45787z">
                            </path>
                        </g>
                    </g>
                </svg> Appeler un client</a>
        </div>
    @endif
</div>
