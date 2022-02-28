<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" style="font-weight: 500; font-size:1.3rem;" id="exampleModalLabel">
                    Modifier Membre
                </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="vertical-align: middle; width:fit-content; height:fit-content;">Fermer</button>
            </div>
            <div class="modal-body">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('/equipe/modifier-membre') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Name -->
                    <div>
                        <x-input id="membreId" class="block mt-1 w-full" type="hidden" name="membreId"
                            value="{{ $user->id }}" required />
                    </div>
                    <div>
                        @if (Auth::user()->type === 'manager')
                            <x-label for="membreName" :value="__('Nom de membre *')" />
                        @elseif(Auth::user()->id === $user->id)
                            <x-label for="membreName" :value="__('Votre nom *')" />
                        @endif
                        <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="membreName"
                            class="block mt-1 w-full" type="text" name="membreName" value="{{ $user->name }}"
                            required />
                    </div>
                    <div class="mt-4">
                        <x-label for="membrePhone" :value="__('Numéro de téléphone *')" />

                        <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="membrePhone"
                            class="block mt-1 w-full" type="text" name="membrePhone" value="{{ $user->phone }}"
                            required />
                    </div>
                    <div>
                        <x-label for="membreImage" :value="__('Photo')" class="mt-4" />
                        <input name="membreImage" id="memberImage" type="file"
                            accept="image/png, image/jpeg, image/jpg, image/svg, image/webp">
                    </div>
                    <div class="mt-4">
                        <x-label for="membreEmail" :value="__('Email')" />

                        <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="membreEmail"
                            class="block mt-1 w-full form-control" type="text" name="membreEmail"
                            value="{{ $user->email }}" required disabled=disabled />
                    </div>

                    <div class="mt-4">
                        <x-label for="membreCompany" :value="__('Entreprise')" />

                        <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="membreCompany"
                            class="block mt-1 w-full form-control" type="text" name="membreCompany"
                            value="{{ $user->company }}" required disabled=disabled />
                    </div>
                    @if (Auth::user()->type === 'manager')
                        <div class="mt-4">

                            <x-label for="membreType" :value="__('Rôle')" />
                            <?php
                            if ($user->type === 'teleoperateur') {
                                $accType = 'Téléoperateur';
                            } elseif ($user->type === 'commercial') {
                                $accType = 'Commercial';
                            }
                            ?>
                            <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="membreType"
                                class="block mt-1 w-full form-control" type="text" name="membreType"
                                value="{{ $accType }}" required disabled=disabled />
                        </div>
                    @endif

                    <div class="mt-4">
                        <x-label for="membreCountry" :value="__('Pays')" />

                        <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="membreCountry"
                            class="block mt-1 w-full" type="text" name="membreCountry" value="{{ $user->country }}" />
                    </div>
                    <div class="mt-4">
                        <x-label for="membreCity" :value="__('Ville')" />

                        <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="membreCity"
                            class="block mt-1 w-full" type="text" name="membreCity" value="{{ $user->city }}" />
                    </div>
                    <div class="mt-4">
                        <x-label for="membreAddress" :value="__('Addresse')" />

                        <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="membreAddress"
                            class="block mt-1 w-full" type="text" name="membreAddress" value="{{ $user->address }}" />
                    </div>
                    <div class="mt-4">
                        <x-label for="membreZip" :value="__('Zip code')" />

                        <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="membreZip"
                            class="block mt-1 w-full" type="text" name="membreZip" value="{{ $user->zip }}" />
                    </div>

                    <div class="modal-footer" style="justify-content: center; padding-bottom: 0rem;">
                        <button type="submit" class="btn btn-info"
                            style="color: #ffff; background-color:#1f2937 ">Sauvegarder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
