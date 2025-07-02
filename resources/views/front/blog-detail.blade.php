@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.dynamic_page_meta_tag')
@endpush
@push('breadcrumb_schema')
  <!-- Breadcrumb Schema -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org/",
    "@type": "BreadcrumbList",
    "name": "{{ ucwords($meta_title) }}",
    "description": "{{ $meta_description }}",
    "itemListElement": [
      {
        "@type": "ListItem",
        "position": 1,
        "name": "Home",
        "item": "{{ url('/') }}/"
      },
      {
        "@type": "ListItem",
        "position": 2,
        "name": "Blog",
        "item": "{{ url('blog') }}/"
      },
      {
        "@type": "ListItem",
        "position": 3,
        "name": "{{ $blog->getCategory->cate_name }}",
        "item": "{{ url('blog/'.$blog->getCategory->slug) }}/"
      },
      {
        "@type": "ListItem",
        "position": 4,
        "name": "{{ ucfirst($blog->headline) }}",
        "item": "{{ url()->current() }}/"
      }
    ]
  }
  </script>
  <!-- Breadcrumb Schema End -->
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
  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Article",
      "inLanguage": "en",
      "headline": "<?= $meta_title ?>",
      "description": "<?= $meta_description ?>",
      "keywords": "<?= $meta_keyword ?>",
      "dateModified": "<?= getISOFormatTime($blog->updated_at) ?>",
      "datePublished": "<?= getISOFormatTime($blog->created_at) ?>",
      "mainEntityOfPage": { "id": "<?= $page_url ?>", "@type": "WebPage" },
      "author": { "@type": "Person", "name": "Britannica Team", "url": "https://www.britannicaoverseas.com/author/6-britannica-team" },
      "publisher": {
          "@type": "Organization",
          "name": "Shweta Study Abroad",
          "logo": { "@type": "ImageObject", "name": "Shweta Study Abroad", "url": "https://www.britannicaoverseas.com/front/assets/img/logo.webp", "height": "65", "width": "258" }
      },
      "image": { "@type": "ImageObject", "url": "<?= asset($og_image_path) ?>" }
    }
  </script>
  <style>
    .child-heading {
      margin-left: 30px;
      /* Adjust the value to set the desired indentation */
    }
  </style>
@endpush
@section('main-section')
  <!-- Breadcrumb -->
  <!-- style="background:url({{ url('/front/') }}/assets/img/ub.jpg);" -->
  <div class="image-cover ed_detail_head lg" data-overlay="8">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12 col-md-12">
          <div class="ed_detail_wrap light">
            <ul class="cources_facts_list">
              <li class="facts-1"><a href="{{ url('/') }}">Home</a></li>
              <li class="facts-1"><a href="{{ route('blog') }}">Blog</a></li>
              <li class="facts-1"><a
                  href="{{ route('blog.category', ['category_slug' => $blog->getCategory->category_slug]) }}">{{ $blog->getCategory->category_name }}</a>
              </li>
              <li class="facts-1">{{ $blog->title }}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumb -->
  <!-- Content -->
  <section class="bg-light blog-page">
    <div class="container">
      <!-- row Start -->
      <div class="row">
        <!-- Blog Detail -->
        <div class="col-lg-8 col-md-12 col-sm-12 col-12">
          <div class="article_detail_wrapss single_article_wrap format-standard main-articals">
            <div class="article_body_wrap">
              <h2 class="post-title">{{ $blog->title }}</h2>
              @if ($blog->thumbnail_path != null)
                <div class="article_featured_image">
                  <img class="img-fluid w-100" src="{{ asset($blog->thumbnail_path) }}" alt="{{ $blog->title }}">
                </div>
              @endif
              @if ($blog->user_id != null)
                <div class="article_top_info">
                  <ul class="article_middle_info">
                    <li>
                      <a href="javascript:void()">
                        <span class="icons"><i class="ti-user"></i></span>
                        by {{ $blog->getUser->name }}
                      </a>
                    </li>
                  </ul>
                </div>
              @endif
              @if ($blog->contents->count() > 0)
                {{-- TABLE OF CONTENT START HERE --}}
                <div class="card">
                  <div class="card-header">
                    <h3>Table of Content</h3>
                  </div>
                  <div class="card-body pl-4 pr-4 bg-light">
                    <div class="table-of-content">
                      <div class="top-level main-top-level">
                        @php
                          $mh = 1;
                        @endphp
                        @foreach ($blog->parentContents as $row)
                          <span class="main-heading">
                            <a href="#{{ $row->slug }}"><b>{{ $mh }}. {{ $row->title }}</b></a><br>
                            @if ($row->childContents->count() > 0)
                              <div class="child-heading">
                                @php
                                  $sh = 1;
                                @endphp
                                @foreach ($row->childContents as $child)
                                  <span>
                                    <a href="#{{ $child->slug }}">
                                      {{ $mh }}.{{ $sh }} {{ $child->title }}
                                    </a>
                                  </span> <br>
                                  @php $sh++; @endphp
                                @endforeach
                              </div>
                            @endif
                          </span>
                          @php $mh++; @endphp
                        @endforeach
                        @if ($blog->faqs->count() > 0)
                          <span class="main-heading"><a href="#faqs"><b>{{ $mh }}. Faqs</b></a></span>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                {{-- TABLE OF CONTENT END HERE --}}
                @php
                  $cmh = 1;
                @endphp
                @foreach ($blog->parentContents as $row)
                  {{-- Main CONTENT START HERE --}}
                  <div class="ps-document">
                    <h2 id="{{ $row->slug }}">{{ $row->title }}</h2>
                    <p>{!! $row->description !!}</p>

                    @if ($row->childContents->count() > 0)
                      @php
                        $csh = 1;
                      @endphp
                      @foreach ($row->childContents as $child)
                        {{-- CHILD CONTENT START HERE --}}
                        <h2 id="{{ $child->slug }}">{{ $csh }}. {{ $child->title }}</h2>
                        <p>{!! $child->description !!}</p>
                        {{-- CHILD CONTENT END HERE --}}
                        @php $csh++; @endphp
                      @endforeach
                    @endif
                  </div>
                  {{-- Main CONTENT end HERE --}}
                  @php $cmh++; @endphp
                @endforeach
              @endif
              {!! $blog->description !!}
            </div>
          </div>

          @if ($blog->faqs->count() > 0)
            <div class="accordion faq-accordian " id="accordionExample">
              <h2 id="faqs">FAQ </h2>
              @foreach ($blog->faqs as $row)
                <div class="card mb-1">
                  <div class="card-header main_hederss" id="headingTwo{{ $row->id }}">
                    <h5 class="mb-0">
                      <button
                        class=" main-decorations  btn btn-link collapsed w-100 d-flex align-items-center justify-content-between"
                        type="button" data-toggle="collapse" data-target="#collapseTwo{{ $row->id }}"
                        aria-expanded="false" aria-controls="collapseTwo{{ $row->id }}">
                        {{ $row->question }}
                        {{-- <img src="/front/img/down.png" class="img-down" alt=""> --}}
                        <i style="font-size:24px" class="fa">&#xf107;</i>
                      </button>
                    </h5>
                  </div>
                  <div id="collapseTwo{{ $row->id }}" class="collapse"
                    aria-labelledby="headingTwo{{ $row->id }}" data-parent="#accordionExample">
                    <div class="card-body">
                      {!! $row->answer !!}
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          @endif
        </div>
        <!-- Single blog Grid -->
        <div class="col-lg-4 col-md-12 col-sm-12 col-12">

          <!-- Categories -->
          <div class="single_widgets widget_category">
            <h4 class="title">Categories</h4>
            <ul>
              @foreach ($categories as $row)
                <li><a
                    href="{{ route('blog.category', ['category_slug' => $row->category_slug]) }}">{{ $row->category_name }}
                  </a></li>
              @endforeach
            </ul>
          </div>
          <!-- Trending Posts -->
          <div class="single_widgets widget_thumb_post">
            <h4 class="title mb-3">Trending Posts</h4>
            <ul>

              @foreach ($blogs as $row)
                <li>
                  <span class="left"><img data-src="{{ asset($row->thumbnail_path) }}" alt="{{ $row->title }}"
                      class=""></span>
                  <span class="right">
                    <a class="feed-title"
                      href="{{ route('blog.detail', ['category_slug' => $row->getCategory->category_slug, 'slug' => $row->slug]) }}">{{ $row->title }}</a>
                    <span class="post-date"><i
                        class="ti-calendar"></i>{{ getFormattedDate($row->updated_at, 'd M, Y') }}</span>
                  </span>
                </li>
              @endforeach

            </ul>
          </div>
          <!-- Tags Cloud -->

        </div>
      </div>
      <!-- /row -->
    </div>
  </section>
  <!-- Content -->
@endsection
