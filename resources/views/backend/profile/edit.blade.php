<x-app-layout>
@section('content')
<div class="container-fluid">
    <div class="position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg profile-setting-img">
            <img src="assets/images/profile-bg.jpg" class="profile-wid-img" alt="">
            <div class="overlay-content">
                <div class="text-end p-3">
                    <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                        <input id="profile-foreground-img-file-input" type="file" class="profile-foreground-img-file-input">
                        <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light">
                            <i class="ri-image-edit-line align-bottom me-1"></i> Change Cover
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xxl-3">
            <div class="card mt-n5">
                <div class="card-body p-4">
                    <div class="text-center">
                        @if (isset($settings) && $settings->site_logo)
                            <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                            <img src="{{ asset($settings->site_logo) }}" class="rounded-circle avatar-xl img-thumbnail user-profile-image material-shadow" alt="user-profile-image">
                            <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                <input id="profile-img-file-input" type="file" class="profile-img-file-input">
                                <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                    <span class="avatar-title rounded-circle bg-light text-body material-shadow">
                                        <i class="ri-camera-fill"></i>
                                    </span>
                                </label>
                            </div>
                        </div> 
                        @endif
                        <h5 class="fs-16 mb-1">{{ $user->name ?? '' }}</h5>
                        <p class="text-muted mb-0">Founder</p>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col-xxl-9">
            <div class="card mt-xxl-n5">
                <div class="card-header">
                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#userManagement" role="tab">
                                <i class="far fa-user"></i> User Management
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="userManagement" role="tabpanel">
                            <form id="profileUpdateForm">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="nameInput" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="nameInput" name="name" value="{{ $user->name ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="emailInput" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="emailInput" name="email" value="{{ $user->email ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="oldpasswordInput" class="form-label">Old Password</label>
                                            <div class="position-relative">
                                                <input type="password" class="form-control pe-5 password-input" id="oldpasswordInput" name="old_password"  value="{{ $user->show_password ?? '' }}">
                                                <button type="button" class="btn btn-link position-absolute end-0 top-0 text-muted password-addon">
                                                    <i class="ri-eye-fill align-middle"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="newpasswordInput" class="form-label">New Password</label>
                                            <div class="position-relative">
                                                <input type="password" class="form-control pe-5 password-input" id="newpasswordInput" name="password">
                                                <button type="button" class="btn btn-link position-absolute end-0 top-0 text-muted password-addon">
                                                    <i class="ri-eye-fill align-middle"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="confirmpasswordInput" class="form-label">Confirm Password</label>
                                            <div class="position-relative">
                                                <input type="password" class="form-control pe-5 password-input" id="confirmpasswordInput" name="password_confirmation">
                                                <button type="button" class="btn btn-link position-absolute end-0 top-0 text-muted password-addon">
                                                    <i class="ri-eye-fill align-middle"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </form>


                            <div class="mt-4 mb-3 border-bottom pb-2">
                                <h5 class="card-title">Today Your Login History</h5>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0 avatar-sm">
                                    <div class="avatar-title bg-light text-primary rounded-3 fs-18 material-shadow">
                                        <i class="ri-smartphone-line"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6>iPhone 12 Pro</h6>
                                    <p class="text-muted mb-0">Los Angeles, United States - March 16 at 2:47PM</p>
                                </div>
                                <div>
                                    <a href="javascript:void(0);">Logout</a>
                                </div>
                            </div>
                        </div>
                        <!--end tab-pane-->
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->

</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $("#profileUpdateForm").on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('backend.profile.update') }}",
                type: "POST",
                data: $(this).serialize(),
                success: function(res) {
                    if (res.status) {
                        toastr.success(res.message);
                        reloadPage();
                    } else {
                        toastr.error(res.message || "Something went wrong!");
                    }
                },
                error: function(err) {
                    if (err.responseJSON?.message) {
                        toastr.error(err.responseJSON.message);
                    }

                    if (err.responseJSON?.errors) {
                        $.each(err.responseJSON.errors, function(key, value) {
                            toastr.error(value[0]);
                        });
                    }
                }
            });
        });
    });

</script>
@endpush
</x-app-layout>

