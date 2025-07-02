@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
  <style>
    .hide-this {
      display: none;
    }
  </style>
  <!-- Content -->
  <section class="bg-light">
    <div class="log-space">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12 col-md-12">
            <div class="row no-gutters position-relative log_rads">
              <div class="d-none d-md-block col-lg-6 col-md-5 bg-cover"
                style="background:#1f2431 url({{ url('/front/') }}/assets/img/log.png)no-repeat;">
                <div class="lui_9okt6">
                  <div class="_loh_revu97">
                    <div id="reviews-login">
                      <!-- Single Reviews -->
                      <div class="_loh_r96">
                        <div class="_bloi_quote"><i class="fa fa-quote-left"></i></div>
                        <div class="_loh_r92">
                          <h4>Good Services</h4>
                        </div>
                        <div class="_loh_r93">
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
                        </div>
                        <div class="_loh_foot_r93">
                          <h4>Shilpa D. Setty</h4>
                          <span>Team Leader</span>
                        </div>
                      </div>
                      <!-- Single Reviews -->
                      <div class="_loh_r96">
                        <div class="_bloi_quote"><i class="fa fa-quote-left"></i></div>
                        <div class="_loh_r92">
                          <h4>Good Services</h4>
                        </div>
                        <div class="_loh_r93">
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
                        </div>
                        <div class="_loh_foot_r93">
                          <h4>Adam Wilsom</h4>
                          <span>Mak Founder</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-7 position-static p-2">
                @if (session()->has('smsg'))
                  <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ session()->get('smsg') }}
                  </div>
                @endif
                @if (session()->has('emsg'))
                  <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ session()->get('emsg') }}
                  </div>
                @endif
                @error('g-recaptcha-response')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                <form action="{{ $url }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                  <input type="hidden" name="return_to" value="{{ $_GET['return_to'] ?? null }}">
                  <input type="hidden" name="program_id" value="{{ $_GET['program_id'] ?? null }}">
                  <div class="log_wraps">
                    <div class="log__heads">
                      <h4 class="mt-0 logs_title">Sign <span class="theme-cl1">Up</span></h4>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-icon"><span class="ti-user"></span></div>
                        <input name="name" type="text" class="form-control b-0 bg-white pl-0"
                          placeholder="Enter Your Name" value="{{ old('name') }}" required="">
                      </div>
                      <span class="text-danger">
                        @error('name')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-icon"><span class="ti-email"></span></div>
                        <input name="email" type="email" class="form-control b-0 bg-white pl-0"
                          placeholder="Enter Your Email Address" value="{{ old('email') }}" required="">
                      </div>
                      <span class="text-danger">
                        @error('email')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                    <div class="row">
                      <div class="col-3 pr-0">
                        <select name="c_code" id="c_code" class="form-control bg-white">
                          <option value="">Select</option>
                          @foreach ($phonecodes as $row)
                            <option value="{{ $row->phonecode }}"
                              {{ (old('c_code') && old('c_code') == $row->phonecode) || $row->phonecode == '91' ? 'Selected' : '' }}>
                              +{{ $row->phonecode }} ({{ $row->name }})
                            </option>
                          @endforeach
                        </select>
                        <span class="text-danger">
                          @error('c_code')
                            {{ $message }}
                          @enderror
                        </span>
                      </div>
                      <div class="col-9 pl-1">
                        <div class="form-group">
                          <div class="input-group">
                            <div class="input-icon"><span class="ti-mobile"></span></div>
                            <input name="mobile" type="number" class="form-control b-0 bg-white pl-0"
                              placeholder="Ex. 9634575238" value="{{ old('mobile') }}" required="">
                          </div>
                          <span class="text-danger">
                            @error('mobile')
                              {{ $message }}
                            @enderror
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <select name="current_qualification_level" id="current_qualification_level"
                        class="form-control bg-white">
                        <option value="">Qualification Level</option>
                        @foreach ($levels as $row)
                          <option value="{{ $row->level }}"
                            {{ old('current_qualification_level') && old('current_qualification_level') == $row->level ? 'Selected' : '' }}>
                            {{ $row->level }}</option>
                        @endforeach
                      </select>
                      <span class="text-danger">
                        @error('current_qualification_level')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                    <div class="form-group">
                      <select name="intrested_course_category" id="intrested_course_category"
                        class="form-control bg-white">
                        <option value="">Intrested Course Category</option>
                        @foreach ($course_categories as $row)
                          <option value="{{ $row->category_name }}"
                            {{ old('intrested_course_category') && old('intrested_course_category') == $row->category_name
                                ? 'Selected'
                                : '' }}>
                            {{ $row->category_name }}</option>
                        @endforeach
                      </select>
                      <span class="text-danger">
                        @error('intrested_course_category')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-icon">
                          <span id="password_icon_show" class="ti-eye" onclick="showPassword('password')"></span>
                          <span id="password_icon_hide" class="ti-eye hide-this"
                            onclick="hidePassword('password')"></span>
                        </div>
                        <input name="password" id="password" type="password" class="form-control bg-white b-0 b-l"
                          placeholder="Password">
                      </div>
                      <span class="text-danger">
                        @error('password')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-icon">
                          <span id="confirm_password_icon_show" class="ti-eye"
                            onclick="showPassword('confirm_password')"></span>
                          <span id="confirm_password_icon_hide" class="ti-eye hide-this"
                            onclick="hidePassword('confirm_password')"></span>
                        </div>
                        <input name="confirm_password" id="confirm_password" type="password"
                          class="form-control bg-white b-0 b-l" placeholder="Confirm Password">
                      </div>
                      <span class="text-danger">
                        @error('confirm_password')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
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
                    <div class="form-group">
                      <button type="submit" class="btn btn-theme-2 rounded w-100">Sign Up</button>
                    </div>
                    <div class="form-group text-center mb-0">
                      Are you a already member? &nbsp;&nbsp; <a href="{{ url('sign-in') }}" class="theme-cl1">Sign
                        In</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Content -->
  <script>
    function showPassword(id) {
      $("#" + id).attr('type', 'text');
      $("#" + id + '_icon_show').hide();
      $("#" + id + '_icon_hide').show();
    }

    function hidePassword(id) {
      $("#" + id).attr('type', 'password');
      $("#" + id + '_icon_show').show();
      $("#" + id + '_icon_hide').hide();
    }
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
