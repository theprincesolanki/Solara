@extends('frontend.layout.app')
@push('styles')

@endpush
@section('body')   

<!-- start of hero -->
<section class="hero-slider hero-style-3">
    <div class="swiper-container">
        @if($banners->isNotEmpty())
            <div class="swiper-wrapper">
                @foreach($banners as $banner)
                    <div class="swiper-slide">
                        <div class="slide-inner slide-bg-image" data-background="{{ asset('storage/'.$banner->image) }}">
                            <div class="container">
                                <div data-swiper-parallax="300" class="slide-title">
                                    <h2 class="fade-in-up delay-1">{{ $banner->title }}</h2>
                                </div>
                                <div data-swiper-parallax="400" class="slide-text">
                                    <p class="fade-in-up delay-2">{{ $banner->subtitle }}</p>
                                </div>
                                <div class="clearfix"></div>
                                <div data-swiper-parallax="500" class="slide-btns">
                                    <a href="{{ $banner->button_link }}" class="ps-btn fade-in-up delay-3"><span class="text">{{ $banner->button_text ?? 'Our services' }}</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- end swiper-wrapper -->

            <!-- swipper controls -->
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        @endif
    </div>
</section>
<!-- end of hero slider -->

<!-- start service-section-s2 -->
<section class="service-section-s2 section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-md-6">
                <div class="section-title-s2">
                    <span>Our Industry Solutions</span>
                    <h2>Delivering the Best Global Industry Services.</h2>
                </div>
            </div>
            <div class="col col-md-6">
                <div class="title-text">
                    <p>Recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col col-xs-12">
                <div class="service-grids clearfix">
                    <div class="grid">
                        <img src="fronted/assets/images/services/img-1.jpg" alt>
                        <h4><a href="#">Mechanical Engineering</a></h4>
                        <p> Samsa was a travelling salesman and above it there hung a picture that he had recently</p>
                        <a href="#" class="read-more">Read More <i class="fi flaticon-next"></i></a>
                    </div>
                    <div class="grid">
                        <img src="fronted/assets/images/services/img-2.jpg" alt>
                        <h4><a href="#">Sanitary & Plumbing</a></h4>
                        <p> Samsa was a travelling salesman and above it there hung a picture that he had recently</p>
                        <a href="#" class="read-more">Read More <i class="fi flaticon-next"></i></a>
                    </div>
                    <div class="grid">
                        <img src="fronted/assets/images/services/img-3.jpg" alt>
                        <h4><a href="#">Oil & Gas Production</a></h4>
                        <p> Samsa was a travelling salesman and above it there hung a picture that he had recently</p>
                        <a href="#" class="read-more">Read More <i class="fi flaticon-next"></i></a>
                    </div>
                    <div class="grid">
                        <img src="fronted/assets/images/services/img-4.jpg" alt>
                        <h4><a href="#">Pharmaceutical Research</a></h4>
                        <p> Samsa was a travelling salesman and above it there hung a picture that he had recently</p>
                        <a href="#" class="read-more">Read More <i class="fi flaticon-next"></i></a>
                    </div>
                    <div class="grid">
                        <img src="fronted/assets/images/services/img-5.jpg" alt>
                        <h4><a href="#">Painting &Protective</a></h4>
                        <p> Samsa was a travelling salesman and above it there hung a picture that he had recently</p>
                        <a href="#" class="read-more">Read More <i class="fi flaticon-next"></i></a>
                    </div>
                    <div class="grid">
                        <img src="fronted/assets/images/services/img-6.jpg" alt>
                        <h4><a href="#">Electrical & Power</a></h4>
                        <p> Samsa was a travelling salesman and above it there hung a picture that he had recently</p>
                        <a href="#" class="read-more">Read More <i class="fi flaticon-next"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end container -->
</section>
<!-- end service-section-s2 -->


<!-- start why-choose-section -->
<section class="why-choose-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
                <div class="section-title-s3">
                    <span>Our Features</span>
                    <h2>Why Choose Us!</h2>
                    <p>Hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col col-xs-12">
                <div class="why-choose-grids clearfix">
                    <div class="grid">
                        <i class="fi flaticon-network-1"></i>
                        <h3>Professional Team</h3>
                        <p>Whole of her lower arm towards the viewer. Gregor then turned to look out the window</p>
                    </div>
                    <div class="grid">
                        <i class="fi flaticon-circular-label-with-certified-stamp"></i>
                        <h3>Certified engineers</h3>
                        <p>Whole of her lower arm towards the viewer. Gregor then turned to look out the window</p>
                    </div>
                    <div class="grid">
                        <i class="fi flaticon-chip"></i>
                        <h3>Latest Technology</h3>
                        <p>Whole of her lower arm towards the viewer. Gregor then turned to look out the window</p>
                    </div>
                    <div class="grid">
                        <i class="fi flaticon-24-hours"></i>
                        <h3>27/7 Support</h3>
                        <p>Whole of her lower arm towards the viewer. Gregor then turned to look out the window</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end container -->
</section>
<!-- end why-choose-section -->

<!-- start testimonials-section-s2 -->
<section class="testimonials-section-s2 section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-lg-6 col-lg-offset-3">
                <div class="section-title-s4">
                    <span>Testimonials</span>
                    <h2>What People say’s About us</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col col-xs-12">
                <div class="testimonial-grids clearfix">
                    <div class="grid">
                        <div class="quote">
                            <p>“Samsa was a travelling salesman and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who sat”</p>
                        </div>
                        <div class="client-info">
                            <div class="img-holder">
                                <img src="fronted/assets/images/testimonials/img-1.jpg" alt>
                            </div>
                            <div class="details">
                                <h5>Jhon dow</h5>
                                <p>Happy client</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="quote">
                            <p>“Samsa was a travelling salesman and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who sat”</p>
                        </div>
                        <div class="client-info">
                            <div class="img-holder">
                                <img src="fronted/assets/images/testimonials/img-2.jpg" alt>
                            </div>
                            <div class="details">
                                <h5>Alaska</h5>
                                <p>Michel jhon</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end container -->
</section>
<!-- end testimonials-section-s2 -->


<!-- start cta-section -->
<section class="cta-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Column -->
            <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                <div class="cta-text">
                    <h3 class="fw-bold mb-3">Let's Get in Touch!</h3>
                    <p>Raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather.</p>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-lg-5 offset-lg-1 col-md-6">
                <div class="contact-animations d-flex flex-wrap gap-4 justify-content-center">

                    <!-- Animated Card 1 -->
                    <a href="{{ route('contact') }}" class="contact-card">
                        <div class="icon-circle">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <h4>Contact Us</h4>
                        <p>Reach us by call or message</p>
                    </a>

                    <!-- Animated Card 2 -->
                    <a href="{{ route('contact') }}" class="contact-card">
                        <div class="icon-circle">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <h4>Get Support</h4>
                        <p>We respond within 24 hours</p>
                    </a>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- end cta-section -->

@endsection
        
@push('scripts')

@endpush