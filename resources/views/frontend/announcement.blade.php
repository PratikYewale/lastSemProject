@extends('frontend.layouts.main')
@section('main-container')
    <!-- Top panel -->
    <section class="top_panel_image">
        <div class="top_panel_image_hover"></div>
        <div class="content_wrap">
            <div class="top_panel_image_header">
                <h1 class="top_panel_image_title">Announcement</h1>
                <div class="breadcrumbs">
                    <a class="breadcrumbs_item home" href="{{ url('/') }}">Home</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current">Announcement</span>
                </div>
            </div>
        </div>
    </section>
    <!-- /Top panel -->
    <!-- Page content wrap -->
    <div class="page_content_wrap page_paddings_yes">
        <!-- Content -->
        <div class="content">
            <article class="post_item post_item_single_team post_featured_left team">
                <!-- Single team info -->
                {{-- <div class="content_wrap">
                    <section class="post_featured single_team_post_featured">
                        <div class="post_thumb" data-image="http://placehold.it/840x800" data-title="Shannon Lorenz">
                            <a class="hover_icon hover_icon_view" href="http://placehold.it/840x800" title="Shannon Lorenz">
                                <img alt="Shannon Lorenz" src="http://placehold.it/570x542">
                            </a>
                        </div>
                    </section>
                    <section class="single_team_post_description">
                        <h2 class="team_title">Announcement Of SSI</h2>

                        <div class="team_meta"></div>
                        <div class="team_brief_info">
                            <div class="team_brief_info_text">
                                <p>Ski and Snowboard India encompass a variety of Sport Announcement, Development
                                    Announcement and Competitions, all aimed at developing athletes and supporting coaches,
                                    officials, parents, and volunteers while accomplishing the vision and mission to make
                                    the India the "Best in the World" in Olympic skiing and snowboarding. </p>
                            </div>
                        </div>
                        <a href="#"
                            class="sc_button sc_button_square sc_button_style_filled sc_button_size_small margin_top_small margin_bottom_null">Contact
                            Us</a>
                    </section>




                </div> --}}
                <!-- /Single team info -->


                <div class="content_wrap">
                    {{-- <h2 class="team_title text-center">Announcement News And Achievements Of SSI</h2> --}}
                    <div class="content">
                        @if ($news->count() > 0)
                            <div class="row">
                                @foreach ($news as $item)
                                    <!-- Display each news item here -->
                                    <div class="col-lg-4 mb-4">
                                        <!-- Post item -->
                                        <article class="post_item card news-card post_item_excerpt odd post">
                                            <div class="clearfix card-body">
                                                <div class="post_featured">
                                                    <div class="post_thumb" data-image="" data-title="Serving Cookies at Alpine Nationals">
                                                        <a class="hover_icon hover_icon_link" href="{{ route('announcementDetails', ['id' => $item->id]) }}">
                                                            <img alt="Serving Cookies at Alpine Nationals" src="{{ $item->primary_img ?? url('frontend/images/image-4-480x480.jpg') }}">

                                                        </a>
                                                    </div>
                                                </div>
                                                <h4 class="news-title">
                                                    <a href="{{ route('announcementDetails', ['id' => $item->id]) }}">{{ $item->title }} kjhr</a>
                                                </h4>
                                                <div class="post_descr">
                                                    <p style="whiteSpace: 'pre-wrap';">{{ $item->img_description }}</p>
                                                </div>
                                                <div class="post_info mb-0 mt-0 d-flex justify-content-between">
                                                    <span class="post_info_item post_info_posted">
                                                        <span class="contact_icon icon-calendar-light"></span>
                                                        <a href="post-single.html" class="post_info_date">{{ \Carbon\Carbon::parse($item->date)->format('M d, Y') }}</a>
                                                    </span>
                                                    <span class="post_info_item post_info_posted_by">
                                                        <span class="contact_icon icon-user"></span>
                                                        <a href="#" class="post_info_author"> @if ($item->type == 'achievements')
                                                            Achievement
                                                            @elseif ($item->type == 'announcement')
                                                            Announcement
                                                            @else
                                                            News

                                                        @endif</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </article>
                                        <!-- /Post item -->
                                    </div>
                                @endforeach
                            </div>
                            <!-- Custom Pagination -->
                            <nav id="pagination" class="pagination_wrap pagination_pages">
                                @if ($news->previousPageUrl())
                                    <a href="{{ $news->previousPageUrl() }}" class="pager_prev"></a>
                                @endif

                                @php
                                    // Calculate the range of visible page numbers
                                    $startPage = max(1, $news->currentPage() - 2);
                                    $endPage = min($startPage + 4, $news->lastPage());
                                @endphp

                                @for ($i = $startPage; $i <= $endPage; $i++)
                                    @if ($i == $news->currentPage())
                                        <span class="pager_current active">{{ $i }}</span>
                                    @else
                                        <a href="{{ $news->url($i) }}" class="pager_number">{{ $i }}</a>
                                    @endif
                                @endfor

                                @if ($news->nextPageUrl())
                                    <a href="{{ $news->nextPageUrl() }}" class="pager_next"></a>
                                @endif

                                <a href="{{ $news->url($news->lastPage()) }}" class="pager_last"></a>
                            </nav>

                            <!-- End Custom Pagination -->
                        @else
                            <h1>No Data available.</h1>
                        @endif
                    </div>
                </div>



            </article>

        </div>
        <!-- /Content -->
    </div>
    <!-- /Page content wrap -->
@endsection
