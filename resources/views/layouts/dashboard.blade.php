<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/scss/main.scss', 'resources/js/app.js'])
    @endif

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
    <div class="row vh-100 mx-0">
        <div class="col-2">
            @include('components.dashboard.sidebar')
        </div>
        <div class="col-10 d-flex flex-column h-100">
            @include('components.dashboard.navbar')
            <div class="flex-grow-1 bg-body-tertiary p-4 overflow-auto rounded-8 mb-3 me-3" id="content">@yield('content')</div>
        </div>
    </div>
</body>

</html>
