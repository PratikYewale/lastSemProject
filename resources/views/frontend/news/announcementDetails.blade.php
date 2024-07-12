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
                    <span class="breadcrumbs_item current">Announcement</span>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current">{{ $news->title }}</span>
                </div>
            </div>
        </div>
    </section>
    <!-- /Top panel -->
    <div class="container text-primary mt-3">
      <b class="back-link">  <span class="sc_list_icon icon-left-small"> <a
            href="{{ url('/announcement') }}"><span class="ms-1 text-primary">Back To Announcement</span></a>
        </b>
    </div>
    <!-- Page content wrap -->
    <div class="page_content_wrap py-5">

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
                                <p>
                                    <b>{{ $news->intro_para }}</b>
                                </p>
                                <!-- <img class="mb-0" src="{{ asset($news->primary_img) }}" alt="Blog"> -->
                                <img alt="Serving Cookies at Alpine Nationals" style="height:60%; width:60%" src="{{ $news->primary_img ?? url('frontend/images/image-4-480x480.jpg') }}">

                                <!-- @if (!empty($news['img1']))
                                    <img class="mb-0" src="{{ asset($news->primary_img) }}" alt="Blog">
                                @else
                                    <img class="mb-0" src="{{ url('frontend/images/image-10-1024x683.jpg') }}"
                                        alt="Blog">
                                @endif -->


                                <p>{{ $news->body_para }}</p>
                                @if (!empty($news['img1']))
                                    <img class="mb-0" src="{{ asset($news->secondary_img) }}" alt="Blog">
                                @endif
                                <p>{{ $news->conclusion }}</p>


                            </section>
                            <!-- Post author -->

                            <!-- /Post author -->
                        </article>

                    </div>
                    <!-- /Content -->
                </div>
                <div class="col-lg-4 offset-lg-1">

                    <!-- Sidebar -->
                    <div class="sidebar widget_area scheme_dark">
                        <div class="sidebar_inner widget_area_inner">

                            <aside class="widget widget_recent_reviews">
                                <h5 class="widget_title">Recent Posts</h5>
                                @if ($recentNews->count() > 0)
                                    <div class="recent_reviews">
                                        @foreach ($recentNews as $item)
                                            <article class="post_item no_thumb first">
                                                <div class="post_content">
                                                    <h6 class="post_title">

                                                        <a
                                                            href="{{ route('announcementDetails', ['id' => $item->id]) }}">{{ $item->title }}</a>
                                                    </h6>
                                                    <div class="post_rating reviews_summary blog_reviews">
                                                        <div class="criteria_summary criteria_row">
                                                            <div class="reviews_stars reviews_style_stars" data-mark="87.3">
                                                                <div class="reviews_stars_wrap">
                                                                    {{ \Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}
                                                                </div>
                                                                <div class="reviews_value">
                                                                    @if ($item->type == 'achievements')
                                                                        Achievement
                                                                        @elseif ($item->type == 'announcement')
                                                                        Announcement
                                                                        @else
                                                                        News

                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="post_info"></div>
                                                </div>
                                            </article>
                                        @endforeach

                                    </div>
                                @else
                                    <h1>No Data available.</h1>
                                @endif
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
