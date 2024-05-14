           <!-- Registration divider-->
           <div class="bg-primery">
               <ul class="nav nav-pills mb-3 d-flex justify-content-around" id="pills-tab" role="tablist">
                   <li class="nav-item" role="presentation">
                       <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                           href="#" role="tab" aria-controls="pills-home" aria-selected="true">Association Registration</a>
                   </li>
                   <li class="nav-item" role="presentation">
                       <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                           href="#" role="tab" aria-controls="pills-profile" aria-selected="false">Sponsorship Registration</a>
                   </li>
                   <li class="nav-item" role="presentation">
                       <a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
                           href="#" role="tab" aria-controls="pills-contact" aria-selected="false">Athletes Registration</a>
                   </li>

               </ul>
           </div>
           <div class="tab-content" id="pills-tabContent">
               <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                   tabindex="0">@include('frontend.commonComponants.registration.associationRegistration')</div>
               <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                   tabindex="0">
                   @include('frontend.commonComponants.registration.sponsorshipRegistration')
                </div>
               <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                   tabindex="0">
                   @include('frontend.commonComponants.registration.athletesRegistration')
                </div>

           </div>

           <!-- /Registration divider-->
