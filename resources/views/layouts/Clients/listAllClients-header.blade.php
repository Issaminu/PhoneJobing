<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<div id="mainBody" class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">

    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item" style="margin-top: 0.1rem;"><a href="/dashboard"><svg class="icon icon-xxs"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg></a></li>
                <li class="breadcrumb-item active" aria-current="page">Clients</li>
            </ol>
        </nav>
        <h2 class="h4">Votre Clients</h2>
        <p class="mb-0">
            @if (Auth::user()->type === 'manager')
                @if ($clientCount == 0)
                    Vous n'avez aucun client.
                @elseif($clientCount == 1)
                    Vous avez un seul
                    client.
                @else
                    Vous avez {{ $clientCount }} clients.
                @endif
            @else
                @if ($clientCount == 0)
                    Votre établissement n'a pas de clients.
                @elseif($clientCount == 1)
                    Votre établissement a un
                    seul client.
                @else
                    Votre établissement dispose de {{ $clientCount }} clients.
                @endif
            @endif
        </p>
    </div>
    @if (Auth::user()->type === 'manager')
        <div id="ajoutClient" class="btn-toolbar mt-2"><a href="/clients/ajout-client"
                class="btn btn-sm btn-gray-800 d-inline-flex align-items-center"><svg class="icon icon-xs me-2"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg> Ajouter un client</a>

        </div>
    @endif

</div>
