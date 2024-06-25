    <!-- Page content wrap -->
    <div class=" page_paddings_yes mt-5 mb-5">
        <!-- Content -->
        <div class="content">
            <article class="post_item post_item_single_team post_featured_left team ">

                <div class="content_wrap">

                    <div class="content">

                        <div class="comments_form">
                            @if(Auth::user()->role === 'athlete')
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

                                <form id="editProfile" action="{{ route('updateAthlete') }}" method="POST"
                                    enctype="multipart/form-data" class="donationForm sc_input_hover_default"
                                    onsubmit="return validateForm()">
                                    @csrf <!-- CSRF token -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h4 class="mt-auto">Athletes Information</h4>
                                        </div>
                                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="first_name" class="form-label">First Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="first_name"
                                                    name="first_name"  value="{{ Auth::user()->first_name }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="middle_name" class="form-label">Middle Name</label>
                                                <input type="text" class="form-control" id="middle_name"
                                                    name="middle_name" value="{{ Auth::user()->middle_name }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="last_name" class="form-label">Last Name <span
                                                        class="text-danger">*</span> </label>
                                                <input type="text" class="form-control" id="last_name"
                                                    name="last_name" value="{{ Auth::user()->last_name }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="date_of_birth" class="form-label">Date Of Birth <span
                                                        class="text-danger">*</span></label>
                                                <input type="date" class="form-control" id="date_of_birth"
                                                    name="date_of_birth" value="{{ Auth::user()->date_of_birth }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="profile_picture" class="form-label">Profile Picture <span
                                                        class="text-danger">*</span></label>
                                                <input type="file" class="form-control" id="profile_picture"
                                                    name="profile_picture" value="{{ Auth::user()->profile_picture }}">
                                            </div>
                                        </div>


                                        {{-- <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="gender" class="form-label">Gender <span class="text-danger">*</span></label>
                                                <div class="d-flex">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender" id="gender_male" value="1"
                                                            {{ Auth::user()->gender == 1 ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="gender_male">
                                                            Male
                                                        </label>
                                                    </div>
                                                    <div class="form-check ms-3">
                                                        <input class="form-check-input" type="radio" name="gender" id="gender_female" value="0"
                                                            {{ Auth::user()->gender == 0 ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="gender_female">
                                                            Female
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}



                                        {{-- <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email Id <span
                                                        class="text-danger">*</span></label>
                                                <input type="email" class="form-control" id="email"
                                                    name="email" value="{{ Auth::user()->email}}">
                                            </div>

                                        </div> --}}

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="mobile_no" class="form-label">Mobile Number <span
                                                        class="text-danger">*</span></label>
                                                <input type="tel" class="form-control" id="mobile_no"
                                                    name="mobile_no" pattern="[0-9]{10}" maxlength="10"
                                                    value="{{ Auth::user()->mobile_no}}">
                                            </div>
                                        </div>







                                        <div class="col-lg-12">
                                            <h4 class="mt-auto form-section-title">Address Information</h4>
                                        </div>




                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="country" class="form-label">Country <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="country"
                                                    name="country" value="{{ Auth::user()->country}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="state" class="form-label">State / Province <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="state"
                                                    name="state" value="{{ Auth::user()->state}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="city" class="form-label">City <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="city"
                                                    name="city" value="{{ Auth::user()->city}}">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Address <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="address"
                                                    name="address" value="{{ Auth::user()->address}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="postal_code" class="form-label">Postal Code <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="postal_code"
                                                    name="postal_code" value="{{ Auth::user()->postal_code}}">
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
                                                    name="aadhar_number" value="{{ Auth::user()->aadhar_number}}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="aadhar_card" class="form-label">Aadhar Card <span
                                                        class="text-danger">*</span></label>
                                                <input type="file" class="form-control" id="aadhar_card"
                                                    name="aadhar_card" value="{{ Auth::user()->aadhar_card}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 d-none d-lg-block"></div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="passport_number" class="form-label">Passport Number</label>
                                                <input type="text" class="form-control" id="passport_number"
                                                    name="passport_number" value="{{ Auth::user()->passport_number}}" >
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="passport" class="form-label">Passport (Upload)</label>
                                                <input type="file" class="form-control" id="passport"
                                                    name="passport" value="{{ Auth::user()->passport}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 d-none d-lg-block"></div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="recommendation" class="form-label">Recommendation from State
                                                    Sports
                                                    Federation</label>
                                                <input type="file" class="form-control" id="recommendation"
                                                    name="recommendation" value="{{ Auth::user()->recommendation}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="anti_doping_certificate" class="form-label">Anti Doping
                                                    Certificate <span class="text-danger">*</span></label>
                                                <input type="file" class="form-control" id="anti_doping_certificate"
                                                    name="anti_doping_certificate" value="{{ Auth::user()->anti_doping_certificate}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="physical_fitness_certificate" class="form-label">Physical
                                                    Fitness Certificate <span class="text-danger">*</span></label>
                                                <input type="file" class="form-control"
                                                    id="physical_fitness_certificate" name="physical_fitness_certificate"
                                                    value="{{ Auth::user()->physical_fitness_certificate}}">
                                            </div>
                                        </div>













                                        <div class="col-lg-12">
                                            <div class="mb-3 d-flex">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                    id="acknowledge" name="acknowledge"value="{{ Auth::user()->acknowledge}}">
                                                <label class="form-check-label ms-3" for="acknowledge">
                                                    <b>Disclaimer:</b><br />
                                                    By submitting this form, I certify that all information provided is true
                                                    and accurate to the best of my knowledge.
                                                </label>
                                            </div>
                                        </div>




                                    </div>
                                    <div class="">
                                        <a href="profile">
                                        <button type="button"
                                            class="sc_button sc_button_square sc_button_style_filled sc_button_size_small  sc_button_hover_fade bg-danger"
                                            data-bs-dismiss="modal">Cancel </button>
                                        </a>

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
                                        var registeredAddress = document.getElementById("address").value.trim();
                                        if (registeredAddress === "") {
                                            document.getElementById("address_error").innerText = "The address line1 field is required.";
                                            isValid = false;
                                        } else {
                                            document.getElementById("address_error").innerText = "";
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
                            @elseif(Auth::user()->role === 'member')
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
                                <form id="addAssociationMemberForm" action="{{ route('addAssociationMember') }}"
                                    method="POST" enctype="multipart/form-data"
                                    class="donationForm sc_input_hover_default" onsubmit="return validateForm()">
                                    @csrf <!-- CSRF token -->
                                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h4 class="mt-auto form-section-title">Association Information</h4>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="first_name" class="form-label">Name of State Unit <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="first_name"
                                                    name="first_name" value="{{ Auth::user()->first_name }}">
                                                <div id="first_name_error" class="text-danger"></div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="date_of_establishment" class="form-label">Date of
                                                    Establishment<span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" id="date_of_establishment"
                                                    name="date_of_establishment" value="{{ Auth::user()->date_of_establishment }}">
                                                <div id="error-date_of_establishment" class="text-danger"></div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="incorporation_certificate_number"
                                                    class="form-label">Incorporation Certificate
                                                    Number<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control"
                                                    id="incorporation_certificate_number"
                                                    name="incorporation_certificate_number"
                                                    value="{{ Auth::user()->incorporation_certificate_number }}">
                                                <div id="error-incorporation_certificate_number"class="text-danger"></div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email Id <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" id="email"
                                                    name="email">
                                                <div id="email_error"class="text-danger"></div>
                                            </div>

                                        </div> --}}

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="mobile_no" class="form-label">Mobile Number <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="mobile_no"
                                                    name="mobile_no" pattern="[0-9]{10}" maxlength="10"  value="{{ Auth::user()->mobile_no }}">

                                                <div id="mobile_no_error"class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="website" class="form-label">Website (if applicable)</label>
                                                <input type="text" class="form-control" id="website"
                                                    name="website" value="{{ Auth::user()->website }}">
                                                <div id="error-website"class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="logo" class="form-label"> Logo</label>
                                                <input type="file" class="form-control" id="logo"
                                                    name="logo" value="{{ Auth::user()->logo }}">
                                                <div id="error-logo"class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 d-none d-lg-block"></div>

                                        {{-- <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="recognition_by_state_government"
                                                    class="form-label">Recognition
                                                    by State Government (Yes/No)</label>
                                                <div class="d-flex ">
                                                    <div class="form-check ">
                                                        <input class="form-check-input" type="radio"
                                                            name="recognition_by_state_government"
                                                            id="recognition_by_state_government" value="1">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check ms-3">
                                                        <input class="form-check-input" type="radio"
                                                            name="recognition_by_state_government"
                                                            id="recognition_by_state_government" value="0">
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            No
                                                        </label>
                                                    </div>
                                                    <div id="error-recognition_by_state_government"class="text-danger">
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}

                                        {{-- <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="recognition_by_state_olympic_association" class="form-label">
                                                    Recognition by State Olympic Association (Yes/No)</label>
                                                <div class="d-flex ">
                                                    <div class="form-check ">
                                                        <input class="form-check-input" type="radio"
                                                            name="recognition_by_state_olympic_association"
                                                            id="recognition_by_state_olympic_association" value="1">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check ms-3">
                                                        <input class="form-check-input" type="radio"
                                                            name="recognition_by_state_olympic_association"
                                                            id="recognition_by_state_olympic_association" value="0">
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                                <div
                                                    id="error-recognition_by_state_olympic_association"class="text-danger">
                                                </div>
                                            </div>
                                        </div> --}}

                                        {{-- <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="hosted_national_event_in_past_3_yrs" class="form-label">
                                                    Hosted
                                                    National Event in Past 3 yrs (Yes/No)</label>
                                                <div class="d-flex ">
                                                    <div class="form-check ">
                                                        <input class="form-check-input" type="radio"
                                                            name="hosted_national_event_in_past_3_yrs"
                                                            id="hosted_national_event_in_past_3_yrs" value="1">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check ms-3">
                                                        <input class="form-check-input" type="radio"
                                                            name="hosted_national_event_in_past_3_yrs"
                                                            id="hosted_national_event_in_past_3_yrs" value="0">
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                                <div id="error-hosted_national_event_in_past_3_yrs"class="text-danger">
                                                </div>
                                            </div>
                                        </div> --}}
                                        {{-- <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="hosted_international_event_in_past_4_yrs" class="form-label">
                                                    Hosted International Event in Past 4 yrs (Yes/No)</label>
                                                <div class="d-flex ">
                                                    <div class="form-check ">
                                                        <input class="form-check-input" type="radio"
                                                            name="hosted_international_event_in_past_4_yrs"
                                                            id="hosted_international_event_in_past_4_yrs" value="1">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check ms-3">
                                                        <input class="form-check-input" type="radio"
                                                            name="hosted_international_event_in_past_4_yrs"
                                                            id="hosted_international_event_in_past_4_yrs" value="0">
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                                <div
                                                    id="error-hosted_international_event_in_past_4_yrs"class="text-danger">
                                                </div>
                                            </div>
                                        </div> --}}
                                        {{-- <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="active_athletes_competed_in_past_2_yrs" class="form-label">
                                                    Active athletes that competed in national level events in past 2 yrs
                                                    (Yes/No)</label>
                                                <div class="d-flex ">
                                                    <div class="form-check ">
                                                        <input class="form-check-input" type="radio"
                                                            name="active_athletes_competed_in_past_2_yrs"
                                                            id="active_athletes_competed_in_past_2_yrs" value="1">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check ms-3">
                                                        <input class="form-check-input" type="radio"
                                                            name="active_athletes_competed_in_past_2_yrs"
                                                            id="active_athletes_competed_in_past_2_yrs" value="0">
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                                <div id="error-active_athletes_competed_in_past_2_yrs"class="text-danger">
                                                </div>
                                            </div>
                                        </div> --}}






                                        <div class="col-lg-12">
                                            <h4 class="mt-auto form-section-title">Address Information</h4>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="country" class="form-label">Country <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="country"
                                                    name="country" value="{{ Auth::user()->country }}">
                                                <div id="country_error"class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="state" class="form-label">State / Province <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="state"
                                                    name="state" value="{{ Auth::user()->state }}">
                                                <div id="state_error"class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="city" class="form-label">City <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="city"
                                                    name="city" value="{{ Auth::user()->city }}">
                                                <div id="city_error"class="text-danger"></div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="registered_address" class="form-label">Registered
                                                    Address <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="registered_address"
                                                    name="registered_address" value="{{ Auth::user()->registered_address }}">
                                                <div id="registered_address_error"class="text-danger"></div>
                                            </div>
                                        </div>


                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="postal_code " class="form-label">Postal Code <span class="text-danger">*</span></label>
                                                <input type="number" pattern="[0-9]{6}" maxlength="6" minlength="6"
                                                    class="form-control" id="postal_code" name="postal_code" value="{{ Auth::user()->postal_code }}">
                                                <div id="postal_code_error"class="text-danger"></div>
                                            </div>
                                        </div>



                                        <div class="col-lg-8">
                                            <div class="mb-3">
                                                <label for="comment" class="form-label">Activities Over the Past Four
                                                    Years</label>
                                                <textarea class="form-control" id="comment" rows="3" value="{{ Auth::user()->comment }}"></textarea>
                                                <div id="error-comment"class="text-danger"></div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mt-5">
                                            <h4 class="mt-auto form-section-title">President's Information </h4>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="president_name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="president_name"
                                                    name="president_name" value="{{ Auth::user()->president_name }}">
                                                <div id="president_name_error"class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="president_email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" id="president_email"
                                                    name="president_email" value="{{ Auth::user()->president_email }}">
                                                <div id="president_email_error"class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="president_phone_number" class="form-label">Phone
                                                    Number <span class="text-danger">*</span></label>
                                                <input type="tel" class="form-control" id="president_phone_number"
                                                    name="president_phone_number" value="{{ Auth::user()->president_phone_number }}">
                                                <div id="president_mobile_no_error"class="text-danger"></div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="president_signature" class="form-label">Signature of
                                                    President</label>
                                                <input type="file" class="form-control" id="president_signature"
                                                    name="president_signature" value="{{ Auth::user()->president_signature }}">
                                                <div id="error-president_signature"class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="signature_of_bearer_1" class="form-label">Signature of Office
                                                    Bearer 1</label>
                                                <input type="file" class="form-control" id="signature_of_bearer_1"
                                                    name="signature_of_bearer_1" value="{{ Auth::user()->signature_of_bearer_1 }}">
                                                <div id="error-signature_of_bearer_1"class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="signature_of_bearer_2" class="form-label">Signature of Office
                                                    Bearer 2</label>
                                                <input type="file" class="form-control" id="signature_of_bearer_2"
                                                    name="signature_of_bearer_2" value="{{ Auth::user()->signature_of_bearer_2 }}">
                                                <div id="error-signature_of_bearer_2"class="text-danger"></div>
                                            </div>
                                        </div>




                                        <div class="col-lg-12">
                                            <div class="mb-3 d-flex">

                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="acknowledgement" name="acknowledgement" value="{{ Auth::user()->acknowledgement }}">
                                                <label class="form-check-label ms-3" for="flexCheckChecked">
                                                    <b>Disclaimer:</b><br />
                                                    By signing this registration form, we acknowledge that the State Unit
                                                    agrees to abide by all rules, regulations, and decisions of Snow Sports
                                                    India (SSI). We understand that any disputes arising between the State
                                                    Unit
                                                    and SSI shall be resolved exclusively through the arbitration
                                                    commission
                                                    established by SSI. We also understand that failure to comply with
                                                    SSI's
                                                    requirements may result in disciplinary action, including suspension or
                                                    termination of membership.

                                                </label>
                                            </div>
                                            <div id="error-acknowledgement"class="text-danger"></div>
                                        </div>

                                        <div class="">
                                        <a href="profile">
                                        <button type="button"
                                            class="sc_button sc_button_square sc_button_style_filled sc_button_size_small  sc_button_hover_fade bg-danger"
                                            data-bs-dismiss="modal">Cancel </button>
                                        </a>
                                            <button type="submit"
                                                class="sc_button sc_button_square sc_button_style_filled sc_button_size_small  sc_button_hover_fade">Submit</button>
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
                            @endif
                        </div>

                    </div>
                </div>


                {{-- {{ Auth::user() }} --}}



            </article>

        </div>
        <!-- /Content -->

    </div>
    <!-- /Page content wrap -->
