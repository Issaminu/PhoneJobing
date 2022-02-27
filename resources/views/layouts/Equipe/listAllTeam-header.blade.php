<div id="mainBody" class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4">
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="/"><svg class="icon icon-xxs" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg></a></li>
                <li class="breadcrumb-item"><a href="/dashboard">Manager</a></li>
                <li class="breadcrumb-item active" aria-current="page">Équipe</li>
            </ol>
        </nav>
        <h2 class="h4">Votre Équipe</h2>
        <p class="mb-0">
            @if (Auth::user()->type === 'manager')
                @if ($TeleCount == 0)
                Vous n'avez aucun téléoperateur @elseif($TeleCount == 1)Vous avez un seul
                téléoperateur @else Vous avez {{ $TeleCount }} téléoperateurs
                    @endif et @if ($CommCount == 0)
                    aucun commercial. @elseif($CommCount == 1) un seul
                    commercial. @else {{ $CommCount }} commerciaux.
                    @endif
                @else
                    @if ($TeleCount == 0)
                    Votre équipe contient aucun téléoperateur @elseif($TeleCount == 1)Votre équipe
                    contient un seul téléoperateur @else Votre équipe contient {{ $TeleCount }} téléoperateurs
                        @endif et @if ($CommCount == 0)
                        aucun commercial. @elseif($CommCount == 1) un seul
                        commercial. @else {{ $CommCount }} commerciaux.
                        @endif
                    @endif
        </p>
    </div>
    @if (Auth::user()->type === 'manager')
        <div id="ajoutEmploye" class="btn-toolbar mt-2"><a href="/equipe/ajout-membre"
                class="btn btn-sm btn-gray-800 d-inline-flex align-items-center"><svg class="icon icon-xs me-2"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg> Ajouter un employé</a>

        </div>
    @endif
</div>
