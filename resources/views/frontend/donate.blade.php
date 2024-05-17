@extends('frontend.layouts.main')
@section('main-container')
    <!-- Top panel -->
    <section class="top_panel_image">
        <div class="top_panel_image_hover"></div>
        <div class="content_wrap">
            <div class="top_panel_image_header">
                <h1 class="top_panel_image_title">Donate</h1>
                <div class="breadcrumbs">
                    <a class="breadcrumbs_item home" href="{{ url('/') }}">Home</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current">Donate</span>
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
                        <div class="post_thumb" data-image="http://placehold.it/840x800" data-title="Shannon Lorenz">
                            <a class="hover_icon hover_icon_view" href="http://placehold.it/840x800" title="Shannon Lorenz">
                                <img alt="Shannon Lorenz" src="http://placehold.it/570x542">
                            </a>
                        </div>
                    </section>
                    <section class="single_team_post_description">
                        <h2 class="team_title">Donate to Ski and Snowboard India (SSI)</h2>
                        {{-- <h6 class="team_position">Instructor</h6> --}}
                        <div class="team_meta"></div>
                        <div class="team_brief_info">
                            <div class="team_brief_info_text">
                                <p>The Foundation provides Ski and Snowboard India (SSI) athletes of today and tomorrow with
                                    the opportunities, skills and tools necessary to fulfill their dreams. Our athletes push
                                    themselves every day to represent our country. Your support directly impacts their
                                    journey from the clubs to the Olympics and beyond. You are the Team behind the Team.</p>
                            </div>
                        </div>
                        <a href="#"
                            class="sc_button sc_button_square sc_button_style_filled sc_button_size_small margin_top_small margin_bottom_null">Contact
                            Us</a>
                    </section>
                </div>
                <!-- /Single team info -->
                <!-- Testimonials -->
                <div class="">
                    <div class="content_wrap">
                        <div class="sc_testimonials sc_testimonials_style_testimonials-1 width_100_per">

                            <h6 class="sc_testimonials_subtitle sc_item_subtitle">DONATE TO</h6>
                            <h2 class="sc_testimonials_title sc_item_title sc_item_title_without_descr">SKI AND SNOWBOARD
                                INDIA (SSI)</h2>
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
                                    <form id="donationForm" action="{{ route('addDonation') }}" method="POST"
                                        enctype="multipart/form-data" class="donationForm sc_input_hover_default"
                                        onsubmit="return validateForm()">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">

                                                    <label for="donation_type" class="form-label">Donation Type</label>
                                                    <div class="d-flex">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" id="one_time"
                                                                name="donation_type" value="onetime" checked>
                                                            <label class="form-check-label" for="one_time">One Time</label>
                                                        </div>
                                                        <div class="form-check ms-5">
                                                            <input class="form-check-input" type="radio" id="monthly"
                                                                name="donation_type" value="monthly">
                                                            <label class="form-check-label" for="monthly">Monthly</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="currency" class="form-label">Currency</label>
                                                    <select class="form-select" id="currency" name="currency">
                                                        <option value="INR">INR</option>
                                                        <option value="USD">USD</option>
                                                        <!-- Add more currency options as needed -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="amount" class="form-label">Amount</label>
                                                    <input type="text" class="form-control" id="amount"
                                                        name="amount">
                                                    <span id="amount_error" class="error-message text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="hidden" name="dedicate"
                                                            value="0"> <!-- Hidden input with value 0 -->
                                                        <input class="form-check-input" type="checkbox" id="dedicate"
                                                            name="dedicate" value="1">
                                                        <label class="form-check-label" for="dedicate">Dedicate my
                                                            donation</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6" id="honor_type_wrapper">
                                                <div class="mb-3">
                                                    <label for="honor_type" class="form-label">Honor Type</label><br>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            id="honor_type_in_honor_of" name="honor_type"
                                                            value="in honor of">

                                                        <label class="form-check-label" for="honor_type_in_honor_of">In
                                                            Honor Of</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            id="honor_type_in_memory_of" name="honor_type"
                                                            value="in memory of">
                                                        <label class="form-check-label" for="honor_type_in_memory_of">In
                                                            Memory Of</label>
                                                    </div>

                                                </div>
                                                <span id="honor_type_error" class="error-message text-danger"></span>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="honoree_first_name" class="form-label">Honoree First
                                                        Name</label>
                                                    <input type="text" class="form-control" id="honoree_first_name"
                                                        name="honoree_first_name">
                                                    <span id="honoree_first_name_error"
                                                        class="error-message text-danger"></span>
                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="honoree_last_name" class="form-label">Honoree Last
                                                        Name</label>
                                                    <input type="text" class="form-control" id="honoree_last_name"
                                                        name="honoree_last_name">
                                                    <span id="honoree_last_name_error"
                                                        class="error-message text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="first_name" class="form-label">First Name</label>
                                                    <input type="text" class="form-control" id="first_name"
                                                        name="first_name">
                                                    <span id="first_name_error" class="error-message text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="last_name" class="form-label">Last Name</label>
                                                    <input type="text" class="form-control" id="last_name"
                                                        name="last_name">
                                                    <span id="last_name_error" class="error-message text-danger"></span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email"
                                                        name="email">
                                                    <span id="email_error" class="error-message text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="mobile_no" class="form-label">Mobile Number</label>
                                                    <input type="tel" class="form-control" id="mobile_no"
                                                        name="mobile_no">
                                                    <span id="mobile_no_error" class="error-message text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="hidden"
                                                            name="future_contact" value="0">
                                                        <!-- Hidden input with value 0 -->
                                                        <input class="form-check-input" type="checkbox"
                                                            id="future_contact" name="future_contact" value="1">
                                                        <label class="form-check-label" for="future_contact">Allow Future
                                                            Contact</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="address_line1" class="form-label">Address Line 1</label>
                                                    <input type="text" class="form-control" id="address_line1"
                                                        name="address_line1">
                                                    <span id="address_line1_error"
                                                        class="error-message text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="address_line2" class="form-label">Address Line 2</label>
                                                    <input type="text" class="form-control" id="address_line2"
                                                        name="address_line2">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="country" class="form-label">Country</label>
                                                    <input type="text" class="form-control" id="country"
                                                        name="country">
                                                    <span id="country_error" class="error-message text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="state" class="form-label">State</label>
                                                    <input type="text" class="form-control" id="state"
                                                        name="state">
                                                    <span id="state_error" class="error-message text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="city" class="form-label">City</label>
                                                    <input type="text" class="form-control" id="city"
                                                        name="city">
                                                    <span id="city_error" class="error-message text-danger"></span>
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="zip" class="form-label">ZIP Code</label>
                                                    <input type="text" class="form-control" id="zip"
                                                        name="zip">
                                                    <span id="zip_error" class="error-message text-danger"></span>
                                                </div>
                                            </div>



                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="comment" class="form-label">Comment</label>
                                                    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="gift_allocation" class="form-label">Gift
                                                        Allocation</label>
                                                    <textarea class="form-control" id="gift_allocation" name="gift_allocation" rows="3"></textarea>
                                                </div>
                                            </div>





                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <p>Follow the U.S. Ski & Snowboard Teams with weekly (May-Oct.) news and
                                                        information for all ski and snowboard sport disciplines. In
                                                        addition, we provide the Daily Update (in-season), which offers a
                                                        quick recap of athlete and event results, upcoming events, TV and
                                                        streaming schedules.</p>
                                                    <div class="d-flex">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                id="subscription_to_news" name="subscription_to_news"
                                                                value="1">
                                                            <label class="form-check-label"
                                                                for="subscription_to_news">Yes</label>
                                                        </div>
                                                        <div class="form-check ms-5">
                                                            <input class="form-check-input" type="radio"
                                                                id="subscription_to_news" name="subscription_to_news"
                                                                value="0">
                                                            <label class="form-check-label"
                                                                for="subscription_to_news">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <p>Yes, I want to receive text updates. By participating, you agree to
                                                        the terms & privacy policy (tandcs.us/sst) for recurring autodialed
                                                        donation messages from U.S. Ski & Snowboard to the phone number you
                                                        provide. No consent to buy. Msg&data rates may apply.</p>
                                                    <div class="d-flex">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                id="text_updates" name="text_updates" value="1">
                                                            <label class="form-check-label"
                                                                for="text_updates_yes">Yes</label>
                                                        </div>
                                                        <div class="form-check ms-5">
                                                            <input class="form-check-input" type="radio"
                                                                id="text_updates_no" name="text_updates" value="0">
                                                            <label class="form-check-label"
                                                                for="text_updates_no">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="cover_fees" name="cover_fees" value="1">
                                                        <label class="form-check-label" for="cover_fees">Cover Fees (10% will be added to your donation amount)</label>
                                                    </div>
                                                    <div>
                                                        <p>
                                                        <b id="amount_donated">Amount Donated:</b> <br />
                                                        <b id="cover_fees_display">Cover Fees:</b> <br />
                                                        <b id="total_amount">Total Amount:</b> <br />
                                                    </p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <button type="submit"
                                                        class="sc_button sc_button_square sc_button_style_filled sc_button_size_small margin_top_small margin_bottom_null">
                                                        UPI
                                                    </button>
                                                    <button type="button"
                                                        class="sc_button sc_button_square sc_button_style_filled sc_button_size_small margin_top_small margin_bottom_null">Credit
                                                        Card</button>
                                                </div>
                                            </div>
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

                                            // Validate honoree first name
                                            var honoreeFirstName = document.getElementById("honoree_first_name").value.trim();
                                            if (honoreeFirstName === "") {
                                                document.getElementById("honoree_first_name_error").innerText = "The honoree first name field is required.";
                                                isValid = false;
                                            } else {
                                                document.getElementById("honoree_first_name_error").innerText = "";
                                            }

                                            // Validate last name
                                            var lastName = document.getElementById("last_name").value.trim();
                                            if (lastName === "") {
                                                document.getElementById("last_name_error").innerText = "The last name field is required.";
                                                isValid = false;
                                            } else {
                                                document.getElementById("last_name_error").innerText = "";
                                            }

                                            // Validate honoree last name
                                            var honoreeLastName = document.getElementById("honoree_last_name").value.trim();
                                            if (honoreeLastName === "") {
                                                document.getElementById("honoree_last_name_error").innerText = "The honoree last name field is required.";
                                                isValid = false;
                                            } else {
                                                document.getElementById("honoree_last_name_error").innerText = "";
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
                                                    "The mobile no field is required and must be 10 digits and accept only numbers.";
                                                isValid = false;
                                            } else {
                                                document.getElementById("mobile_no_error").innerText = "";
                                            }


                                            // Validate address line 1
                                            var addressLine1 = document.getElementById("address_line1").value.trim();
                                            if (addressLine1 === "") {
                                                document.getElementById("address_line1_error").innerText = "The address line1 field is required.";
                                                isValid = false;
                                            } else {
                                                document.getElementById("address_line1_error").innerText = "";
                                            }

                                            // Validate zip code
                                            var zip = document.getElementById("zip").value.trim();
                                            if (zip === "") {
                                                document.getElementById("zip_error").innerText = "The zip field is required.";
                                                isValid = false;
                                            } else {
                                                document.getElementById("zip_error").innerText = "";
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


                                            // Validate amount
                                            var amount = document.getElementById("amount").value.trim();
                                            if (amount === "") {
                                                document.getElementById("amount_error").innerText = "The amount field is required.";
                                                isValid = false;
                                            } else {
                                                document.getElementById("amount_error").innerText = "";
                                            }

                                            // Validate honor type
                                            var honorType = document.querySelector('input[name="honor_type"]:checked');
                                            if (!honorType) {
                                                document.getElementById("honor_type_error").innerText = "The honor type field is required.";
                                                isValid = false;
                                            } else {
                                                document.getElementById("honor_type_error").innerText = "";
                                            }

                                            return isValid;
                                        }
                                    </script>
                                    {{-- /Validtion Script --}}

                                    {{-- Amount Calculation Script --}}
                                    <script>
                                        // Function to update the display based on the amount and cover fees checkbox
                                        function updateDisplay() {
                                            // Get the amount input field value
                                            var amount = parseFloat(document.getElementById("amount").value.trim());

                                            // Check if the cover fees checkbox is checked
                                            var coverFees = document.getElementById("cover_fees").checked;

                                            // Calculate the total amount
                                            var totalAmount = amount;
                                            if (coverFees) {
                                                totalAmount += amount * 0.1; // Add 10% as cover fees
                                            }

                                            // Display the amounts
                                            document.getElementById("amount_donated").innerText = "Amount Donated: " + amount.toFixed(2);
                                            document.getElementById("cover_fees_display").innerText = "Cover Fees: " + (coverFees ? (amount * 0.1).toFixed(
                                                2) : "0.00");
                                            document.getElementById("total_amount").innerText = "Total Amount: " + totalAmount.toFixed(2);
                                        }

                                        // Add event listeners to amount input field and cover fees checkbox
                                        document.getElementById("amount").addEventListener("input", updateDisplay);
                                        document.getElementById("cover_fees").addEventListener("change", updateDisplay);

                                        // Call updateDisplay initially to set the initial display
                                        updateDisplay();
                                    </script>

                                    {{-- /Amount Calculation Script --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Testimonials -->
            </article>

        </div>
        <!-- /Content -->
    </div>
    <!-- /Page content wrap -->
@endsection
