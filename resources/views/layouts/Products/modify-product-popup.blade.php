<div class="modal fade mt-14" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" style="font-weight: 500; font-size:1.3rem;" id="exampleModalLabel">
                    Modifier Produit
                </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="vertical-align: middle; width:fit-content; height:fit-content;">Fermer</button>
            </div>
            <div class="modal-body">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('/produits/modifier-produit') }}">
                    @csrf
                    <!-- Name -->
                    <div>
                        <x-input id="prodId" class="block mt-1 w-full" type="hidden" name="prodId" required />
                    </div>
                    <div>
                        <x-label for="prodName" :value="__('Nom de produit *')" />

                        <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="prodName"
                            class="block mt-1 w-full" type="text" name="prodName" required />
                    </div>

                    <div class="mt-4">
                        <x-label for="prodPrice" :value="__('Prix *')" />

                        <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="prodPrice"
                            class="block mt-1 w-full" type="text" name="prodPrice" required />
                    </div>
                    <div class="mt-4">
                        <x-label for="prodQuantity" :value="__('Stock restant *')" />

                        <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="prodQuantity"
                            class="block mt-1 w-full" type="text" name="prodQuantity" required />
                    </div>
                    <div class="modal-footer" style="justify-content: center;">
                        <button type="submit" class="btn btn-info"
                            style="color: #ffff; background-color:#1f2937 ">Sauvegarder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
