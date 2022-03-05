<div class="card card-body mb-6" style="width: fit-content;">
    <div
        style="display: flex; justify-content: space-between; align-items: baseline; flex-direction: row-reverse; margin-top:-0.3rem; margin-right:-0.8rem;">
        {{-- <h2 class="h5 mb-4">Informations Générales</h2> --}}

    </div>
    <div style="">
        <div style="width: fit-content;">
            {!! $script->content !!}
        </div>
    </div>


</div>
@if (Auth::user()->type === 'manager')
    <form method="POST" action="/scripts/supprimer-script">
        @csrf
        <input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="deleteId" class="block mt-1 w-full"
            type="hidden" name="deleteId" value="{{ $script->id }}" required>

        <button id="DelButton" style="margin-top:0.5rem; margin-left:40%; font-weight: 500; color: rgb(225, 29, 72)"
            type="submit">
            Supprimer ce script
        </button>
    </form>
@endif
