@extends('front.layout.index')
@section('content')

<style>
    .sssuccesstext{
        color: #719f44;
    }

.list-group-item.d-flex strong{
    color: #000;
}
.withdraw_box button{
    background-color: #9ad953;
    border-color: #9ad953;
    padding: 10px 20px;
    color: #fff;
    border-radius: 15px 0px 15px 0px;
}
</style>


    <!--dashboard start-->
    <section class="privacy-policy mt-20 pt-120 pb-120">
        <div class="container">
            <div class="row">

                {{-- @php
    
    echo "<pre>";
        print_r(calculateUserEarningsWithCustomRates(Auth::user()->id));
        echo "</pre>";

@endphp --}}

                <div class="col-lg-4 nb3-bg rounded-4 p-4">
                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link mb-3" id="v-pills-Dashboard-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-Dashboard" type="button" role="tab" aria-controls="v-pills-wallet"
                            aria-selected="false">
                            Dashboard
                        </button>
                        <button class="nav-link active mb-3" id="v-pills-Profile-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-Profile" type="button" role="tab" aria-controls="v-pills-Profile"
                            aria-selected="true">
                            Profile
                        </button>
                        <button class="nav-link mb-3" id="v-pills-Bank-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-Bank" type="button" role="tab" aria-controls="v-pills-Bank"
                            aria-selected="false">
                            Bank Details
                        </button>
                        <button class="nav-link" id="history-tab" data-bs-toggle="tab" data-bs-target="#history"
                            type="button" role="tab" aria-controls="history" aria-selected="false">
                            Investment History
                        </button>
                        <button class="nav-link mb-3" id="v-pills-wallet-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-wallet" type="button" role="tab" aria-controls="v-pills-wallet"
                            aria-selected="false">
                            Deposite Amount
                        </button>
                        <button class="nav-link mb-3" id="v-pills-Invested-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-Invested" type="button" role="tab"
                            aria-controls="v-pills-Invested" aria-selected="false">
                            Invested Amount
                        </button>
                        <button class="nav-link mb-3" id="v-pills-Withdrawals-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-Withdrawals" type="button" role="tab"
                            aria-controls="v-pills-Withdrawals" aria-selected="false">
                            Withdrawals
                        </button>
                        <button class="nav-link mb-3" id="v-pills-Bank-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-refreal" type="button" role="tab" aria-controls="v-pills-Bank"
                            aria-selected="false">
                            Share and earn
                        </button>
                        <button class="nav-link mb-3" id="v-pills-changepassword-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-changepassword" type="button" role="tab"
                            aria-controls="v-pills-changepassword" aria-selected="false">
                            Change Password
                        </button>


                        <hr />
                        <div class="text-center">
                            <a href="/userlogout" class="nav-link"> Logout </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="tab-content" id="v-pills-tabContent">
                        <!-- Profile Tab -->
                        <div class="tab-pane fade show active" id="v-pills-Profile" role="tabpanel"
                            aria-labelledby="v-pills-Profile-tab">
                            <div class="comments-form cus-rounded-1 nb3-bg">
                                <form method="POST" autocomplete="off" id="profile_form" enctype="multipart/form-data"
                                    class="message__form p-4 p-lg-8">
                                    @csrf
                                    <h6 class="message__title  text-warning">Profile</h6>
                                    <div class="show_profile">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <div class="profile-card text-center mb-4">
                                                {{-- @if (Auth::user()->image)
      <img src="{{ url('uploads/profile_photos') }}/{{ Auth::user()->image }}" id="profile-pic" class="profile-img" alt="Profile Picture">
     
     @if (Auth::user()->kyc_status == 'complete')
     <img src="{{ url('') }}/admin/tick-mark.png" class="png_verified" alt="">
     @endif 
      @else
      <img src="{{ url('uploads/profile_photos') }}/profile.png" id="profile-pic" class="profile-img" alt="Profile Picture">
      @if (Auth::user()->kyc_status == 'complete')
      <img src="{{ url('') }}/admin/tick-mark.png" class="png_verified" alt="">
      @endif       @endif --}}
                                                <h4 id="user-name" class="mt-1">{{ Auth::user()->name ?? '' }}</h4>
                                                <p id="user-email" class="mt-1">{{ Auth::user()->email ?? '' }}</p>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex gap-7 gap-lg-8 flex-column">
                                        <div class="row gy-4">
                                            <!-- First Name -->
                                            <div class="col-lg-6">
                                                <div class="single-input">
                                                    <label class="label fw_500 nw1-color mb-4" for="first_name">First
                                                        Name</label>
                                                    <input type="text" class="fs-seven" name="first_name"
                                                        value="{{ Auth::user()->first_name ?? '' }}" id="first_name"
                                                        placeholder="First Name" 
                                                         @if (isset(Auth::user()->first_name) && Auth::user()->kyc_status == 'complete') readonly @endif required />
                                                    <span class="text-danger error" id="error_first_name"></span>
                                                </div>
                                            </div>
                                            <!-- Last Name -->
                                            <div class="col-lg-6">
                                                <div class="single-input">
                                                    <label class="label fw_500 nw1-color mb-4" for="last_name">Last
                                                        Name</label>
                                                    <input type="text" class="fs-seven" name="last_name"
                                                        id="last_name"  value="{{ Auth::user()->last_name ?? '' }}"
                                                         @if (isset(Auth::user()->last_name) && Auth::user()->kyc_status == 'complete') readonly @endif 
                                                        placeholder="Last Name" required />
                                                    <span class="text-danger error" id="error_last_name"></span>
                                                </div>
                                            </div>



                                            <!-- Email -->
                                            <div class="col-lg-6">
                                                <div class="single-input">
                                                    <label class="label fw_500 nw1-color mb-4"
                                                        for="email">Email</label>
                                                    <input type="email" class="fs-seven" name="email" id="email"
                                                        value="{{ Auth::user()->email ?? '' }}" placeholder="Your Email"
                                                         @if (isset(Auth::user()->email) && Auth::user()->kyc_status == 'complete') readonly @endif
                                                        required />
                                                    <span class="text-danger error" id="error_email"></span>
                                                </div>
                                            </div>


                                            <!-- phone -->
                                            <div class="col-lg-6">
                                                <div class="single-input">
                                                    <label class="label fw_500 nw1-color mb-4"
                                                        for="email">Phone</label>
                                                    <input type="number" class="fs-seven" name="phone" id="email"
                                                        value="{{ Auth::user()->phone ?? '' }}" 
                                                        @if (isset(Auth::user()->phone) && Auth::user()->kyc_status == 'complete') readonly @endif
                                                        required />
                                                    <span class="text-danger error" id="error_phone"></span>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="single-input">
                                                    <label class="label fw_500 nw1-color mb-4" for="file">Profile
                                                        Image</label>
                                                    <input type="file"  class="fs-seven"
                                                     @if (isset(Auth::user()->image) && Auth::user()->kyc_status == 'complete') disabled @endif accept="image/*"
                                                        name="profile_photo" id="file" />
                                                    <span class="text-danger error" id="error_image"></span>
                                                </div>
                                            </div>

                                            {{-- <!-- Password -->
                          <div class="col-lg-6">
                              <div class="single-input">
                                  <label class="label fw_500 nw1-color mb-4" for="password">Password</label>
                                  <div class="formppi">
                                      <input type="password" class="fs-seven" name="password" id="password" placeholder="Your Password" />
                                  <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M19 10H20C20.5523 10 21 10.4477 21 11V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V11C3 10.4477 3.44772 10 4 10H5V9C5 5.13401 8.13401 2 12 2C15.866 2 19 5.13401 19 9V10ZM5 12V20H19V12H5ZM11 14H13V18H11V14ZM17 10V9C17 6.23858 14.7614 4 12 4C9.23858 4 7 6.23858 7 9V10H17Z"></path></svg></span>
                                  </div>
                                  <span class="text-danger error" id="error_password"></span>
                              </div>
                          </div>
                          <!-- New Password -->
                          <div class="col-lg-6">
                              <div class="single-input">
                                  <label class="label fw_500 nw1-color mb-4" for="new_password">New Password</label>
                                     <div class="formppi">
                                  <input type="password" class="fs-seven" name="new_password" id="new_password" placeholder="New Password" />
                                  <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M19 10H20C20.5523 10 21 10.4477 21 11V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V11C3 10.4477 3.44772 10 4 10H5V9C5 5.13401 8.13401 2 12 2C15.866 2 19 5.13401 19 9V10ZM5 12V20H19V12H5ZM11 14H13V18H11V14ZM17 10V9C17 6.23858 14.7614 4 12 4C9.23858 4 7 6.23858 7 9V10H17Z"></path></svg></span>
                                  </div>
                                  <span class="text-danger error" id="error_new_password"></span>
                              </div>
                          </div>
                          <!-- Confirm Password -->
                          <div class="col-lg-6">
                              <div class="single-input">
                                  <label class="label fw_500 nw1-color mb-4" for="password_confirmation">Confirm Password</label>
                               
                               <label class="label fw_500 nw1-color mb-4" for="new_password">New Password</label>
                                     <div class="formppi">
                                  <input type="password" class="fs-seven" name="new_password_confirmation" id="password_confirmation" placeholder="Confirm Password" />
                                  <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M19 10H20C20.5523 10 21 10.4477 21 11V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V11C3 10.4477 3.44772 10 4 10H5V9C5 5.13401 8.13401 2 12 2C15.866 2 19 5.13401 19 9V10ZM5 12V20H19V12H5ZM11 14H13V18H11V14ZM17 10V9C17 6.23858 14.7614 4 12 4C9.23858 4 7 6.23858 7 9V10H17Z"></path></svg></span>
                                  </div>
                                  <span class="text-danger error" id="error_new_password_confirmation"></span>
                              </div>
                          </div> --}}
                                        </div>
                                    </div>

                                    <h6 class="message__title text-warning mb-4">Nominee Details</h6>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="single-input">
                                                <label class="label fw_500 nw1-color mb-4" for="nominee_name">Nominee
                                                    Name</label>
                                                <input type="text" class="fs-seven" name="nominee_name"
                                                    value="{{ Auth::user()->nominee_name }}" id="nominee_name"
                                                    placeholder="Nominee Name"
                                                    @if (Auth::user()->nominee_name && Auth::user()->kyc_status == 'complete') readonly @endif />
                                                <span class="text-danger error" id="error_nominee_name"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="single-input">
                                                <label class="label fw_500 nw1-color mb-4" for="nominee_relation">Relation
                                                    with Nominee</label>
                                                <input type="text" class="fs-seven" name="nominee_relation"
                                                    value="{{ Auth::user()->nominee_relation }}"
                                                    placeholder="Relation with Nominee"
                                                    @if (Auth::user()->nominee_relation && Auth::user()->kyc_status == 'complete') readonly @endif />
                                                <span class="text-danger error" id="error_nominee_relation"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="single-input">
                                                <label class="label fw_500 nw1-color mb-4" for="nominee_age">Nominee
                                                    Age</label>
                                                <input type="number" class="fs-seven" name="nominee_age"
                                                    value="{{ Auth::user()->nominee_age }}" placeholder="Nominee Age"
                                                    @if (Auth::user()->nominee_age && Auth::user()->kyc_status == 'complete') readonly @endif />
                                                <span class="text-danger error" id="error_nominee_age"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="single-input">
                                                <label class="label fw_500 nw1-color mb-4" for="nominee_contact">Nominee
                                                    Contact</label>
                                                <input type="number" class="fs-seven" name="nominee_contact"
                                                    value="{{ Auth::user()->nominee_contact }}"
                                                    placeholder="Nominee Contact"
                                                    @if (Auth::user()->nominee_contact && Auth::user()->kyc_status == 'complete') readonly @endif />
                                                <span class="text-danger error" id="error_nominee_contact"></span>
                                            </div>
                                        </div>
                                    </div>





                                    <span id="msg"></span>
                                    <button type="submit" class="cmn-btn py-3 px-5 px-lg-6 mt-8 mt-lg-10 d-flex ms-auto"
                                        name="submit" id="submit">
                                        Update<i class="bi bi-arrow-up-right"></i>
                                    </button>
                                </form>


                            </div>
                        </div>



                        <div class="tab-pane fade show" id="v-pills-Dashboard" role="tabpaneal"
                            aria-labelledby="v-pills-Dashboard-tab">
                            <div class="comments-form cus-rounded-1 nb3-bg p-4">
                                <h6 class="message__title mb-8 mb-lg-10 text-warning">
                                    Dahboard
                                </h6>
                                @include('front.partials.userdashboard')
                            </div>
                        </div>

                        <!-- Bank Details Tab -->
                        <div class="tab-pane fade" id="v-pills-Bank" role="tabpanel" aria-labelledby="v-pills-Bank-tab">
                            <div class="comments-form cus-rounded-1 nb3-bg">
                                <form method="POST" autocomplete="off" id="updatebank" class="message__form p-4 p-lg-8"
                                    enctype="multipart/form-data">
                                    <h6 class="message__title mb-8 mb-lg-10 text-warning">Bank Details</h6>
                                    <div class="d-flex gap-7 gap-lg-8 flex-column">
                                        <div class="row gy-4">
                                            <!-- Bank Name -->
                                            <div class="col-lg-6">
                                                <div class="single-input">
                                                    <label class="label fw_500 nw1-color mb-4"
                                                        for="accountHolderName">Bank Name</label>
                                                    <input type="text" class="fs-seven" name="bank_name"
                                                        id="accountHolderName" {{ auth()->user()->bank_name && auth()->user()->kyc_status == 'complete' ? 'disabled' : '' }}
                                                        value="{{ auth()->user()->bank_name ?? '' }}"
                                                        />
                                                    <span class="text-danger error" id="error_bank_name"></span>
                                                </div>
                                            </div>

                                            <!-- Account Holder Name -->
                                            <div class="col-lg-6">
                                                <div class="single-input">
                                                    <label class="label fw_500 nw1-color mb-4"
                                                        for="accountHolderName">Account Holder Name</label>
                                                    <input type="text" class="fs-seven" name="account_holder_name"
                                                        id="accountHolderName" {{ auth()->user()->account_holder_name && auth()->user()->kyc_status == 'complete' ? 'disabled' : '' }}
                                                        value="{{ auth()->user()->account_holder_name ?? '' }}"
                                                        />
                                                    <span class="text-danger error" id="error_account_holder_name"></span>
                                                </div>
                                            </div>

                                            <!-- Account Number -->
                                            <div class="col-lg-6">
                                                <div class="single-input">
                                                    <label class="label fw_500 nw1-color mb-4" for="accountNumber">Account
                                                        Number</label>
                                                    <input type="text" class="fs-seven" name="account_number"
                                                        id="accountNumber" {{ auth()->user()->account_number && auth()->user()->kyc_status == 'complete' ? 'disabled' : '' }}
                                                        value="{{ auth()->user()->account_number ?? '' }}"
                                                       />
                                                    <span class="text-danger error" id="error_account_number"></span>
                                                </div>
                                            </div>

                                            <!-- IFSC Code -->
                                            <div class="col-lg-6">
                                                <div class="single-input">
                                                    <label class="label fw_500 nw1-color mb-4" for="ifscCode">IFSC
                                                        Code</label>
                                                    <input type="text" class="fs-seven" name="ifsc_code" {{ auth()->user()->ifsc_code && auth()->user()->kyc_status == 'complete' ? 'disabled' : '' }}
                                                        id="ifscCode" value="{{ auth()->user()->ifsc_code ?? '' }}"
                                                         />
                                                    <span class="text-danger error" id="error_ifsc_code"></span>
                                                </div>
                                            </div>

                                            <!-- Branch Name -->
                                            <div class="col-lg-6">
                                                <div class="single-input">
                                                    <label class="label fw_500 nw1-color mb-4" for="branchName">Branch
                                                        Name</label>
                                                    <input type="text" class="fs-seven" name="branch_name" {{ auth()->user()->branch_name && auth()->user()->kyc_status == 'complete' ? 'disabled' : '' }}
                                                        id="branchName" value="{{ auth()->user()->branch_name ?? '' }}"
                                                       />
                                                    <span class="text-danger error" id="error_branch_name"></span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <hr />
                                    <input type="text" name="type" value="updatebank" hidden>
                                    <span id="msg"></span>
                                    <button type="submit" id="updatesubmitbuton"
                                        class="cmn-btn py-3 px-5 px-lg-6 mt-8 mt-lg-10 d-flex ms-auto" id="submit">
                                        Submit<i class="bi bi-arrow-up-right"></i>
                                    </button>
                                </form>
                                <form method="POST" autocomplete="off" id="applykyc" class="message__form p-4 p-lg-8"
                                    enctype="multipart/form-data">
                                    <h6 class="message__title mb-8 mb-lg-10 text-warning pt-5">Add KYC</h6>
                                    <hr />
                                    <div class="d-flex gap-7 gap-lg-8 flex-column">
                                        <div class="row gy-4">
                                            <!-- Aadhar Card Number -->
                                            <div class="col-12">
                                                @if (Auth::user()->kyc_status == 'apply')
                                                    <div class="alert alert-warning alert-dismissible fade show"
                                                        role="alert">
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                        {{ Auth::user()->kyc_reason }}
                                                    </div>
                                                @elseif(Auth::user()->kyc_status == 'reject')
                                                    <div class="alert alert-danger alert-dismissible fade show"
                                                        role="alert">
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                        {{ Auth::user()->kyc_reason }}
                                                    </div>
                                                @elseif(Auth::user()->kyc_status == 'complete')
                                                    <div class="alert alert-success bg-success text-white alert-dismissible fade show border-0"
                                                        role="alert">
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                        {{ Auth::user()->kyc_reason }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="single-input">
                                                    <label class="label fw_500 nw1-color mb-4" for="aadharNumber">Aadhar
                                                        Card Number</label>
                                                    <input type="text" class="fs-seven" name="aadhar_card_number"
                                                        id="aadharNumber"
                                                        value="{{ auth()->user()->aadhar_card_number ?? '' }}"
                                                        @if (auth()->user()->kyc_status == 'complete' || auth()->user()->kyc_status == 'apply') readonly @endif />
                                                    <span class="text-danger error" id="error_aadhar_card_number"></span>
                                                </div>
                                            </div>
                                            <!-- Aadhar Card Upload -->
                                            <div class="col-lg-6">
                                                <div class="single-input">
                                                    <label class="label fw_500 nw1-color mb-4" for="aadharUpload">Aadhar
                                                        Front Image</label>
                                                    <input type="file" class="fs-seven" name="aadhar_card"
                                                        id="aadharUpload" accept=".jpg,.jpeg,.png,.pdf"
                                                        @if (auth()->user()->kyc_status == 'complete') disabled @endif />
                                                    <span class="text-danger error" id="error_aadhar_card"></span>
                                                </div>
                                            </div>
                                            
                                            

                                            <div class="col-lg-6">
                                                <div class="single-input">
                                                    <label class="label fw_500 nw1-color mb-4" for="aadharUpload">Aadhar
                                                        Back Image</label>
                                                    <input type="file" class="fs-seven" name="aadhar_card_back"
                                                        id="aadharUpload" accept=".jpg,.jpeg,.png,.pdf"
                                                        @if (auth()->user()->kyc_status == 'complete') disabled @endif />
                                                    <span class="text-danger error" id="error_aadhar_card"></span>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="single-input">
                                                    <label class="label fw_500 nw1-color mb-4" for="aadharUpload">Bank
                                                        Passbook Photo</label>
                                                    <input type="file" class="fs-seven" name="cancel_chaque"
                                                        id="aadharUpload" accept=".jpg,.jpeg,.png,.pdf"
                                                        @if (auth()->user()->kyc_status == 'complete') disabled @endif />
                                                    <span class="text-danger error" id="error_aadhar_card"></span>
                                                </div>
                                            </div>
                                            <!-- PAN Number -->
                                            <div class="col-lg-6">
                                                <div class="single-input">
                                                    <label class="label fw_500 nw1-color mb-4" for="panNumber">PAN
                                                        Number</label>
                                                    <input type="text" class="fs-seven" name="pan_number"
                                                        id="panNumber" value="{{ auth()->user()->pan_number ?? '' }}"
                                                        @if (auth()->user()->kyc_status == 'complete') readonly @endif />
                                                    <span class="text-danger error" id="error_pan_number"></span>
                                                </div>
                                            </div>
                                            <!-- PAN Card Upload -->
                                            <div class="col-lg-6">
                                                <div class="single-input">
                                                    <label class="label fw_500 nw1-color mb-4" for="panUpload">PAN Card
                                                        Upload</label>
                                                    <input type="file" class="fs-seven" name="pan_card"
                                                        id="panUpload" accept=".jpg,.jpeg,.png,.pdf"
                                                        @if (auth()->user()->kyc_status == 'complete') disabled @endif />
                                                    <span class="text-danger error" id="error_pan_card"></span>
                                                </div>
                                            </div>
                                            
                                                <div class="col-lg-12">
                                                <div class="single-input">
                                                    <label class="label fw_500 nw1-color mb-4" for="panUpload">Bank Passbook/ Cancel Chque photo
                                                        Upload</label>
                                                    <input type="file" class="fs-seven" name="bank_identity"
                                                        id="panUpload" accept=".jpg,.jpeg,.png,.pdf"
                                                        @if (auth()->user()->kyc_status == 'complete') disabled @endif />
                                                    <span class="text-danger error" id="error_pan_card"></span>
                                                </div>
                                            </div>

                                            <!-- Display existing uploaded images -->
                                            @if (isset(Auth::user()->aadhar_card))
                                                <div class="col-lg-6">
                                                    <div class="single-input">
                                                        <label class="label fw_500 nw1-color mb-4">Aadhar Card Front
                                                            Photo</label>
                                                        <img src="{{ url('') }}/{{ Auth::user()->aadhar_card }}"
                                                            class="img-thumbnail" width="100px" height="80px"
                                                            alt="">
                                                    </div>
                                                </div>
                                            @endif

                                            @if (isset(Auth::user()->aadhar_card_back))
                                                <div class="col-lg-6">
                                                    <div class="single-input">
                                                        <label class="label fw_500 nw1-color mb-4">Aadhar Card Back
                                                            Photo</label>
                                                        <img src="{{ url('') }}/{{ Auth::user()->aadhar_card_back }}"
                                                            class="img-thumbnail" width="100px" height="80px"
                                                            alt="">
                                                    </div>
                                                </div>
                                            @endif

                                            @if (isset(Auth::user()->pan_card))
                                                <div class="col-lg-6">
                                                    <div class="single-input">
                                                        <label class="label fw_500 nw1-color mb-4">Pan Card Photo</label>
                                                        <img src="{{ url('') }}/{{ Auth::user()->pan_card }}"
                                                            class="img-thumbnail" width="100px" height="80px"
                                                            alt="">
                                                    </div>
                                                </div>
                                            @endif

                                            @if (isset(Auth::user()->cancel_chaque))
                                                <div class="col-lg-6">
                                                    <div class="single-input">
                                                        <label class="label fw_500 nw1-color mb-4"> Bank Passbook
                                                            Photo</label>
                                                        <img src="{{ url('') }}/{{ Auth::user()->cancel_chaque }}"
                                                            class="img-thumbnail" width="100px" height="80px"
                                                            alt="">
                                                    </div>
                                                </div>
                                            @endif
                                          
                                          
                                            @if (isset(Auth::user()->bank_identity))
                                                <div class="col-lg-6">
                                                    <div class="single-input">
                                                        <label class="label fw_500 nw1-color mb-4"> Bank Passbook/ Cancel Chque photo</label>
                                                        <img src="{{ url('') }}/{{ Auth::user()->bank_identity }}"
                                                            class="img-thumbnail" width="100px" height="80px"
                                                            alt="">
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <input type="text" name="type" value="kyc" hidden>
                                    <span id="msg"></span>
                                    <button type="submit" id="updatesubmitbutonkyc"
                                        class="cmn-btn py-3 px-5 px-lg-6 mt-8 mt-lg-10 d-flex ms-auto" id="submit">
                                        Submit<i class="bi bi-arrow-up-right"></i>
                                    </button>
                                </form>
                            </div>
                        </div>



<!--   history tab -->

   <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h5 class="card-title">Your Investment History</h5>
                        <p>View your complete investment history including interest rate changes and earnings.</p>
                        <a href="{{ route('investment.history') }}" class="btn btn-primary">View Full History</a>
                        
                        @php
                            // Get recent history items (limit to 5)
                            $investments = App\Models\Invest::where('userid', Auth::id())
                                ->orderBy('created_at', 'desc')
                                ->limit(3)
                                ->get();
                                
                            $customRates = App\Models\CustomInterestRate::where('userid', Auth::id())
                                ->orderBy('effective_date', 'desc')
                                ->limit(3)
                                ->get();
                        @endphp
                        
                        <div class="recent-history mt-4">
                            <h6>Recent Investments</h6>
                            @if(count($investments) > 0)
                                <div class="table-responsive">
                                    <table class="table table-dark table-striped">
                                        <thead>
                                            <tr>
                                                <th>Package</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                                <th>Interest Rate</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($investments as $investment)
                                                <tr>
                                                    <td>
                                                        @if($investment->package_id == 0)
                                                            Normal Package
                                                        @else
                                                            {{ $investment->package->category ?? 'N/A' }}
                                                        @endif
                                                    </td>
                                                    <td>₹{{ number_format($investment->amount, 2) }}</td>
                                                    <td>{{ $investment->created_at->format('d M Y') }}</td>
                                                    <td>{{ $investment->interest }}%</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p>No recent investments found.</p>
                            @endif
                            
                            @if(count($customRates) > 0)
                                <h6 class="mt-4">Recent Interest Rate Changes</h6>
                                <div class="table-responsive">
                                    <table class="table table-dark table-striped">
                                        <thead>
                                            <tr>
                                                <th>Original Rate</th>
                                                <th>New Rate</th>
                                                <th>Effective Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($customRates as $rate)
                                                <tr>
                                                    <td>{{ $rate->original_interest_rate }}%</td>
                                                    <td>{{ $rate->custom_interest_rate }}%</td>
                                                    <td>{{ \Carbon\Carbon::parse($rate->effective_date)->format('d M Y') }}</td>
                                                    <td>
                                                        <span class="badge bg-{{ $rate->status == 'active' ? 'success' : ($rate->status == 'expired' ? 'warning' : 'danger') }}">
                                                            {{ ucfirst($rate->status) }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




                        <!-- Change Password Tab -->
                        <div class="tab-pane fade" id="v-pills-changepassword" role="tabpanel"
                            aria-labelledby="v-pills-changepassword-tab">
                            <div class="comments-form cus-rounded-1 nb3-bg">
                                <form method="POST" action="{{ route('profile.update') }}" autocomplete="off"
                                    id="changepassword_form" enctype="multipart/form-data"
                                    class="message__form p-4 p-lg-8">
                                    @csrf
                                    <h6 class="message__title text-warning">Change Password</h6>
                                    <div class="d-flex gap-7 gap-lg-8 flex-column">
                                        <div class="row gy-4">
                                            <!-- Password -->
                                            <div class="col-lg-6">
                                                <div class="single-input">
                                                    <label class="label fw_500 nw1-color mb-4"
                                                        for="password">Password</label>
                                                    <div class="formppi">
                                                        <input type="password" class="fs-seven" name="password"
                                                            id="password" placeholder="Your Password" />
                                                        <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                fill="currentColor">
                                                                <path
                                                                    d="M19 10H20C20.5523 10 21 10.4477 21 11V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V11C3 10.44772 3.44772 10 4 10H5V9C5 5.13401 8.13401 2 12 2C15.866 2 19 5.13401 19 9V10ZM5 12V20H19V12H5ZM11 14H13V18H11V14ZM17 10V9C17 6.23858 14.7614 4 12 4C9.23858 4 7 6.23858 7 9V10H17Z">
                                                                </path>
                                                            </svg></span>
                                                    </div>
                                                    <span class="text-danger error" id="error_password"></span>
                                                </div>
                                            </div>
                                            <!-- New Password -->
                                            <div class="col-lg-6">
                                                <div class="single-input">
                                                    <label class="label fw_500 nw1-color mb-4" for="new_password">New
                                                        Password</label>
                                                    <div class="formppi">
                                                        <input type="password" class="fs-seven" name="new_password"
                                                            id="new_password" placeholder="New Password" />
                                                        <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                fill="currentColor">
                                                                <path
                                                                    d="M19 10H20C20.5523 10 21 10.4477 21 11V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V11C3 10.44772 3.44772 10 4 10H5V9C5 5.13401 8.13401 2 12 2C15.866 2 19 5.13401 19 9V10ZM5 12V20H19V12H5ZM11 14H13V18H11V14ZM17 10V9C17 6.23858 14.7614 4 12 4C9.23858 4 7 6.23858 7 9V10H17Z">
                                                                </path>
                                                            </svg></span>
                                                    </div>
                                                    <span class="text-danger error" id="error_new_password"></span>
                                                </div>
                                            </div>
                                            <!-- Confirm Password -->
                                            <div class="col-lg-6">
                                                <div class="single-input">
                                                    <label class="label fw_500 nw1-color mb-4"
                                                        for="password_confirmation">Confirm Password</label>
                                                    <div class="formppi">
                                                        <input type="password" class="fs-seven"
                                                            name="new_password_confirmation" id="password_confirmation"
                                                            placeholder="Confirm Password" />
                                                        <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                fill="currentColor">
                                                                <path
                                                                    d="M19 10H20C20.5523 10 21 10.4477 21 11V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V11C3 10.44772 3.44772 10 4 10H5V9C5 5.13401 8.13401 2 12 2C15.866 2 19 5.13401 19 9V10ZM5 12V20H19V12H5ZM11 14H13V18H11V14ZM17 10V9C17 6.23858 14.7614 4 12 4C9.23858 4 7 6.23858 7 9V10H17Z">
                                                                </path>
                                                            </svg></span>
                                                    </div>
                                                    <span class="text-danger error"
                                                        id="error_new_password_confirmation"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="cmn-btn py-3 px-5 px-lg-6 mt-8 mt-lg-10 d-flex ms-auto">
                                        Update <i class="bi bi-arrow-up-right"></i>
                                    </button>
                                </form>
                            </div>
                        </div>



                        <!-- Referral Tab -->
                        <div class="tab-pane fade" id="v-pills-refreal" role="tabpanel"
                            aria-labelledby="v-pills-Bank-tab">
                            <div class="comments-form cus-rounded-1 nb3-bg text-center p-4 p-lg-8">
                                <h6 class="message__title mb-4 text-warning">Share and Earn</h6>

                                <!-- Referral Image -->
                                <img src="{{ url('website/assets/images/refer-friend-concept-illustration_114360-7039.avif') }}"
                                    alt="Refer & Earn" width="600" class="img-fluid mb-4"
                                    style="max-width: 100%; border-radius: 10px;">
                                <div class="mb-3">
                                    <a href="/referral-list">Referral List</a>
                                </div>
                                <!-- Share & Copy Link Buttons -->
                                <div class="d-flex justify-content-center gap-3">
                                    <!-- WhatsApp Share Button -->
                                    <button type="button" class="btn btn-primary py-3 px-5" id="whatsappShare">
                                        Share Now <i class="fa-solid fa-share"></i>
                                    </button>

                                    <!-- Copy Link Button -->
                                    <button type="button" class="btn btn-secondary py-3 px-5"
                                        onclick="copyReferralLink()">
                                        Copy Link <i class="fa-solid fa-copy"></i>
                                    </button>
                                </div>

                                <!-- Clickable Referral Link -->
                                <p class="mt-3">
                                    <strong>Your Referral Link:</strong>
                                    <a href="{{ url('') }}/sign-up?ref={{ Auth::user()->id }}" target="_blank"
                                        id="referralLink" class="text-primary">
                                        {{ url('') }}/sign-up?ref={{ Auth::user()->id }}
                                    </a>
                                </p>

                                <!-- Copy Success Message -->
                                <p id="copyMessage" class="text-success mt-2" style="display: none;">Link copied
                                    successfully!</p>
                            </div>
                        </div>


                        <!-- Bank Details Tab -->
                        <div class="tab-pane fade" id="v-pills-wallet" role="tabpanel"
                            aria-labelledby="v-pills-wallet-tab">
                            <div class="comments-form cus-rounded-1 nb3-bg">
                                <form method="POST" autocomplete="off" id="walletForm" class="message__form p-4 p-lg-8"
                                    enctype="multipart/form-data">

                                    @csrf
                                    {{-- <h6 class="message__title mb-8 mb-lg-10 text-warning">Wallet</h6> --}}

                                    <div class="d-flex gap-7 gap-lg-8 flex-column">
                                        <div class="row gy-4">
                                            <!-- Wallet Balance -->
                                            <div class="col-12">
                                                <div class="available_blance">Deposite Amount:
                                                    <span class="text-white">Rs.{{ Auth::user()->wallet ?? 0 }}</span>
                                                </div>
                                            </div>

                                            <!-- QR Code -->
                                            <div class="col-lg-12">
                                                <?php
                                                $bankdetail = DB::table('webinfo')
                                                    ->where('id', 5)
                                                    ->first();

                                                  
                                                $row = json_decode($bankdetail->info_one);
                                                
                                                ?>


                                                <div class="single-input text-center">
    <label class="label fw_500 nw1-color mb-4">Make A Payment Using This QR Code</label>
    <div class="qrcodebox">
        <img src="{{ url('uploads') }}/{{ $bankdetail->banner }}" class="qrcodeimagewallet" alt="QR Code">
    </div>

    @if (!empty(upiid()))
        <div class="upiiduserpanel mt-2 mb-4">
            <span class="copytextupiid" id="copytextupiid">{{ upiid() }}</span>
            <div class="copyupiid" id="copyupiid">
                <svg width="15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M6.9998 6V3C6.9998 2.44772 7.44752 2 7.9998 2H19.9998C20.5521 2 20.9998 2.44772 20.9998 3V17C20.9998 17.5523 20.5521 18 19.9998 18H16.9998V20.9991C16.9998 21.5519 16.5499 22 15.993 22H4.00666C3.45059 22 3 21.5554 3 20.9991L3.0026 7.00087C3.0027 6.44811 3.45264 6 4.00942 6H6.9998ZM5.00242 8L5.00019 20H14.9998V8H5.00242ZM8.9998 6H16.9998V16H18.9998V4H8.9998V6Z"></path>
                </svg>
            </div>
        </div>
    @endif

    @if(!empty($bankdetail->account_holder_name))
<div class="card mt-4 shadow border-0 mb-3">
    <div class="card-header bg-gradient-primary text-white d-flex align-items-center" style="background: #719f44">
        <i class="fas fa-university me-2"></i>
        <h5 class="mb-0">Bank Transfer Details</h5>
    </div>
    <div class="card-body bg-light">
        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span><i class="fas fa-user me-2 sssuccesstext"></i><strong>Account Holder:</strong></span>
                <span>{{ $bankdetail->account_holder_name }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span><i class="fas fa-hashtag me-2 sssuccesstext"></i><strong>Account Number:</strong></span>
                <span>{{ $bankdetail->account_number }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span><i class="fas fa-code me-2 sssuccesstext"></i><strong>IFSC Code:</strong></span>
                <span>{{ $bankdetail->ifsc_code }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span><i class="fas fa-building me-2 sssuccesstext"></i><strong>Bank Name:</strong></span>
                <span>{{ $bankdetail->bank_name }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span><i class="fas fa-map-marker-alt me-2 sssuccesstext"></i><strong>Branch:</strong></span>
                <span>{{ $bankdetail->branch_name }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span><i class="fas fa-location-arrow me-2 sssuccesstext"></i><strong>Bank Address:</strong></span>
                <span>{{ $bankdetail->bank_address }}</span>
            </li>
        </ul>
    </div>
</div>
@endif


</div>

                                            </div>

                                            <!-- Amount -->
                                            <div class="col-lg-12 mt-0">
                                                <div class="single-input">
                                                    <label class="label fw_500 nw1-color mb-4"
                                                        for="amount">Amount</label>
                                                    <input type="text" class="fs-seven" name="amount"
                                                        id="amount" />
                                                    <span class="text-danger error" id="error_amount"></span>
                                                </div>
                                            </div>

                                            <!-- Transaction ID -->
                                            <div class="col-lg-12 mt-0">
                                                <div class="single-input">
                                                    <label class="label fw_500 nw1-color mb-4" for="transaction_id">UTR /
                                                        Transaction ID</label>
                                                    <input type="text" class="fs-seven" name="transaction_id"
                                                        id="transaction_id" />
                                                    <span class="text-danger error" id="error_transaction_id"></span>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 mt-0">
                                                <div class="single-input">
                                                    <label class="label fw_500 nw1-color mb-4" for="file">Upload
                                                        Payment Screenshot</label>
                                                    <input type="file" class="fs-seven" accept="image/*"
                                                        name="image" id="file" />
                                                    <span class="text-danger error" id="error_image"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <span id="msg"></span>
                                    <button type="submit" id="submitWallet"
                                        class="cmn-btn py-3 px-5 px-lg-6 mt-8 mt-lg-10 d-flex ms-auto">
                                        Submit <i class="bi bi-arrow-up-right"></i>
                                    </button>
                                </form>


                            </div>
                        </div>

                        <!-- Invested Amount Tab -->
                        <div class="tab-pane fade" id="v-pills-Invested" role="tabpanel"
                            aria-labelledby="v-pills-Invested-tab">
                            <div class="comments-form cus-rounded-1 nb3-bg">
                                <div class="container">
                                    <div class="row">

                                        @php
                                            $mywinning = 0;
                                            $daily_earningT = 0;
                                            $earning_amountT = 0;
                                            $total_new_amountT = 0;
                                        @endphp



                                        @php

                                            $Mypackages = App\Models\Invest::with('package')
                                                ->where('userid', Auth::user()->id)
                                                ->where('completestatus', 'pending')
                                                ->get();

                                        @endphp

                                        @foreach ($Mypackages as $val)
                                            <div class="col-md-6 bg-dark p-4">
                                                @php
                                                    $investmentData = calculateInvestmentEarnings(
                                                        $val->id,
                                                        Auth::user()->id,
                                                    );
                                                    $mywithdrawal = App\Models\Withdraw::where('invest_id', $val->id)
                                                        ->where('userid', Auth::user()->id)
                                                        ->where('amount_cut', 'Y')
                                                        ->sum('amount');
                                                @endphp

                                                @if ($val->type == 'normal')
                                                    <div class="pricing-table purple">
                                                        <h2>Features:</h2>

                                                        <div class="earningampunt">Invest Date:
                                                            {{ \Carbon\Carbon::parse($val->created_at)->format('d-m-Y') }}
                                                        </div>
                                                        {{-- <div class="earningampunt">Daily Earning:
                                                            {{ number_format($investmentData['daily_earning'], 2) }}</div> --}}
                                                        {{-- <div class="earningampunt">Earning Amount: --}}
                                                            {{-- {{ number_format($investmentData['earning_amount'], 2) }}</div>
                                                        <div class="earningampunt">New Amount:
                                                            {{ number_format($investmentData['new_amount'], 2) }}</div> --}}

                                                        <!-- Display custom rate indicator if applicable -->
                                                        <div class="earningampunt">
                                                            Interest Rate:
                                                            @if ($investmentData['is_custom_rate'])
                                                                <span
                                                                    class="badge bg-success">{{ $investmentData['interest_rate'] }}%</span>
                                                                <small class="text-muted">(Custom rate, was
                                                                    {{ $investmentData['original_rate'] }}%)</small>
                                                            @else
                                                                <span>{{ $investmentData['interest_rate'] }}%</span>
                                                            @endif
                                                        </div>

                                                        <!-- Rest of the code remains the same -->
                                                        <div class="pricing-features">
                                                            <div class="feature">Interest: 6 - 7%</div>
                                                            <div class="feature">All Starter Package Features</div>
                                                            <div class="feature">Basic Risk Management Tools</div>
                                                            <div class="feature">Quarterly Portfolio Review</div>
                                                            <div class="feature">24/7 Customer Support</div>
                                                            <div class="feature">Monthly Portfolio Review</div>
                                                        </div>

                                                        <div class="price-tag">
                                                            <span class="symbol">₹</span>
                                                            <span class="amount" style="font-size: 20px;">1000 -
                                                                9999</span>
                                                            <span class="after">/ Month</span>
                                                        </div>

                                                        @include('front.partials.normel', ['val' => $val ,'newAmount' => $investmentData['new_amount']])
                                                    </div>
                                                @else
                                                    <!-- Similar changes for the else block -->
                                                    <div class="pricing-table purple">
                                                        <h2>Features:</h2>

                                                        <div class="earningampunt">Invest Date:
                                                            {{ \Carbon\Carbon::parse($val->created_at)->format('d-m-Y') }}
                                                        </div>
                                                        {{-- <div class="earningampunt">Daily Earning:
                                                            {{ number_format($investmentData['daily_earning'], 2) }}</div> --}}
                                                        {{-- <div class="earningampunt">Earning Amount:
                                                            {{ number_format($investmentData['earning_amount'], 2) }}</div>
                                                        <div class="earningampunt">New Amount:
                                                            {{ number_format($investmentData['new_amount'], 2) }}</div> --}}

                                                        <!-- Display custom rate indicator if applicable -->
                                                        <div class="earningampunt">
                                                            Interest Rate:
                                                            @if ($investmentData['is_custom_rate'])
                                                                <span
                                                                    class="badge bg-success">{{ $investmentData['interest_rate'] }}%</span>
                                                                <small class="text-muted">(Custom rate, was
                                                                    {{ $investmentData['original_rate'] }}%)</small>
                                                            @else
                                                                <span>{{ $investmentData['interest_rate'] }}%</span>
                                                            @endif
                                                        </div>

                                                        <div class="pricing-features">
                                                            <div class="feature mb-0">Interest:
                                                                <?= $val->package->interest_rate ?? '' ?> %</div>
                                                            <div class="feature mt-0"><?= $val->package->deac ?? '' ?>
                                                            </div>
                                                        </div>

                                                        <div class="price-tag">
                                                            <span
                                                                class="symbol"><?= $val->package->currency ?? '' ?></span>
                                                            <span class="amount"><?= $val->package->ammount ?? '' ?></span>
                                                            <span
                                                                class="after">/<?= $val->package->formate ?? '' ?></span>
                                                        </div>

                                                        @include('front.partials.normel', ['val' => $val , 'newAmount' => $investmentData['new_amount']])
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach

                                        <!-- Purple Table -->
                                        <div class="col-12" style="order:-1;">
                                       @php
    $result = getUserInvestmentSummary(Auth::user()->id);
    $totalReferralUsers = App\Models\User::where('refer_by', Auth::user()->id)->count();
@endphp

<div class="row">
    <div class=" col-md-6 align-items-center">
    {{-- <p>Total Daily Earning: {{ number_format($result['daily_earning'], 2) }}</p> --}}
  <div class="totalearningbox">
      <p>Total Invested: ₹{{ number_format($result['total_investment'], 2) }}</p>
    <p>Earning: ₹{{ number_format($result['earning_amount'], 2) }}</p>
    <p>Withdrawn: ₹{{ number_format($result['total_withdrawn'], 2) }}</p>
    <p>Trade Balance: ₹{{ number_format($result['wallet_balance'], 2) }}</p>

    <p>Total Referral Users: {{ $totalReferralUsers }}</p>
  </div>
</div>
<div class="col-md-6 d-flex align-items-center justify-content-center">
    <div class="withdraw_box text-center">
        <button     data-bs-toggle="modal"
      data-bs-target="#exampleModalwithdraw" onclick="updateWithdrawableAmount('{{ $result['wallet_balance'] ?? 0 }}')" class="btn btn-primary">Withdraw Now</button>
    </div>
    @include('front.partials.withdrawmodal')
</div>
</div>

                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Withdrawals Tab -->
                        <div class="tab-pane fade" id="v-pills-Withdrawals" role="tabpanel"
                            aria-labelledby="v-pills-Withdrawals-tab">
                            <div class="comments-form cus-rounded-1 nb3-bg p-5">
                                <div class="table-responsive">
                         <table class="table table-bordered  text-white" id="mywithdrawlist">
    <thead class="thead-dark">
        <tr>
            <th style="font-size: 12px;">#</th>
            <th style="font-size: 12px;">Name</th>
            <th style="font-size: 12px;">Withdrawal Date</th>
            <th style="font-size: 12px;">Reason</th>
            <th style="font-size: 12px;">Amount</th>
            <th style="font-size: 12px;">Admin Remark / UTR</th>
            <th style="font-size: 12px;">Verify Date</th>
            <th style="font-size: 12px;">Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($mywithdrawlist as $key => $value)
            <tr>
                <td style="font-size: 12px;">{{ $key + 1 }}</td>
                <td style="font-size: 12px;">{{ Auth::user()->name }}</td>
                <td style="font-size: 12px;">{{ $value->created_at->format('d M Y') }}</td>
                <td style="font-size: 12px;">{{ $value->reason }}</td>
                <td style="font-size: 12px;">₹{{ number_format($value->amount, 2) }}</td>
                <td style="font-size: 12px;">
                    {{ $value->remark ?? 'N/A' }}
                    @if ($value->status === 'complete' && $value->utr)
                        <br>
                        <small class="text-info">UTR: {{ $value->utr }}</small>
                    @endif
                </td>
                <td style="font-size: 12px;">
                    {{ $value->verify_time ? \Carbon\Carbon::parse($value->verify_time)->format('d M Y, h:i A') : 'Not Verified' }}
                </td>
                <td style="font-size: 12px;">
                    @if ($value->status === 'pending')
                        <span class="badge bg-warning text-dark">Pending</span>
                    @elseif($value->status === 'reject')
                        <span class="badge bg-danger">Rejected</span>
                    @elseif($value->status === 'complete')
                        <span class="badge bg-success">Completed</span>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center text-muted">No withdrawal requests found.</td>
            </tr>
        @endforelse
    </tbody>
</table>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--dashboard end -->

@section('footer')
    <script>
        $(document).ready(function() {
            $("#profile_form").on("submit", function(e) {
                e.preventDefault();

                $(".error").text(""); // Clear previous error messages

                let formData = new FormData(this); // Use FormData for file upload
                let submitButton = $("#submit");

                submitButton.prop("disabled", true).text("Updating...");

                $.ajax({
                    url: "{{ route('profile.update') }}",
                    type: "POST",
                    data: formData,
                    processData: false, // Required for FormData
                    contentType: false, // Required for FormData
                    success: function(response) {
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                            text: response.success,
                            confirmButtonText: "OK"
                        }).then(() => {
                            location.reload(); // Refresh the page on success
                        });

                        submitButton.prop("disabled", false).text("Update");
                    },
                    error: function(xhr) {
                        submitButton.prop("disabled", false).text("Update");

                        if (xhr.status === 422) { // Validation error
                            let errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $("#" + key).next(".error").text(value[0]);
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: "Something went wrong. Please try again later."
                            });
                        }
                    }
                });
            });

            // // Preview selected image before upload
            // $("#profile_photo").on("change", function () {
            //     let reader = new FileReader();
            //     reader.onload = function (e) {
            //         $("#photo_preview").attr("src", e.target.result).show();
            //     };
            //     reader.readAsDataURL(this.files[0]);
            // });
        });
    </script>


    <script>
        $(document).ready(function() {
            // Remove active tab from localStorage on page load
            localStorage.removeItem("activeTab");

            // Check if "activeTab" was set before reload (only for form submission)
            if (sessionStorage.getItem("activeTab") === "bank") {
                $("#v-pills-Bank-tab").addClass("active");
                $("#v-pills-Bank").addClass("show active");

                // Remove active class from Profile tab
                $("#v-pills-Profile-tab").removeClass("active");
                $("#v-pills-Profile").removeClass("show active");
            }



            $("#updatebank").on("submit", function(e) {
                e.preventDefault();
                let formData = new FormData(this);

                let submitButton = $("#updatesubmitbuton");

                // Disable the button and show loading text
                submitButton.prop("disabled", true).text("Updating...");

                $(".error").text("");

                // Append CSRF token manually
                formData.append('_token', '{{ csrf_token() }}');

                $.ajax({
                    url: "{{ route('update.bank') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Store active tab state in sessionStorage before reload
                        sessionStorage.setItem("activeTab", "bank");

                        submitButton.prop("disabled", false).text("Update");

                        Swal.fire("Success!", response.success, "success").then(() => {
                            location.reload();
                        });
                    },
                    error: function(xhr) {
                        $.each(xhr.responseJSON.errors, function(key, value) {
                            $("#error_" + key).text(value[0]);
                        });
                        submitButton.prop("disabled", false).text("Update");
                    }
                });
            });

            // Clear sessionStorage after 1 second (to prevent tab persistence on manual reload)
            setTimeout(() => {
                sessionStorage.removeItem("activeTab");
            }, 1000);
        });
    </script>


    <script>
        $(document).ready(function() {
            // Remove active tab from localStorage on page load
            localStorage.removeItem("activeTab");

            // Check if "activeTab" was set before reload (only for form submission)
            if (sessionStorage.getItem("activeTab") === "bank") {
                $("#v-pills-Bank-tab").addClass("active");
                $("#v-pills-Bank").addClass("show active");

                // Remove active class from Profile tab
                $("#v-pills-Profile-tab").removeClass("active");
                $("#v-pills-Profile").removeClass("show active");
            }



            $("#applykyc").on("submit", function(e) {
                e.preventDefault();
                let formData = new FormData(this);

                let submitButton = $("#updatesubmitbutonkyc");

                // Disable the button and show loading text
                submitButton.prop("disabled", true).text("Updating...");

                $(".error").text("");

                // Append CSRF token manually
                formData.append('_token', '{{ csrf_token() }}');

                $.ajax({
                    url: "{{ route('update.bank') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Store active tab state in sessionStorage before reload
                        sessionStorage.setItem("activeTab", "bank");

                        submitButton.prop("disabled", false).text("Update");

                        Swal.fire("Success!", response.success, "success").then(() => {
                            location.reload();
                        });
                    },
                    error: function(xhr) {
                        $.each(xhr.responseJSON.errors, function(key, value) {
                            $("#error_" + key).text(value[0]);
                        });
                        submitButton.prop("disabled", false).text("Update");
                    }
                });
            });

            // Clear sessionStorage after 1 second (to prevent tab persistence on manual reload)
            setTimeout(() => {
                sessionStorage.removeItem("activeTab");
            }, 1000);
        });
    </script>



    <script>
        $(document).ready(function() {
            $("#walletForm").on("submit", function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                $("#submitWallet").prop("disabled", true).text("Processing...");

                $.ajax({
                    url: "{{ route('wallet.store') }}", // Make sure this is the correct route
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // Check if the response is success
                        if (response.status == "success") {
                            Swal.fire("Success!", response.message, "success").then(() => {
                                // Reload the page after successful transaction
                                location.reload();
                            });
                        } else {
                            // Handle other statuses if needed
                            Swal.fire("Error!", "Something went wrong. Please try again.",
                                "error");
                        }

                        // Reset the form and UI elements
                        $("#walletForm")[0].reset();
                        $(".error").html("");
                        $("#submitWallet").prop("disabled", false).text("Submit");
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        $(".error").html("");



                        // Display validation errors next to the form fields
                        $.each(errors, function(key, value) {
                            $("#error_" + key).html(value[0]);
                        });

                        $("#submitWallet").prop("disabled", false).text("Submit");
                    },
                });
            });
        });
    </script>


    <script>
        function copyReferral() {
            let link = document.getElementById("referralLink");
            link.select();
            document.execCommand("copy");
            alert("Referral link copied!");
        }
    </script>

    <!-- JavaScript for WhatsApp Share -->
    <script>
        document.getElementById("whatsappShare").addEventListener("click", function() {
            let referralLink = "{{ url('') }}/sign-up/?ref={{ Auth::user()->id }}";
            let message = `Hey! Join using my referral link: ${referralLink}`;
            let whatsappUrl = `https://wa.me/?text=${encodeURIComponent(message)}`;
            window.open(whatsappUrl, "_blank");
        });
    </script>

    <!-- JavaScript for Copy Function -->
    <script>
        function copyReferralLink() {
            var referralLink = "{{ url('') }}/sign-up/?ref={{ Auth::user()->id }}"; // Dynamic referral link
            var tempInput = document.createElement("input");
            document.body.appendChild(tempInput);
            tempInput.value = referralLink;
            tempInput.select();
            document.execCommand("copy");
            document.body.removeChild(tempInput);

            // Show success message
            document.getElementById("copyMessage").style.display = "block";

            // Hide message after 2 seconds
            setTimeout(() => {
                document.getElementById("copyMessage").style.display = "none";
            }, 2000);
        }
    </script>

    <script>

        $(document).ready(function () {
    // Your existing send_otp click function here...

    // Restrict amount input
    $('#amountwithdraw').on('input', function () {
        let inputVal = parseFloat($(this).val());
        let maxAmount = parseFloat($('.send_otp').attr('max-am'));
        console.log(inputVal);

        if (inputVal > maxAmount) {
            Swal.fire({
                icon: 'warning',
                title: 'Limit Exceeded',
                text: 'The withdrawal amount should not exceed ₹' + maxAmount,
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            // Reset the value back
            $(this).val('');
        }
    });
});


        $(document).ready(function() {
            $(".send_otp").click(function() {
                let sendOtpBtn = $(this);
                let otpSection = sendOtpBtn.closest(".otp-section"); // Get the closest OTP section
                let otpBox = otpSection.find(".otp_box").first(); // Target the OTP input box
                let originalText = sendOtpBtn.text();

                sendOtpBtn.text("Sending...").prop("disabled", true);

                $.ajax({
                    url: "{{ route('send.otp') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        Swal.fire({
                            toast: true,
                            icon: 'success',
                            title: response.message,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        otpBox.removeClass("d-none"); // Show OTP input field
                        otpSection.find(".verify_otp").removeClass(
                        "d-none"); // Show Verify button
                        sendOtpBtn.addClass("d-none"); // Hide Send OTP button
                    },
                    error: function() {
                        Swal.fire({
                            toast: true,
                            icon: 'error',
                            title: 'Failed to send OTP. Please try again.',
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        sendOtpBtn.text(originalText).prop("disabled", false);
                    }
                });
            });

            $(".verify_otp").click(function() {
                let verifyBtn = $(this);
                let otpSection = verifyBtn.closest(".otp-section");
                let otpInput = otpSection.find(".otp_input").val();
                let originalText = verifyBtn.text();

                verifyBtn.text("Verifying...").prop("disabled", true);

                $.ajax({
                    url: "{{ route('verify.otp') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        otp: otpInput
                    },
                    success: function(response) {
                        Swal.fire({
                            toast: true,
                            icon: response.success ? 'success' : 'error',
                            title: response.message,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        if (response.success) {
                            otpSection.find(".submit_withdraw_qu").removeClass(
                            "d-none"); // Show Submit button
                            verifyBtn.addClass("d-none"); // Hide Verify button
                        } else {
                            verifyBtn.text(originalText).prop("disabled", false);
                        }
                    },
                    error: function() {
                        Swal.fire({
                            toast: true,
                            icon: 'error',
                            title: 'Error verifying OTP. Please try again.',
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        verifyBtn.text(originalText).prop("disabled", false);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#formwithdrawyy").on("keypress", function(event) {
                if (event.which === 13) { // Use `event.which` for better compatibility
                    event.preventDefault(); // Prevent form submission on Enter key
                }
            });
        });
    </script>


    <script>
        document.getElementById("copyupiid").addEventListener("click", function() {
            var upiText = document.getElementById("copytextupiid").innerText;

            // Copy to clipboard
            navigator.clipboard.writeText(upiText).then(() => {
                // Show SweetAlert notification
                Swal.fire({
                    icon: "success",
                    title: "Copied!",
                    text: "UPI ID copied to clipboard",
                    timer: 2000,
                    showConfirmButton: false
                });
            }).catch(err => {
                console.error('Failed to copy:', err);
            });
        });
    </script>

<script>
    function updateWithdrawableAmount(amount) {
        document.querySelector('.withdrableamountBB').textContent = '₹' + parseFloat(amount).toFixed(2);
    }
</script>

@endsection
@endsection
