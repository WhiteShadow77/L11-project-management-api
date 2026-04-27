<?php

namespace App\Http\Controllers;

use App\Models\Description;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SiteMapController extends Controller
{
    public function getSitMap()
    {
        $content = Cache::remember('sitemap', now()->addHours(24), function () {
            $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
            $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

            $sitemap .= '
            <url>
                <loc>' . url('/') . '</loc>
                <lastmod>' . date('Y-m-d') . '</lastmod>
                <changefreq>daily</changefreq>
                <priority>1.0</priority>
            </url>
        ';

            $sitemap .= '</urlset>';
            return $sitemap;
        });

        return response($content)->header('Content-Type', 'text/xml');
    }
}
