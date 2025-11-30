
    <footer class="site-footer">
        <div class="upper-footer">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="widget about-widget">
                            @if($siteSetting && $siteSetting->site_logo)
                            <div class="logo widget-title mb-3">
                                <img src="{{ asset('storage/' . $siteSetting->site_logo) }}" alt="{{ $siteSetting->site_name ?? 'Site Logo' }}" class="img-fluid"style="max-height: 70px;">
                            </div>
                            @endif
                            <p class="text-muted">
                                {{ $siteSetting->description ?? 'Mikago arm towards the viewer gregor then turned to look out the window at the dull weather' }}
                            </p>

                            <div class="social-icons mt-3">
                                <ul class="list-inline mb-0">
                                    @if($siteSetting->facebook_url)
                                        <li class="list-inline-item"><a href="{{ $siteSetting->facebook_url }}" target="_blank"><i class="ti-facebook"></i></a></li>
                                    @endif
                                    @if($siteSetting->twitter_url)
                                        <li class="list-inline-item"><a href="{{ $siteSetting->twitter_url }}" target="_blank"><i class="ti-twitter-alt"></i></a></li>
                                    @endif
                                    @if($siteSetting->linkedin_url)
                                        <li class="list-inline-item"><a href="{{ $siteSetting->linkedin_url }}" target="_blank"><i class="ti-linkedin"></i></a></li>
                                    @endif
                                    @if($siteSetting->instagram_url)
                                        <li class="list-inline-item"><a href="{{ $siteSetting->instagram_url }}" target="_blank"><i class="ti-instagram"></i></a></li>
                                    @endif
                                    @if($siteSetting->youtube_url)
                                        <li class="list-inline-item"><a href="{{ $siteSetting->youtube_url }}" target="_blank"><i class="ti-youtube"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Useful Links -->
                    <div class="col-lg-4 col-md-6">
                        <div class="widget link-widget">
                            <div class="widget-title mb-3">
                                <h3 class="fw-bold text-dark">Useful Links</h3>
                            </div>

                            <div class="d-flex">
                                <ul class="list-unstyled me-5">
                                    <li><a href="{{ route('about') }}" class="rmv-underline">About Us</a></li>
                                    <li><a href="#" class="rmv-underline">Our Services</a></li>
                                    <li><a href="#" class="rmv-underline">Contact Us</a></li>
                                    <li><a href="#" class="rmv-underline">Meet Team</a></li>
                                </ul>

                                <ul class="list-unstyled">
                                    <li><a href="#" class="rmv-underline">Privacy Policy</a></li>
                                    <li><a href="#" class="rmv-underline">Testimonials</a></li>
                                    <li><a href="#" class="rmv-underline">News</a></li>
                                    <li><a href="#" class="rmv-underline">FAQ</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Widget -->
                    <div class="col-lg-4 col-md-6">
                        <div class="widget contact-widget service-link-widget p-4 bg-light rounded-3 shadow-sm h-100">
                            <div class="widget-title mb-4">
                                <h3 class="fw-bold text-dark border-bottom pb-2">Our Address</h3>
                            </div>

                            <ul class="list-unstyled mb-0">
                                <li class="d-flex align-items-start mb-3">
                                    <i class="fa-solid fa-location-dot text-primary fs-5 me-3 mt-1"></i>
                                    <span>{{ $siteSetting->address ?? '25/19 Duel aveniew, new Booston town, Ghana' }}</span>
                                </li>

                                <li class="d-flex align-items-start mb-3">
                                    <i class="fa-solid fa-phone text-primary fs-5 me-3 mt-1"></i>
                                    <a href="tel:{{ $siteSetting->contact_phone1 ?? '84667441' }}" class="text-decoration-none text-dark">
                                        {{ $siteSetting->contact_phone1 ?? '84667441' }}
                                    </a>
                                </li>

                                <li class="d-flex align-items-start mb-3">
                                    <i class="fa-solid fa-envelope text-primary fs-5 me-3 mt-1"></i>
                                    <a href="mailto:{{ $siteSetting->email_address1 ?? 'demo@example.com' }}" class="text-decoration-none text-dark">
                                        {{ $siteSetting->email_address1 ?? 'demo@example.com' }}
                                    </a>
                                </li>

                                <li class="d-flex align-items-start">
                                    <i class="fa-solid fa-clock text-primary fs-5 me-3 mt-1"></i>
                                    <span>10AM - 5PM</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div> <!-- end container -->
        </div>
        <div class="lower-footer">
            <div class="container">
                <div class="row">
                    <div class="separator"></div>
                    <div class="col col-xs-12">
                        <p class="copyright">{{ $siteSetting->site_name ?? 'Templates Hub' }} &copy; {{ date('Y') }}</p>
                        <div class="extra-link">
                            <ul>
                                <li><a href="#">Privacy & Policy</a></li>
                                <li><a href="#">Terms</a></li>
                                <li><a href="{{ route('about') }}">About us</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end site-footer -->


    </div>
    <!-- end of page-wrapper -->

    <!-- JS Files -->
    <script src="{{ asset('fronted/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('fronted/assets/js/bootstrap.min.js') }}"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    <!-- Plugins for this template -->
    <script src="{{ asset('fronted/assets/js/jquery-plugin-collection.js') }}"></script>

    <!-- Custom script for this template -->
    <script src="{{ asset('fronted/assets/js/script.js') }}"></script>

    @stack('scripts')
</body>
</html>