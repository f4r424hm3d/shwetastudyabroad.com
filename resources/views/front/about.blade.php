@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
  <!-- Breadcrumb -->
  <div class="image-cover ed_detail_head lg" 
    data-overlay="8">
    <!-- style="background:url({{ asset('front/') }}/assets/img/ub.jpg);" -->
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12 col-md-12">
          <div class="ed_detail_wrap light">
            <ul class="cources_facts_list">
              <li class="facts-1"><a href="{{ url('/') }}">Home</a></li>
              <li class="facts-1">About</li>
            </ul>
            <div class="ed_header_caption mb-0">
              <h1 class="ed_title mb-0">About Britannica</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumb -->

  <!-- Content -->
  <section>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="about-short">
            <div class="sec-heading">
              <h2>About <span class="theme-cl1">Britannica Overseas</span> Education</h2>
            </div>
            <div class="font-size-16">
              <p>Britannica Overseas is the cutting edge of higher education’s Recruitment, Marketing, and student
                enrollment. We have been a well-founded solutions specialist to our partner institutions since 2015.
                Britannica Overseas has been providing services for higher education marketing to over 100 partner
                schools across the globe. We have also launched multiple websites for different overseas study
                destinations like Malaysia, Germany, Canada, Australia, and the UK; hence, we receive millions of
                visitors every month.</p>
              <p>Prospective candidates, who are looking to get admission to any university and course program of
                their liking, can find information through our multiple portals dedicated to overseas education. With
                more to come in the near future, we are currently representing multiple individual education brands
                that cover everything under one roof from Admission to Marketing and every section of an education
                system. This evolution of ours has helped connect potential candidates from around the globe to our
                partner Universities/Institutions/Colleges and is now recognized by an international team in Malaysia
                and India. Britannica Overseas has stepped into an era within the education industry by introducing
                software and marketing solutions.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="list_facts_wrap_img"><img data-src="{{ asset('front/') }}/assets/img/edu_2.png" class="img-fluid"
              alt="Photo">
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="we-offer-area text-center bg-gray bg-light">
    <div class="container">
      <div class="row">

        <div class="col-md-4 mb-3 ">
          <div class="item m-0">
            <i class="fas fa-eye-slash"></i>
            <h4>Vision</h4>
            <p>Our vision is to make a transformative impact on the Study Abroad Service Sector through continual
              innovation in student services by connecting institutions, recruiters, and students across the globe.
            </p>
          </div>
        </div>

        <div class="col-md-4 mb-3 ">
          <div class="item m-0">
            <i class="fas fa-bullseye"></i>
            <h4>Mission</h4>
            <p>To provide students with the best study abroad plans & services. To render scrupulous services and
              build robust business relationships.</p>
          </div>
        </div>

        <div class="col-md-4 mb-3 ">
          <div class="item m-0">
            <i class="fas fa-tasks"></i>
            <h4>Objective</h4>
            <p>To Expand the Academic Horizons We believe in re-inventing the Overseas Education Services for the
              students who want to study in a foreign. We have joined the forces with the Top Universities globally
              and with like-minded student recruiters.</p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="list_facts_wrap_img"><img data-src="{{ asset('front/') }}/assets/img/edu_2.png" class="img-fluid"
              alt="">
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="about-short">
            <div class="sec-heading">
              <h2>Why <span class="theme-cl1">Choose</span> Us</h2>
            </div>
            <h3>Some Reasons To Work Together</h3>
            <div class="font-size-16">
              <p><strong>We provide Best services</strong><br>
                In this education industry we are the name that the people like to bank upon as giving them the
                quality assurance in all the services. These services range from Enrollment Generation On A Global
                Scale, CRM and marketing automation, higher education Marketing, student lead generation to software
                development.</p>

              <p><strong>We establish Good Relation</strong><br>
                During our entire journey we have built up good relations with our partners. The client is on the
                priority list of ours so that is why the customers find a long term alliance with us. This is the
                mutual understanding between us and our clients that makes our relationship with them to be dynamic.
              </p>

              <p><strong>We work with Integrity & ethical transparency</strong><br>
                We work with transparency and give people the reason to look forward to us.Trust is the basis of
                business and communication between us and our clients. We believe in transparent information sharing
                with our customers with lack of any hidden goals behind. We have maintained a strong stand on ethical
                values hence committed to our vision.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="we-offer-area text-center bg-gray bg-light">
    <div class="container">

      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="sec-heading center">
            <h2><span class="theme-cl1">Get To</span> Know About Britannica</h2>

          </div>
        </div>
      </div>

      <div class="row">

        <div class="col-lg-3 col-md-6 col-sm-12">
          
            <div class="_get_know_caption main-captions  ">
              <h4><span class="counts">9</span>+</h4>
              <p>Years Of Experience</p>
            </div>
        
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12">
        
            <div class="_get_know_caption main-captions  ">
              <h4><span class="counts">17</span>+</h4>
              <p>Professional Experts</p>
            </div>
         
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12">
     
            <div class="_get_know_caption main-captions  ">
              <h4><span class="counts">1800</span>+</h4>
              <p>Partners Universities</p>
            </div>
        
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12">
          
            <div class="_get_know_caption main-captions  ">
              <h4><span class="counts">8</span>+</h4>
              <p>So far we have offices across 5 countries</p>
            </div>
          
        </div>

      </div>

    </div>
  </section>
  <!-- Content -->
@endsection
