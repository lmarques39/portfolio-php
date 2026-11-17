<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\View\View;


class ProjectController extends Controller
{
    public function index(): View
    {
        return view('projects.index', [
            'projects' => Project::published()->latest()->take(3)->get(),
        ]);
    }

    public function show(Project $project): View
    {
        abort_unless($project->is_published, 404);

        return view('projects.show', compact('project'));
    }
}
