<div style="margin-left: 15%; margin-right:15%;">


    <form method="POST" action="{{ route('/scripts/enregistrer-script') }}">
        @csrf
        <div class="">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <x-input id="scriptId" class="block mt-1 w-full" type="hidden" name="scriptId" value="{{ $script->id }}"
                required />
            <x-input id="scriptTeamid" class="block mt-1 w-full" type="hidden" name="scriptTeamid"
                value="{{ $script->teamid }}" required />
            <div>
                <x-label for="scriptName" :value="__('Nom de script *')" />

                <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 1px 8px 0px;" id="scriptName"
                    class="block w-full mb-4" type="text" name="scriptName"
                    value="{{ old('scriptName') ?? $script->name }}" required autofocus />
            </div>
        </div>
        <div>

            <textarea name="content" id="editor">
                {!! $script->content !!}
            </textarea>
        </div>
        <div type="submit" class="mt-3">
            <div id="ajoutClient" class="lbtn-toolbar mt-2" style="margin-left: 29rem;"><button
                    class="btn btn-m btn-gray-800 d-inline-flex align-items-center">
                    Modifier Script</button>
            </div>
        </div>

    </form>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
</div>
</div>
<br style="user-select: none;">
