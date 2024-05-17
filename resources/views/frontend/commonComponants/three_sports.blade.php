            <!-- Snowboard Schools -->
            <div class="hp_schools_section">
                <div class="content_wrap">
                    <div class="custom_title_1 text_align_center">From Our Teams</div>
                    <div class="sc_services_wrap">
                        <div
                            class="sc_services sc_services_style_services-3 sc_services_type_icons title_center width_100_per">
                            <h2 class="sc_services_title sc_item_title sc_item_title_with_descr">
                                Teams</h2>
                            <div class="sc_services_descr sc_item_descr">Skiing and snowboarding still
                                rank among the undisputed winter sport highlights for all ages and
                                ability levels. The perfectly groomed ski slopes makes a real heaven for
                                skiers and riders. Our professional ski and snowboard instructors can
                                show you all the little details while improving your skiing techniques
                                and riding skills.</div>
                            @if (isset($games) && count($games) > 0)
                                <div class="sc_columns columns_wrap row">
                                    @foreach ($games as $game)
                                        <div class="col-lg-4 column_padding_bottom">
                                            <div class="sc_services_item sc_services_item_1 odd first">
                                                <div class="sc_services_item_featured post_featured">
                                                    <div class="post_thumb" data-image=""
                                                        data-title="Private Lessons for Beginners">
                                                        <a class="hover_icon hover_icon_link"
                                                            href={{route('teamDetails', ['id' => $game->id])}}>
                                                            <img alt="service_image_4.png"
                                                                src= {{ $game['primary_img'] }}>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="sc_services_item_content">
                                                    <h4 class="sc_services_item_subtitle"> {{ $game['description'] }}
                                                    </h4>
                                                    <h4 class="sc_services_item_title">
                                                        <a href={{route('teamDetails', ['id' => $game->id])}}> {{ $game['name'] }}</a>
                                                    </h4>

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
            <!-- /Snowboard Schools -->
