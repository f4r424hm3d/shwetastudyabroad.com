<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  @foreach ($programs as $program)
    <url>
      <loc>
        {{ url($program->getUniversity->getDestination->destination_slug . '/universities/' . $program->getUniversity->slug . '/courses/' . $program->program_slug) }}
      </loc>
      <lastmod>{{ $program->updated_at->format('Y-m-d') }}</lastmod>
      <changefreq>always</changefreq>
      <priority>0.8</priority>
    </url>
  @endforeach
</urlset>
