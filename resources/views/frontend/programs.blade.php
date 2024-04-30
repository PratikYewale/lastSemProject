@extends('frontend.layouts.main')
@section('main-container')
         <!-- Top panel -->
         <section class="top_panel_image">
            <div class="top_panel_image_hover"></div>
            <div class="content_wrap">
                <div class="top_panel_image_header">
                    <h1 class="top_panel_image_title">Programs</h1>
                    <div class="breadcrumbs">
                        <a class="breadcrumbs_item home" href="{{ url('/') }}">Home</a>
                        <span class="breadcrumbs_delimiter"></span>
                        <span class="breadcrumbs_item current">Programs</span>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Top panel -->
        @endsection