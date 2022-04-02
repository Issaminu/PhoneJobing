<div class="card card-body mb-6" style="width: fit-content;">
    <div
        style="display: flex; justify-content: space-between; align-items: baseline; flex-direction: row-reverse; margin-top:-0.3rem; margin-right:-0.8rem;">
        {{-- <h2 class="h5 mb-4">Informations Générales</h2> --}}
        @if (Auth::user()->type === 'manager' || Auth::user()->id === $user->id)
            <div id="ajoutEmploye" class="btn-toolbar"><button data-bs-toggle="modal" data-bs-target="#exampleModal"
                    id="ModButton"><a class="btn btn-sm btn-gray-800 d-inline-flex align-items-center"
                        style="padding: .275rem .625rem; color: #2b2b2b; background-color: #ffffff; border-width:0rem; box-shadow:none;"><svg
                            class="icon icon-xs" fill="currentColor" viewBox="0 0 23 22"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
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
                <div style="width: 10rem;"><small class="text-muted text-sm">Nom complet:</small>
                </div>
                <div style="width: fit-content;">
                    <p class="text-dark mb-0 font-normale" style="font-weight: 500;">{{ $user->name }}
                    </p>
                </div>
            </div>
            <div class="row mt-4 mb-3 align-items-center">
                <div style=" width: 10rem;"><small class="text-muted text-sm">Email:</small>
                </div>
                <div style="width: fit-content;">
                    <p class="text-dark mb-0 font-normale" style="font-weight: 500;">{{ $user->email }}
                    </p>
                </div>
            </div>
            <div class="row mt-4 mb-3 align-items-center">
                <div style=" width: 10rem;"><small class="text-muted text-sm">Poste:</small>
                </div>
                <div style="width: fit-content;">
                    <p class="text-dark mb-0 font-normale" style="font-weight: 500;">
                        @if ($user->type === 'teleoperateur')
                            Téléoperateur
                        @elseif ($user->type === 'commercial')
                            Commercial
                        @elseif ($user->type === 'manager')
                            Manager
                        @endif
                    </p>
                </div>
            </div>
            <div class="row mt-4 mb-3 align-items-center">
                <div style=" width: 10rem;"><small class="text-muted text-sm">Entreprise:</small>
                </div>
                <div style="width: fit-content;">
                    <p class="text-dark mb-0 font-normale" style="font-weight: 500;">{{ $user->company }}
                    </p>
                </div>
            </div>
            <div class="row mt-4 mb-3 align-items-center">
                <div style=" width: 10rem;"><small class="text-muted text-sm">Numéro:</small>
                </div>
                <div style="width: fit-content;">
                    <p class="text-dark mb-0 font-normale" style="font-weight: 500;">{{ $user->phone }}
                    </p>
                </div>
            </div>
            @if ($user->clients)
                <div class="row mt-4 mb-3 align-items-center">
                    <div style=" width: 10rem;"><small class="text-muted text-sm">Clients:</small>
                    </div>
                    <div style="width: fit-content;">
                        <p class="text-dark mb-0 font-normale" style="font-weight: 500; font-size:0.9rem;">
                            <?php
                            echo implode(',<br>', json_decode($reservedClients));
                            ?>
                        </p>
                    </div>
                </div>
            @endif
            @if ($user->country)
                <div class="row mt-4 mb-3 align-items-center">
                    <div style=" width: 10rem;"><small class="text-muted text-sm">Pays:</small>
                    </div>
                    <div style="width: fit-content;">
                        <p class="text-dark mb-0 font-normale" style="font-weight: 500;">{{ $user->country }}
                        </p>
                    </div>
                </div>
            @endif
            @if ($user->city)
                <div class="row mt-4 mb-3 align-items-center">
                    <div style=" width: 10rem;"><small class="text-muted text-sm">Ville:</small>
                    </div>
                    <div style="width: fit-content;">
                        <p class="text-dark mb-0 font-normale" style="font-weight: 500;">{{ $user->city }}
                        </p>
                    </div>
                </div>
            @endif
            @if ($user->address)
                <div class="row mt-4 mb-3 align-items-center">
                    <div style=" width: 10rem;"><small class="text-muted text-sm">Addresse:</small>
                    </div>
                    <div style="width: fit-content;">
                        <p class="text-dark mb-0 font-normale" style="font-weight: 500;">{{ $user->address }}
                        </p>
                    </div>
                </div>
            @endif
            @if ($user->zip)
                <div class="row mt-4 mb-3 align-items-center">
                    <div style=" width: 10rem;"><small class="text-muted text-sm">Zip code:</small>
                    </div>
                    <div style="width: fit-content;">
                        <p class="text-dark mb-0 font-normale" style="font-weight: 500;">{{ $user->zip }}
                        </p>
                    </div>
                </div>
            @endif
            @if (Auth::user()->type === 'manager' && $user->type != 'manager')
                <form method="POST" action="/equipe/supprimer-membre">
                    @csrf
                    <input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="deleteEmail"
                        class="block mt-1 w-full" type="hidden" name="deleteEmail" value="{{ $user->email }}"
                        required>

                    <button id="DelButton"
                        style="margin-top:0.5rem; margin-left:24%; font-weight: 500; color: rgb(225, 29, 72)"
                        type="submit">
                        Supprimer ce membre
                    </button>
                </form>
            @endif
            @if (Auth::user()->type === 'manager' && $user->type === 'manager')
                <form method="POST" action="/equipe/supprimer-membre">
                    @csrf
                    <input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="deleteEmail"
                        class="block mt-1 w-full" type="hidden" name="deleteEmail" value="{{ $user->email }}"
                        required>

                    <button id="DelButton"
                        style="margin-top:0.5rem; margin-left:24%; font-weight: 500; color: rgb(225, 29, 72)"
                        type="submit">
                        Supprimer l'equipe
                    </button>
                </form>
            @endif
        </div>
    </div>

    {{-- <div class="mt-3"><button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Save all</button>
        </div> --}}

</div>
