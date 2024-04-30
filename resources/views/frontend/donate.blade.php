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
                <div class="testimonials_section">
                    <div class="content_wrap">
                        <div class="sc_testimonials sc_testimonials_style_testimonials-1 width_100_per">

                            <h6 class="sc_testimonials_subtitle sc_item_subtitle">DONATE TO</h6>
                            <h2 class="sc_testimonials_title sc_item_title sc_item_title_without_descr">SKI AND SNOWBOARD
                                INDIA (SSI)</h2>
                            <div class="comments_form">
                                <div id="respond" class="comment-respond">
                                    <form action="#" method="post" id="donationForm"
                                        class="donationForm sc_input_hover_default">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="first_name" class="form-label">First Name</label>
                                                    <input type="text" class="form-control" id="first_name"
                                                        name="first_name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="last_name" class="form-label">Last Name</label>
                                                    <input type="text" class="form-control" id="last_name"
                                                        name="last_name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email Id</label>
                                                    <input type="email" class="form-control" id="email"
                                                        name="email">
                                                </div>
                                                <p class="text-dangar">Your receipt will be emailed here.</p>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="mobile_no" class="form-label">Mobile Number</label>
                                                    <input type="tel" class="form-control" id="mobile_no"
                                                        name="mobile_no">
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckChecked" checked>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        It's okay to contact me in the future.
                                                    </label>
                                                </div>

                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="address_line1" class="form-label">Address Line 1</label>
                                                    <input type="text" class="form-control" id="address_line1"
                                                        name="address_line1">
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
                                                    <label for="zip " class="form-label">ZIP</label>
                                                    <input type="text" class="form-control" id="zip "
                                                        name="zip">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="city" class="form-label">City</label>
                                                    <input type="text" class="form-control" id="city"
                                                        name="city">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="state" class="form-label">State</label>
                                                    <input type="text" class="form-control" id="state"
                                                        name="state">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="country" class="form-label">Country</label>
                                                    <input type="text" class="form-control" id="country"
                                                        name="country">
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="comment" class="form-label">Leave a comment</label>
                                                    <textarea class="form-control" id="comment" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="gift_allocation" class="form-label">Please indicate below
                                                        how your gift should be allocated.</label>
                                                    <textarea class="form-control" id="gift_allocation" rows="3"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <p>
                                                        Follow the SKI AND SNOWBOARD INDIA (SSI) Teams with weekly
                                                        (May-Oct.) news
                                                        and information for all ski and snowboard sport disciplines. In
                                                        addition, we provide the Daily Update (in-season), which offers a
                                                        quick recap of athlete and event results, upcoming events, TV and
                                                        streaming schedules.
                                                    </p>
                                                    <div class=" d-flex">
                                                        <div>
                                                            <input class="form-check-input" type="radio"
                                                                name="flexRadioDefault" id="flexRadioDefault1">
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="ms-5">
                                                            <input class="form-check-input" type="radio"
                                                                name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <p>
                                                        Yes, I want to receive text updates. By participating, you agree to
                                                        the terms & privacy policy (tandcs.us/sst) for recurring autodialed
                                                        donation messages from SKI AND SNOWBOARD INDIA (SSI) to the phone
                                                        number you provide. No consent required to buy. Msg&data rates may
                                                        apply.
                                                    </p>
                                                    <div class=" d-flex">
                                                        <div>
                                                            <input class="form-check-input" type="radio"
                                                                name="flexRadioDefault" id="flexRadioDefault1">
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="ms-5">
                                                            <input class="form-check-input" type="radio"
                                                                name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckChecked" checked>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        It's okay to contact me in the future.
                                                    </label>
                                                </div>

                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <button type="button" class="btn btn-primary bg-light">
                                                        <img src="{{ url('frontend/images/paypal.svg') }}" alt=""
                                                            title="product_01" />
                                                    </button>
                                                    <button type="button" class="btn btn-secondary text-light"
                                                        style="font-weight: 600"; color:"#fff !important">Credit
                                                        Card</button>
                                                </div>
                                            </div>

                                        </div>

                                    </form>
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
