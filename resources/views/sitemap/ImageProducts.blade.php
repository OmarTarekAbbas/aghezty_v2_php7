<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
  xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
  xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
  ttp://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    @foreach ($image_products as $image_product)
    <url>
        <loc>{{url($image_product->image)}}</loc>
        <lastmod>{{ $image_product->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        <priority>1.00</priority>
    </url>
    @endforeach
</urlset>
