<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/translations/fr.js"></script>

    <style>
        .ck-editor__editable_inline {
            min-height: 300px;
        }

        div.ck.ck-editor__editable_inline * {
            all: revert;
        }
    </style>

</head>

<body>
    @include('layouts.navigation')
    @include('layouts.Scripts.add-script-header')
    <div id="mainBody">
        <form method="POST" action="{{ route('scripts/ajout-script') }}">
            @csrf
            <div class="">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <div>
                    <x-label for="scriptName" :value="__('Nom de script *')" />

                    <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="scriptName"
                        class="block w-full mb-4" type="text" name="scriptName" :value="old('scriptName')" required
                        autofocus />
                </div>
            </div>
            <div>

                <textarea name="content" id="editor">

                </textarea>
            </div>
            <div type="submit" class="flex items-center justify-center mt-1 mr-5">
                <x-button class="h-10 rounded mt-5">
                    {{ __('Ajouter Script') }}
                </x-button>
            </div>
        </form>
        <script>
            ClassicEditor.defaultConfig = {
                toolbar: {
                    items: [
                        'heading',
                        '|',
                        'bold',
                        'italic',
                        '|',
                        'bulletedList',
                        'numberedList',
                        '|',
                        'undo',
                        'redo'
                    ]
                },
                table: {
                    contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
                },
                language: 'fr'
            };
            ClassicEditor
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });
        </script>
    </div>
    </div>
    <br style="user-select: none;">
</body>

</html>
