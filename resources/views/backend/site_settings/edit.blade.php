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

            <!-- Left Sidebar: Social Media -->
            <div class="col-xxl-3">
                <div class="card mt-n5">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <div class="profile-user position-relative d-inline-block mx-auto mb-4">
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
                            <h5 class="fs-16 mb-1">{{ $user->name ?? '' }}</h5>
                            <p class="text-muted mb-0">Founder</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <form id="social-media-form" enctype="multipart/form-data">
                            @csrf
                            <h5 class="card-title mb-3">Social Media</h5>

                            @foreach (['facebook','instagram','twitter','linkedin','youtube','whatsapp','telegram'] as $social)
                                <div class="mb-3 d-flex">
                                    <div class="avatar-xs d-block flex-shrink-0 me-3">
                                        <span class="avatar-title rounded-circle fs-16 bg-primary material-shadow">
                                            <i class="ri-{{ $social }}-fill"></i>
                                        </span>
                                    </div>
                                    <input type="{{ $social=='whatsapp' ? 'text' : 'url' }}" class="form-control" name="{{ $social }}_url" 
                                           placeholder="{{ ucfirst($social) }} URL"
                                           value="{{ old($social.'_url', $settings->{$social.'_url'} ?? '') }}">
                                </div>
                            @endforeach

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Update Social Links</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Content -->
            <div class="col-xxl-9">
                <div class="card mt-xxl-n5">
                    <div class="card-header">
                        <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#siteSettings" role="tab">
                                    <i class="fas fa-home"></i> Site Settings
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#smtpSettings" role="tab">
                                    <i class="far fa-envelope"></i> SMTP Settings
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body p-4">
                        <div class="tab-content">

                            <!-- Site Settings Tab -->
                            <div class="tab-pane active" id="siteSettings" role="tabpanel">
                                <form id="site-settings-form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Site Name</label>
                                            <input type="text" class="form-control" name="site_name" placeholder="Enter site name"
                                                value="{{ old('site_name', $settings->site_name ?? '') }}">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Site Logo</label>
                                            <input type="file" class="form-control" name="site_logo">
                                            @if(!empty($settings->site_logo))
                                                <img src="{{ asset($settings->site_logo) }}" class="mt-2" width="80">
                                            @endif
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Favicon</label>
                                            <input type="file" class="form-control" name="site_favicon">
                                            @if(!empty($settings->site_favicon))
                                                <img src="{{ asset($settings->site_favicon) }}" class="mt-2" width="40">
                                            @endif
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-control" name="address" placeholder="Enter address"
                                                value="{{ old('address', $settings->address ?? '') }}">
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control custom-editor" name="description" rows="5">{!! old('description', $settings->description ?? '') !!}</textarea>
                                            <div class="custom-editor-word-count mt-3"></div>
                                        </div>
                                        <div class="col-lg-12 text-end">
                                            <button type="submit" class="btn btn-primary ">Update Site Settings</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- SMTP Settings Tab -->
                            <div class="tab-pane" id="smtpSettings" role="tabpanel">
                                <form id="smtp-settings-form">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-lg-6">
                                            <label class="form-label">SMTP Host</label>
                                            <input type="text" class="form-control" name="smtp_host" placeholder="SMTP Host"
                                                value="{{ old('smtp_host', $settings->smtp_host ?? '') }}">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label">SMTP Port</label>
                                            <input type="text" class="form-control" name="smtp_port" placeholder="SMTP Port"
                                                value="{{ old('smtp_port', $settings->smtp_port ?? '') }}">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label">SMTP Username</label>
                                            <input type="text" class="form-control" name="smtp_username" placeholder="SMTP Username"
                                                value="{{ old('smtp_username', $settings->smtp_username ?? '') }}">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label">SMTP Password</label>
                                            <input type="password" class="form-control" name="smtp_password" placeholder="SMTP Password"
                                                value="{{ old('smtp_password', $settings->smtp_password ?? '') }}">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label">Encryption</label>
                                            <select class="form-select" name="smtp_encryption">
                                                <option value="">None</option>
                                                <option value="ssl" {{ ($settings->smtp_encryption ?? '') == 'ssl' ? 'selected' : '' }}>SSL</option>
                                                <option value="tls" {{ ($settings->smtp_encryption ?? '') == 'tls' ? 'selected' : '' }}>TLS</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label">From Email</label>
                                            <input type="email" class="form-control" name="smtp_from_address" placeholder="From Email"
                                                value="{{ old('smtp_from_address', $settings->smtp_from_address ?? '') }}">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label">From Name</label>
                                            <input type="text" class="form-control" name="smtp_from_name" placeholder="From Name"
                                                value="{{ old('smtp_from_name', $settings->smtp_from_name ?? '') }}">
                                        </div>
                                        <div class="col-lg-12 text-end">
                                            <button type="submit" class="btn btn-success">Update SMTP</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') || $('input[name="_token"]').val()
                }
            });

            function ajaxFormSubmit(formId, url) {
                $(formId).on('submit', function(e) {
                    e.preventDefault();

                    let form = this;
                    let formData = new FormData(form);

                    $.ajax({
                        url: url,
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(res) {
                            toastr.success(res.success || 'Updated successfully!');
                        },
                        error: function(xhr) {
                            if(xhr.status === 422){
                                let errors = xhr.responseJSON.errors;
                                $.each(errors, function(key, value){
                                    toastr.error(value[0]);
                                });
                            } else {
                                toastr.error('Something went wrong!');
                            }
                        }
                    });
                });
            }

            ajaxFormSubmit('#social-media-form', '{{ route("backend.site-settings.update") }}');
            ajaxFormSubmit('#site-settings-form', '{{ route("backend.site-settings.update") }}');
            ajaxFormSubmit('#smtp-settings-form', '{{ route("backend.site-settings.update") }}');
        });
    </script>

@endsection
</x-app-layout>
