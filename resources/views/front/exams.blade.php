@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
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
              <li class="facts-1">Exams</li>
            </ul>
            <div class="ed_header_caption mb-0">
              <h1 class="ed_title mb-0">Exams</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumb -->
  <!-- Content -->
  <section class="bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 mb-3">
          <div class="sec-heading">
            <h2>Study <span class="theme-cl1">Abroad Exams</span> with Britannica</h2>
          </div>
        </div>
      </div>
      <div class="row">
        @foreach ($exams as $row)
          <div class="col-lg-4 col-md-4 col-sm-6 mb-4">
            <div class="education_block_grid style_2 exam-slides">
              <div class="education_block_thumb n-shadow">
                <div class="card-images">
                <img data-src="{{ asset($row->thumbnail_path) }}" class="img-fluid" alt="{{ $row->exam_name }}">
                </div>
                
                <div class="cources_price">{{ $row->exam_name }}</div>
              </div>
             <div class="main-block-body" >
           <div class="d-flex flex-column justify-content-between" >
           <div class="education_block_body">
                <h4 class="bl-title">{{ $row->title }}</h4>
              </div>
              <div class="cources_info_style3">
                <p class="mb-0">{{ $row->shortnote }}</p>
              </div>
           </div>
              <div class="education_block_footer align-items-center p-3">
                <div class="education_block_author"><a href="{{ url('/sign-up/?return_to=') }}"
                    class="card-btn">{{ $row->exam_name }} Registration</a></div>
                <a href="{{ url('exam/' . $row->exam_slug . '/overview') }}" class="card-btn">View Details</a>
              </div>
             </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- Content -->
@endsection
