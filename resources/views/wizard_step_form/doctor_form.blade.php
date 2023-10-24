@extends('layouts.admin.app')

@section('link')
    <link rel="stylesheet" href="{{asset('wizard_form/css/style.css')}} ">
    <link rel="stylesheet" href="{{asset('wizard_form/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free-6.2.1-web/css/all.css')}}">
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">--}}
    <x-vendor.bootstrap_css/>
@endsection

@section('content')

      <div class="" >

{{--          <button type="button" class="btn btn-primary" id="liveToastBtn">Show live toast</button>--}}

          <div class="toast-container position-fixed top-0 end-0 p-3" >
              <div id="liveToast" class="toast" role="alert" aria-live="assertive"  aria-atomic="true">
                  <div class="toast-header">
{{--                      <img src="..." class="rounded me-2" alt="...">--}}
                      <strong class="me-auto text-danger">Warning!</strong>
                      <small>11 mins ago</small>
                      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                  </div>
                  <div class="toast-body">
                      <div id="toastContent">
                      </div>
                  </div>
              </div>
          </div>


          <div class="row justify-content-center " id="doctor_register_container">
            <div class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        Hello, world! This is a toast message.
                    </div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
            <!-- tab area  -->
          <div class="col-12 col-lg-10 col-xxl-8 col-xl-10 my-4">
            <div class="tab_container">
              <div class="tab_list"  id="tab_personal_info"><span>Personal Info</span></div>
              <div class="tab_list"  id="tab_education"><span>Education</span></div>
              <div class="tab_list"  id="tab_training"><span>Training</span></div>
              <div class="tab_list"  id="tab_xp"><span>Experience</span></div>
            </div>
          </div>
            <!-- personal information step  -->
          <div class="col-12 col-lg-10 col-xxl-8 col-xl-10 form-container" id="personal_info_container">
            <form id="form_personal_info" method="POST" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
                @csrf
                @method('POST')
                <div class="col-12">
                <label for="doc_title" class="form-label">Title</label>

                <select id="doc_title" name="doc_title" required class="form-select" aria-label="Default select example">

                  <option value="" disabled @selected($user?->expert?->doc_title == null)>Select title</option>
                  <option @selected($user?->expert?->doc_title == 1) value="1">Prof. Dr.</option>
                  <option @selected($user?->expert?->doc_title == 2) value="2">Asso. Prof. Dr.</option>
                  <option @selected($user?->expert?->doc_title == 3) value="3">Assis. Prof. Dr.</option>
                </select>
              </div>

              <!-- name  -->
              <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" value="{{$user->first_name}}" name="first_name" id="first_name" placeholder="First Name" required max="50" >
                  <div class="invalid-feedback">
                      @error('first_name')
                      {{ $message }}
                      @else
                          Please enter your first name
                      @enderror
                  </div>

              </div>


              <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control"  value="{{$user->last_name}}" name="last_name" id="last_name" placeholder="Last Name" required>
                  <div class="invalid-feedback">
                      @error('last_name')
                      {{ $message }}
                      @else
                          Please enter your first name
                          @enderror
                  </div>
              </div>

              <!-- gender  -->
              <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                <label for="" class="form-label">Gender</label>
                <div class="input-group">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" @checked($user->gender=='male') name="gender" id="male" value="male"  required>
                    <label class="form-check-label" for="male">Male</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" @checked($user->gender=='female') name="gender" id="female" value="female"  required>
                    <label class="form-check-label" for="female">Female</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" @checked($user->gender=='other')  name="gender" id="other" value="other"  required>
                    <label class="form-check-label" for="other">Other</label>
                  </div>
                    <div class="invalid-feedback">
                        @error('gender')
                        {{ $message }}
                        @else
                            Please choose your gender
                        @enderror

                    </div>
                </div>
              </div>

              <!-- end gender -->
              <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                <label for="date_of_birth" class="form-label">Date Of Birth</label>
                <input type="date" class="form-control" name="date_of_birth" value="{{$user->date_of_birth}}" id="date_of_birth"  placeholder="" required>
                  <div class="invalid-feedback">
                      @error('date_of_birth')
                      {{ $message }}
                      @else
                          Please provide your date of birth
                      @enderror
                  </div>
              </div>

              <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                <label for="marital_status" class="form-label">Martial Status(Optional)</label>
                <select name="marital_status" id="marital_status" required  class="form-select" aria-label="Default select example">
                  <option disabled @selected($user->expert->doc_title == null)>Select One</option>
                  <option @selected($user->expert->doc_title == 1) value="1">Unmarried</option>
                  <option @selected($user->expert->doc_title == 2) value="2">Married</option>
                  <option @selected($user->expert->doc_title == 3) value="3">Divorced</option>
                </select>

              </div>

              <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                <label for="nationality" class="form-label">Nationality</label>
                <select name="nationality" id="nationality" required  class="form-select" aria-label="Default select example">
                  <option value="" disabled selected>Select One</option>
                  <option value="1">Bangladeshi</option>
                  <option value="2">Indian</option>
                  <option value="3">British</option>
                </select>
              </div>

              <!-- address  -->
              <div class="col-12 ">
                <label for="address_line_1" class="form-label">Address Line 1</label>
                <input type="text" class="form-control"  value='{{$user?->address?->address}}' name="address" id="address_line_1" placeholder="Street address" required>
                  <div class="invalid-feedback">
                      @error('address')
                      {{ $message }}
                      @else
                          Please provide your address
                      @enderror
                  </div>

              </div>
              <div class="col-12 ">
                <label for="address_line_2" class="form-label">Address Line 2</label>
                <input type="text" class="form-control" name="address2" value="{{$user?->address?->address2}}"  id="address_line_2" placeholder="Appartment, Unit, Building, Floor etc">
                  <div class="invalid-feedback">
                      @error('address2')
                      {{ $message }}
                      @else
                          Enter your address.
                          @enderror
                  </div>
              </div>
              <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" value="{{$user?->address?->city}}" name="city" id="city" placeholder="City" required>
                  <div class="invalid-feedback">
                      @error('city')
                      {{ $message }}
                      @else
                          Please enter your city name
                          @enderror
                  </div>
              </div>
              <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                <label for="state" class="form-label">State</label>
                <input type="text" class="form-control" value="{{$user?->address?->state}}" name="state" id="state" placeholder="District/Region/Province" required>
                  <div class="invalid-feedback">
                      @error('state')
                      {{ $message }}
                      @else
                          Please enter you state
                          @enderror
                  </div>
              </div>

              <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                <label for="zip_code" class="form-label">Zip Code</label>
                <input type="text" class="form-control" value="{{$user?->address?->zip_code}}"  name="zip_code" id="zip_code" placeholder="Postal/Zip Code" required>
                  <div class="invalid-feedback">
                      @error('zip_code')
                      {{ $message }}
                      @else
                          Please provide your zipcode
                          @enderror
                  </div>
              </div>

              <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                <label for="country" class="form-label">Country</label>
                <select  class="form-select" aria-label="Default select example" name="country" id="country" required>
                  <option value="" disabled selected>Select One</option>
                  <option value="1">Bangladesh</option>
                  <option value="2">India</option>
                  <option value="3">UK</option>
                </select>
              </div>
              <!-- end address  -->

              <!-- contact no  -->
              <div class="col-12 col-lg-2 col-xl-2 col-xxl-2">
                <label for="phone_code" class="form-label">Phone Code</label>
                <select name="phone_code" id="phone_code" required class="form-select" aria-label="Default select example">
                  <option value="" disabled selected>Select One</option>
                  <option value="1">+88</option>
                  <option value="2">+1597</option>
                  <option value="3">+9715</option>
                </select>
              </div>
              <div class="col-12 col-lg-5 col-xl-5 col-xxl-5">
                <label for="phone"  class="form-label">Contact No.</label>
                <input type="number" class="form-control" value="{{$user->phone}}"  minlength="6" name="phone" id="phone" data-contact="phone" placeholder="01XXXXXXXXX" required>
                  <div class="invalid-feedback">
                      @error('zip_code')
                      {{ $message }}
                      @else
                          Please provide your phone number
                          @enderror
                  </div>
              </div>
              <div class="col-12 col-lg-5 col-xl-5 col-xxl-5">
                <label for="additional_phone"  class="form-label">Additional Number</label>
                <input type="number" class="form-control" value="{{$user->additional_phone}}"  name="additional_phone" id="additional_phone" data-contact="additional_phone" placeholder="01XXXXXXXXX">
                  <div class="invalid-feedback">
                      @error('additional_phone')
                      {{ $message }}
                      @else
                          Enter your additional phone number if any.
                          @enderror
                  </div>
              </div>


              <!-- identity -->
              <div class="col-12 col-lg-3 col-xl-3 col-xxl-3">
                <label for="identity" class="form-label">Identity</label>
                <select name="identity_type" id="" required class="form-select">
                  <option @selected($user->identity_type == null) value="" disabled>Select Type</option>
                  <option @selected($user->identity_type == 1) value="1">Passport</option>
                  <option @selected($user->identity_type == 2) value="2">Residential Card</option>
                </select>
              </div>

              <div class="col-12 col-lg-5 col-xl-5 col-xxl-5">
                <label for="identity" class="form-label">Identity no.</label>
                <input type="text" class="form-control" value="{{$user->identity_no}}"  name="identity_no" id="identity" placeholder="854XXXXXXXXXXXXXXXX" required >
                  <div class="invalid-feedback">
                      @error('identity_no')
                      {{ $message }}
                      @else
                          Please provide your address
                          @enderror
                  </div>
              </div>

              <div class="col-12 col-lg-4 col-xl-4 col-xxl-4">
                <label for="identity_proof" class="form-label">Identity Proof(img,pdf)</label>
                <input class="form-control" type="file"  name="identity_proof" id="identity_proof" required>
                  <div class="invalid-feedback">
                      @error('identity_proof')
                      {{ $message }}
                      @else
                          Please upload an attachment of your identity
                          @enderror
                  </div>
              </div>

              <!-- license  -->

              <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                <label for="license_no" class="form-label">License Number</label>
                <input type="text" class="form-control" value="{{$user?->expert?->license_no}}" name="license_no" id="license_no" placeholder="1245XXXXXX" required>
                  <div class="invalid-feedback">
                      @error('license_no')
                      {{ $message }}
                      @else
                        Please enter your license number
                      @enderror
                  </div>
              </div>

              <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                <label for="license_attachment" class="form-label">License Attachment</label>
                <input type="file" class="form-control" name="license_attachment" accept=".pdf,.jpg,.jpeg,.png" id="license_attachment" placeholder="" required>
                  <div class="invalid-feedback">
                      @error('license_attachment')
                      {{ $message }}
                      @else
                          Please upload you license attachment
                      @enderror
                  </div>
              </div>

              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="condition_checked" name="terms_condition" id="termsCondition" required>
                  <label class="form-check-label" for="termsCondition">
                    Agree to terms and conditions
                  </label>
                  <div class="invalid-feedback">
                    You must agree before submitting.
                  </div>
                </div>
              </div>


              <div class="col-12 my-4">
                <div class="text-center">
                  <button class="btn btn-outline-primary" id="btnPersonalInfo" name="btnSavePersonalInfo" type="submit">Continue</button>
                </div>
              </div>
            </form>
          </div>

        <!-- educational information step   -->
          <div class="col-12 col-lg-8 col-xl-8 col-xxl-8 form-container" id="education_info_container">
              <!-- Educational Information-->
              <form id="form_education" class="needs-validation" enctype="multipart/form-data" novalidate>
                  @csrf
                  @method('POST')
                <div class="input-edu-container row  gy-3 ">
                  <div class="col-12 group-input">
                    <label for="institute" class="form-label">Institute</label>
                    <input type="text" class="form-control form-field" name="institute" id="institute" placeholder="Institute Name" required>
                  </div>

                  <div class="col-12 group-input">
                    <label for="specialization" class="form-label">Specialization</label>
                    <select id="specialization" name="specialization" required class="form-select form-field" aria-label="Default select example">
                      <option value="" disabled selected>Select One</option>
                      <option value="1">Subject 1</option>
                      <option value="2">Subject 2</option>
                      <option value="3">Subject 3</option>
                      <option value="4">Subject 4</option>
                    </select>
                  </div>

                  <div class="col-12 col-lg-6 col-xl-6 col-xxl-6 group-input">
                    <label for="duration" class="form-label">Duration</label>
                    <input type="number" class="form-control form-field" name="duration" id="duration" min="1" placeholder="Total Month" required>
                  </div>

                  <div class="col-12 col-lg-6 col-xl-6 col-xxl-6 group-input">
                    <label for="passing_year" class="form-label">Passing Year</label>
                    <input type="date" class="form-control form-field" name="passing_year" id="passing_year" placeholder="" required>
                  </div>

                  <div class="col-12 col-lg-6 col-xl-6 col-xxl-6 group-input">
                    <label for="education_certificate" class="form-label">Upload certificate(image/pdf)</label>
                    <input type="file" class="form-control form-field" name="education_certificate" id="education_certificate" placeholder="" required>
                  </div>
                  <div class="col-12 col-lg-6 col-xl-6 col-xxl-6 group-input">
                    <label for="edu_doc_title" class="form-label">Certificate Title</label>
                    <input type="text" class="form-control form-field" name="edu_doc_title" id="edu_doc_title" placeholder="" required>
                  </div>
                </div>

                <div class="col-6 my-3 d-grid mx-auto">
                  <button type="submit" id="btnAddMoreEdu" class="btn btn-outline-secondary"><span><i class="fa-solid fa-plus"></i> Add More</span></button>
                </div>

                <div class="col-12 mt-4">
                  <div class="text-center">
                    <button class="btn btn-outline-info" type="button" name="back">Previous</button>
                    <button class="btn btn-outline-primary" name="btnSaveEducationInfo" type="submit">Continue</button>
                  </div>
                </div>

              </form>
          </div>


        <!-- Training information step   -->
          <div class="col-12 col-lg-8 col-xl-8 col-xxl-8 form-container"  id="training_info_container">
            <form id="form_training" enctype="multipart/form-data" class="needs-validation" novalidate>

              <div class="input-train-container row g-3">
                <div class="col-12">
                  <label for="institute" class="form-label">Institute</label>
                  <input type="text" class="form-control form-field" name="institute" id="institute" placeholder="Institute Name" required>
                </div>

                <div class="col-12">
                  <label for="specialization" class="form-label">Specialization</label>
                  <select id="specialization" name="specialization" required class="form-select form-field" aria-label="Default select example">
                    <option value="" disabled selected>Select One</option>
                    <option value="1">Subject 1</option>
                    <option value="2">Subject 2</option>
                    <option value="3">Subject 3</option>
                    <option value="4">Subject 4</option>
                  </select>
                </div>

                <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                  <label for="from_date" class="form-label">From</label>
                  <input type="date" class="form-control form-field" name="from_date" id="from_date" placeholder="" required>
                </div>

                <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                  <label for="to_date" class="form-label">To</label>
                  <input type="date" class="form-control form-field" name="to_date" id="to_date" placeholder="" required>
                </div>

                <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                  <label for="training_certificate" class="form-label">Upload certificate(image/pdf)</label>
                  <input type="file" class="form-control form-field" name="training_certificate" id="training_certificate" placeholder="" required>
                </div>
                <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                  <label for="training_title" class="form-label">Certificate Title</label>
                  <input type="text" class="form-control form-field" name="training_title" id="training_title" placeholder="" required>
                </div>
              </div>

              <div class="col-6 my-3 d-grid mx-auto">
                <button type="button" id="btnAddMoreTrain" class="btn btn-outline-secondary"><span><i class="fa-solid fa-plus"></i> Add More</span></button>
              </div>

              <div class="col-12 mt-4">
                <div class="text-center">
                  <button class="btn btn-outline-info" type="button" name="back">Previous</button>
                  <button class="btn btn-outline-primary" name="btnSaveTraining" type="submit">Continue</button>

                </div>
              </div>
            </form>
          </div>


        <!-- Experience information step   -->
          <div class="col-12 col-lg-8 col-xl-8 col-xxl-8 form-container" id="experience_container">
            <form id="form_experience" enctype="multipart/form-data" class="needs-validation" data-form="experience" novalidate>


              <div class="input-xp-container row g-3">
                <div class="col-12">
                  <label for="org_name" class="form-label">Organization</label>
                  <input type="text" class="form-control  form-field" name="org_name" id="org_name" placeholder="Institute Name" required>
                </div>

                <div class="col-12">
                  <label for="department" class="form-label">Department</label>
                  <select id="department" name="department" required class="form-select  form-field" aria-label="Default select example">
                    <option value="" disabled selected>Select One</option>
                    <option value="1">Department 1</option>
                    <option value="2">Department 2</option>
                    <option value="3">Department 3</option>
                    <option value="4">Department 4</option>
                  </select>
                </div>

                <div class="col-12">
                  <label for="position" class="form-label">Position</label>
                  <input type="text" class="form-control  form-field" name="position" id="position" placeholder="" required>
                </div>

                  <div class="col-12 col-lg-4 col-xl-4 col-xxl-4">
                    <label for="from_date" class="form-label">From</label>
                    <input type="date" class="form-control  form-field" name="from_date" id="from_date" placeholder="" required>
                  </div>

                  <div class="col-12 col-lg-4 col-xl-4 col-xxl-4">
                    <label for="to_date" class="form-label">To</label>
                    <input type="date" class="form-control  form-field" name="to_date" id="to_date" placeholder="" data-job-condition="resign_date" required>
                  </div>

                  <div class="col-12 col-lg-4 col-xl-4 col-xxl-4">
                    <label class="form-label">Present</label>

                    <div class="form-check">
                      <input class="form-check-input  form-field" type="checkbox" value="checked" name="job_status" id="job_status" data-job-condition="present">
                      <label class="form-check-label" for="job_status">
                        Yes
                      </label>
                    </div>
                  </div>
              </div>

              <div class="col-6 my-3 d-grid mx-auto">
                <button type="button" id="btnAddMoreExperience" class="btn btn-outline-secondary"><span><i class="fa-solid fa-plus"></i> Add More</span></button>
              </div>


              <div class="col-12 mt-4">
                <div class="text-center">
                <button class="btn btn-outline-info" type="button" name="back">Previous</button>
                  <button class="btn btn-outline-primary" name="btnSaveExperience" type="submit">Submit</button>

                </div>
              </div>
            </form>
          </div>
        </div>

      </div>

@endsection

@section('scripts')
{{--          <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>--}}
{{--          <script src="https://unpkg.com/axios/dist/axios.min.js"></script>--}}
    <x-vendor.bootstrap_bundle_js/>
    <script src="{{asset('vendor/bootstrap-5.3.0-alpha1-dist/js/bootstrap.js')}}"></script>

    <script src="{{asset('wizard_form/js/wizard_step.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function (){
          // form container
          const personalInfoContainer = $("#personal_info_container");
          const educationInfoContainer= $("#education_info_container");
          const trainingInfoContainer= $("#training_info_container");
          const experienceContainer= $("#experience_container");

          // form
          const frmPersonalInfo = $("#form_personal_info");
          const frmEducation = $("#form_education");
          const frmTraining = $("#form_training");
          const frmExperience = $("#form_experience");


          // tab switching
          const tabPersonalInfo = $("#tab_personal_info");
          const tabEducation = $("#tab_education");
          const tabTraining = $("#tab_training");
          const tabExperience = $("#tab_xp");

          // add more field button
          const btnAddEdu = $('#btnAddMoreEdu');
          const btnAddTraining = $('#btnAddMoreTrain');
          const btnAddExp = $('#btnAddMoreExperience');

          // hiding content
          personalInfoContainer.show();
          educationInfoContainer.hide();
          trainingInfoContainer.hide();
          experienceContainer.hide();


          // colors
          let tabActive = `rgb(13, 110, 253)`;
          let tabVisited = `rgb(13, 201, 239)`;
          let tabFontActive = `rgb(255,255,255)`;


          // data container
          // tab activity
          const formData = {}; //form data container
          let formActive = new Map();
          const tabActiveList = new Map();

          // bootstrap toast
            const toastTrigger = document.getElementById('liveToastBtn')
            const toastLiveExample = document.getElementById('liveToast')

            const toastContent = $("#toastContent");



          //==========================job validation function=================
          function jobStatusValidation(arg){
              let checkbox, formContainer, currentDatebox;

              checkbox = arg.currentTarget;
              formContainer = $(checkbox).parentsUntil($('.input-xp-container')).parent();
              currentDatebox = $(formContainer).find($(`[data-job-condition="resign_date"]`));

              if(checkbox.checked){
                  currentDatebox.attr('disabled','');
                  currentDatebox.removeAttr('required','');
                  currentDatebox[0].value = '';
              }else{
                  currentDatebox.removeAttr('disabled','');
                  currentDatebox.attr('required','');
              }

          }

          // =====================tab function===========================
          function tabVisibility(){
              switch(true) {
                  case personalInfoContainer.is(":visible"):
                      tabPersonalInfo.css('background-color', tabActive);

                      break;
                  case educationInfoContainer.is(":visible"):
                      tabEducation.css('background-color', tabActive);
                      // code block
                      break;
                  case trainingInfoContainer.is(":visible"):
                      tabTraining.css('background-color', tabActive);
                      break;

                  case experienceContainer.is(":visible"):
                      tabExperience.css('background-color', tabActive);
                      break;
                  default:
                      console.log("Unknown");
                  // code block
              }
          }

          function tabActivated(tabList){
              tabList.forEach(element => {
                  element.css('background-color', tabVisited);
                  element.css('cursor', 'pointer');
                  element.css('color', tabFontActive);

              });
          }

          function switchTab(elementHide,elementShow){
              elementHide.forEach(element => {
                  element.hide()
              });
              elementShow.show();
          }

          //=============================form validation
          (() => {
              'use strict'
              // Fetch all the forms we want to apply custom Bootstrap validation styles to
              const forms = document.querySelectorAll('.needs-validation')

              // Loop over them and prevent submission
              Array.from(forms).forEach(form => {
                  form.addEventListener('submit', event => {
                      if (!form.checkValidity()) {
                          event.preventDefault()
                          event.stopPropagation()
                      }else{ // ============ validated
                          event.preventDefault();

                          let formDataTransport = new FormData();

                          if(event.currentTarget.id === 'form_personal_info'){// ==========================personal information

                              const rawPersonalInfo = new FormOperation(event.target.elements,personalInfoContainer);
                              formData["personalInfo"] = rawPersonalInfo.formDataPack;

                              // assigning data
                              formData["personalInfo"].repackedData.forEach(function(value,key){
                                  formDataTransport.append(key,value);
                              })

                              const identityProofInput = $('#identity_proof')[0];
                              const licenseAttachmentInput = $('#license_attachment')[0];

                              const identityProof = identityProofInput.files[0];
                              const licenseAttachment = licenseAttachmentInput.files[0];




                              formDataTransport.append('identity_proof_file', identityProof);
                              formDataTransport.append('license_attachment_file', licenseAttachment);



                              axios.post('{{route('doctor.profile.store')}}',formDataTransport, {
                                  headers: {
                                      'Content-Type': 'multipart/form-data',
                                  }
                              })
                                  .then(function (response) {

                                      alert(response.data['message']);
                                  })
                                  .catch(function (error) {
                                      if (error.response.status === 422) {
                                          let errors = error.response.data.errors;
                                          // Clear previous error messages
                                          toastContent.empty();

                                          console.log(Object.entries(errors));
                                          let ul = $("<ul>");
                                          Object.entries(errors).forEach((value)=>{
                                              let fieldName = value[0], errorMessage = value[1][0],  li = $("<li>").text(errorMessage) ;
                                              console.log(fieldName,errorMessage);
                                              ul.append(li);
                                          })

                                          toastContent.append(ul);
                                          const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
                                          toastBootstrap.show()





                                          // setTimeout(function () {
                                          //     toastBootstrap.toast('hide');
                                          // }, 500000);
                                          // toastBootstrap.addEventListener('hidden.bs.toast', () => {
                                          //     // do something...
                                          //
                                          // })








                                          // Display validation errors under input fields
                                          // Object.keys(errors).forEach((field,value) => {
                                          //     console.log(field);
                                          //     console.log('value:',value);
                                          //     let ul = $("<ul>");
                                          //     ul.addClass("text-danger");
                                          //
                                          //     // Display validation errors under input fields
                                          //     $.each(errors, function (field, message) {
                                          //         let $li = $("<li>").text(message);
                                          //         ul.append($li);
                                          //         ul.append(field);
                                          //
                                          //     });
                                          //
                                          //     toastContent.append(ul);
                                          //     const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
                                          //     toastBootstrap.show()
                                          // })
                                      }
                                  });

                              // personalInfoContainer.hide(0,e=>{
                              //     educationInfoContainer.show();
                              //     tabActiveList.set('tabPersonal',tabPersonalInfo);
                              //     tabActiveList.set('tabEdu',tabEducation);
                              //
                              //     if(!formActive.get('personalInfo')){
                              //         formActive.set('personalInfo',personalInfoContainer);
                              //         formActive.set('educationInfo',educationInfoContainer);
                              //         tabActiveList.set('tabPersonal',tabPersonalInfo);
                              //         tabActiveList.set('tabEdu',tabEducation);
                              //     }
                              // })
                          }else if(event.currentTarget.id === 'form_education'){  //======================= education information
                              const rawEducationInfo = new FormOperation(event.target.elements,educationInfoContainer);

                                  formData["educationInfo"] = rawEducationInfo.formDataPack;
                                  educationInfoContainer.hide(0,e=>{
                                      trainingInfoContainer.show();

                                      if(!formActive.get('trainingInfo')){
                                          formActive.set('trainingInfo',trainingInfoContainer);
                                          tabActiveList.set('tabTraining',tabTraining);
                                      }

                                  })
                              // console.log(rawEducationInfo.formElements);
                              console.log(formData);
                          }else if(event.currentTarget.id === 'form_training'){  //===================== training information
                              console.log('you are here in training info');
                                //object creation
                                  const rawTrainingInfo = new FormOperation(event.target.elements,trainingInfoContainer);

                                      formData["trainingInfo"] = rawTrainingInfo.formDataPack;
                                      trainingInfoContainer.hide(0,e=>{
                                          experienceContainer.show(0,()=>{
                                              //job validation
                                              $(`[data-job-condition="present"]`).click(e=>{
                                                  jobStatusValidation(e);
                                              });

                                              $('#form_experience .btn-close').click(e=>{
                                                  $(e.currentTarget).parent().parent().remove();
                                              })
                                          })
                                          if(!formActive.get('experienceInfo')){
                                              formActive.set('expInfo',experienceContainer);
                                              tabActiveList.set('tabExp',tabExperience);
                                          }
                                      });
                                  console.log(formData);

                          }else if(event.currentTarget.id === 'form_experience'){ // ==================  experience info
                              //object creation
                              const rawExperienceInfo = new FormOperation(event.target.elements);
                                  formData["experienceInfo"] = rawExperienceInfo.formDataPack;
                                  alert("Form data submitted successfully")
                              console.log(formData);
                          }
                      }

                      form.classList.add('was-validated')
                  }, false)
              })
          })();


          // ===========================back to the previous page
          // education
          (educationInfoContainer.find("[name='back']")).click(()=> educationInfoContainer.hide(0,()=>personalInfoContainer.show()));

          // training
          (trainingInfoContainer.find("[name='back']")).click(()=> trainingInfoContainer.hide(0,()=>educationInfoContainer.show()));

          //experience
          (experienceContainer.find("[name='back']")).click(() => experienceContainer.hide(0,()=>trainingInfoContainer.show()));


          // ================================tab handler
          $('form').submit(()=>tabActivate())
          $(document).click(()=>tabActivate())
          function tabActivate(){
                  // jQuery methods go here...
                  tabActivated(tabActiveList);
                  tabVisibility();

                  if(formActive.get('personalInfo')){

                      tabPersonalInfo.click(e=>{
                          switchTab(formActive,personalInfoContainer);
                      })
                  }


                  if(formActive.get('educationInfo')){
                      tabEducation.click(e=>{
                          switchTab(formActive,educationInfoContainer);
                      })
                  }

                  if(formActive.get('trainingInfo')){
                      tabTraining.click(e=>{
                          switchTab(formActive,trainingInfoContainer);
                      })
                  }

                  if(formActive.get('expInfo')){
                      tabExperience.click(e=>{
                          switchTab(formActive,experienceContainer);
                      })
                  }
              }



          // ++++++++++++++++++++++++++   add more field
          // for education info
          const addMoreEdu = new CloneFields($('#form_education .input-edu-container'),btnAddEdu,'<p class="my-0 "><strong class="h3">More Academic Info</strong></p>');

          btnAddEdu.click(e=>{
            addMoreEdu.formClone();
            $('#form_education .btn-close').click(e=>{
              $(e.currentTarget).parent().parent().remove();
            })
          })

          // for training info
          const addMoreTrain = new CloneFields($('#training_info_container .input-train-container'),btnAddTraining,'<p class="my-0 "><strong class="h3">More Training Info</strong></p>');

          btnAddTraining.click(e=>{
              addMoreTrain.formClone();
              $('#training_info_container .btn-close').click(e=>{
                  $(e.currentTarget).parent().parent().remove();
              })
          });

          // add more experience info
          const addMoreExperience = new CloneFields($('#form_experience .input-xp-container'),btnAddExp,'<p class="my-0 "><strong class="h3">More Experience Info</strong></p>');

          btnAddExp.click(e=>{
              addMoreExperience.formClone(addMoreExperience.counter);
              addMoreExperience.counter++;

              //job validation
              $(`[data-job-condition="present"]`).click(e=>{
                  jobStatusValidation(e);
              });

              $('#form_experience .btn-close').click(e=>{
                  $(e.currentTarget).parent().parent().remove();
              })
          });



          })// main loader ending tag


        // ============================bootstrap toast functions
        $(document).ready(function(){
            $("#liveToast").toast({
                autohide: false
            });
        });




        // if (toastTrigger) {
        //     const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
        //     toastTrigger.addEventListener('click', () => {
        //
        //     })
        // }
    </script>


@endsection
