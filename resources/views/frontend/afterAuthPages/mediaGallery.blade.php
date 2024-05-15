@extends('frontend.layouts.main')
@section('main-container')
    <!-- Top panel -->
    <section class="top_panel_image">
        <div class="top_panel_image_hover"></div>
        <div class="content_wrap">
            <div class="top_panel_image_header">
                <h1 class="top_panel_image_title">Media Gallery</h1>
                <div class="breadcrumbs">
                    <a class="breadcrumbs_item home" href="{{ url('/') }}">Home</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current">Media Gallery</span>
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
                <div class="content_wrap">
                 
                    <div class="content">
                        @if ($gallery->count() > 0)
                            <div class="row">
                                @foreach ($gallery as $item)
                                    <!-- Display each gallery item here -->
                                    <div class="col-lg-4 mb-4">
                                        <!-- Post item -->
                                        <article class="post_item card gallery-card post_item_excerpt odd post">
                                            <div class="clearfix card-body">
                                                <div class="post_featured">
                                                    <div class="post_thumb" data-image="" data-title="Serving Cookies at Alpine Nationals">
                                                        <a class="hover_icon hover_icon_link" href="{{ route('newsDetails', ['id' => $item->id]) }}">
                                                            <img alt="Serving Cookies at Alpine Nationals" src="http://placehold.it/1170x659">
                                                        </a>
                                                    </div>
                                                </div>
                                          
                                            </div>
                                        </article>
                                        <!-- /Post item -->
                                    </div>
                                @endforeach
                            </div>
                            <!-- Custom Pagination -->
                            <nav id="pagination" class="pagination_wrap pagination_pages">
                                @if ($gallery->previousPageUrl())
                                    <a href="{{ $gallery->previousPageUrl() }}" class="pager_prev"></a>
                                @endif
                                
                                @php
                                    // Calculate the range of visible page numbers
                                    $startPage = max(1, $gallery->currentPage() - 2);
                                    $endPage = min($startPage + 4, $gallery->lastPage());
                                @endphp
                                
                                @for ($i = $startPage; $i <= $endPage; $i++)
                                    @if ($i == $gallery->currentPage())
                                        <span class="pager_current active">{{ $i }}</span>
                                    @else
                                        <a href="{{ $gallery->url($i) }}" class="pager_number">{{ $i }}</a>
                                    @endif
                                @endfor
                            
                                @if ($gallery->nextPageUrl())
                                    <a href="{{ $gallery->nextPageUrl() }}" class="pager_next"></a>
                                @endif
                                
                                <a href="{{ $gallery->url($gallery->lastPage()) }}" class="pager_last"></a>
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
