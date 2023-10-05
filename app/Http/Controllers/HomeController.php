<?php

namespace App\Http\Controllers;

use App\Models\Information;
use App\Models\portfolio;
use App\Models\Skill;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $portfolio = portfolio::all();
        $information = Information::first();
        $skills = Skill::all();

        return view('welcome', compact('information', 'portfolio', 'skills'));
    }
}
