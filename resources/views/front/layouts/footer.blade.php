<!-- Footer -->
<footer class="dark-footer skin-dark-footer">
  <div>
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-3">
          <div class="footer-widget">
            <span class="widget-title">Top Universities</span>
            <ul class="footer-menu">
              <li><a href="{{ url('/') }}"><i class="ti-arrow-right"></i> ENGINEERING</a></li>
              <li><a href="{{ url('/') }}"><i class="ti-arrow-right"></i> MANAGEMENT</a></li>
              <li><a href="{{ url('/') }}"><i class="ti-arrow-right"></i> MEDICAL</a></li>
              <li><a href="{{ url('/') }}"><i class="ti-arrow-right"></i> LAW</a></li>
              <li><a href="{{ url('/') }}"><i class="ti-arrow-right"></i> COMMERCE</a></li>
              <li><a href="{{ url('/') }}"><i class="ti-arrow-right"></i> SCIENCE</a></li>
              <li><a href="{{ url('/') }}"><i class="ti-arrow-right"></i> ARTS</a></li>
            </ul>
          </div>
        </div>

        <div class="col-lg-3 col-md-3">
          <div class="footer-widget">
            <span class="widget-title">English Exams</span>
            <ul class="footer-menu">
              <li><a href="{{ url('/') }}/exam/ielts/overview"><i class="ti-arrow-right"></i> IELTS Exam</a></li>
              <li><a href="{{ url('/') }}/exam/pte/overview"><i class="ti-arrow-right"></i> PTE Exam</a></li>
              <li><a href="{{ url('/') }}/exam/oet/overview"><i class="ti-arrow-right"></i> OET Exam</a></li>
              <li><a href="{{ url('/') }}/exam/toefl/overview"><i class="ti-arrow-right"></i> TOEFL Exam</a></li>
              <li><a href="{{ url('/') }}/exam/gmat/overview"><i class="ti-arrow-right"></i> GMAT Exam</a></li>
              <li><a href="{{ url('/') }}/exam/nhs/overview"><i class="ti-arrow-right"></i> NHS UK</a></li>
              <li><a href="{{ url('/') }}/"><i class="ti-arrow-right"></i> Duolingo Exam</a>
              </li>
            </ul>
          </div>
        </div>

        <div class="col-lg-2 col-md-3">
          <div class="footer-widget">
            <span class="widget-title">Top Countries</span>
            <ul class="footer-menu">
              @foreach ($topCountries as $country)
                <li>
                  <a href="{{ url($country->destination_slug) }}">
                    <i class="ti-arrow-right"></i> {{ strtoupper($country->country) }}
                  </a>
                </li>
              @endforeach
            </ul>
          </div>
        </div>

        <div class="col-lg-2 col-md-3">
          <div class="footer-widget">
            <span class="widget-title">Study Abroad</span>
            <ul class="footer-menu">
              @foreach ($studyAbroad as $abroad)
                <li>
                  <a href="{{ url($abroad->destination_slug) }}">
                    <i class="ti-arrow-right"></i> {{ $abroad->destination_name }}
                  </a>
                </li>
              @endforeach
            </ul>
          </div>
        </div>

        <div class="col-lg-2 col-md-3">
          <div class="footer-widget">
            <span class="widget-title">Other Links</span>
            <ul class="footer-menu">
              <li><a href="{{ url('about') }}"><i class="ti-arrow-right"></i> ABOUT BRITANNICA</a></li>
              <li><a href="{{ url('contact') }}"><i class="ti-arrow-right"></i> CONTACT US</a></li>
              <li><a href="{{ url('team') }}"><i class="ti-arrow-right"></i> Our Team</a></li>
              <li><a href="{{ url('/career') }}"><i class="ti-arrow-right"></i> CAREER</a></li>
              <li><a href="{{ url('terms-conditions') }}"><i class="ti-arrow-right"></i> TERMS & CONDITIONS</a></li>
              <li><a href="{{ url('privacy-policy') }}"><i class="ti-arrow-right"></i> PRIVACY POLICY</a></li>
              <li><a href="{{ url('faqs') }}"><i class="ti-arrow-right"></i> FAQS</a></li>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-6">
          <p class="mb-0">© {{ date('Y') }} Shweta Study Abroad</p>
        </div>

        <div class="col-lg-6 col-md-6 text-right">
          <ul class="footer-bottom-social">
            <li><a href="https://www.facebook.com/britannicaoverseasedu" aria-label="Facebook"><i
                  class="ti-facebook"></i></a></li>
            <li><a href="https://twitter.com/britannicaoverseas" aria-label="Twitter"><i class="ti-twitter"></i></a>
            </li>
            <li><a href="https://www.instagram.com/britannicaoverseas/" aria-label="Instagram"><i
                  class="ti-instagram"></i></a></li>
            <li><a href="https://www.linkedin.com/company/britannicaoverseas/" aria-label="LinkedIn"><i
                  class="ti-linkedin"></i></a></li>
            <li><a href="https://www.pinterest.com/Britannicaoverseas/" aria-label="Pinterest"><i
                  class="ti-pinterest"></i></a></li>
          </ul>
        </div>

      </div>
    </div>
  </div>
</footer>
<div class="jsx-66a23b37ae4ff4a1 bottomLeadTickerContainer  bottom-btn">
  <button class="jsx-66a23b37ae4ff4a1 bottomLeadTickerBtn">
    <span class="jsx-66a23b37ae4ff4a1"><a href="{{ url('book-demo') }}" target="blank">Get a
        Free Expert Advice</a></span>
    <div id="mouse-scroll" class="jsx-66a23b37ae4ff4a1">
      <span class="jsx-66a23b37ae4ff4a1 down-arrow-1"></span>
      <span class="jsx-66a23b37ae4ff4a1 down-arrow-2"></span>
    </div>
  </button>
</div>
<!-- Footer End -->

<span id="back2Top" class="top-scroll" title="Back to top"><i class="ti-arrow-up"></i></span>
</div>
<!-- All Js -->

<script src="{{ cdn('front/assets/js/popper.min.js') }}"></script>
<script src="{{ cdn('front/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ cdn('front/assets/js/select2.min.js') }}"></script>
<script src="{{ cdn('front/assets/js/slick.js') }}"></script>
<script src="{{ cdn('front/assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ cdn('front/assets/js/counterup.min.js') }}"></script>
<script src="{{ cdn('front/assets/js/custom.js') }}"></script>
<script>
  $('#side-menu').metisMenu();
</script>
<script src="{{ cdn('front/assets/js/metisMenu.min.js') }}"></script>

<!-- Zoom -->
<link rel="preload" href="{{ cdn('front/assets/fancybox/jquery.fancybox.min.css') }}" as="style"
  onload="this.onload=null;this.rel='stylesheet'">
<script src="{{ cdn('front/assets/fancybox/jquery.fancybox.min.js') }}" defer></script>
<script>
  jQuery(document).ready(function($) {
    $(function() {
      $(".scrollTo a").click(function(e) {
        var destination = $(this).attr('href');
        $(".scrollTo li").removeClass('active');
        $(this).parent().addClass('active');
        $('html, body').animate({
          scrollTop: $(destination).offset().top - 90
        }, 500);
      });
    });
    var totalHeight = $('#myHeader').height() + $('.proHead').height();
    $(window).scroll(function() {
      if ($(this).scrollTop() > totalHeight) {
        $('.proHead').addClass('sticky');
      } else {
        $('.proHead').removeClass('sticky');
      }
    })
  });
</script>

<script>
  $(document).on('click', '#close-preview', function() {
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
      function() {
        $('.image-preview').popover('show');
      },
      function() {
        $('.image-preview').popover('hide');
      }
    );
  });

  $(function() {
    // Create the close button
    var closebtn = $('<button/>', {
      type: "button",
      text: 'x',
      id: 'close-preview',
      style: 'font-size: initial;',
    });
    closebtn.attr("class", "close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
      trigger: 'manual',
      html: true,
      title: "<strong>Preview</strong>" + $(closebtn)[0].outerHTML,
      content: "There's no image",
      placement: 'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function() {
      $('.image-preview').attr("data-content", "").popover('hide');
      $('.image-preview-filename').val("");
      $('.image-preview-clear').hide();
      $('.image-preview-input input:file').val("");
      $(".image-preview-input-title").text("Browse");
    });
    // Create the preview image
    $(".image-preview-input input:file").change(function() {
      var img = $('<img/>', {
        id: 'dynamic',
        width: 250,
        height: 200
      });
      var file = this.files[0];
      var reader = new FileReader();
      // Set preview image into the popover data-content
      reader.onload = function(e) {
        $(".image-preview-input-title").text("Change");
        $(".image-preview-clear").show();
        $(".image-preview-filename").val(file.name);
        img.attr('src', e.target.result);
        $(".image-preview").attr("data-content", $(img)[0].outerHTML).popover("show");
      }
      reader.readAsDataURL(file);
    });
  });
</script>

<script>
  $("#upload").click(function() {
    $("#upload-file").trigger('click');
  });
</script>
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

<!-- Whatsapp Box and Button -->
<style>
  .pr0 {
    padding-right: 0px
  }

  .pl0 {
    padding-left: 0px
  }

  .whats-float {
    position: fixed;
    transform: translate(-125px, 0px);
    bottom: 15px;
    left: 0;
    width: 180px;
    overflow: hidden;
    background-color: #2db742;
    color: #FFF;
    border-radius: 2px 0 0 2px;
    z-index: 10;
    transition: all 0.5s ease-in-out;
    vertical-align: middle;
    border-radius: 0px 6px 6px 0px;
    padding-left: 15px;
    padding-right: 5px
  }

  .whats-float a span {
    color: white;
    font-size: 14px;
    padding-top: 10px;
    padding-bottom: 10px;
    position: absolute;
    line-height: 16px;
    font-weight: 600
  }

  .whats-float img {
    width: 50px;
    padding: 10px;
    transform: rotate(0deg);
    transition: all 0.5s ease-in-out;
    float: right
  }

  .whats-float:hover {
    color: #FFFFFF;
    transform: translate(0px, 0px);
  }

  .whats-float:hover img {
    transform: rotate(360deg);
  }

  .chat-popup {
    display: none;
    position: fixed;
    bottom: 70px;
    left: 10px;
    z-index: 999;
    box-shadow: 0 10px 10px 4px rgba(0, 0, 0, .06)
  }

  .align-items-center {
    display: flex;
    align-items: center;
  }

  .wa-container {
    max-width: 325px;
    background-color: white;
    transition: all 0.5s ease-in-out;
    border-radius: 7px
  }

  .wa-container .cancel {
    width: 35px;
    height: 35px;
    background: #fff !important;
    color: #000;
    transition: all 0.5s ease-in-out;
    font-size: 14px;
    line-height: 20px;
    padding: 0px;
    text-align: center;
    top: -15px;
    right: -15px;
    position: absolute;
    border: 0px;
    border-radius: 50%;
    box-shadow: 0 10px 10px 4px rgba(0, 0, 0, .06);
  }

  .wa-container .cancel:focus {
    border: 0px;
    outline: 0px
  }

  .wa-container .whtsapp-header {
    padding: 20px 20px 5px 20px;
    color: #fff;
    background: #2db742;
    border-radius: 7px 7px 0px 0px
  }

  .wa-container .whtsapp-header .title {
    font-size: 16px;
    font-weight: 600;
    line-height: 18px;
    margin-bottom: 5px
  }

  .wa-container .whtsapp-header .text {
    font-size: 11px;
    margin-bottom: 10px
  }

  .wa-container .content {
    padding: 12px;
  }

  .wa-container .content .country-box {
    display: block;
    font-size: 12px;
    background: #f5f7f9;
    padding: 15px;
    margin-bottom: 10px;
    color: #000;
    border-radius: 4px;
    border-left: 2px solid #2db742
  }

  .wa-container .content .country-box:hover {
    background: #fff;
    box-shadow: 0 0px 10px 4px rgba(0, 0, 0, .06)
  }
</style>

<div class="whats-float">
  <a href="javascript:void()" class="open-button" onClick="openForm()">
    <span>Need any help<br><small>Chat with us</small></span>
    <img data-src="https://www.britannicaoverseas.com/front/assets/img/wa.png" width="30" alt="whatsapp"></a>
</div>

<div class="chat-popup" id="myForm">
  <div class="wa-container">
    <button type="button" class="cancel" onClick="closeForm()"><i class="ti-close"></i></button>
    <div class="whtsapp-header">
      <div class="row">
        <div class="col-2 pr0"><img data-src="https://www.britannicaoverseas.com/front/assets/img/wa.png"
            alt="whatsapp" class="img-fluid"></div>
        <div class="col-10">
          <div class="title">Start a Conversation</div>
          <div class="text">Hi! Click one of our member below to chat on <strong>WhatsApp</strong></div>
        </div>
      </div>
    </div>

    <div class="content">
      <span class="d-block font-size-13 mb-2">The team typically replies in a few minutes.</span>

      <a class="country-box" target="_blank"
        href="https://api.whatsapp.com/send?phone=918130798532&text=Hello there!! I want to get counseling by experts. Want to know more information about Study Abroad Consultants in India - Shweta Study Abroad">
        <div class="row align-items-center">
          <div class="col-2 pr-0"><img data-src="https://www.britannicaoverseas.com/front/assets/img/flag-india.png"
              alt="indian flag" class="img-fluid"></div>
          <div class="col-8 pr0">
            <strong>Location: India Gurgaon</strong><br>Start Chat with a Counsellor
          </div>
          <div class="col-1 pr-0 text-right"><img
              data-src="https://www.britannicaoverseas.com/front/assets/img/wad.png" alt="counsellor" width="20">
          </div>
        </div>
      </a>

      <a class="country-box" target="_blank"
        href="https://api.whatsapp.com/send?phone=919818560331&text=Hello there!! I want to get counseling by experts. Want to know more information about Study Abroad Consultants in India - Shweta Study Abroad">
        <div class="row align-items-center">
          <div class="col-2 pr-0"><img data-src="https://www.britannicaoverseas.com/front/assets/img/flag-india.png"
              alt="indian flag" class="img-fluid"></div>
          <div class="col-8 pr0">
            <strong>Location: India Chennai</strong><br>
            Start Chat with a Counsellor
          </div>
          <div class="col-1 pr-0 text-right"><img
              data-src="https://www.britannicaoverseas.com/front/assets/img/wad.png" alt="counsellor" width="20">
          </div>
        </div>
      </a>

      <a class="country-box" target="_blank"
        href="https://api.whatsapp.com/send?phone=601117784424&text=Hello there!! I want to get counseling from experts. Want to know more information about Study Abroad Consultants in India - Shweta Study Abroad">
        <div class="row align-items-center">
          <div class="col-2 pr-0"><img
              data-src="https://www.britannicaoverseas.com/front/assets/img/flag-malaysia.png" alt="indian flag"
              class="img-fluid"></div>
          <div class="col-8 pr0">
            <strong>Location: Malaysia</strong><br>
            Start Chat with a Counsellor
          </div>
          <div class="col-1 pr-0 text-right"><img
              data-src="https://www.britannicaoverseas.com/front/assets/img/wad.png" alt="counsellor" width="20">
          </div>
        </div>
      </a>

    </div>

  </div>
</div>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    var lazyImages = document.querySelectorAll('[data-src]');
    var observer = new IntersectionObserver(function(entries, observer) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          var lazyImage = entry.target;
          lazyImage.src = lazyImage.dataset.src;
          observer.unobserve(lazyImage);
        }
      });
    });
    lazyImages.forEach(function(lazyImage) {
      observer.observe(lazyImage);
    });
  });
</script>
<script>
  function openForm() {
    document.getElementById("myForm").style.display = "block";
  }

  function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }
</script>
<!-- Whatsapp Box and Button -->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
  var Tawk_API = Tawk_API || {},
    Tawk_LoadStart = new Date();
  (function() {
    var s1 = document.createElement("script"),
      s0 = document.getElementsByTagName("script")[0];
    s1.async = true;
    s1.src = 'https://embed.tawk.to/66cc417b50c10f7a00a0741c/1i66tvipj';
    s1.charset = 'UTF-8';
    s1.setAttribute('crossorigin', '*');
    s0.parentNode.insertBefore(s1, s0);
  })();
</script>
<!--End of Tawk.to Script-->
</body>

</html>
