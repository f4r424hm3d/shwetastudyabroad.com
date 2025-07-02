@php
  echo $utf;
@endphp
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  @foreach ($universities as $row)
    <url>
      <loc>{{ url($row->getDestination->destination_slug . '/universities/' . $row->slug) }}</loc>
      <lastmod>{{ $row->updated_at->format('Y-m-d') }}</lastmod>
      <changefreq>always</changefreq>
      <priority>0.8</priority>
    </url>
    @if ($row->getPrograms->count() > 0)
      <url>
        <loc>{{ url($row->getDestination->destination_slug . '/universities/' . $row->slug . '/courses') }}
        </loc>
        <lastmod>{{ $row->updated_at->format('Y-m-d') }}</lastmod>
        <changefreq>always</changefreq>
        <priority>0.5</priority>
      </url>
    @endif
  @endforeach
</urlset>
