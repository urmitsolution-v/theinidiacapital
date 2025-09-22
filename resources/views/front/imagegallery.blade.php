@extends('front.layout.index')
@section('content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs overlay">
        <div class="container">
          <div class="bread-inner">
            <div class="row">
              <div class="col-12">
                <h2>Image Gallery</h2>
                <ul class="bread-list">
                  <li><a href="/">Home</a></li>
                  <li><i class="icofont-simple-right"></i></li>
                  <li class="active">Image Gallery</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Breadcrumbs -->

      <!-- image gallery start -->
      <div class="container-xxl py-5">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="section-title">
                <h2>Image Gallery</h2>
                <img src="{{ url('website') }}/img/section-img.png" alt="#" />
                <p>
                  Lorem ipsum dolor sit amet consectetur adipiscing elit praesent
                  aliquet. pretiumts
                </p>
              </div>
            </div>
          </div>
          <!-- nav -->
          <ul
            class="nav nav-tabs mb-lg-5"
            id="myTab"
            role="tablist"
            style="display: flex; align-items: center; justify-content: center"
          >
            <li class="nav-item" role="presentation">
              <button
                class="nav-link active"
                id="Shirt-tab"
                data-toggle="tab"
                data-target="#Shirt"
                type="button"
                role="tab"
                aria-controls="Shirt"
                aria-selected="true"
              >
                Shirt
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button
                class="nav-link"
                id="Pant-tab"
                data-toggle="tab"
                data-target="#Pant"
                type="button"
                role="tab"
                aria-controls="Pant"
                aria-selected="false"
              >
                Pant
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button
                class="nav-link"
                id="Blazer-tab"
                data-toggle="tab"
                data-target="#Blazer"
                type="button"
                role="tab"
                aria-controls="Blazer"
                aria-selected="false"
              >
                Blazer
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button
                class="nav-link"
                id="Jacket-tab"
                data-toggle="tab"
                data-target="#Jacket"
                type="button"
                role="tab"
                aria-controls="Jacket"
                aria-selected="false"
              >
                Jacket
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button
                class="nav-link"
                id="Kurta-tab"
                data-toggle="tab"
                data-target="#Kurta"
                type="button"
                role="tab"
                aria-controls="Kurta"
                aria-selected="false"
              >
                Kurta
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button
                class="nav-link"
                id="Formal-tab"
                data-toggle="tab"
                data-target="#Formal"
                type="button"
                role="tab"
                aria-controls="Formal"
                aria-selected="false"
              >
                Formal
              </button>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div
              class="tab-pane fade show active"
              id="Shirt"
              role="tabpanel"
              aria-labelledby="Shirt-tab"
            >
              <!-- Gallery -->
              <div class="row">
               @foreach ($gallery as $val)
                   <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                    <img
                      src="{{ url('uploads') }}/<?=$val->image ?>"
                      class="w-100 shadow-1-strong rounded mb-4"
                      alt="Boat on Calm Water"
                    />
                  </div>
               @endforeach

              </div>
              <!-- Gallery -->
            </div>
            <div
              class="tab-pane fade"
              id="Pant"
              role="tabpanel"
              aria-labelledby="Pant-tab"
            >
              <!-- Gallery -->
              <div class="row">
                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                  <img
                    src="{{ url('website') }}/img/pant/1.jpg"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Boat on Calm Water"
                  />

                  <img
                    src="{{ url('website') }}/img/pant/2.webp"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Wintry Mountain Landscape"
                  />
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                  <img
                    src="{{ url('website') }}/img/pant/3.avif"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Mountains in the Clouds"
                  />

                  <img
                    src="{{ url('website') }}/img/pant/6.webp"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Boat on Calm Water"
                  />
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                  <img
                    src="{{ url('website') }}/img/pant/5.webp"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Waves at Sea"
                  />

                  <img
                    src="{{ url('website') }}/img/pant/7.jpg"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Yosemite National Park"
                  />
                </div>
              </div>
              <!-- Gallery -->
            </div>
            <div
              class="tab-pane fade"
              id="Blazer"
              role="tabpanel"
              aria-labelledby="Blazer-tab"
            >
              <!-- Gallery -->
              <div class="row">
                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                  <img
                    src="{{ url('website') }}/img/banner/g1.jpg"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Boat on Calm Water"
                  />

                  <img
                    src="{{ url('website') }}/img/banner/g2.jpg"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Wintry Mountain Landscape"
                  />
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                  <img
                    src="{{ url('website') }}/img/banner/g3.jpg"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Mountains in the Clouds"
                  />

                  <img
                    src="{{ url('website') }}/img/banner/g4.jpg"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Boat on Calm Water"
                  />
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                  <img
                    src="{{ url('website') }}/img/banner/g1.jpg"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Waves at Sea"
                  />

                  <img
                    src="{{ url('website') }}/img/banner/g6.jpg"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Yosemite National Park"
                  />
                </div>
              </div>
              <!-- Gallery -->
            </div>
            <div
              class="tab-pane fade"
              id="Jacket"
              role="tabpanel"
              aria-labelledby="Jacket-tab"
            >
              <!-- Gallery -->
              <div class="row">
                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                  <img
                    src="{{ url('website') }}/img/jacket/1.jpg"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Boat on Calm Water"
                  />

                  <img
                    src="{{ url('website') }}/img/jacket/2.avif"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Wintry Mountain Landscape"
                  />
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                  <img
                    src="{{ url('website') }}/img/jacket/3.jpg"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Mountains in the Clouds"
                  />

                  <img
                    src="{{ url('website') }}/img/jacket/4.jpg"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Boat on Calm Water"
                  />
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                  <img
                    src="{{ url('website') }}/img/jacket/5.jpg"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Waves at Sea"
                  />

                  <img
                    src="{{ url('website') }}/img/jacket/6.jpg"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Yosemite National Park"
                  />
                </div>
              </div>
              <!-- Gallery -->
            </div>
            <div
              class="tab-pane fade"
              id="Kurta"
              role="tabpanel"
              aria-labelledby="Kurta-tab"
            >
              <!-- Gallery -->
              <div class="row">
                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                  <img
                    src="{{ url('website') }}/img/kurta/1.webp"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Boat on Calm Water"
                  />

                  <img
                    src="{{ url('website') }}/img/kurta/2.webp"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Wintry Mountain Landscape"
                  />
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                  <img
                    src="{{ url('website') }}/img/kurta/3.webp"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Mountains in the Clouds"
                  />

                  <img
                    src="{{ url('website') }}/img/kurta/4.webp"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Boat on Calm Water"
                  />
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                  <img
                    src="{{ url('website') }}/img/kurta/5.webp"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Waves at Sea"
                  />

                  <img
                    src="{{ url('website') }}/img/kurta/6.jpg"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Yosemite National Park"
                  />
                </div>
              </div>
              <!-- Gallery -->
            </div>
            <div
              class="tab-pane fade"
              id="Formal"
              role="tabpanel"
              aria-labelledby="Formal-tab"
            >
              <!-- Gallery -->
              <div class="row">
                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                  <img
                    src="{{ url('website') }}/img/formal/1.jpg"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Boat on Calm Water"
                  />

                  <img
                    src="{{ url('website') }}/img/formal/2.jpg"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Wintry Mountain Landscape"
                  />
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                  <img
                    src="{{ url('website') }}/img/formal/3.jpg"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Mountains in the Clouds"
                  />

                  <img
                    src="{{ url('website') }}/img/formal/4.webp"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Boat on Calm Water"
                  />
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                  <img
                    src="{{ url('website') }}/img/formal/5.webp"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Waves at Sea"
                  />

                  <img
                    src="{{ url('website') }}/img/formal/6.jpg"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Yosemite National Park"
                  />
                </div>
              </div>
              <!-- Gallery -->
            </div>
          </div>
        </div>
      </div>
      <!-- image gallery end -->
      @endsection
