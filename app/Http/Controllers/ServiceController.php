<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;

class ServiceController extends Controller
{
    public function index()
    {
        $categories = ServiceCategory::query()
            ->with(['services' => fn ($query) => $query->orderBy('order')])
            ->orderBy('order')
            ->get();

        $uncategorized = Service::query()
            ->whereNull('service_category_id')
            ->orderBy('order')
            ->get();

        return view('services.index', compact('categories', 'uncategorized'));
    }

    public function show(Service $service)
    {
        $service->load(['category', 'portfolios' => fn ($query) => $query->take(3)]);

        $relatedServices = Service::query()
            ->where('id', '!=', $service->id)
            ->when($service->service_category_id, fn ($query) => $query->where('service_category_id', $service->service_category_id))
            ->take(3)
            ->get();

        return view('services.show', compact('service', 'relatedServices'));
    }
}
