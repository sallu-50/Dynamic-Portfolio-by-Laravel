<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePortfolioRequest;
use App\Models\portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function create()
    {
        return view('portfolio');
    }
    public function store(StorePortfolioRequest $request)
    {
        $data = $request->validated();
        $data['image_path'] = $request->file('image')->store('image', 'public');
        portfolio::create($data);
        return back()->with('success', __('portfolio uploaded'));
    }
}
