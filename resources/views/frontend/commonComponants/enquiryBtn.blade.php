<a href="#"
    class="sc_button sc_button_square sc_button_style_filled sc_button_size_small sc_button_hover_fade enquiry-btn"
    data-bs-toggle="modal" data-bs-target="#enquiryFormModal">
    <img src="{{ url('frontend/images/support.png') }}" class="" alt="">
    <b>Enquiry</b>
</a>


<!-- Vertically centered modal -->




<!-- Modal -->
<div class="modal fade" id="enquiryFormModal" tabindex="-1" aria-labelledby="enquiryFormModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="athletesFormModalLabel">Enquiry</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5">
                <div class="comments_form">
                    <div id="respond" class="comment-respond">
                        <form action="#" method="post" id="donationForm"
                            class="donationForm sc_input_hover_default">
                            <div class="row">
                              
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="first_name" class="form-label">Name</label>
                                        <input type="text" placeholder="Name" class="form-control" id="first_name" name="first_name">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="last_name" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="last_name" name="last_name">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="last_name" class="form-label">Contact Number</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="comment" class="form-label">Message</label>
                                        <textarea class="form-control" id="comment" rows="3"></textarea>
                                    </div>
                                </div>




                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button"
                    class="sc_button sc_button_square sc_button_style_filled sc_button_size_small  sc_button_hover_fade bg-danger"
                    data-bs-dismiss="modal">Cancel</button>
                <button type="button"
                    class="sc_button sc_button_square sc_button_style_filled sc_button_size_small  sc_button_hover_fade">Submit</button>
            </div>
        </div>
    </div>
</div>
