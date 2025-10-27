<x-app-layout>
    @section('content')
        <div class="container-fluid">
            <h2>Edit Banner</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('backend.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data" class="container py-4">
                @csrf
                @method('PUT')

                <div class="row g-4">
                    <!-- Title -->
                    <div class="col-md-6">
                        <label for="title" class="form-label fw-semibold">Title</label>
                        <input type="text" name="title" id="title" class="form-control" 
                            value="{{ old('title', $banner->title) }}" placeholder="Enter banner title">
                    </div>

                    <!-- Subtitle -->
                    <div class="col-md-6">
                        <label for="subtitle" class="form-label fw-semibold">Subtitle</label>
                        <input type="text" name="subtitle" id="subtitle" class="form-control" 
                            value="{{ old('subtitle', $banner->subtitle) }}" placeholder="Enter banner subtitle">
                    </div>

                    <!-- Button Text -->
                    <div class="col-md-6">
                        <label for="button_text" class="form-label fw-semibold">Button Text</label>
                        <input type="text" name="button_text" id="button_text" class="form-control" 
                            value="{{ old('button_text', $banner->button_text) }}" placeholder="Enter button text">
                    </div>

                    <!-- Button Link -->
                    <div class="col-md-6">
                        <label for="button_link" class="form-label fw-semibold">Button Link</label>
                        <input type="url" name="button_link" id="button_link" class="form-control" 
                            value="{{ old('button_link', $banner->button_link) }}" placeholder="https://example.com">
                    </div>

                    <!-- Image Upload -->
                    <div class="col-md-6">
                        <label for="image" class="form-label fw-semibold">Banner Image</label>
                        <input type="file" name="image" id="image" class="form-control" accept="image/*">

                        @if ($banner->image)
                            <div class="mt-3">
                                <label class="form-label text-muted">Current Image:</label><br>
                                <img src="{{ Storage::url($banner->image) }}" 
                                    alt="Current Banner" 
                                    class="border rounded shadow-sm" 
                                    style="width: 150px; height: auto;">
                            </div>
                        @endif
                    </div>

                    <!-- Active Toggle -->
                    <div class="col-md-6 d-flex align-items-center mt-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                                value="1" {{ old('is_active', $banner->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="is_active">Active</label>
                        </div>
                    </div>
                </div>

                <div class="mt-4 d-flex justify-content-end gap-2">
                    <a href="{{ route('backend.banners.index') }}" class="btn btn-outline-secondary px-4">
                        <i class="bi bi-arrow-left"></i> Cancel
                    </a>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-save"></i> Update Banner
                    </button>
                </div>
            </form>

        </div>

        @if (session('success'))
            <script>
                toastr.success("{{ session('success') }}");
            </script>
        @endif
    @endsection
</x-app-layout>