<div style="margin-top:2rem; margin-left:5rem ; margin-bottom:2rem ; display: flex;">

    {{-- INCLUDE THE STOPWATCH --}}

    <div style="max-width: 28rem;flex-wrap: nowrap;">
        <div class="card card-body mb-6 shadow" style="align-items:center;">
            <div class="h1 mt-2" style="color: #5e88d1; text-shadow: 1px 1px 2px #2a5fb4;" id="stopwatch">00:00
            </div>
        </div>
        @include('layouts.TeleDash.client-body')
        <div class="card">
            @include('layouts.TeleDash.product-table')
        </div>
    </div>

    <div>
        <div class="card card-body shadow mb-6 ml-8 mr-8" style="width: 55rem; height:38.67rem;">

            <div class="h3 d-flex" style="justify-content: center;">{{ $script->name }}</div>
            <div class="mt-3" style="width: fit-content;overflow-y:auto;">
                {!! $script->content !!}
            </div>
        </div>

        <div class="card card-body shadow mb-6 ml-8"
            style="width: 55rem; background-color:#456392; border-color: rgb(235, 234, 234);">
            <form action="/dashboard/sauvegarder-appel" method="POST">
                <div class="h3 mb-6 d-flex" style="justify-content: center; color:white">Résultat d'appel</div>
                <input type="hidden" id='callLength' name="callLength">
                <input type="hidden" id='callScript' name="callScript" value="{{ $script->id }}">
                <input type="hidden" id='callClient' name="callClient" value="{{ $client->id }}">
                <input type="hidden" id='callDate' name="callDate" value="{{ date('d/m/Y') }}">
                <div class="d-flex" style="justify-content: space-evenly; align-items: flex-start;">

                    <div class="d-flex" style="flex-direction: column;">
                        <x-label for="prodQuantity" :value="__('Quantité:')"
                            style="margin-left: 0.3rem; color:white;" />
                        <x-input
                            style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px; width:10rem; margin-top:-0.5rem; height:2.455rem; border-radius:0.5rem;"
                            id="prodQuantity" class="w-full" type="text" name="prodQuantity" />
                    </div>
                    <div class="mb-3" style=" width:10rem;">
                        @foreach ($products as $product)
                            <input type="hidden" id='{{ str_replace(' ', '', $product->name) }}'
                                value="{{ $product->quantity }}">
                        @endforeach
                        <x-label for="prodSelection" :value="__('Produit:')"
                            style="margin-left: 0.3rem; color:white;" />
                        <select class="form-select fmxw-200" style="margin-top:-0.5rem;" id="prodSelection"
                            name="prodSelection" onchange="document.getElementById('prodQuantity').value=''">
                            @foreach ($products as $product)
                                <option value="{{ $product->name }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex mb-3" style="flex-direction: column;">
                        <x-label for="prodSelection" :value="__('Résultat:')"
                            style="margin-left: 0.3rem; color:white;" />
                        <select class="form-select fmxw-200" style="margin-top:-0.5rem; width:13rem;" name="callResult">
                            <option value="Vente réussie" selected="selected">Vente réussie</option>
                            <option value="Appel reporté">Appel reporté</option>
                            <option value="Vente non réalisée">Vente non réalisée</option>
                            <option value="Aucune réponse">Aucune réponse</option>
                            <option value="Non intéressé">Non intéressé</option>
                            <option value="Mauvaise numéro">Mauvaise numéro</option>
                            <option value="Problème technique">Problème technique</option>
                        </select>
                    </div>
                    <input class="form-control w-32 mt-5"
                        style=" background-color:#f0bc74; color:white; font-weight:500;border: .0rem solid #d1d5db; text-shadow: 0.6px 0.6px #d1d5db;"
                        type="submit" value="Sauvegarder">

                </div>
                <div class="d-flex" style="">
                    {{-- <input class="form-control w-32" type="submit" value="Sauvegarder"> --}}
                </div>
                <br>
            </form>
        </div>
    </div>

</div>
<div>
    <script>
        $('#prodQuantity').on('paste input', function() {
            let selectedProduct = document.getElementById("prodSelection").value;
            // alert(selectedProduct.replaceAll(" ", ""));
            let maxQuantity = document.getElementById(selectedProduct.replaceAll(" ", "")).value;
            if (isNaN(document.getElementById("prodQuantity").value)) {
                alert("Veuiller entrer seulement un nombre.");
                document.getElementById("prodQuantity").value = null;
            }

            if (parseInt(document.getElementById("prodQuantity").value) > parseInt(maxQuantity)) {
                document.getElementById("prodQuantity").value = maxQuantity;
            }
        });
    </script>
</div>
<div>
    <div class="wrapper">

    </div>
    <script>
        const watch = document.querySelector("#stopwatch");
        let millisecound = 0;
        let timer;
        window.onload = function() {
            timeStart();
        }

        function timeStart() {
            // watch.style.color = "#0f62fe";
            clearInterval(timer);
            timer = setInterval(() => {
                millisecound += 10;

                let dateTimer = new Date(millisecound);

                document.getElementById('callLength').value = watch.innerHTML =
                    ('0' + dateTimer.getUTCMinutes()).slice(-2) + ':' +
                    ('0' + dateTimer.getUTCSeconds()).slice(-2);
            }, 10);
        }
    </script>
</div>
