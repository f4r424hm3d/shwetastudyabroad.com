@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.dynamic_page_meta_tag')
@endpush
@section('main-section')
  <!-- Breadcrumb -->
  @include('front.university-profile')
  <!-- Breadcrumb -->
  <!-- Menu -->
  @include('front.university-profile-menu')
  <!-- Menu -->

  <!-- Content -->
  <section class="bg-light pt-4 pb-4">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8">

          <!-- Overview -->
          <div class="edu_wraper">
            <div class="show-more-box">
              <div class="text show-more-height">
                {!! $universityTabContent->description !!}
              </div>
              <div class="show-more">(Show More)</div>
            </div>
          </div>
        </div>
        <!-- Sidebar -->
        <div class="col-lg-4 col-md-4">
          @include('front.includes.trending-universities-right')
        </div>
      </div>
    </div>
  </section>
  <!-- Content -->
@endsection
