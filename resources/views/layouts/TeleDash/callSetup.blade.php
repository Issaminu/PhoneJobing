<div id="mainBody" class="d-flex justify-content-between align-items-center py-4" style="width:40rem;">
    <div class="card card-body mb-6 shadow" style="align-items:center; border-radius:1.2rem;">
        <div style="display: flex; flex-direction:column; align-items: center;">
            <h2 class="h1 mb-6" style="color: #f0bc74; text-shadow: 1px 1px 2px #be7f26;">Lancer un appel
            </h2>
            <form action="dashboard/appel" method="post">
                <div style="display: flex; flex-direction:row;">
                    <div class="" style="display: flex; flex-direction:column;">
                        <x-label for="prodSelection" :value="__('Client:')" style="margin-left: 0.3rem;" />
                        <select class="form-select fmxw-200" style="margin-top:-0.5rem; width:15rem;" id="client"
                            name="client">
                            @foreach ($clients as $client)
                                <option value="{{ $client->name }}">{{ $client->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="display: flex; flex-direction:column; margin-left:3rem;">
                        <x-label for="prodSelection" :value="__('Script:')" style="margin-left: 0.3rem;" />
                        <select class="form-select fmxw-200" style="margin-top:-0.5rem; width:15rem;" id="script"
                            name="script">
                            @foreach ($scripts as $script)
                                <option value="{{ $script->name }}">{{ $script->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div style="display:flex; justify-content: center;">
                    <input class="form-control w-32 mt-5"
                        style="cursor: pointer; background-color:#2f3e53; border-radius:0.6rem; height:3rem; color:white; margin-top:2rem; margin-bottom:0.6rem; font-weight:600;"
                        type="submit" value="Démarrer">
                </div>

            </form>

        </div>
    </div>
</div>
