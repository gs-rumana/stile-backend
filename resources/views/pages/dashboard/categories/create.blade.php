@extends('layouts.dashboard')

@section('content')
    <h5 class="ms-4 mb-4">Add New Category</h5>
    <div class="card card-body rounded-7 bg-body-secondary shadow-sm">
        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-row top">
                <div class="col-md-6"><label for="name" class="form-label flex-1">Category Name</label></div>
                <div class="col-md-6">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Category Name" id="name" name="name" required value="{{ old('name') }}">
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
            </div>
            <div class="input-row middle">
                <div class="col-md-6"><label for="name" class="form-label flex-1">Category Image</label></div>
                <div class="col-md-6">
                    @include('components.dashboard.file-input', ['name' => 'image', 'isMultiple' => false])
                </div>
            </div>
            <div class="input-row mb-3 bottom">
                <div class="col-md-6"><label for="name" class="form-label flex-1">Category Banner</label></div>
                <div class="col-md-6">
                    @include('components.dashboard.file-input', ['name' => 'banner', 'isMultiple' => false])
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
