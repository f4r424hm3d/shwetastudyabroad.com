@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.dynamic_page_meta_tag')
@endpush
@push('breadcrumb_schema')
  <!-- breadcrumb schema Code -->
  <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "BreadcrumbList",
      "name": "{{ ucwords($meta_title) }}",
      "description": "{{ $meta_description }}",
      "itemListElement": [{
        "@type": "ListItem",
        "position": 1,
        "name": "Home",
        "item": "{{ url('/') }}"
      }, {
        "@type": "ListItem",
        "position": 2,
        "name": "Services",
        "item": "{{ url('services') }}"
      }, {
        "@type": "ListItem",
        "position": 3,
        "name": "{{ $row->title }}",
        "item": "{{ url()->current() }}"
      }]
    }
  </script>
  <!-- breadcrumb schema Code End -->
  <!-- webpage schema Code Destinations -->
  <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "webpage",
      "url": "{{ url()->current() }}",
      "name": "{{ $meta_title }}",
      "description": "{{ $meta_description }}",
      "inLanguage": "en-US",
      "keywords": ["{{ $meta_keyword }}"]
    }
  </script>
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
              <li class="facts-1"><a href="{{ url('/services/') }}">Services</a></li>
              <li class="facts-1">{{ $row->title }}</li>
            </ul>
            <div class="ed_header_caption mb-0">
              <h1 class="ed_title mb-0">{{ $row->title }}</h1>
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
          <div class="card">
            <div class="card-body p-4">
              <div class="sec-heading">
                <h2>{{ $row->title }}</h2>
              </div>
              <hr>
              <img data-src="{{ asset($row->thumbnail_path) }}" class="img-fluid w-100 mb-3" alt="{{ $row->title }}">
            </div>
          </div>

          @foreach ($servicecontent as $cont)
            <div class="card show-more-box-country">
              <div class="card-body p-4">
                @if ($cont->title != null)
                  <h3>{{ $cont->title }}</h3>
                @endif
                {!! $cont->description !!}
              </div>
            </div>
          @endforeach

          @if ($destinations->count() > 0)
            <hr>
            <div id="Popular-Study-Abroad-Destinations" class="mt-5">
              <h3>Popular Study Abroad Destinations</h3>

              <div class="row mt-3 three_slide">
                @foreach ($destinations as $row)
                  <div class="singles_items">
                    <div class="card shadow-0 mb-0">
                      <img data-src="{{ asset($row->thumbnail_path) }}" class="img-fluid"
                        alt="{{ $row->destination_name }}">
                      <div class="card-header bg-light border-0 pl-4 pr-4">
                        <h4 class="text-center" style="font-size:18px; font-weight:600;">Study in
                          {{ $row->destination_name }}</h4>
                        <a href="{{ url($row->destination_slug) }}" class="btn btn_apply w-100">View Details</a>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          @endif
        </div>
        <!-- Sidebar -->
        <div class="col-lg-4 col-md-4">
          <div class="single_widgets widget_category">
            <h4 class="title">Related Services</h4>
            <ul>
              @foreach ($services as $ser)
                <li><a href="{{ route('service.detail', ['service_slug' => $ser->slug]) }}">{{ $ser->title }}<span><i
                        class="ti-arrow-right"></i></span></a>
                </li>
              @endforeach
            </ul>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- Content -->
@endsection
