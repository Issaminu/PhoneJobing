<div style="display:flex;justify-content:center">
    <div style="margin-top:2rem; margin-left:5rem ; margin-bottom:2rem ; display: flex;">

        <div style="max-width: 28rem;flex-wrap: nowrap;">
            <div class="card card-body mb-6  drop-shadow" style=" flex-wrap:nowrap; flex-direction:row;">
                <button class="form-control h2 mt-2 mr-7"
                    style="width:7rem;font-weight:bold; text-shadow: 1px 1px 7px #b8b8b8;" id="startWatch"
                    onclick="startTimer()">Démarrer
                </button>
                <button class="form-control h1 mt-2 mr-7"
                    style="display:none; width:7rem; font-weight:bold; text-shadow: 1px 1px 7px #b8b8b8;"
                    id="pauseWatch" onclick="pauseTimer()">Arrêter
                </button>
                <div class="h1 mt-2" style="justify-content:center; color: #5e88d1; text-shadow: 1px 1px 2px #2a5fb4;"
                    id="stopwatch">00:00
                </div>
            </div>
            @include('layouts.TeleDash.client-body')
            <div class="card">
                @include('layouts.TeleDash.product-table')
            </div>
        </div>

        <div>
            <div id="script-body" class="card card-body shadow mb-6 ml-8 mr-8"
                style="padding:0rem; width: 55rem; max-height:41.67rem; padding-bottom:0.3rem;">
                <div class="h3 mt-3 d-flex drop-shadow" style="justify-content: center;">{{ $script->name }}</div>
                <hr class="mt-3" style="border: 2px solid #ced0d4;">
                <div style="width: fit-content;overflow-y:auto; padding-right:0rem;padding-left:0.7rem;">
                    {!! $script->content !!}
                </div>
                <hr class="mb-2" style="margin-top:0rem; border: 2px solid #ced0d4;">
            </div>

            <div class="card card-body shadow mb-6 ml-8"
                style="width: 55rem; background-color:#456392; border-color: rgb(235, 234, 234);">
                <form action="/dashboard/sauvegarder-appel" method="POST">
                    <div class="h3 mb-6 d-flex drop-shadow" style="justify-content: center; color:white">Résultat
                        d'appel
                    </div>
                    <input type="hidden" id='callLength' name="callLength">
                    <input type="hidden" id='callScript' name="callScript" value="{{ $script->id }}">
                    <input type="hidden" id='callClient' name="callClient" value="{{ $client->id }}">
                    <input type="hidden" id='callDate' name="callDate" value="{{ date('d/m/Y') }}">
                    <div class="d-flex" style="justify-content: space-evenly; align-items: flex-start;">

                        <div class="d-flex drop-shadow" style="flex-direction: column;">
                            <x-label for="prodQuantity" :value="__('Quantité:')" style="margin-left: 0.3rem; color:white;" />
                            <x-input
                                style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px; width:10rem; margin-top:-0.5rem; height:2.455rem; border-radius:0.5rem;"
                                id="prodQuantity" class="w-full form-control drop-shadow" type="text"
                                name="prodQuantity" onkeyup="selectingResult(document.getElementById('result'))"
                                onmouseup="selectingResult(document.getElementById('result'))" required />
                        </div>
                        <div class="mb-3" style=" width:10rem;">
                            @foreach ($products as $product)
                                <input type="hidden" id='{{ $product->id . 'Quantity' }}'
                                    value="{{ $product->quantity }}">
                            @endforeach
                            <input type="hidden" id='productId' name="productId" value="">
                            <x-label for="prodSelection" :value="__('Produit:')" style="margin-left: 0.3rem; color:white;" />
                            <select class="form-select fmxw-200 drop-shadow" style="margin-top:-0.5rem;"
                                id="prodSelection" name="prodSelection" onchange="selectingProduct(this)">
                                @foreach ($products as $product)
                                    <option id="{{ $product->id }}" value="{{ $product->name }}">
                                        <?php
                                        if (strlen($product->name) > 15) {
                                            echo substr(ucwords($product->name), 0, 14) . '...';
                                        } else {
                                            echo ucwords($product->name);
                                        }
                                        ?>
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex mb-3" style="flex-direction: column;">
                            <x-label class="drop-shadow" for="callResult" :value="__('Résultat:')"
                                style="margin-left: 0.3rem; color:white;" />
                            <select id="result" class="form-select fmxw-200 drop-shadow"
                                style="margin-top:-0.5rem; width:13rem;" name="callResult"
                                onchange="selectingResult(this)">
                                <option value="Vente réussie" selected="selected">Vente réussie</option>
                                <option value="Appel reporté">Appel reporté</option>
                                <option value="Vente non réalisée">Vente non réalisée</option>
                                <option value="Aucune réponse">Aucune réponse</option>
                                <option value="Mauvaise numéro">Mauvaise numéro</option>
                                <option value="Problème technique">Problème technique</option>
                            </select>
                        </div>
                        <button class="form-control w-32 mt-5 shadow" id="saveCall" style="{{-- THE CSS IS THE APP.CSS FILE --}}"
                            type="submit">
                            <h1 class="drop-shadow" style="color:white; font-weight:500;">Sauvegarder</h1>
                        </button>

                    </div>
                    <div class="d-flex" style="">
                    </div>
                    <br>
                </form>
            </div>
        </div>

    </div>
</div>
<div>
    <script>
        $('#prodQuantity').on('paste input', function() {
            let selectedProduct = document.getElementById("prodSelection").value;
            let prod = document.getElementById("prodSelection")[document.getElementById("prodSelection")
                .selectedIndex].id;
            let maxQuantity = document.getElementById(prod.concat('Quantity')).value;
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
            selectingProduct(document.getElementById("prodSelection"));
            allowSave(document.getElementById("result"));
        }
        let check = 0;
        let startButton = document.getElementById("startWatch");
        let pauseButton = document.getElementById("pauseWatch");

        function startTimer() {
            timeStart(1000);
            startButton.style.display = "none";
            pauseButton.style.display = "";
        }

        function pauseTimer() {
            if (startButton.style.display != "none") startButton.style.display = "none";
            if (pauseButton.style.visibility != "hidden") pauseButton.style.visibility = "hidden";
            timeStart(0);
        }

        function timeStart(val) {
            clearInterval(timer);
            timer = setInterval(() => {
                millisecound += val;

                let dateTimer = new Date(millisecound);

                document.getElementById('callLength').value = watch.innerHTML =
                    ('0' + dateTimer.getUTCMinutes()).slice(-2) + ':' +
                    ('0' + dateTimer.getUTCSeconds()).slice(-2);
            }, 1000);
        }
    </script>
    <script>
        function selectingResult(s) {
            allowSave(document.getElementById("result"));
            let result = s[document.getElementById("result").selectedIndex].value;
            if (result != "Vente réussie") {
                document.getElementById("prodSelection").setAttribute("disabled", "disabled");
                document.getElementById("prodQuantity").value = null;
                document.getElementById("prodQuantity").setAttribute("disabled", "disabled");
            } else {
                document.getElementById("prodSelection").removeAttribute("disabled");
                document.getElementById("prodQuantity").removeAttribute("disabled");
            }
        }
    </script>
    <script>
        function allowSave(s) {
            let result = s[document.getElementById("result").selectedIndex].value;
            if (result == "Vente réussie" && !(parseInt(document.getElementById("prodQuantity").value) >= 1)) {
                document.getElementById("saveCall").setAttribute("disabled", "disabled");
                document.getElementById("prodQuantity").setAttribute("required", "required");
            } else {
                document.getElementById("saveCall").removeAttribute("disabled");
                document.getElementById("prodQuantity").removeAttribute("required");
            }
        }
    </script>
    <script>
        function selectingProduct(s) {
            allowSave(document.getElementById("result"));
            document.getElementById('prodQuantity').value = 0;
            let prod = s[document.getElementById("prodSelection").selectedIndex].id;
            document.getElementById('productId').value = prod; //This is for productId attribute in the form request
            selectedProductQuantity = document.getElementById(prod.concat("Quantity")).value;
            document.getElementById('prodQuantity').value = "";
        }
    </script>

</div>
