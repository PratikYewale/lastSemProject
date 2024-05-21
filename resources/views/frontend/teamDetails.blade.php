@extends('frontend.layouts.main')
@section('main-container')
    <!-- Top panel -->
    <section class="top_panel_image">
        <div class="top_panel_image_hover"></div>
        <div class="content_wrap">
            <div class="top_panel_image_header">
                <h1 class="top_panel_image_title">{{ $team->name }}</h1>
                <div class="breadcrumbs">
                    <a class="breadcrumbs_item home" href="{{ url('/team') }}">Team</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current">{{ $team->name }}</span>
                </div>
            </div>
        </div>
    </section>
    <!-- /Top panel -->

    <!-- Page content wrap -->
    <div class="page_content_wrap page_paddings_yes">
        <!-- Content -->
        <div class="bg-primery">

            <ul class="nav nav-pills mb-3 d-flex justify-content-around" id="pills-tab" role="tablist">
                @php
                    $uniqueProfiles = $team->teammembers->pluck('team_profile')->unique();
                @endphp
                @foreach ($team->teammembers as $index => $member)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link @if ($index == 0) active @endif"
                            id="pills-{{ $index }}-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-{{ $index }}" href="#" role="tab"
                            aria-controls="pills-{{ $index }}"
                            aria-selected="@if ($index == 0) true @endif">{{ $member['team_profile'] }}</a>
                    </li>
                @endforeach

            </ul>
        </div>
        <div class="tab-content" id="pills-tabContent">

            @foreach ($team->teammembers as $index => $member)
                <div class="tab-pane fade @if ($index == 0) show active @endif"
                    id="pills-{{ $index }}" role="tabpanel" aria-labelledby="pills-{{ $index }}-tab"
                    tabindex="0">
                    <h3>{{ $member['users']['first_name'] }}</h3>
                    <p>Email: {{ $member['users']['email'] }}</p>
                    <p>Mobile No: {{ $member['users']['mobile_no'] }}</p>
                    <!-- Add more fields as necessary -->
                </div>
            @endforeach
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                tabindex="0">
                @include('frontend.commonComponants.registration.athletesRegistration')
            </div>
        </div>
        <!-- /Content -->
    </div>
    <!-- /Page content wrap -->
@endsection
