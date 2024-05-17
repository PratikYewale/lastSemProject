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
                     <h2 class="team_title">Membership Of Ski and Snowboard India (SSI)</h2>
                     {{-- <h6 class="team_position">Instructor</h6> --}}
                     <div class="team_meta"></div>
                     <div class="team_brief_info">
                         <div class="team_brief_info_text">
                             <p>Ski and Snowboard India encompass a variety of Sport Membership, Development Membership
                                 and Competitions, all aimed at developing athletes and supporting coaches, officials,
                                 parents, and volunteers while accomplishing the vision and mission to make the India
                                 the
                                 "Best in the World" in Olympic skiing and snowboarding. </p>
                         </div>
                     </div>
                     <a href="#"
                         class="sc_button sc_button_square sc_button_style_filled sc_button_size_small margin_top_small margin_bottom_null"
                         data-bs-toggle="modal" data-bs-target="#associationFormModal">Register
                         Now</a>
                 </section>
             </div>
             <!-- /Single team info -->

         </article>



         <!-- Snowboard Schools -->
         <div class="hp_schools_section">
             <div class="content_wrap">
                 <div class="custom_title_1 text_align_center">WHAT WE OFFER</div>
                 <div class="sc_services_wrap">
                     <div
                         class="sc_services sc_services_style_services-3 sc_services_type_icons title_center width_100_per">
                         <h2 class="sc_services_title sc_item_title sc_item_title_with_descr">
                             Partnerships </h2>
                         {{-- <div class="sc_services_descr sc_item_descr">Partnerships and Sponsorships: Opportunities for Collaboration</div> --}}
                         <div class="sc_columns columns_wrap row">
                             <div class="col-lg-4 column_padding_bottom">
                                 <div class="sc_services_item sc_services_item_1 odd first">
                                     <div class="sc_services_item_featured post_featured">
                                         <div class="post_thumb" data-image=""
                                             data-title="Private Lessons for Beginners">
                                             <a class="" href="service-single.html">
                                                 <img alt="service_image_4.png"
                                                     src="{{ url('frontend/images/service_image_4.png') }}">
                                             </a>
                                         </div>
                                     </div>
                                     <div class="sc_services_item_content">

                                         <h4 class="sc_services_item_title">
                                             <a href="service-single.html">Event Sponsorship</a>
                                         </h4>
                                         <p class="mt-1">Businesses can sponsor our national championships, regional
                                             competitions, or training camps, gaining exposure through branding
                                             opportunities, promotional materials, and media coverage.</p>

                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-4 column_padding_bottom">
                                 <div class="sc_services_item sc_services_item_2 even">
                                     <div class="sc_services_item_featured post_featured">
                                         <div class="post_thumb" data-image=""
                                             data-title="Group Lessons for Beginners">
                                             <a class="" href="service-single.html">
                                                 <img alt="service_image_5.png"
                                                     src="{{ url('frontend/images/service_image_5.png') }}">
                                             </a>
                                         </div>
                                     </div>
                                     <div class="sc_services_item_content">

                                         <h4 class="sc_services_item_title">
                                             <a href="service-single.html">Equipment Partnerships</a>
                                         </h4>
                                         <p class="mt-1">Equipment brands can collaborate with us to provide athletes
                                             with access to high-quality gear and apparel, showcasing their products at
                                             our events and on our digital platforms.</p>

                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-4 column_padding_bottom">
                                 <div class="sc_services_item sc_services_item_3 odd">
                                     <div class="sc_services_item_featured post_featured">
                                         <div class="post_thumb" data-image="" data-title="Advanced Group Lessons">
                                             <a class="" href="service-single.html">
                                                 <img alt="service_image_6.png"
                                                     src="{{ url('frontend/images/service_image_6.png') }}">
                                             </a>
                                         </div>
                                     </div>
                                     <div class="sc_services_item_content">

                                         <h4 class="sc_services_item_title">
                                             <a href="service-single.html">Media Partnerships</a>
                                         </h4>
                                         <p class="mt-1">
                                             Media organizations can partner with us to cover our events, share athlete
                                             stories, and promote winter sports through engaging content across various
                                             channels.
                                         </p>

                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!-- /Snowboard Schools -->




     </div>
     <!-- /Content -->
 </div>
 <!-- /Page content wrap -->

 <!-- Modal -->
 <div class="modal fade" id="associationFormModal" tabindex="-1" aria-labelledby="associationFormModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
         <div class="modal-content ">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="associationFormModalLabel">Association Registration / Membership
                     Registration</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body px-5">
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
                         <form id="addAssociationMemberForm" action="{{ route('addAssociationMember') }}" method="POST"
                             enctype="multipart/form-data" class="donationForm sc_input_hover_default"
                             
                             >
                             @csrf <!-- CSRF token -->
                             <div class="row">
                                 <div class="col-lg-12">
                                     <h4 class="mt-auto form-section-title">Association Information</h4>
                                 </div>
                                 <div class="col-lg-4">
                                     <div class="mb-3">
                                         <label for="first_name" class="form-label">Name of State Unit</label>
                                         <input type="text" class="form-control" id="first_name"
                                             name="first_name">
                                         <div id="first_name_error" class="text-danger"></div>
                                     </div>
                                 </div>

                                 <div class="col-lg-4">
                                     <div class="mb-3">
                                         <label for="date_of_establishment" class="form-label">Date of
                                             Establishment</label>
                                         <input type="date" class="form-control" id="date_of_establishment"
                                             name="date_of_establishment">
                                         <div id="error-date_of_establishment" class="text-danger"></div>
                                     </div>
                                 </div>

                                 <div class="col-lg-4">
                                     <div class="mb-3">
                                         <label for="incorporation_certificate_number"
                                             class="form-label">Incorporation Certificate
                                             Number</label>
                                         <input type="text" class="form-control"
                                             id="incorporation_certificate_number"
                                             name="incorporation_certificate_number">
                                         <div id="error-incorporation_certificate_number"class="text-danger"></div>
                                     </div>
                                 </div>
                                 <div class="col-lg-4">
                                     <div class="mb-3">
                                         <label for="email" class="form-label">Email Id</label>
                                         <input type="email" class="form-control" id="email" name="email">
                                         <div id="email_error"class="text-danger"></div>
                                     </div>

                                 </div>

                                 <div class="col-lg-4">
                                     <div class="mb-3">
                                         <label for="mobile_no" class="form-label">Mobile Number</label>
                                         <input type="number" class="form-control" id="mobile_no" name="mobile_no"
                                             pattern="[0-9]{10}" maxlength="10">

                                         <div id="mobile_no_error"class="text-danger"></div>
                                     </div>
                                 </div>
                                 <div class="col-lg-4">
                                     <div class="mb-3">
                                         <label for="website" class="form-label">Website (if applicable)</label>
                                         <input type="text" class="form-control" id="website" name="website">
                                         <div id="error-website"class="text-danger"></div>
                                     </div>
                                 </div>
                                 <div class="col-lg-4">
                                     <div class="mb-3">
                                         <label for="logo" class="form-label"> Logo</label>
                                         <input type="file" class="form-control" id="logo" name="logo">
                                         <div id="error-logo"class="text-danger"></div>
                                     </div>
                                 </div>
                                 <div class="col-lg-6">
                                     <div class="mb-3">
                                         <label for="recognition_by_state_government" class="form-label">Recognition
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
                                             <div id="error-recognition_by_state_government"class="text-danger"></div>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="col-lg-6">
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
                                         <div id="error-recognition_by_state_olympic_association"class="text-danger">
                                         </div>
                                     </div>
                                 </div>

                                 <div class="col-lg-6">
                                     <div class="mb-3">
                                         <label for="hosted_national_event_in_past_3_yrs" class="form-label"> Hosted
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
                                         <div id="error-hosted_national_event_in_past_3_yrs"class="text-danger"></div>
                                     </div>
                                 </div>
                                 <div class="col-lg-6">
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
                                         <div id="error-hosted_international_event_in_past_4_yrs"class="text-danger">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-lg-6">
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
                                 </div>






                                 <div class="col-lg-12">
                                     <h4 class="mt-auto form-section-title">Address Information</h4>
                                 </div>
                                 <div class="col-lg-4">
                                     <div class="mb-3">
                                         <label for="country" class="form-label">Select Country</label>
                                         <input type="text" class="form-control" id="country" name="country">
                                         <div id="country_error"class="text-danger"></div>
                                     </div>
                                 </div>
                                 <div class="col-lg-4">
                                     <div class="mb-3">
                                         <label for="state" class="form-label">Select State / Province</label>
                                         <input type="text" class="form-control" id="state" name="state">
                                         <div id="state_error"class="text-danger"></div>
                                     </div>
                                 </div>
                                 <div class="col-lg-4">
                                     <div class="mb-3">
                                         <label for="city" class="form-label">City</label>
                                         <input type="text" class="form-control" id="city" name="city">
                                         <div id="city_error"class="text-danger"></div>
                                     </div>
                                 </div>

                                 <div class="col-lg-4">
                                     <div class="mb-3">
                                         <label for="registered_address" class="form-label">Registered Address</label>
                                         <input type="text" class="form-control" id="registered_address"
                                             name="registered_address">
                                         <div id="registered_address_error"class="text-danger"></div>
                                     </div>
                                 </div>


                                 <div class="col-lg-4">
                                     <div class="mb-3">
                                         <label for="postal_code " class="form-label">Postal Code</label>
                                         <input type="number" pattern="[0-9]{6}" maxlength="6" minlength="6"
                                             class="form-control" id="postal_code" name="postal_code">
                                         <div id="postal_code_error"class="text-danger"></div>
                                     </div>
                                 </div>



                                 <div class="col-lg-8">
                                     <div class="mb-3">
                                         <label for="comment" class="form-label">Activities Over the Past Four
                                             Years</label>
                                         <textarea class="form-control" id="comment" rows="3"></textarea>
                                         <div id="error-comment"class="text-danger"></div>
                                     </div>
                                 </div>

                                 <div class="col-lg-12 mt-5">
                                     <h4 class="mt-auto form-section-title">President's Information</h4>
                                 </div>

                                 <div class="col-lg-4">
                                     <div class="mb-3">
                                         <label for="president_name" class="form-label">Full Name</label>
                                         <input type="text" class="form-control" id="president_name"
                                             name="president_name">
                                         <div id="error-president_name"class="text-danger"></div>
                                     </div>
                                 </div>
                                 <div class="col-lg-4">
                                     <div class="mb-3">
                                         <label for="president_email" class="form-label">Email Address</label>
                                         <input type="email" class="form-control" id="president_email"
                                             name="president_email">
                                         <div id="error-president_email"class="text-danger"></div>
                                     </div>
                                 </div>
                                 <div class="col-lg-4">
                                     <div class="mb-3">
                                         <label for="president_phone_number" class="form-label">Phone Number</label>
                                         <input type="tel" class="form-control" id="president_phone_number"
                                             name="president_phone_number">
                                         <div id="error-president_phone_number"class="text-danger"></div>
                                     </div>
                                 </div>

                                 <div class="col-lg-4">
                                     <div class="mb-3">
                                         <label for="president_signature" class="form-label">Signature of
                                             President</label>
                                         <input type="file" class="form-control" id="president_signature"
                                             name="president_signature">
                                         <div id="error-president_signature"class="text-danger"></div>
                                     </div>
                                 </div>
                                 <div class="col-lg-4">
                                     <div class="mb-3">
                                         <label for="signature_of_bearer_1" class="form-label">Signature of Office
                                             Bearer 1</label>
                                         <input type="file" class="form-control" id="signature_of_bearer_1"
                                             name="signature_of_bearer_1">
                                         <div id="error-signature_of_bearer_1"class="text-danger"></div>
                                     </div>
                                 </div>
                                 <div class="col-lg-4">
                                     <div class="mb-3">
                                         <label for="signature_of_bearer_2" class="form-label">Signature of Office
                                             Bearer 2</label>
                                         <input type="file" class="form-control" id="signature_of_bearer_2"
                                             name="signature_of_bearer_2">
                                         <div id="error-signature_of_bearer_2"class="text-danger"></div>
                                     </div>
                                 </div>
                                 <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group d-flex">
                                            <input type="password" class="form-control " id="password" name="password" style="width: 80%">
                                            <div class="input-group-append h-100" style="width: 20%">
                                                <span class="input-group-text toggle-password" id="togglePassword" >
                                                    <span class="icon-eye"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div id="error-password" class="text-danger"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                                        <div class="input-group d-flex">
                                            <input type="password" class="form-control " id="password_confirmation" name="password_confirmation" style="width: 80%">
                                            <div class="input-group-append h-100" style="width: 20%">
                                                <span class="input-group-text toggle-password_confirmation" id="toggleConfirmPassword" >
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
                                     <div class="mb-3 d-flex">
                                         <input class="form-check-input" type="checkbox" value=""
                                             id="acknowledgement" name="acknowledgement">
                                         <label class="form-check-label ms-3" for="flexCheckChecked">
                                             <b>Disclaimer:</b><br />
                                             By signing this registration form, we acknowledge that the State Unit
                                             agrees to abide by all rules, regulations, and decisions of Snow Sports
                                             India (SSI). We understand that any disputes arising between the State Unit
                                             and SSI shall be resolved exclusively through the arbitration commission
                                             established by SSI. We also understand that failure to comply with SSI's
                                             requirements may result in disciplinary action, including suspension or
                                             termination of membership.

                                         </label>
                                     </div>
                                     <div id="error-acknowledgement"class="text-danger"></div>
                                 </div>

                                 <div class="">
                                     <button type="button"
                                         class="sc_button sc_button_square sc_button_style_filled sc_button_size_small  sc_button_hover_fade bg-danger"
                                         data-bs-dismiss="modal">Cancel</button>
                                     <button type="submit"
                                         class="sc_button sc_button_square sc_button_style_filled sc_button_size_small  sc_button_hover_fade">Submit</button>
                                 </div>

                             </div>

                         </form>

                    {{-- Validtion Script --}}
                    {{-- <script>
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
                                    "The mobile no field is required and must be 10 digits and accept only numbers.";
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


                         

                            return isValid;
                        }
                    </script> --}}
                    {{-- /Validtion Script --}}
                     </div>
                 </div>
             </div>

         </div>
     </div>
 </div>
 <!-- /Modal -->
