<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfileRequest;
use App\Models\Information;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function create()
    {
        return view('information');
    }
    public function store(StoreProfileRequest $request)
    {
        $data = $request->validated();
        $data['image_path'] = $request->file('image')->store('image', 'public');

        Information::create($data);

        return back()->with('success', __('image uploaded'));
    }
}
