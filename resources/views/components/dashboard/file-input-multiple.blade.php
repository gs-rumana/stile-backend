<!-- filepath: /Users/gursahb/Projects/Personal/Stile/backend-old/resources/views/components/dashboard/file-input-multiple.blade.php -->
<div class="image-input @error($name) is-invalid @enderror" id="image-input-{{$name}}">
    <input
        type="file"
        id="{{$name}}"
        accept="image/*"
        class="form-control d-none"
        name="{{ $name }}[]"
        multiple
    >

    <div id="preview-{{$name}}" class="text-center">
        {{-- Show images if value is provided --}}
        @if (isset($value) && is_array($value))
            @foreach ($value as $image)
                <div class="image-wrapper position-relative d-inline-block m-2">
                    <img src="{{ $image }}" alt="Image Preview" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                    <button type="button" class="btn btn-danger btn-sm remove-file" style="position: absolute; top: 0; right: 0;">
                        <i class="ri-close-line"></i>
                    </button>
                    <input type="hidden" name="{{ $name }}_existing[]" value="{{ $image }}">
                </div>
            @endforeach
        @elseif(old($name))
            @php $oldImages = old($name); @endphp
            @foreach ($oldImages as $oldImage)
                <div class="image-wrapper position-relative d-inline-block m-2">
                    <img src="{{ $oldImage }}" alt="Old Image Preview" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                    <button type="button" class="btn btn-danger btn-sm remove-file" style="position: absolute; top: 0; right: 0;">
                        <i class="ri-close-line"></i>
                    </button>
                    <input type="hidden" name="{{ $name }}_old[]" value="{{ $oldImage }}">
                </div>
            @endforeach
        @else
            {{-- Default UI --}}
            <i class="ri-upload-cloud-2-line fs-1 text-black d-block text-center"></i>
            <div class="text">
                Drag and Drop Images <br><small>or</small><br>
                <button type="button" class="btn shadow-sm" id="browse-{{$name}}">Click to Browse</button>
            </div>
        @endif
    </div>
</div>
@error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
@enderror

<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof jQuery === 'undefined') {
            console.error('jQuery is required for the file input component');
            return;
        }

        $(document).ready(function () {
            var fileInput = $('#{{$name}}');
            var previewContainer = $('#preview-{{$name}}');
            var allFiles = [];

            // Event handler for file input change
            fileInput.on('change', function() {
                handleFiles(this.files);
            });

            $('#image-input-{{$name}}').on('dragover', function (e) {
                e.preventDefault();
                $(this).addClass('dragover');
            });

            $('#image-input-{{$name}}').on('dragleave', function () {
                $(this).removeClass('dragover');
            });

            $('#image-input-{{$name}}').on('drop', function (e) {
                e.preventDefault();
                $(this).removeClass('dragover');
                handleFiles(e.originalEvent.dataTransfer.files);
            });

            $('#image-input-{{$name}}').on('click', '#browse-{{$name}}', function () {
                fileInput.click();
            });

            previewContainer.on('click', '.remove-file', function () {
                var index = $(this).data('index');
                allFiles.splice(index, 1);
                $(this).parent().remove();
                updatePreviewIndexes();

                if (!previewContainer.find('.image-wrapper').length) {
                    showDefaultInterface();
                }
            });

            function handleFiles(files) {
                for (var i = 0; i < files.length; i++) {
                    allFiles.push(files[i]);
                    createPreview(files[i], allFiles.length - 1);
                }
            }

            function createPreview(file, index) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    const imgWrapper = $('<div>', {
                        class: 'image-wrapper position-relative d-inline-block m-2'
                    });

                    const img = $('<img>', {
                        src: e.target.result,
                        alt: 'Image Preview',
                        class: 'img-thumbnail',
                        style: 'width: 100px; height: 100px; object-fit: cover;'
                    });

                    const removeBtn = $('<button>', {
                        type: 'button',
                        class: 'btn btn-danger btn-sm remove-file',
                        'data-index': index,
                        style: 'position: absolute; top: 0; right: 0;'
                    }).html('<i class="ri-close-line"></i>');

                    imgWrapper.append(img).append(removeBtn);
                    previewContainer.append(imgWrapper);
                };
                reader.readAsDataURL(file);
            }

            function updatePreviewIndexes() {
                previewContainer.find('.remove-file').each(function (index) {
                    $(this).data('index', index);
                });
            }

            function showDefaultInterface() {
                const defaultUI = `
                    <i class="ri-upload-cloud-2-line fs-1 text-black d-block text-center"></i>
                    <div class="text">
                        Drag and Drop Images <br><small>or</small><br>
                        <button type="button" class="btn shadow-sm" id="browse-{{$name}}">Click to Browse</button>
                    </div>
                `;

                previewContainer.html(defaultUI);
            }

            // Call this when no files/links are present
            if (!previewContainer.children().length) {
                showDefaultInterface();
            }

            // Ensure form submission includes the files
            fileInput.closest('form').on('submit', function() {
                if (allFiles.length) {
                    var dataTransfer = new DataTransfer();
                    allFiles.forEach(function(file) {
                        dataTransfer.items.add(file);
                    });
                    fileInput[0].files = dataTransfer.files;
                }
            });
        });
    });
</script>
