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
                {{--   @include('frontend.commonComponants.three_org_details') --}}
                    <!-- Contact form -->

                    <!-- Promo -->
                    <div class="content_wrap">
                        <div class="sc_promo margin_top_large margin_bottom_large sc_promo_size_large">
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
                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                <form action="{{ Auth::user() ? route('addContactUsVerified') : route('addContactUs') }}" method="POST"
                                                    enctype="multipart/form-data" id="contactForm"
                                                    class="contactForm sc_input_hover_default">

                                                    {{ csrf_field()}}
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label for="name"
                                                                    class="form-label text-white">Name</label>
                                                                <input type="text" class="form-control" id="name"
                                                                    name="name">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label for="email" class="form-label text-white">Email
                                                                    Id</label>
                                                                <input type="email" class="form-control" id="email"
                                                                    name="email">
                                                            </div>

                                                        </div>

                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label for="mobile_no" class="form-label text-white">Mobile
                                                                    Number</label>
                                                                <input type="tel" class="form-control" id="mobile_no"
                                                                    name="mobile_no">
                                                            </div>

                                                        </div>

                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label for="message"
                                                                    class="form-label text-white">Message</label>
                                                                <textarea class="form-control" id="message" name="message" rows="4"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <button type="submit"
                                                                    class="sc_button sc_button_square sc_button_style_filled sc_button_size_small margin_top_small margin_bottom_null"
                                                                   >
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
