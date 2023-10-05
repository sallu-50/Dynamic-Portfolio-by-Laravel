<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSkillsRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(StoreSkillsRequest $request)
    {
        $data = $request->validated();
        Contact::create($data);
        return back()->with('success', __('message sent successfully'));
    }
}
