@extends('frontend.layouts.main')
@section('main-container')
    <!-- Top panel -->
    <section class="top_panel_image">
        <div class="top_panel_image_hover"></div>
        <div class="content_wrap">
            <div class="top_panel_image_header">
                <h1 class="top_panel_image_title">Athlete Registration</h1>
                <div class="breadcrumbs">
                    <a class="breadcrumbs_item home" href="#">Registration</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current">Athlete Registration</span>
                </div>
            </div>
        </div>
    </section>
    <!-- /Top panel -->
    <!-- Page content wrap -->
    <div class="page_content_wrap page_paddings_yes">
        <!-- Content -->
        <div class="content">
            <article class="post_item post_item_single_team post_featured_left team">
                <!-- Single team info -->
                <div class="content_wrap">
                    <section class="post_featured single_team_post_featured">
                        <div class="post_thumb" data-image="{{ url('frontend/images/athlite.jpg') }}" data-title="Shannon Lorenz">
                            <a class="hover_icon hover_icon_view" href="{{ url('frontend/images/athlite.jpg') }}" title="Shannon Lorenz">
                                <img alt="Shannon Lorenz" src="{{ url('frontend/images/athlite.jpg') }}">
                            </a>
                        </div>
                    </section>
                    <section class="single_team_post_description">
                        <h2 class="team_title">ATHLETES</h2>
                        {{-- <h6 class="team_position">Instructor</h6> --}}
                        <div class="team_meta"></div>
                        <div class="team_brief_info">
                            <div class="team_brief_info_text">
                                <p>Dear Athletes,<br />
                                    We're excited to invite you to register with Ski and Snowboard India to access a range
                                    of exclusive initiatives, activities, and benefits tailored to support your journey in
                                    winter sports. By registering through the provided link below, you'll unlock numerous
                                    opportunities and become an integral part of our vibrant community.</p>
                            </div>
                        </div>
                        <!-- <a href="#Athlete-register-form"
                            class="sc_button sc_button_square sc_button_style_filled sc_button_size_small margin_top_small margin_bottom_null">Register
                            Now</a> -->
                    </section>
                </div>
                <!-- /Single team info -->

            </article>

            <!-- Promo -->
            <div class="content_wrap">
                <div class="sc_promo margin_top_large sc_promo_size_large">
                    <div class="sc_promo_inner">
                        <div class="sc_promo_image promo_image_1 width_60_per pos_right_0"></div>
                        <div class="sc_promo_block sc_align_left width_40_per float_left">
                            <div class="sc_promo_block_inner">
                                <h6 class="sc_promo_subtitle sc_item_subtitle">Athletes</h6>
                                <h3 class="sc_promo_title sc_item_title sc_item_title_with_descr">BENEFITS</h3>
                                <div class="sc_promo_line"></div>
                                <div class="sc_promo_descr sc_item_descr">
                                    <dl>
                                        <dt>
                                            Official Communications

                                        </dt>
                                        <dd>
                                            Registered athletes will receive official communications directly from Ski and
                                            Snowboard India, keeping you informed about the latest news, updates, and
                                            events within the federation.
                                        </dd>
                                        <dt>
                                            Competitive Opportunities

                                        </dt>
                                        <dd>
                                            Gain eligibility to compete in prestigious national and international level
                                            events, subject to meeting the specified eligibility criteria. This opens
                                            doors to showcase your talent and represent India on the global stage.
                                        </dd>
                                    </dl>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Promo -->

            <!-- Vision Mission -->
            <div class="content_wrap">
                <div class="sc_skills sc_skills_counter margin_top_large margin_bottom_medium" data-type="counter"
                    data-caption="Skills">
                    <h3 class="sc_promo_title sc_item_title sc_item_title_with_descr">REGISTRATION REQUIREMENTS</h3>

                    <div class="columns_wrap sc_skills_columns row">
                        <div class="sc_skills_column col-lg-4 mb-5">
                            <div class="sc_skills_item sc_skills_style_2 odd first">

                                <div class="sc_skills_count"></div>
                                <div class="sc_skills_info">
                                    <div class="sc_skills_label">Physical Fitness Certificate</div>
                                    <div class="sc_skills_addinfo">A valid physical fitness certificate from a qualified
                                        medical professional is required to confirm your readiness to participate in
                                        skiing and snowboarding activities.</div>
                                </div>
                            </div>
                        </div>
                        <div class="sc_skills_column col-lg-4 mb-5">
                            <div class="sc_skills_item sc_skills_style_2 even">

                                <div class="sc_skills_count"></div>
                                <div class="sc_skills_info">
                                    <div class="sc_skills_label">Declaration on Ethics and Antidoping</div>
                                    <div class="sc_skills_addinfo">As part of our commitment to fair play and integrity,
                                        athletes are required to declare their adherence to ethical principles and
                                        antidoping regulations.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sc_skills_column col-lg-4 mb-5">
                            <div class="sc_skills_item sc_skills_style_2 even">

                                <div class="sc_skills_count"></div>
                                <div class="sc_skills_info">
                                    <div class="sc_skills_label">Annual Membership Fee</div>
                                    <div class="sc_skills_addinfo">Payment of the annual membership fee is necessary to
                                        activate your registration and access the full range of benefits offered by Ski
                                        and Snowboard India.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sc_skills_column col-lg-12 mb-5">
                            <div class="sc_skills_item sc_skills_style_2 even">

                                <div class="sc_skills_count"></div>
                                <div class="sc_skills_info">
                                    {{-- <div class="sc_skills_label">Annual Membership Fee</div> --}}
                                    <div class="sc_skills_addinfo">For detailed instructions and to begin your
                                        registration process, please click on the link provided below. You'll find
                                        comprehensive information about the registration requirements and steps to follow.
                                    </div>
                                    <a href="#Athlete-register-form"
                                        class="sc_button sc_button_square sc_button_style_filled sc_button_size_small margin_top_small margin_bottom_null">Registration
                                        Link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="" id="Athlete-register-form">
                <div class="content_wrap">
                    <div class="sc_testimonials sc_testimonials_style_testimonials-1 width_100_per">

                        <h6 class="sc_testimonials_subtitle sc_item_subtitle text-dark">Register as</h6>
                        <h2 class="sc_testimonials_title sc_item_title sc_item_title_without_descr">Athletes</h2>

                        <div class="comments_form">
                            <div id="respond" class="comment-respond">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <form id="addAthlete" action="{{ route('addAthlete') }}" method="POST"
                                    enctype="multipart/form-data" class="donationForm sc_input_hover_default"
                                    onsubmit="return validateForm()">
                                    @csrf <!-- CSRF token -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h4 class="mt-auto">Athletes Information</h4>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="first_name" class="form-label">First Name <span
                                                        class="text-danger">*</span> </label>
                                                <input type="text" class="form-control" id="first_name"
                                                    name="first_name">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="middle_name" class="form-label">Middle Name</label>
                                                <input type="text" class="form-control" id="middle_name"
                                                    name="middle_name">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="last_name" class="form-label">Last Name <span
                                                        class="text-danger">*</span> </label>
                                                <input type="text" class="form-control" id="last_name"
                                                    name="last_name">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="date_of_birth" class="form-label">Date Of Birth <span
                                                        class="text-danger">*</span></label>
                                                <input type="date" class="form-control" id="date_of_birth"
                                                    name="date_of_birth">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="profile_picture" class="form-label">Profile Picture <span
                                                        class="text-danger">*</span></label>
                                                <input type="file" class="form-control" id="profile_picture"
                                                    name="profile_picture">
                                            </div>
                                        </div>


                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="gender" class="form-label">Gender <span
                                                        class="text-danger">*</span></label>
                                                <div class="d-flex ">
                                                    <div class="form-check ">
                                                        <input class="form-check-input" type="radio" name="gender"
                                                            id="gender" value="1" checked>
                                                        <label class="form-check-label" for="gender">
                                                            Male
                                                        </label>
                                                    </div>
                                                    <div class="form-check ms-3">
                                                        <input class="form-check-input" type="radio" name="gender"
                                                            id="gender" value="0">
                                                        <label class="form-check-label" for="gender">
                                                            Female
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email Id <span
                                                        class="text-danger">*</span></label>
                                                <input type="email" class="form-control" id="email"
                                                    name="email">
                                            </div>

                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="mobile_no" class="form-label">Mobile Number <span
                                                        class="text-danger">*</span></label>
                                                <input type="tel" class="form-control" id="mobile_no"
                                                    name="mobile_no" pattern="[0-9]{10}" maxlength="10">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Club/State<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="club_name"
                                                    name="club_name">
                                            </div>

                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <div class="input-group d-flex">
                                                    <input type="password" class="form-control " id="password"
                                                        name="password" style="width: 80%">
                                                    <div class="input-group-append h-100" style="width: 20%">
                                                        <span class="input-group-text toggle-password"
                                                            id="togglePassword">
                                                            <span class="icon-eye"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div id="error-password" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="password_confirmation" class="form-label">Confirm
                                                    Password</label>
                                                <div class="input-group d-flex">
                                                    <input type="password" class="form-control "
                                                        id="password_confirmation" name="password_confirmation"
                                                        style="width: 80%">
                                                    <div class="input-group-append h-100" style="width: 20%">
                                                        <span class="input-group-text toggle-password_confirmation"
                                                            id="toggleConfirmPassword">
                                                            <span class="icon-eye"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div id="error-password_confirmation" class="text-danger"></div>
                                            </div>
                                        </div>

                                        <script>
                                            document.getElementById('togglePassword').addEventListener('click', function() {
                                                const passwordInput = document.getElementById('password');
                                                const toggleBtnIcon = this.querySelector('i');

                                                if (passwordInput.type === 'password') {
                                                    passwordInput.type = 'text';
                                                    toggleBtnIcon.classList.remove('bi-eye');
                                                    toggleBtnIcon.classList.add('bi-eye-slash');
                                                } else {
                                                    passwordInput.type = 'password';
                                                    toggleBtnIcon.classList.remove('bi-eye-slash');
                                                    toggleBtnIcon.classList.add('bi-eye');
                                                }
                                            });
                                        </script>




                                        <div class="col-lg-12">
                                            <h4 class="mt-auto form-section-title">Address Information</h4>
                                        </div>




                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="country" class="form-label">Country <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="country"
                                                    name="country">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="state" class="form-label">State / Province <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="state"
                                                    name="state">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="city" class="form-label">City <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="city"
                                                    name="city">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Address <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="address"
                                                    name="address">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="postal_code" class="form-label">Postal Code <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="postal_code"
                                                    name="postal_code">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <h4 class="mt-auto form-section-title">Documents Upload</h4>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="aadhar_number" class="form-label">Aadhar Card Number <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="aadhar_number"
                                                    name="aadhar_number">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="aadhar_card" class="form-label">Aadhar Card <span
                                                        class="text-danger">*</span></label>
                                                <input type="file" class="form-control" id="aadhar_card"
                                                    name="aadhar_card">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 d-none d-lg-block"></div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="passport_number" class="form-label">Passport Number</label>
                                                <input type="text" class="form-control" id="passport_number"
                                                    name="passport_number">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="passport" class="form-label">Passport (Upload)</label>
                                                <input type="file" class="form-control" id="passport"
                                                    name="passport">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 d-none d-lg-block"></div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="recommendation" class="form-label">Health Insurance Certificate <span class="text-danger">*</span></label>
                                                <input type="file" class="form-control" id="recommendation"
                                                    name="recommendation">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="anti_doping_certificate" class="form-label">Anti Doping
                                                    Certificate <span class="text-danger">*</span></label>
                                                <input type="file" class="form-control" id="anti_doping_certificate"
                                                    name="anti_doping_certificate">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="physical_fitness_certificate" class="form-label">Physical
                                                    Fitness Certificate <span class="text-danger">*</span></label>
                                                <input type="file" class="form-control"
                                                    id="physical_fitness_certificate" name="physical_fitness_certificate">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mt-5">
                                            <h4 class="mt-auto mb-auto">Sport Achievements</h4>
                                            <p class="mt-auto">Please provide details of your sports achievements,
                                                including
                                                competitions participated in, awards won, and any relevant accomplishments.
                                            </p>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="achievements_name" class="form-label">Year</label>
                                                <input type="text" class="form-control" id="achievements_name"
                                                    name="achievements_name">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="achievements_result" class="form-label">Result</label>
                                                <input type="text" class="form-control" id="achievements_result"
                                                    name="achievements_result">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="sport_certificates" class="form-label">Sports
                                                    Certificates/Awards</label>
                                                <input type="file" class="form-control" id="sport_certificates"
                                                    name="sport_certificates">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="achievements_name" class="form-label">Year</label>
                                                <input type="text" class="form-control" id="achievements_name"
                                                    name="achievements_name">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="achievements_result" class="form-label">Result</label>
                                                <input type="text" class="form-control" id="achievements_result"
                                                    name="achievements_result">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="sport_certificates" class="form-label">Sports
                                                    Certificates/Awards</label>
                                                <input type="file" class="form-control" id="sport_certificates"
                                                    name="sport_certificates">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="achievements_name" class="form-label">Year</label>
                                                <input type="text" class="form-control" id="achievements_name"
                                                    name="achievements_name">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="achievements_result" class="form-label">Result</label>
                                                <input type="text" class="form-control" id="achievements_result"
                                                    name="achievements_result">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="sport_certificates" class="form-label">Sports
                                                    Certificates/Awards</label>
                                                <input type="file" class="form-control" id="sport_certificates"
                                                    name="sport_certificates">
                                            </div>
                                        </div>








                                        <div class="col-lg-12">
                                            <div class="mb-3 d-flex">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                    id="acknowledge" name="acknowledge">
                                                <label class="form-check-label ms-3" for="acknowledge">
                                                    <b>Disclaimer:</b><br />
                                                    By submitting this form, I certify that all information provided is true
                                                    and accurate to the best of my knowledge.
                                                </label>
                                            </div>
                                        </div>




                                    </div>
                                    <div class="">
                                        <button type="button"
                                            class="sc_button sc_button_square sc_button_style_filled sc_button_size_small  sc_button_hover_fade bg-danger"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit"
                                            class="sc_button sc_button_square sc_button_style_filled sc_button_size_small  sc_button_hover_fade">Submit</button>
                                    </div>
                                </form>

                                {{-- Validtion Script --}}
                                <script>
                                    function validateForm() {
                                        var isValid = true;

                                        // Validate first name
                                        var firstName = document.getElementById("first_name").value.trim();
                                        if (firstName === "") {
                                            document.getElementById("first_name_error").innerText = "The first name field is required.";
                                            isValid = false;
                                        } else {
                                            document.getElementById("first_name_error").innerText = "";
                                        }
                                        // Validate first name
                                        var recommendation = document.getElementById("recommendation").value.trim();
                                        if (recommendation === "") {
                                            document.getElementById("recommendation_error").innerText = "The Health Insurance Certificate field is required.";
                                            isValid = false;
                                        } else {
                                            document.getElementById("recommendation").innerText = "";
                                        }




                                        // Validate email
                                        var email = document.getElementById("email").value.trim();
                                        if (email === "") {
                                            document.getElementById("email_error").innerText = "The email field is required.";
                                            isValid = false;
                                        } else {
                                            document.getElementById("email_error").innerText = "";
                                        }

                                        // Validate mobile number
                                        var mobileNo = document.getElementById("mobile_no").value.trim();
                                        if (mobileNo === "" || isNaN(mobileNo) || mobileNo.length !== 10) {
                                            document.getElementById("mobile_no_error").innerText =
                                                "The mobile no field is required and must be 10 digits ";
                                            isValid = false;
                                        } else {
                                            document.getElementById("mobile_no_error").innerText = "";
                                        }


                                        // Validate address line 1
                                        var registeredAddress = document.getElementById("registered_address").value.trim();
                                        if (registeredAddress === "") {
                                            document.getElementById("registered_address_error").innerText = "The address line1 field is required.";
                                            isValid = false;
                                        } else {
                                            document.getElementById("registered_address_error").innerText = "";
                                        }

                                        // Validate postal_code code
                                        var postal_code = document.getElementById("postal_code").value.trim();
                                        if (postal_code === "") {
                                            document.getElementById("postal_code_error").innerText = "The postal_code field is required.";
                                            isValid = false;
                                        } else {
                                            document.getElementById("postal_code_error").innerText = "";
                                        }

                                        // Validate city
                                        var city = document.getElementById("city").value.trim();
                                        if (city === "") {
                                            document.getElementById("city_error").innerText = "The city field is required.";
                                            isValid = false;
                                        } else {
                                            document.getElementById("city_error").innerText = "";
                                        }

                                        // Validate country
                                        var country = document.getElementById("country").value.trim();
                                        if (country === "") {
                                            document.getElementById("country_error").innerText = "The country field is required.";
                                            isValid = false;
                                        } else {
                                            document.getElementById("country_error").innerText = "";
                                        }

                                        // Validate state
                                        var state = document.getElementById("state").value.trim();
                                        if (state === "") {
                                            document.getElementById("state_error").innerText = "The state field is required.";
                                            isValid = false;
                                        } else {
                                            document.getElementById("state_error").innerText = "";
                                        }


                                        //    =============================

                                        // Validate first name
                                        var presidentName = document.getElementById("president_name").value.trim();
                                        if (presidentName === "") {
                                            document.getElementById("president_name_error").innerText = "The President name field is required.";
                                            isValid = false;
                                        } else {
                                            document.getElementById("president_name_error").innerText = "";
                                        }




                                        // Validate email
                                        var presidentEmail = document.getElementById("president_email").value.trim();
                                        if (presidentEmail === "") {
                                            document.getElementById("president_email_error").innerText = "The president email field is required.";
                                            isValid = false;
                                        } else {
                                            document.getElementById("president_email_error").innerText = "";
                                        }

                                        // Validate mobile number
                                        var presidentMobileNo = document.getElementById("president_phone_number").value.trim();
                                        if (presidentMobileNo === "" || isNaN(presidentMobileNo) || presidentMobileNo.length !== 10) {
                                            document.getElementById("president_mobile_no_error").innerText =
                                                "The mobile no field is required and must be 10 digits ";
                                            isValid = false;
                                        } else {
                                            document.getElementById("president_mobile_no_error").innerText = "";
                                        }



                                        return isValid;
                                    }
                                </script>
                                {{-- /Validtion Script --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- /Content -->
    </div>
    <!-- /Page content wrap -->







@endsection
