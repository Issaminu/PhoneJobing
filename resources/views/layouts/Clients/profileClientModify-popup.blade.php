<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" style="font-weight: 500; font-size:1.3rem;" id="exampleModalLabel">
                    Modifier Client
                </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="vertical-align: middle; width:fit-content; height:fit-content;">Fermer</button>
            </div>
            <div class="modal-body">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('/clients/modifier-client') }}">
                    @csrf
                    <!-- Name -->
                    <div>
                        <x-input id="clientId" class="block mt-1 w-full" type="hidden" name="clientId"
                            value="{{ $client->id }}" required />
                    </div>
                    <div>
                        <x-label for="clientName" :value="__('Nom de client *')" />
                        <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="clientName"
                            class="block mt-1 w-full" type="text" name="clientName" value="{{ $client->name }}"
                            required />
                    </div>
                    <div class="mt-4">
                        <x-label for="clientEmail" :value="__('Email *')" />

                        <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="clientEmail"
                            class="block mt-1 w-full" type="email" name="clientEmail" value="{{ $client->email }}"
                            required />
                    </div>
                    <div class="mt-4">
                        <x-label for="clientPhone" :value="__('Numéro de téléphone *')" />

                        <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="clientPhone"
                            class="block mt-1 w-full" type="text" name="clientPhone" value="{{ $client->phone }}"
                            required />
                    </div>
                    <div class="mt-4">
                        <x-label for="clientCompany" :value="__('Entreprise *')" />
                        <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="clientCompany"
                            class="block mt-1 w-full" type="text" name="clientCompany" value="{{ $client->company }}"
                            required />
                    </div>
                    <div class="mt-4">
                        <x-label for="clientPosition" :value="__('Poste *')" />
                        <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="clientPosition"
                            class="block mt-1 w-full" type="text" name="clientPosition"
                            value="{{ $client->position }}" required />
                    </div>
                    <div class="mt-4">
                        <x-label for="clientCountry" :value="__('Pays *')" />

                        <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="clientCountry"
                            class="block mt-1 w-full" type="text" name="clientCountry" value="{{ $client->country }}"
                            required />
                    </div>
                    <div class="mt-4">
                        <x-label for="clientCity" :value="__('Ville *')" />

                        <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="clientCity"
                            class="block mt-1 w-full" type="text" name="clientCity" value="{{ $client->city }}"
                            required />
                    </div>
                    <div class="mt-4">
                        <x-label for="clientAddress" :value="__('Addresse *')" />

                        <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="clientAddress"
                            class="block mt-1 w-full" type="text" name="clientAddress" value="{{ $client->address }}"
                            required />
                    </div>
                    <div class="mt-4">
                        <x-label for="clientZip" :value="__('Zip code *')" />

                        <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="clientZip"
                            class="block mt-1 w-full" type="text" name="clientZip" value="{{ $client->zip }}"
                            required />
                    </div>

                    <div class="modal-footer" style="justify-content: center; padding-bottom: 0rem;">
                        <button type="submit" class="btn btn-info"
                            style="color: #ffff; background-color:#1f2937 ">Sauvegarder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
