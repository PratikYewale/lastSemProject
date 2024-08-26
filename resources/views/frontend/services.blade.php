@extends('frontend.layouts.main')
@section('main-container')
    <!-- Top panel -->
    <section class="top_panel_image">
        <div class="top_panel_image_hover"></div>
        <div class="content_wrap">
            <div class="top_panel_image_header">
                <h1 class="top_panel_image_title">Programs</h1>
                <div class="breadcrumbs">
                    <a class="breadcrumbs_item home" href="index.html">Home</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current">Programs</span>
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
                    <!-- Greeting -->
                    <div class="content_wrap">
                        <div
                            class="columns_wrap sc_columns columns_nofluid sc_columns_count_2 columns_1_2_xs margin_top_large margin_bottom_large row">
                            <div class="col-lg-6 sc_column_item sc_column_item_1 odd first">
                                <figure class="sc_image sc_image_shape_square">
                                    <img src="{{ url('frontend/images/services.jpg') }}" alt="" />
                                </figure>
                            </div>
                            <div class="col-lg-6 sc_column_item sc_column_item_2 even">
                                <div class="sc_section">
                                    <div class="sc_section_inner">
                                        <div class="sc_section_content_wrap">
                                            <h5 class="sc_title sc_title_regular margin_top_null margin_bottom_tiny">Ski and
                                                Snowboard India (SSI)</h5>
                                            <h2 class="sc_title sc_title_underline margin_top_null margin_bottom_null pb-auto">
                                                Programs
                                            </h2>
                                            <p class="margin_top_1_5em margin_bottom_tiny">Ski and Snowboard India (SSI) is
                                                the National Sports Association governing sport disciplines under the
                                                International Ski Federation (FIS) in the territory of India. SSI is also a
                                                recognised member of the Indian Olympic Association <br>

                                            </p>
                                            <a href="{{ url('/contact') }}"
                                                class="sc_button sc_button_square sc_button_style_filled sc_button_size_small margin_top_small margin_bottom_null">Contact
                                                Us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Greeting -->
                    <!-- Sports -->
                    @include('frontend.commonComponants.services')
                    <!-- /Sports -->


                    {{--   @include('frontend.commonComponants.athletesHistory') --}}
                    <!-- E-mailer -->
                    {{-- <div class="emailer_section">
                        <div class="content_wrap">
                            <div class="sc_section">
                                <div class="sc_section_inner">
                                    <div class="sc_section_content_wrap">
                                        <div class="columns_wrap sc_columns columns_nofluid no_margins sc_columns_count_2">
                                            <div class="column-1_2 sc_column_item sc_column_item_1 odd first">
                                                <h4 class="sc_title sc_title_regular margin_top_null margin_bottom_null">
                                                    SIGN UP FOR A</h4>
                                                <h1 class="sc_title sc_title_regular margin_top_null margin_bottom_null">
                                                    FREE INTRO CLASS</h1>
                                            </div>
                                            <div class="column-1_2 sc_column_item sc_column_item_2 even">
                                                <div class="sc_section sc_section_block">
                                                    <div class="sc_section_inner">
                                                        <div class="sc_section_content_wrap">
                                                            <form id="mc4wp-form-1" class="mc4wp-form" method="post">
                                                                <div class="mc4wp-form-fields">
                                                                    <div>
                                                                        <input type="email" name="EMAIL"
                                                                            placeholder="YOUR EMAIL" required />
                                                                    </div>
                                                                    <div>
                                                                        <input type="submit" value="SIGN UP NOW" />
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
                        </div>
                    </div> --}}
                    <!-- /E-mailer -->
                </section>
            </article>
        </div>
        <!-- /Content -->
    </div>
    <!-- /Page content wrap -->
@endsection
