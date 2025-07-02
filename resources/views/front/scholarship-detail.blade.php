@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.dynamic_page_meta_tag')
@endpush
@section('main-section')
  <!-- Breadcrumb -->
   <!-- style="background:url({{ url('/front/') }}/assets/img/ub.jpg);" -->
  <div class="image-cover ed_detail_head lg" 
    data-overlay="8">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12 col-md-12">
          <div class="ed_detail_wrap light">
            <ul class="cources_facts_list">
              <li class="facts-1"><a href="{{ url('/') }}">Home</a></li>
              <li class="facts-1">
                <a href="{{ url($university->getDestination->destination_slug . '/universities') }}">
                  Universities
                </a>
              </li>
              <li class="facts-1">
                <a href="{{ url($university->slug . '/scholarship') }}">
                  Scholarships
                </a>
              </li>
              <li class="facts-1">{{ $scholarship->scholarship_name }}</li>
            </ul>
            <div class="ed_header_caption mb-0">
              <h1 class="ed_title mb-0">{{ $scholarship->scholarship_name }}</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumb -->

  <!-- Content -->
  <section class="bg-light pt-5 pb-5">
    <div class="container">
      <div class="row">

        <div class="col-lg-8 col-md-8">

          <!-- Overview -->
          <div id="accordionExample" class="accordion shadow circullum">

            @foreach ($rows as $row)
              <div class="card">
                <div id="headingOne{{ $row->id }}" class="card-header bg-white shadow-sm border-0 pl-4 pr-4">
                  <h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse"
                      data-target="#collapseOne{{ $row->id }}" aria-expanded="true"
                      aria-controls="collapseOne{{ $row->id }}"
                      class="d-block position-relative text-dark collapsible-link py-2">{{ $row->title }}</a>
                  </h6>
                </div>
                <div id="collapseOne{{ $row->id }}" aria-labelledby="headingOne{{ $row->id }}"
                  data-parent="#accordionExample" class="collapse show">
                  <div class="card-body pl-4 pr-4">
                    {!! $row->description !!}
                  </div>
                </div>
              </div>
            @endforeach

          </div>

        </div>

        <!-- Sidebar -->
        <div class="col-lg-4 col-md-4">

          <div class="single_widgets widget_category">
            <h5 class="title">TOP RATED SCHOLARSHIPS</h5>
            <ul>

              @foreach ($topRatedScholarships as $trs)
                <li>
                  <a href="{{ url($university->slug . '/scholarship/' . $trs->scholarship_slug) }}">
                    {{ $trs->scholarship_name }} <span><i class="ti-arrow-right"></i></span>
                  </a>
                </li>
              @endforeach

            </ul>
          </div>

          {{-- <div class="single_widgets widget_category">
          <h5 class="title">COUNTRY WISE SCHOLARSHIPS</h5>
          <ul>
            <li><a href="scholarship-detail.html">Scholarships in UK <span><i class="ti-arrow-right"></i></span></a>
            </li>
            <li><a href="scholarship-detail.html">Scholarships in CANADA <span><i class="ti-arrow-right"></i></span></a>
            </li>
            <li><a href="scholarship-detail.html">Scholarships in AUSTRALIA <span><i
                    class="ti-arrow-right"></i></span></a></li>
            <li><a href="scholarship-detail.html">Scholarships in USA <span><i class="ti-arrow-right"></i></span></a>
            </li>
            <li><a href="scholarship-detail.html">Scholarships in NETHERLANDS <span><i
                    class="ti-arrow-right"></i></span></a></li>
          </ul>
        </div> --}}

          <!--div class="ed_view_box style_2">
  <div class="ed_author">
  <div class="ed_author_box">
  <h4>Photo Gallery</h4>
  </div>
  </div>
  <div class="row p-4">
  <div class="col-4 mb-4"><a href="#"><img data-src="{{ url('front/') }}/assets/img/h-3.png" class="img-fluid rounded" alt=""></a></div>
  <div class="col-4 mb-4"><a href="#"><img data-src="{{ url('front/') }}/assets/img/h-3.png" class="img-fluid rounded" alt=""></a></div>
  <div class="col-4 mb-4"><a href="#"><img data-src="{{ url('front/') }}/assets/img/h-3.png" class="img-fluid rounded" alt=""></a></div>
  <div class="col-4 mb-4"><a href="#"><img data-src="{{ url('front/') }}/assets/img/h-3.png" class="img-fluid rounded" alt=""></a></div>
  <div class="col-4 mb-4"><a href="#"><img data-src="{{ url('front/') }}/assets/img/h-3.png" class="img-fluid rounded" alt=""></a></div>
  <div class="col-4 mb-4"><a href="#"><img data-src="{{ url('front/') }}/assets/img/h-3.png" class="img-fluid rounded" alt=""></a></div>
  <div class="col-12" align="center"><button type="submit" class="btn btn-outline-theme">View all gallery</button></div>
  </div>
  </div>

  <div class="ed_view_box style_2">
  <div class="edu-watching">
  <div class="property_video">
  <div class="thumb">
  <img class="pro_img img-fluid w100" src="{{ url('front/') }}/assets/img/course-6.jpg" alt="7.jpg">
  <div class="overlay_icon">
  <div class="bb-video-box">
  <div class="bb-video-box-inner">
  <div class="bb-video-box-innerup">
  <a href="https://www.youtube.com/watch?v=A8EI6JaFbv4" data-toggle="modal" data-target="#popup-video" class="theme-cl" tabindex="-1"><i class="ti-control-play"></i></a>
  </div>
  </div>
  </div>
  </div>
  </div>
  <div class="edu_duration"><i class="ti-alarm-clock mr-2"></i> 20:30</div>
  </div>
  <div class="edu_video p-4">
  <div class="edu_video_header">
  <h4><a href="#" tabindex="-1">Tableau 2020 A-Z:Hands-On Tableau Training For Data Science!</a></h4>
  </div>
  <div class="edu_video_bottom">
  <div class="edu_video_bottom_left"><span>Lession 05 of 12</span></div>
  <div class="edu_video_bottom_right"><i class="ti-desktop"></i> Designing</div>
  </div>
  </div>
  </div>
  </div-->

        </div>

      </div>

    </div>
  </section>
  <!-- Content -->
@endsection
