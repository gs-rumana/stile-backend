@php
    function active($path) {
        return Route::is($path) ? 'active shadow-primary' : 'link-body-emphasis';
    }
    function icon($icon, $path) {
        return Route::is($path) ? 'ri-'.$icon.'-fill' : 'ri-'.$icon.'-line';
    }
@endphp
<div class="d-flex flex-column flex-shrink-0 p-3 vh-100">
    <a href="/" class="mb-3 mb-md-0 link-body-emphasis text-decoration-none text-center">
        <span class="fs-4 fw-semibold">Stile Dashboard</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link rounded-5 {{active('dashboard')}}" aria-current="page">
                <i class="{{icon('dashboard', 'dashboard')}}"></i>
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('categories.index')}}" class="nav-link rounded-5 {{active('categories.index')}}" aria-current="page">
                <i class="ri-list-view"></i>
                Categories
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('sub-categories.index')}}" class="nav-link rounded-5 {{active('sub-categories.index')}}" aria-current="page">
                <i class="{{icon('git-merge', 'sub-categories.index')}}"></i>
                Sub Categories
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('features.index')}}" class="nav-link rounded-5 {{active('features.index')}}" aria-current="page">
                <i class="{{icon('sparkling-2', 'features.index')}}"></i>
                Product Features
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('products.index')}}" class="nav-link rounded-5 {{active('products.index')}}" aria-current="page">
                <i class="{{icon('box-1', 'products.index')}}"></i>
                Products
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link rounded-5 {{active('orders')}}" aria-current="page">
                <i class="{{icon('file-list-3', 'orders')}}"></i>
                Orders
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle"
            data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/gs-rumana.png" alt="" width="32" height="32"
                class="rounded-circle me-2">
            <strong>{{ Auth::user()->name }}</strong>
        </a>
        <ul class="dropdown-menu text-small shadow rounded-6">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
    </div>
</div>
