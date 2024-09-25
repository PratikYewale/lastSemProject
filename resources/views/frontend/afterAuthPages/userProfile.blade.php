    <!-- Page content wrap -->
    <div class=" page_paddings_yes mt-5 mb-5">
        <!-- Content -->
        <div class="content">
            <article class="post_item post_item_single_team post_featured_left team ">

                <div class="content_wrap">

                    <div class="content">

                        @if (Auth::user())

                            @if (Auth::user()->role == 'athlete')
                                <div class="card profile-card">
                                    <div class="card-body ">
                                        <table class="table table-bordered profile-table">

                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Athlete Id:
                                                        </b>
                                                        <b class="text-danger">
                                                            {{ Auth::user()->unique_code }}
                                                        </b>
                                                    </td>
                                                    <td>
                                                        <b>
                                                            Role:
                                                        </b>
                                                        <b class="text-danger">
                                                            Athlete
                                                        </b>
                                                    </td>
                                                    <td>
                                                    <b>
                                                            Designation :
                                                        </b>
                                                        <b class="text-danger">
                                                        {{ ucfirst(Auth::user()->designation) }}                                                        </b>
                                                    </td>



                                                    <td rowspan="3">

                                                        <span>

                                                            <img class="profile-picture"
                                                                src="{{ Auth::user()->profile_picture }}"
                                                                alt="No Image">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Name:<br />
                                                        </b>
                                                        <span>
                                                            {{ Auth::user()->first_name }}
                                                            {{ Auth::user()->middle_name }}
                                                            {{ Auth::user()->last_name }}
                                                        </span>
                                                    </td>
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
                                                            Address:<br />
                                                        </b>
                                                        <span>
                                                            {{ Auth::user()->address }},<br />
                                                            {{ Auth::user()->city }}, {{ Auth::user()->state }}<br />
                                                            {{ Auth::user()->country }}-
                                                            {{ Auth::user()->postal_code }}

                                                        </span>
                                                    </td>
                                                </tr>

                                                <tr>

                                                    <td>
                                                        <b>
                                                            Aadhar Card Number:<br />
                                                        </b>
                                                        <span>
                                                            <a href={{ Auth::user()->aadhar_card }}>
                                                                {{ Auth::user()->aadhar_number }}</a>
                                                        </span>

                                                    </td>
                                                    <td>
                                                        <b>
                                                            Passport Number:<br />
                                                        </b>
                                                        <span>
                                                            <a
                                                                href={{ Auth::user()->passport }}>{{ Auth::user()->passport_number }}</a>
                                                        </span>

                                                    </td>
                                                    <td>
                                                        <b>
                                                            Recommendation from State Sports Federation:<br />
                                                        </b>
                                                        <span>
                                                            @if (Auth::user()->recognition_by_state_government == 1)
                                                                Yes
                                                            @else
                                                                No
                                                            @endif
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <h4 class="m-3  text-bold">Documents Details</h4>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Aaddhar Card:<br/>
                                                        </b>
                                                        <span>
                                                            <img class="profile-picture" src="{{ Auth::user()->aadhar_card }}"
                                                                alt="No Image">
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <b>
                                                           Passport:
                                                        </b>
                                                        <span>

                                                            <img class="profile-picture" src="{{ Auth::user()->passport }}"
                                                                alt="No Image">
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <b>
                                                       PhysicalFitness Certificate:
                                                        </b>
                                                        <span>

                                                    <img class="profile-picture" src="{{ Auth::user()->physical_fitness_certificate }}"
                                                        alt="No Image">
                                                    </span>
                                                    </td>
                                                    <td>
                                                        <b>
                                                       Anti Doping Certificate:
                                                        </b>
                                                        <span>

                                                    <img class="profile-picture" src="{{ Auth::user()->anti_doping_certificate }}"
                                                        alt="No Image">
                                                    </span>
                                                    </td>

                                                </tr>
                                                <tr>
                                                <td>
                                                        <b>
                                                       Recommendation Certificate:
                                                        </b>
                                                        <span>

                                                    <img class="profile-picture" src="{{ Auth::user()->recommendation }}"
                                                        alt="No Image">
                                                    </span>
                                                    </td>
                                                </tr>

                                                <!-- <tr>
                                                    <td colspan="4">
                                                        <h4 class="m-3  text-bold">Sport Documents Details</h4>
                                                    </td>
                                                </tr>
                                                <td>
                                                        <b>
                                                       Recommendation Certificate:
                                                        </b>
                                                        <span>

                                                    <img class="profile-picture" src="{{ Auth::user()->recommendation }}"
                                                        alt="No Image">
                                                    </span>
                                                    </td>
                                                    <td>
                                                        <b>
                                                       Recommendation Certificate:
                                                        </b>
                                                        <span>

                                                    <img class="profile-picture" src="{{ Auth::user()->recommendation }}"
                                                        alt="No Image">
                                                    </span>
                                                    </td>
                                                    <td>
                                                        <b>
                                                       Recommendation Certificate:
                                                        </b>
                                                        <span>

                                                    <img class="profile-picture" src="{{ Auth::user()->recommendation }}"
                                                        alt="No Image">
                                                    </span>
                                                    </td> -->
                                                {{-- <tr>
                                                <td>
                                                    <b>
                                                        Recognition by State Olympic Association:<br />
                                                    </b>
                                                    <span>
                                                        @if (Auth::user()->recognition_by_state_olympic_association == 1)
                                                            Yes
                                                        @else
                                                            No
                                                        @endif
                                                    </span>
                                                </td>
                                                <td>
                                                    <b>
                                                        Hosted National Event in Past 3 yrs<br />
                                                    </b>
                                                    <span>
                                                        @if (Auth::user()->hosted_national_event_in_past_3_yrs == 1)
                                                            Yes
                                                        @else
                                                            No
                                                        @endif
                                                    </span>
                                                </td>
                                                <td>
                                                    <b>
                                                        Hosted National Event in Past 3 yrs<br />
                                                    </b>
                                                    <span>
                                                        @if (Auth::user()->hosted_national_event_in_past_3_yrs == 1)
                                                            Yes
                                                        @else
                                                            No
                                                        @endif
                                                    </span>
                                                </td>

                                            </tr> --}}


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @elseif (Auth::user()->role == 'member')
                                <!-- Code to show below if the role is 'member' -->
                                <!-- Example: Another profile picture or different content -->
                                <div class="card profile-card">
                                    <div class="card-body ">
                                        <table class="table table-bordered profile-table">

                                            <tbody>
                                                <tr>
                                                    <!-- <td>
                                                        <b>
                                                            Id:
                                                        </b>
                                                        <b class="text-danger">
                                                            SKI{{ Auth::user()->id }}
                                                        </b>
                                                    </td> -->
                                                    <td>
                                                        <b>
                                                            Role:
                                                        </b>
                                                        <b class="text-danger">
                                                            Member
                                                        </b>
                                                    </td>
                                                  <td></td>
                                                    <td rowspan="3">

                                                        <span>

                                                            <img class="profile-picture" src="{{ Auth::user()->logo }}"
                                                                alt="No Image">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Organization Name:<br/>
                                                        </b>
                                                        <span>
                                                            {{ Auth::user()->first_name }}
                                                        </span>
                                                    </td>

                                                    <td>
                                                        <b>
                                                            Date Of Establishment:<br/>
                                                        </b>
                                                        <span>
                                                            {{ Auth::user()->date_of_establishment }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <b>
                                                            Incorporation Certificate Number:<br/>
                                                        </b>
                                                        <span>
                                                            {{ Auth::user()->incorporation_certificate_number }}
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Email Id:<br/>
                                                        </b>
                                                        <span>
                                                            {{ Auth::user()->email }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <b>
                                                            Mobile Number:<br/>
                                                        </b>
                                                        <span>
                                                            {{ Auth::user()->mobile_no }}

                                                        </span>
                                                    </td>
                                                    <td>
                                                        <b>
                                                           Website:<br/>
                                                        </b>
                                                        <b class="text-danger">
                                                            {{ Auth::user()->website }}
                                                        </b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Address:<br/>
                                                        </b>
                                                        <span>
                                                            {{ Auth::user()->registered_address }},<br />
                                                            {{ Auth::user()->city }}, {{ Auth::user()->state }}<br />
                                                            {{ Auth::user()->country }}-{{ Auth::user()->postal_code }}

                                                        </span>
                                                    </td>
                                                    <td>
                                                        <b>
                                                            Recognition by State Government:<br/>
                                                        </b>
                                                        <span>

                                                            <span>
                                                                @if (Auth::user()->recognition_by_state_government == 1)
                                                                    Yes
                                                                @else
                                                                    No
                                                                @endif
                                                            </span>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <b>
                                                            Recognition by State Olympic Association:<br />
                                                        </b>
                                                        <span>
                                                            <span>
                                                                @if (Auth::user()->recognition_by_state_olympic_association == 1)
                                                                    Yes
                                                                @else
                                                                    No
                                                                @endif
                                                            </span>

                                                        </span>
                                                    </td>
                                                    <td>
                                                        <b>
                                                            Hosted National Event in Past 3 yrs :<br />
                                                        </b>
                                                        <span>
                                                            <span>
                                                                @if (Auth::user()->hosted_national_event_in_past_3_yrs == 1)
                                                                    Yes
                                                                @else
                                                                    No
                                                                @endif
                                                            </span>
                                                    </td>
                                                </tr>

                                                <tr>

                                                    <td>
                                                        <b>
                                                            Hosted International Event in Past 4 yrs:<br />
                                                        </b>
                                                        <span>
                                                            @if (Auth::user()->hosted_international_event_in_past_4_yrs == 1)
                                                                Yes
                                                            @else
                                                                No
                                                            @endif
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <b>
                                                            Active athletes that competed in national level events in
                                                            past 2 yr:<br />
                                                        </b>
                                                        <span>
                                                            <span>
                                                                @if (Auth::user()->active_athletes_competed_in_past_2_yrs == 1)
                                                                    Yes
                                                                @else
                                                                    No
                                                                @endif
                                                            </span>
                                                        </span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="4">
                                                        <h4 class="m-3  text-bold">President's Information</h4>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Name:<br/>
                                                        </b>
                                                        <span>
                                                            {{ Auth::user()->president_name }}<br />


                                                        </span>
                                                    </td>
                                                    <td>
                                                        <b>
                                                            President's Email
                                                        </b>
                                                        <span>
                                                            {{ Auth::user()->president_email }}<br />


                                                        </span>
                                                    </td>
                                                    <td>
                                                        <b>
                                                            Mobile Number
                                                        </b>
                                                        <span>
                                                            {{ Auth::user()->president_phone_number }}<br />


                                                        </span>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>
                                                        <b>
                                                            President Signature:<br/>
                                                        </b>
                                                        <span>
                                                            <img class="profile-picture" src="{{ Auth::user()->president_signature }}"
                                                                alt="No Image">
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <b>
                                                            Signature of Bearer 1:
                                                        </b>
                                                        <span>

                                                            <img class="profile-picture" src="{{ Auth::user()->signature_of_bearer_1 }}"
                                                                alt="No Image">
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <b>
                                                        Signature of Bearer 2:
                                                        </b>
                                                        <span>

                                                    <img class="profile-picture" src="{{ Auth::user()->signature_of_bearer_2 }}"
                                                        alt="No Image">
                                                    </span>
                                                    </td>

                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            @endif




                        @endif
                    </div>
                </div>


                {{-- {{ Auth::user() }} --}}



            </article>

        </div>
        <!-- /Content -->
    </div>
    <!-- /Page content wrap -->
