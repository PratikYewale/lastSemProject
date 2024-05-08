@extends('frontend.layouts.main')
@section('main-container')
    <!-- Top panel -->
    <section class="top_panel_image">
        <div class="top_panel_image_hover"></div>
        <div class="content_wrap">
            <div class="top_panel_image_header">
                <h1 class="top_panel_image_title">Registration</h1>
                <div class="breadcrumbs">
                    <a class="breadcrumbs_item home" href="{{ url('/') }}">Home</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current">Registration</span>
                </div>
            </div>
        </div>
    </section>
    <!-- /Top panel -->
    @include('frontend.commonComponants.registration.registrationButtonsDivider')
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
                                    parents, and volunteers while accomplishing the vision and mission to make the India the
                                    "Best in the World" in Olympic skiing and snowboarding. </p>
                            </div>
                        </div>
                        <a href="#"
                            class="sc_button sc_button_square sc_button_style_filled sc_button_size_small margin_top_small margin_bottom_null">Contact
                            Us</a>
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
                                            <div class="post_thumb" data-image="" data-title="Group Lessons for Beginners">
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
            <!-- Price Table -->
            <div class="content_wrap">
                <h2 class="sc_title sc_title_underline margin_bottom_medium margin_top_2_5em">Sponsorship Packages</h2>
                <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_3 margin_bottom_large row">
                    <!-- Price block -->
                    <div class="col-lg-4 sc_column_item sc_column_item_1 odd first">
                        <div class="sc_price_block sc_price_block_style_3">
                            <div class="sc_price_block_money">
                                <div class="sc_price">
                                    <span class="sc_price_currency">₹</span>
                                    <span class="sc_price_money">339</span>
                                </div>
                            </div>
                            <div class="sc_price_block_title"><span>Gold Package</span></div>
                            <div class="sc_price_block_line"></div>
                            <div class="sc_price_block_description">
                                <ul>
                                    <li>Includes prominent branding at our flagship events</li>
                                    <li>Exclusive access to athletes and VIP experiences</li>
                                    <li>Recognition as a major sponsor across all promotional materials</li>
                                </ul>
                            </div>
                            <div class="sc_price_block_link">
                                <a href="#"
                                    class="sc_button sc_button_square sc_button_style_filled sc_button_size_small">Book
                                    Now</a>
                            </div>
                        </div>
                    </div><!-- /Price block --><!-- Price block -->
                    <div class="col-lg-4 sc_column_item sc_column_item_2 even">
                        <div class="sc_price_block sc_price_block_style_3">
                            <div class="sc_price_block_money">
                                <div class="sc_price_block_icon none"></div>
                                <div class="sc_price">
                                    <span class="sc_price_currency">₹</span>
                                    <span class="sc_price_money">489</span>
                                </div>
                            </div>
                            <div class="sc_price_block_title">
                                <span>Silver Package</span>
                            </div>
                            <div class="sc_price_block_line"></div>
                            <div class="sc_price_block_description">
                                <ul>
                                    <li>Offers branding opportunities at select events</li>
                                    <li>Inclusion in marketing campaigns</li>
                                    <li>Exposure through digital and social media channels</li>
                                </ul>
                            </div>
                            <div class="sc_price_block_link">
                                <a href="#"
                                    class="sc_button sc_button_square sc_button_style_filled sc_button_size_small">Book
                                    Now</a>
                            </div>
                        </div>
                    </div><!-- /Price block --><!-- Price block -->
                    <div class="col-lg-4 sc_column_item sc_column_item_3 odd">
                        <div class="sc_price_block sc_price_block_style_3">
                            <div class="sc_price_block_money">
                                <div class="sc_price_block_icon none"></div>
                                <div class="sc_price">
                                    <span class="sc_price_currency">₹</span>
                                    <span class="sc_price_money">99</span>
                                </div>
                            </div>
                            <div class="sc_price_block_title">
                                <span>Bronze Package</span>
                            </div>
                            <div class="sc_price_block_line"></div>
                            <div class="sc_price_block_description">
                                <ul>
                                    <li>Provides sponsorship recognition at specific competitions or programs</li>
                                    <li>Along with branding visibility on event signage and promotional materials</li>

                                </ul>
                            </div>
                            <div class="sc_price_block_link">
                                <a href="#"
                                    class="sc_button sc_button_square sc_button_style_filled sc_button_size_small">Book
                                    Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Price Table -->
            <!-- Promo -->
            <div class="content_wrap">
                <div class="sc_promo margin_top_large sc_promo_size_large">
                    <div class="sc_promo_inner">
                        <div class="sc_promo_image promo_image_1 width_60_per pos_right_0"></div>
                        <div class="sc_promo_block sc_align_left width_40_per float_left">
                            <div class="sc_promo_block_inner">
                                <h6 class="sc_promo_subtitle sc_item_subtitle">Athletes</h6>
                                <h3 class="sc_promo_title sc_item_title sc_item_title_with_descr">Athletes</h3>
                                <div class="sc_promo_line"></div>
                                <div class="sc_promo_descr sc_item_descr">Dear Athletes,<br />We're excited to invite you
                                    to register with Ski and Snowboard India to access a range of exclusive initiatives,
                                    activities, and benefits tailored to support your journey in winter sports. By
                                    registering through the provided link below, you'll unlock numerous opportunities and
                                    become an integral part of our vibrant community.
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
                    <h3 class="sc_promo_title sc_item_title sc_item_title_with_descr">Benefits</h3>
                    <div class="columns_wrap sc_skills_columns row">
                        <div class="sc_skills_column col-lg-6">
                            <div class="sc_skills_item sc_skills_style_2 odd first">

                                <div class="sc_skills_count"></div>
                                <div class="sc_skills_info">
                                    <div class="sc_skills_label">Official Communications</div>
                                    <div class="sc_skills_addinfo">Registered athletes will receive official communications
                                        directly from Ski and Snowboard India, keeping you informed about the latest news,
                                        updates, and events within the federation.</div>
                                </div>
                            </div>
                        </div>
                        <div class="sc_skills_column col-lg-6">
                            <div class="sc_skills_item sc_skills_style_2 even">

                                <div class="sc_skills_count"></div>
                                <div class="sc_skills_info">
                                    <div class="sc_skills_label">Competitive Opportunities</div>
                                    <div class="sc_skills_addinfo">Gain eligibility to compete in prestigious national and
                                        international level events, subject to meeting the specified eligibility criteria.
                                        This opens doors to showcase your talent and represent India on the global stage.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Vision Mission -->
            <article class="post_item post_item_single_team post_featured_left team">
                <!-- Single team info -->
                <div class="content_wrap">
                    <section class="post_featured single_team_post_featured">
                        <div class="post_thumb" data-image="http://placehold.it/840x800" data-title="Shannon Lorenz">
                            <a class="hover_icon hover_icon_view" href="http://placehold.it/840x800"
                                title="Shannon Lorenz">
                                <img alt="Shannon Lorenz" src="http://placehold.it/570x542">
                            </a>
                        </div>
                    </section>
                    <section class="single_team_post_description">
                        <h2 class="team_title">Registration Requirements</h2>
                        {{-- <h6 class="team_position">Instructor</h6> --}}
                        <div class="team_meta"></div>
                        <div class="team_brief_info">
                            <div class="team_brief_info_text">
                                <p>To complete your registration, please ensure the following:<br />

                                    <b>Physical Fitness Certificate:</b> A valid physical fitness certificate from a
                                    qualified medical professional is required to confirm your readiness to participate in
                                    skiing and snowboarding activities.<br />
                                    <b>Declaration on Ethics and Antidoping:</b> As part of our commitment to fair play and
                                    integrity, athletes are required to declare their adherence to ethical principles and
                                    antidoping regulations.<br />
                                    <b>Annual Membership Fee:</b> Payment of the annual membership fee is necessary to
                                    activate your registration and access the full range of benefits offered by Ski and
                                    Snowboard India.<br /><br />
                                    For detailed instructions and to begin your registration process, please click on the
                                    link provided below. You'll find comprehensive information about the registration
                                    requirements and steps to follow.
                                </p>
                            </div>
                        </div>
                        <a href="#"
                            class="sc_button sc_button_square sc_button_style_filled sc_button_size_small margin_top_small margin_bottom_null">Registration
                            Link</a>
                    </section>
                </div>
                <!-- /Single team info -->

            </article>
            <!-- Snowboard Schools -->

        </div>
        <!-- /Content -->
    </div>
    <!-- /Page content wrap -->
 
@endsection
