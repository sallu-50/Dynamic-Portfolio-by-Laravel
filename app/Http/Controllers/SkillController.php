<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSkillsRequest;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function create()
    {
        return view('skills');
    }

    // public function store(Request $request)
    // {
    //     $data = $request->validate([
    //         'skill_title' => 'nullable|max:15',
    //         'html' => 'nullable|max:15',
    //         'css' => 'nullable|max:15',
    //         'bootstrap' => 'nullable|nullable|max:15',
    //         'tailwind' => 'nullable|max:15',
    //         'javascript' => 'nullable|max:15',
    //         'skill_title2' => 'nullable|max:15',
    //         'php' => 'nullable|max:15',
    //         'laravel' => 'nullable|max:15',
    //         'skill_title3' => 'nullable|max:15',
    //         'illustrator' => 'nullable|max:15',
    //         'photoshop' => 'nullable|max:15',

    //     ]);
    //     Skills::create($data);
    //     return back()->with('success', __('Skills uploaded'));
    // }

    /*public function store(Request $request)
    {
        $data = $request->validate([
            'skill_title' => 'nullable|max:15',
            'html' => 'nullable|max:15',
            'css' => 'nullable|max:15',
            'bootstrap' => 'nullable|max:15',
            'tailwind' => 'nullable|max:15',
            'javascript' => 'nullable|max:15',
            'skill_title2' => 'nullable|max:15',
            'php' => 'nullable|max:15',
            'laravel' => 'nullable|max:15',
            'skill_title3' => 'nullable|max:15',
            'illustrator' => 'nullable|max:15',
            'photoshop' => 'nullable|max:15',
        ]);

        Skills::create($data);

        return back()->with('success', __('Skills uploaded'));
    }*/

    public function store(Request $request)
    {
        // validation

        $skillSet = explode(',', $request->skill);
        $skillSet = array_map('trim', $skillSet);

        // dd(
        //     $request->all(),
        //     $skillSet
        // );

        Skill::create([
            'title' => $request->title,
            'skills' => $skillSet
        ]);



        return back()->with('success', __('Skills uploaded'));
    }
}
