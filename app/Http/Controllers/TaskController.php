<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    function getIndex(){
        $project = Project::inRandomOrder()->first();
        $tasks = Task::fromProject($project)->orderBy('priority', 'ASC')->get();
        return view('index', compact('tasks', 'project'));
    }

    function postUpdateTasksPriority(Request $request){
        return response($request->input('tasks'));
    }
}
