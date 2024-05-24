@extends('frontend.layouts.main')
@section('main-container')
    <!-- Top panel -->
    <section class="top_panel_image">
        <div class="top_panel_image_hover"></div>
        <div class="content_wrap">
            <div class="top_panel_image_header">
                <h1 class="top_panel_image_title">Achievements</h1>
                <div class="breadcrumbs">
                    <a class="breadcrumbs_item home" href="{{ url('/') }}">Home</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current">Achievements</span>
                </div>
            </div>
        </div>
    </section>
    <!-- /Top panel -->
    <div class="container d-block" id="profile">
        <a href="#" id="editProfileButton"
            class="sc_button sc_button_square sc_button_style_filled sc_button_size_small margin_top_small margin_bottom_null">
            Edit Achievements
        </a>
        <div>
            <!-- Page content wrap -->
            <div class=" page_paddings_yes mt-5 mb-5">
                <!-- Content -->
                <div class="content">
                    <article class="post_item post_item_single_team post_featured_left team ">

                        <div class="content_wrap">

                            <div class="content">

                                @if (Auth::user())
                                    @if (Auth::user()->role == 'athlete')
                                        <div class="card profile-card">
                                            <div class="card-body ">
                                                <table class="table table-bordered profile-table">
                                                    <thead>
                                                        <th>Name</th>
                                                        <th>Year</th>
                                                        <th>Result</th>
                                                        <th>Certificate</th>

                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    
                                                
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @endif
                                @endif

                            </div>
                        </div>


                        {{-- {{ Auth::user() }} --}}



                    </article>

                </div>
                <!-- /Content -->
            </div>
            <!-- /Page content wrap -->

        </div>
    </div>

    <div class="container d-none" id="editProfile">
        <a href="#" id="backToProfileButton"
            class="sc_button sc_button_square sc_button_style_filled sc_button_size_small margin_top_small margin_bottom_null">
            Back To Achievements
        </a>
        <div>
            @include('frontend.afterAuthPages.editAchivement')
        </div>
    </div>

    <script>
        document.getElementById('editProfileButton').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('profile').classList.toggle('d-block');
            document.getElementById('profile').classList.toggle('d-none');
            document.getElementById('editProfile').classList.toggle('d-block');
            document.getElementById('editProfile').classList.toggle('d-none');
        });

        document.getElementById('backToProfileButton').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('profile').classList.toggle('d-block');
            document.getElementById('profile').classList.toggle('d-none');
            document.getElementById('editProfile').classList.toggle('d-block');
            document.getElementById('editProfile').classList.toggle('d-none');
        });
    </script>




@endsection
