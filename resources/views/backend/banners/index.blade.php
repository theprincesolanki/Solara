<x-app-layout>
    @section('content')
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Banners</h2>
                <a href="{{ route('backend.banners.create') }}" class="btn btn-primary">Add New Banner</a>
            </div>

            @if (session('success'))
                <script>
                    toastr.success("{{ session('success') }}");
                </script>
            @endif

            <div class="card p-3">
                <div class="row mb-5">
                    <div class="col-md-3">
                        <label for="title-filter" class="form-label">Filter by Title</label>
                        <input type="text" id="title-filter" class="form-control" placeholder="Enter title...">
                    </div>
                    <div class="col-md-3">
                        <label for="date-range-filter" class="form-label">Filter by Date Range</label>
                        <input type="text" id="date-range-filter" class="form-control" placeholder="Select date range...">
                    </div>
                    <div class="col-md-2 align-self-end">
                        <button id="refresh-table" class="btn btn-primary">
                            <i class="ri-refresh-line"></i> Reset
                        </button>
                    </div>
                </div>

                <table class="table" id="banners-table" class="table table-striped table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    @endsection

    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                flatpickr('#date-range-filter', {
                    mode: 'range',
                    dateFormat: 'Y-m-d',
                    maxDate: 'today'
                });

                const table = $('#banners-table').DataTable({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    ajax: {
                        url: "{{ route('backend.banners.index') }}",
                        type: "GET",
                        data: function(d) {
                            d.title = $('#title-filter').val();
                            d.date_range = $('#date-range-filter').val();
                        },
                        error: function(xhr, error, thrown) {
                            toastr.error('Failed to load banners. Please try again.');
                            console.error('DataTable AJAX error:', xhr, error, thrown);
                        }
                    },
                    columns: [
                        { data: 'id', name: 'id', orderable: false },
                        { data: 'image_display', name: 'image', orderable: false, searchable: false },
                        {
                            data: 'title',
                            name: 'title',
                            orderable: false,
                            render: function(data) {
                                if (!data) return '';
                                const limit = 25;
                                return data.length > limit
                                    ? `<span title="${data}">${data.substring(0, limit)}...</span>
                                    <a href="#" class="text-primary text-decoration-none read-more" data-full="${data}">Read more</a>`
                                    : data;
                            }
                        },
                        {
                            data: 'subtitle',
                            name: 'subtitle',
                            orderable: false,
                            render: function(data) {
                                if (!data) return '';
                                const limit = 30;
                                return data.length > limit
                                    ? `<span title="${data}">${data.substring(0, limit)}...</span>
                                    <a href="#" class="text-primary text-decoration-none read-more" data-full="${data}">Read more</a>`
                                    : data;
                            }
                        },
                        { data: 'status', name: 'is_active', orderable: false },
                        {
                            data: 'created_at',
                            name: 'created_at',
                            orderable: false,
                            render: function(data) {
                                return moment(data).format('DD MMM YYYY, hh:mm A');
                            }
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false,
                            render: function(data) {
                                return data;
                            }
                        }
                    ],
                    language: {
                        emptyTable: "No banners found.",
                        processing: "Loading banners..."
                    },
                    dom: 'lBfrtip',
                    buttons: [
                        { extend: 'excelHtml5', text: 'Export to Excel', title: 'Banner List' },
                        { extend: 'csvHtml5', text: 'Export to CSV', title: 'Banner List' },
                    ],
                    order: [[0, 'desc']]

                });

                $('#title-filter, #date-range-filter').on('change', function() {
                    table.ajax.reload(null, false);
                });

                $('#refresh-table').on('click', function() {
                    $('#title-filter').val('');
                    $('#date-range-filter').val('');
                    table.ajax.reload(null, false);
                });

                $(document).on('click', '.delete-banner', function() {
                    let id = $(this).data('id');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('backend.banners.destroy', ':id') }}".replace(':id', id),
                                type: 'DELETE',
                                success: function(res) {
                                    if (res.success) {
                                        toastr.success('Banner deleted successfully.');
                                        table.ajax.reload(null, false);
                                    } else {
                                        toastr.error(res.message || 'Failed to delete banner.');
                                    }
                                },
                                error: function(xhr) {
                                    let message = 'Server error. Try again later.';
                                    if (xhr.status === 403) {
                                        message = 'You do not have permission to delete this banner.';
                                    } else if (xhr.status === 404) {
                                        message = 'Banner not found.';
                                    }
                                    toastr.error(message);
                                    console.error('Delete AJAX error:', xhr);
                                }
                            });
                        }
                    });
                });

                $(document).on('click', '.read-more', function (e) {
                    e.preventDefault();
                    const fullText = $(this).data('full');
                    const title = 'Full Text';
                    Swal.fire({
                        title: title,
                        text: fullText,
                        icon: 'info',
                        confirmButtonText: 'Close'
                    });
                });

            });
        </script>
    @endpush
</x-app-layout>