@extends('frontend.layouts.main')
<link rel="stylesheet" href="js/vendor/swiper/swiper.min.css" type="text/css" media="all" />
@section('main-container')
    <!-- Top panel -->
    <section class="top_panel_image">
        <div class="top_panel_image_hover"></div>
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
    <!-- /Top panel -->
    <div class="page_content_wrap page_paddings_no">
        <!-- Content -->
        <div class="content">
            <article class="post_item post_item_single page">
                <section class="post_content">
                    <!-- Greeting -->
                    <div class="content_wrap">
                        <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2 columns_1_2_xs margin_top_large">
                            <div class="column-1_2 sc_column_item sc_column_item_1 odd first">
                                <figure class="sc_image sc_image_shape_square">
                                    <img src="{{ url('frontend/images/depositphotos-86257350-570.png') }}" alt="" />
                                </figure>
                            </div><div class="column-1_2 sc_column_item sc_column_item_2 even">
                                <div class="sc_section">
                                    <div class="sc_section_inner">
                                        <div class="sc_section_content_wrap">
                                            <h5 class="sc_title sc_title_regular margin_top_null margin_bottom_tiny">HELLO</h5>
                                            <h2 class="sc_title sc_title_underline margin_top_null margin_bottom_null">Ski and Snowboard India (SSI) </h2>
                                            <p class="margin_top_1_5em margin_bottom_tiny">Ski and Snowboard India (SSI) is the National Sports Association governing sport disciplines under the International Ski Federation (FIS) in the territory of India. SSI is also a recognised member of the Indian Olympic Association <br>
                                            
                                            </p>
                                            <a href="#" class="sc_button sc_button_square sc_button_style_filled sc_button_size_small margin_top_small margin_bottom_null">Contact Us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Greeting -->
                    <!-- Vision Mission -->
                    <div class="content_wrap">
                        <div class="sc_skills sc_skills_counter margin_top_large margin_bottom_medium" data-type="counter" data-caption="Skills">
                            
                            <div class="columns_wrap sc_skills_columns sc_skills_columns_4">
                                <div class="sc_skills_column column-1_2">
                                    <div class="sc_skills_item sc_skills_style_2 odd first">
                                        <div class="" > <img alt="" src="{{ url('frontend/images/target.png') }}">
                                        </div>
                                        <div class="sc_skills_count"></div>
                                        <div class="sc_skills_info">
                                            <div class="sc_skills_label">Mission </div>
                                            <div class="sc_skills_addinfo">The mission of the National Sport Federation of Ski and Snowboard India is to promote and develop skiing and snowboarding as accessible and popular sports throughout India. </div>
                                        </div>
                                    </div>
                                </div><div class="sc_skills_column column-1_2">
                                    <div class="sc_skills_item sc_skills_style_2 even">
                                        <div class=""><img alt="" src="{{ url('frontend/images/vision.png') }}"></div>
                                        <div class="sc_skills_count"></div>
                                        <div class="sc_skills_info">
                                            <div class="sc_skills_label">Vision</div>
                                            <div class="sc_skills_addinfo">Their vision is to create a vibrant skiing and snowboarding community that fosters talent, encourages participation, and achieves excellence on both national and international levels.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sc_skills sc_skills_counter margin_top_large margin_bottom_medium" data-type="counter" data-caption="Skills">
                            <h4 class="sc_title sc_title_regular margin_top_null margin_bottom_tiny">Key goals and objectives of the association in promoting skiing and snowboarding in India include:</h4>
                            <div class="columns_wrap sc_skills_columns sc_skills_columns_4">
                               
                                <div class="sc_skills_column column-1_4 mt-3">
                                    <div class="sc_skills_item sc_skills_style_2 odd first">
                                        <div class="sc_skills_total" data-start="1" data-stop="1" data-step="1" data-max="1" data-speed="36" data-duration="3600" data-ed="">0</div>
                                        <div class="sc_skills_count"></div>
                                        <div class="sc_skills_info">
                                            <div class="sc_skills_label">Development of Infrastructure</div>
                                            <div class="sc_skills_addinfo">To facilitate the establishment and improvement of ski resorts, training facilities, and infrastructure for skiing and snowboarding across different regions of India.</div>
                                        </div>
                                    </div>
                                </div><div class="sc_skills_column column-1_4 mt-3">
                                    <div class="sc_skills_item sc_skills_style_2 even">
                                        <div class="sc_skills_total" data-start="2" data-stop="2" data-step="2" data-max="2" data-speed="26" data-duration="676" data-ed="">0</div>
                                        <div class="sc_skills_count"></div>
                                        <div class="sc_skills_info">
                                            <div class="sc_skills_label">Talent Identification and Development</div>
                                            <div class="sc_skills_addinfo">To identify and nurture young talent in skiing and snowboarding through grassroots programs, talent scouting initiatives, and training camps, with the aim of developing future champions.</div>
                                        </div>
                                    </div>
                                </div><div class="sc_skills_column column-1_4 mt-3">
                                    <div class="sc_skills_item sc_skills_style_2 odd">
                                        <div class="sc_skills_total" data-start="3" data-stop="3" data-step="3" data-max="3" data-speed="25" data-duration="2658" data-ed="">0</div>
                                        <div class="sc_skills_count"></div>
                                        <div class="sc_skills_info">
                                            <div class="sc_skills_label">Education and Coaching</div>
                                            <div class="sc_skills_addinfo">To provide quality coaching and educational programs for athletes, coaches, and officials at all levels, enhancing skills, knowledge, and professionalism within the skiing and snowboarding community.</div>
                                        </div>
                                    </div>
                                </div><div class="sc_skills_column column-1_4 mt-3">
                                    <div class="sc_skills_item sc_skills_style_2 even">
                                        <div class="sc_skills_total" data-start="4" data-stop="4" data-step="4" data-max="4" data-speed="28" data-duration="93" data-ed="">0</div>
                                        <div class="sc_skills_count"></div>
                                        <div class="sc_skills_info">
                                            <div class="sc_skills_label">Competitions and Events</div>
                                            <div class="sc_skills_addinfo">To organize and support a calendar of national and regional skiing and snowboarding competitions, events, and championships, providing opportunities for athletes to showcase their talent and progress.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sc_skills_column column-1_4 mt-3">
                                    <div class="sc_skills_item sc_skills_style_2 odd first">
                                        <div class="sc_skills_total" data-start="5" data-stop="5" data-step="5" data-max="5" data-speed="36" data-duration="3600" data-ed="">0</div>
                                        <div class="sc_skills_count"></div>
                                        <div class="sc_skills_info">
                                            <div class="sc_skills_label">Promotion and Awareness</div>
                                            <div class="sc_skills_addinfo">To raise awareness about skiing and snowboarding as exciting and inclusive sports, promoting participation among people of all ages and backgrounds through marketing campaigns, outreach programs, and media engagement.</div>
                                        </div>
                                    </div>
                                </div><div class="sc_skills_column column-1_4 mt-3">
                                    <div class="sc_skills_item sc_skills_style_2 even">
                                        <div class="sc_skills_total" data-start="6" data-stop="6" data-step="6" data-max="6" data-speed="26" data-duration="676" data-ed="">0</div>
                                        <div class="sc_skills_count"></div>
                                        <div class="sc_skills_info">
                                            <div class="sc_skills_label">International Representation</div>
                                            <div class="sc_skills_addinfo">To represent India effectively at international skiing and snowboarding competitions, fostering international collaboration, participation, and success on the global stage.</div>
                                        </div>
                                    </div>
                                </div><div class="sc_skills_column column-1_4 mt-3">
                                    <div class="sc_skills_item sc_skills_style_2 odd">
                                        <div class="sc_skills_total" data-start="7" data-stop="7" data-step="7" data-max="7" data-speed="25" data-duration="2658" data-ed="">0</div>
                                        <div class="sc_skills_count"></div>
                                        <div class="sc_skills_info">
                                            <div class="sc_skills_label">Safety and Sustainability</div>
                                            <div class="sc_skills_addinfo">To prioritize safety measures and sustainable practices in skiing and snowboarding activities, ensuring the well-being of participants and the preservation of natural environments.</div>
                                        </div>
                                    </div>
                                </div><div class="sc_skills_column column-1_4 mt-3">
                                    <div class="sc_skills_item sc_skills_style_2 even">
                                        <div class="sc_skills_total" data-start="8" data-stop="8" data-step="8" data-max="8" data-speed="28" data-duration="93" data-ed="">0</div>
                                        <div class="sc_skills_count"></div>
                                        <div class="sc_skills_info">
                                            <div class="sc_skills_label">Partnerships and Collaboration</div>
                                            <div class="sc_skills_addinfo">To establish partnerships with government agencies, private organizations, sponsors, and other stakeholders to support the growth and development of skiing and snowboarding in India through shared resources, expertise, and initiatives.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3" >By pursuing these goals and objectives, the National Sport Federation of Ski and Snowboard India aims to cultivate a thriving skiing and snowboarding culture in India, enriching the lives of individuals, communities, and the nation as a whole.</div>
                        </div>
                    </div>
                    <!-- /Vision Mission -->
                    <!-- Promo -->
                    <div class="content_wrap">
                        <div class="sc_promo margin_top_large sc_promo_size_large">
                            <div class="sc_promo_inner">
                                <div class="sc_promo_image promo_image_1 width_60_per pos_right_0"></div>
                                <div class="sc_promo_block sc_align_left width_40_per float_left">
                                    <div class="sc_promo_block_inner">
                                        <h6 class="sc_promo_subtitle sc_item_subtitle">History</h6>
                                        <h3 class="sc_promo_title sc_item_title sc_item_title_with_descr">Ski and Snowboard India (SSI)</h3>
                                        <div class="sc_promo_line"></div>
                                        <div class="sc_promo_descr sc_item_descr">Skiing and snowboarding in India have a relatively recent history compared to countries with a longer tradition of winter sports. However, the development of these activities in India has been marked by notable achievements and growing interest over the years.<br/><br/>
                                            Skiing and snowboarding in India have their origins in the picturesque mountain regions of the Himalayas, where snowfall during the winter months provides ideal conditions for these sports. The introduction of skiing to India can be traced back to the early 20th century when British colonial officers and explorers first engaged in skiing activities in the mountainous regions of Northern India.<br/><br/>
                                            The establishment of ski resorts in regions such as Gulmarg in Jammu and Kashmir, Auli in Uttarakhand, and Manali in Himachal Pradesh played a significant role in popularizing skiing as a recreational activity in India. These resorts began offering ski lessons, equipment rentals, and guided tours, attracting tourists and adventure enthusiasts from both India and abroad.<br/><br/>
                                            India's participation in international skiing events began to gain momentum in the latter half of the 20th century. Indian athletes started representing the country at international skiing competitions, including the Winter Olympics, World Championships, and Asian Winter Games
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Promo -->
                    <!-- Services-->
                    <div class="content_wrap">
                        <div class="sc_services_wrap">
                            <div class="sc_services sc_services_style_services-1 sc_services_type_icons margin_top_medium margin_bottom_medium width_100_per">
                                <div class="sc_columns columns_wrap">
                                    <div class="column-1_3 column_padding_bottom">
                                        <div class="sc_services_item sc_services_item_1 odd first">
                                            <span class="sc_icon icon-mobile-1"></span>
                                            <div class="sc_services_item_content">
                                                <h4 class="sc_services_item_title">How to Call?</h4>
                                                <div class="sc_services_item_description">
                                                    <p>1 800 215 16 35</p>
                                                    <p> We’ll Call You Back</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div><div class="column-1_3 column_padding_bottom">
                                        <div class="sc_services_item sc_services_item_2 even">
                                            <span class="sc_icon icon-location-1"></span>
                                            <div class="sc_services_item_content">
                                                <h4 class="sc_services_item_title">Where We Are?</h4>
                                                <div class="sc_services_item_description">
                                                    <p>2 Chemin de Bordeneuve,</p>
                                                    <p> 31490 Brax, France</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div><div class="column-1_3 column_padding_bottom">
                                        <div class="sc_services_item sc_services_item_3 odd">
                                            <span class="sc_icon icon-clock-1"></span>
                                            <div class="sc_services_item_content">
                                                <h4 class="sc_services_item_title">When We Work?</h4>
                                                <div class="sc_services_item_description">
                                                    <p>8.00 am – 10.00 pm</p>
                                                    <p> Monday &#8211; Sunday</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Services-->
                    <!-- Google Map -->
                    <div id="sc_googlemap_196270504" class="sc_googlemap width_100_per height_500" data-zoom="14" data-style="dark">
                        <div id="sc_googlemap_196270504_1" class="sc_googlemap_marker" data-title="" data-description="6486 Sycamore Lane Fort Lee" data-address="6486 Sycamore Lane Fort Lee" data-latlng="" data-point="images/map-marker.png"></div>
                    </div>
                    <!-- /Google Map -->
                </section>
            </article>
        </div>
        <!-- /Content -->
    </div>
@endsection
