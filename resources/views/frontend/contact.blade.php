@extends('frontend.layout.app')
@push('styles')

@endpush
@section('body')
<!-- start page-title -->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <h2>Contact</h2>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>        
<!-- end page-title -->


<!-- start contact-pg-section -->
<section class="contact-pg-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-lg-5 col-md-6 col-sm-8">
                <div class="section-title">
                    <span>Contact With Us</span>
                    <h2>Call Us Or Fill The Form</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col col-md-7">
                <form method="post" class="contact-validation-active" id="contact-form-main">
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
                        <select name="subject" class="form-control">
                            <option disabled="disabled" selected>Contact subject</option>
                            <option>Subject 1</option>
                            <option>Subject 2</option>
                            <option>Subject 3</option>
                        </select>
                    </div>
                    <div class="fullwidth">
                        <textarea class="form-control" name="note"  id="note" placeholder="Case Description..."></textarea>
                    </div>
                    <div class="submit-area">
                        <button type="submit" class="theme-btn">Submit Now</button>
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

            <div class="col col-md-5">
                <div class="office-info">
                    <div>
                        <h3>Jonads Office</h3>
                        <ul>
                            <li><i class="ti-location-pin"></i> 21/4 Jogon street utral, utiley, Austria</li>
                            <li><i class="ti-mobile"></i> 546418563, 3245647</li>
                            <li><i class="ti-email"></i> example@demo.com</li>
                        </ul>
                    </div>
                    <div>
                        <h3>Austria Office</h3>
                        <ul>
                            <li><i class="ti-location-pin"></i> 21/4 Jogon street utral, utiley, Austria</li>
                            <li><i class="ti-mobile"></i> 546418563, 3245647</li>
                            <li><i class="ti-email"></i> example@demo.com</li>
                        </ul>
                    </div>
                    <div>
                        <h3>London Office</h3>
                        <ul>
                            <li><i class="ti-location-pin"></i> 21/4 Jogon street utral, utiley, Austria</li>
                            <li><i class="ti-mobile"></i> 546418563, 3245647</li>
                            <li><i class="ti-email"></i> example@demo.com</li>
                        </ul>
                    </div>
                </div>
            </div>                  
        </div>
    </div> <!-- end container -->
</section>
<!-- end contact-pg-section -->


<!--  start contact-map -->
<section class="contact-map-section">
    <h2 class="hidden">Contact map</h2>
    <div class="contact-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.9147703055!2d-74.11976314309273!3d40.69740344223377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbd!4v1547528325671" allowfullscreen></iframe>
    </div>
</section>
<!-- end contact-map -->


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