<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        <script src="https://use.fontawesome.com/aefa161e3a.js"></script>
        <title>Laravel</title>
 
    </head>
    <body>
        <div id="app" class="vh-100">
            
        </div>
        <script src="{{ asset('js/ckfinder/ckfinder.js') }}"></script>
        <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>    
        <script src="{{ mix('js/app.js')}}"></script>
    </body>
</html>
