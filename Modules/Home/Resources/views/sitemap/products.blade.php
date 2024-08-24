<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">
    @foreach($products as $product)
    <url>
        <loc>{{ route('home.product.detail' , $product->slug) }}</loc>
    </url>
    @endforeach
</urlset>
