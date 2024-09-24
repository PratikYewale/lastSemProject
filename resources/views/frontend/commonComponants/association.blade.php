
<div class="content_wrap">
    <div class="sc_section">
        <div class="sc_section_inner">
            <div class="sc_section_content_wrap">

                <h2 class="sc_title sc_title_underline margin_top_null margin_bottom_tiny  pb-2">Associations</h2>
                @if (isset($associations) && count($associations) > 0)
                <div class="row">
                    @foreach ($associations as $associations)
                    <div class="col-lg-6 mb-4">
                        <div class="card association-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <img src="{{ url('frontend/images/target.png') }}" alt="" />
                                    </div>
                                    <div class="col-lg-9">
                                        <h4 class="org-name ">{{ $associations['first_name'] }}</h4>

                                        <div class="d-flex">
                                            <div class="">
                                                <i class="icon icon-mail"></i>
                                            </div>
                                            <div class="">
                                                {{ $associations['email'] }}
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="">
                                                <i class="icon icon-mobile"></i>
                                            </div>
                                            <div class="">
                                                {{ $associations['mobile_no'] }}
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
                <h4>No Data available.</h4>
                @endif
            </div>
        </div>
    </div>

</div>

