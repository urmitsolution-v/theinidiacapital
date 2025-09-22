@extends('front.layout.index')
@section('content')

    <!--Privacy & Policy start-->
    <section class="privacy-policy mt-20 pt-120 pb-120">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-10 col-xxl-8">
            <div
              class="nb3-lg-bg pb-0 pb-md-4 p-4 p-sm-10 p-lg-15 cus-rounded-2"
            >
              <h2 class="text-center mb-10 mb-lg-15">Privacy Privacy</h2>
              <div
                class="privacy-policy__card d-flex flex-column gap-8 gap-lg-10"
              >
                <div class="privacy-policy__part">
                  {{-- <h5 class="mb-/4">Agreement to Terms</h5> --}}
                  <p class="mt-3">
                    <?= $data->info_one; ?>
                  </p>
                  
                </div>
             
               
            
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--Privacy & Policy end -->

    
   @endsection