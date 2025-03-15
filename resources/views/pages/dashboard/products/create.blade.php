@extends('layouts.dashboard')

@section('content')
    <h5 class="ms-4 mb-4">Add New Product</h5>
    <div class="card card-body rounded-7 bg-body-secondary shadow-sm">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" id="product-form">
            @csrf
            <!-- Basic Info Section -->
            <div class="section mb-4">
                <h6 class="mb-2 ms-3">Basic Information</h6>
                <div class="input-row rounded-top-6 rounded-bottom-0">
                    <div class="col-md-6"><label for="name" class="form-label">Product Name</label></div>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               placeholder="Enter Product Name" id="name" name="name" required>
                    </div>
                </div>

                <div class="input-row middle">
                    <div class="col-md-6"><label for="category" class="form-label">Category</label></div>
                    <div class="col-md-6">
                        <select name="category_id" id="category" class="form-select" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="input-row mb-3 bottom">
                    <div class="col-md-6"><label for="sub_category" class="form-label">Sub Category</label></div>
                    <div class="col-md-6" id="sub-category-container">
                        <select name="sub_category_id" id="sub_category" class="form-select" required disabled>
                            <option value="">Select Category First</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Pricing Section -->
            <div class="section mb-4">
                <h6 class="mb-2 ms-3">Pricing</h6>
                <div class="input-row top border-bottom">
                    <div class="col-md-6"><label for="min_price" class="form-label">Minimum Price</label></div>
                    <div class="col-md-6">
                        <input type="number" step="0.01" class="form-control" id="min_price" name="min_price" required>
                    </div>
                </div>

                <div class="input-row bottom mb-3">
                    <div class="col-md-6"><label for="max_price" class="form-label">Maximum Price</label></div>
                    <div class="col-md-6">
                        <input type="number" step="0.01" class="form-control" id="max_price" name="max_price" required>
                    </div>
                </div>
            </div>

            <!-- Product Units Section -->
            <div class="section mb-4">
                <h6 class="mb-2 ms-3">Product Units</h6>
                <div id="product-units" class="border p-3 rounded-7 mb-3">
                    <div class="unit-row mb-not-last">
                        <div class="row g-3 justify-content-between">
                            <div class="col-md-3">
                                <input type="number" class="form-control" name="units[0][price]" placeholder="Price" required>
                            </div>
                            <div class="col-md-2">
                                <input type="number" class="form-control" name="units[0][discount]" placeholder="Discount %">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="units[0][color]" placeholder="Color">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="units[0][size]" placeholder="Size">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="units[0][material]" placeholder="Material">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary" id="add-unit">Add Unit</button>
            </div>

            <!-- Images Section -->
            <div class="section mb-4">
                <h6 class="mb-2 ms-3">Images</h6>
                <div class="input-row top border-bottom">
                    <div class="col-md-6"><label for="image" class="form-label">Main Image</label></div>
                    <div class="col-md-6">
                        @include('components.dashboard.file-input', [
                            'name' => 'image',
                            'isMultiple' => false,
                        ])
                    </div>
                </div>

                <div class="input-row mb-3 bottom">
                    <div class="col-md-6"><label for="gallery" class="form-label">Gallery Images</label></div>
                    <div class="col-md-6">
                        @include('components.dashboard.file-input-multiple', [
                            'name' => 'gallery',
                            'isMultiple' => true,
                        ])
                    </div>
                </div>
            </div>

            <!-- Features Section -->
            <div class="section mb-4">
                <h6 class="mb-2 ms-3">Features</h6>
                <div id="features-container" class="border p-3 mb-3 rounded-7">
                    <div class="feature-row mb-not-last">
                        <div class="row g-3">
                            <div class="col-md-5">
                                <select class="form-select" name="features[0][feature_id]">
                                    <option value="">Select Feature</option>
                                    {{-- @foreach($features as $feature)
                                        <option value="{{ $feature->id }}">{{ $feature->name }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="features[0][value]" placeholder="Feature Value">
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-danger remove-feature w-100"><i class="ri-delete-bin-line"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary" id="add-feature">Add Feature</button>
            </div>

            <!-- Meta Section -->
            <div class="section mb-4">
                <h6 class="mb-2 ms-3">Meta</h6>
                <div class="input-row top">
                    <div class="col-md-6"><label for="image" class="form-label">Tags</label></div>
                    <div class="col-md-6">
                        <div class="form-control p-2">
                            <div id="tags-container" class="d-flex flex-wrap gap-2"></div>
                            <input type="text" id="tags-input" class="border-0 w-100" placeholder="Type tag and press comma">
                            <input type="hidden" name="tags" id="tags-hidden">
                        </div>
                    </div>
                </div>

                <div class="input-row middle">
                    <div class="col-md-6"><label for="gallery" class="form-label">Status</label></div>
                    <div class="col-md-6">
                        <select name="status" class="form-select">
                            <option value="Published">Published</option>
                            <option value="Draft">Draft</option>
                        </select>
                    </div>
                </div>
                <div class="input-row mb-3 bottom">
                    <div class="col-md-6"><label for="gallery" class="form-label">Description</label></div>
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <div id="description" class="form-control rounded-5"></div>
                            <input type="hidden" name="description" id="description-hidden">
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Create Product</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize Quill editor
            const quill = new Quill('#description', {
                theme: 'snow',
                // TODO: Add more modules as needed and make top corners rounded
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline', 'strike'],
                        [{ 'header': 1 }, { 'header': 2 }],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        [{ 'align': [] }],
                        ['clean'],
                    ]
                },
                placeholder: "Write product description...",
            });

            // Handle form submission
            $('#product-form').on('submit', function() {
                $('#description-hidden').val(quill.root.innerHTML);
                const tags = [];
                $('#tags-container .tag').each(function() {
                    tags.push($(this).data('tag'));
                });
                $('#tags-hidden').val(JSON.stringify(tags));
            });

            // Handle tags input
            $('#tags-input').on('keyup', function(e) {
                if (e.key === ',' || e.keyCode === 188) {
                    const tag = $(this).val().slice(0, -1).trim();
                    if (tag) {
                        appendTag(tag);
                        $(this).val('');
                    }
                }
            });

            // Handle adding product units
            let unitCount = 1;
            $('#add-unit').click(function() {
                const newUnit = `<div class="unit-row mb-not-last">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <input type="number" class="form-control" name="units[${unitCount}][price]" placeholder="Price" required>
                            </div>
                            <div class="col-md-2">
                                <input type="number" class="form-control" name="units[${unitCount}][discount]" placeholder="Discount %">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="units[${unitCount}][color]" placeholder="Color">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="units[${unitCount}][size]" placeholder="Size">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="units[${unitCount}][material]" placeholder="Material">
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-danger remove-unit w-100"><i class="ri-delete-bin-line"></i></button>
                            </div>
                        </div>
                    </div>`;
                $('#product-units').append(newUnit);
                unitCount++;
            });

            // Handle adding features
            let featureCount = 1;
            $('#add-feature').click(function() {
                const newFeature = $('.feature-row').first().clone();
                newFeature.find('select, input').each(function() {
                    const name = $(this).attr('name');
                    $(this).attr('name', name.replace('[0]', `[${featureCount}]`)).val('');
                });
                $('#features-container').append(newFeature);
                featureCount++;
            });

            // Handle removing units and features
            $(document).on('click', '.remove-unit', function() {
                if ($('.unit-row').length > 1) {
                    $(this).closest('.unit-row').remove();
                }
            });

            $(document).on('click', '.remove-feature', function() {
                if ($('.feature-row').length > 1) {
                    $(this).closest('.feature-row').remove();
                }
            });

            // Load sub-categories when category changes
            $('#category').change(function() {
                const categoryId = $(this).val();
                if (categoryId) {
                    $.ajax({
                        url: `/sub-categories-of-category/${categoryId}`,
                        beforeSend: function() {
                            $('#sub_category').empty().prop('disabled', true)
                                .append('<option value="">Loading...</option>');
                        },
                        success: function(data) {
                            const select = $('#sub_category');
                            if (data.length === 0) {
                                select.empty().prop('disabled', true)
                                    .append('<option value="">No Sub Category Found</option>');
                                return;
                            }
                            select.empty().prop('disabled', false);
                            select.append('<option value="">Select Sub Category</option>');
                            data.forEach(function(item) {
                                select.append(`<option value="${item.id}">${item.name}</option>`);
                            });
                        }
                    });
                    // $.get(`/sub-categories-of-category/${categoryId}`, function(data) {
                    //     const select = $('#sub_category');
                    //     select.empty().prop('disabled', false);
                    //     select.append('<option value="">Select Sub Category</option>');
                    //     data.forEach(function(item) {
                    //         select.append(`<option value="${item.id}">${item.name}</option>`);
                    //     });
                    // });
                } else {
                    $('#sub_category').empty().prop('disabled', true)
                        .append('<option value="">Select Category First</option>');
                }
            });
        });

        function appendTag(text) {
            const tag = `<div class="tag badge bg-primary me-2" data-tag="${text}">
                ${text}
                <i class="ri-close-line ms-1" onclick="removeTag(this)"></i>
            </div>`;
            $('#tags-container').append(tag);
        }

        function removeTag(element) {
            $(element).parent().remove();
        }
    </script>
@endsection
