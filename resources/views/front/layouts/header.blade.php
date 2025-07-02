@php
  use App\Models\Level;
  use App\Models\Country;
  use App\Models\CourseCategory;

  $modalPhonecodes = Country::orderBy('phonecode', 'ASC')->where('phonecode', '!=', 0)->get();
  $modalLevels = Level::groupBy('level')->orderBy('level', 'ASC')->get();
  $modalCategories = CourseCategory::orderBy('category_name', 'asc')->get();

@endphp
<!DOCTYPE html>
<html lang="en">

<head>
  <!--Meta Tag Seo-->
  @stack('seo_meta_tag')
  @stack('pagination_tag')
  <!-- CSS -->
  <link href="{{ cdn('front/assets/css/styles.css') }}" rel="stylesheet">
  <link rel="preload" href="{{ cdn('front/assets/css/colors.css') }}" as="style"
    onload="this.onload=null;this.rel='stylesheet'">

  <script src="{{ cdn('front/assets/js/jquery.min.js') }}"></script>
  <style>
    .hide-this {
      display: none;
    }
  </style>

  <!-- organization schema code -->
  <script type="application/ld+json"> {"@context":"https://schema.org","@type":"Organization","@id":"https://www.britannicaoverseas.com/#organization","name":"Shweta Study Abroad","url":"https://www.britannicaoverseas.com/","logo":"https://www.britannicaoverseas.com/front/assets/img/logo.png","address":{"@type":"PostalAddress","streetAddress":"B-16 Ground Floor, Mayfield Garden, Sector 50","addressLocality":"Gurugram","addressRegion":"Haryana","postalCode":"122002","addressCountry":"India"},"contactPoint":{"@type":"ContactPoint","contactType":"contact","telephone":"+919818560331","email":"info.britannicaoverseas.com"},"sameAs":["https://www.facebook.com/britannicaoverseasedu","https://twitter.com/BritannicaOEdu","https://www.youtube.com/channel/UCK2eeC1CkS3YkYrGnnzBUEQ","https://in.pinterest.com/Britannicaoverseas/","https://www.linkedin.com/company/britannicaoverseas/","https://www.instagram.com/britannicaoverseas/","https://www.tumblr.com/britannicaoverseas/"]}
</script>
  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-PXNZKF7');
  </script>
  <!-- End Google Tag Manager -->
  <!-- Favicons-->
  @stack('breadcrumb_schema')
  <style>
    .hide-this {
      display: none;
    }
  </style>
  <style>
    .sItems ul li a,
    .sItems ul li.active {
      padding: 8px 15px;
      display: block
    }

    .sItems {
      width: 100%;
      height: 118px;
      overflow: auto;
      top: 0
    }

    .sItems ul li {
      border-bottom: 1px solid #eee
    }

    .sItems ul li.active {
      font-size: 15px;
      text-align: left;
      background: #ff57221c;
      color: #da0b4e;
      text-transform: uppercase;
      font-weight: 600
    }

    .sItems ul li a:hover {
      background: #da0b4e;
      color: #fff
    }
  </style>
</head>

<body class="red-skin">
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PXNZKF7" height="0" width="0"
      style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <div id="main-wrapper">
    <!-- Top header-->
    {{-- <button data-toggle="modal" data-target="#britannicamodal">.</button> --}}

    <div class="header header-light head-shadow">
      <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
          <div class="nav-header">
            <a class="nav-brand" href="{{ url('/') }}"><img src="{{ url('front/') }}/assets/img/logo.webp"
                class="logo" alt="Shweta Study Abroad Logo" /></a>
            <div class="nav-toggle"></div>
          </div>
          <div class="nav-menus-wrapper" style="transition-property: none;">
            <ul class="nav-menu nav-menu-social align-to-right">
              @if (session()->has('studentLoggedIn'))
                <li class="login_click light"><a href="{{ url('/student/profile/') }}">Profile</a></li>
              @else
                <li class="login_click light"><a href="{{ url('/') }}/sign-in">Login</a></li>
              @endif
            </ul>
            <ul class="nav-menu align-to-right">

              <li class="mega-dropdown"><a href="#">Study Destination<span class="submenu-indicator"></span></a>
                <ul class="nav-dropdown nav-submenu mega-dropdown-menu">
                  <div class="row">
                    @foreach ($menuDestinations->chunk(4) as $chunk)
                      {{-- Split into columns of 5 items --}}
                      <div class="col-12 col-sm-12 col-md-3">
                        <ul>
                          @foreach ($chunk as $destination)
                            <li>
                              <a href="{{ url('/') }}/{{ $destination->destination_slug }}">
                                <img src="{{ asset('country/fm/' . slugify($destination->getIso->iso) . '.png') }}"
                                  alt=" {{ $destination->destination_name }} flag">
                                {{ $destination->destination_name }}
                              </a>
                            </li>
                          @endforeach
                        </ul>
                      </div>
                    @endforeach
                  </div>
                </ul>
              </li>

              <li><a href="{{ route('universities') }}">Universities</a></li>
              <li><a href="{{ route('blog') }}">Blog</a></li>
              <li><a href="{{ url('/') }}/exams">Exams</a></li>
              <li><a href="{{ route('services') }}">Services</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
    <div class="clearfix"></div>
    <!-- Modal -->
    <div class="modal all-malaysia fade" id="britannicamodal" tabindex="-1" role="dialog"
      aria-labelledby="britannicamodalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <img src="{{ url('front/') }}/assets/img/logo.webp" class="logo-max" alt="Education Malaysia Education Logo">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>

            <div class="row">

              <div class="col-12 col-sm-12 col-md-12">
                <div class="all-fieldss">

                  <h2 class="malaysiastudys">Study Abroad – Get Up to 100% Scholarships! <span>( Limited Time Only!
                      )</span></h2>

                  <form id="counsellingForm" class="row">
                    <input type="hidden" name="return_to" value="{{ request()->path() }}">
                    <input type="hidden" name="source" value="Shweta Study Abroad - Modal Form">
                    <input type="hidden" name="source_path" value="{{ url()->current() }}">

                    <div class="col-12 col-sm-6 col-md-6">
                      <div class="form-group">
                        <div>
                          <input type="text" class="form-control" id="mf_name" name="name"
                            placeholder="Full Name">
                          <span class="text-danger error-name span-bs"></span>
                        </div>
                      </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-6">
                      <div class="form-group">
                        <div>
                          <input type="email" class="form-control" id="mf_email" name="email"
                            placeholder="Email Address">
                          <span class="text-danger error-email span-bs"></span>
                        </div>
                      </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-6">
                      <div class="form-group">
                        <select name="c_code" id="c_code" class="form-control">
                          <option value="">Select</option>
                          @foreach ($modalPhonecodes as $row)
                            <option value="{{ $row->phonecode }}"
                              {{ (old('c_code') && old('c_code') == $row->phonecode) || $row->phonecode == '91' ? 'Selected' : '' }}>
                              +{{ $row->phonecode }} ({{ $row->name }})
                            </option>
                          @endforeach
                        </select>
                        <span class="text-danger error-c_code span-bs"></span>
                      </div>

                    </div>
                    <div class="col-12 col-sm-6 col-md-6">
                      <div class="form-group">
                        <input type="tel" class="form-control" id="mf_phone" name="mobile"
                          placeholder="Mobile Number">
                        <span class="text-danger error-mobile span-bs"></span>
                      </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-12">
                      <div class="form-group">
                        <div>
                          <select class="form-control" id="rcountry" name="country">
                            <option value="">Select</option>
                            @foreach ($modalPhonecodes as $row)
                              <option value="{{ $row->name }}"
                                {{ old('country') && old('country') == $row->name ? 'Selected' : '' }}>
                                {{ $row->name }}
                              </option>
                            @endforeach
                          </select>
                          <span class="text-danger error-country span-bs"></span>
                        </div>
                      </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-12">
                      <div class="form-group">
                        <div>
                          <select class="form-control" id="current_qualification_level"
                            name="current_qualification_level">
                            <option value="">Select</option>
                            @foreach ($modalLevels as $row)
                              <option value="{{ $row->level }}"
                                {{ old('current_qualification_level') && old('current_qualification_level') == $row->level ? 'Selected' : '' }}>
                                {{ $row->level }}</option>
                            @endforeach
                          </select>
                          <span class="text-danger error-current_qualification_level span-bs"></span>
                        </div>
                      </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-12">
                      <div class="form-group">
                        <div>
                          <select class="form-control" id="program" name="intrested_course_category">
                            <option value="">Select a program</option>
                            @foreach ($modalCategories as $row)
                              <option value="{{ $row->category_name }}"
                                {{ old('intrested_course_category') && old('intrested_course_category') == $row->category_name
                                    ? 'Selected'
                                    : '' }}>
                                {{ $row->category_name }}</option>
                            @endforeach
                          </select>
                          <span class="text-danger error-intrested_course_category span-bs"></span>
                        </div>
                      </div>
                    </div>

                    <div class="col-12">
                      <button type="submit" class="btn btn-primary w-100" id="submitBtn">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- Top header-->
    <script>
      $(document).ready(function() {
        //alert('openModal');
        //$('#britannicamodal').modal('show');
        const studentLoggedIn = {{ session()->has('studentLoggedIn') ? 'true' : 'false' }};
        const excludedPaths = [
          '/sign-in/',
          '/sign-up/',
        ];

        const modalKey = 'bo_modal_status';
        const currentPath = window.location.pathname;
        // Do not show modal on excluded pages
        if (excludedPaths.includes(currentPath)) {
          return;
        }

        function openModal() {
          //alert('openModal');
          $('#britannicamodal').modal('show');
        }

        let modalStatus = localStorage.getItem(modalKey);

        if (!studentLoggedIn && modalStatus !== 'submitted') {
          if (modalStatus !== 'closed') {
            openModal();
          } else {
            const lastClosed = localStorage.getItem('bo_modal_closed_time');
            if (lastClosed) {
              const diff = Date.now() - parseInt(lastClosed);
              // if (diff > 5 * 60 * 1000) {
              //   openModal();
              // }
              if (diff > 1 * 1000) {
                openModal();
              }
            }
          }
        }

        $('#britannicamodal').on('hidden.bs.modal', function() {
          if (localStorage.getItem(modalKey) !== 'submitted') {
            localStorage.setItem(modalKey, 'closed');
            localStorage.setItem('bo_modal_closed_time', Date.now().toString());
          }
        });



        $('#counsellingForm').on('submit', function(e) {
          e.preventDefault();

          // Disable the button and show loading
          let submitBtn = $('#submitBtn');
          submitBtn.prop('disabled', true).html('Submitting...');

          $('.text-danger').text(''); // Clear previous errors

          $.ajax({
            url: "{{ route('counselling.submit') }}",
            method: 'POST',
            data: $(this).serialize(),
            headers: {
              'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(res) {
              if (res.success) {
                localStorage.setItem(modalKey, 'submitted');
                // window.location.href = "{{ url('thank-you') }}";
                window.location.href = "{{ url('confirmed-email') }}" + "?" + res.seg;
              }
            },
            error: function(xhr) {
              // Re-enable the button
              submitBtn.prop('disabled', false).html('Submit');

              if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                $.each(errors, function(key, val) {
                  $('.error-' + key).text(val[0]);
                });
              } else {
                alert('Something went wrong. Please try again.');
              }
            }
          });
        });

      });
    </script>
