@extends('frontend.layouts.main')
@section('main-container')
    <!-- Top panel -->
    <section class="top_panel_image">
        <div class="top_panel_image_hover"></div>
        <div class="content_wrap">
            <div class="top_panel_image_header">
                <h1 class="top_panel_image_title">News</h1>
                <div class="breadcrumbs">
                    <a class="breadcrumbs_item home" href="{{ url('/') }}">Home</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current">News</span>
                </div>
            </div>
        </div>
    </section>
    <!-- /Top panel -->
    <!-- Page content wrap -->
    <div class="page_content_wrap page_paddings_yes">
        <div class="content_wrap">
            <!-- Content -->
            <div class="content">
                @if (isset($news) && count($news) > 0)
                    <div class="row">
                        @foreach ($news as $news)
                            <div class="col-lg-4">
                                <!-- Post item -->
                                <article class="post_item card news-card post_item_excerpt odd post">
                                    <div class=" clearfix card-body">


                                        <div class="post_featured">
                                            <div class="post_thumb" data-image=""
                                                data-title="Serving Cookies at Alpine Nationals">
                                                <a class="hover_icon hover_icon_link" href="{{ route('newsDetails', ['id' => $news->id]) }}">
                                                    <img alt="Serving Cookies at Alpine Nationals"
                                                        src="http://placehold.it/1170x659">
                                                </a>
                                            </div>
                                        </div>

                                        <h4 class="news-title">
                                            <a href="{{ route('newsDetails', ['id' => $news->id]) }}">{{ $news['title'] }}</a>
                                        </h4>

                                        <div class="post_descr">
                                            <p>{{ $news['img_description'] }}</p>
                                        </div>
                                        <div class="post_info mb-0 mt-0 d-flex justify-content-between">
                                            <span class="post_info_item post_info_posted">
                                                <span class="contact_icon icon-calendar-light"></span> <a
                                                    href="post-single.html" class="post_info_date">{{ \Carbon\Carbon::parse($news['created_at'])->format('M d, Y') }}
                                                  
                                                </a>
                                            </span>
                                            <span class="post_info_item post_info_posted_by"><span
                                                    class="contact_icon icon-user"></span> <a href="#"
                                                    class="post_info_author">{{ $news['user']['first_name']}} {{ $news['user']['last_name'] }}</a>
                                            </span>

                                        </div>

                                    </div>
                                </article>
                                <!-- /Post item -->
                            </div>
                        @endforeach

                    </div>
                @else
                    <h1>No Data available.</h1>
                @endif
            </div>
            <nav id="pagination" class="pagination_wrap pagination_pages">
                <span class="pager_current active ">1</span>
                <a href="#" class="">2</a>
                <a href="#" class="">3</a>
                <a href="#" class="pager_next"></a>
                <a href="#" class="pager_last"></a>
            </nav>
        </div>
        <!-- /Content -->

    </div>
    <!-- /Page content wrap -->

   
@endsection
