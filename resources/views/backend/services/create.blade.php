<x-app-layout>
    @section('styles')
        <style>
            .text-danger {
                font-size: 14px;
            }
            .spin {
                animation: spin 1s linear infinite;
            }
            @keyframes spin {
                100% { transform: rotate(360deg); }
            }
        </style>
    @endsection
    @section('content')
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Add New Service</h2>
                <a href="{{ route('backend.services.index') }}" class="btn btn-primary">
                    <i class="ri-arrow-go-back-line"></i> Back
                </a>
            </div>

            <div class="card">
                <div class="card-body">
                    <form id="serviceForm" enctype="multipart/form-data">
                        @include('backend.services.form')
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="ri-save-line"></i> Save
                            </button>
                            <a href="{{ route('backend.services.index') }}" class="btn btn-light">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.select2').select2({
                    placeholder: "Select status",
                    allowClear: true
                });
    
                $.ajaxSetup({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                });

                function validateForm() {
                    let title = $('#title').val().trim();
                    let description = $('#description').val().trim();
                    let status = $('#status').val();

                    let valid = true;
                    $('.text-danger').text('');

                    if (title === '') {
                        $('#titleError').text('Title is required.');
                        valid = false;
                    } else if (title.length < 3) {
                        $('#titleError').text('Title must be at least 3 characters.');
                        valid = false;
                    }

                    if (description.length > 0 && description.length < 5) {
                        $('#descriptionError').text('Description should be at least 5 characters long.');
                        valid = false;
                    }

                    if (status === '') {
                        $('#statusError').text('Please select a status.');
                        valid = false;
                    }

                    return valid;
                }

                $('#serviceForm').on('submit', function(e) {
                    e.preventDefault();

                    let formData = new FormData(this);
                    let id = $('#service_id').val();
                    let url = id 
                        ? "{{ route('backend.services.update', ':id') }}".replace(':id', id)
                        : "{{ route('backend.services.store') }}";

                    let method = id ? 'POST' : 'POST';
                    if (id) formData.append('_method', 'PUT');

                    $.ajax({
                        url: url,
                        type: method,
                        data: formData,
                        processData: false,
                        contentType: false,
                        beforeSend: function() {
                            $('.text-danger').text('');
                        },
                        success: function(response) {
                            toastr.success(response.message);
                            window.location.href = "{{ route('backend.services.index') }}";
                        },
                        error: function(xhr) {
                            if (xhr.status === 422) {
                                let errors = xhr.responseJSON.errors;
                                $.each(errors, function(key, value) {
                                    $('#' + key + 'Error').text(value[0]);
                                });
                            } else {
                                toastr.error('Something went wrong.');
                            }
                        }
                    });
                });

            });
        </script>
    @endpush
</x-app-layout>
