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
        "name": "Exams",
        "item": "{{ url('exams') }}"
      }, {
        "@type": "ListItem",
        "position": 3,
        "name": "{{ $exam->exam_name }}",
        "item": "{{ url('exam/' . $exam->exam_slug . '/overview') }}"
      }, {
        "@type": "ListItem",
        "position": 4,
        "name": "{{ $examtab->heading }}",
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
      "name": "{{ $examtab->heading }}",
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
      "dateModified": "<?= getISOFormatTime($examtab->updated_at) ?>",
      "datePublished": "<?= getISOFormatTime($examtab->created_at) ?>",
      "mainEntityOfPage": { "id": "<?= $page_url ?>", "@type": "WebPage" },
      "author": { "@type": "Person", "name": "Britannica Team", "url": "https://www.britannicaoverseas.com/author/6-britannica-team" },
      "publisher": {
          "@type": "Organization",
          "name": "Britannica Overseas Education",
          "logo": { "@type": "ImageObject", "name": "Britannica Overseas Education", "url": "https://www.britannicaoverseas.com/front/assets/img/logo.webp", "height": "65", "width": "258" }
      },
      "image": { "@type": "ImageObject", "url": "<?= asset($og_image_path) ?>" }
    }
  </script>
@endpush
@section('main-section')
  <!-- Breadcrumb -->
  <!-- Breadcrumb -->
  <div class="ed_detail_head lg" data-overlay="8">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12 col-md-12">
          <div class="ed_detail_wrap light">
            <ul class="cources_facts_list">
              <li class="facts-1"><a href="{{ url('/') }}">Home</a></li>
              <li class="facts-1"><a href="{{ url('exams') }}">Exams</a></li>
              <li class="facts-1"><a href="{{ url('exam/' . $exam->exam_slug . '/overview') }}">{{ $exam->exam_name }}</a>
              </li>
              <li class="facts-1">{{ $examtab->tab_slug == 'overview' ? 'overview' : $examtab->tab_name }}</li>
            </ul>
            <div class="ed_header_caption mb-0">
              <h1 class="ed_title mb-0">{{ $examtab->heading }}</h1>
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
          <div class="new-exam-page">

            <div class="new-exam-links arrow_middle">
              @foreach ($exam->getAllMasterTabs as $row)
                <div class="item singles_item">
                  <a href="{{ url('exam/' . $exam->exam_slug . '/' . $row->tab_slug) }}"
                    class="{{ $active_tab == $row->tab_slug ? 'active' : 'notactive' }}">
                    {{ $row->tab_name }}
                    @if ($row->getAllChild->count() > 0)
                      <i class="fa fa-angle-down"></i>
                    @endif
                  </a>
                  <ul>
                    @if ($row->getAllChild->count() > 0)
                      @foreach ($row->getAllChild as $ct)
                        <li><a href="{{ url('exam/' . $exam->exam_slug . '/' . $ct->tab_slug) }}"
                            class="{{ $tab_slug == $ct->tab_slug ? 'active' : 'notactive' }}">{{ $ct->tab_name }}</a>
                        </li>
                      @endforeach
                    @endif
                  </ul>
                </div>
              @endforeach
            </div>

            <div class="sec-heading">
              <h2>{{ $examtab->heading }}</h2>
            </div>

            <div class="row align-items-center mb-3">
              @if ($examtab->author_id != null)
                <div class="col-8">
                  <div class="new-author">
                    <div class="img-div">
                      <img data-src="{{ userIcon($examtab->getUser->profile_picture ?? null) }}"
                        alt="{{ $examtab->getUser->name }}"><i class="fa fa-check-circle"></i>
                    </div>
                    <div class="cont-div">
                      <a href="{{ url('author/' . $examtab->getUser->id . '-' . $examtab->getUser->slug) }}">{{ $examtab->getUser->name }}
                      </a><span>
                        Updated on -
                        {{ getFormattedDate($examtab->updated_at, 'M d, Y') }}</span>
                    </div>
                  </div>
                </div>
              @endif
              <div class="col-4">
                <div class="share-button">
                  <div class="share-button__back">
                    <a class="share__link" href="#" aria-label="Share This Page"><i
                        class="ti-facebook share__icon"></i></a>
                    <a class="share__link" href="#" aria-label="Share This Page"><i
                        class="ti-twitter share__icon"></i></a>
                    <a class="share__link" href="#" aria-label="Share This Page"><i
                        class="ti-instagram share__icon"></i></a>
                    <a class="share__link" href="#" aria-label="Share This Page"><i
                        class="ti-linkedin share__icon"></i></a>
                  </div>
                  <div class="share-button__front">
                    <p class="share-button__text">Share <i class="fa fa-share-alt"></i></p>
                  </div>
                </div>
              </div>
            </div>

            @if ($examtab->image_path != null)
              <img data-src="{{ asset($examtab->image_path) }}" alt="{{ $examtab->heading }}">
            @endif

            <a href="{{ url('exam/' . $exam->exam_slug . '/overview') }}" class="big-center-btn">{{ $exam->exam_name }}
              Exam
              Guide</a>

            <div class="edu_wraper">

              {!! $examtab->description !!}
              <a href="{{ url('book-demo') }}" class="big-center-btn btn-theme text-white rounded">
                Enquiry Now</a>

              <div id="accordionExample" class="accordion circullum">
                <div class="card mt-4 mb-4 shadow-0">
                  <div id="headingOne" class="card-header border-0 pl-4 pr-4 bg-light">
                    <h3 class="mb-0">
                      Table of Content
                    </h3>
                  </div>

                  <div id="collapseOne">
                    <div class="card-body pl-4 pr-4 bg-light">
                      <div class="table-of-content">
                        <ul>

                          @foreach ($examtab->getAllMasterContent as $row)
                            <li><a href="#content{{ $row->id }}">{{ $row->heading }}</a>
                              @if ($row->getAllChild->count() > 0)
                                <ul>
                                  @foreach ($row->getAllChild as $ch)
                                    <li><a href="#content{{ $ch->id }}">{{ $ch->heading }}</a></li>
                                  @endforeach
                                </ul>
                              @endif
                            </li>
                          @endforeach
                          {{-- @if ($faqs->count() > 0)
                        <li><a href="#Frequently-Asked-Questions">Frequently Asked Questions</a></li>
                        @endif
                        @if ($destinations->count() > 0)
                        <li><a href="#Destinations">Study Abroad Destinations</a></li>
                        @endif --}}
                        </ul>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

              {!! $examtab->description2 !!}

              @foreach ($examtab->getAllMasterContent as $row)
                <div id="content{{ $row->id }}">
                  <h2>{{ $row->heading }}</h2>
                  {!! $row->description !!}
                </div>
                @if ($row->getAllChild->count() > 0)
                  @foreach ($row->getAllChild as $ch)
                    <div id="content{{ $ch->id }}">
                      <h3>{{ $ch->heading }}</h3>
                      {!! $ch->description !!}
                    </div>
                  @endforeach
                @endif
              @endforeach

              @if ($faqs->count() > 0)
                <div id="Frequently-Asked-Questions" class="mt-3 card shadow-0 bg-light pt-4 pb-4 pr-4 pl-4">
                  <h3>Frequently Asked Questions</h3>
                  <div class="row mt-3">
                    <div class="col-lg-12 col-md-12 col-sm-12 p-0">
                      <div class="container">
                        <div id="accordionExample" class="accordion circullum">
                          @foreach ($faqs as $row)
                            <div class="card mb-0 shadow-0">
                              <div id="faqheadingOne{{ $row->id }}" class="card-header bg-white border-0 b-b pr-4">
                                <div class="mb-0 accordion_title"><a href="#" data-toggle="collapse"
                                    data-target="#faqcollapseOne{{ $row->id }}" aria-expanded="false"
                                    aria-controls="faqcollapseOne{{ $row->id }}"
                                    class="d-block position-relative collapsible-link py-1"><strong>Q:</strong>
                                    {{ $row->question }}</a></div>
                              </div>
                              <div id="faqcollapseOne{{ $row->id }}"
                                aria-labelledby="faqheadingOne{{ $row->id }}" data-parent="#accordionExample"
                                class="collapse">
                                <div class="card-body pt-3"><strong>Ans:</strong>
                                  {{ $row->answer }}
                                </div>
                              </div>
                            </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @push('breadcrumb_schema')
                  <!-- FAQ SCHEMA START -->
                  <script type="application/ld+json">
                    {
                    "@context": "https:\/\/schema.org",
                    "@type": "FAQPage",
                    "mainEntity": [
                      <?php
                    $i = 1;
                    $tfaq = count($faqs);
                    foreach ($faqs as $faq) {
                    ?> {
                          "@type": "Question",
                          "name": "{{ $faq->question }}",
                          "acceptedAnswer": {
                            "@type": "Answer",
                            "text": "{{ str_replace('/', '\/', str_replace('"', '\"', $faq->answer)) }}"
                          }
                        }
                        <?php if ($i < $tfaq) { ?>, <?php } ?>
                      <?php $i++;
                    } ?>
                    ]
                    }
                  </script>
                  <!-- FAQ SCHEMA END -->
                @endpush
              @endif

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
                            <h4 class="text-center" style="font-size:18px; font-weight:600;">
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
          </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4 col-md-4">

          @if ($exams->count() > 0)
            <div class="single_widgets widget_category">
              <h5 class="title">Important Exams</h5>
              <ul>
                @foreach ($exams as $row)
                  <li>
                    <a href="{{ url('exam/' . $row->exam_slug . '/overview') }}">
                      {{ $row->exam_name }}<span><i class="ti-arrow-right"></i></span>
                    </a>
                  </li>
                @endforeach
              </ul>
            </div>
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-765613919107"
              crossorigin="anonymous"></script>
            <!-- ads-1 -->
            <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-765613919107"
              data-ad-slot="2084450086" data-ad-format="auto" data-full-width-responsive="true"></ins>
            <script>
              (adsbygoogle = window.adsbygoogle || []).push({});
            </script><br>
          @endif
          @if ($exam->getAllTabsForSide->count() > 0)
            <div class="single_widgets widget_category">
              <h5 class="title">Important Resources for {{ $exam->exam_name }} Exam</h5>
              <ul>
                @foreach ($exam->getAllTabsForSide as $row)
                  <li id="contact"><a
                      href="{{ url('exam/' . $exam->exam_slug . '/' . $row->tab_slug) }}">{{ $row->tab_name }}<span><i
                          class="ti-arrow-right"></i></span></a></li>
                @endforeach
              </ul>
            </div>
          @endif

          @if (session()->has('smsg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <span id="smsg">{{ session()->get('smsg') }}</span>
            </div>
          @endif
          @if (session()->has('emsg'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <span id="emsg">{{ session()->get('emsg') }}</span>
            </div>
          @endif

          <div class="single_widgets widget_category">
            <h5 class="title mb-3">Get in touch</h5>
            <div class="row align-items-center booking p-0">
              @error('g-recaptcha-response')
                <span class="text-danger">{{ $message }}</span>
              @enderror
              <form action="{{ url('inquiry/exam-page') }}" method="post">
                @csrf
                <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                <input type="hidden" name="source" value="Exam Detail Page">
                <input type="hidden" name="source_path" value="{{ URL::full() }}">

                <input type="hidden" name="retpath"
                  value="{{ 'exam/' . $exam->exam_slug . '/' . $examtab->tab_slug }}">
                <input type="hidden" name="intrest" value="{{ $exam->exam_name }}">
                <div class="col-lg-12">
                  <div class="form-group">
                    <div class="input-group">
                      <input name="name" type="text" class="form-control b-0" placeholder="Full Name*"
                        value="{{ old('name') }}" required="">
                    </div>
                    @error('name')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-12">
                  <div class="row">
                    <div class="col-4 pr-0">
                      <select name="c_code" class="form-control bg-white p-2" style="height:50px" required>
                        <option value="">Select</option>
                        @foreach ($countries as $row)
                          <option value="{{ $row->phonecode }}" {{ $row->phonecode == 91 ? 'selected' : '' }}>
                            {{ $row->iso3 }}
                            +({{ $row->phonecode }})</option>
                        @endforeach
                      </select>
                      @error('c_code')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="col-8 pl-1">
                      <div class="form-group">
                        <div class="input-group">
                          <input name="mobile" type="text" class="form-control b-0 bg-white"
                            placeholder="Mobile/WhatsApp No*" value="{{ old('mobile') }}" required="">
                        </div>
                        @error('mobile')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="form-group">
                    <div class="input-group">
                      <input name="email" type="email" class="form-control b-0" placeholder="Email ID"
                        value="{{ old('email') }}" required="">
                    </div>
                    @error('email')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="social-login mb-3 d-flex align-items-center">
                    <ul>
                      <li class="b-0 p-0" style="width:auto">
                        <input id="reg" class="checkbox-custom m-0" name="reg" type="checkbox" required>
                        <label for="reg" class="checkbox-custom-label m-0 float-left">I accept the</label>
                        <a href="{{ url('terms-conditions') }}" class="theme-cl font-size-13 m-0">
                          <u class="ml-2">Terms & Conditions</u>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="form-group">
                    <label for="captcha_question">{{ $question['text'] }}</label>
                    <div class="input-group">
                      <div class="input-icon"><span class="ti-captcha_answer"></span></div>
                      <input type="number" name="captcha_answer" class="form-control b-0 pl-0"
                        placeholder="Enter Captcha Value" required="">
                    </div>
                    @error('captcha_answer')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="form-group"><button class="slot-btn" type="submit">Submit</button></div>
                </div>
              </form>

            </div>
          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- Content -->
  <script>
    $('a[href*="#"]')
      .not('[href="#"]')
      .not('[href="#0"]')
      .click(function(event) {
        if (
          location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
          location.hostname == this.hostname
        ) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
          if (target.length) {
            event.preventDefault();
            $('html, body').animate({
              scrollTop: target.offset().top - 80
            }, 500, function() {});
          }
        }
      });
  </script>
  <script>
    grecaptcha.ready(function() {
      grecaptcha.execute('{{ gr_site_key() }}', {
          action: 'contact_us'
        })
        .then(function(token) {
          // Set the reCAPTCHA token in the hidden input field
          document.getElementById('g-recaptcha-response').value = token;
        });
    });
  </script>
@endsection
