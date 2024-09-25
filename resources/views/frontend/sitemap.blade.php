@php
    echo '<?xml version="1.0" encoding="UTF-8"?>'
@endphp

<urlset>
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ \Carbon\Carbon::parse(date('Y-m-d H:i:s'))->toIso8601String() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.00</priority>
    </url>

    <url>
        <loc>{{ url('/posts') }}</loc>
        <lastmod>{{ \Carbon\Carbon::parse(date('Y-m-d H:i:s'))->toIso8601String() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>1.00</priority>
    </url>

    <url>
        <loc>{{ url('/about') }}</loc>
        <lastmod>{{ \Carbon\Carbon::parse(date('Y-m-d H:i:s'))->toIso8601String() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.80</priority>
    </url>

    <url>
        <loc>{{ url('/contact') }}</loc>
        <lastmod>{{ \Carbon\Carbon::parse(date('Y-m-d H:i:s'))->toIso8601String() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.80</priority>
    </url>

    @foreach ($articles as $article)
    <url>
        <loc>{{ url('/post/'.$article->slug) }}</loc>
        <lastmod>{{ \Carbon\Carbon::parse($article->updated_at->format('Y-m-d H:i:s'))->toIso8601String() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.00</priority>
    </url>
    @endforeach
</urlset>