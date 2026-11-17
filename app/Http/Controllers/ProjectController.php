<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('home', [
            'featuredProjects' => Project::published()->latest()->take(3)->get(),
        ]);
    }
}