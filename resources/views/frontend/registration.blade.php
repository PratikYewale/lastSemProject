@extends('frontend.layouts.main')
@section('main-container')
    <!-- Top panel -->
    <section class="top_panel_image">
        <div class="top_panel_image_hover"></div>
        <div class="content_wrap">
            <div class="top_panel_image_header">
                <h1 class="top_panel_image_title">Registration</h1>
                <div class="breadcrumbs">
                    <a class="breadcrumbs_item home" href="{{ url('/') }}">Home</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current">Registration</span>
                </div>
            </div>
        </div>
    </section>
    <!-- /Top panel -->
    @include('frontend.commonComponants.registration.registrationButtonsDivider')
    <!-- Page content wrap -->
    <div class="page_content_wrap page_paddings_yes">
        <!-- Content -->

        <!-- /Content -->
    </div>
    <!-- /Page content wrap -->
 
@endsection
