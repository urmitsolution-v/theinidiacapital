
@extends('receptionist.layout.index')
@section('content')

    <!-- Start Status area -->
    <div class="notika-status-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 mg-b-15">
            <div
              class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30"
              style="background: #82e0aa"
            >
            <?php $totalcustomers = DB::table('cusotmers')->count(); ?>
              <div class="website-traffic-ctn">
                <h2><span class="counter">{{ $totalcustomers }}</span></h2>
                <p>Total Customers</p>
              </div>
              <div class="sparkline-bar-stats1">9,4,8,6,5,6,4,8,3,5,9,5</div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- End Status area-->

    @endsection
