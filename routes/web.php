<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\SiteMapController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('site.index');
Route::get('/sitemap.xml', [SiteMapController::class, 'getSiteMap'])->name('site.siteMap');

Route::get('/docs', function () {
    return view('scalar');
});
