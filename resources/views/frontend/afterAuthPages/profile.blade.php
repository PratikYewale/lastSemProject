@extends('frontend.layouts.main')
@section('main-container')
    <!-- Top panel -->
    <section class="top_panel_image">
        <div class="top_panel_image_hover"></div>
        <div class="content_wrap">
            <div class="top_panel_image_header">
                <h1 class="top_panel_image_title">Profile</h1>
                <div class="breadcrumbs">
                    <a class="breadcrumbs_item home" href="{{ url('/') }}">Home</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current">Profile</span>
                </div>
            </div>
        </div>
    </section>
    <!-- /Top panel -->
    <div class="container d-block" id="profile">
        <a href="#" id="editProfileButton"
            class="sc_button sc_button_square sc_button_style_filled sc_button_size_small margin_top_small margin_bottom_null">
            Edit Profile
        </a>
        <div>
            @include('frontend.afterAuthPages.userProfile')
        </div>
    </div>
    
    <div class="container d-none" id="editProfile">
        <a href="#" id="backToProfileButton"
            class="sc_button sc_button_square sc_button_style_filled sc_button_size_small margin_top_small margin_bottom_null">
           Back To Profile
        </a>
        <div>
            @include('frontend.afterAuthPages.editProfile')
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
