@extends('front.layout.index')
@section('content')


    <!-- Breadcrumbs -->
    <div class="breadcrumbs overlay">
      <div class="container">
        <div class="bread-inner">
          <div class="row">
            <div class="col-12">
              <h2>Our Team</h2>
              <ul class="bread-list">
                <li><a href="/">Home</a></li>
                <li><i class="icofont-simple-right"></i></li>
                <li class="active">Our Team</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start team Area -->
    <section class="blog section" id="blog">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title">
              <h2>Our Expert Tailor</h2>
              <img src="{{ url('website') }}/img/section-img.png" alt="#" />
              <p>
                Lorem ipsum dolor sit amet consectetur adipiscing elit praesent
                aliquet. pretiumts
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6 col-12 mb-4">
            <!-- Single Blog -->
            <div class="single-news">
              <div class="news-head">
                <img
                  src="{{ url('website') }}/img/t1.png"
                  alt="#"
                  style="width: 100%; height: 350px"
                />
              </div>
              <div class="news-body">
                <div class="news-content">
                  <h2>
                    <a href="#">Cole Zenith</a>
                  </h2>
                </div>
              </div>
            </div>
            <!-- End Single Blog -->
          </div>

          <div class="col-lg-4 col-md-6 col-12 mb-4">
            <!-- Single Blog -->
            <div class="single-news">
              <div class="news-head">
                <img
                  src="{{ url('website') }}/img/t2.png"
                  alt="#"
                  style="width: 100%; height: 350px"
                />
              </div>
              <div class="news-body">
                <div class="news-content">
                  <h2>
                    <a href="#">Cole Zenith</a>
                  </h2>
                </div>
              </div>
            </div>
            <!-- End Single Blog -->
          </div>

          <div class="col-lg-4 col-md-6 col-12 mb-4">
            <!-- Single Blog -->
            <div class="single-news">
              <div class="news-head">
                <img
                  src="{{ url('website') }}/img/t3.png"
                  alt="#"
                  style="width: 100%; height: 350px"
                />
              </div>
              <div class="news-body">
                <div class="news-content">
                  <h2>
                    <a href="#">Cole Zenith</a>
                  </h2>
                </div>
              </div>
            </div>
            <!-- End Single Blog -->
          </div>
          <div class="col-lg-4 col-md-6 col-12 mb-4">
            <!-- Single Blog -->
            <div class="single-news">
              <div class="news-head">
                <img
                  src="{{ url('website') }}/img/t1.png"
                  alt="#"
                  style="width: 100%; height: 350px"
                />
              </div>
              <div class="news-body">
                <div class="news-content">
                  <h2>
                    <a href="#">Cole Zenith</a>
                  </h2>
                </div>
              </div>
            </div>
            <!-- End Single Blog -->
          </div>

          <div class="col-lg-4 col-md-6 col-12 mb-4">
            <!-- Single Blog -->
            <div class="single-news">
              <div class="news-head">
                <img
                  src="{{ url('website') }}/img/t2.png"
                  alt="#"
                  style="width: 100%; height: 350px"
                />
              </div>
              <div class="news-body">
                <div class="news-content">
                  <h2>
                    <a href="#">Cole Zenith</a>
                  </h2>
                </div>
              </div>
            </div>
            <!-- End Single Blog -->
          </div>

          <div class="col-lg-4 col-md-6 col-12 mb-4">
            <!-- Single Blog -->
            <div class="single-news">
              <div class="news-head">
                <img
                  src="{{ url('website') }}/img/t3.png"
                  alt="#"
                  style="width: 100%; height: 350px"
                />
              </div>
              <div class="news-body">
                <div class="news-content">
                  <h2>
                    <a href="#">Cole Zenith</a>
                  </h2>
                </div>
              </div>
            </div>
            <!-- End Single Blog -->
          </div>
        </div>
      </div>
    </section>
    <!-- End team Area -->


    @endsection
