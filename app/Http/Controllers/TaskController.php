<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    function getIndex(){
        $project = Project::first(); //inRandomOrder()->
        $tasks = Task::fromProject($project)->orderBy('priority', 'ASC')->get();
        return view('index', compact('tasks', 'project'));
    }

    function postUpdateTasksPriority(Request $request){
        $new_order = $request->input('tasks');

        $tasks = Task::fromProjectId($request->input('project_id'))->get();
        $tasks->each(function ($task) use ($new_order) {
            $task->priority = array_search($task->id, $new_order) + 1;
            $task->save();
        });
        return response(['OK']);
    }
}
