@if ($trendingUniversity->count() > 0)
  <div class="ed_view_box style_2">
    <div class="ed_author">
      <div class="ed_author_box">
        <h4>Affilated Colleges</h4>
      </div>
    </div>
    @foreach ($trendingUniversity as $uni)
      <div class="learnup-list">
        <div class="learnup-list-thumb">
          <a
            href="{{ route('university.overview', ['destination_slug' => $uni->getDestination->destination_slug, 'university_slug' => $uni->slug]) }}">
            <img data-src="{{ asset($uni->logo_path) }}" class="img-fluid" alt="{{ $uni->name }}">
          </a>
        </div>
        <div class="learnup-list-caption">
          <h6><a
              href="{{ route('university.overview', ['destination_slug' => $uni->getDestination->destination_slug, 'university_slug' => $uni->slug]) }}">{{ $uni->name }}</a>
          </h6>
          <p class="mb-0"><i class="ti-location-pin"></i> {{ $uni->city }}, {{ $uni->state }}</p>
          <div class="learnup-info">
            <span class="mr-3">
              <a
                href="{{ route('university.overview', ['destination_slug' => $uni->getDestination->destination_slug, 'university_slug' => $uni->slug]) }}"><i
                  class="fa fa-edit"></i> Admission</a>
            </span>
            <span>
              <a
                href="{{ route('university.courses', ['destination_slug' => $uni->getDestination->destination_slug, 'university_slug' => $uni->slug]) }}"><i
                  class="fa fa-graduation-cap"></i> Programme</a>
            </span>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endif
