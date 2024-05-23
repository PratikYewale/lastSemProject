@extends('frontend.layouts.main')
<link rel="stylesheet" href="js/vendor/swiper/swiper.min.css" type="text/css" media="all" />
@section('main-container')
    <div class="page_content_wrap page_paddings_no">
        <!-- Content -->
        <div class="content">
            <article class="post_item post_item_single page">
                <section class="post_content">

                    <!-- Promo -->
                    <div class="content_wrap mb-5">
                        <div class="sc_promo margin_top_large sc_promo_size_large">
                            <div class="sc_promo_inner">
                                <div class="sc_promo_image promo_image_1 width_60_per pos_right_0"></div>
                                <div class="sc_promo_block sc_align_left width_40_per float_left">
                                    <div class="sc_promo_block_inner">
                                        <h6 class="sc_promo_subtitle sc_item_subtitle">Ski and Snowboard
                                            India (SSI)</h6>
                                        <h3 class="sc_promo_title sc_item_title sc_item_title_with_descr">Login</h3>
                                        <div class="sc_promo_line mt-3"></div>
                                        <div class="sc_promo_descr sc_item_descr">
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
                                                    <form id="loginForm" action="{{ route('loginMember') }}" method="POST"
                                                        enctype="multipart/form-data"
                                                        class="loginForm sc_input_hover_default">
                                                        @csrf <!-- CSRF token -->
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    <label for="email" class="form-label">Username /
                                                                        Email</label>
                                                                    <input type="email" class="form-control"
                                                                        id="email" name="email">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    <label for="password"
                                                                        class="form-label">Password</label>
                                                                    <input type="password" placeholder="password"
                                                                        class="form-control" id="password"
                                                                        name="password">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12">
                                                                <div class="mb-3">

                                                                    <button type="submit" id="loginButton"
                                                                        class="sc_button sc_button_square sc_button_style_filled sc_button_size_small  sc_button_hover_fade">Submit</button>
                                                                </div>



                                                            </div>
                                                    


                                                        </div>

                                                    </form>

                                                    <div class="col-lg-12">

                                                        <div class="mb-3 d-flex justify-content-between">
                                                            <div>
                                                                Don't have an account? Sign Up as
                                                                <a href="#" class="">Athlete</a> or
                                                                <a href="#" class="">Association</a>
                                                            </div>
                                                            {{-- <div>
                                                                <a href="#" class="">Forgot
                                                                    Password
                                                                </a>
                                                            </div> --}}


                                                        </div>



                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Promo -->



                </section>

            </article>
        </div>
        <!-- /Content -->
    </div>
@endsection
