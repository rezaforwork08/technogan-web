<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\HeroSlide;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $heroSlides = HeroSlide::active()
            ->orderBy('order')
            ->get();

        $services = Service::query()
            ->where('is_featured', true)
            ->orderBy('order')
            ->take(4)
            ->get();

        $portfolios = Portfolio::query()
            ->where('is_featured', true)
            ->orderBy('order')
            ->take(6)
            ->get();

        $testimonials = Testimonial::query()
            ->published()
            ->orderBy('order')
            ->take(6)
            ->get();

        $latestPosts = BlogPost::query()
            ->published()
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('home', compact('heroSlides', 'services', 'portfolios', 'testimonials', 'latestPosts'));
    }
}
