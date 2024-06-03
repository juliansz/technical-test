<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;

class TaskController extends Controller
{
    function getIndex(){
        $project = Project::inRandomOrder()->first();
        $tasks = Task::fromProject($project)->orderBy('priority', 'ASC')->get();
        return view('index', compact('tasks', 'project'));
    }
}
