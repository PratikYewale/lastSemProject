@extends('frontend.layouts.main')
@section('main-container')
    <!-- Top panel -->
    <section class="top_panel_image">
        <div class="top_panel_image_hover"></div>
        <div class="content_wrap">
            <div class="top_panel_image_header">
                <h1 class="top_panel_image_title">Events</h1>
                <div class="breadcrumbs">
                    <a class="breadcrumbs_item home" href="{{ url('/') }}">Home</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current">Events</span>
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
                <div class="content_wrap">
                    <section class="post_featured single_team_post_featured">
                        <div class="post_thumb" data-image="http://placehold.it/840x800" data-title="Shannon Lorenz">
                            <a class="hover_icon hover_icon_view" href="http://placehold.it/840x800" title="Shannon Lorenz">
                                <img alt="Shannon Lorenz" src="http://placehold.it/570x542">
                            </a>
                        </div>
                    </section>
                    <section class="single_team_post_description">
                        <h2 class="team_title">Events Of SSI</h2>
                        {{-- <h6 class="team_position">Instructor</h6> --}}
                        <div class="team_meta"></div>
                        <div class="team_brief_info">
                            <div class="team_brief_info_text">
                                <p>Ski and Snowboard India encompass a variety of Sport Events, Development
                                    Events and Competitions, all aimed at developing athletes and supporting coaches,
                                    officials, parents, and volunteers while accomplishing the vision and mission to make
                                    the India the "Best in the World" in Olympic skiing and snowboarding. </p>
                            </div>
                        </div>
                        <a href="{{ url('/contact') }}"
                            class="sc_button sc_button_square sc_button_style_filled sc_button_size_small margin_top_small margin_bottom_null">Contact
                            Us</a>
                    </section>




                </div>
                <!-- /Single team info -->

    <!--ongoing events -->
    <div class="content_wrap">
                    <h2 class="team_title text-center">Ongoing Events Of SSI</h2>
                    <div class="content">
                        @if ($ongoingEvents->count() > 0)
                            <div class="row">
                                @foreach ($ongoingEvents as $item)
                                    <!-- Display each ongoingEvents item here -->
                                    <div class="col-lg-4 mb-4">
                                        <!-- Post item -->
                                        {{-- <article class="post_item card news-card post_item_excerpt odd post">
                                            <div class="clearfix card-body">
                                                <div class="post_featured">
                                                    <div class="post_thumb" data-image="" data-title="Serving Cookies at Alpine Nationals">
                                                        <a class="hover_icon hover_icon_link" href="#">
                                                            <img alt="Serving Cookies at Alpine Nationals" src="{{ $item->primary_img ?? url('frontend/images/image-4-480x480.jpg') }}">

                                                        </a>
                                                    </div>
                                                </div>
                                                <h4 class="news-title">
                                                    <a href="#">{{ $item->title }}</a>
                                                </h4>
                                                <div class="post_descr">
                                                    <p>{{ $item->img_description }}</p>
                                                </div>
                                                <div class="post_info mb-0 mt-0 d-flex justify-content-between">
                                                    <span class="post_info_item post_info_posted">
                                                        <span class="contact_icon icon-calendar-light"></span>
                                                        <a href="post-single.html" class="post_info_date">{{ \Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</a>
                                                    </span>
                                                    <span class="post_info_item post_info_posted_by">
                                                        <span class="contact_icon icon-user"></span>
                                                        <a href="#" class="post_info_author">{{ $item->type }} </a>
                                                    </span>
                                                </div>
                                            </div>
                                        </article> --}}
                                        <div class="card committee-card">

                                            <div class="card-body">

                                                <table class="committee-table">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="2" class="table-title">{{ $item->title }}</th>
                                                        </tr>
                                                        <tr>

                                                            <th class="">Date</th>
                                                            <td class="">{{ $item->start_date }} To {{ $item->end_date }}</td>

                                                        </tr>
                                                        <tr>

                                                            <th class="">Address</th>
                                                            <td class="">{{ $item->address }}</td>

                                                        </tr>
                                                        <tr>

                                                            <th class="">Description</th>

                                                            <td class=""><a href="#" data-bs-toggle="modal" data-bs-target="#descriptionModal">View Description</a>
                                                                <div class="modal fade" id="descriptionModal" tabindex="-1" aria-labelledby="descriptionModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-5 mt-0" id="athletesFormModalLabel">{{$item->title}}</h1>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body px-5">
                                                                            {{ $item->description }}
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </td>

                                                        </tr>

                                                        <tr>

                                                            <th class="">Brochure</th>
                                                            <td class="">
                                                                <a href="{{ $item->file }}"> Click Here</a> to Download Brochure</td>

                                                        </tr>
                                                    </thead>

                                                </table>
                                            </div>
                                        </div>
                                        <!-- /Post item -->
                                    </div>
                                @endforeach
                            </div>
                            <!-- Custom Pagination -->
                            <nav id="pagination" class="pagination_wrap pagination_pages">
                                @if ($ongoingEvents->previousPageUrl())
                                    <a href="{{ $ongoingEvents->previousPageUrl() }}" class="pager_prev"></a>
                                @endif

                                @php
                                    // Calculate the range of visible page numbers
                                    $startPage = max(1, $ongoingEvents->currentPage() - 2);
                                    $endPage = min($startPage + 4, $ongoingEvents->lastPage());
                                @endphp

                                @for ($i = $startPage; $i <= $endPage; $i++)
                                    @if ($i == $ongoingEvents->currentPage())
                                        <span class="pager_current active">{{ $i }}</span>
                                    @else
                                        <a href="{{ $ongoingEvents->url($i) }}" class="pager_number">{{ $i }}</a>
                                    @endif
                                @endfor

                                @if ($ongoingEvents->nextPageUrl())
                                    <a href="{{ $ongoingEvents->nextPageUrl() }}" class="pager_next"></a>
                                @endif

                                <a href="{{ $ongoingEvents->url($ongoingEvents->lastPage()) }}" class="pager_last"></a>
                            </nav>

                            <!-- End Custom Pagination -->
                        @else
                            <h1>No Data available.</h1>
                        @endif
                    </div>
                </div>
    <!-- / Upcoming events -->
                <div class="content_wrap">
                    <h2 class="team_title text-center">Upcoming Events Of SSI</h2>
                    <div class="content">
                        @if ($upcomingEvents->count() > 0)
                            <div class="row">
                                @foreach ($upcomingEvents as $item)
                                    <!-- Display each upcomingEvents item here -->
                                    <div class="col-lg-4 mb-4">
                                        <!-- Post item -->
                                        {{-- <article class="post_item card news-card post_item_excerpt odd post">
                                            <div class="clearfix card-body">
                                                <div class="post_featured">
                                                    <div class="post_thumb" data-image="" data-title="Serving Cookies at Alpine Nationals">
                                                        <a class="hover_icon hover_icon_link" href="#">
                                                            <img alt="Serving Cookies at Alpine Nationals" src="{{ $item->primary_img ?? url('frontend/images/image-4-480x480.jpg') }}">

                                                        </a>
                                                    </div>
                                                </div>
                                                <h4 class="news-title">
                                                    <a href="#">{{ $item->title }}</a>
                                                </h4>
                                                <div class="post_descr">
                                                    <p>{{ $item->img_description }}</p>
                                                </div>
                                                <div class="post_info mb-0 mt-0 d-flex justify-content-between">
                                                    <span class="post_info_item post_info_posted">
                                                        <span class="contact_icon icon-calendar-light"></span>
                                                        <a href="post-single.html" class="post_info_date">{{ \Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</a>
                                                    </span>
                                                    <span class="post_info_item post_info_posted_by">
                                                        <span class="contact_icon icon-user"></span>
                                                        <a href="#" class="post_info_author">{{ $item->type }} </a>
                                                    </span>
                                                </div>
                                            </div>
                                        </article> --}}
                                        <div class="card committee-card">

                                            <div class="card-body">

                                                <table class="committee-table">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="2" class="table-title">{{ $item->title }}</th>
                                                        </tr>
                                                        <tr>

                                                            <th class="">Date</th>
                                                            <td class="">{{ $item->start_date }} To {{ $item->end_date }}</td>

                                                        </tr>
                                                        <tr>

                                                            <th class="">Address</th>
                                                            <td class="">{{ $item->address }}</td>

                                                        </tr>
                                                        <tr>

                                                            <th class="">Description</th>

                                                            <td class=""><a href="#" data-bs-toggle="modal" data-bs-target="#descriptionModal">View Description</a>
                                                                <div class="modal fade" id="descriptionModal" tabindex="-1" aria-labelledby="descriptionModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-5 mt-0" id="athletesFormModalLabel">{{$item->title}}</h1>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body px-5">
                                                                            {{ $item->description }}
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </td>

                                                        </tr>

                                                        <tr>

                                                            <th class="">Brochure</th>
                                                            <td class="">
                                                                <a href="{{ $item->file }}"> Click Here</a> to Download Brochure</td>

                                                        </tr>
                                                    </thead>

                                                </table>
                                            </div>
                                        </div>
                                        <!-- /Post item -->
                                    </div>
                                @endforeach
                            </div>
                            <!-- Custom Pagination -->
                            <nav id="pagination" class="pagination_wrap pagination_pages">
                                @if ($upcomingEvents->previousPageUrl())
                                    <a href="{{ $events->previousPageUrl() }}" class="pager_prev"></a>
                                @endif

                                @php
                                    // Calculate the range of visible page numbers
                                    $startPage = max(1, $upcomingEvents->currentPage() - 2);
                                    $endPage = min($startPage + 4, $upcomingEvents->lastPage());
                                @endphp

                                @for ($i = $startPage; $i <= $endPage; $i++)
                                    @if ($i == $upcomingEvents->currentPage())
                                        <span class="pager_current active">{{ $i }}</span>
                                    @else
                                        <a href="{{ $upcomingEvents->url($i) }}" class="pager_number">{{ $i }}</a>
                                    @endif
                                @endfor

                                @if ($upcomingEvents->nextPageUrl())
                                    <a href="{{ $upcomingEvents->nextPageUrl() }}" class="pager_next"></a>
                                @endif

                                <a href="{{ $upcomingEvents->url($upcomingEvents->lastPage()) }}" class="pager_last"></a>
                            </nav>

                            <!-- End Custom Pagination -->
                        @else
                            <h1>No Data available.</h1>
                        @endif
                    </div>
                </div>
    <!-- Past Events -->
            <div class="content_wrap">
                            <h2 class="team_title text-center">Past Events Of SSI</h2>
                            <div class="content">
                                @if ($pastEvents->count() > 0)
                                    <div class="row">
                                        @foreach ($pastEvents as $item)
                                            <!-- Display each pastEvents item here -->
                                            <div class="col-lg-4 mb-4">
                                                <!-- Post item -->
                                                {{-- <article class="post_item card news-card post_item_excerpt odd post">
                                                    <div class="clearfix card-body">
                                                        <div class="post_featured">
                                                            <div class="post_thumb" data-image="" data-title="Serving Cookies at Alpine Nationals">
                                                                <a class="hover_icon hover_icon_link" href="#">
                                                                    <img alt="Serving Cookies at Alpine Nationals" src="{{ $item->primary_img ?? url('frontend/images/image-4-480x480.jpg') }}">

                                                                </a>
                                                            </div>
                                                        </div>
                                                        <h4 class="news-title">
                                                            <a href="#">{{ $item->title }}</a>
                                                        </h4>
                                                        <div class="post_descr">
                                                            <p>{{ $item->img_description }}</p>
                                                        </div>
                                                        <div class="post_info mb-0 mt-0 d-flex justify-content-between">
                                                            <span class="post_info_item post_info_posted">
                                                                <span class="contact_icon icon-calendar-light"></span>
                                                                <a href="post-single.html" class="post_info_date">{{ \Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</a>
                                                            </span>
                                                            <span class="post_info_item post_info_posted_by">
                                                                <span class="contact_icon icon-user"></span>
                                                                <a href="#" class="post_info_author">{{ $item->type }} </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </article> --}}
                                                <div class="card committee-card">

                                                    <div class="card-body">

                                                        <table class="committee-table">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="2" class="table-title">{{ $item->title }}</th>
                                                                </tr>
                                                                <tr>

                                                                    <th class="">Date</th>
                                                                    <td class="">{{ $item->start_date }} To {{ $item->end_date }}</td>

                                                                </tr>
                                                                <tr>

                                                                    <th class="">Address</th>
                                                                    <td class="">{{ $item->address }}</td>

                                                                </tr>
                                                                <tr>

                                                                    <th class="">Description</th>

                                                                    <td class=""><a href="#" data-bs-toggle="modal" data-bs-target="#descriptionModal">View Description</a>
                                                                        <div class="modal fade" id="descriptionModal" tabindex="-1" aria-labelledby="descriptionModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h1 class="modal-title fs-5 mt-0" id="athletesFormModalLabel">{{$item->title}}</h1>
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body px-5">
                                                                                    {{ $item->description }}
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    </td>

                                                                </tr>

                                                                <tr>

                                                                    <th class="">Result</th>
                                                                    <td class="">
                                                                        <a href="{{ $item->file }}"> Click Here</a> to View Result</td>

                                                                </tr>
                                                            </thead>

                                                        </table>
                                                    </div>
                                                </div>
                                                <!-- /Post item -->
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- Custom Pagination -->
                                    <nav id="pagination" class="pagination_wrap pagination_pages">
                                        @if ($pastEvents->previousPageUrl())
                                            <a href="{{ $events->previousPageUrl() }}" class="pager_prev"></a>
                                        @endif

                                        @php
                                            // Calculate the range of visible page numbers
                                            $startPage = max(1, $pastEvents->currentPage() - 2);
                                            $endPage = min($startPage + 4, $pastEvents->lastPage());
                                        @endphp

                                        @for ($i = $startPage; $i <= $endPage; $i++)
                                            @if ($i == $pastEvents->currentPage())
                                                <span class="pager_current active">{{ $i }}</span>
                                            @else
                                                <a href="{{ $pastEvents->url($i) }}" class="pager_number">{{ $i }}</a>
                                            @endif
                                        @endfor

                                        @if ($pastEvents->nextPageUrl())
                                            <a href="{{ $pastEvents->nextPageUrl() }}" class="pager_next"></a>
                                        @endif

                                        <a href="{{ $pastEvents->url($pastEvents->lastPage()) }}" class="pager_last"></a>
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
