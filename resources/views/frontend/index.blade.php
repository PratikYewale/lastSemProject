<!DOCTYPE html>
<html lang="en-US" class="scheme_original">

<head>
    <title>Ski Snowboard India</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">

    <link rel="stylesheet" href="{{ url('frontend/js/vendor/essential-grid/css/settings.css') }}" type="text/css"
        media="all" />
    <link rel="stylesheet" href="{{ url('frontend/css/tpl-essential-grids.css') }}" type="text/css" media="all" />

    <link rel="stylesheet" href="{{ url('frontend/js/vendor/revslider/css/settings.css') }}" type="text/css"
        media="all" />

    <link rel="stylesheet" href="{{ url('frontend/js/vendor/woocommerce/css/woocommerce-layout.css') }}" type="text/css"
        media="all" />
    <link rel="stylesheet" href="{{ url('frontend/js/vendor/woocommerce/css/woocommerce-smallscreen.css') }}"
        type="text/css" media="only screen and (max-width: 768px)" />
    <link rel="stylesheet" href="{{ url('frontend/js/vendor/woocommerce/css/woocommerce.css') }}" type="text/css"
        media="all" />
    <link rel="stylesheet" href="{{ url('frontend/js/vendor/wp-cloudy/css/wpcloudy.min.css') }}" type="text/css"
        media="all" />
    <link rel="stylesheet" href="{{ url('frontend/js/vendor/wp-cloudy/css/wpcloudy-anim.min.css') }}" type="text/css"
        media="all" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,300i,400,400i,500,600,700,700i">
    <link rel="stylesheet" href="{{ url('frontend/css/fontello/css/fontello.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ url('frontend/css/style.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ url('frontend/css/core.animation.min.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ url('frontend/css/shortcodes.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ url('frontend/css/skin.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ url('frontend/css/plugin.woocommerce.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ url('frontend/css/responsive.css') }}" type="text/css" media="all" />

    <link rel="stylesheet" href="{{ url('frontend/js/vendor/magnific/magnific-popup.min.css') }}" type="text/css"
        media="all" />
    <link rel="stylesheet" href="{{ url('frontend/js/core.messages/core.messages.min.css') }}" type="text/css"
        media="all" />

    <link rel="icon" href="http://placehold.it/32x32" sizes="32x32" />
    <link rel="icon" href="http://placehold.it/32x32" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="http://placehold.it/32x32" />
</head>

<body class="home page body_filled article_style_stretch scheme_original top_panel_show top_panel_over sidebar_hide">
    <!-- Body wrap -->
    <div class="body_wrap">
        <!-- Page wrap -->
        <div class="page_wrap">
            <div class="top_panel_fixed_wrap"></div>
            <!-- Header -->
            <header class="top_panel_wrap top_panel_style_7 top_panel_position_over">
                <div class="top_panel_wrap_inner top_panel_inner_style_6 top_panel_position_over">
                    <div class="top_panel_middle">
                        <div class="content_wrap">
                            <!-- Contact logo -->
                            <div class="column-1_4 contact_logo">
                                <div class="logo">
                                    <a href="{{ url('/') }}">
                                        <img src="{{ url('frontend/images/logo.png') }}" class="logo_main"
                                            alt="">
                                        <img src="{{ url('frontend/images/logo.png') }}" class="logo_fixed"
                                            alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- /Contact logo -->
                            <!-- Main menu -->
                            <div class="column-2_1 menu_main_wrap">
                                <nav class="menu_main_nav_area menu_hover_slide_line">
                                    <ul id="menu_main" class="menu_main_nav">
                                        <!-- Menu: Home -->
                                        <li class="menu-item current-menu-ancestor ">
                                            <a href="{{ url('/') }}"><span>Home</span></a>

                                        </li>
                                        <!-- /Menu: Home -->
                                        <!-- Menu: Features -->
                                        <li class="menu-item ">
                                            <a href="{{ url('/donate') }}"><span>Donate</span></a>

                                        </li>
                                        <!-- /Menu: Features -->
                                        <!-- Menu: Classes -->
                                        <li class="menu-item">
                                            <a href="{{ url('/about') }}"><span>About</span></a>
                                        </li>
                                        <!-- /Menu: Classes -->
                                        <!-- Menu: Rent -->
                                        <li class="menu-item">
                                            <a href="{{ url('/teams') }}"><span>Teams</span></a>
                                        </li>
                                        <!-- /Menu: Rent -->
                                        <!-- Menu: Store -->
                                        <li class="menu-item">
                                            <a href="{{ url('/programs') }}"><span>Programs</span></a>
                                        </li>
                                        <!-- /Menu: Store -->
                                        <!-- Menu: News -->
                                        <li class="menu-item ">
                                            <a href="{{ url('/competition') }}"><span>Competition</span></a>

                                        </li>
                                        <!-- /Menu: News -->
                                        <!-- Menu: Contact Us -->
                                        <li class="menu-item">
                                            <a href="{{ url('/membership') }}"><span>Membership</span></a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{ url('/contact') }}"><span>Contact Us</span></a>
                                        </li>
                                        <!-- /Menu: Contact Us -->
                                    </ul>
                                </nav>
                                <!-- Cart -->
                                <div class="menu_main_cart top_panel_icon">
                                    <a href="#" class="top_panel_cart_button" data-items="2"
                                        data-summa="&#036;538.00">
                                        <span class="contact_icon icon-basket"></span>
                                        <span class="cart_summa">&#36;538.00</span>
                                        <span class="contact_label contact_cart_label">Your cart:</span>
                                    </a>
                                    <ul class="widget_area sidebar_cart sidebar">
                                        <li>
                                            <div class="widget woocommerce widget_shopping_cart">
                                                <div class="hide_cart_widget_if_empty">
                                                    <div class="widget_shopping_cart_content">
                                                        <ul class="cart_list product_list_widget ">
                                                            <!-- Cart item -->
                                                            <li class="mini_cart_item">
                                                                <a class="remove" href="#"
                                                                    title="Remove this item">×</a>
                                                                <a href="shop-product.html">
                                                                    <img src="{{ url('frontend/images/product_02-180x180.jpg') }}"
                                                                        alt="">
                                                                    Bogner Phoenix Mirror Goggles
                                                                </a>
                                                                <span class="quantity">
                                                                    1 ×
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span
                                                                            class="woocommerce-Price-currencySymbol">$</span>
                                                                        339.00
                                                                    </span>
                                                                </span>
                                                            </li>
                                                            <!-- /Cart item -->
                                                            <!-- Cart item -->
                                                            <li class="mini_cart_item">
                                                                <a class="remove" href="#"
                                                                    title="Remove this item">×</a>
                                                                <a href="shop-product.html">
                                                                    <img src="{{ url('frontend/images/product_06-180x180.jpg') }}"
                                                                        alt="">
                                                                    Rome Heist Snowboard
                                                                </a>
                                                                <span class="quantity">
                                                                    1 ×
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span
                                                                            class="woocommerce-Price-currencySymbol">$</span>
                                                                        199.00
                                                                    </span>
                                                                </span>
                                                            </li>
                                                            <!-- /Cart item -->
                                                        </ul>
                                                        <p class="total">
                                                            <strong>Subtotal:</strong>
                                                            <span class="woocommerce-Price-amount amount">
                                                                <span class="woocommerce-Price-currencySymbol">$</span>
                                                                538.00
                                                            </span>
                                                        </p>
                                                        <p class="buttons">
                                                            <a class="button wc-forward sc_button_hover_fade"
                                                                href="cart.html">View Cart</a>
                                                            <a class="button checkout wc-forward sc_button_hover_fade"
                                                                href="checkout.html">Checkout</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /Cart -->
                                <!-- Booking button block -->
                                <div class="menu_main_additional_button top_panel_icon">
                                    <div class="menu_main_additional_button_container">
                                        <a href="booking-page.html">
                                            <img src="{{ url('frontend/images/booking_heared_img.png') }}"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <!-- /Booking button block -->
                            </div>
                            <!-- /Main menu -->
                        </div>
                    </div>
                </div>
            </header>
            <!-- /Header -->
            <!-- Header mobile -->
            <div class="header_mobile">
                <div class="content_wrap">
                    <div class="menu_button icon-menu"></div>
                    <!-- Logo -->
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ url('frontend/images/logo.png') }}" class="logo_main" alt="">
                        </a>
                    </div>
                    <!-- /Logo -->
                    <!-- Booking button block -->
                    <div class="menu_main_additional_button top_panel_icon">
                        <div class="menu_main_additional_button_container">
                            <a href="booking-page.html">
                                <img src="{{ url('frontend/images/booking_heared_img.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- Cart -->
                    <div class="menu_main_cart top_panel_icon">
                        <a href="#" class="top_panel_cart_button" data-items="2" data-summa="&#036;538.00">
                            <span class="contact_icon icon-basket"></span>
                            <span class="cart_summa">&#36;538.00</span>
                            <span class="contact_label contact_cart_label">Your cart:</span>
                        </a>
                        <ul class="widget_area sidebar_cart sidebar">
                            <li>
                                <div class="widget woocommerce widget_shopping_cart">
                                    <div class="hide_cart_widget_if_empty">
                                        <div class="widget_shopping_cart_content">
                                            <ul class="cart_list product_list_widget ">
                                                <!-- Cart Item -->
                                                <li class="mini_cart_item">
                                                    <a class="remove" href="#" title="Remove this item">×</a>
                                                    <a href="shop-product.html">
                                                        <img src="http://placehold.it/180x180" alt="">
                                                        Bogner Phoenix Mirror Goggles
                                                    </a>
                                                    <span class="quantity">
                                                        1 ×
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span class="woocommerce-Price-currencySymbol">$</span>
                                                            339.00
                                                        </span>
                                                    </span>
                                                </li>
                                                <!-- /Cart Item -->
                                                <!-- Cart Item -->
                                                <li class="mini_cart_item">
                                                    <a class="remove" href="#" title="Remove this item">×</a>
                                                    <a href="shop-product.html">
                                                        <img src="http://placehold.it/180x180" alt="">
                                                        Rome Heist Snowboard
                                                    </a>
                                                    <span class="quantity">
                                                        1 ×
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span class="woocommerce-Price-currencySymbol">$</span>
                                                            199.00
                                                        </span>
                                                    </span>
                                                </li>
                                                <!-- /Cart Item -->
                                            </ul>
                                            <p class="total">
                                                <strong>Subtotal:</strong>
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">$</span>
                                                    538.00
                                                </span>
                                            </p>
                                            <p class="buttons">
                                                <a class="button wc-forward sc_button_hover_fade"
                                                    href="cart.html">View Cart</a>
                                                <a class="button checkout wc-forward sc_button_hover_fade"
                                                    href="checkout.html">Checkout</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- /Cart -->
                </div>
                <div class="side_wrap">
                    <div class="close">Close</div>
                    <div class="panel_top">
                        <nav class="menu_main_nav_area">
                            <!-- Mobile Menu -->
                            <ul id="menu_mobile" class="menu_main_nav">
                                <!-- Menu: Home -->
                                <li class="menu-item ">
                                    <a href="{{ url('/') }}"><span>Home</span></a>

                                </li>
                                <!-- /Menu: Home -->
                                <!-- Menu: Features -->
                                <li class="menu-item ">
                                    <a href="{{ url('/donate') }}"><span>Donate</span></a>

                                </li>
                                <!-- /Menu: Features -->
                                <!-- Menu: Classes -->
                                <li class="menu-item">
                                    <a href="{{ url('/about') }}"><span>About</span></a>
                                </li>
                                <!-- /Menu: Classes -->
                                <!-- Menu: Rent -->
                                <li class="menu-item">
                                    <a href="{{ url('/teams') }}"><span>Teams</span></a>
                                </li>
                                <!-- /Menu: Rent -->
                                <!-- Menu: Shop -->
                                <li class="menu-item">
                                    <a href="shop-page.html"><span>Store</span></a>
                                </li>
                                <!-- /Menu: Shop -->
                                <!-- Menu: News -->
                                <li class="menu-item ">
                                    <a href="{{ url('/programs') }}"><span>Programs</span></a>

                                </li>
                                <li class="menu-item ">
                                    <a href="{{ url('/competition') }}"><span>Competition</span></a>

                                </li>
                                <li class="menu-item ">
                                    <a href="{{ url('/membership') }}"><span>Membership</span></a>

                                </li>
                                <li class="menu-item current-menu-item">
                                    <a href="{{ url('/contact') }}"><span>Contact Us</span></a>
                                </li>
                            </ul>
                            <!-- /Mobile Menu -->
                        </nav>
                    </div>
                    <div class="panel_bottom"></div>
                </div>
                <div class="mask"></div>
            </div>
            <!-- /Header mobile -->
            <!-- Page content wrap -->

            <div class="page_content_wrap page_paddings_no">
                <!-- Content -->
                <div class="content">
                    <article class="post_item post_item_single page">
                        <section class="post_content">
                            <div id="rev_slider_3_1_wrapper" class="rev_slider_wrapper fullscreen-container"
                                data-source="gallery" style="">
                                <!-- START REVOLUTION SLIDER 5.3.1.5 fullscreen mode -->
                                <div id="rev_slider_3_1" class="rev_slider fullscreenbanner" data-version="5.3.1.5">
                                    <ul>
                                        <!-- SLIDE  -->
                                        <li data-index="rs-9" data-transition="fade" data-slotamount="default"
                                            data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default"
                                            data-easeout="default" data-masterspeed="300" data-rotate="0"
                                            data-saveperformance="off" data-title="Slide" data-param1=""
                                            data-param2="" data-param3="" data-param4="" data-param5=""
                                            data-param6="" data-param7="" data-param8="" data-param9=""
                                            data-param10="" data-description="">
                                            <!-- MAIN IMAGE -->
                                            <img src="{{ url('frontend/images/slider_3_slide_1.jpg') }}"
                                                alt="" title="slider_3_slide_1" width="1920"
                                                height="980" data-bgposition="center center" data-bgfit="cover"
                                                data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg"
                                                data-no-retina>
                                            <!-- LAYERS -->
                                            <!-- LAYER NR. 1 -->
                                            <div class="tp-caption tp-resizeme" id="slide-9-layer-3" data-x="right"
                                                data-hoffset="-9" data-y="28"
                                                data-width="['none','none','none','none']"
                                                data-height="['none','none','none','none']" data-type="image"
                                                data-responsive_offset="on"
                                                data-frames='[{"delay":400,"speed":300,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                                data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">
                                                <img src="{{ url('frontend/images/slider_3_slide_1_boarder.png') }}"
                                                    alt="" data-ww="934px" data-hh="837px" width="934"
                                                    height="837" data-no-retina>
                                            </div>
                                            <!-- LAYER NR. 2 -->
                                            <div class="tp-caption tp-resizeme" id="slide-9-layer-6" data-x="right"
                                                data-hoffset="875" data-y="179"
                                                data-width="['none','none','none','none']"
                                                data-height="['none','none','none','none']" data-type="image"
                                                data-responsive_offset="on"
                                                data-frames='[{"delay":650,"speed":300,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                                data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">
                                                <img src="{{ url('frontend/images/slider_3_slide_1_2.png') }}"
                                                    alt="" data-ww="915px" data-hh="805px" width="915"
                                                    height="805" data-no-retina>
                                            </div>
                                            <!-- LAYER NR. 3 -->
                                            <div class="tp-caption tp-resizeme" id="slide-9-layer-7" data-x="right"
                                                data-hoffset="700" data-y="324"
                                                data-width="['none','none','none','none']"
                                                data-height="['none','none','none','none']" data-type="image"
                                                data-responsive_offset="on"
                                                data-frames='[{"delay":830,"speed":300,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                                data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">
                                                <img src="{{ url('frontend/images/slider_3_slide_1_3.png') }}"
                                                    alt="" data-ww="1178px" data-hh="858px" width="1178"
                                                    height="858" data-no-retina>
                                            </div>
                                            <!-- LAYER NR. 4 -->
                                            <div class="tp-caption slider_3_text_80 tp-resizeme rs-parallaxlevel-1"
                                                id="slide-9-layer-8" data-x="center" data-hoffset="-182"
                                                data-y="398" data-width="['auto']" data-height="['auto']"
                                                data-type="text" data-responsive_offset="on"
                                                data-frames='[{"delay":1000,"speed":300,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"y:-50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                                data-textAlign="['left','left','left','left']"
                                                data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">You’re
                                                here </div>
                                            <!-- LAYER NR. 5 -->
                                            <div class="tp-caption slider_3_slide_text_100 tp-resizeme rs-parallaxlevel-1"
                                                id="slide-9-layer-9" data-x="center" data-hoffset="-292"
                                                data-y="485" data-width="['auto']" data-height="['auto']"
                                                data-type="text" data-responsive_offset="on"
                                                data-frames='[{"delay":1160,"speed":300,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:-50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                                data-textAlign="['left','left','left','left']"
                                                data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">for the
                                                point, </div>
                                            <!-- LAYER NR. 6 -->
                                            <div class="tp-caption slider_3_text_70 tp-resizeme rs-parallaxlevel-1"
                                                id="slide-9-layer-10" data-x="center" data-hoffset="-302"
                                                data-y="602" data-width="['auto']" data-height="['auto']"
                                                data-type="text" data-responsive_offset="on"
                                                data-frames='[{"delay":1370,"speed":300,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"y:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                                data-textAlign="['left','left','left','left']"
                                                data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">not the
                                                points... </div>
                                            <!-- LAYER NR. 7 -->
                                            <div class="tp-caption tp-resizeme" id="slide-9-layer-5" data-x="right"
                                                data-hoffset="23" data-y="220"
                                                data-width="['none','none','none','none']"
                                                data-height="['none','none','none','none']" data-type="image"
                                                data-responsive_offset="on"
                                                data-frames='[{"delay":500,"speed":300,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                                data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">
                                                <img src="{{ url('frontend/images/slider_3_slide_1_1.png') }}"
                                                    alt="" data-ww="1892px" data-hh="841px" width="1892"
                                                    height="841" data-no-retina>
                                            </div>
                                        </li>
                                        <!-- SLIDE  -->
                                        <li data-index="rs-10" data-transition="fade" data-slotamount="default"
                                            data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default"
                                            data-easeout="default" data-masterspeed="300" data-rotate="0"
                                            data-saveperformance="off" data-title="Slide" data-param1=""
                                            data-param2="" data-param3="" data-param4="" data-param5=""
                                            data-param6="" data-param7="" data-param8="" data-param9=""
                                            data-param10="" data-description="">
                                            <!-- MAIN IMAGE -->
                                            <img src="{{ url('frontend/images/slider_3_slide_2.jpg') }}"
                                                alt="" title="slider_3_slide_2" width="1920"
                                                height="1080" data-bgposition="center center" data-bgfit="cover"
                                                data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg"
                                                data-no-retina>
                                            <!-- LAYERS -->
                                            <!-- LAYER NR. 8 -->
                                            <div class="tp-caption tp-resizeme" id="slide-10-layer-1" data-x="right"
                                                data-hoffset="" data-y="66"
                                                data-width="['none','none','none','none']"
                                                data-height="['none','none','none','none']" data-type="image"
                                                data-responsive_offset="on"
                                                data-frames='[{"delay":90,"speed":300,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                                data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">
                                                <img src="{{ url('frontend/images/slider_3_slide_2_boarder.png') }}"
                                                    alt="" data-ww="1847px" data-hh="951px" width="1847"
                                                    height="951" data-no-retina>
                                            </div>
                                            <!-- LAYER NR. 9 -->
                                            <div class="tp-caption tp-resizeme" id="slide-10-layer-7" data-x="right"
                                                data-hoffset="944" data-y="109"
                                                data-width="['none','none','none','none']"
                                                data-height="['none','none','none','none']" data-type="image"
                                                data-responsive_offset="on"
                                                data-frames='[{"delay":300,"speed":300,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                                data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">
                                                <img src="{{ url('frontend/images/slider_3_slide_2_2.png') }}"
                                                    alt="" data-ww="915px" data-hh="805px" width="915"
                                                    height="805" data-no-retina>
                                            </div>
                                            <!-- LAYER NR. 10 -->
                                            <div class="tp-caption tp-resizeme" id="slide-10-layer-8" data-x="right"
                                                data-hoffset="750" data-y="258"
                                                data-width="['none','none','none','none']"
                                                data-height="['none','none','none','none']" data-type="image"
                                                data-responsive_offset="on"
                                                data-frames='[{"delay":400,"speed":300,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                                data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">
                                                <img src="{{ url('frontend/images/slider_3_slide_2_3.png') }}"
                                                    alt="" data-ww="1178px" data-hh="858px" width="1178"
                                                    height="858" data-no-retina>
                                            </div>
                                            <!-- LAYER NR. 11 -->
                                            <div class="tp-caption slider_3_text_80 tp-resizeme rs-parallaxlevel-1"
                                                id="slide-10-layer-2" data-x="center" data-hoffset="-355"
                                                data-y="350" data-width="['auto']" data-height="['auto']"
                                                data-type="text" data-responsive_offset="on"
                                                data-frames='[{"delay":550,"speed":300,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"y:-50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                                data-textAlign="['left','left','left','left']"
                                                data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">I've
                                                reached </div>
                                            <!-- LAYER NR. 12 -->
                                            <div class="tp-caption slider_3_slide_text_100 tp-resizeme rs-parallaxlevel-1"
                                                id="slide-10-layer-3" data-x="center" data-hoffset="-341"
                                                data-y="439" data-width="['auto']" data-height="['auto']"
                                                data-type="text" data-responsive_offset="on"
                                                data-frames='[{"delay":690,"speed":300,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:-50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                                data-textAlign="['left','left','left','left']"
                                                data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">my goal
                                            </div>
                                            <!-- LAYER NR. 13 -->
                                            <div class="tp-caption slider_3_text_70 tp-resizeme rs-parallaxlevel-1"
                                                id="slide-10-layer-4" data-x="center" data-hoffset="-338"
                                                data-y="570" data-width="['auto']" data-height="['auto']"
                                                data-type="text" data-responsive_offset="on"
                                                data-frames='[{"delay":810,"speed":300,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"y:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                                data-textAlign="['left','left','left','left']"
                                                data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">with
                                                snowboarding </div>
                                            <!-- LAYER NR. 14 -->
                                            <div class="tp-caption   tp-resizeme" id="slide-10-layer-6"
                                                data-x="right" data-hoffset="33" data-y="177"
                                                data-width="['none','none','none','none']"
                                                data-height="['none','none','none','none']" data-type="image"
                                                data-responsive_offset="on"
                                                data-frames='[{"delay":200,"speed":300,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                                data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">
                                                <img src="{{ url('frontend/images/slider_3_slide_2_1.png') }}"
                                                    alt="" data-ww="1891px" data-hh="803px" width="1891"
                                                    height="803" data-no-retina>
                                            </div>
                                        </li>
                                        <!-- SLIDE  -->
                                        <li data-index="rs-8" data-transition="fade" data-slotamount="default"
                                            data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default"
                                            data-easeout="default" data-masterspeed="300" data-rotate="0"
                                            data-saveperformance="off" data-title="Slide" data-param1=""
                                            data-param2="" data-param3="" data-param4="" data-param5=""
                                            data-param6="" data-param7="" data-param8="" data-param9=""
                                            data-param10="" data-description="">
                                            <!-- MAIN IMAGE -->
                                            <img src="{{ url('frontend/images/slider_3_slide_3.jpg') }}"
                                                alt="" title="slider_3_slide_3" width="1920"
                                                height="980" data-bgposition="center center" data-bgfit="cover"
                                                data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg"
                                                data-no-retina>
                                            <!-- LAYERS -->
                                            <!-- LAYER NR. 15 -->
                                            <div class="tp-caption tp-resizeme" id="slide-8-layer-1" data-x="right"
                                                data-hoffset="3" data-y="162"
                                                data-width="['none','none','none','none']"
                                                data-height="['none','none','none','none']" data-type="image"
                                                data-responsive_offset="on"
                                                data-frames='[{"delay":200,"speed":300,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                                data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">
                                                <img src="{{ url('frontend/images/slider_3_slide_3_boarder.png') }}"
                                                    alt="" data-ww="1085px" data-hh="832px" width="1085"
                                                    height="832" data-no-retina>
                                            </div>
                                            <!-- LAYER NR. 16 -->
                                            <div class="tp-caption tp-resizeme" id="slide-8-layer-6" data-x="68"
                                                data-y="79" data-width="['none','none','none','none']"
                                                data-height="['none','none','none','none']" data-type="image"
                                                data-responsive_offset="on"
                                                data-frames='[{"delay":500,"speed":300,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                                data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">
                                                <img src="{{ url('frontend/images/slider_3_slide_3_2.png') }}"
                                                    alt="" data-ww="915px" data-hh="805px" width="915"
                                                    height="805" data-no-retina>
                                            </div>
                                            <!-- LAYER NR. 17 -->
                                            <div class="tp-caption tp-resizeme" id="slide-8-layer-7" data-x="-2"
                                                data-y="223" data-width="['none','none','none','none']"
                                                data-height="['none','none','none','none']" data-type="image"
                                                data-responsive_offset="on"
                                                data-frames='[{"delay":600,"speed":300,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                                data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">
                                                <img src="{{ url('frontend/images/slider_3_slide_3_3.png') }}"
                                                    alt="" data-ww="1178px" data-hh="858px" width="1178"
                                                    height="858" data-no-retina>
                                            </div>
                                            <!-- LAYER NR. 18 -->
                                            <div class="tp-caption slider_3_text_80 tp-resizeme rs-parallaxlevel-1"
                                                id="slide-8-layer-2" data-x="310" data-y="264"
                                                data-width="['auto']" data-height="['auto']" data-type="text"
                                                data-responsive_offset="on"
                                                data-frames='[{"delay":890,"speed":300,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"y:-50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                                data-textAlign="['left','left','left','left']"
                                                data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">You Have
                                                To </div>
                                            <!-- LAYER NR. 19 -->
                                            <div class="tp-caption slider_3_slide_text_100 tp-resizeme rs-parallaxlevel-1"
                                                id="slide-8-layer-3" data-x="361" data-y="359"
                                                data-width="['auto']" data-height="['auto']" data-type="text"
                                                data-responsive_offset="on"
                                                data-frames='[{"delay":1160,"speed":300,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:-50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                                data-textAlign="['left','left','left','left']"
                                                data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">get back
                                            </div>
                                            <!-- LAYER NR. 20 -->
                                            <div class="tp-caption slider_3_text_70 tp-resizeme rs-parallaxlevel-1"
                                                id="slide-8-layer-4" data-x="264" data-y="481"
                                                data-width="['auto']" data-height="['auto']" data-type="text"
                                                data-responsive_offset="on"
                                                data-frames='[{"delay":1440,"speed":300,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"y:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                                data-textAlign="['left','left','left','left']"
                                                data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">into
                                                surfing again </div>
                                            <!-- LAYER NR. 21 -->
                                            <div class="tp-caption tp-resizeme" id="slide-8-layer-5" data-x="6"
                                                data-y="146" data-width="['none','none','none','none']"
                                                data-height="['none','none','none','none']" data-type="image"
                                                data-responsive_offset="on"
                                                data-frames='[{"delay":400,"speed":300,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                                data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                                data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">
                                                <img src="{{ url('frontend/images/slider_3_slide_3_1.png') }}"
                                                    alt="" data-ww="1891px" data-hh="803px" width="1891"
                                                    height="803" data-no-retina>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="tp-bannertimer tp-bottom"></div>
                                </div>
                            </div>
                            <!-- END REVOLUTION SLIDER -->
                       <!-- Snowboard Schools -->
                       <div class="hp_schools_section">
                        <div class="content_wrap">
                            <div class="custom_title_1 text_align_center">WHAT WE OFFER</div>
                            <div class="sc_services_wrap">
                                <div class="sc_services sc_services_style_services-3 sc_services_type_icons title_center width_100_per">
                                    <h2 class="sc_services_title sc_item_title sc_item_title_with_descr">Snowboard Schools</h2>
                                    <div class="sc_services_descr sc_item_descr">Skiing and snowboarding still rank among the undisputed winter sport highlights for all ages and ability levels. The perfectly groomed ski slopes makes a real heaven for skiers and riders. Our professional ski and snowboard instructors can show you all the little details while improving your skiing techniques and riding skills.</div>
                                    <div class="sc_columns columns_wrap">
                                        <div class="column-1_3 column_padding_bottom">
                                            <div class="sc_services_item sc_services_item_1 odd first">
                                                <div class="sc_services_item_featured post_featured">
                                                    <div class="post_thumb" data-image="" data-title="Private Lessons for Beginners">
                                                        <a class="hover_icon hover_icon_link" href="service-single.html">
                                                            <img alt="service_image_4.png" src="{{ url('frontend/images/service_image_4.png') }}">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="sc_services_item_content">
                                                    <h4 class="sc_services_item_subtitle">New to Snowboarding?</h4>
                                                    <h4 class="sc_services_item_title">
                                                        <a href="service-single.html">Private Lessons for Beginners</a>
                                                    </h4>
                                                    <div class="sc_services_item_description">
                                                        <a href="service-single.html" class="sc_button sc_button_square sc_button_style_filled sc_button_size_small">From $200</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><div class="column-1_3 column_padding_bottom">
                                            <div class="sc_services_item sc_services_item_2 even">
                                                <div class="sc_services_item_featured post_featured">
                                                    <div class="post_thumb" data-image="" data-title="Group Lessons for Beginners">
                                                        <a class="hover_icon hover_icon_link" href="service-single.html">
                                                            <img alt="service_image_5.png" src="{{ url('frontend/images/service_image_5.png') }}">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="sc_services_item_content">
                                                    <h4 class="sc_services_item_subtitle">Need a Crew?</h4>
                                                    <h4 class="sc_services_item_title">
                                                        <a href="service-single.html">Group Lessons for Beginners</a>
                                                    </h4>
                                                    <div class="sc_services_item_description">
                                                        <a href="service-single.html" class="sc_button sc_button_square sc_button_style_filled sc_button_size_small">From $100</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><div class="column-1_3 column_padding_bottom">
                                            <div class="sc_services_item sc_services_item_3 odd">
                                                <div class="sc_services_item_featured post_featured">
                                                    <div class="post_thumb" data-image="" data-title="Advanced Group Lessons">
                                                        <a class="hover_icon hover_icon_link" href="service-single.html">
                                                            <img alt="service_image_6.png" src="{{ url('frontend/images/service_image_6.png') }}">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="sc_services_item_content">
                                                    <h4 class="sc_services_item_subtitle">Wanna More?</h4>
                                                    <h4 class="sc_services_item_title">
                                                        <a href="service-single.html">Advanced Group Lessons</a>
                                                    </h4>
                                                    <div class="sc_services_item_description">
                                                        <a href="service-single.html" class="sc_button sc_button_square sc_button_style_filled sc_button_size_small">From $300</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Snowboard Schools -->
                            <!-- Online Booking -->
                            <div class="hp_booking_section">
                                <div class="content_wrap">
                                    <div class="sc_columns columns_wrap">
                                        <div class="column-1_2">
                                            <div class="custom_title_1 text_align_left">WHAT WE OFFER</div>
                                            <div class="sc_section">
                                                <div class="sc_section_inner">
                                                    <h2
                                                        class="sc_section_title sc_item_title sc_item_title_with_descr">
                                                        Online Booking</h2>
                                                    <div class="sc_section_descr sc_item_descr">To make an enquiry
                                                        about ski lessons or to book your ski instructor or guide,
                                                        please contact our ski school office. Duis mauris lectus,
                                                        tincidunt nec est eget, ultrices porttitor dui. Cras molestie
                                                        semper lorem sit amet varius.</div>
                                                    <div class="sc_section_content_wrap">
                                                        <a href="#"
                                                            class="sc_button sc_button_square sc_button_style_filled sc_button_size_small margin_top_tiny">booking</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Online Booking -->
                            <!-- The Essential Grid -->
                            <article class="myportfolio-container custom-1" id="esg-grid-1-1-wrap">
                                <div id="esg-grid-1-1" class="esg-grid">
                                    <ul>
                                        <!-- Grid item -->
                                        <li class="eg-custom-skin-1-wrapper" data-cobblesw="1" data-cobblesh="1">
                                            <div class="esg-media-cover-wrapper">
                                                <div class="esg-entry-media">
                                                    <img src="{{ url('frontend/images/image-9-1024x683.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div class="esg-entry-cover esg-fade" data-delay="0">
                                                    <div class="esg-overlay esg-fade eg-custom-skin-1-container"
                                                        data-delay="0"></div>
                                                    <div class="esg-center eg-custom-skin-1-element-10-a">
                                                        <a class="eg-custom-skin-1-element-10" href="post-single.html"
                                                            target="_self">Glacier National Park Backpacking Packing
                                                            List</a>
                                                    </div>
                                                    <div class="esg-center eg-custom-skin-1-element-12-a">
                                                        <a class="eg-custom-skin-1-element-12" href="#"
                                                            title="View all posts in Community and People">Community
                                                            and People</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- /Grid item -->
                                        <!-- Grid item -->
                                        <li class="eg-custom-skin-1-wrapper" data-cobblesw="2" data-cobblesh="1">
                                            <div class="esg-media-cover-wrapper">
                                                <div class="esg-entry-media">
                                                    <img src="{{ url('frontend/images/image-10-1024x683.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div class="esg-entry-cover esg-fade" data-delay="0">
                                                    <div class="esg-overlay esg-fade eg-custom-skin-1-container"
                                                        data-delay="0"></div>
                                                    <div class="esg-center eg-custom-skin-1-element-10-a">
                                                        <a class="eg-custom-skin-1-element-10" href="post-single.html"
                                                            target="_self">Downhill Skiing or Snowboarding: Training
                                                            Tips and Exercises</a>
                                                    </div>
                                                    <div class="esg-center eg-custom-skin-1-element-12-a">
                                                        <a class="eg-custom-skin-1-element-12" href="#"
                                                            title="View all posts in Competitions"
                                                            rel="category tag">Competitions</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- /Grid item -->
                                        <!-- Grid item -->
                                        <li class="eg-custom-skin-1-wrapper" data-cobblesw="1" data-cobblesh="1">
                                            <div class="esg-media-cover-wrapper">
                                                <div class="esg-entry-media">
                                                    <img src="{{ url('frontend/images/image-8-1024x649.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div class="esg-entry-cover esg-fade" data-delay="0">
                                                    <div class="esg-overlay esg-fade eg-custom-skin-1-container"
                                                        data-delay="0"></div>
                                                    <div class="esg-center eg-post-1 eg-custom-skin-1-element-10-a">
                                                        <a class="eg-custom-skin-1-element-10" href="post-single.html"
                                                            target="_self">Glide Waxing Your Skis or Snowboard</a>
                                                    </div>
                                                    <div class="esg-center eg-post-1 eg-custom-skin-1-element-12-a">
                                                        <a class="eg-custom-skin-1-element-12" href="#"
                                                            title="View all posts in Community and People">Community
                                                            and People</a>
                                                        <a class="eg-custom-skin-1-element-12" href="#"
                                                            title="View all posts in Mounthood">Mounthood</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- /Grid item -->
                                        <!-- Grid item -->
                                        <li class="eg-custom-skin-1-wrapper" data-cobblesw="1" data-cobblesh="1">
                                            <div class="esg-media-cover-wrapper">
                                                <div class="esg-entry-media">
                                                    <img src="{{ url('frontend/images/image-7-1024x670.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div class="esg-entry-cover esg-fade" data-delay="0">
                                                    <div class="esg-overlay esg-fade eg-custom-skin-1-container"
                                                        data-delay="0"></div>
                                                    <div class="esg-center eg-custom-skin-1-element-10-a">
                                                        <a class="eg-custom-skin-1-element-10" href="post-single.html"
                                                            target="_self">Avalanche Safety Gear: How to Choose</a>
                                                    </div>
                                                    <div class="esg-center eg-custom-skin-1-element-12-a">
                                                        <a class="eg-custom-skin-1-element-12" href="#"
                                                            title="View all posts in Competitions">Competitions</a>
                                                        <a class="eg-custom-skin-1-element-12" href="#"
                                                            title="View all posts in Places">Places</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- /Grid item -->
                                        <!-- Grid item -->
                                        <li class="eg-custom-skin-1-wrapper" data-cobblesw="1" data-cobblesh="1">
                                            <div class="esg-media-cover-wrapper">
                                                <div class="esg-entry-media">
                                                    <img src="{{ url('frontend/images/image-6-1024x683.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div class="esg-entry-cover esg-fade" data-delay="0">
                                                    <div class="esg-overlay esg-fade eg-custom-skin-1-container"
                                                        data-delay="0"></div>
                                                    <div class="esg-center eg-custom-skin-1-element-10-a">
                                                        <a class="eg-custom-skin-1-element-10" href="post-single.html"
                                                            target="_self">Snowboarding: Making Waves on the Slopes</a>
                                                    </div>
                                                    <div class="esg-center eg-custom-skin-1-element-12-a">
                                                        <a class="eg-custom-skin-1-element-12" href="#"
                                                            title="View all posts in Places">Places</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- /Grid item -->
                                        <!-- Grid item -->
                                        <li class="eg-custom-skin-1-wrapper" data-cobblesw="2" data-cobblesh="1">
                                            <div class="esg-media-cover-wrapper">
                                                <div class="esg-entry-media">
                                                    <img src="{{ url('frontend/images/image-5-883x1024.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div class="esg-entry-cover esg-fade" data-delay="0">
                                                    <div class="esg-overlay esg-fade eg-custom-skin-1-container"
                                                        data-delay="0"></div>
                                                    <div class="esg-center eg-custom-skin-1-element-10-a">
                                                        <a class="eg-custom-skin-1-element-10" href="post-single.html"
                                                            target="_self">A Perfect Day for Snowboarding in Venice</a>
                                                    </div>
                                                    <div class="esg-center eg-custom-skin-1-element-12-a">
                                                        <a class="eg-custom-skin-1-element-12" href="#"
                                                            title="View all posts in Mounthood">Mounthood</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- /Grid item -->
                                    </ul>
                                </div>
                            </article>
                            <div class="clear"></div>
                            <!-- /The Essential Grid -->
                            <!-- Crew -->
                            <div class="hp_crew_section">
                                <div class="content_wrap">
                                    <div class="custom_title_1 text_align_center">ABOUT US</div>
                                    <div class="sc_section title_center">
                                        <div class="sc_section_inner">
                                            <h2 class="sc_section_title sc_item_title sc_item_title_without_descr">meet
                                                our crew</h2>
                                            <div class="sc_section_content_wrap">
                                                <div class="sc_team_wrap margin_top_small">
                                                    <div
                                                        class="sc_team sc_team_style_team-3 title_center width_100_per">
                                                        <div class="sc_columns columns_wrap">
                                                            <!-- Team item -->
                                                            <div class="column-1_4 column_padding_bottom">
                                                                <div class="sc_team_item sc_team_item_1 odd first">
                                                                    <div class="sc_team_item_avatar">
                                                                        <img alt="Shannon Lorenz"
                                                                            src="{{ url('frontend/images/team-4-370x370.jpg') }}">
                                                                        <div class="sc_team_item_hover">
                                                                            <div class="sc_team_item_socials">
                                                                                <div
                                                                                    class="sc_socials sc_socials_type_icons sc_socials_shape_round sc_socials_size_tiny">
                                                                                    <div class="sc_socials_item">
                                                                                        <a href="#"
                                                                                            target="_blank"
                                                                                            class="social_icons social_facebook">
                                                                                            <span
                                                                                                class="icon-facebook"></span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="sc_socials_item">
                                                                                        <a href="#"
                                                                                            target="_blank"
                                                                                            class="social_icons social_twitter">
                                                                                            <span
                                                                                                class="icon-twitter"></span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="sc_socials_item">
                                                                                        <a href="#"
                                                                                            target="_blank"
                                                                                            class="social_icons social_instagram-3">
                                                                                            <span
                                                                                                class="icon-instagram-3"></span>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="sc_team_item_info">
                                                                        <h5 class="sc_team_item_title">
                                                                            <a href="team-single.html">Shannon
                                                                                Lorenz</a>
                                                                        </h5>
                                                                        <div class="sc_team_item_position">Instructor
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- /Team item --><!-- Team item -->
                                                            <div class="column-1_4 column_padding_bottom">
                                                                <div class="sc_team_item sc_team_item_2 even">
                                                                    <div class="sc_team_item_avatar">
                                                                        <img alt="Peter Colins"
                                                                            src="{{ url('frontend/images/team-3-370x370.jpg') }}">
                                                                        <div class="sc_team_item_hover">
                                                                            <div class="sc_team_item_socials">
                                                                                <div
                                                                                    class="sc_socials sc_socials_type_icons sc_socials_shape_round sc_socials_size_tiny">
                                                                                    <div class="sc_socials_item">
                                                                                        <a href="#"
                                                                                            target="_blank"
                                                                                            class="social_icons social_facebook">
                                                                                            <span
                                                                                                class="icon-facebook"></span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="sc_socials_item">
                                                                                        <a href="#"
                                                                                            target="_blank"
                                                                                            class="social_icons social_twitter">
                                                                                            <span
                                                                                                class="icon-twitter"></span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="sc_socials_item">
                                                                                        <a href="#"
                                                                                            target="_blank"
                                                                                            class="social_icons social_instagram-3">
                                                                                            <span
                                                                                                class="icon-instagram-3"></span>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="sc_team_item_info">
                                                                        <h5 class="sc_team_item_title">
                                                                            <a href="team-single.html">Peter
                                                                                Colins</a>
                                                                        </h5>
                                                                        <div class="sc_team_item_position">Instructor
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- /Team item --><!-- Team item -->
                                                            <div class="column-1_4 column_padding_bottom">
                                                                <div class="sc_team_item sc_team_item_3 odd">
                                                                    <div class="sc_team_item_avatar">
                                                                        <img alt="James Billings"
                                                                            src="{{ url('frontend/images/team-2-370x370.jpg') }}">
                                                                        <div class="sc_team_item_hover">
                                                                            <div class="sc_team_item_socials">
                                                                                <div
                                                                                    class="sc_socials sc_socials_type_icons sc_socials_shape_round sc_socials_size_tiny">
                                                                                    <div class="sc_socials_item">
                                                                                        <a href="#"
                                                                                            target="_blank"
                                                                                            class="social_icons social_facebook">
                                                                                            <span
                                                                                                class="icon-facebook"></span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="sc_socials_item">
                                                                                        <a href="#"
                                                                                            target="_blank"
                                                                                            class="social_icons social_twitter">
                                                                                            <span
                                                                                                class="icon-twitter"></span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="sc_socials_item">
                                                                                        <a href="#"
                                                                                            target="_blank"
                                                                                            class="social_icons social_instagram-3">
                                                                                            <span
                                                                                                class="icon-instagram-3"></span>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="sc_team_item_info">
                                                                        <h5 class="sc_team_item_title">
                                                                            <a href="team-single.html">James
                                                                                Billings</a>
                                                                        </h5>
                                                                        <div class="sc_team_item_position">Instructor
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- /Team item --><!-- Team item -->
                                                            <div class="column-1_4 column_padding_bottom">
                                                                <div class="sc_team_item sc_team_item_4 even">
                                                                    <div class="sc_team_item_avatar">
                                                                        <img alt="Samantha Allen"
                                                                            src="{{ url('frontend/images/team-1-370x370.jpg') }}">
                                                                        <div class="sc_team_item_hover">
                                                                            <div class="sc_team_item_socials">
                                                                                <div
                                                                                    class="sc_socials sc_socials_type_icons sc_socials_shape_round sc_socials_size_tiny">
                                                                                    <div class="sc_socials_item">
                                                                                        <a href="#"
                                                                                            target="_blank"
                                                                                            class="social_icons social_facebook">
                                                                                            <span
                                                                                                class="icon-facebook"></span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="sc_socials_item">
                                                                                        <a href="#"
                                                                                            target="_blank"
                                                                                            class="social_icons social_twitter">
                                                                                            <span
                                                                                                class="icon-twitter"></span>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="sc_socials_item">
                                                                                        <a href="#"
                                                                                            target="_blank"
                                                                                            class="social_icons social_instagram-3">
                                                                                            <span
                                                                                                class="icon-instagram-3"></span>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="sc_team_item_info">
                                                                        <h5 class="sc_team_item_title">
                                                                            <a href="team-single.html">Samantha
                                                                                Allen</a>
                                                                        </h5>
                                                                        <div class="sc_team_item_position">Instructor
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- /Team item -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Crew -->
                            <!-- School Info -->
                            <div class="hp_school_info">
                                <div class="content_wrap">
                                    <div class="sc_columns columns_wrap">
                                        <div class="column-9_12">
                                            <div class="custom_title_1 text_align_left">HELLO AND WELCOME TO</div>
                                            <div class="sc_section">
                                                <div class="sc_section_inner">
                                                    <h2
                                                        class="sc_section_title sc_item_title sc_item_title_without_descr">
                                                        MountHood Snowboard School</h2>
                                                </div>
                                            </div>
                                            <div class="sc_section margin_top_small-">
                                                <div class="sc_section_inner">
                                                    <div class="sc_section_descr sc_item_descr">MountHood Snowboard
                                                        School is the first 100% snowboard school with probably the best
                                                        riders from the valley. As MountHood is often called the
                                                        ''Mecca'' of freeride, our preference naturally focuses on
                                                        backcountry and off-piste riding. Our team consists of local,
                                                        experienced and certified snowboard instructors. Our instructors
                                                        and official UIAGM mountain guides, give you the unique
                                                        opportunity to discover the ultimate powder spots, under maximum
                                                        security and always with loads of fun.</div>
                                                </div>
                                            </div>
                                            <div class="sc_skills sc_skills_counter margin_top_6em"
                                                data-type="counter" data-caption="Skills">
                                                <div class="columns_wrap sc_skills_columns sc_skills_columns_3">
                                                    <div class="sc_skills_column column-1_3">
                                                        <div class="sc_skills_item sc_skills_style_2 odd first">
                                                            <div class="sc_skills_total" data-start="0"
                                                                data-stop="2300" data-step="23" data-max="2300"
                                                                data-speed="13" data-duration="1300"
                                                                data-ed="">0</div>
                                                            <div class="sc_skills_count"></div>
                                                            <div class="sc_skills_info">
                                                                <div class="sc_skills_label">Happy Clients</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sc_skills_column column-1_3">
                                                        <div class="sc_skills_item sc_skills_style_2 even">
                                                            <div class="sc_skills_total" data-start="0"
                                                                data-stop="26" data-step="23" data-max="2300"
                                                                data-speed="40" data-duration="45" data-ed="">
                                                                0</div>
                                                            <div class="sc_skills_count"></div>
                                                            <div class="sc_skills_info">
                                                                <div class="sc_skills_label">Professional Awards</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sc_skills_column column-1_3">
                                                        <div class="sc_skills_item sc_skills_style_2 odd">
                                                            <div class="sc_skills_total" data-start="0"
                                                                data-stop="319" data-step="23" data-max="2300"
                                                                data-speed="13" data-duration="180"
                                                                data-ed="">0</div>
                                                            <div class="sc_skills_count"></div>
                                                            <div class="sc_skills_info">
                                                                <div class="sc_skills_label">Reached Tops</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /School Info -->
                            <!-- Equipment -->
                            <div class="hp_equipment_section">
                                <div class="content_wrap">
                                    <div class="sc_section margin_top_6em">
                                        <div class="sc_section_inner">
                                            <div class="sc_section_content_wrap">
                                                <div class="custom_title_1 text_align_center">FROM THE SHOP</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sc_section margin_bottom_large margin_bottom_tiny title_center">
                                        <div class="sc_section_inner">
                                            <h2 class="sc_section_title sc_item_title sc_item_title_with_descr">Need
                                                Some Equipment?</h2>
                                            <div class="sc_section_descr sc_item_descr">Risus tempor in. Integer a
                                                quam sodales, sollicitudin metus ac, posuere mauris. Aliquam faucibus in
                                                tellus non sollicitudin lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit. Duis placerat, justo at dapibus egestas, risus odio
                                                fermentum urna, at molestie mauris nibh at orci phasellus accumsan
                                                sapien eget sodales porttitor suspendisse sed.</div>
                                            <div class="sc_section_content_wrap">
                                                <div class="woocommerce columns-4">
                                                    <ul class="products">
                                                        <!-- Product item -->
                                                        <li class="product first">
                                                            <div class="post_item_wrap">
                                                                <div class="post_featured">
                                                                    <div class="post_thumb">
                                                                        <img src="{{ url('frontend/images/product_01-300x300.jpg') }}"
                                                                            alt="" title="product_01" />
                                                                        <a href="#"
                                                                            class="button add_to_cart_button">Add to
                                                                            cart</a>
                                                                    </div>
                                                                </div>
                                                                <div class="post_content">
                                                                    <h3><a href="shop-product.html">Bogner Ginkgo
                                                                            Snowboard</a></h3>
                                                                    <div class="star-rating"
                                                                        title="Rated 5 out of 5">
                                                                        <span style="width:100%">
                                                                            <strong class="rating">5</strong> out of 5
                                                                        </span>
                                                                    </div>
                                                                    <span class="price">
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            <span
                                                                                class="woocommerce-Price-currencySymbol">&#36;</span>199.00
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <!-- /Product item -->
                                                        <!-- Product item -->
                                                        <li class="product">
                                                            <div class="post_item_wrap">
                                                                <div class="post_featured">
                                                                    <div class="post_thumb">
                                                                        <img src="{{ url('frontend/images/product_02-300x300.jpg') }}"
                                                                            alt="" title="product_02" />
                                                                        <a href="#"
                                                                            class="button add_to_cart_button">Add to
                                                                            cart</a>
                                                                    </div>
                                                                </div>
                                                                <div class="post_content">
                                                                    <h3><a href="shop-product.html">Bogner Phoenix
                                                                            Mirror Goggles</a></h3>
                                                                    <div class="star-rating"
                                                                        title="Rated 5 out of 5">
                                                                        <span style="width:100%">
                                                                            <strong class="rating">5</strong> out of 5
                                                                        </span>
                                                                    </div>
                                                                    <span class="price">
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            <span
                                                                                class="woocommerce-Price-currencySymbol">&#36;</span>339.00
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <!-- /Product item -->
                                                        <!-- Product item -->
                                                        <li class="product">
                                                            <div class="post_item_wrap">
                                                                <div class="post_featured">
                                                                    <div class="post_thumb">
                                                                        <img src="{{ url('frontend/images/product_03-300x300.jpg') }}"
                                                                            alt="" title="product_03" />
                                                                        <a href="#"
                                                                            class="button add_to_cart_button">Add to
                                                                            cart</a>
                                                                    </div>
                                                                </div>
                                                                <div class="post_content">
                                                                    <h3><a href="shop-product.html">Burton Blue
                                                                            Midnight Pullover</a></h3>
                                                                    <div class="star-rating"
                                                                        title="Rated 4 out of 5">
                                                                        <span style="width:80%">
                                                                            <strong class="rating">4</strong> out of 5
                                                                        </span>
                                                                    </div>
                                                                    <span class="price">
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            <span
                                                                                class="woocommerce-Price-currencySymbol">&#36;</span>149.00
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <!-- /Product item -->
                                                        <!-- Product item -->
                                                        <li class="product last">
                                                            <div class="post_item_wrap">
                                                                <div class="post_featured">
                                                                    <div class="post_thumb">
                                                                        <img src="{{ url('frontend/images/product_04-300x300.jpg') }}"
                                                                            alt="" title="product_04" />
                                                                        <a href="#"
                                                                            class="button add_to_cart_button">Add to
                                                                            cart</a>
                                                                    </div>
                                                                </div>
                                                                <div class="post_content">
                                                                    <h3><a href="shop-product.html">Gilson Nine.10
                                                                            Snow Helmet</a></h3>
                                                                    <div class="star-rating"
                                                                        title="Rated 3 out of 5">
                                                                        <span style="width:60%">
                                                                            <strong class="rating">3</strong> out of 5
                                                                        </span>
                                                                    </div>
                                                                    <span class="price">
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            <span
                                                                                class="woocommerce-Price-currencySymbol">&#36;</span>86.00
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <!-- /Product item -->
                                                    </ul>
                                                </div>
                                                <div class="sc_section sc_section_block margin_top_tiny aligncenter">
                                                    <div class="sc_section_inner">
                                                        <div class="sc_section_content_wrap">
                                                            <a href="shop-page.html"
                                                                class="sc_button sc_button_square sc_button_style_simple_alter sc_button_size_large sc_button_iconed none">View
                                                                All Products</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Equipment -->
                            <!-- From the Blog -->
                            <div class="hp_blog_section">
                                <div class="content_wrap">
                                    <div class="sc_section">
                                        <div class="sc_section_inner">
                                            <div class="sc_section_content_wrap">
                                                <div class="custom_title_1 text_align_center">FROM THE BLOG</div>
                                                <div
                                                    class="sc_blogger layout_classic_alter_3 template_masonry sc_blogger_horizontal no_description title_center">
                                                    <h2
                                                        class="sc_blogger_title sc_item_title sc_item_title_without_descr">
                                                        A Few Words About Our Lifestyle</h2>
                                                    <div class="isotope_wrap" data-columns="3">
                                                        <!-- Post item -->
                                                        <div
                                                            class="isotope_item isotope_item_classic isotope_item_classic_alter_3 isotope_column_3">
                                                            <div
                                                                class="post_item post_item_classic post_item_classic_alter_3 odd">
                                                                <div class="post_featured">
                                                                    <div class="post_thumb" data-image=""
                                                                        data-title="Serving Cookies at Alpine Nationals">
                                                                        <a class="hover_icon hover_icon_link"
                                                                            href="post-single.html">
                                                                            <img alt="Serving Cookies at Alpine Nationals"
                                                                                src="{{ url('frontend/images/image-4-480x480.jpg') }}">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post_content_overlay">
                                                                        <div
                                                                            class="post_content isotope_item_content">
                                                                            <div class="post_info">
                                                                                <span
                                                                                    class="post_info_item post_info_posted">
                                                                                    <a href="#"
                                                                                        class="post_info_date">August
                                                                                        8, 2016</a>
                                                                                </span>
                                                                                <span
                                                                                    class="post_info_item post_info_counters">
                                                                                    <a class="post_counters_item post_counters_comments icon-comment-1"
                                                                                        title="Comments - 0"
                                                                                        href="#">
                                                                                        <span
                                                                                            class="post_counters_number">0</span>
                                                                                    </a>
                                                                                    <a class="post_counters_item post_counters_likes icon-heart-1"
                                                                                        title="Like"
                                                                                        href="#">
                                                                                        <span
                                                                                            class="post_counters_number">1</span>
                                                                                    </a>
                                                                                </span>
                                                                            </div>
                                                                            <h5 class="post_title">
                                                                                <a href="post-single.html">Serving
                                                                                    Cookies at Alpine Nationals</a>
                                                                            </h5>
                                                                            <div class="post_descr">
                                                                                <a href="post-single.html"
                                                                                    class="sc_button sc_button_square sc_button_style_filled sc_button_size_small">
                                                                                    <span class="">Read
                                                                                        more</span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- /Post item --><!-- Post item -->
                                                        <div
                                                            class="isotope_item isotope_item_classic isotope_item_classic_alter_3 isotope_column_3">
                                                            <div
                                                                class="post_item post_item_classic post_item_classic_alter_3 even">
                                                                <div class="post_featured">
                                                                    <div class="post_thumb" data-image=""
                                                                        data-title="Easter Success on Top of MT Spokane">
                                                                        <a class="hover_icon hover_icon_link"
                                                                            href="post-single.html">
                                                                            <img alt="Easter Success on Top of MT Spokane"
                                                                                src="{{ url('frontend/images/image_2-480x480.jpg') }}">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post_content_overlay">
                                                                        <div
                                                                            class="post_content isotope_item_content">
                                                                            <div class="post_info">
                                                                                <span
                                                                                    class="post_info_item post_info_posted">
                                                                                    <a href="post-single.html"
                                                                                        class="post_info_date">August
                                                                                        8, 2016</a>
                                                                                </span>
                                                                                <span
                                                                                    class="post_info_item post_info_counters">
                                                                                    <a class="post_counters_item post_counters_comments icon-comment-1"
                                                                                        title="Comments - 0"
                                                                                        href="#">
                                                                                        <span
                                                                                            class="post_counters_number">0</span>
                                                                                    </a>
                                                                                    <a class="post_counters_item post_counters_likes icon-heart-1"
                                                                                        title="Like"
                                                                                        href="#">
                                                                                        <span
                                                                                            class="post_counters_number">0</span>
                                                                                    </a>
                                                                                </span>
                                                                            </div>
                                                                            <h5 class="post_title">
                                                                                <a href="post-single.html">Easter
                                                                                    Success on Top of MT Spokane</a>
                                                                            </h5>
                                                                            <div class="post_descr">
                                                                                <a href="post-single.html"
                                                                                    class="sc_button sc_button_square sc_button_style_filled sc_button_size_small">
                                                                                    <span class="">Read
                                                                                        more</span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- /Post item --><!-- Post item -->
                                                        <div
                                                            class="isotope_item isotope_item_classic isotope_item_classic_alter_3 isotope_column_3">
                                                            <div
                                                                class="post_item post_item_classic post_item_classic_alter_3 odd last">
                                                                <div class="post_featured">
                                                                    <div class="post_thumb" data-image=""
                                                                        data-title="Avalanche Safety Gear: How to Choose">
                                                                        <a class="hover_icon hover_icon_link"
                                                                            href="post-single.html">
                                                                            <img alt="Avalanche Safety Gear: How to Choose"
                                                                                src="{{ url('frontend/images/image-7-480x480.jpg') }}">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post_content_overlay">
                                                                        <div
                                                                            class="post_content isotope_item_content">
                                                                            <div class="post_info">
                                                                                <span
                                                                                    class="post_info_item post_info_posted">
                                                                                    <a href="#"
                                                                                        class="post_info_date">August
                                                                                        8, 2016</a>
                                                                                </span>
                                                                                <span
                                                                                    class="post_info_item post_info_counters">
                                                                                    <a class="post_counters_item post_counters_comments icon-comment-1"
                                                                                        title="Comments - 0"
                                                                                        href="#">
                                                                                        <span
                                                                                            class="post_counters_number">0</span>
                                                                                    </a>
                                                                                    <a class="post_counters_item post_counters_likes icon-heart-1"
                                                                                        title="Like"
                                                                                        href="#">
                                                                                        <span
                                                                                            class="post_counters_number">0</span>
                                                                                    </a>
                                                                                </span>
                                                                            </div>
                                                                            <h5 class="post_title">
                                                                                <a href="post-single.html">Avalanche
                                                                                    Safety Gear: How to Choose</a>
                                                                            </h5>
                                                                            <div class="post_descr">
                                                                                <a href="post-single.html"
                                                                                    class="sc_button sc_button_square sc_button_style_filled sc_button_size_small">
                                                                                    <span class="">Read
                                                                                        more</span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /Post item -->
                                                    </div>
                                                </div>
                                                <a href="blog-classic-with-sidebar.html"
                                                    class="sc_button sc_button_square sc_button_style_simple_alter sc_button_size_large aligncenter margin_top_small margin_bottom_tiny sc_button_iconed none">View
                                                    More Posts From Our Blog</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /From the Blog -->
                            <!-- Services-->
                            <div class="content_wrap">
                                <div class="sc_services_wrap">
                                    <div
                                        class="sc_services sc_services_style_services-1 sc_services_type_icons margin_top_medium margin_bottom_medium width_100_per">
                                        <div class="sc_columns columns_wrap">
                                            <div class="column-1_3 column_padding_bottom">
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
                                            <div class="column-1_3 column_padding_bottom">
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
                                            <div class="column-1_3 column_padding_bottom">
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
                            <!-- Google Map -->
                            <div id="sc_googlemap_196270504" class="sc_googlemap width_100_per height_500"
                                data-zoom="14" data-style="dark">
                                <div id="sc_googlemap_196270504_1" class="sc_googlemap_marker" data-title=""
                                    data-description="6486 Sycamore Lane Fort Lee"
                                    data-address="6486 Sycamore Lane Fort Lee" data-latlng=""
                                    data-point="{{ url('frontend/images/map-marker.png') }}"></div>
                            </div>
                            <!-- /Google Map -->
                        </section>
                    </article>
                </div>
                <!-- /Content -->
            </div>
            <!-- /Page content wrap -->
            <footer class="footer_wrap widget_area">
                <div class="footer_wrap_inner widget_area_inner">
                    <div class="content_wrap">
                        <div class="columns_wrap">
                            <!-- Widget: Weather -->
                            <aside class="column-1_3 widget widget_text">
                                <h5 class="widget_title">WEATHER TODAY</h5>
                                <div class="textwidget">
                                    <div class="wpc-weather-id">
                                        <div id="wpc-weather" class="wpc-weather-1 medium">
                                            <div class="now">
                                                <div class="location_name">New Jersey</div>
                                                <div class="time_symbol climacon" style="fill:#ffffff">
                                                    <svg id="cloudDrizzleSun"
                                                        class="climacon climacon_cloudDrizzleSun" version="1.1"
                                                        xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                        viewBox="15 15 70 70" enable-background="new 15 15 70 70"
                                                        xml:space="preserve">
                                                        <clipPath id="cloudFillClip">
                                                            <path
                                                                d="M15,15v70h70V15H15z M59.943,61.639c-3.02,0-12.381,0-15.999,0c-6.626,0-11.998-5.371-11.998-11.998c0-6.627,5.372-11.999,11.998-11.999c5.691,0,10.434,3.974,11.665,9.29c1.252-0.81,2.733-1.291,4.334-1.291c4.418,0,8,3.582,8,8C67.943,58.057,64.361,61.639,59.943,61.639z">
                                                            </path>
                                                        </clipPath>
                                                        <clipPath id="sunCloudFillClip">
                                                            <path
                                                                d="M15,15v70h70V15H15z M57.945,49.641c-4.417,0-8-3.582-8-7.999c0-4.418,3.582-7.999,8-7.999s7.998,3.581,7.998,7.999C65.943,46.059,62.362,49.641,57.945,49.641z">
                                                            </path>
                                                        </clipPath>
                                                        <clipPath id="cloudSunFillClip">
                                                            <path
                                                                d="M15,15v70h20.947V63.481c-4.778-2.767-8-7.922-8-13.84c0-8.836,7.163-15.998,15.998-15.998c6.004,0,11.229,3.312,13.965,8.203c0.664-0.113,1.338-0.205,2.033-0.205c6.627,0,11.998,5.373,11.998,12c0,5.262-3.394,9.723-8.107,11.341V85H85V15H15z">
                                                            </path>
                                                        </clipPath>
                                                        <g
                                                            class="climacon_iconWrap climacon_iconWrap-cloudDrizzleSun">
                                                            <g clip-path="url(#cloudSunFillClip)">
                                                                <g
                                                                    class="climacon_componentWrap climacon_componentWrap-sun climacon_componentWrap-sun_cloud">
                                                                    <g
                                                                        class="climacon_componentWrap climacon_componentWrap_sunSpoke">
                                                                        <path
                                                                            class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north"
                                                                            d="M80.029,43.611h-3.998c-1.105,0-2-0.896-2-1.999s0.895-2,2-2h3.998c1.104,0,2,0.896,2,2S81.135,43.611,80.029,43.611z">
                                                                        </path>
                                                                        <path
                                                                            class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north"
                                                                            d="M72.174,30.3c-0.781,0.781-2.049,0.781-2.828,0c-0.781-0.781-0.781-2.047,0-2.828l2.828-2.828c0.779-0.781,2.047-0.781,2.828,0c0.779,0.781,0.779,2.047,0,2.828L72.174,30.3z">
                                                                        </path>
                                                                        <path
                                                                            class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north"
                                                                            d="M58.033,25.614c-1.105,0-2-0.896-2-2v-3.999c0-1.104,0.895-2,2-2c1.104,0,2,0.896,2,2v3.999C60.033,24.718,59.135,25.614,58.033,25.614z">
                                                                        </path>
                                                                        <path
                                                                            class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north"
                                                                            d="M43.892,30.3l-2.827-2.828c-0.781-0.781-0.781-2.047,0-2.828c0.78-0.781,2.047-0.781,2.827,0l2.827,2.828c0.781,0.781,0.781,2.047,0,2.828C45.939,31.081,44.673,31.081,43.892,30.3z">
                                                                        </path>
                                                                        <path
                                                                            class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north"
                                                                            d="M42.033,41.612c0,1.104-0.896,1.999-2,1.999h-4c-1.104,0-1.998-0.896-1.998-1.999s0.896-2,1.998-2h4C41.139,39.612,42.033,40.509,42.033,41.612z">
                                                                        </path>
                                                                        <path
                                                                            class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north"
                                                                            d="M43.892,52.925c0.781-0.78,2.048-0.78,2.827,0c0.781,0.78,0.781,2.047,0,2.828l-2.827,2.827c-0.78,0.781-2.047,0.781-2.827,0c-0.781-0.78-0.781-2.047,0-2.827L43.892,52.925z">
                                                                        </path>
                                                                        <path
                                                                            class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north"
                                                                            d="M58.033,57.61c1.104,0,2,0.895,2,1.999v4c0,1.104-0.896,2-2,2c-1.105,0-2-0.896-2-2v-4C56.033,58.505,56.928,57.61,58.033,57.61z">
                                                                        </path>
                                                                        <path
                                                                            class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north"
                                                                            d="M72.174,52.925l2.828,2.828c0.779,0.78,0.779,2.047,0,2.827c-0.781,0.781-2.049,0.781-2.828,0l-2.828-2.827c-0.781-0.781-0.781-2.048,0-2.828C70.125,52.144,71.391,52.144,72.174,52.925z">
                                                                        </path>
                                                                    </g>
                                                                    <g class="climacon_wrapperComponent climacon_wrapperComponent-sunBody"
                                                                        clip-path="url(#sunCloudFillClip)">
                                                                        <circle
                                                                            class="climacon_component climacon_component-stroke climacon_component-stroke_sunBody"
                                                                            cx="58.033" cy="41.612"
                                                                            r="11.999"></circle>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                            <g
                                                                class="climacon_wrapperComponent climacon_wrapperComponent-drizzle">
                                                                <path
                                                                    class="climacon_component climacon_component-stroke climacon_component-stroke_drizzle climacon_component-stroke_drizzle-left"
                                                                    d="M42.001,53.644c1.104,0,2,0.896,2,2v3.998c0,1.105-0.896,2-2,2c-1.105,0-2.001-0.895-2.001-2v-3.998C40,54.538,40.896,53.644,42.001,53.644z">
                                                                </path>
                                                                <path
                                                                    class="climacon_component climacon_component-stroke climacon_component-stroke_drizzle climacon_component-stroke_drizzle-middle"
                                                                    d="M49.999,53.644c1.104,0,2,0.896,2,2v4c0,1.104-0.896,2-2,2s-1.998-0.896-1.998-2v-4C48.001,54.54,48.896,53.644,49.999,53.644z">
                                                                </path>
                                                                <path
                                                                    class="climacon_component climacon_component-stroke climacon_component-stroke_drizzle climacon_component-stroke_drizzle-right"
                                                                    d="M57.999,53.644c1.104,0,2,0.896,2,2v3.998c0,1.105-0.896,2-2,2c-1.105,0-2-0.895-2-2v-3.998C55.999,54.538,56.894,53.644,57.999,53.644z">
                                                                </path>
                                                            </g>
                                                            <g class="climacon_wrapperComponent climacon_wrapperComponent-cloud"
                                                                clip-path="url(#cloudFillClip)">
                                                                <path
                                                                    class="climacon_component climacon_component-stroke climacon_component-stroke_cloud"
                                                                    d="M63.999,64.944v-4.381c2.387-1.386,3.998-3.961,3.998-6.92c0-4.418-3.58-8-7.998-8c-1.603,0-3.084,0.481-4.334,1.291c-1.232-5.316-5.973-9.29-11.664-9.29c-6.628,0-11.999,5.372-11.999,12c0,3.549,1.55,6.729,3.998,8.926v4.914c-4.776-2.769-7.998-7.922-7.998-13.84c0-8.836,7.162-15.999,15.999-15.999c6.004,0,11.229,3.312,13.965,8.203c0.664-0.113,1.336-0.205,2.033-0.205c6.627,0,11.998,5.373,11.998,12C71.997,58.864,68.655,63.296,63.999,64.944z">
                                                                </path>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="time_temperature">2</div>
                                            </div>
                                            <div class="today">
                                                <div class="day">
                                                    <span class="wpc-highlight"></span> Today
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget_area sc_widget_socials">
                                        <aside id="widget_socials" class="widget widget_socials">
                                            <div class="widget_inner">
                                                <div
                                                    class="sc_socials sc_socials_type_icons sc_socials_shape_round sc_socials_size_tiny">
                                                    <div class="sc_socials_item">
                                                        <a href="#" target="_blank"
                                                            class="social_icons social_facebook">
                                                            <span class="icon-facebook"></span>
                                                        </a>
                                                    </div>
                                                    <div class="sc_socials_item">
                                                        <a href="#" target="_blank"
                                                            class="social_icons social_twitter">
                                                            <span class="icon-twitter"></span>
                                                        </a>
                                                    </div>
                                                    <div class="sc_socials_item">
                                                        <a href="#" target="_blank"
                                                            class="social_icons social_instagram-3">
                                                            <span class="icon-instagram-3"></span>
                                                        </a>
                                                    </div>
                                                    <div class="sc_socials_item">
                                                        <a href="#" target="_blank"
                                                            class="social_icons social_foursquare">
                                                            <span class="icon-foursquare"></span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </aside>
                                    </div>
                                </div>
                            </aside><!-- /Widget: Weather --><!-- Widget: Recent Reviews -->
                            <aside class="column-1_3 widget widget_recent_reviews">
                                <h5 class="widget_title">Recent Reviews</h5>
                                <div class="recent_reviews">
                                    <article class="post_item no_thumb first">
                                        <div class="post_content">
                                            <h6 class="post_title">
                                                <a href="post-single.html">Serving Cookies at Alpine Nationals</a>
                                            </h6>
                                            <div class="post_rating reviews_summary blog_reviews">
                                                <div class="criteria_summary criteria_row">
                                                    <div class="reviews_stars reviews_style_stars" data-mark="87.3">
                                                        <div class="reviews_stars_wrap">
                                                            <div class="reviews_stars_bg"><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span></div>
                                                            <div class="reviews_stars_hover" style="width:87%"><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span></div>
                                                        </div>
                                                        <div class="reviews_value">87.3</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post_info"></div>
                                        </div>
                                    </article>
                                    <article class="post_item no_thumb">
                                        <div class="post_content">
                                            <h6 class="post_title">
                                                <a href="post-single.html">Loveland Pass Shuttle Service</a>
                                            </h6>
                                            <div class="post_rating reviews_summary blog_reviews">
                                                <div class="criteria_summary criteria_row">
                                                    <div class="reviews_stars reviews_style_stars" data-mark="75.3">
                                                        <div class="reviews_stars_wrap">
                                                            <div class="reviews_stars_bg"><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span></div>
                                                            <div class="reviews_stars_hover" style="width:75%"><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span></div>
                                                        </div>
                                                        <div class="reviews_value">75.3</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post_info"></div>
                                        </div>
                                    </article>
                                    <article class="post_item no_thumb">
                                        <div class="post_content">
                                            <h6 class="post_title">
                                                <a href="post-single.html">Advanced Group Lessons</a>
                                            </h6>
                                            <div class="post_rating reviews_summary blog_reviews">
                                                <div class="criteria_summary criteria_row">
                                                    <div class="reviews_stars reviews_style_stars"
                                                        data-mark="100.0">
                                                        <div class="reviews_stars_wrap">
                                                            <div class="reviews_stars_bg"><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span></div>
                                                            <div class="reviews_stars_hover" style="width:100%">
                                                                <span class="reviews_star"></span><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span>
                                                            </div>
                                                        </div>
                                                        <div class="reviews_value">100.0</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post_info"></div>
                                        </div>
                                    </article>
                                </div>
                            </aside><!-- /Widget: Recent Reviews --><!-- Widget: Contacts -->
                            <aside class="column-1_3 widget widget_contacts">
                                <h5 class="widget_title">Contact Us</h5>
                                <div class="widget_inner">
                                    <ul class="contact_info">
                                        <li>
                                            <i class="icon icon-phone"></i>
                                            <div>1 800 215 16 35</div>
                                        </li>
                                        <li>
                                            <i class="icon icon-location"></i>
                                            <div>2 Chemin de Bordeneuve, 31490 Brax, France<br /></div>
                                        </li>
                                        <li>
                                            <i class="icon icon-pencil"></i>
                                            <div>inbox@mounthood.com</div>
                                        </li>
                                        <li>
                                            <i class="icon icon-clock"></i>
                                            <div>Open Hours: 8.00 am – 10.00 pm Monday - Sunday</div>
                                        </li>
                                    </ul>
                                </div>

                            </aside>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- /Footer -->
            <!-- Copyright -->
            <div class="copyright_wrap copyright_style_menu">
                <div class="copyright_wrap_inner">
                    <div class="content_wrap">
                        <ul id="menu_footer" class="menu_footer_nav">
                            <li class="menu-item">
                                <a href="{{ url('/') }}"><span>Home</span></a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ url('/donate') }}"><span>Donate</span></a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ url('/about') }}"><span>About</span></a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ url('/teams') }}"><span>Teams</span></a>
                            </li>
                            <!-- /Menu: Rent -->
                            <!-- Menu: Store -->
                            <li class="menu-item">
                                <a href="{{ url('/programs') }}"><span>Programs</span></a>
                            </li>
                            <!-- /Menu: Store -->
                            <!-- Menu: News -->
                            <li class="menu-item ">
                                <a href="{{ url('/competition') }}"><span>Competition</span></a>

                            </li>
                            <!-- /Menu: News -->
                            <!-- Menu: Contact Us -->
                            <li class="menu-item">
                                <a href="{{ url('/membership') }}"><span>Membership</span></a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ url('/contact') }}"><span>Contact Us</span></a>
                            </li>
                        </ul>
                        <div class="copyright_text">
                            <p>
                                <a href="#">Ski Snowboard India</a> © 2024 All
                                Rights Reserved.
                                <a href="#">Terms of Use</a> and
                                <a href="#">Privacy Policy</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Copyright -->
        </div>
        <!-- /Page wrap -->

    </div>
    <!-- /Body wrap -->

    <a href="#" class="scroll_to_top icon-up-small" title="Scroll to top"></a>

    <script type="text/javascript" src="{{ url('frontend/js/jquery/jquery.js') }}"></script>

    <script type="text/javascript" src="{{ url('frontend/js/_packed.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend/js/_main.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend/js/trx_utils.js') }}"></script>

    <script type="text/javascript" src="{{ url('frontend/js/vendor/essential-grid/js/lightbox.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend/js/vendor/essential-grid/js/jquery.themepunch.tools.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ url('frontend/js/vendor/essential-grid/js/jquery.themepunch.essential.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend/js/eg-index-page.js') }}"></script>

    <script type="text/javascript" src="{{ url('frontend/js/vendor/revslider/jquery.themepunch.revolution.min.js') }}">
    </script>

    <script type="text/javascript" src="{{ url('frontend/js/vendor/revslider/revolution.extension.slideanims.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ url('frontend/js/vendor/revslider/revolution.extension.layeranimation.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend/js/vendor/revslider/revolution.extension.navigation.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ url('frontend/js/vendor/revslider/revolution.extension.parallax.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ url('frontend/js/revslider-index-page.js') }}"></script>

    <script type="text/javascript" src="{{ url('frontend/js/vendor/woocommerce/js/woocommerce.min.js') }}"></script>

    <script type="text/javascript" src="{{ url('frontend/js/superfish.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend/js/core.utils.js') }}"></script>

    <script type="text/javascript" src="{{ url('frontend/js/core.init.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend/js/tpl.init.js') }}"></script>

    <script type="text/javascript" src="{{ url('frontend/js/shortcodes.js') }}"></script>

    <script type="text/javascript" src="{{ url('frontend/js/vendor/photostack/modernizr.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend/js/vendor/magnific/jquery.magnific-popup.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend/js/core.messages/core.messages.js') }}"></script>

    <script type="text/javascript" src="{{ url('frontend/js/vendor/skrollr/dist/skrollr.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend/js/vendor/isotope/dist/isotope.pkgd.min.js') }}"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAA8O_i6YWSOXQn1vd9SSiIriIqewvBFWk">
    </script>
    <script type="text/javascript" src="{{ url('frontend/js/core.googlemap.js') }}"></script>
</body>

</html>
