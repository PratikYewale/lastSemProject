@php
    // Define the amounts for each package
    $amounts = [
        'gold' => 339, // Update amounts as per your requirements
        'silver' => 489,
        'bronze' => 99,
    ];

    // Get the selected package from the request data or default to 'gold'
    $selectedPackage = old('plan', 'gold'); // 'gold' is the default value
    $amount = $amounts[$selectedPackage];
@endphp


<!-- Page content wrap -->
<div class="page_content_wrap page_paddings_yes">
    <!-- Content -->
    <div class="content">
        <article class="post_item post_item_single_team post_featured_left team">
            <!-- Single team info -->
            <div class="content_wrap">
                <section class="post_featured single_team_post_featured">
                    <div class="post_thumb" data-image="http://placehold.it/840x800" data-title="Shannon Lorenz">
                        <a class="hover_icon hover_icon_view" href="http://placehold.it/840x800" title="Shannon Lorenz">
                            <img alt="Shannon Lorenz" src="http://placehold.it/570x542">
                        </a>
                    </div>
                </section>
                <section class="single_team_post_description">
                    <h2 class="team_title">SPONSORSHIP</h2>
                    {{-- <h6 class="team_position">Instructor</h6> --}}
                    <div class="team_meta"></div>
                    <div class="team_brief_info">
                        <div class="team_brief_info_text">
                            <p>Businesses can sponsor our national championships, regional competitions, or training
                                camps, gaining exposure through branding opportunities, promotional materials, and
                                media coverage.</p>
                        </div>
                    </div>
                    <a href="#"
                        class="sc_button sc_button_square sc_button_style_filled sc_button_size_small margin_top_small margin_bottom_null">Contact
                        Us</a>
                </section>
            </div>
            <!-- /Single team info -->

        </article>




        <!-- Price Table -->
        <div class="content_wrap">
            <h2 class="sc_title sc_title_underline margin_bottom_medium margin_top_2_5em">Sponsorship Packages</h2>
            <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_3 margin_bottom_large row">
                <!-- Price block -->
                <div class="col-lg-4 sc_column_item sc_column_item_1 odd first">
                    <div class="sc_price_block sc_price_block_style_3">
                        <div class="sc_price_block_money">
                            <div class="sc_price">
                                <span class="sc_price_currency">₹</span>
                                <span class="sc_price_money">339</span>
                            </div>
                        </div>
                        <div class="sc_price_block_title"><span>Gold Package</span></div>
                        <div class="sc_price_block_line"></div>
                        <div class="sc_price_block_description">
                            <ul>
                                <li>Includes prominent branding at our flagship events</li>
                                <li>Exclusive access to athletes and VIP experiences</li>
                                <li>Recognition as a major sponsor across all promotional materials</li>
                            </ul>
                        </div>
                        <div class="sc_price_block_link">
                            <a href="#"
                                class="sc_button sc_button_square sc_button_style_filled sc_button_size_small"
                                data-bs-toggle="modal" data-bs-target="#sponsershipFormModal">Book
                                Now</a>
                        </div>

                    </div>
                </div><!-- /Price block --><!-- Price block -->
                <div class="col-lg-4 sc_column_item sc_column_item_2 even">
                    <div class="sc_price_block sc_price_block_style_3">
                        <div class="sc_price_block_money">
                            <div class="sc_price_block_icon none"></div>
                            <div class="sc_price">
                                <span class="sc_price_currency">₹</span>
                                <span class="sc_price_money">489</span>
                            </div>
                        </div>
                        <div class="sc_price_block_title">
                            <span>Silver Package</span>
                        </div>
                        <div class="sc_price_block_line"></div>
                        <div class="sc_price_block_description">
                            <ul>
                                <li>Offers branding opportunities at select events</li>
                                <li>Inclusion in marketing campaigns</li>
                                <li>Exposure through digital and social media channels</li>
                            </ul>
                        </div>
                        <div class="sc_price_block_link">
                            <a href="#"
                                class="sc_button sc_button_square sc_button_style_filled sc_button_size_small"
                                data-bs-toggle="modal" data-bs-target="#sponsershipFormModal">Book
                                Now</a>
                        </div>
                    </div>
                </div><!-- /Price block --><!-- Price block -->
                <div class="col-lg-4 sc_column_item sc_column_item_3 odd">
                    <div class="sc_price_block sc_price_block_style_3">
                        <div class="sc_price_block_money">
                            <div class="sc_price_block_icon none"></div>
                            <div class="sc_price">
                                <span class="sc_price_currency">₹</span>
                                <span class="sc_price_money">99</span>
                            </div>
                        </div>
                        <div class="sc_price_block_title">
                            <span>Bronze Package</span>
                        </div>
                        <div class="sc_price_block_line"></div>
                        <div class="sc_price_block_description">
                            <ul>
                                <li>Provides sponsorship recognition at specific competitions or programs</li>
                                <li>Along with branding visibility on event signage and promotional materials</li>

                            </ul>
                        </div>
                        <div class="sc_price_block_link">
                            <a href="#"
                                class="sc_button sc_button_square sc_button_style_filled sc_button_size_small"
                                data-bs-toggle="modal" data-bs-target="#sponsershipFormModal">Book
                                Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Price Table -->



    </div>
    <!-- /Content -->
</div>
<!-- /Page content wrap -->

<!-- Modal -->
<div class="modal fade" id="sponsershipFormModal" tabindex="-1" aria-labelledby="sponsershipFormModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="athletesFormModalLabel">Sponsorship</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5">
                <div class="sponsership_form">
                    <div id="sponsership_form" class="comment-respond">
                        <form id="sponsershipForm" action="{{ route('createSponsorship') }}" method="POST"
                            enctype="multipart/form-data" class="sponsershipForm sc_input_hover_default">
                            @csrf <!-- CSRF token -->
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="organization_name" class="form-label">Organisation Name</label>
                                        <input type="text" placeholder="Name" class="form-control"
                                            id="organization_name" name="organization_name">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="organization_mail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="organization_mail"
                                            name="organization_mail">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="organization_contact" class="form-label">Contact Number</label>
                                        <input type="text" class="form-control" id="organization_contact"
                                            name="organization_contact">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="plan" class="form-label">Select Package</label>
                                        <select class="form-select" id="plan" name="plan">
                                            <option value="" disabled selected>Select Plan</option>
                                            <option value="gold">GOLD PACKAGE</option>
                                            <option value="silver">SILVER PACKAGE</option>
                                            <option value="bronze">BRONZE PACKAGE</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="amount" class="form-label">Amount</label>
                                        <input type="text" class="form-control" id="amount" name="amount">
                                    </div>
                                </div>

                                <!-- Add an event listener to the select element to detect changes -->
                                <script>
                                    document.getElementById('plan').addEventListener('change', function() {
                                        // Get the selected package value
                                        var selectedPackage = this.value;

                                        // Define the amounts for each package
                                        var amounts = {
                                            'gold': 500, // Update amounts as per your requirements
                                            'silver': 400,
                                            'bronze': 300
                                        };

                                        // Set the amount field value based on the selected package
                                        document.getElementById('amount').value = amounts[selectedPackage];
                                    });
                                </script>


                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="currency" class="form-label">Currency</label>
                                        <input type="text" class="form-control" id="currency" value="INR"
                                            name="currency" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <button type="button"
                                    class="sc_button sc_button_square sc_button_style_filled sc_button_size_small  sc_button_hover_fade bg-danger"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="submit"
                                    class="sc_button sc_button_square sc_button_style_filled sc_button_size_small  sc_button_hover_fade">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>
