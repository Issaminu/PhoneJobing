<div class="d-flex" style="justify-content: center;">
    <div class="d-flex" style="justify-content: center;width: fit-content">
        <div class="card card-body mb-6" style=" display:flex;align-items: flex-end">
            <div
                style="display: flex; justify-content: space-between; align-items: baseline; flex-direction: row-reverse; margin-top:-0.3rem; margin-right:-0.8rem;">
                @if (Auth::user()->type === 'manager')
                    <div id="ajoutEmploye" class="btn-toolbar"><button data-bs-toggle="modal"
                            data-bs-target="#exampleModal" id="ModButton"><a
                                class="btn btn-sm btn-gray-800 d-inline-flex align-items-center"
                                style=" color: #2b2b2b; background-color: #ffffff; border-width:0rem; box-shadow:none;"><svg
                                    class="icon icon-xs" fill="currentColor" viewBox="0 0 23 22"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                    </path>
                                    <path fill-rule="evenodd"
                                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                        clip-rule="evenodd"></path>
                                </svg>Modifier</a></button>
                    </div>
                @endif
            </div>

            <div class="row">
                <div style="flex-wrap: nowrap">
                    <div class="row mt-4 mb-3">
                        <div style="width: 18rem;"><small class="text-muted text-xl">Nom complet:</small>
                        </div>
                        <div style="width: fit-content;">
                            <p class="text-dark mb-0 font-xl" style="font-weight: 500;">
                                @if ($client->gender === 'Monsieur')
                                    Mr. {{ $client->name }}
                                @else
                                    Mme. {{ $client->name }}
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="row mt-4 mb-3 align-items-center">
                        <div style=" width: 18rem;"><small class="text-muted text-xl">Email:</small>
                        </div>
                        <div style="width: fit-content;">
                            <p class="text-dark mb-0 font-xl" style="font-weight: 500;">{{ $client->email }}
                            </p>
                        </div>
                    </div>
                    <div class="row mt-4 mb-3 align-items-center">
                        <div style=" width: 18rem;"><small class="text-muted text-xl">Entreprise:</small>
                        </div>
                        <div style="width: fit-content;">
                            <p class="text-dark mb-0 font-xl" style="font-weight: 500;">{{ $client->company }}
                            </p>
                        </div>
                    </div>
                    <div class="row mt-4 mb-3 align-items-center">
                        <div style=" width: 18rem;"><small class="text-muted text-xl">Poste:</small>
                        </div>
                        <div style="width: fit-content;">
                            <p class="text-dark mb-0 font-xl" style="font-weight: 500;">
                                {{ $client->position }}
                            </p>
                        </div>
                    </div>

                    <div class="row mt-4 mb-3 align-items-center">
                        <div style=" width: 18rem;"><small class="text-muted text-xl">Numéro:</small>
                        </div>
                        <div style="width: fit-content;">
                            <p class="text-dark mb-0 font-xl" style="font-weight: 500;">{{ $client->phone }}
                            </p>
                        </div>
                    </div>
                    <div class="row mt-4 mb-3 align-items-center">
                        <div style=" width: 18rem;"><small class="text-muted text-xl">Nombre d'achats:</small>
                        </div>
                        <div style="width: fit-content;">
                            <p class="text-dark mb-0 font-xl" style="font-weight: 500;">{{ $client->quantity }}
                            </p>
                        </div>
                    </div>
                    <div class="row mt-4 mb-3 align-items-center">
                        <div style=" width: 18rem;"><small class="text-muted text-xl">Revenue total:</small>
                        </div>
                        <div style="width: fit-content;">
                            <p class="text-dark mb-0 font-xl" style="font-weight: 500;">
                                @if ($client->earnings)
                                    {{ $client->earnings }}
                                @else
                                    0
                                @endif
                                MAD
                            </p>
                        </div>
                    </div>
                    <div class="row mt-4 mb-3 align-items-center">
                        <div style=" width: 18rem;"><small class="text-muted text-xl">Pays:</small>
                        </div>
                        <div style="width: fit-content;">
                            <p class="text-dark mb-0 font-xl" style="font-weight: 500;">{{ $client->country }}
                            </p>
                        </div>
                    </div>
                    <div class="row mt-4 mb-3 align-items-center">
                        <div style=" width: 18rem;"><small class="text-muted text-xl">Ville:</small>
                        </div>
                        <div style="width: fit-content;">
                            <p class="text-dark mb-0 font-xl" style="font-weight: 500;">{{ $client->city }}
                            </p>
                        </div>
                    </div>
                    <div class="row mt-4 mb-3 align-items-center">
                        <div style=" width: 18rem;"><small class="text-muted text-xl">Addresse:</small>
                        </div>
                        <div style="width: fit-content;">
                            <p class="text-dark mb-0 font-xl" style="font-weight: 500;">{{ $client->address }}
                            </p>
                        </div>
                    </div>

                    <div class="row mt-4 mb-3 align-items-center">
                        <div style=" width: 18rem;"><small class="text-muted text-xl">Zip code:</small>
                        </div>
                        <div style="width: fit-content;">
                            <p class="text-dark mb-0 font-xl" style="font-weight: 500;">{{ $client->zip }}
                            </p>
                        </div>
                    </div>
                    @if (Auth::user()->type === 'manager')
                        <form method="POST" action="/clients/supprimer-client">
                            @csrf
                            <input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="deleteEmail"
                                class="block mt-1 w-full" type="hidden" name="deleteEmail"
                                value="{{ $client->email }}" required>

                            <div class="d-flex" style="justify-content: center">
                                <button id="DelButton"
                                    style="margin-top:0.5rem; font-weight: 500; color: rgb(225, 29, 72)"
                                    type="submit">
                                    Supprimer ce client
                                </button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
