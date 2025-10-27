    <!-- start site-footer -->
    <footer class="site-footer">
        <div class="upper-footer">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-4 col-md-4 col-sm-6">
                        <div class="widget about-widget">
                            <div class="logo widget-title">
                                @if($siteSetting && $siteSetting->site_logo)
                                    <img src="{{ asset($siteSetting->site_logo) }}" alt="{{ $siteSetting->site_name ?? 'Site Logo' }}">
                                @else
                                    <img src="{{ asset('fronted/assets/images/footer-logo.png') }}" alt="Default Logo">
                                @endif
                            </div>
                            <p>{{ $siteSetting->description ?? 'Mikago arm towards the viewer gregor then turned to look out the window at the dull weather' }}</p>
                            <div class="social-icons">
                                <ul>
                                    @if($siteSetting && $siteSetting->facebook_url)
                                        <li><a href="{{ $siteSetting->facebook_url }}"><i class="ti-facebook"></i></a></li>
                                    @endif
                                    @if($siteSetting && $siteSetting->twitter_url)
                                        <li><a href="{{ $siteSetting->twitter_url }}"><i class="ti-twitter-alt"></i></a></li>
                                    @endif
                                    @if($siteSetting && $siteSetting->linkedin_url)
                                        <li><a href="{{ $siteSetting->linkedin_url }}"><i class="ti-linkedin"></i></a></li>
                                    @endif
                                    @if($siteSetting && $siteSetting->instagram_url)
                                        <li><a href="{{ $siteSetting->instagram_url }}"><i class="ti-instagram"></i></a></li>
                                    @else
                                        <li><a href="#"><i class="ti-pinterest"></i></a></li>
                                    @endif
                                    @if($siteSetting && $siteSetting->youtube_url)
                                        <li><a href="{{ $siteSetting->youtube_url }}"><i class="ti-youtube"></i></a></li>
                                    @else
                                        <li><a href="#"><i class="ti-vimeo-alt"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-4 col-md-4 col-sm-6">
                        <div class="widget link-widget">
                            <div class="widget-title">
                                <h3>Useful Links</h3>
                            </div>
                            <ul>
                                <li><a href="{{ route('about') }}">About us</a></li>
                                <li><a href="#">Our services</a></li>
                                <li><a href="#">Contact us</a></li>
                                <li><a href="#">Meet team</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#">News</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col col-lg-4 col-md-4 col-sm-6">
                        <div class="widget contact-widget service-link-widget">
                            <div class="widget-title">
                                <h3>Our Address</h3>
                            </div>
                            <ul>
                                <li>{{ $siteSetting->address ?? '25/19 Duel aveniew, new Booston town, Ghana' }}</li>
                                <li><span>Phone:</span> {{ $siteSetting->contact_phone1 ?? '84667441' }}</li>
                                <li><span>Email:</span> {{ $siteSetting->email_address1 ?? 'demo@example.com' }}</li>
                                <li><span>Office Time:</span> 10AM-5PM</li>
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