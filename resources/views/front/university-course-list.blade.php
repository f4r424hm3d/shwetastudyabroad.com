@php
  use App\Models\ShortlistedProgram;
@endphp
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
        "name": "{{ $university->name }}",
        "item": "{{ url($university->getDestination->destination_slug.'/universities/'.$university->slug) }}"
      }, {
        "@type": "ListItem",
        "position": 5,
        "name": "Courses",
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
@push('pagination_tag')
  @if ($npu)
    <link rel="next" href="{{ $npu }}" />
  @endif
  @if ($ppu)
    <link rel="prev" href="{{ $ppu }}" />
  @endif
@endpush
@section('main-section')
  <!-- Top header-->
  @include('front.university-profile')
  <!-- Breadcrumb -->
  <!-- Menu -->
  @include('front.university-profile-menu')
  <!-- Menu -->
  <section class="bg-light pt-4 pb-4">
    <div class="container">
      <div class="row">
        <!-- Desktop Filter -->
        <div class="col-lg-3 col-md-3 col-sm-12">
          <form class="form-inline addons hide-23 mb-2">
            <input class="form-control img-fluid" type="search" placeholder="Search Courses" aria-label="Search">
            <button class="btn my-2 my-sm-0" type="submit"><i class="ti-search"></i></button>
          </form>
          <div id="accordionExample" class="accordion shadow circullum hide-23 full-width">
            <div class="card mb-2">
              <div id="headingOne" class="card-header bg-white shadow-sm border-0 pt-2 pb-2 pl-4 pr-4">
                <h6 class="mb-0 accordion_title size-xs"><a href="#" data-toggle="collapse"
                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
                    class="d-block position-relative text-dark collapsible-link py-2">Study Level</a></h6>
              </div>
              <div id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse show">
                <div class="scrlbar">
                  <div class="card-body pl-4 pr-4 pb-2">
                    <ul class="no-ul-list mb-3">
                      @foreach ($levels as $row)
                        <li>
                          <input id="level{{ $row->getLevel->id }}" class="checkbox-custom" name="institute_type"
                            type="checkbox"
                            onclick="{{ session()->get('UCF_level') == $row->getLevel->id
                                ? 'removeFilter(`UCF_level`)'
                                : 'ApplyLevelFilter(`' . $row->getLevel->id . '`)' }}"
                            {{ session()->get('UCF_level') == $row->getLevel->id ? 'checked' : '' }}>
                          <label for="level{{ $row->getLevel->id }}"
                            class="checkbox-custom-label">{{ $row->getLevel->level }}</label>
                        </li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="card mb-2">
              <div id="headingTwo" class="card-header bg-white shadow-sm border-0 pt-2 pb-2 pl-4 pr-4">
                <h6 class="mb-0 accordion_title size-xs"><a href="#" data-toggle="collapse"
                    data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"
                    class="d-block position-relative text-dark collapsible-link py-2">Course Category</a></h6>
              </div>
              <div id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordionExample" class="collapse show">
                <div class="scrlbar">
                  <div class="card-body pl-4 pr-4 pb-2">
                    <ul class="no-ul-list mb-3">
                      @foreach ($categories as $row)
                        <li>
                          <input id="category{{ $row->getCategory->id }}" class="checkbox-custom" name="institute_type"
                            type="checkbox"
                            onclick="{{ session()->get('UCF_course_category') == $row->getCategory->id ? 'removeFilter(`UCF_course_category`)' : 'ApplyCategoryFilter(`' . $row->getCategory->id . '`)' }}"
                            {{ session()->get('UCF_course_category') == $row->getCategory->id ? 'checked' : '' }}>
                          <label for="category{{ $row->getCategory->id }}"
                            class="checkbox-custom-label">{{ $row->getCategory->category_name }}</label>
                        </li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="card mb-2">
              <div id="headingThree" class="card-header bg-white shadow-sm border-0 pt-2 pb-2 pl-4 pr-4">
                <h6 class="mb-0 accordion_title size-xs"><a href="#" data-toggle="collapse"
                    data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree"
                    class="d-block position-relative text-dark collapsible-link py-2">Stream</a></h6>
              </div>
              <div id="collapseThree" aria-labelledby="headingThree" data-parent="#accordionExample"
                class="collapse show">
                <div class="scrlbar">
                  <div class="card-body pl-4 pr-4 pb-2">
                    <ul class="no-ul-list mb-3">
                      @foreach ($specializations as $row)
                        <li>
                          <input id="spc{{ $row->getSpecialization->id }}" class="checkbox-custom" name="institute_type"
                            type="checkbox" onclick="<?php echo session()->get('UCF_specialization') == $row->getSpecialization->id ? "removeFilter('UCF_specialization')" : "ApplySpecializationFilter('" . $row->getSpecialization->id . "')";
                            ?>"
                            {{ session()->get('UCF_specialization') == $row->getSpecialization->id ? 'checked' : '' }}>
                          <label for="spc{{ $row->getSpecialization->id }}"
                            class="checkbox-custom-label">{{ $row->getSpecialization->specialization_name }}</label>
                        </li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="card mb-2" style="display:none">
              <div id="headingFour" class="card-header bg-white shadow-sm border-0 pt-2 pb-2 pl-4 pr-4">
                <h6 class="mb-0 accordion_title size-xs"><a href="#" data-toggle="collapse"
                    data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour"
                    class="d-block position-relative text-dark collapsible-link py-2">Intakes</a></h6>
              </div>
              <div id="collapseFour" aria-labelledby="headingFour" data-parent="#accordionExample"
                class="collapse show">
                <div class="scrlbar">
                  <div class="card-body pl-4 pr-4 pb-2">
                    <ul class="no-ul-list mb-3">
                      <li>
                        <input id="23" class="checkbox-custom" name="23" type="checkbox">
                        <label for="23" class="checkbox-custom-label">January</label>
                      </li>
                      <li>
                        <input id="24" class="checkbox-custom" name="24" type="checkbox">
                        <label for="24" class="checkbox-custom-label">Feburary</label>
                      </li>
                      <li>
                        <input id="25" class="checkbox-custom" name="25" type="checkbox">
                        <label for="25" class="checkbox-custom-label">March</label>
                      </li>
                      <li>
                        <input id="26" class="checkbox-custom" name="26" type="checkbox">
                        <label for="26" class="checkbox-custom-label">April</label>
                      </li>
                      <li>
                        <input id="27" class="checkbox-custom" name="27" type="checkbox">
                        <label for="27" class="checkbox-custom-label">May</label>
                      </li>
                      <li>
                        <input id="28" class="checkbox-custom" name="28" type="checkbox">
                        <label for="28" class="checkbox-custom-label">June</label>
                      </li>
                      <li>
                        <input id="29" class="checkbox-custom" name="29" type="checkbox">
                        <label for="29" class="checkbox-custom-label">July</label>
                      </li>
                      <li>
                        <input id="30" class="checkbox-custom" name="30" type="checkbox">
                        <label for="30" class="checkbox-custom-label">August</label>
                      </li>
                      <li>
                        <input id="31" class="checkbox-custom" name="31" type="checkbox">
                        <label for="31" class="checkbox-custom-label">September</label>
                      </li>
                      <li>
                        <input id="32" class="checkbox-custom" name="32" type="checkbox">
                        <label for="32" class="checkbox-custom-label">October</label>
                      </li>
                      <li>
                        <input id="33" class="checkbox-custom" name="33" type="checkbox">
                        <label for="33" class="checkbox-custom-label">November</label>
                      </li>
                      <li>
                        <input id="34" class="checkbox-custom" name="34" type="checkbox">
                        <label for="34" class="checkbox-custom-label">December</label>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="card mb-2">
              <div id="headingFive" class="card-header bg-white shadow-sm border-0 pt-2 pb-2 pl-4 pr-4">
                <h6 class="mb-0 accordion_title size-xs"><a href="#" data-toggle="collapse"
                    data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive"
                    class="d-block position-relative text-dark collapsible-link py-2">Study Mode</a></h6>
              </div>
              <div id="collapseFive" aria-labelledby="headingFive" data-parent="#accordionExample"
                class="collapse show">
                <div class="scrlbar">
                  <div class="card-body pl-4 pr-4 pb-2">
                    <ul class="no-ul-list mb-3">
                      @foreach ($study_modes as $row)
                        <li>
                          <input id="sm{{ $row->id }}" class="checkbox-custom" name="institute_type"
                            type="checkbox" onclick="<?php echo session()->get('UCF_study_mode') == $row->study_mode ? " removeFilter('UCF_study_mode')" : "ApplyFilter('UCF_study_mode','" . $row->study_mode . "')"; ?>"
                            {{ session()->get('UCF_study_mode') == $row->study_mode ? 'checked' : '' }}>
                          <label for="sm{{ $row->id }}"
                            class="checkbox-custom-label">{{ $row->study_mode }}</label>
                        </li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Desktop Filter -->

        <div class="col-lg-9 col-md-12 col-12">
          <div class="dn db-991 mt30 mb0 show-23 mb-3">
            <div id="main2"><a href="javascript:void(0)" class="btn btn-theme filter_open" onClick="openNav()"
                id="open2">Show Filter<span class="ml-2"><i class="ti-arrow-right"></i></span></a></div>
          </div>
          <!-- all universities -->
          <div class="filter-block">
            <h4 class="mb-0"><span class="theme-cl">{{ $total }}</span> Programme offered by <span
                class="theme-cl">{{ $university->name }}</span></h4>
            <div class="portal-filter">
              <div class="heading">Filters Applied</div>
              <ul>
                @if (session()->has('UCF_level'))
                  <li><a onclick="removeFilter('UCF_level')" href="javascript:void(0)">{{ $filter_level->level }}<span
                        class="cross">×</span></a></li>
                @endif
                @if (session()->has('UCF_course_category'))
                  <li><a onclick="removeFilter('UCF_course_category')"
                      href="javascript:void(0)">{{ $filter_category->category_name }}<span class="cross">×</span></a>
                  </li>
                @endif
                @if (session()->has('UCF_specialization'))
                  <li><a onclick="removeFilter('UCF_specialization')"
                      href="javascript:void(0)">{{ $filter_specialization->specialization_name }}<span
                        class="cross">×</span></a></li>
                @endif
                @if (session()->has('UCF_study_mode'))
                  <li><a onclick="removeFilter('UCF_study_mode')"
                      href="javascript:void(0)">{{ session()->get('UCF_study_mode') }}<span class="cross">×</span></a>
                  </li>
                @endif
              </ul>
              @if (session()->has('UCF_level') ||
                      session()->has('UCF_course_category') ||
                      session()->has('UCF_specialization') ||
                      session()->has('UCF_study_mode'))
                <a onclick="removeAllFilter()" href="javascript:void(0)" class="clearAll">Clear All</a>
              @endif
            </div>

            <h4 class="mt-3 mb-2">Showing courses based on your selection</h4>

          </div>

          <div class="dashboard_container">
            <div class="dashboard_container_body">

              @foreach ($rows as $row)
                @php
                  $study_modes = $row->study_mode != null ? json_decode($row->study_mode) : '';
                  $study_modes = $study_modes != null ? implode(', ', $study_modes) : '';
                  $exams = $row->exam_accepted != null ? json_decode($row->exam_accepted) : '';
                  $exams = $exams != null ? implode(', ', $exams) : '';
                  if (session()->has('studentLoggedIn')) {
                      $where = ['program_id' => $row->id, 'student_id' => session()->get('student_id')];
                      $check = ShortlistedProgram::where($where)->count();
                  }
                @endphp

                <!-- Single University -->
                <div class="dashboard_single_course pl-4 pr-4">
                  <div class="dashboard_single_course_caption pl-0 mt-0">

                    <div class="dashboard_single_course_head">
                      <div class="dashboard_single_course_head_flex">
                        <h4 class="dashboard_course_title">{{ $row->program_name }}

                          @if (session()->has('studentLoggedIn'))
                            <div id="shortlisted_mark{{ $row->id }}"
                              class="woo_buttons float-right {{ $check > 0 ? '' : 'hide-this' }}">
                              <a href="javascript:void(0)" class="btn woo_btn_light" data-toggle="tooltip"
                                data-placement="top" title="Shortlisted">
                                <i style="background-color: red" class="ti-heart"></i>
                              </a>
                            </div>

                            <div id="add_to_shortlist_mark{{ $row->id }}"
                              class="woo_buttons float-right {{ $check > 0 ? 'hide-this' : '' }}">
                              <a href="javascript:void(0)" onclick="shortlistProgram('{{ $row->id }}')"
                                class="btn woo_btn_light" data-toggle="tooltip" data-placement="top"
                                title="Add To Shortlist">
                                <i class="ti-heart"></i>
                              </a>
                            </div>
                          @endif

                        </h4>
                      </div>
                    </div>

                    <div class="row align-items-center">
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-md-3 col-6 mt-1 mb-1"><span class="theme-cl">Study
                              Mode:</span><br>{{ $study_modes }}</div>
                          <div class="col-md-3 col-6 mt-1 mb-1"><span
                              class="theme-cl">Duration:</span><br>{{ $row->duration }}</div>
                          <div class="col-md-3 col-6 mt-1 mb-1"><span
                              class="theme-cl">Intakes:</span><br>{{ j2s($row->intake) }}
                          </div>
                          <div class="col-md-3 col-6 mt-1 mb-1"><span class="theme-cl">
                              Exams Accepted:</span><br><strong>{{ $exams }}</strong>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row mt-3 align-items-center">
                      <div class="col-md-12">
                        <a href="{{ route('university.course.detail', ['destination_slug' => $university->getDestination->destination_slug, 'university_slug' => $university->slug, 'program_slug' => $row->program_slug]) }}"
                          class="card-btn2">
                          View Details
                        </a>
                        <a href="{{ route('university.course.detail', ['destination_slug' => $university->getDestination->destination_slug, 'university_slug' => $university->slug, 'program_slug' => $row->program_slug]) }}"
                          class="btn btn-modern2">Compare<span><i class="ti-reload"></i></span></a>
                      </div>
                    </div>

                  </div>
                </div>
              @endforeach
              {!! $rows->links('pagination::bootstrap-4') !!}
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- Content -->
  <!-- Mobile Filter -->

  <!-- Show more -->
  <script>
    $(".show-more").click(function() {
      if ($(".text").hasClass("show-more-height")) {
        $(this).text("(Show Less)");
      } else {
        $(this).text("(Show More)");
      }
      $(".text").toggleClass("show-more-height");
    });
  </script>
  <script>
    function openNav() {
      document.getElementById("filter-sidebar").style.width = "320px";
    }

    function closeNav() {
      document.getElementById("filter-sidebar").style.width = "0";
    }
  </script>
  <script>
    function ApplyLevelFilter(val) {
      //alert(val);
      $.ajax({
        url: "{{ url('university-course-list/level') }}",
        method: "GET",
        data: {
          level_id: val
        },
        success: function(result) {
          //alert(result);
          window.open(
            "{{ url($university->getDestination->destination_slug . '/universities/' . $university->slug) }}" +
            "/" +
            result, '_SELF');
        }
      })
    }

    function ApplyCategoryFilter(val) {
      //alert(val);
      $.ajax({
        url: "{{ url('university-course-list/category') }}",
        method: "GET",
        data: {
          course_category_id: val
        },
        success: function(result) {
          //alert(result);
          window.open(
            "{{ url($university->getDestination->destination_slug . '/universities/' . $university->slug) }}" +
            "/" + result, '_SELF');
        }
      })
    }

    function ApplySpecializationFilter(val) {
      //alert(val);
      $.ajax({
        url: "{{ url('university-course-list/specialization') }}",
        method: "GET",
        data: {
          specialization_id: val
        },
        success: function(result) {
          //alert(result);
          window.open(
            "{{ url($university->getDestination->destination_slug . '/universities/' . $university->slug) }}" +
            "/" + result, '_SELF');
        }
      })
    }

    function ApplyFilter(col, val) {
      //alert(`${col} , ${val}`);
      $.ajax({
        url: "{{ url('university-course-list/apply-filter') }}",
        method: "GET",
        data: {
          col: col,
          val: val,
        },
        success: function(result) {
          //alert(result);
          //window.open("{{ url($university->slug . '/') }}"+ "/courses", '_SELF');
          location.reload(true);
        }
      })
    }


    function removeFilter(a) {
      //alert(a);
      if (a != "") {
        $.ajax({
          url: "{{ url('university-course-list/remove-filter') }}",
          method: "GET",
          data: {
            value: a
          },
          success: function(b) {
            window.open(
              "{{ url($university->getDestination->destination_slug . '/universities/' . $university->slug . '/courses') }}",
              '_SELF');
          }
        })
      }
    }

    function removeAllFilter() {
      $.ajax({
        url: "{{ url('university-course-list/remove-all-filter') }}",
        method: "GET",
        success: function(b) {
          window.open(
            "{{ url($university->getDestination->destination_slug . '/universities/' . $university->slug . '/courses') }}",
            '_SELF');
        }
      })
    }

    function applyProgram(program_id, btn_id) {
      //alert(id);
      return new Promise(function(resolve, reject) {
        $("#" + btn_id).text('Applying...');
        $.ajax({
          url: "{{ url('/student/apply-program') }}",
          method: "GET",
          data: {
            program_id: program_id,
          },
          success: function(data) {
            //alert(data);
            $("#" + btn_id).attr('class', 'btn btn-success');
            $("#" + btn_id).text('Applied');
          }
        }).fail(err => {
          $("#" + btn_id).attr('class', 'btn btn-danger');
          $("#" + btn_id).text('Failed');
        });
      });
    }

    function shortlistProgram(program_id) {
      //alert(id);
      return new Promise(function(resolve, reject) {
        //$("#" + btn_id).text('Applying...');
        $.ajax({
          url: "{{ url('/student/shortlist-program') }}",
          method: "GET",
          data: {
            program_id: program_id,
          },
          success: function(data) {
            //alert(data);
            $("#shortlisted_mark" + program_id).show();
            $("#add_to_shortlist_mark" + program_id).hide();
          }
        }).fail(err => {
          // $("#" + btn_id).attr('class', 'btn btn-danger');
          // $("#" + btn_id).text('Failed');
        });
      });
    }
  </script>
@endsection
