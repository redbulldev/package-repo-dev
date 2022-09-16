<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset(base_path('core/repo/public/style.css'))}}" type="text/css" rel="stylesheet">
    <base >
    <title>Demo module</title>
</head>

@php
    $image = base_path().'/core/repo/public/images/laravel-red.svg';
    $imageData = base64_encode(file_get_contents($image));
    $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
    $data =  '<img src="' . $src . '" alt="laravel logolockup cmyk red" width="500" height="600">';
@endphp

<body>
    <div style="text-align: center">
        @php
            echo $data;
        @endphp

        <h2>{{trans('rebbull-demo::demo.name')}}: This is the first module of Laravel</h2>
    </div>
</body>

</html>

