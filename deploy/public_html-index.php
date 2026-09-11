<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Root aplikasi Laravel ada satu folder di dalam public_html (public_html/laravel).
$laravelPath = __DIR__.'/laravel';

// Maintenance mode check
if (file_exists($maintenance = $laravelPath.'/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Composer autoloader (dari dalam folder laravel)
require $laravelPath.'/vendor/autoload.php';

// Bootstrap Laravel
$app = require_once $laravelPath.'/bootstrap/app.php';

// PENTING: folder public sebenarnya ada di public_html (lokasi file ini),
// bukan di public_html/laravel/public — supaya public_path() (dipakai Vite
// manifest, storage:link, dll) resolve ke tempat yang benar.
$app->usePublicPath(__DIR__);

$app->handleRequest(Request::capture());
