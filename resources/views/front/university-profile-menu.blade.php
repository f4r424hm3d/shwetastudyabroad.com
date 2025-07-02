@php
  $page = Request::segment(4);
@endphp
<div data-gssticky="1" class="addSticky">
  <div class="container">
    <div class="new-links">
      <ul class="vertically-scrollbar">
        <li class="{{ $page == '' ? 'active' : '' }}"><a
            href="{{ route('university.overview', ['destination_slug' => $university->getDestination->destination_slug, 'university_slug' => $university->slug]) }}">Overview</a>
        </li>
        @if ($university->getPrograms->count() > 0)
          <li class="{{ $page == 'courses' ? 'active' : '' }}">
            <a
              href="{{ route('university.courses', ['destination_slug' => $university->getDestination->destination_slug, 'university_slug' => $university->slug]) }}">Courses
              & Fees</a>
          </li>
        @endif
        @foreach ($university->getAllTabContent as $tabS)
          <li class="{{ $page == $tabS->tab_slug ? 'active' : '' }}">
            <a
              href="{{ route('university.tab.content', ['destination_slug' => $university->getDestination->destination_slug, 'university_slug' => $university->slug, 'tab_slug' => $tabS->tab_slug]) }}">
              {{ $tabS->tab_name }}
            </a>
          </li>
        @endforeach
        @if ($university->getPhotos->count() > 0)
          <li><a
              href="{{ route('university.overview', ['destination_slug' => $university->getDestination->destination_slug, 'university_slug' => $university->slug]) }}#photogallery">Gallery</a>
          </li>
        @endif
        @if ($university->getScholarships->count() > 0)
          <li class="{{ $page == 'scholarship' ? 'active' : '' }}">
            <a
              href="{{ route('university.scholarship', ['destination_slug' => $university->getDestination->destination_slug, 'university_slug' => $university->slug]) }}">Scholarship</a>
          </li>
        @endif
        @if ($university->getReviews->count() > 0)
          <li class="{{ $page == 'reviews' ? 'active' : '' }}"><a
              href="{{ route('university.reviews', ['destination_slug' => $university->getDestination->destination_slug, 'university_slug' => $university->slug]) }}">Reviews</a>
          </li>
        @endif
      </ul>
    </div>
  </div>
</div>
