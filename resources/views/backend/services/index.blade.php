<x-app-layout>
    @section('content')
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Services</h2>
                <a href="{{ route('backend.services.create') }}" class="btn btn-primary">
                    <i class="ri-add-line"></i> Add New Service
                </a>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="mb-5">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label for="status-filter" class="form-label">Filter by Status</label>
                                <select id="status-filter" class="form-select">
                                    <option value="">All</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="date-range-filter" class="form-label">Filter by Date Range</label>
                                <input type="text" id="date-range-filter" class="form-control" placeholder="Select date range">
                            </div>
                            <div class="col-md-2 align-self-end">
                                <button id="refresh-table" class="btn btn-primary">
                                    <i class="ri-refresh-line"></i> Reset
                                </button>
                            </div>
                        </div>
                    </div>

                    <table id="services-table" class="table table-striped table-hover" style="width:100%">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
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

                const table = $('#services-table').DataTable({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    ajax: {
                        url: "{{ route('backend.services.index') }}",
                        type: "GET",
                        data: function(d) {
                            d.status = $('#status-filter').val();
                            d.date_range = $('#date-range-filter').val();
                        },
                        error: function(xhr, error, thrown) {
                            toastr.error('Failed to load services. Please try again.');
                            console.error('DataTable AJAX error:', xhr, error, thrown);
                        }
                    },
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'title', name: 'title' },
                        { data: 'description', name: 'description' },
                        {
                            data: 'status',
                            name: 'status',
                            render: function(data) {
                                return data == 1
                                    ? '<span class="badge bg-success">Active</span>'
                                    : '<span class="badge bg-danger">Inactive</span>';
                            }
                        },
                        {
                            data: 'created_at',
                            name: 'created_at',
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
                        emptyTable: "No services found.",
                        processing: "Loading services..."
                    }
                });

                $('#status-filter, #date-range-filter').on('change', function() {
                    table.ajax.reload(null, false);
                });

                $('#refresh-table').on('click', function() {
                    $('#status-filter').val('');
                    $('#date-range-filter').val('');
                    table.ajax.reload(null, false);
                });

                $(document).on('click', '.delete-service', function() {
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
                                url: "{{ route('backend.services.destroy', ':id') }}".replace(':id', id),
                                type: 'DELETE',
                                success: function(res) {
                                    if (res.success) {
                                        toastr.success('Service deleted successfully.');
                                        table.ajax.reload(null, false);
                                    } else {
                                        toastr.error(res.message || 'Failed to delete service.');
                                    }
                                },
                                error: function(xhr) {
                                    let message = 'Server error. Try again later.';
                                    if (xhr.status === 403) {
                                        message = 'You do not have permission to delete this service.';
                                    } else if (xhr.status === 404) {
                                        message = 'Service not found.';
                                    }
                                    toastr.error(message);
                                    console.error('Delete AJAX error:', xhr);
                                }
                            });
                        }
                    });
                });
            });
        </script>
    @endpush
</x-app-layout>
