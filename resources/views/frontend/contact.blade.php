@extends('frontend.layouts.main')
@section('main-container')
    <!-- Top panel -->
    <section class="top_panel_image">
        <div class="top_panel_image_hover"></div>
        <div class="content_wrap">
            <div class="top_panel_image_header">
                <h1 class="top_panel_image_title">Contact Us</h1>
                <div class="breadcrumbs">
                    <a class="breadcrumbs_item home" href="{{ url('/') }}">Home</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current">Contact Us</span>
                </div>
            </div>
        </div>
    </section>
    <!-- /Top panel -->
    <!-- Page content wrap -->
    <div class="page_content_wrap page_paddings_no">
        <!-- Content -->
        <div class="content">
            <article class="post_item post_item_single page">
                <section class="post_content">
                    <!-- Services-->
                    <div class="content_wrap">
                        <div class="sc_services_wrap">
                            <div
                                class="sc_services sc_services_style_services-1 sc_services_type_icons margin_top_medium margin_bottom_medium width_100_per">
                                <div class="sc_columns columns_wrap row">
                                    <div class="col-lg-4 column_padding_bottom">
                                        <div class="sc_services_item sc_services_item_1 odd first">
                                            <span class="sc_icon icon-mobile-1"></span>
                                            <div class="sc_services_item_content">
                                                <h4 class="sc_services_item_title">How to Call?</h4>
                                                <div class="sc_services_item_description">
                                                    <p>1 800 215 16 35</p>
                                                    <p> We'll Call You Back</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 column_padding_bottom">
                                        <div class="sc_services_item sc_services_item_2 even">
                                            <span class="sc_icon icon-location-1"></span>
                                            <div class="sc_services_item_content">
                                                <h4 class="sc_services_item_title">Where We Are?</h4>
                                                <div class="sc_services_item_description">
                                                    <p>2 Chemin de Bordeneuve,</p>
                                                    <p> 31490 Brax, France</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 column_padding_bottom">
                                        <div class="sc_services_item sc_services_item_3 odd">
                                            <span class="sc_icon icon-clock-1"></span>
                                            <div class="sc_services_item_content">
                                                <h4 class="sc_services_item_title">When We Work?</h4>
                                                <div class="sc_services_item_description">
                                                    <p>8.00 am &#8211; 10.00 pm</p>
                                                    <p> Monday &#8211; Sunday</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Services-->
                    <!-- Contact form -->
                
                       <!-- Promo -->
                       <div class="content_wrap">
                        <div class="sc_promo margin_top_large sc_promo_size_large">
                            <div class="sc_promo_inner">
                                <div class="sc_promo_image promo_image_1 width_60_per pos_right_0"></div>
                                <div class="sc_promo_block sc_align_left width_40_per float_left">
                                    <div class="sc_promo_block_inner">
                                        <h6 class="sc_promo_subtitle sc_item_subtitle">Fill below Form To</h6>
                                        <h3 class="sc_promo_title sc_item_title sc_item_title_with_descr">Reach Us</h3>
                                        <div class="sc_promo_line"></div>
                                        <div id="sc_form_2_wrap" class="sc_form_wrap">
                                            <div id="sc_form_2"
                                                class="sc_form sc_form_style_form_1 margin_top_small margin_bottom_large">
                                                <form action="#" method="post" id="donationForm"
                                                    class="donationForm sc_input_hover_default">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label text-white">Name</label>
                                                                <input type="text" class="form-control" id="name"
                                                                    name="name">
                                                            </div>
                                                        </div>
                                                     
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label for="email" class="form-label text-white">Email Id</label>
                                                                <input type="email" class="form-control" id="email"
                                                                    name="email">
                                                            </div>
        
                                                        </div>
        
                                                        {{-- <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="mobile_no" class="form-label">Mobile Number</label>
                                                                <input type="tel" class="form-control" id="mobile_no"
                                                                    name="email">
                                                            </div>
        
                                                        </div> --}}
        
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label for="comment" class="form-label text-white">Message</label>
                                                                <textarea class="form-control" id="comment" rows="4"></textarea>
                                                            </div>
                                                        </div>
        
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <button type="button"
                                                                    class="sc_button sc_button_square sc_button_style_filled sc_button_size_small margin_top_small margin_bottom_null">
                                                                    Send Message
                                                                </button>
        
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
                    <!-- /Promo -->
                    <!-- /Contact form -->
         
                </section>
            </article>
        </div>
        <!-- /Content -->
    </div>
    <!-- /Page content wrap -->
@endsection
