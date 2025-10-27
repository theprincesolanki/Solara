<x-app-layout>
    @section('content')
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Enquiries</h2>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="mb-5">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label for="subject-filter" class="form-label">Filter by Subject</label>
                                <select id="subject-filter" class="form-select">
                                    <option value="">All Subjects</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject }}">{{ $subject }}</option>
                                    @endforeach
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
                    <table id="enquiries-table" class="table table-striped table-hover" style="width:100%">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Subject</th>
                                <th>Submitted</th>
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
        <!-- Flatpickr CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @endpush

    @push('scripts')
        <!-- Flatpickr JS -->
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // Initialize Flatpickr for date range
                flatpickr('#date-range-filter', {
                    mode: 'range',
                    dateFormat: 'Y-m-d',
                    maxDate: 'today'
                });

                const table = $('#enquiries-table').DataTable({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    ajax: {
                        url: "{{ route('backend.enquiries.index') }}",
                        type: "GET",
                        data: function(d) {
                            // Add filter parameters
                            d.subject = $('#subject-filter').val();
                            d.date_range = $('#date-range-filter').val();
                        },
                        error: function(xhr, error, thrown) {
                            toastr.error('Failed to load enquiries. Please try again.');
                            console.error('DataTable AJAX error:', xhr, error, thrown);
                        }
                    },
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'name', name: 'name' },
                        { data: 'email', name: 'email' },
                        { data: 'phone', name: 'phone' },
                        { data: 'subject', name: 'subject' },
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
                        emptyTable: "No enquiries found.",
                        processing: "Loading enquiries..."
                    }
                });

                // Apply filters on change
                $('#subject-filter, #date-range-filter').on('change', function() {
                    table.ajax.reload(null, false);
                });

                // Refresh button clears filters and reloads
                $('#refresh-table').on('click', function() {
                    $('#subject-filter').val('');
                    $('#date-range-filter').val('');
                    table.ajax.reload(null, false);
                });

                // Delete enquiry
                $(document).on('click', '.delete-enquiry', function() {
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
                                url: "{{ route('backend.enquiries.destroy', ':id') }}".replace(':id', id),
                                type: 'DELETE',
                                success: function(res) {
                                    if (res.success) {
                                        toastr.success('Enquiry deleted successfully.');
                                        table.ajax.reload(null, false);
                                    } else {
                                        toastr.error(res.message || 'Failed to delete enquiry.');
                                    }
                                },
                                error: function(xhr) {
                                    let message = 'Server error. Try again later.';
                                    if (xhr.status === 403) {
                                        message = 'You do not have permission to delete this enquiry.';
                                    } else if (xhr.status === 404) {
                                        message = 'Enquiry not found.';
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