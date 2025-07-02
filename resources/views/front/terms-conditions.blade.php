@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
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
              <li class="facts-1"><a href="#">Terms & Conditions</a></li>
            </ul>
            <div class="ed_header_caption mb-0">
              <h1 class="ed_title mb-0">Terms & Conditions</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumb -->
  <!-- Content -->
  <section class="min-sec">
    <div class="container">

      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 p-0">

          <div class="container">

            <div id="accordionExample" class="accordion circullum">

              <div class="card mb-0 shadow-0">
                <div id="headingOne" class="card-header bg-white border-0 b-b pl-0 pr-4">
                  <div class="mb-0 accordion_title"><a href="#" data-toggle="collapse" data-target="#collapseOne"
                      aria-expanded="false" aria-controls="collapseOne"
                      class="d-block position-relative collapsible-link py-1">Please read carefully before using the
                      portal.</a></div>
                </div>
                <div id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse">
                  <div class="card-body pt-3 pl-0 pr-0">
                    <p>Welcome to the website “Britannicaoverseas.com” which is owned by “Shweta Study Abroad Pvt. Ltd.”
                      These terms and conditions cover every individual visiting this website and it is assumed that by
                      accessing and using Britannicaoverseas.com, you accept this “Terms of Use” in full and have gone
                      through and consent univocally and irrevocably to the same. If you disagree with these conditions
                      you must not use this website.</p>
                  </div>
                </div>
              </div>

              <div class="card mb-0 shadow-0">
                <div id="headingTwo" class="card-header bg-white border-0 b-b pl-0 pr-4">
                  <div class="mb-0 accordion_title"><a href="#" data-toggle="collapse" data-target="#collapseTwo"
                      aria-expanded="false" aria-controls="collapseTwo"
                      class="d-block position-relative collapsible-link py-1">Website Overview:</a></div>
                </div>
                <div id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordionExample" class="collapse">
                  <div class="card-body pt-3 pl-0 pr-0">
                    <p>Shweta Study Abroad Pvt. Ltd. is the manager, moderator and operator of the website
                      Britannicaoverseas.com and all of its versions including mobile and applications.
                      Britannicaoverseas.com is a search engine for the courses or colleges/institutions and assists
                      students by providing information on the admission process details of the courses,
                      colleges/institutions of their interest. Britannicaoverseas guides students through the application
                      process and acquaints them with all the available study options. Britannicaoverseas does not take
                      applications/registrations on behalf of any college or institution irrespective of whether they are
                      partner college or other listed college. By applying to any course or college/institution on the
                      website, the student is deemed to have applied for the assistance of Britannicaoverseas team.</p>
                  </div>
                </div>
              </div>

              <div class="card mb-0 shadow-0">

                <div id="headingThree" class="card-header bg-white border-0 b-b pl-0 pr-4">
                  <div class="mb-0 accordion_title"><a href="#" data-toggle="collapse" data-target="#collapseThree"
                      aria-expanded="false" aria-controls="collapseThree"
                      class="d-block position-relative collapsible-link py-1">Eligibility:</a></div>
                </div>
                <div id="collapseThree" aria-labelledby="headingThree" data-parent="#accordionExample" class="collapse">
                  <div class="card-body pt-3 pl-0 pr-0">
                    <p>The website is not designed to attract the users below 13 years and thus the company does not
                      intend to keep data of the users below the specified age. By assessing or using the portal, the user
                      is deemed to have warranted and represented that he/she fulfils the aforesaid requirement of
                      minimum. Upon receipt of any information contrary to the aforesaid, the user and its information
                      shall be deleted.</p>
                  </div>
                </div>
              </div>

              <div class="card mb-0 shadow-0">
                <div id="headingFour" class="card-header bg-white border-0 b-b pl-0 pr-4">
                  <div class="mb-0 accordion_title"><a href="#" data-toggle="collapse" data-target="#collapseFour"
                      aria-expanded="false" aria-controls="collapseFour"
                      class="d-block position-relative collapsible-link py-1">Creating a user account on
                      Britannicaoverseas.com:</a></div>
                </div>
                <div id="collapseFour" aria-labelledby="headingFour" data-parent="#accordionExample" class="collapse">
                  <div class="card-body pt-3 pl-0 pr-0">
                    <p>The website intents to protect private information provided by the user while creating a user
                      account as per the terms and conditions specified herein. By creating an account, the user agrees to
                      the terms required to protect the confidentiality of username and password for the account and shall
                      be solely liable for any activity conducted using the user account. The user also agrees to accept
                      all risk and responsibilities for activity done under the username. User also agrees to receive SMS
                      and Emails containing the information of the college and course he/she applies in and also of
                      related colleges and courses.</p>
                  </div>
                </div>
              </div>

              <div class="card mb-0 shadow-0">
                <div id="headingFive" class="card-header bg-white border-0 b-b pl-0 pr-4">
                  <div class="mb-0 accordion_title"><a href="#" data-toggle="collapse" data-target="#collapseFive"
                      aria-expanded="false" aria-controls="collapseFive"
                      class="d-block position-relative collapsible-link py-1">Privacy Policy:</a></div>
                </div>
                <div id="collapseFive" aria-labelledby="headingFive" data-parent="#accordionExample" class="collapse">
                  <div class="card-body pt-3 pl-0 pr-0">
                    <p>The privacy policy is applicable only for Britannicaoverseas and not for the websites linked
                      through it, which shall be governed by its respective privacy policies and/or terms of use. The
                      website utilises cookies and other tracking technologies. Some cookies and other technologies may
                      serve to recall Personal Information previously indicated by a Web user. Most browsers allow you to
                      control cookies, including whether or not to accept them and how to remove them. By providing us
                      your information in the ways stated hereinbelow, you agree with the privacy policy and give us
                      consent for usage of information by us in the manner stated herein.</p>
                  </div>
                </div>
              </div>

              <div class="card mb-0 shadow-0">
                <div id="headingSix" class="card-header bg-white border-0 b-b pl-0 pr-4">
                  <div class="mb-0 accordion_title"><a href="#" data-toggle="collapse" data-target="#collapseSix"
                      aria-expanded="false" aria-controls="collapseSix"
                      class="d-block position-relative collapsible-link py-1">Information Collected by the Website:</a>
                  </div>
                </div>
                <div id="collapseSix" aria-labelledby="headingSix" data-parent="#accordionExample" class="collapse">
                  <div class="card-body pt-3 pl-0 pr-0">
                    <p>Means of data collection on Britannicaoverseas are- Contact Forms (The contact forms on the website
                      are made to simplify the process of data presentation by collecting the user interests, educational
                      qualification and age, etc), and Login/Signup (By creating a user account visitor agrees the terms
                      of conditions of the website. The data collected may consist of personal or non-personal
                      information. We may store, collect, use and process your Information India subject to compliance
                      under applicable laws. The website collects user information to provide suggestions tailored as per
                      the students' profile and keep them informed about the ongoing application processes</p>
                  </div>
                </div>
              </div>

              <div class="card mb-0 shadow-0">
                <div id="headingSeven" class="card-header bg-white border-0 b-b pl-0 pr-4">
                  <div class="mb-0 accordion_title"><a href="#" data-toggle="collapse"
                      data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven"
                      class="d-block position-relative collapsible-link py-1">Opt-in Mails and Other ways of data usage
                      by the Company:</a></div>
                </div>
                <div id="collapseSeven" aria-labelledby="headingSeven" data-parent="#accordionExample"
                  class="collapse">
                  <div class="card-body pt-3 pl-0 pr-0">
                    <p>The company can use data collected through the website in various ways such as- a) Opt-in Mails-
                      Company sends customized mails on the users opting for newsletters or notification on admission
                      process and entrance tests. Users can anytime unsubscribe from the service b) Feedbacks: The Company
                      may contact its visitors or users for feedback on any new feature or services. If not interested,
                      users can drop a mail on privacy@Britannicaoverseas.com c) Geographical Data: we use geographical or
                      demographical data to provide location wise customized data. D) Cookies and IP data are used to
                      provide most relevant results through search. The website also stores data other than the content
                      which provides information on personal identity in the form of IP and cookies. It is henceforth
                      considered under the category of non personal-identifiable data which also includes search history,
                      queries submitted, education interests, date and time, domain, advertisement response. The website
                      can also use a conversion pixel (a 1px. X 1px. image) to track the user behavior on our leads
                      collection form as it is an intact part of our Business. We can use the data collected through our
                      channel in the analysis of trends and can also be forwarded to the educational service providers
                      depending upon the usage history. The data so collected can be used in the following manner and
                      ways:</p>
                    <p>Email distribution/SMS/Telephone as described in the application form and for administrative
                      purposes (such as to inform you and apprise of you of the information or any change herein for the
                      college/course of your interested or related course/college). In accordance with instructions on the
                      site, you may opt not to receive any such communication in the future.</p>
                    <p>Display banner (and similar) advertising to you in connection with the site that is more targeted
                      to you specifically. In doing this type of targeting, Britannicaoverseas or its ad server, connect
                      you with the targeting criteria.</p>
                    <p>By using the website and/or registering yourself with us you authorize us to contact you via email
                      or phone call or SMS and offer you our services, imparting product knowledge, offer promotional
                      offers running on website & offers offered by third parties, for which reasons, personally
                      identifiable information may be collected. And irrespective of the fact if also you have registered
                      yourself under DND or DNC or NCPR service, you still authorize us to give you a call from
                      Britannicaoverseas for the above mentioned purposes till 365 days of your registration with us.</p>
                  </div>
                </div>
              </div>

              <div class="card mb-0 shadow-0">
                <div id="headingEight" class="card-header bg-white border-0 b-b pl-0 pr-4">
                  <div class="mb-0 accordion_title"><a href="#" data-toggle="collapse"
                      data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight"
                      class="d-block position-relative collapsible-link py-1">Intellectual Property Rights:</a></div>
                </div>
                <div id="collapseEight" aria-labelledby="headingEight" data-parent="#accordionExample"
                  class="collapse">
                  <div class="card-body pt-3 pl-0 pr-0">
                    <p>Unless stated otherwise, Shweta Study Abroad Pvt. Ltd. holds the sole rights of all the digital
                      content, including site layout, software, images, photographs, text, services and other similar
                      materials, available throughout the website. Trademark, logos and service marks of
                      Britannicaoverseas.com cannot be used to be displayed at any commercial or non-commercial use
                      without prior permission from the company. However, the materials and contents, including any data,
                      text, graphics, images, audio and video clips, logos, icons and links, used on this website of third
                      parties and/or institutions and colleges, which are collected from the public domain and are
                      available under the fair usage policy that are published on the website are strictly for information
                      and/or identification purposes only and are not the intellectual property of the Company. All the
                      data mining activities i.e. scrapping, crawling and republishing is not allowed until and unless
                      written permission is obtained from the company. The content downloaded from the website does not
                      pass on the rights or title to use it for commercial use.</p>
                  </div>
                </div>
              </div>

              <div class="card mb-0 shadow-0">
                <div id="headingNine" class="card-header bg-white border-0 b-b pl-0 pr-4">
                  <div class="mb-0 accordion_title"><a href="#" data-toggle="collapse"
                      data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine"
                      class="d-block position-relative collapsible-link py-1">External Links:</a></div>
                </div>
                <div id="collapseNine" aria-labelledby="headingNine" data-parent="#accordionExample" class="collapse">
                  <div class="card-body pt-3 pl-0 pr-0">
                    <p>Britannicaoverseas.com is not liable to any loss caused due to the external links available on the
                      website. It is also advisable that the user verifies such information with other sources before
                      making any decision on the basis of advertisements or content available on the linked websites. For
                      ease of users and external and referral links of every college/institution, wherever applicable, are
                      provided on the website. The links to third-party websites placed by us as a service to those
                      interested in this information, or posted by other users. Your use of all such links to third-party
                      websites is at your own risk. We do not monitor or have any control over, and make no claim or
                      representation regarding third-party websites. To the extent such links are provided by us, they are
                      provided only as a convenience, and a link to a third-party website does not imply our endorsement,
                      adoption or sponsorship of, or affiliation with, such third-party website.</p>
                  </div>
                </div>
              </div>

              <div class="card mb-0 shadow-0">
                <div id="headingTen" class="card-header bg-white border-0 b-b pl-0 pr-4">
                  <div class="mb-0 accordion_title"><a href="#" data-toggle="collapse"
                      data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen"
                      class="d-block position-relative collapsible-link py-1">Limitation of Liability:</a></div>
                </div>
                <div id="collapseTen" aria-labelledby="headingTen" data-parent="#accordionExample" class="collapse">
                  <div class="card-body pt-3 pl-0 pr-0">
                    <p>By using the site, you agree that Britannicaoverseas will not be liable for any legal theory or
                      contracts for any kind issues caused by any other party. The website is also not liable to verify or
                      justify information provided by participants of the website i.e. educational institutions, coaching
                      institutes, individual comments. To prevent the loss to visitors it is highly recommended that every
                      information available on the website must be verified before taking it into consideration.
                      Britannicaoverseas is not liable for any misinformation, data theft, any kind of loss or system
                      damage occurring due to use of these external links. Britannicaoverseas.com declares that it will
                      not be used to propagate any malicious or harmful software so in any case of program loss or system
                      damage, the website can’t be held responsible. The terms and policies of Britannicaoverseas do not
                      govern the use of third-party websites.</p>
                  </div>
                </div>
              </div>

              <div class="card mb-0 shadow-0">
                <div id="headingEleven" class="card-header bg-white border-0 b-b pl-0 pr-4">
                  <div class="mb-0 accordion_title"><a href="#" data-toggle="collapse"
                      data-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven"
                      class="d-block position-relative collapsible-link py-1">Governing Law:</a></div>
                </div>
                <div id="collapseEleven" aria-labelledby="headingEleven" data-parent="#accordionExample"
                  class="collapse">
                  <div class="card-body pt-3 pl-0 pr-0">
                    <p>All the legal proceedings shall be governed by the Laws of India and the courts of Gurugram shall
                      have the exclusive jurisdiction in case of any dispute.</p>
                  </div>
                </div>
              </div>

              <div class="card mb-0 shadow-0">
                <div id="headingTweleve" class="card-header bg-white border-0 b-b pl-0 pr-4">
                  <div class="mb-0 accordion_title"><a href="#" data-toggle="collapse"
                      data-target="#collapseTweleve" aria-expanded="false" aria-controls="collapseTweleve"
                      class="d-block position-relative collapsible-link py-1">Refund & Cancellation Policy:</a></div>
                </div>
                <div id="collapseTweleve" aria-labelledby="headingTweleve" data-parent="#accordionExample"
                  class="collapse">
                  <div class="card-body pt-3 pl-0 pr-0">
                    <p>All the monetary transactions done by the user of the site is in lieu of the payment gateway
                      partner of Britannicaoverseas.com, and we take no responsibility for any payment discrepancies.
                      Also, we have full right to consider and review the refund case if the amount paid by the user is in
                      excess to the number of applications he has applied to. We have complete authority to review the
                      college preferences as filled by the user if there is shortfall/excess of payment. Also, you are
                      required to note your Transaction ID and receipt no. as provided by the payment gateway to furnish
                      any information or track the payment status of your application form. Any pending amount to be paid
                      by the user will need to be paid before the deadline for the application to the college has been
                      reached. Any payment received after that may not result in acceptance of the application as a valid
                      entry by the college. Britannicaoverseas cannot be held liable for the same and no refund will be
                      entertained in such cases.</p>
                  </div>
                </div>
              </div>

              <div class="card mb-0 shadow-0">
                <div id="headingThirteen" class="card-header bg-white border-0 b-b pl-0 pr-4">
                  <div class="mb-0 accordion_title"><a href="#" data-toggle="collapse"
                      data-target="#collapseThirteen" aria-expanded="false" aria-controls="collapseThirteen"
                      class="d-block position-relative collapsible-link py-1">Change in terms of Privacy Policy:</a>
                  </div>
                </div>
                <div id="collapseThirteen" aria-labelledby="headingThirteen" data-parent="#accordionExample"
                  class="collapse">
                  <div class="card-body pt-3 pl-0 pr-0">
                    <p>Britannicaoverseas reserves the right to amend or modify these terms of use and Privacy Policy at
                      any time, as and when the need arises. We request you to regularly check this page from time to time
                      to keep you apprised of changes made. Your continued use of the Platform gives your unconditional
                      acceptance to such change.</p>
                  </div>
                </div>
              </div>

              <div class="card mb-0 shadow-0">
                <div id="headingFourteen" class="card-header bg-white border-0 b-b pl-0 pr-4">
                  <div class="mb-0 accordion_title"><a href="#" data-toggle="collapse"
                      data-target="#collapseFourteen" aria-expanded="false" aria-controls="collapseFourteen"
                      class="d-block position-relative collapsible-link py-1">For any clarification, please contact</a>
                  </div>
                </div>
                <div id="collapseFourteen" aria-labelledby="headingFourteen" data-parent="#accordionExample"
                  class="collapse">
                  <div class="card-body pt-3 pl-0 pr-0">
                    <p>Shweta Study Abroad Private Limited.<br>
                      B-16 Ground Floor, Mayfield Garden,<br>
                      Sector 50, Gurugram, Haryana -122002<br>
                      <a href="mailto:info@britannicaoverseas.com">info@britannicaoverseas.com</a>
                    </p>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- Content -->
@endsection
