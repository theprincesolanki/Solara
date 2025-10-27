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
                                        <!-- Contact Fields -->
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Contact Name 1</label>
                                            <input type="text" class="form-control" name="contact_name1" placeholder="Enter contact name 1"
                                                value="{{ old('contact_name1', $settings->contact_name1 ?? '') }}">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Contact Phone 1</label>
                                            <input type="text" class="form-control" name="contact_phone1" placeholder="Enter contact phone 1"
                                                value="{{ old('contact_phone1', $settings->contact_phone1 ?? '') }}">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Contact Name 2</label>
                                            <input type="text" class="form-control" name="contact_name2" placeholder="Enter contact name 2"
                                                value="{{ old('contact_name2', $settings->contact_name2 ?? '') }}">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Contact Phone 2</label>
                                            <input type="text" class="form-control" name="contact_phone2" placeholder="Enter contact phone 2"
                                                value="{{ old('contact_phone2', $settings->contact_phone2 ?? '') }}">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Contact Name 3</label>
                                            <input type="text" class="form-control" name="contact_name3" placeholder="Enter contact name 3"
                                                value="{{ old('contact_name3', $settings->contact_name3 ?? '') }}">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Contact Phone 3</label>
                                            <input type="text" class="form-control" name="contact_phone3" placeholder="Enter contact phone 3"
                                                value="{{ old('contact_phone3', $settings->contact_phone3 ?? '') }}">
                                        </div>
                                        <!-- Email Fields -->
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Email Name 1</label>
                                            <input type="text" class="form-control" name="email_name1" placeholder="Enter email name 1"
                                                value="{{ old('email_name1', $settings->email_name1 ?? '') }}">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Email Address 1</label>
                                            <input type="email" class="form-control" name="email_address1" placeholder="Enter email address 1"
                                                value="{{ old('email_address1', $settings->email_address1 ?? '') }}">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Email Name 2</label>
                                            <input type="text" class="form-control" name="email_name2" placeholder="Enter email name 2"
                                                value="{{ old('email_name2', $settings->email_name2 ?? '') }}">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Email Address 2</label>
                                            <input type="email" class="form-control" name="email_address2" placeholder="Enter email address 2"
                                                value="{{ old('email_address2', $settings->email_address2 ?? '') }}">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Email Name 3</label>
                                            <input type="text" class="form-control" name="email_name3" placeholder="Enter email name 3"
                                                value="{{ old('email_name3', $settings->email_name3 ?? '') }}">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Email Address 3</label>
                                            <input type="email" class="form-control" name="email_address3" placeholder="Enter email address 3"
                                                value="{{ old('email_address3', $settings->email_address3 ?? '') }}">
                                        </div>
                                        <!-- Meta Fields -->
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Meta Title</label>
                                            <input type="text" class="form-control" name="meta_title" placeholder="Enter meta title"
                                                value="{{ old('meta_title', $settings->meta_title ?? '') }}">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Meta Author</label>
                                            <input type="text" class="form-control" name="meta_author" placeholder="Enter meta author"
                                                value="{{ old('meta_author', $settings->meta_author ?? '') }}">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Meta Robots</label>
                                            <input type="text" class="form-control" name="meta_robots" placeholder="Enter meta robots (e.g., index, follow)"
                                                value="{{ old('meta_robots', $settings->meta_robots ?? 'index, follow') }}">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">OG Image</label>
                                            <input type="file" class="form-control" name="og_image">
                                            @if(!empty($settings->og_image))
                                                <img src="{{ asset($settings->og_image) }}" class="mt-2" width="80">
                                            @endif
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Twitter Image</label>
                                            <input type="file" class="form-control" name="twitter_image">
                                            @if(!empty($settings->twitter_image))
                                                <img src="{{ asset($settings->twitter_image) }}" class="mt-2" width="80">
                                            @endif
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <label class="form-label">Meta Description</label>
                                            <textarea class="form-control" name="meta_description" placeholder="Enter meta description" rows="4">{{ old('meta_description', $settings->meta_description ?? '') }}</textarea>
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <label class="form-label">Meta Keywords</label>
                                            <textarea class="form-control" name="meta_keywords" placeholder="Enter meta keywords" rows="4">{{ old('meta_keywords', $settings->meta_keywords ?? '') }}</textarea>
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <label class="form-label">OG Title</label>
                                            <input type="text" class="form-control" name="og_title" placeholder="Enter OG title"
                                                value="{{ old('og_title', $settings->og_title ?? '') }}">
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <label class="form-label">OG Description</label>
                                            <textarea class="form-control" name="og_description" placeholder="Enter OG description" rows="4">{{ old('og_description', $settings->og_description ?? '') }}</textarea>
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <label class="form-label">Twitter Title</label>
                                            <input type="text" class="form-control" name="twitter_title" placeholder="Enter Twitter title"
                                                value="{{ old('twitter_title', $settings->twitter_title ?? '') }}">
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <label class="form-label">Twitter Description</label>
                                            <textarea class="form-control" name="twitter_description" placeholder="Enter Twitter description" rows="4">{{ old('twitter_description', $settings->twitter_description ?? '') }}</textarea>
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <label class="form-label">Map Embed Code</label>
                                            <textarea class="form-control" name="map_embed" placeholder="Enter map embed code" rows="4">{{ old('map_embed', $settings->map_embed ?? '') }}</textarea>
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea class="ckeditor form-control" id="description" name="description" rows="10">{{ old('description', $settings->description ?? '') }}</textarea>
                                        </div>
                                        <div id="flash-messages" data-success="{{ session('success') }}" data-error="{{ session('error') }}"></div>
                                        <div class="col-lg-12 text-end">
                                            <button type="submit" class="btn btn-primary">Update Site Settings</button>
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
@endsection
@push('scripts')
 <script>
        $(document).ready(function() {
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
                            reloadPage();
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
@endpush
</x-app-layout>
