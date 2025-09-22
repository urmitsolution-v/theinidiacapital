@extends('front.layout.index')
@section('content')


<!-- banner section start-->
<section class="banner-section pt-120 pb-120">
    <div class="container mt-10 mt-lg-0 pt-15 pt-lg-20 pb-5 pb-lg-0">
      <div class="row">
        <div class="col-12 breadcrumb-area">
          <h2 class="mb-4">Invest Now / Business</h2>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li
                class="breadcrumb-item ms-2 ps-7 active"
                aria-current="page"
              >
                <span>Invest Now</span>
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  
  <!-- banner section end -->


  <!--CHOOSE YOUR PACKAGE On start-->
  <section class="trade_on a2-bg pt-120 pb-120 position-relative z-0">
    
    <div class="container">
      <div
        class="row gy-10 gy-xxl-0 justify-content-center justify-content-xxl-between align-items-center"
      >
        <div class="col-lg-12 col-xxl-12">
          <div class="trade_on__content">
            <form method="POST" autocomplete="off" id="normelpackage" class="message__form p-4 p-lg-8">
                @csrf
                <div class="d-flex gap-7 gap-lg-8 flex-column">
                    <div class="row gy-4">
                        <div class="col-lg-6">

                            <div class="mainwalletbox">
                                <h5>"Maximize your potential—invest today and secure a brighter future!"</h5>
                            <div class="single-input mt-3">
                                <label class="label fw_500 nw1-color mb-4" for="amount">Amount ( Min Amount : {{ $package->ammount }} to Max Amount : {{ $package->max_amount }} )</label>

                                <input type="number" class="fs-seven" name="amount" id="amount" value="" placeholder="Enter Amount"  />
                                <input type="number" class="fs-seven" name="package_id" hidden value="{{ $packageid }}" id="amount" placeholder="Enter Amount"  />
                                <span class="text-danger error" id="error_amount"></span>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <span id="msg"></span>
                <button type="submit" class="cmn-btn py-3 px-5 px-lg-6 d-flex" id="submit">
                    Update <i class="bi bi-arrow-up-right"></i>
                </button>
            </form>
          </div>
        </div>
      </div>

      <div class="row">

      

       
      </div>
    </div>
  </section>
  <!-- CHOOSE YOUR PACKAGE On end -->


  @section('footer')
  <script>
    $(document).ready(function() {
        $('#normelpackage').on('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);
            let submitBtn = $('#submit');
            
            // Reset previous errors
            $('.error').text('');
            submitBtn.html('Processing...').prop('disabled', true);

            $.ajax({
                url: "{{ route('buy.business.package') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status == "success") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message,
                            confirmButtonText: 'OK',
                            allowOutsideClick: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "/dashboard";
                            }
                        });
                    }
                    $('#normelpackage')[0].reset();
                },
                error: function(response) {
                    submitBtn.html('Update <i class="bi bi-arrow-up-right"></i>').prop('disabled', false);
                    
                    if (response.status === 422) {
                        let errors = response.responseJSON.errors;
                        for (let key in errors) {
                            $('#error_' + key).text(errors[key][0]);
                        }
                    }
                },
                complete: function() {
                    submitBtn.html('Update <i class="bi bi-arrow-up-right"></i>').prop('disabled', false);
                }
            });
        });
    });
</script>

  
  @endsection


@endsection