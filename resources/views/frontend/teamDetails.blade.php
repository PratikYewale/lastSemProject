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
        <ul class="nav nav-pills" id="pills-tab" role="tablist">
    @foreach ($team->teamprofiles as $index => $profile)
    <li class="nav-item" role="presentation">
        <a class="nav-link @if ($index == 0) active @endif"
           id="pills-{{ $index }}-tab"
           data-bs-toggle="pill"
           href="#pills-{{ $index }}"
           role="tab"
           aria-controls="pills-{{ $index }}"
           aria-selected="@if ($index == 0) true @endif">
           {{ $profile->name }}
        </a>
    </li>
    @endforeach
</ul>
        </div>

        <div >
            <div class="container text-primary mt-3">
                <b class="back-link">  <span class="sc_list_icon icon-left-small"> <a
                      href="{{ url('/teams') }}"><span class="ms-1 text-primary">Back To Teams</span></a>
                  </b>
            </div>
            <div class="container">
              <!-- Tabs Content -->
<div class="tab-content" id="pills-tabContent">
    @foreach ($team->teamprofiles as $index => $profile)
    <div class="tab-pane fade @if ($index == 0) show active @endif"
         id="pills-{{ $index }}"
         role="tabpanel"
         aria-labelledby="pills-{{ $index }}-tab">

        <h3>{{ $profile->name }} jhgf</h3>
        <div class="row">
            @foreach ($profile->teammember as $member)
            <div class="col-lg-5">
                <div class="card mb-3">
                    <div class="row g-0" style="display: flex;align-items: center;">
                        <div class="col-md-3">
                            <img src="{{ $member->users->profile_picture }}"
                                 class="img-fluid rounded-start"
                                 alt="{{ $member->users->profile_picture }}">
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <h4 class="card-title m-0">{{ $member->users->first_name }} {{ $member->users->last_name }}</h4>
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
                                    <div class="d-flex">
                                        <div class="">
                                            <p style="color:black">Designation :</p>
                                        </div>
                                        <div class="ms-2">
                                            {{ ucfirst($member->users->designation) }}
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
</div>
            </div>
        </div>

        <!-- /Content -->
    </div>
    <!-- /Page content wrap -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js">

        function scrollToTop() {
    const tabContent = document.getElementById('pills-tabContent');
    tabContent.scrollTo({ top: 0, behavior: 'smooth' });
     }
     </script>
@endsection
