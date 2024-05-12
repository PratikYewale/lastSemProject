
<div class="content_wrap">
    <div class="sc_section">
        <div class="sc_section_inner">
            <div class="sc_section_content_wrap">

                <h2 class="sc_title sc_title_underline margin_top_null margin_bottom_tiny  pb-2">Associations</h2>
                @if (isset($associations) && count($associations) > 0)
                <div class="row">
                    @foreach ($associations as $associations)
                    <div class="col-lg-4 mb-4">
                        <div class="card association-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <img src="{{ url('frontend/images/target.png') }}" alt="" />
                                    </div>
                                    <div class="col-lg-9">
                                        <h4 class="org-name ">{{ $associations['name_of_state_unit'] }}</h4>

                                        <div class="d-flex">
                                            <div class="">
                                                <i class="icon icon-mail"></i>
                                            </div>
                                            <div class="">
                                                pranavdevkar1311@gmail.com
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    @endforeach
                 

                </div>
                @else
                <h1>No Data available.</h1>
                @endif
            </div>
        </div>
    </div>

</div>

