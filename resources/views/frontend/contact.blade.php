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
                                <div class="sc_services sc_services_style_services-1 sc_services_type_icons margin_top_medium margin_bottom_medium width_100_per">
                                    <div class="sc_columns columns_wrap">
                                        <div class="column-1_3 column_padding_bottom">
                                            <div class="sc_services_item sc_services_item_1 odd first">
                                                <span class="sc_icon icon-mobile-1"></span>
                                                <div class="sc_services_item_content">
                                                    <h4 class="sc_services_item_title">How to Call?</h4>
                                                    <div class="sc_services_item_description">
                                                        <p>1 800 215 16 35</p>
                                                        <p> We’ll Call You Back</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><div class="column-1_3 column_padding_bottom">
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
                                    </div><div class="column-1_3 column_padding_bottom">
                                        <div class="sc_services_item sc_services_item_3 odd">
                                            <span class="sc_icon icon-clock-1"></span>
                                            <div class="sc_services_item_content">
                                                <h4 class="sc_services_item_title">When We Work?</h4>
                                                <div class="sc_services_item_description">
                                                    <p>8.00 am – 10.00 pm</p>
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
                        <div class="content_wrap">
                            <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_6">
                                <div class="column-1_6 sc_column_item sc_column_item_1 odd first"></div>
                                <div class="column-4_6 sc_column_item sc_column_item_2 even span_4">
                                    <div id="sc_form_2_wrap" class="sc_form_wrap">
                                        <div id="sc_form_2" class="sc_form sc_form_style_form_1 margin_top_small margin_bottom_large">
                                            <form id="sc_form_2_form" class="sc_input_hover_default" data-formtype="form_1" method="post" action="include/sendmail.php">
                                               <div class="sc_form_info">
                                                    <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2">
                                                        <div class="sc_form_item sc_form_field label_over column-1_2">
                                                            <input id="sc_form_username" type="text" name="username" placeholder="YOUR NAME" aria-required="true">
                                                        </div><div class="sc_form_item sc_form_field label_over column-1_2">
                                                            <input id="sc_form_email" type="text" name="email" placeholder="YOUR EMAIL" aria-required="true">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sc_form_item sc_form_message">
                                                    <textarea id="sc_form_message" name="message" placeholder="YOUR MESSAGE" aria-required="true"></textarea>
                                                </div>
                                                <div class="sc_form_item sc_form_button">
                                                    <button class="sc_button sc_button_square sc_button_style_filled sc_button_size_medium sc_button_iconed icon-right-small">SUBMIT</button>
                                                </div>
                                                <div class="result sc_infobox"></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Contact form -->
                        <!-- Google Map -->
                        <div id="sc_googlemap_196270504" class="sc_googlemap width_100_per height_500" data-zoom="14" data-style="dark">
                            <div id="sc_googlemap_196270504_1" class="sc_googlemap_marker" data-title="" data-description="6486 Sycamore Lane Fort Lee" data-address="6486 Sycamore Lane Fort Lee" data-latlng="" data-point="images/map-marker.png"></div>
                        </div>
                        <!-- /Google Map -->
                    </section>
                </article>
            </div>
            <!-- /Content -->
        </div>
        <!-- /Page content wrap -->

  





@endsection