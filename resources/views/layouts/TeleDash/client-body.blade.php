<div class="card card-body shadow mb-6" style="max-width: 35rem; height:30.31rem;">
    <div class="h3 d-flex" style="justify-content: center">Fiche Client</div>
    <div class="row">
        <div style="flex-wrap: nowrap">
            <div class="row mt-5 mb-3">
                <div style="width: 10rem;"><small class="text-muted text-sm">Nom complet:</small>
                </div>
                <div style="width: fit-content;">
                    <p class="text-dark mb-0 font-normale" style="margin-left:2rem; font-weight: 500;">
                        @if ($client->gender === 'Monsieur')
                            Mr. {{ $client->name }}
                        @else
                            Mme. {{ $client->name }}
                        @endif
                    </p>
                </div>
            </div>
            <div class="row mt-4 mb-3 align-items-center">
                <div style=" width: 10rem;"><small class="text-muted text-sm">Numéro:</small>
                </div>
                <div style="width: fit-content;">
                    <p class="mb-0 font-normale"
                        style="margin-left:2rem; color: #f0bc74; text-shadow: 0.2px 0.4px 1px #eca33d;font-weight: 700;">
                        {{ $client->phone }}
                    </p>
                </div>
            </div>
            <div class="row mt-4 mb-3 align-items-center">
                <div style=" width: 10rem;"><small class="text-muted text-sm">Email:</small>
                </div>
                <div style="width: fit-content;">
                    <p class="text-dark mb-0 font-normale" style="margin-left:2rem; font-weight: 500;">
                        {{ $client->email }}
                    </p>
                </div>
            </div>
            <div class="row mt-4 mb-3 align-items-center">
                <div style=" width: 10rem;"><small class="text-muted text-sm">Entreprise:</small>
                </div>
                <div style="width: fit-content;">
                    <p class="text-dark mb-0 font-normale" style="margin-left:2rem; font-weight: 500;">
                        {{ $client->company }}
                    </p>
                </div>
            </div>
            <div class="row mt-4 mb-3 align-items-center">
                <div style=" width: 10rem;"><small class="text-muted text-sm">Poste:</small>
                </div>
                <div style="width: fit-content;">
                    <p class="text-dark mb-0 font-normale" style="margin-left:2rem; font-weight: 500;">
                        {{ $client->position }}
                    </p>
                </div>
            </div>

            <div class="row mt-4 mb-3 align-items-center">
                <div style=" width: 10rem;"><small class="text-muted text-sm">Pays:</small>
                </div>
                <div style="width: fit-content;">
                    <p class="text-dark mb-0 font-normale" style="margin-left:2rem; font-weight: 500;">
                        {{ $client->country }}
                    </p>
                </div>
            </div>
            <div class="row mt-4 mb-3 align-items-center">
                <div style=" width: 10rem;"><small class="text-muted text-sm">Ville:</small>
                </div>
                <div style="width: fit-content;">
                    <p class="text-dark mb-0 font-normale" style="margin-left:2rem; font-weight: 500;">
                        {{ $client->city }}
                    </p>
                </div>
            </div>
            <div class="row mt-4 mb-3 align-items-center">
                <div style=" width: 10rem;"><small class="text-muted text-sm">Addresse:</small>
                </div>
                <div style="width: fit-content;">
                    <p class="text-dark mb-0 font-normale" style="margin-left:2rem; font-weight: 500;">
                        {{ $client->address }}
                    </p>
                </div>
            </div>

            <div class="row mt-4 mb-3 align-items-center">
                <div style=" width: 10rem;"><small class="text-muted text-sm">Zip code:</small>
                </div>
                <div style="width: fit-content;">
                    <p class="text-dark mb-0 font-normale" style="margin-left:2rem; font-weight: 500;">
                        {{ $client->zip }}
                    </p>
                </div>
            </div>

        </div>
    </div>

</div>
