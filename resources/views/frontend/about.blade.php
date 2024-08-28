@extends('frontend.layouts.main')
<link rel="stylesheet" href="js/vendor/swiper/swiper.min.css" type="text/css" media="all" />
@section('main-container')

    <!-- Top panel -->
    <section class="top_panel_image">
        <!-- <div class="top_panel_image_hover"></div> -->
        <div class="content_wrap">
            <div class="top_panel_image_header">
                <h1 class="top_panel_image_title">ABOUT US</h1>
                <div class="breadcrumbs">
                    <a class="breadcrumbs_item home" href="index.html">Home</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current">ABOUT US</span>
                </div>
            </div>
        </div>
    </section>
    <p>The current URL is: {{url()->current()}}</p>‌

    <!-- /Top panel -->
    <div class="page_content_wrap page_paddings_no">
        <!-- Content -->
        <div class="content">
            <article class="post_item post_item_single page">
                <section class="post_content">
                    <!-- Greeting -->
                    <div class="content_wrap">
                        <div
                            class="row columns_wrap sc_columns columns_nofluid sc_columns_count_2 columns_1_2_xs margin_top_large">
                            <div class="col-lg-6 sc_column_item sc_column_item_1 odd first">
                                <figure class="sc_image sc_image_shape_square">
                                    <img src="{{ url('frontend/images/heading.png') }}" alt="" />
                                </figure>
                            </div>
                            <div class="col-lg-6 sc_column_item sc_column_item_2 even">
                                <div class="sc_section">
                                    <div class="sc_section_inner">
                                        <div class="sc_section_content_wrap">
                                            <!-- <h5 class="sc_title sc_title_regular margin_top_null margin_bottom_tiny">HELLO
                                            </h5> -->
                                            <h2 class="sc_title sc_title_underline margin_top_null margin_bottom_null">Ski
                                                and Snowboard India (SSI) </h2>
                                            <p class="margin_top_1_5em margin_bottom_tiny">Ski and Snowboard India (SSI) is
                                                the National Sports Association governing sport disciplines under the
                                                International Ski Federation (FIS) in the territory of India. SSI is also a
                                                recognised member of the Indian Olympic Association <br>

                                            </p>
                                            <a href="{{ url('/contact') }}"
                                                class="sc_button sc_button_square sc_button_style_filled sc_button_size_small margin_top_small margin_bottom_null">Contact
                                                Us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Greeting -->
                    <!-- Vision Mission -->
                    <div class="content_wrap">
                        <div class="sc_skills sc_skills_counter margin_top_large margin_bottom_medium" data-type="counter"
                            data-caption="Skills">

                            <div class="columns_wrap sc_skills_columns sc_skills_columns_4 row">
                                <div class="sc_skills_column col-lg-6">
                                    <div class="sc_skills_item sc_skills_style_2 odd first">
                                        <!-- <div class=""> <img alt=""
                                                src="{{ url('frontend/images/target.png') }}">
                                        </div> -->
                                        <div class="sc_skills_count"></div>
                                        <div class="sc_skills_info">
                                            <div class="sc_skills_label" style='font-size:20px;font-weight:bold'>Mission </div>
                                            <div class="sc_skills_addinfo">The mission of the National Sport Federation of
                                                Ski and Snowboard India is to promote and develop skiing and snowboarding as
                                                accessible and popular sports throughout India. </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sc_skills_column col-lg-6">
                                    <div class="sc_skills_item sc_skills_style_2 even">
                                        <!-- <div class=""><img alt=""
                                                src="{{ url('frontend/images/vision.png') }}">
                                        </div> -->
                                        <div class="sc_skills_count"></div>
                                        <div class="sc_skills_info">
                                            <div class="sc_skills_label" style='font-size:20px;font-weight:bold'>Vision</div>
                                            <div class="sc_skills_addinfo">Their vision is to create a vibrant skiing and
                                                snowboarding community that fosters talent, encourages participation, and
                                                achieves excellence on both national and international levels.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sc_skills sc_skills_counter margin_top_large margin_bottom_medium" data-type="counter"
                            data-caption="Skills">
                            <h4 class="sc_title sc_title_regular margin_top_null margin_bottom_tiny">Key goals and
                                objectives of the association in promoting skiing and snowboarding in India include:</h4>
                            <div class="columns_wrap sc_skills_columns sc_skills_columns_4 row">

                                <div class="sc_skills_column col-lg-4 mt-3">
                                    <div class="sc_skills_item sc_skills_style_2 odd first">
                                        <div class="sc_skills_total" data-start="1" data-stop="1" data-step="1"
                                            data-max="1" data-speed="36" data-duration="3600" data-ed="">1</div>
                                        <div class="sc_skills_count"></div>
                                        <div class="sc_skills_info">
                                            <div class="sc_skills_label">Development of Infrastructure</div>
                                            <div class="sc_skills_addinfo">To facilitate the establishment and improvement
                                                of ski resorts, training facilities, and infrastructure for skiing and
                                                snowboarding across different regions of India.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sc_skills_column col-lg-4 mt-3">
                                    <div class="sc_skills_item sc_skills_style_2 even">
                                        <div class="sc_skills_total" data-start="2" data-stop="2" data-step="2"
                                            data-max="2" data-speed="26" data-duration="676" data-ed="">2</div>
                                        <div class="sc_skills_count"></div>
                                        <div class="sc_skills_info">
                                            <div class="sc_skills_label">Talent Identification and Development</div>
                                            <div class="sc_skills_addinfo">To identify and nurture young talent in skiing
                                                and snowboarding through grassroots programs, talent scouting initiatives,
                                                and training camps, with the aim of developing future champions.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sc_skills_column col-lg-4 mt-3">
                                    <div class="sc_skills_item sc_skills_style_2 odd">
                                        <div class="sc_skills_total" data-start="3" data-stop="3" data-step="3"
                                            data-max="3" data-speed="25" data-duration="2658" data-ed="">3</div>
                                        <div class="sc_skills_count"></div>
                                        <div class="sc_skills_info">
                                            <div class="sc_skills_label">Education and Coaching</div>
                                            <div class="sc_skills_addinfo">To provide quality coaching and educational
                                                programs for athletes, coaches, and officials at all levels, enhancing
                                                skills, knowledge, and professionalism within the skiing and snowboarding
                                                community.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sc_skills_column col-lg-4 mt-3">
                                    <div class="sc_skills_item sc_skills_style_2 even">
                                        <div class="sc_skills_total" data-start="4" data-stop="4" data-step="4"
                                            data-max="4" data-speed="28" data-duration="93" data-ed="">4</div>
                                        <div class="sc_skills_count"></div>
                                        <div class="sc_skills_info">
                                            <div class="sc_skills_label">Competitions and Events</div>
                                            <div class="sc_skills_addinfo">To organize and support a calendar of national
                                                and regional skiing and snowboarding competitions, events, and
                                                championships, providing opportunities for athletes to showcase their talent
                                                and progress.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sc_skills_column col-lg-4 mt-3 ">
                                    <div class="sc_skills_item sc_skills_style_2 odd first">
                                        <div class="sc_skills_total" data-start="5" data-stop="5" data-step="5"
                                            data-max="5" data-speed="36" data-duration="3600" data-ed="">5</div>
                                        <div class="sc_skills_count"></div>
                                        <div class="sc_skills_info">
                                            <div class="sc_skills_label">Promotion and Awareness</div>
                                            <div class="sc_skills_addinfo">To raise awareness about skiing and snowboarding
                                                as exciting and inclusive sports, promoting participation among people of
                                                all ages and backgrounds through marketing campaigns, outreach programs, and
                                                media engagement.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sc_skills_column col-lg-4 mt-3 ">
                                    <div class="sc_skills_item sc_skills_style_2 even">
                                        <div class="sc_skills_total" data-start="6" data-stop="6" data-step="6"
                                            data-max="6" data-speed="26" data-duration="676" data-ed="">6</div>
                                        <div class="sc_skills_count"></div>
                                        <div class="sc_skills_info">
                                            <div class="sc_skills_label">International Representation</div>
                                            <div class="sc_skills_addinfo">To represent India effectively at international
                                                skiing and snowboarding competitions, fostering international collaboration,
                                                participation, and success on the global stage.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sc_skills_column col-lg-4 mt-3 collapse" id="collapse2">
                                    <div class="sc_skills_item sc_skills_style_2 odd">
                                        <div class="sc_skills_total" data-start="7" data-stop="7" data-step="7"
                                            data-max="7" data-speed="25" data-duration="2658" data-ed="">7</div>
                                        <div class="sc_skills_count"></div>
                                        <div class="sc_skills_info">
                                            <div class="sc_skills_label">Safety and Sustainability</div>
                                            <div class="sc_skills_addinfo">To prioritize safety measures and sustainable
                                                practices in skiing and snowboarding activities, ensuring the well-being of
                                                participants and the preservation of natural environments.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sc_skills_column col-lg-4 mt-3 collapse" id="collapse2">
                                    <div class="sc_skills_item sc_skills_style_2 even">
                                        <div class="sc_skills_total" data-start="8" data-stop="8" data-step="8"
                                            data-max="8" data-speed="28" data-duration="93" data-ed="">8</div>
                                        <div class="sc_skills_count"></div>
                                        <div class="sc_skills_info">
                                            <div class="sc_skills_label">Partnerships and Collaboration</div>
                                            <div class="sc_skills_addinfo">To establish partnerships with government
                                                agencies, private organizations, sponsors, and other stakeholders to support
                                                the growth and development of skiing and snowboarding in India through
                                                shared resources, expertise, and initiatives.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 collapse" id="collapse2">By pursuing these goals and objectives, the National
                                Sport Federation of
                                Ski and Snowboard India aims to cultivate a thriving skiing and snowboarding culture in
                                India, enriching the lives of individuals, communities, and the nation as a whole.</div>
                        </div>
                        <div class="">
                            <a class="sc_button sc_button_square sc_button_style_filled sc_button_size_small margin_top_small margin_bottom_null"
                                href="#" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2"
                                id="collapseData2" onclick="toggleCollapse('collapseData2', 'collapse2')">Read More</a>
                        </div>
                    </div>
                    <!-- /Vision Mission -->
                    <!-- Promo -->
                    <div class="content_wrap mb-5">
                        <div class="sc_promo margin_top_large sc_promo_size_large">
                            <div class="sc_promo_inner">
                                <div class="sc_promo_image promo_image_1 width_60_per pos_right_0"></div>
                                <div class="sc_promo_block sc_align_left width_40_per float_left">
                                    <div class="sc_promo_block_inner">
                                        <h6 class="sc_promo_subtitle sc_item_subtitle">History</h6>
                                        <h3 class="sc_promo_title sc_item_title sc_item_title_with_descr">Ski and Snowboard
                                            India (SSI)</h3>
                                        <div class="sc_promo_line"></div>
                                        <div class="sc_promo_descr sc_item_descr">
                                            <p>Skiing and snowboarding in India have a relatively recent history compared to
                                                countries with a longer tradition of winter sports. However, the development
                                                of these activities in India has been marked by notable achievements and
                                                growing interest over the years.</p>
                                            <p class="collapse" id="collapse3">Skiing and snowboarding in India have their
                                                origins in the picturesque mountain regions of the Himalayas, where snowfall
                                                during the winter months provides ideal conditions for these sports. The
                                                introduction of skiing to India can be traced back to the early 20th century
                                                when British colonial officers and explorers first engaged in skiing
                                                activities in the mountainous regions of Northern India.</p>
                                            <p class="collapse" id="collapse3">The establishment of ski resorts in regions
                                                such as Gulmarg in Jammu and Kashmir, Auli in Uttarakhand, and Manali in
                                                Himachal Pradesh played a significant role in popularizing skiing as a
                                                recreational activity in India. These resorts began offering ski lessons,
                                                equipment rentals, and guided tours, attracting tourists and adventure
                                                enthusiasts from both India and abroad.</p>
                                            <p class="collapse" id="collapse3">India's participation in international
                                                skiing events began to gain momentum in the latter half of the 20th century.
                                                Indian athletes started representing the country at international skiing
                                                competitions, including the Winter Olympics, World Championships, and Asian
                                                Winter Games</p>
                                                <a class="" href="#" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3"
                                                id="collapseData3" onclick="toggleCollapse('collapseData3', 'collapse3')">Read More</a>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Promo -->
                    {{-- org team --}}
                    <!-- Crew -->
                    <div class="hp_crew_section">
                        <div class="content_wrap">
                            <div class="custom_title_1 text_align_center">Team</div>
                            <div class="sc_section title_center">
                                <div class="sc_section_inner">
                                    <h2 class="sc_section_title sc_item_title sc_item_title_without_descr">Core Committee</h2>
                                    <div class="sc_section_content_wrap">
                                        <div class="sc_team_wrap margin_top_small">
                                            <div class="sc_team sc_team_style_team-3 title_center width_100_per">
                                                <div class="row">
                                                    <div class="col-lg-12 mb-4">
                                                        <!-- Post author -->

                                                        <div class="row d-flex justify-content-between align-items-center">
                                                            <div class="col-lg-4 ">
                                                                <img class="about-team-profile-pic" alt="" src="{{ url('frontend/images/shiva.jpg') }}" />
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <h5 class="org-member-name mt-auto">Mr.Shiva Keshavan</h5>
                                                                <h6 class="org-member-role mb-2 text-muted">Chairman</h6>
                                                                <p class="card-text">Mr Shiva Keshavan is an avid skier and
                                                                    won several medals at
                                                                    the national lever in skiing before transitionint to
                                                                    Luge, where he set the
                                                                    world record for youngest ever Olympic Athlete. He is a
                                                                    a 6 time Olympian and 4
                                                                    time asian champion and was awarded the Arjuna award by
                                                                    the president of India
                                                                    in 2019. He is a member of the Indian Olympic
                                                                    Association and Olympic Council of
                                                                    Asia Athletes Commissions. He served as a member of the
                                                                    IOA ethics commission
                                                                    from 2018 to 2022. He was Appointed as the Chairman of
                                                                    the Ad Hoc Committee, Ski
                                                                    and Snowboard India in October 2023. </p>

                                                            </div>
                                                        </div>


                                                        <!-- /Post author -->
                                                    </div>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col-lg-12 mb-4">
                                                        <!-- Post author -->

                                                        <div class="row d-flex justify-content-between align-items-center">

                                                            <div class="col-lg-8">
                                                                <h5 class="org-member-name mt-auto">Mrs. Bhavani TN </h5>
                                                                <h6 class="org-member-role mb-2 text-muted">Member</h6>
                                                                <p class="card-text">Mrs Bhavani TN Has been the most
                                                                    successful nordic ski athlete
                                                                    in India. She won 3 Gold Medals in the 2024 Khelo India
                                                                    winter Games and has
                                                                    represented the country in the 2023 World Championships
                                                                    as well as Several
                                                                    international (FIS) races round the world. She comes
                                                                    from the Coorg area in
                                                                    Karnataka, known for its elite sporting tradition and is
                                                                    an avid mountaineer.
                                                                </p>

                                                            </div>
                                                            <div class="col-lg-4 text-lg-end">
                                                                <img class="about-team-profile-pic" alt="" src="{{ url('frontend/images/Bhavani.jpg') }}" />
                                                            </div>
                                                        </div>


                                                        <!-- /Post author -->
                                                    </div>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col-lg-12 mb-4">
                                                        <!-- Post author -->

                                                        <div class="row d-flex justify-content-between align-items-center">
                                                            <div class="col-lg-4 ">
                                                                <img class="about-team-profile-pic" alt="" src="{{ url('frontend/images/Arif.jpg') }}" />
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <h5 class="org-member-name mt-auto">Mr. Arif Mohd Khan
                                                                </h5>
                                                                <h6 class="org-member-role mb-2 text-muted">Member</h6>
                                                                <p class="card-text">Mr Arif Mohd Khan is an Olympic
                                                                    Athlete in the Slalom and
                                                                    Giant Slalom Disciplines of Alpine Skiing. He became the
                                                                    first Indian to win a
                                                                    GOld medal at an international (FIS) Event in 2023. He
                                                                    is also involved in the
                                                                    development of Skiing in his home town of Gulmarg in
                                                                    Jammu and Kashmir that has
                                                                    become a well known ski destination among enthusiasts
                                                                    from all over the world
                                                                </p>

                                                            </div>
                                                        </div>


                                                        <!-- /Post author -->
                                                    </div>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col-lg-12 mb-4">
                                                        <!-- Post author -->

                                                        <div class="row d-flex justify-content-between align-items-center">

                                                            <div class="col-lg-8">
                                                                <h5 class="org-member-name mt-auto">Ms Jelena Dojcinovic
                                                                </h5>
                                                                <h6 class="org-member-role mb-2 text-muted">Independent
                                                                    Observer</h6>
                                                                <p class="card-text">Ms Jelena Dojcinovic is the Appointed
                                                                    independent observe by
                                                                    the International Ski Federation (FIS). FIS is the
                                                                    governing body for
                                                                    international skiing and snowboarding, founded in 1924
                                                                    during the first Olympic
                                                                    Games in Chamonix, France. Recognized by the
                                                                    International Olympic Committee
                                                                    (IOC), FIS manages the Olympic disciplines of Alpine
                                                                    Skiing, Cross-Country
                                                                    Skiing, Ski Jumping, Nordic Combined, Freestyle Skiing
                                                                    and Snowboarding,
                                                                    including setting the international competition rules.
                                                                    Through its 128 member
                                                                    nations, more than '500 FIS ski and snowboard
                                                                    competitions are staged annually
                                                                </p>

                                                            </div>
                                                            <div class="col-lg-4 text-lg-end">
                                                                <img alt="" class="about-team-profile-pic" src="{{ url('frontend/images/org_2.svg') }}" />
                                                            </div>
                                                        </div>


                                                        <!-- /Post author -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('frontend.commonComponants.committee')
                    @include('frontend.commonComponants.association')

                    <div class="content_wrap">
                            <div class="custom_title_1 text_align_center">Our Constitution</div>
                            <div class="sc_section title_center">
                                <div class="sc_section_inner">
                                    <h2 class="sc_section_title sc_item_title sc_item_title_without_descr">Our Constitution</h2>
                                </div>
                                <div class=" mb-4">
                                 <div class="d-flex justify-content-center">
                                  <a href="{{ url('frontend/images/ahcpdf.pdf') }}" target="_blank" download  class="sc_button sc_button_square sc_button_style_filled sc_button_size_small  margin_bottom_null mb-10">
                                     Download Constitution
                                 </a>
                                 </div>



                                     </div>
                                <!-- <div class='row'>
                                    <div class='col-lg-3'>
                                    <a href="{{ url('frontend/images/ahcpdf.pdf') }}" target="_blank"
                                                    download>

                                                    <img src="{{ url('frontend/images/logo1.png') }}"
                                                        alt="">
                                                    </a>
                                    </div>
                                </div> -->
                            </div>
                    </div>

                </section>

            </article>
        </div>
        <!-- /Content -->
    </div>
@endsection
