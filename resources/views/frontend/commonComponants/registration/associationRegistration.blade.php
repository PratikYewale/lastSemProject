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
                             onsubmit="return validateForm()">
                             @csrf <!-- CSRF token -->
                             <div class="row">
                                 <div class="col-lg-12">
                                     <h4 class="mt-auto form-section-title">Association Information</h4>
                                 </div>
                                 <div class="col-lg-4">
                                     <div class="mb-3">
                                         <label for="name_of_state_unit" class="form-label">Name of State Unit</label>
                                         <input type="text" class="form-control" id="name_of_state_unit"
                                             name="name_of_state_unit">
                                         <div id="error-name_of_state_unit"class="text-danger"></div>
                                     </div>

                                 </div>
                                 <div class="col-lg-4">
                                     <div class="mb-3">
                                         <label for="date_of_establishment" class="form-label">Date of
                                             Establishment</label>
                                         <input type="date" class="form-control" id="date_of_establishment"
                                             name="date_of_establishment">
                                         <div id="error-date_of_establishment"class="text-danger"></div>
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
                                         <div id="error-email"class="text-danger"></div>
                                     </div>

                                 </div>

                                 <div class="col-lg-4">
                                     <div class="mb-3">
                                         <label for="mobile_no" class="form-label">Mobile Number</label>
                                         <input type="number" class="form-control" id="mobile_no" name="mobile_no" pattern="[0-9]{10}" maxlength="10">

                                         <div id="error-mobile_no"class="text-danger"></div>
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
                                         <div id="error-country"class="text-danger"></div>
                                     </div>
                                 </div>
                                 <div class="col-lg-4">
                                     <div class="mb-3">
                                         <label for="state" class="form-label">Select State / Province</label>
                                         <input type="text" class="form-control" id="state" name="state">
                                         <div id="error-state"class="text-danger"></div>
                                     </div>
                                 </div>
                                 <div class="col-lg-4">
                                     <div class="mb-3">
                                         <label for="city" class="form-label">City</label>
                                         <input type="text" class="form-control" id="city" name="city">
                                         <div id="error-city"class="text-danger"></div>
                                     </div>
                                 </div>

                                 <div class="col-lg-4">
                                     <div class="mb-3">
                                         <label for="registered_address" class="form-label">Registered Address</label>
                                         <input type="text" class="form-control" id="registered_address"
                                             name="registered_address">
                                         <div id="error-registered_address"class="text-danger"></div>
                                     </div>
                                 </div>


                                 <div class="col-lg-4">
                                     <div class="mb-3">
                                         <label for="postal_code " class="form-label">Postal Code</label>
                                         <input type="number" pattern="[0-9]{6}" maxlength="6" minlength="6"
                                             class="form-control" id="postal_code" name="postal_code">
                                         <div id="error-postal_code"class="text-danger"></div>
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
                                         <label for="currency" class="form-label" disabled>Currency</label>
                                         <input type="text" class="form-control" value="INR" id="currency"
                                             name="currency">
                                         <div id="error-currency"class="text-danger"></div>
                                     </div>
                                 </div>
                                 <div class="col-lg-4">
                                     <div class="mb-3">
                                         <label for="amount" class="form-label" disabled>Amount</label>
                                         <input type="text" class="form-control" id="amount" name="amount"
                                             value="1000">
                                         <div id="error-amount"class="text-danger"></div>
                                     </div>
                                 </div>
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
                     </div>
                 </div>
             </div>

         </div>
     </div>
 </div>
 <!-- /Modal -->
 <script>
     function validateForm() {
         var nameOfStateUnit = document.getElementById("name_of_state_unit").value;
         var dateOfEstablishment = document.getElementById("date_of_establishment").value;
         var email = document.getElementById("email").value;
         var mobileNo = document.getElementById("mobile_no").value;
         var postalCode = document.getElementById("postal_code").value;
         var acknowledgement = document.getElementById("acknowledgement").checked;

         // Resetting error messages
         document.getElementById("error-name_of_state_unit").innerText = "";

         // Name of State Unit validation
         if (nameOfStateUnit.trim() === "") {
             document.getElementById("error-name_of_state_unit").innerText = "Name Of State Unit is required";
             return false;
         }

         // Date Of Establishment validation
         var currentDate = new Date();
         var establishmentDate = new Date(dateOfEstablishment);
         if (establishmentDate >= currentDate) {
             document.getElementById("error-date_of_establishment").innerText =
                 "Date Of Establishment must be before now";
             return false;
         }

         // Email Format validation
         var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
         if (!emailPattern.test(email)) {
             document.getElementById("error-email").innerText = "Invalid Email Format";
             return false;
         }

         // Mobile Number validation
         var mobilePattern = /^[0-9]{10}$/;
         if (!mobilePattern.test(mobileNo)) {
             document.getElementById("error-mobile_no").innerText = "Mobile number must be a 10-digit number";
             return false;
         }

         // Postal Code validation
         var postalPattern = /^[0-9]{6}$/;
         if (!postalPattern.test(postalCode)) {
             document.getElementById("error-postal_code").innerText = "Postal code must be a 6-digit number";
             return false;
         }

         // Acknowledgement validation
         if (!acknowledgement) {
             document.getElementById("error-acknowledgement").innerText = "Please acknowledge the disclaimer";
             return false;
         }

         // Enable submit button if all validations pass
         document.getElementById("submit-btn").disabled = false;

         return true;
     }
 </script>
