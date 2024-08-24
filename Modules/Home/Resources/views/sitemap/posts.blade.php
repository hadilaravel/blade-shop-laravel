<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">
    @foreach($posts as $post)
    <url>
        <loc>{{ route('home.post.detail' , $post->slug) }}</loc>
    </url>
    @endforeach
</urlset>
