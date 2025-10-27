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


<!-- start fun-fact-section -->
<section class="fun-fact-section">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="fun-fact-grids clearfix">
                    <div class="grid">
                        <div class="info">
                            <i class="fi flaticon-worker"></i>
                            <h3><span class="odometer" data-count="1200">00</span></h3>
                            <p>Employed</p>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="info">
                            <i class="fi flaticon-engineer"></i>
                            <h3><span class="odometer" data-count="1500">00</span></h3>
                            <p>Project Completed</p>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="info">
                            <i class="fi flaticon-trophy"></i>
                            <h3><span class="odometer" data-count="25">00</span>+</h3>
                            <p>Award Won</p>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="info">
                            <i class="fi flaticon-like-1"></i>
                            <h3><span class="odometer" data-count="100">00</span>%</h3>
                            <p>Satisfied customers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end container -->
</section>
<!-- end fun-fact-section -->


<!-- start team-section -->
<section class="team-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
                <div class="section-title-s5">
                    <span>Our Team</span>
                    <h2>Dedicated Team</h2>
                    <p>Hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col col-xs-12">
                <div class="team-grids">
                    <div class="grid">
                        <div class="img-social">
                            <div class="img-holder">
                                <img src="fronted/assets/images/team/img-1.jpg" alt>
                            </div>
                            <div class="social">
                                <ul>
                                    <li><a href="#"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                    <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                    <li><a href="#"><i class="ti-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="details">
                            <h3>Michel Jhon</h3>
                            <span>Mechanical Engineering</span>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="img-social">
                            <div class="img-holder">
                                <img src="fronted/assets/images/team/img-2.jpg" alt>
                            </div>
                            <div class="social">
                                <ul>
                                    <li><a href="#"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                    <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                    <li><a href="#"><i class="ti-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="details">
                            <h3>Wilium Mice</h3>
                            <span>Site Manager</span>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="img-social">
                            <div class="img-holder">
                                <img src="fronted/assets/images/team/img-3.jpg" alt>
                            </div>
                            <div class="social">
                                <ul>
                                    <li><a href="#"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                    <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                    <li><a href="#"><i class="ti-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="details">
                            <h3>Jonthon teat</h3>
                            <span>Testing Manager</span>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="img-social">
                            <div class="img-holder">
                                <img src="fronted/assets/images/team/img-4.jpg" alt>
                            </div>
                            <div class="social">
                                <ul>
                                    <li><a href="#"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                    <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                    <li><a href="#"><i class="ti-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="details">
                            <h3>Shown kel</h3>
                            <span>Cheif Officer</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end container -->
</section>
<!-- end team-section -->


<!-- start quote-section-s2 -->
<section class="quote-section quote-section-s2">
    <div class="content-area clearfix">
        <div class="left-col">
            <h2>Imagination What we can easily see is only a small</h2>
            <div class="details">
                <p>It wasn't a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered </p>
                <div class="clearfix">
                    <ul>
                        <li><i class="ti-check"></i> Cut out of an illustrated magazine</li>
                        <li><i class="ti-check"></i> Showed a lady fitted out</li>
                    </ul>
                    <ul>
                        <li><i class="ti-check"></i> Raising a heavy fur muff</li>
                        <li><i class="ti-check"></i> Magazine and housed in a nice</li>
                    </ul>
                </div>
                <div class="btns">
                    <a href="#" class="ps-btn">Our Services</a>
                    <a href="#" class="ps-btn-s3">Contact with us</a>
                </div>
            </div>
        </div>
        <div class="right-col">
            <div class="quote-area">
                <h3>Request A Quote</h3>
                <p>Lower arm towards the viewer. Gregor then turned to look out the window</p>
                <form method="post" class="contact-validation-active" id="contact-quote-form">
                    <div>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name*">
                    </div>
                    <div>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email*">
                    </div>
                    <div>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone*">
                    </div>
                    <div>
                        <textarea class="form-control" name="note"  id="note" placeholder="Case Description..."></textarea>
                    </div>
                    <div class="submit-area">
                        <button type="submit" class="ps-btn">Get a quote</button>
                        <div id="loader">
                            <i class="ti-reload"></i>
                        </div>
                    </div>
                    <div class="clearfix error-handling-messages">
                        <div id="success">Thank you</div>
                        <div id="error"> Error occurred while sending email. Please try again later. </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- end quote-section-s2 -->


<!-- start blog-section -->
<section class="blog-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
                <div class="section-title-s5">
                    <span>Insight and Trends</span>
                    <h2>Industrial News</h2>
                    <p>Hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him</p>
                </div>
            </div>
        </div> 
        <div class="row">
            <div class="col col-xs-12">
                <div class="blog-grids">
                    <div class="grid">
                        <div class="entry-media">
                            <img src="fronted/assets/images/blog/img-1.jpg" alt>
                        </div>
                        <div class="entry-body">
                            <div class="cats">Industry, Factory</div>
                            <h4><a href="#">Manufacturing is a sector that is constantly evolving</a></h4>
                            <p class="date">Oct 26 2019</p>
                            <a href="#" class="read-more">Read More <i class="fi flaticon-next"></i></a>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="entry-media">
                            <img src="fronted/assets/images/blog/img-2.jpg" alt>
                        </div>
                        <div class="entry-body">
                            <div class="cats">Industry, Factory</div>
                            <h4><a href="#">It’s a surefire way to keep abreast of the competition and sometimes</a></h4>
                            <p class="date">Oct 26 2019</p>
                            <a href="#" class="read-more">Read More <i class="fi flaticon-next"></i></a>
                        </div>
                    </div>
                    <div class="grid">
                        <div class="entry-media">
                            <img src="fronted/assets/images/blog/img-3.jpg" alt>
                        </div>
                        <div class="entry-body">
                            <div class="cats">Industry, Factory</div>
                            <h4><a href="#">Community would not exist if it were not for manufacturing being</a></h4>
                            <p class="date">Oct 26 2019</p>
                            <a href="#" class="read-more">Read More <i class="fi flaticon-next"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>               
    </div> <!-- end container -->
</section>
<!-- end blog-section -->


<!-- start cta-section -->
<section class="cta-section">
    <div class="container">
        <div class="row">
            <div class="col col-lg-6 col-md-6">
                <div class="cta-text">
                    <h3>Lets Get in Touch!</h3>
                    <p>Raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather.</p>
                </div>
            </div>
            <div class="col col-lg-5 col-lg-offset-1 col-md-6">
                <div class="contact-info">
                    <div>
                        <i class="fi flaticon-call"></i>
                        <h4>Call us</h4>
                        <p>+654894754</p>
                    </div>
                    <div>
                        <i class="fi flaticon-contact"></i>
                        <h4>Email us</h4>
                        <p>demo@example.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end container -->
</section>
<!-- end cta-section -->

@endsection
        
@push('scripts')

@endpush