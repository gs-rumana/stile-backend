@extends('layouts.dashboard')

@section('content')
    <h5 class="ms-4 mb-4">Add New Sub Category</h5>
    <div class="card card-body rounded-4 bg-body-secondary shadow-sm">
        <form action="{{ route('sub-categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-row top">
                <div class="col-md-6"><label for="category_id" class="form-label flex-1">Parent Category</label></div>
                <div class="col-md-6">
                    {{-- <input type="text" class="form-control @error('category_id') is-invalid @enderror" placeholder="Enter Category Name" id="name" name="name" required value="{{ old('name') }}"> --}}
                    <select name="category_id" id="category_id" class="form-select form-control">
                        <option value="">Choose Category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
            </div>
            <div class="input-row middle">
                <div class="col-md-6"><label for="name" class="form-label flex-1">Sub Category Name</label></div>
                <div class="col-md-6">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Category Name" id="name" name="name" value="{{ old('name') }}">
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
            </div>
            <div class="input-row mb-3 bottom">
                <div class="col-md-6"><label for="name" class="form-label flex-1">Sub Category Image</label></div>
                <div class="col-md-6"><x-dashboard.file-input name="image" /></div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
