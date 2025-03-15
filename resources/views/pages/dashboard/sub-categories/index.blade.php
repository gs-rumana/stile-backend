@extends('layouts.dashboard')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h5 class="ms-4">Sub Categories</h5>
        <a href="{{ route('sub-categories.create') }}" class="btn btn-primary"><i class="ri-add-fill"></i> Create</a>
    </div>
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="d-flex justify-content-end my-4">
        <form class="d-flex bg-body-secondary rounded-6 p-2" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search">
            <button class="btn btn-outline-success px-1 shadow-none" type="submit"><i class="ri-search-line"></i></button>
        </form>
    </div>
    <div class="card card-body rounded-7 bg-body-secondary shadow-sm">
        <ul class="list-group rounded-5">
            @if(count($subCategories) == 0) <li class="list-group-item text-center rounded-4 p-2 fs-5 fw-medium">No sub-categories found</li> @endif
            @foreach ($subCategories as $subCategory)
{{--            <li class="list-group-item rounded-4 d-flex justify-content-between align-items-center p-2 @if(session()->has('id')) @if(session('id') === $subCategory->id) blink @endif @endif">--}}
{{--                <div class="d-flex align-items-center gap-3">--}}
{{--                    <img src="{{ $subCategory->image_url }}"--}}
{{--                        class="rounded-3" alt="" width="15%">--}}
{{--                    <h5 class="fw-semibold">{{ $subCategory->name }}</h5>--}}
{{--                </div>--}}
{{--                <div class="d-flex gap-2 align-items-center">--}}
{{--                    <a href="#" class="btn btn-outline-success d-flex align-items-center gap-1"><i class="ri-pencil-line"></i> Edit</a>--}}
{{--                    <form action="{{route('sub-categories.destroy', $subCategory->id)}}" method="POST" onsubmit="return confirm('Deleting this sub-category will delete all products of this sub-category.\nDo you want to continue?')">--}}
{{--                        @csrf--}}
{{--                        @method('DELETE')--}}
{{--                        <button type="submit" class="btn btn-outline-danger d-flex align-items-center gap-1"><i class="ri-delete-bin-line"></i> Delete</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </li>--}}
                    <x-dashboard.category-list
                        :item="$subCategory"
                        :show-counts="false"
                        route-prefix="sub-categories"
                        confirm-message="Deleting this sub-category will delete all products of this sub-category.
Do you want to continue?"
                        :class="session('id') === $subCategory->id ? 'blink' : ''"
                    />
            @endforeach
        </ul>
    </div>
@endsection
