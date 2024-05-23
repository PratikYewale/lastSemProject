    <!-- Page content wrap -->
    <div class=" page_paddings_yes mt-5 mb-5">
        <!-- Content -->
        <div class="content">
            <article class="post_item post_item_single_team post_featured_left team ">
                
                <div class="content_wrap">

                    <div class="content">

                        @if (Auth::user())
                            <table class="table table-bordered profile-table">

                                <tbody>
                                    <tr>

                                        <td>
                                            <b>
                                                First Name:
                                            </b>
                                            <span>
                                                {{ Auth::user()->first_name }}
                                            </span>
                                        </td>

                                        <td>
                                            <b>
                                                Middle Name:
                                            </b>
                                            <span>
                                                {{ Auth::user()->middle_name }}
                                            </span>
                                        </td>
                                        <td>
                                            <b>
                                                Last Name:
                                            </b>
                                            <span>
                                                {{ Auth::user()->last_name }}
                                            </span>
                                        </td>
                                        <td rowspan="3">

                                            <span>
                                                <img class="profile-picture" src={{ Auth::user()->profile_picture }}
                                                    alt="" srcset="">
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>
                                                Date Of Birth:
                                            </b>
                                            <span>
                                                {{ Auth::user()->date_of_birth }}
                                            </span>
                                        </td>
                                        <td>
                                            <b>
                                                Gender:
                                            </b>
                                            <span>
                                                @if (Auth::user()->gender == 1)
                                                    Male
                                                @else
                                                    Female
                                                @endif

                                            </span>
                                        </td>
                                        <td>
                                            <b>
                                                Role:
                                            </b>
                                            <b class="text-danger">
                                                {{ Auth::user()->role }}
                                            </b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>
                                                Email:
                                            </b>
                                            <span>
                                                {{ Auth::user()->email }}
                                            </span>
                                        </td>
                                        <td>
                                            <b>
                                                Contact Number:
                                            </b>
                                            <span>
                                                {{ Auth::user()->mobile_no }}
                                            </span>
                                        </td>
                                        <td>
                                            <b>
                                                Id:
                                            </b>
                                            <b class="text-danger">
                                                {{ Auth::user()->id }}
                                            </b>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <b>
                                                Address:<br />
                                            </b>
                                            <span>
                                                {{ Auth::user()->address }},<br />
                                                {{ Auth::user()->city }}, {{ Auth::user()->state }}<br />
                                                {{ Auth::user()->country }}- {{ Auth::user()->postal_code }}

                                            </span>
                                        </td>
                                        <td>
                                            <b>
                                                Aadhar Card Number:<br />
                                            </b>
                                            <span>
                                                {{ Auth::user()->aadhar_number }}<br />
                                            </span>
                                            <a href={{ Auth::user()->aadhar_card }}><b>Download Aadhar Card</b></a>
                                        </td>
                                        <td>
                                            <b>
                                                Passport Number:<br />
                                            </b>
                                            <span>
                                                {{ Auth::user()->passport_number }}<br />
                                            </span>
                                            <a href={{ Auth::user()->passport }}><b>Download Passport </b></a>
                                        </td>
                                        <td>
                                            <b>
                                                Recommendation from State Sports Federation:<br />
                                            </b>
                                            <span>
                                                <a href={{ Auth::user()->recommendation }}><b>Download Recommendation
                                                    </b></a>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <h4 class="m-3  text-bold">Sport Achievements</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>
                                                Achievements Name
                                            </b>

                                        </td>
                                        <td>
                                            <b>
                                                Achievements Result
                                            </b>

                                        </td>
                                        <td>
                                            <b>
                                                Certificates
                                            </b>

                                        </td>

                                    </tr>

                                    <tr>
                                        <td>

                                            {{ Auth::user()->achievements_name }}


                                        </td>
                                        <td>

                                            {{ Auth::user()->achievements_result }}


                                        </td>
                                        <td>
                                            <a href={{ Auth::user()->sport_certificates }}><b>Download Recommendation
                                                </b></a>


                                        </td>

                                    </tr>

                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>


                {{-- {{ Auth::user() }} --}}



            </article>

        </div>
        <!-- /Content -->
    </div>
    <!-- /Page content wrap -->