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
        "name": "{{ $university->getDestination->destination_name }}",
        "item": "{{ url($university->getDestination->destination_slug) }}"
      }, {
        "@type": "ListItem",
        "position": 3,
        "name": "Universities",
        "item": "{{ url($university->getDestination->destination_slug.'/universities') }}"
      }, {
        "@type": "ListItem",
        "position": 4,
        "name": "{{ url($university->slug) }}",
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
  @if ($schema)
    <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Article",
      "inLanguage": "en",
      "headline": "<?= $meta_title ?>",
      "description": "<?= $meta_description ?>",
      "keywords": "<?= $meta_keyword ?>",
      "dateModified": "<?= getISOFormatTime($schema->updated_at) ?>",
      "datePublished": "<?= getISOFormatTime($schema->created_at) ?>",
      "mainEntityOfPage": { "id": "<?= $page_url ?>", "@type": "WebPage" },
      "author": { "@type": "Person", "name": "Britannica Team", "url": "https://www.britannicaoverseas.com/author/6-britannica-team" },
      "publisher": {
          "@type": "Organization",
          "name": "Tutelage Study",
          "logo": { "@type": "ImageObject", "name": "Tutelage Study", "url": "https://www.britannicaoverseas.com/front/assets/img/logo.webp", "height": "65", "width": "258" }
      },
      "image": { "@type": "ImageObject", "url": "<?= asset($og_image_path) ?>" }
    }
  </script>
  @endif
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

          @if ($overview->count() > 0)
            <!-- Overview -->
            <div class="edu_wraper">
              <div class="show-more-box">
                <div class="text show-more-height">
                  @foreach ($overview as $ov)
                    <h2 class="edu_title">{{ $ov->title }}</h2>
                    {!! $ov->description !!}
                  @endforeach
                </div>
                <div class="show-more">(Show More)</div>
              </div>
            </div>
          @endif

          <div id="accordionExample" class="accordion shadow circullum">
            <!-- Fees & Deadlines -->
            @if ($feesandapp->count() > 0)
              <div class="card">
                <div id="headingOne" class="card-header bg-white shadow-sm border-0 pl-4 pr-4">
                  <h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse" data-target="#collapseOne"
                      aria-expanded="true" aria-controls="collapseOne"
                      class="d-block position-relative text-dark collapsible-link py-2">University Of
                      Toronto Fees & Deadlines</a>
                  </h6>
                </div>
                <div id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse show">
                  <div class="card-body pl-4 pr-4 vertically-scrollbar">
                    <table class="table table-striped table-bordered mb-0">
                      <thead>
                        <th>Program</th>
                        <th>Application Deadline</th>
                        <th>Fees</th>
                      </thead>
                      <tbody>
                        @foreach ($feesandapp as $fees)
                          <tr>
                            <td><span class="size-xs text-primary">{{ $fees->program }}</span></td>
                            <td>{!! $fees->application_deadline !!}</td>
                            <td>{!! $fees->fees !!}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            @endif
            <!-- Call to action -->
            <div class="justify-content-center align-content-center text-center mb-4 font-weight-bold">
              GET DETAILS ON FEE, ADMISSION, INTAKE <a href="{{ url('/sign-up/?return_to=') }}"
                class="btn btn-theme-2 ml-2 rounded rounded-circle">Apply Now</a>
            </div>
            @if ($categories->count() > 0)
              <!-- Popular Courses -->
              <div class="card">
                <div id="headingTwo" class="card-header bg-white shadow-sm border-0 pl-4 pr-4">
                  <h6 class="mb-0 accordion_title">
                    <a href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                      aria-controls="collapseTwo"
                      class="d-block position-relative collapsed text-dark collapsible-link py-2">Popular Courses</a>
                  </h6>
                </div>
                <div id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordionExample" class="collapse show">
                  <div class="card-body pl-4 pr-4">
                    <div class="row">
                      @foreach ($categories as $row)
                        <div class="col-lg-3 col-md-3 col-sm-3 col-6 pmr-7">
                          <div class="courses b-all">
                            <a target="_blank"
                              href="{{ url($university->getDestination->destination_slug . '/universities/' . $university->slug . '/' . $row->getCategory->category_slug . '-courses') }}">
                              <img data-src="{{ categoryIcon($row->getCategory->icon_path) }}" alt="icon"
                                height="40" width="40">
                              <span>{{ $row->getCategory->category_name }}</span>
                            </a>
                          </div>
                        </div>
                      @endforeach
                    </div>
                    <div align="center"><a
                        href="{{ url($university->getDestination->destination_slug . '/universities/' . $university->slug . '/courses') }}"
                        class="btn btn-outline-theme">View all courses</a>
                    </div>
                  </div>
                </div>
              </div>
            @endif
            <!-- Photo Gallery -->
            @if ($gallery->count() > 0)
              <div class="card" id="photogallery">
                <div id="headingThree" class="card-header bg-white shadow-sm border-0 pl-4 pr-4">
                  <h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse" data-target="#collapseThree"
                      aria-expanded="true" aria-controls="collapseThree"
                      class="d-block position-relative collapsed text-dark collapsible-link py-2">Photo
                      Gallery</a>
                  </h6>
                </div>
                <div id="collapseThree" aria-labelledby="headingThree" data-parent="#accordionExample"
                  class="collapse show">
                  <div class="card-body pl-4 pr-4 pb-0">
                    <div class="row">

                      @foreach ($gallery as $g)
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                          <div class="course_overlay_cat">
                            <div class="course_overlay_cat_thumb">
                              <a href="{{ asset($g->image_path) }}" class="fancybox" data-fancybox="gallery"
                                data-caption="Image title type here">
                                <img data-src="{{ asset($g->image_path) }}" class="img-fluid" alt="{{ $g->title }}">
                              </a>
                            </div>
                          </div>
                        </div>
                      @endforeach

                    </div>
                  </div>
                </div>
              </div>
              <!-- Call to action -->
              <div class="justify-content-center align-content-center text-center mb-4 font-weight-bold">
                GET DETAILS ON FEE, ADMISSION, INTAKE <a href="{{ url('/sign-up/?return_to=') }}"
                  class="btn btn-theme-2 ml-2 rounded rounded-circle">Apply Now</a>
              </div>
            @endif

            <!-- Video Gallery -->
            @if ($video->count() > 0)
              <div class="card">
                <div id="headingFour" class="card-header bg-white shadow-sm border-0 pl-4 pr-4">
                  <h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse" data-target="#collapseFour"
                      aria-expanded="true" aria-controls="collapseFour"
                      class="d-block position-relative collapsed text-dark collapsible-link py-2">Video
                      Gallery</a>
                  </h6>
                </div>
                <div id="collapseFour" aria-labelledby="headingFour" data-parent="#accordionExample"
                  class="collapse show">
                  <div class="card-body pl-4 pr-4">
                    <div class="row">
                      @foreach ($video as $v)
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                          <iframe width="100%" height="200" src="{{ $v->link }}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            @endif
            <!-- Top Trending Universities -->
            @if ($trendingUniversity->count() > 0)
              <div class="card">
                <div id="headingFive" class="card-header bg-white shadow-sm border-0">
                  <h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse"
                      data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive"
                      class="d-block position-relative collapsed text-dark collapsible-link py-2">Top Trending
                      Universities</a>
                  </h6>
                </div>
                <div id="collapseFive" aria-labelledby="headingFive" data-parent="#accordionExample"
                  class="collapse show">
                  <div class="card-body pl-4 pr-4">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 p-0">
                        <div class="arrow_slide two_slide-dots arrow_middle">
                          @foreach ($trendingUniversity as $tu)
                            <!-- Single Slide -->

                            <div class="singles_items">

                              <div class="education_block_grid style_2 mb-3">
                                <div class="education_block_body mb-0">
                                  <div class="row align-items-center mb-2">
                                    <div class="col-3 pr-0">
                                      <div class="path-img border-primary border rounded">
                                        <img data-src="{{ asset($tu->logo_path) }}" class="img-fluid rounded"
                                          alt="">
                                      </div>
                                    </div>
                                    <div class="col-9">
                                      <h6 class="mb-1">{{ $tu->name }}</h6>
                                      <i class="ti-location-pin mr-2"></i>{{ $tu->city }},
                                      {{ $tu->state }}<br />
                                      <i class="ti-eye mr-2"></i>{{ $tu->getInstType->type ?? 'N/A' }}
                                    </div>
                                  </div>
                                </div>

                                <div class="education_block_footer pl-3 pr-3">
                                  <a href="{{ route('university.overview', ['destination_slug' => $tu->getDestination->destination_slug, 'university_slug' => $tu->slug]) }}"
                                    class="card-btn mr-3" style="font-size:13px">View
                                    detials</a>
                                  <a href="{{ route('university.courses', ['destination_slug' => $tu->getDestination->destination_slug, 'university_slug' => $tu->slug]) }}"
                                    class="card-btn" style="font-size:13px">View
                                    courses</a>
                                </div>
                              </div>
                            </div>
                          @endforeach

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endif
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
