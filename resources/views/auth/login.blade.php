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
    <style>
        .side {
            background-color: #ffffff00;
            opacity: 0.8;
            background-image: linear-gradient(30deg, #e86130 12%, transparent 12.5%, transparent 87%, #e86130 87.5%, #e86130), linear-gradient(150deg, #e86130 12%, transparent 12.5%, transparent 87%, #e86130 87.5%, #e86130), linear-gradient(30deg, #e86130 12%, transparent 12.5%, transparent 87%, #e86130 87.5%, #e86130), linear-gradient(150deg, #e86130 12%, transparent 12.5%, transparent 87%, #e86130 87.5%, #e86130), linear-gradient(60deg, #e8613077 25%, transparent 25.5%, transparent 75%, #e8613077 75%, #e8613077), linear-gradient(60deg, #e8613077 25%, transparent 25.5%, transparent 75%, #e8613077 75%, #e8613077);
            background-size: 34px 60px;
            background-position: 0 0, 0 0, 17px 30px, 17px 30px, 0 0, 17px 30px;
        }
    </style>
</head>

<body>
    <div class="row vh-100 justify-content-center mx-0">
        <div class="col-6 d-flex flex-column h-100 justify-content-center">
            <h1 class="fw-bold text-center">Login</h1>
            @error('email')
                <div class="alert alert-danger mt-4 rounded-5" role="alert">
                    {{ $message }}
                </div>
            @enderror
            <div class="bg-body-tertiary p-4 overflow-auto rounded-7 my-3">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" required autocomplete="email" value="{{ old('email') }}">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required autocomplete="current-password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
