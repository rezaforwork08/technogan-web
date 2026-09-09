<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::query()
            ->with('service')
            ->orderBy('order')
            ->paginate(9);

        return view('portfolios.index', compact('portfolios'));
    }

    public function show(Portfolio $portfolio)
    {
        $portfolio->load(['service', 'images']);

        $relatedPortfolios = Portfolio::query()
            ->where('id', '!=', $portfolio->id)
            ->when($portfolio->service_id, fn ($query) => $query->where('service_id', $portfolio->service_id))
            ->take(3)
            ->get();

        return view('portfolios.show', compact('portfolio', 'relatedPortfolios'));
    }
}
