    <div
      class="modal fade"
      id="exampleModalwithdraw"
      tabindex="-1"
      aria-labelledby="exampleModalLabelwithdraw"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content nb3-bg">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabelwithdraw">
              Withdrawal Form 
            </h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="mb-4 text-center">
              <span class="fw-bold fs-5 nw1-color">Withdrawable Amount:</span>
              <div class="display-6 fw-bold text-success mt-2">
                <small class="withdrableamountBB text-muted">0</small>
              </div>
            </div>   <form
              method="POST"
              autocomplete="off"
              id="formwithdrawyy"
              action="/withdraw"
              class="message__form p-4 p-lg-8"
            >
            @csrf
              <div
                class="d-flex gap-7 gap-lg-8 flex-column"
              >
                <div class="row gy-4">
                  <!-- Name -->
                  <div class="col-lg-6">
                    <div class="single-input">
                      <label
                        class="label fw_500 nw1-color mb-4"
                        for="name"
                      >
                        Name
                      </label>
                      <input
                        type="text"
                        class="fs-seven"
                        disabled
                        value="{{ Auth::user()->name }}"
                        required
                      />
                    </div>
                  </div>
                
                  <!-- Email Address -->
                  <div class="col-lg-6">
                    <div class="single-input">
                      <label
                        class="label fw_500 nw1-color mb-4"
                        for="email"
                      >
                        Email Address
                      </label>
                      <input
                        type="email"
                        class="fs-seven"
                        disabled
                        value="{{ Auth::user()->email }}"
                        placeholder="Enter your email address"
                        required
                      />
                      
                    </div>
                  </div>
                 
                  <div class="col-lg-12">
                    <div class="single-input">
                      <label
                        class="label fw_500 nw1-color mb-4"
                        for="withdrawalReason"
                      >
                        Reason of Withdrawals
                      </label>
                      <input
                        type="text"
                        class="fs-seven"
                        name="reason"
                        id="withdrawalReason"
                        placeholder="Enter the reason for withdrawal"
                        required
                      />
                    </div>
                  </div>

                  <!-- Amount -->
                  <div class="col-lg-12">
                    <div class="single-input">
                      <label
                        class="label fw_500 nw1-color mb-4"
                        for="amountwithdraw"
                      >
                        Amount
                      </label>
                      <input
                        type="number"
                        class="fs-seven"
                        name="amount"
                        id="amountwithdraw"
                        placeholder="Enter the amount"
                        required
                      />
                    </div>
                  </div>



<div class="otp-section">
    <div class="col-lg-12 otp_box d-none">  
        <div class="single-input">
            <input type="number" class="otp_input form-control" placeholder="Enter OTP">
        </div>
    </div>

    <span class="msg"></span>
    <div class="otp_box">
        <button type="button" max-am="{{ $result['wallet_balance'] ?? 0 }}" class="send_otp cmn-btn py-3 px-5 px-lg-6 mt-8 mt-lg-10 d-flex ms-auto">
            Send OTP
        </button>
        <button type="button" class="verify_otp cmn-btn py-3 px-5 px-lg-6 mt-8 mt-lg-10 d-flex ms-auto d-none">
            Verify OTP
        </button>
    </div>
    <button type="submit" class="submit_withdraw_qu cmn-btn py-3 px-5 px-lg-6 mt-8 mt-lg-10 d-flex ms-auto d-none">
        Submit <i class="bi bi-arrow-up-right"></i>
    </button>
  </div>
  </div>
  </div>  </form>
          </div>
        </div>
      </div>
    </div>