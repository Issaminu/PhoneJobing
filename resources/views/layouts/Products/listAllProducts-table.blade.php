<?php $ach = 0; ?>
<div id="mainBody">

    <div id="searchAndAccountType" style="display: flex; justify-content: flex-end;">

        <div class="input-group fmxw-300 ">
            <input style="width:14rem; --tw-ring-color: rgb(75, 85, 99);" id="productSearch" type="text"
                class="form-control" placeholder="Chercher">
            {{-- <span class="input-group-text border-l-0"> </span> --}}
        </div>


    </div>
    <br style="user-select: none;">
    <div class="card card-body shadow border-0 table-wrapper table-responsive">
        {{-- <div class="d-flex mb-3"><select class="form-select fmxw-200" aria-label="Message select example">
            <option selected="selected">Bulk Action</option>
            <option value="1">Send Email</option>
            <option value="2">Change Group</option>
            <option value="3">Delete User</option>
        </select> <button class="btn btn-sm px-3 btn-secondary ms-3">Apply</button></div> --}}
        <table class="table user-table table-hover align-items-center" id="productTable" style="table-layout: fixed;">
            <thead>
                <tr>
                    {{-- <th class="border-bottom">
                        <div class="form-check dashboard-check"><input class="form-check-input" type="checkbox" value=""
                                id="userCheck55"> <label class="form-check-label" for="userCheck55"></label></div>
                    </th> --}}
                    <th class="border-bottom">Produit</th>
                    <th class="border-bottom">Prix</th>
                    <th class="border-bottom">Quantité</th>
                    <th class="border-bottom">Action</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($products as $product)
                    <tr>
                        {{-- <td>
                            <div class="form-check dashboard-check"><input class="form-check-input" type="checkbox"
                                    value="" id="userCheck1"> <label class="form-check-label" for="userCheck1"></label>
                            </div>
                        </td> --}}
                        <td><a href="users.html#" class="d-flex align-items-center">
                                {{-- <img src="../assets/img/team/profile-picture-1.jpg" class="avatar rounded-circle me-3"
                        alt="Avatar"> --}}
                                <div class="d-block"><span
                                        class="fw-bold">{{ ucwords($product->name) }}</span>
                                </div>
                            </a></td>
                        </td>
                        <td><span class="fw-normal d-flex align-items-center">
                                {{ $product->price }} DH
                            </span>
                        </td>
                        <td><span class="fw-normal d-flex align-items-center">
                                {{ $product->quantity }}
                            </span>
                        </td>
                        {{-- <td><span class="fw-normal text-success">Active</span></td> --}}

                        <td>
                            {{-- <form action="/equipe/supprimer-membre" method="POST"> --}}
                            <span class="fw-normal text-wrap"><button data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" prodName="{{ $product->name }}"
                                    prodPrice="{{ $product->price }}" prodQuantity="{{ $product->quantity }}"
                                    prodId="{{ $product->id }}" id="ModButton"
                                    style=" font-weight: 500; color: rgb(29, 175, 131)">
                                    Modifier
                                </button>
                                <form method="POST" action="/produits/supprimer-produit">
                                    @csrf
                                    <input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;"
                                        id="deleteProdId" class="block mt-1 w-full" type="hidden" name="deleteProdId"
                                        value="{{ $product->id }}" required>

                                    <button id="DelButton" style=" font-weight: 500; color: rgb(225, 29, 72)">
                                        Supprimer
                                    </button>
                                </form>
                            </span>
                            {{-- <input type="hidden" name="deleteEmail" value="{{ $user->email }}"> --}}


                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>

        <br style="user-select: none;">
    </div>
</div>
