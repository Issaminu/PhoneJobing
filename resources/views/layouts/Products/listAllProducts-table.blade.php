<div id="mainBody" style="margin-top:0rem; width:auto">

    <div id="searchAndAccountType" style="display: flex; justify-content: flex-end;">

        <div class="input-group" style="max-width: 18rem;">
            <input style="--tw-ring-color: rgb(75, 85, 99);" id="productSearch" type="text" class="form-control"
                onkeyup="searchProductsTable()" placeholder="Chercher">
            {{-- <span class="input-group-text border-l-0"> </span> --}}
        </div>


    </div>
    <div class="card card-body shadow border-0 table-wrapper table-responsive" style="width:auto; margin-top:2rem;">
        {{-- <div class="d-flex mb-3"><select class="form-select fmxw-200" aria-label="Message select example">
            <option selected="selected">Bulk Action</option>
            <option value="1">Send Email</option>
            <option value="2">Change Group</option>
            <option value="3">Delete User</option>
        </select> <button class="btn btn-sm px-3 btn-secondary ms-3">Apply</button></div> --}}
        <table class="table user-table table-hover align-items-center" id="productTable" style="table-layout: auto;">
            <thead>
                <tr style="text-align: center;">
                    {{-- <th class="border-bottom">
                        <div class="form-check dashboard-check"><input class="form-check-input" type="checkbox" value=""
                                id="userCheck55"> <label class="form-check-label" for="userCheck55"></label></div>
                    </th> --}}
                    <th class="border-bottom">Produit</th>
                    <th class="border-bottom">Ventes</th>
                    <th class="border-bottom">Prix</th>
                    <th class="border-bottom">Stock</th>
                    <th class="border-bottom">Action</th>

                </tr>
            </thead>
            <tbody style="text-align: center;">
                <?php $i = 0; ?>
                @foreach ($products as $product)
                    <?php $i++; ?>
                    <tr>
                        {{-- <td>
                            <div class="form-check dashboard-check"><input class="form-check-input" type="checkbox"
                                    value="" id="userCheck1"> <label class="form-check-label" for="userCheck1"></label>
                            </div>
                        </td> --}}

                        <td>
                            {{-- <a href="users.html#" class="justify-content-center"> --}}
                            {{-- <img src="../assets/img/team/profile-picture-1.jpg" class="avatar rounded-circle me-3"
                        alt="Avatar"> --}}
                            <div class="d-block"><span class="fw-bold">{{ ucwords($product->name) }}</span>
                            </div>
                            {{-- </a> --}}
                        </td>
                        </td>
                        <td><span class="fw-normal d-flex justify-content-center">
                                {{ $product->quantitySold }}
                            </span>
                        </td>
                        <td><span class="fw-normal d-flex justify-content-center">
                                {{ $product->price }} DH
                            </span>
                        </td>
                        <td><span class="fw-normal d-flex justify-content-center">
                                {{ $product->quantity }}
                            </span>
                        </td>
                        {{-- <td><span class="fw-normal text-success">Active</span></td> --}}

                        <td>
                            {{-- <form action="/equipe/supprimer-membre" method="POST"> --}}
                            <span class="fw-normal text-wrap"><button id="EditButton" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $i }}" id="ModButton"
                                    onclick="document.getElementById('#exampleModal{{ $i }}').style.display='inherit'"
                                    style=" font-weight: 500; color: #10b981">
                                    Modifier
                                </button>


                                <form style="" method="POST" action="/produits/supprimer-produit">
                                    @csrf
                                    <input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;"
                                        id="deleteProdId" class="block mt-1 w-full" type="hidden" name="deleteProdId"
                                        value="{{ $product->id }}" required>

                                    <button id="DelProdButton" style=" font-weight: 500; color: #e11d48">
                                        Supprimer
                                    </button>
                                </form>
                            </span>
                            {{-- <input type="hidden" name="deleteEmail" value="{{ $user->email }}"> --}}


                        </td>

                        <div class="modal fade mt-14" id="exampleModal{{ $i }}" tabindex="-1"
                            style="display: none" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" style="font-weight: 500; font-size:1.3rem;"
                                            id="exampleModalLabel">
                                            Modifier Produit
                                        </h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"
                                            style="vertical-align: middle; width:fit-content; height:fit-content;">Fermer</button>
                                    </div>
                                    <div class="modal-body">
                                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                        <form method="POST" action="{{ route('/produits/modifier-produit') }}">
                                            @csrf
                                            <div>
                                                <input id="prodId" class="block mt-1 w-full" type="hidden"
                                                    name="prodId" value={{ $product->id }} required />
                                            </div>
                                            <div>
                                                <x-label for="prodName" :value="__('Nom de produit *')" />

                                                <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;"
                                                    id="prodName" class="block mt-1 w-full" type="text"
                                                    name="prodName" value="{{ $product->name }}" required />
                                            </div>

                                            <div class="mt-4">
                                                <x-label for="prodPrice" :value="__('Prix *')" />

                                                <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;"
                                                    id="prodPrice" class="block mt-1 w-full" type="text"
                                                    name="prodPrice" value="{{ $product->price }}" required />
                                            </div>
                                            <div class="mt-4">
                                                <x-label for="prodQuantity" :value="__('Stock restant *')" />

                                                <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;"
                                                    id="prodQuantity" class="block mt-1 w-full" type="text"
                                                    name="prodQuantity" value="{{ $product->quantity }}" required />
                                            </div>
                                            <div class="mt-4 d-flex p-2" style="justify-content: center;">
                                                <button type="submit" class="btn btn-info"
                                                    style="color: #ffff; background-color:#1f2937 ">Sauvegarder</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </tr>
                @endforeach

            </tbody>
        </table>

        <br style="user-select: none;">
    </div>
</div>
