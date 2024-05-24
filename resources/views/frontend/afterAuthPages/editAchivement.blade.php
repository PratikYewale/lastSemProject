    <!-- Page content wrap -->
    <div class=" page_paddings_yes mt-5 mb-5">
        <!-- Content -->
        <div class="content">
            <article class="post_item post_item_single_team post_featured_left team ">

                <div class="content_wrap">

                    <div class="content">

                        <div class="comments_form">
                            @if (Auth::user()->role === 'athlete')
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
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    <form id="editProfile" action="{{ route('updateAthlete') }}" method="POST" enctype="multipart/form-data" class="donationForm sc_input_hover_default" onsubmit="return validateForm()">
                                        @csrf <!-- CSRF token -->
                                        <div class="row">
                                            <!-- Existing fields go here -->
                                    
                                            <div class="col-lg-12">
                                                <h4 class="mt-auto form-section-title">Achievements Information</h4>
                                            </div>
                                            <div id="achievements">
                                                <div class="row achievement-row">
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label for="achievement_name" class="form-label">Name</label>
                                                            <input type="text" class="form-control" name="achievements[0][name]">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label for="achievement_year" class="form-label">Year</label>
                                                            <input type="text" class="form-control" name="achievements[0][year]">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label for="achievement_result" class="form-label">Result</label>
                                                            <input type="text" class="form-control" name="achievements[0][result]">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label for="achievement_certificate" class="form-label">Certificate</label>
                                                            <input type="file" class="form-control" name="achievements[0][certificate]">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <button type="button" class="sc_button sc_button_square sc_button_style_filled sc_button_size_small margin_top_small margin_bottom_small" id="addAchievement">+</button>
                                            </div>
                                    
                                            <!-- Rest of the form fields go here -->
                                        </div>
                                        <div class="">
                                            <button type="button" class="sc_button sc_button_square sc_button_style_filled sc_button_size_small  sc_button_hover_fade bg-danger" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="sc_button sc_button_square sc_button_style_filled sc_button_size_small  sc_button_hover_fade">Submit</button>
                                        </div>
                                    </form>
                                    
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function () {
                                            let achievementIndex = 1;
                                            document.getElementById('addAchievement').addEventListener('click', function () {
                                                const achievementRow = document.createElement('div');
                                                achievementRow.classList.add('row', 'achievement-row');
                                                achievementRow.innerHTML = `
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label for="achievement_name" class="form-label">Name</label>
                                                            <input type="text" class="form-control" name="achievements[${achievementIndex}][name]">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label for="achievement_year" class="form-label">Year</label>
                                                            <input type="text" class="form-control" name="achievements[${achievementIndex}][year]">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label for="achievement_result" class="form-label">Result</label>
                                                            <input type="text" class="form-control" name="achievements[${achievementIndex}][result]">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label for="achievement_certificate" class="form-label">Certificate</label>
                                                            <input type="file" class="form-control" name="achievements[${achievementIndex}][certificate]">
                                                        </div>
                                                    </div>
                                                `;
                                                document.getElementById('achievements').appendChild(achievementRow);
                                                achievementIndex++;
                                            });
                                        });
                                    </script>
                                    
                                    


                                </div>
                      
                            @endif
                        </div>

                    </div>
                </div>


                {{-- {{ Auth::user() }} --}}



            </article>

        </div>
        <!-- /Content -->
    </div>
    <!-- /Page content wrap -->
