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
                                    data-bs-toggle="modal" data-bs-target="#sponserFormModal">Book Now</a>
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
                                    data-bs-toggle="modal" data-bs-target="#sponserFormModal">Book Now</a>
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
                                    data-bs-toggle="modal" data-bs-target="#sponserFormModal">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Price Table -->

            <div class="modal fade" id="sponserFormModal" tabindex="-1" aria-labelledby="sponserFormModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="athletesFormModalLabel">Sponsership</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-5">
                        <div class="comments_form">
                            <div id="respond" class="comment-respond">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form id="sponsershipForm" action="{{ route('createSponsorship') }}" method="POST"
                                    enctype="multipart/form-data" class="sponsershipForm sc_input_hover_default"
                                    onsubmit="return validateForm()">
                                    @csrf <!-- CSRF token -->
                                    <div class="row">
    
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="organization_name" class="form-label">Organisation Name</label>
                                                <input type="text" placeholder="Name" class="form-control"
                                                    id="organization_name" name="organization_name">
                                                <div id="orgNameError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="plan" class="form-label">Select Package</label>
                                                <select class="form-select" id="plan" name="plan"
                                                    onchange="updateAmount()">
                                                    <option value="" disabled selected>Select Plan</option>
                                                    <option value="gold">GOLD PACKAGE</option>
                                                    <option value="silver">SILVER PACKAGE</option>
                                                    <option value="bronze">BRONZE PACKAGE</option>
                                                </select>
                                                <div id="planError" class="text-danger"></div>
                                                <p class="text-danger">Your Total Amount is: ₹ <span
                                                        id="totalAmount"></span></p>
    
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="organization_mail" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="organization_mail"
                                                    name="organization_mail">
                                                <div id="orgMailError" class="text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="organization_contact" class="form-label">Contact
                                                    Number</label>
                                                <input type="text" class="form-control" id="organization_contact"
                                                    name="organization_contact">
                                                <div id="orgContactError" class="text-danger"></div>
                                            </div>
                                        </div>
    
    
    
                                        <div class="col-lg-12 d-none">
                                            <div class="mb-3">
                                                <label for="amount" class="form-label">Amount</label>
                                                <input type="text" class="form-control" id="amount" name="amount"
                                                    disabled>
                                                <div id="amountError" class="text-danger"></div>
                                            </div>
                                        </div>
    
                                        <div class="col-lg-12 d-none">
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
    
                                <script>
                                    // Function to set amount based on selected package
                                    function setAmount() {
                                        var selectedPackage = document.getElementById('plan').value;
                                        var amountField = document.getElementById('amount');
    
                                        // Set amount based on selected package
                                        switch (selectedPackage) {
                                            case 'gold':
                                                amountField.value = '1000';
                                                break;
                                            case 'silver':
                                                amountField.value = '700';
                                                break;
                                            case 'bronze':
                                                amountField.value = '500';
                                                break;
                                            default:
                                                amountField.value = '';
                                                break;
                                        }
                                    }
    
                                    // Function to update total amount
                                    function updateAmount() {
                                        var selectedPackage = document.getElementById('plan').value;
                                        var totalAmountElement = document.getElementById('totalAmount');
    
                                        // Update total amount based on selected package
                                        switch (selectedPackage) {
                                            case 'gold':
                                                totalAmountElement.textContent = '1000';
                                                break;
                                            case 'silver':
                                                totalAmountElement.textContent = '700';
                                                break;
                                            case 'bronze':
                                                totalAmountElement.textContent = '500';
                                                break;
                                            default:
                                                totalAmountElement.textContent = '';
                                                break;
                                        }
                                    }
    
                                    // Event listener to update amount field when package selection changes
                                    document.getElementById('plan').addEventListener('change', function() {
                                        setAmount();
                                        updateAmount();
                                    });
    
                                    // Set amount when page loads
                                    window.addEventListener('load', function() {
                                        setAmount();
                                    });
    
                                    // Form validation function
                                    function validateForm() {
                                        var organizationName = document.getElementById('organization_name').value;
                                        var organizationMail = document.getElementById('organization_mail').value;
                                        var organizationContact = document.getElementById('organization_contact').value;
                                        var selectedPackage = document.getElementById('plan').value;
                                        var amount = document.getElementById('amount').value;
    
                                        var isValid = true;
    
                                        if (organizationName.trim() === "") {
                                            document.getElementById('orgNameError').innerText = "Organization Name is required";
                                            isValid = false;
                                        } else {
                                            document.getElementById('orgNameError').innerText = "";
                                        }
    
                                        if (organizationMail.trim() === "") {
                                            document.getElementById('orgMailError').innerText = "Organization Mail is required";
                                            isValid = false;
                                        } else {
                                            document.getElementById('orgMailError').innerText = "";
                                        }
    
                                        if (organizationContact.trim() === "") {
                                            document.getElementById('orgContactError').innerText = "Organization Contact is required";
                                            isValid = false;
                                        } else {
                                            document.getElementById('orgContactError').innerText = "";
                                        }
    
                                        if (selectedPackage === "") {
                                            document.getElementById('planError').innerText = "Please select a package";
                                            isValid = false;
                                        } else {
                                            document.getElementById('planError').innerText = "";
                                        }
    
                                        if (amount.trim() === "") {
                                            document.getElementById('amountError').innerText = "Amount is required";
                                            isValid = false;
                                        } else {
                                            document.getElementById('amountError').innerText = "";
                                        }
    
                                        return isValid;
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>