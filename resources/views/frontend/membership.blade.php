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
                    <h2 class="team_title text-center">Announcement events And Achievements Of SSI</h2>
                    <div class="content">
                        @if ($events->count() > 0)
                            <div class="row">
                                @foreach ($events as $item)
                                    <!-- Display each events item here -->
                                    <div class="col-lg-4 mb-4">
                                        <!-- Post item -->

                                        <div class="card events-card">

                                            <div class="card-body">

                                                <table class="table events-table">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="2" class="table-title">{{ $item['title']}}</th>
                                                        </tr>
                                                        <tr>

                                                            <th class="">Name</th>
                                                            <td class="">{{ $item['title']}}</td>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th>Event Date</th>
                                                            <td>{{ \Carbon\Carbon::parse($item['start_date'])->format('d/m/Y') }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th>Address</th>
                                                            <td>{{$item['address']}}</td>
                                                        </tr>

                                                        <tr>
                                                            <th>Download PDF</th>
                                                            <td><a href="{{$item['file']}}">Click Here to Download PDF</a>{{$item['file']}}</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- /Post item -->
                                    </div>
                                @endforeach
                            </div>
                            <!-- Custom Pagination -->
                            <nav id="pagination" class="pagination_wrap pagination_pages">
                                @if ($events->previousPageUrl())
                                    <a href="{{ $events->previousPageUrl() }}" class="pager_prev"></a>
                                @endif

                                @php
                                    // Calculate the range of visible page numbers
                                    $startPage = max(1, $events->currentPage() - 2);
                                    $endPage = min($startPage + 4, $events->lastPage());
                                @endphp

                                @for ($i = $startPage; $i <= $endPage; $i++)
                                    @if ($i == $events->currentPage())
                                        <span class="pager_current active">{{ $i }}</span>
                                    @else
                                        <a href="{{ $events->url($i) }}" class="pager_number">{{ $i }}</a>
                                    @endif
                                @endfor

                                @if ($events->nextPageUrl())
                                    <a href="{{ $events->nextPageUrl() }}" class="pager_next"></a>
                                @endif

                                <a href="{{ $events->url($events->lastPage()) }}" class="pager_last"></a>
                            </nav>

                            <!-- End Custom Pagination -->
                        @else
                            <h4>No Data available.</h4>
                        @endif
                    </div>
                </div>
                <!-- /Single team info -->

            </article>






        </div>
        <!-- /Content -->
    </div>
    <!-- /Page content wrap -->
@endsection
