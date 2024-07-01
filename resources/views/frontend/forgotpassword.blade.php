@extends('frontend.layouts.main')
<link rel="stylesheet" href="js/vendor/swiper/swiper.min.css" type="text/css" media="all" />

@section('main-container')
<div class="page_content_wrap page_paddings_no">
    <!-- Content -->
    <div class="content">
        <article class="post_item post_item_single page">
            <section class="post_content">

                <!-- Promo -->
                <div class="content_wrap mb-5">
                    <div class="sc_promo margin_top_large sc_promo_size_large">
                        <div class="sc_promo_inner">
                            <div class="sc_promo_image promo_image_1 width_60_per pos_right_0"></div>
                            <div class="sc_promo_block sc_align_left width_40_per float_left">
                                <div class="sc_promo_block_inner">
                                    <h6 class="sc_promo_subtitle sc_item_subtitle">Ski and Snowboard India (SSI)</h6>
                                    <h3 class="sc_promo_title sc_item_title sc_item_title_with_descr">Forgot Password</h3>
                                    <div class="sc_promo_line mt-3"></div>
                                    <div class="sc_promo_descr sc_item_descr">
                                        <div  id="forgetPassword" style="display: {{ session('showOtpScreen') ? 'none' : 'block' }};">
                                            <div class="comments_form">
                                                <div id="respond" class="comment-respond">
                                                    @if (Session::has('success'))
                                                        <div class="alert alert-success">
                                                            {{ Session::get('success') }}
                                                        </div>
                                                    @endif
                                                    <form id="forgetPasswordForm" action="{{ route('forgetPasswordAdmin') }}" method="POST" enctype="multipart/form-data" class="loginForm sc_input_hover_default">
                                                        @csrf <!-- CSRF token -->
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    <label for="email" class="form-label">Username / Email</label>
                                                                    <input type="email" class="form-control" id="email" name="email">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    <button type="submit" id="sendOTPButton" class="sc_button sc_button_square sc_button_style_filled sc_button_size_small sc_button_hover_fade">Send OTP</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3 d-flex justify-content-between">
                                                            <div>
                                                                Don't have an account? Sign Up as
                                                                <a href="{{ url('/registration/athletesRegistration#Athlete-register-form') }}">Athlete</a> or
                                                                <a href="{{ url('/registration/associationRegistration#association-register-form') }}">Association</a>.
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <a href="{{ url('/login') }}">Login</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div  id="otpscreen" style="display: {{ session('showOtpScreen') ? 'block' : 'none' }};">
                                            <div class="hero__form">
                                                <h3 style="color:white;">Enter 6 Digit Code</h3>
                                                @if (Session::has('success'))
                                                    <div class="alert alert-success">
                                                        {{ Session::get('success') }}
                                                    </div>
                                                @endif
                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        @foreach ($errors->all() as $error)
                                                            <p>{{ $error }}</p>
                                                        @endforeach
                                                    </div>
                                                @endif
                                                <p class="text-center">We Send Code To <b id="emailPlaceholder">{{ session('email') }}</b></p>
                                                <form id="verifyOTPForm" action="{{ route('checkOtpAndLoginEmail') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="input-full-width">
                                                        <input type="hidden" id="email" name="email" value="{{ session('email') }}">
                                                    </div>
                                                    <div class="input-full-width">
                                                        <input type="number" id="forget_password_otp" name="otp" value="{{ old('otp') }}">
                                                    </div>
                                                    </br>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                        <button type="submit" class="sc_button sc_button_square sc_button_style_filled sc_button_size_small sc_button_hover_fade" id="verifyOTPButton">Verify OTP</button>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="mt-3 d-flex justify-content-center">
                                                        <p>Didn't receive OTP? <a class="text-primary" href="{{ url('/resend-otp') }}">Resend OTP</a></p>
                                                    </div> -->
                                                </form>
                                            </div>
                                        </div>

                                        <div  id="resetPassword" style="display: {{ session('showResetPasswordScreen') ? 'none' : 'block' }};">
                                            <div class="hero__form">
                                                <h3 style="color:white;">Reset Password</h3>
                                                <form id="resetPasswordForm" action="{{ route('updatePassword') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <!-- <p class="text-center">We Send Code To <b id="emailPlaceholderChangePassword">{{ session('email') }}</b></p> -->
                                                    <div class="input-full-width">
                                                        <input type="hidden" id="email" name="email" value="{{ session('email') }}">
                                                    </div>
                                                    <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    <p>New Password</p>
                                                                    <input type="password" id="password" name="password">
                                                                </div>
                                                            </div>
                                                           <div class="col-lg-12">
                                                             <div class="mb-3">
                                                                <p>Confirm New Password</p>
                                                                <input type="password" id="password_confirmation" name="password_confirmation">
                                                             </div>
                                                            </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                          <button type="submit" class="sc_button sc_button_square sc_button_style_filled sc_button_size_small sc_button_hover_fade" id="resetPasswordButton">Reset Password</button>
                                                        </div>
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
                </div>
                <!-- /Promo -->

            </section>
        </article>
    </div>
    <!-- /Content -->
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const sendOTPButton = document.getElementById("sendOTPButton");
        const verifyOTPButton = document.getElementById("verifyOTPButton");
        const emailInput = document.getElementById("email");
        const emailPlaceholder = document.getElementById("emailPlaceholder");
        const emailPlaceholderChangePassword = document.getElementById("emailPlaceholderChangePassword");

        sendOTPButton.addEventListener("click", function(event) {
            emailPlaceholder.innerText = emailInput.value;
        });

        verifyOTPButton.addEventListener("click", function(event) {
            emailPlaceholderChangePassword.innerText = emailInput.value;
        });
    });
    document.getElementById('verifyOTPForm').addEventListener('submit', function(event) {
    event.preventDefault();
    let formData = new FormData(this);

    fetch('{{ route('checkOtpAndLoginEmail') }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Hide OTP form and show reset password form
            document.getElementById('otpscreen').style.display = 'none';
            document.getElementById('resetPassword').style.display = 'block';
        } else {
            // Handle validation errors or other errors
            alert(data.message);
        }
    })
    .catch(error => console.error('Error:', error));
});

document.getElementById('resetPasswordForm').addEventListener('submit', function(event) {
    event.preventDefault();
    let formData = new FormData(this);

    fetch('{{ route('updatePassword') }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Redirect to the login page
            window.location.href = data.redirect_url;
        } else {
            // Handle validation errors or other errors
            alert(data.message);
        }
    })
    .catch(error => console.error('Error:', error));
});


</script>
@endsection
