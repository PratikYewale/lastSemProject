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
    <div class=" page_paddings_yes">
        <!-- Content -->
        <div class="bg-primery">

            <ul class="nav nav-pills mb-3 d-flex justify-content-around" id="pills-tab" role="tablist">
                @php
                    $uniqueProfiles = $team->teammembers->pluck('team_profile')->unique();
                @endphp
                @foreach ($team->teamprofiles as $index => $profile)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link @if ($index == 0) active @endif"
                            id="pills-{{ $index }}-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-{{ $index }}" href="#" role="tab"
                            aria-controls="pills-{{ $index }}"
                            aria-selected="@if ($index == 0) true @endif">{{ $profile->name }}</a>
                    </li>
                @endforeach

            </ul>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="container">
            @foreach ($team->teamprofiles as $index => $profile)
                <div class="tab-pane fade @if ($index == 0) show active @endif"
                    id="pills-{{ $index }}" role="tabpanel" aria-labelledby="pills-{{ $index }}-tab"
                    tabindex="0">
                    
                    <h3>{{ $profile->name }}</h3>
                    <div class="row">
                        @foreach ($profile->teammember as $member)
                            <div class="col-lg-5">
                         
                                <div class="card mb-3">
                                    <div class="row g-0">
                                        <div class="col-md-3">
                                            <img src="{{ $member->users->profile_picture }}"
                                                class="img-fluid rounded-start"
                                                alt="{{ $member->users->profile_picture }}">
                                        </div>
                                        <div class="col-md-9">
                                            <div class="card-body">
                                                <h4 class="card-title m-0">{{ $member->users->first_name }}
                                                    {{ $member->users->last_name }}</h4>
                                                <div class="card-text">
                                                    <div class="d-flex">
                                                        <div class="">
                                                            <i class="icon icon-mail"></i>
                                                        </div>
                                                        <div class="ms-2">
                                                            {{ $member->users->email }}
                                                        </div>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="">
                                                            <i class="icon icon-calendar-light"></i>
                                                        </div>
                                                        <div class="ms-2">
                                                            {{ $member->users->date_of_birth }}
                                                        </div>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="">
                                                            <i class="icon icon-location-1"></i>
                                                        </div>
                                                        <div class="ms-2">
                                                            {{ $member->users->city }}, {{ $member->users->state }}
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
 
                </div>
            @endforeach
</div
        </div>
        <!-- /Content -->
    </div>
    <!-- /Page content wrap -->
@endsection
