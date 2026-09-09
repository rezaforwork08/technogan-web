<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Portfolio;
use App\Models\Service;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = Sitemap::create()
            ->add(Url::create(route('home'))->setPriority(1.0))
            ->add(Url::create(route('about'))->setPriority(0.6))
            ->add(Url::create(route('services.index'))->setPriority(0.9))
            ->add(Url::create(route('portfolios.index'))->setPriority(0.7))
            ->add(Url::create(route('blog.index'))->setPriority(0.7))
            ->add(Url::create(route('contact'))->setPriority(0.6));

        Service::query()->select('slug', 'updated_at')->get()->each(
            fn (Service $service) => $sitemap->add(
                Url::create(route('services.show', $service))
                    ->setLastModificationDate($service->updated_at)
                    ->setPriority(0.8)
            )
        );

        Portfolio::query()->select('slug', 'updated_at')->get()->each(
            fn (Portfolio $portfolio) => $sitemap->add(
                Url::create(route('portfolios.show', $portfolio))
                    ->setLastModificationDate($portfolio->updated_at)
                    ->setPriority(0.6)
            )
        );

        BlogPost::query()->published()->select('slug', 'updated_at')->get()->each(
            fn (BlogPost $post) => $sitemap->add(
                Url::create(route('blog.show', $post))
                    ->setLastModificationDate($post->updated_at)
                    ->setPriority(0.5)
            )
        );

        return $sitemap->toResponse(request());
    }
}
