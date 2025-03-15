@extends('layouts.dashboard')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h5 class="ms-4">Product Features</h5>
        <a href="{{ route('features.create') }}" class="btn btn-primary"><i class="ri-add-fill"></i> Create</a>
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
            @if(count($features) == 0) <li class="list-group-item text-center rounded-4 p-2 fs-5 fw-medium">No features found</li> @endif
            @foreach ($features as $feature)
           <li class="list-group-item list-index d-flex justify-content align-items-center p-2">
               <div class="d-flex align-items-center gap-3 flex-1">
                     <i class="{{ $feature->icon }} fs-3 text-primary"></i>
                   <div class="fw-semibold fs-5">{{ $feature->name }}</div>
               </div>
               <div class="d-flex align-items-center">
                   <a href="#" class="btn btn-outline-success d-flex align-items-center gap-1 shadow-none"><i class="ri-pencil-line"></i> Edit</a>
                   <form action="{{route('features.destroy', $feature->id)}}" method="POST" onsubmit="return confirm('You\'re Deleting this feature.\nDo you want to continue?')">
                       @csrf
                       @method('DELETE')
                       <button type="submit" class="btn btn-outline-danger shadow-none d-flex align-items-center gap-1"><i class="ri-delete-bin-line"></i> Delete</button>
                   </form>
               </div>
           </li>
            @endforeach
        </ul>
    </div>
@endsection
