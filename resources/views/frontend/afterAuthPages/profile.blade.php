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

                        @if (Auth::user())
                            <table class="table table-bordered committee-table">

                                <tbody>
                                    <tr>

                                        <td>
                                            <b>
                                                First Name:
                                            </b>
                                            <span>
                                                {{ Auth::user()->first_name }}
                                            </span>
                                        </td>

                                        <td>
                                            <b>
                                                Middle Name:
                                            </b>
                                            <span>
                                                {{ Auth::user()->middle_name }}
                                            </span>
                                        </td>
                                        <td>
                                            <b>
                                                Middle Name:
                                            </b>
                                            <span>
                                                {{ Auth::user()->last_name }}
                                            </span>
                                        </td>
                                        <td rowspan="4">

                                            <span>
                                                <img class="profile-picture" src={{ Auth::user()->profile_picture }}
                                                    alt="" srcset="">
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>
                                                Date Of Birth:
                                            </b>
                                            <span>
                                                {{ Auth::user()->date_of_birth }}
                                            </span>
                                        </td>
                                        <td>
                                            <b>
                                                Contact Number:
                                            </b>
                                            <span>
                                                {{ Auth::user()->gender }}
                                            </span>
                                        </td>
                                        <td>
                                            <b>
                                                Role:
                                            </b>
                                            <b class="text-danger">
                                                {{ Auth::user()->role }}
                                            </b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>
                                                Email:
                                            </b>
                                            <span>
                                                {{ Auth::user()->email }}
                                            </span>
                                        </td>
                                        <td>
                                            <b>
                                                Contact Number:
                                            </b>
                                            <span>
                                                {{ Auth::user()->mobile_no }}
                                            </span>
                                        </td>
                                        <td>
                                            <b>
                                                Role:
                                            </b>
                                            <b class="text-danger">
                                                {{ Auth::user()->role }}
                                            </b>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>


                {{ Auth::user() }}



            </article>

        </div>
        <!-- /Content -->
    </div>
    <!-- /Page content wrap -->
@endsection
