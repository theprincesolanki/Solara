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
                <form id="contact-form-main" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Name*">
                        <span class="error text-danger" id="error-name"></span>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email*">
                        <span class="error text-danger" id="error-email"></span>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="phone" placeholder="Phone*">
                        <span class="error text-danger" id="error-phone"></span>
                    </div>
                    <div class="mb-3">
                        <select name="subject" class="form-control">
                            <option disabled selected>Contact subject</option>
                            <option value="General Inquiry" class="pointer">General Inquiry</option>
                            <option value="Support / Help" class="pointer">Support / Help</option>
                            <option value="Other" class="pointer">Other</option>
                        </select>
                        <span class="error text-danger" id="error-subject"></span>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" name="note" placeholder="Case Description..."></textarea>
                        <span class="error text-danger" id="error-note"></span>
                    </div>
                    <button type="submit" class="theme-btn">Submit Now</button>
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
<script>
    $(document).ready(function() {
        $('#contact-form-main').on('submit', function() {
            $('#loader').show();
        });

        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "3000"
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            }
        });

        $('#contact-form-main').on('submit', function(e){
            e.preventDefault(); 
            $('.error').text(''); 

            let name = $('input[name="name"]').val().trim();
            let email = $('input[name="email"]').val().trim();
            let phone = $('input[name="phone"]').val().trim();
            let subject = $('select[name="subject"]').val();
            let note = $('textarea[name="note"]').val().trim();

            let hasError = false;

            if(!name){ 
                $('#error-name').text('Please enter your name.'); 
                hasError = true; 
            }

            let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if(!email){ 
                $('#error-email').text('Please enter your email.'); 
                hasError = true; 
            } else if(!emailPattern.test(email)){
                $('#error-email').text('Please enter a valid email address.');
                hasError = true;
            }

            let phonePattern = /^\+?[0-9]{9,15}$/;
            let dummyNumbers = ['123456789','111111111','000000000'];
            if(!phone){ 
                $('#error-phone').text('Please enter your phone number.'); 
                hasError = true; 
            } else if(!phonePattern.test(phone)){
                $('#error-phone').text('Please enter a valid phone number (9-15 digits).');
                hasError = true;
            } else if(dummyNumbers.includes(phone)){
                $('#error-phone').text('Please enter a real phone number.');
                hasError = true;
            }

            if(!subject){ 
                $('#error-subject').text('Please select a subject.'); 
                hasError = true; 
            }

            if(!note){ 
                $('#error-note').text('Please enter your message.'); 
                hasError = true; 
            }

            if(hasError){
                toastr.error('Please fill all required fields correctly before submitting.');
                return false;
            }

            $.ajax({
                url: "{{ route('contact.submit') }}",
                type: "POST",
                data: $(this).serialize(),
                success: function(res){
                    if(res.status){
                        toastr.clear(); 
                        toastr.success(res.message);
                        $('#contact-form-main')[0].reset();
                    } else {
                        toastr.error(res.message || 'Something went wrong. Please try again.');
                    }
                },
                error: function(xhr){
                    toastr.clear();
                    if(xhr.status === 422){
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value){
                            $('#error-' + key).text(value[0]);
                        });
                        toastr.error('Please check the form for errors and try again.');
                    } else {
                        toastr.error('Server error. Try again later.');
                    }
                }
            });
        });

    });
</script>
@endpush        