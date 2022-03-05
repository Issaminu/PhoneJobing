<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Testing Page</title>
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script>
    </script> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link rel="stylesheet" href="{{ asset('/css/trix.css') }}"> --}}
    <!--Include the JS & CSS-->
    {{-- <link rel="stylesheet" href="/richtexteditor/rte_theme_default.css" />
    <script type="text/javascript" src="/richtexteditor/rte.js"></script>
    <script type="text/javascript" src='/richtexteditor/plugins/all_plugins.js'></script> --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
    {{-- <script src="ckeditor/build/ckeditor.js"></script> --}}

</head>

<body>
    @include('layouts.navigation')
    <form action="test/test" method="post">
        <div class="" style="margin-left: 13%;margin-right: 13%; margin-top:7rem;">
            <textarea name="content" id="editor">
                &lt;p>This is some sample content.&lt;/p>
            </textarea>
        </div>

        <p><input type="submit" value="Submit"></p>
    </form>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>

</body>

</html>


</body>

</html>
