<li class="list-group-item list-index d-flex justify-content-between align-items-center p-3 {{ $attributes->get('class') }}">
    <div class="d-flex align-items-center gap-3 flex-1">
        <img src="{{ $item->image_url }}" class="rounded-3" alt="" style="max-width: 10%;">
        <div>
            <h5 class="fw-semibold">{{ $item->name }}</h5>
            @if(method_exists($item, 'category'))
                <div><span class="badge bg-info-subtle text-dark fs-6">{{ $item->category->name }}</span></div>
            @endif
        </div>
    </div>

        <div class="flex-1">
            @if(method_exists($item, 'subCategories'))
                <div>Sub Categories <span class="badge text-bg-info">{{ $item->subCategories->count() }}</span></div>
            @endif
            <div>Products <span class="badge text-bg-info">{{ $item->products->count() }}</span></div>
        </div>

    <div class="d-flex align-items-center">
        <a href="{{ route($routePrefix . '.edit', $item->id) }}" class="btn btn-outline-success d-flex align-items-center gap-1 shadow-none">
            <i class="ri-pencil-line"></i> Edit
        </a>
        <form action="{{ route($routePrefix . '.destroy', $item->id) }}" method="POST" onsubmit="return confirm('{{ $confirmMessage }}')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger shadow-none d-flex align-items-center gap-1">
                <i class="ri-delete-bin-line"></i> Delete
            </button>
        </form>
    </div>
</li>
