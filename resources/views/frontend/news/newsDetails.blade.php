@extends('frontend.layouts.main')
@section('main-container')
    <!-- Top panel -->
    <section class="top_panel_image">
        <div class="top_panel_image_hover"></div>
        <div class="content_wrap">
            <div class="top_panel_image_header">
                <h1 class="top_panel_image_title">{{ $news->title }}</h1>
                <div class="breadcrumbs">
                    <a class="breadcrumbs_item home" href="{{ url('/') }}">Home</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current">News</span>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current">{{ $news->title }}</span>
                </div>
            </div>
        </div>
    </section>
    <!-- /Top panel -->

    <!-- Page content wrap -->
    <div class="page_content_wrap page_paddings_yes">
        <div class="content_wrap">
            <div class="row">
                <div class="col-lg-7">
                    <!-- Content -->
                    <div class="content">
                        <article class="post_item post_item_single post">
                            <h3 class="post_title_single">
                                <a href="#">{{ $news->title }}</a>
                            </h3>
                            <div class="post_info d-flex justify-content-between">
                                <span class="post_info_item post_info_posted">
                                    <span class="contact_icon icon-calendar-light"></span> <a href="#"
                                        class="post_info_date date">{{ \Carbon\Carbon::parse($news->created_at)->format('M d, Y') }}</a>
                                </span>
                                <span class="post_info_item post_info_posted_by">
                                    <span class="contact_icon icon-user"></span> <a href="#"
                                        class="post_info_author">{{ $news->user->first_name }}
                                        {{ $news->user->last_name }}</a></span>

                            </div>
                            {{-- <section class="post_featured">
                                <div class="post_thumb" data-image="http://placehold.it/2300x1513"
                                    data-title="Serving Cookies at Alpine Nationals">
                                    <a class="hover_icon hover_icon_view" href="http://placehold.it/2300x1513"
                                        title="Serving Cookies at Alpine Nationals">
                                        <img alt="Serving Cookies at Alpine Nationals" src="http://placehold.it/1170x659">
                                    </a>
                                </div>
                            </section> --}}
                            <section class="post_content">
                                <p>{{ $news->intro_para }}</p>
                                @if (!empty($news['img1']))
                                    <img class="mb-0" src="{{ asset($news->primary_img) }}" alt="Blog">
                                @else
                                    <img class="mb-0" src="{{ url('frontend/images/image-10-1024x683.jpg') }}"
                                        alt="Blog">
                                @endif


                                <p>{{ $news->body_para }}</p>
                                @if (!empty($news['img1']))
                                    <img class="mb-0" src="{{ asset($news->secondary_img) }}" alt="Blog">
                              
                                @endif
                                <p>{{ $news->conclusion }}</p>
                               
                            
                            </section>
                            <!-- Post author -->
                            <div class="post_line_over_author"></div>
                            <section class="post_author author">
                                <div class="post_author_avatar">
                                    <a href="#">
                                        <img alt="" src="http://placehold.it/228x228" />
                                    </a>
                                </div>
                                <div class="post_author_content">
                                    <h6 class="post_author_title">About
                                        <span>
                                            <a href="#" class="fn">Jane Doe</a>
                                        </span>
                                    </h6>
                                    <div class="post_author_info">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.
                                    </div>
                                </div>
                            </section>
                            <div class="post_line_under_author"></div>
                            <!-- /Post author -->
                        </article>

                    </div>
                    <!-- /Content -->
                </div>
                <div class="col-lg-4 offset-lg-1">

                    <!-- Sidebar -->
                    <div class="sidebar widget_area scheme_dark">
                        <div class="sidebar_inner widget_area_inner">
                            <!-- Widget: Reviews -->
                            <aside class="widget widget_reviews">
                                <div class="reviews_block sc_tabs sc_tabs_style_2">
                                    <ul class="sc_tabs_titles">
                                        <li class="sc_tabs_title">
                                            <a href="#author_marks" class="theme_button">Author</a>
                                        </li>
                                        <li class="sc_tabs_title">
                                            <a href="#users_marks" class="theme_button">Users</a>
                                        </li>
                                    </ul>
                                    <div id="author_marks" class="sc_tabs_content">
                                        <div class="reviews_editor">
                                            <div class="reviews_item reviews_max_level_100" data-max-level="100"
                                                data-step="1">
                                                <div class="reviews_criteria">Criteria 1</div>
                                                <div class="reviews_stars reviews_style_stars" data-mark="88">
                                                    <div class="reviews_stars_wrap">
                                                        <div class="reviews_stars_bg"></div>
                                                        <div class="reviews_stars_hover" style="width:88%"></div>
                                                    </div>
                                                    <div class="reviews_value">88</div>
                                                </div>
                                            </div>
                                            <div class="reviews_item reviews_max_level_100" data-max-level="100"
                                                data-step="1">
                                                <div class="reviews_criteria">Criteria 2</div>
                                                <div class="reviews_stars reviews_style_stars" data-mark="74">
                                                    <div class="reviews_stars_wrap">
                                                        <div class="reviews_stars_bg"></div>
                                                        <div class="reviews_stars_hover" style="width:74%"></div>
                                                    </div>
                                                    <div class="reviews_value">74</div>
                                                </div>
                                            </div>
                                            <div class="reviews_item reviews_max_level_100" data-max-level="100"
                                                data-step="1">
                                                <div class="reviews_criteria">Criteria 3</div>
                                                <div class="reviews_stars reviews_style_stars" data-mark="100">
                                                    <div class="reviews_stars_wrap">
                                                        <div class="reviews_stars_bg"></div>
                                                        <div class="reviews_stars_hover" style="width:100%"></div>
                                                    </div>
                                                    <div class="reviews_value">100</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="reviews_summary">
                                            <div class="reviews_item reviews_max_level_100" data-step="1">
                                                <div class="reviews_criteria">Sed ut perspiciatis, unde omnis iste natus
                                                    error sit voluptatem accusantium doloremque laudantium, totam rem
                                                    aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto
                                                    beatae vitae dicta sunt, explicabo&#8230;</div>
                                                <div class="reviews_stars reviews_style_stars" data-mark="87">
                                                    <div class="reviews_stars_wrap">
                                                        <div class="reviews_stars_bg"></div>
                                                        <div class="reviews_stars_hover" style="width:87%"></div>
                                                    </div>
                                                    <div class="reviews_value">87</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="users_marks" class="sc_tabs_content">
                                        <div class="reviews_editor">
                                            <div class="reviews_item reviews_max_level_100" data-max-level="100"
                                                data-step="1">
                                                <div class="reviews_criteria">Criteria 1</div>
                                                <div class="reviews_stars reviews_style_stars reviews_editable"
                                                    data-mark="84">
                                                    <div class="reviews_stars_wrap">
                                                        <div class="reviews_stars_bg"></div>
                                                        <div class="reviews_stars_hover" style="width:84%"></div>
                                                        <div class="reviews_slider"></div>
                                                    </div>
                                                    <div class="reviews_value">84</div>
                                                </div>
                                            </div>
                                            <div class="reviews_item reviews_max_level_100" data-max-level="100"
                                                data-step="1">
                                                <div class="reviews_criteria">Criteria 2</div>
                                                <div class="reviews_stars reviews_style_stars reviews_editable"
                                                    data-mark="98">
                                                    <div class="reviews_stars_wrap">
                                                        <div class="reviews_stars_bg"></div>
                                                        <div class="reviews_stars_hover" style="width:98%"></div>
                                                        <div class="reviews_slider"></div>
                                                    </div>
                                                    <div class="reviews_value">98</div>
                                                </div>
                                            </div>
                                            <div class="reviews_item reviews_max_level_100" data-max-level="100"
                                                data-step="1">
                                                <div class="reviews_criteria">Criteria 3</div>
                                                <div class="reviews_stars reviews_style_stars reviews_editable"
                                                    data-mark="84">
                                                    <div class="reviews_stars_wrap">
                                                        <div class="reviews_stars_bg"></div>
                                                        <div class="reviews_stars_hover" style="width:84%"></div>
                                                        <div class="reviews_slider"></div>
                                                    </div>
                                                    <div class="reviews_value">84</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="reviews_summary">
                                            <div class="reviews_item reviews_max_level_100" data-step="1">
                                                <div class="reviews_criteria">Sed ut perspiciatis, unde omnis iste natus
                                                    error sit voluptatem accusantium doloremque laudantium, totam rem
                                                    aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto
                                                    beatae vitae dicta sunt, explicabo&#8230;</div>
                                                <div class="reviews_stars reviews_style_stars" data-mark="89">
                                                    <div class="reviews_stars_wrap">
                                                        <div class="reviews_stars_bg"></div>
                                                        <div class="reviews_stars_hover" style="width:89%"></div>
                                                    </div>
                                                    <div class="reviews_value">89</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </aside><!-- /Widget: Reviews --><!-- Widget: Categories -->
                         
                   
                            <aside class="widget widget_recent_reviews">
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
                                                            <div class="reviews_stars_bg">
                                                                <span class="reviews_star"></span><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span>
                                                            </div>
                                                            <div class="reviews_stars_hover" style="width:87%">
                                                                <span class="reviews_star"></span><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span>
                                                            </div>
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
                                                            <div class="reviews_stars_bg">
                                                                <span class="reviews_star"></span><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span>
                                                            </div>
                                                            <div class="reviews_stars_hover" style="width:75%">
                                                                <span class="reviews_star"></span><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span>
                                                            </div>
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
                                                    <div class="reviews_stars reviews_style_stars" data-mark="100.0">
                                                        <div class="reviews_stars_wrap">
                                                            <div class="reviews_stars_bg">
                                                                <span class="reviews_star"></span><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span><span
                                                                    class="reviews_star"></span>
                                                            </div>
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
                            </aside>
                         
                        </div>
                    </div>
                    <!-- /Sidebar -->
                </div>
            </div>

        </div>
    </div>
    <!-- /Page content wrap -->
@endsection
