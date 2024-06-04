<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    function getIndex(){
        $projects = Project::all();
        $tasks = Task::orderBy('priority', 'ASC')->get();
        return view('index', compact('tasks', 'projects'));
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
    
    function getCreate(Request $request){
        $projects = Project::all();
        return view('edit', compact('projects'));
    }

    function postCreate(Request $request){
        $priority = Task::fromProjectId($request->input('project_id'))->max('priority');
        $priority = $priority ? $priority + 1 : 1;
        $data = $request->only('name', 'project_id');
        $data['priority'] = $priority;
        Task::create($data);
        return redirect()->route('Tasks');
    }

    function getUpdate(Request $request, Task $task){
        $projects = Project::all();
        return view('edit', compact('task', 'projects'));
    }

    function postUpdate(Request $request, Task $task){
        $data = $request->only('name', 'project_id');
        if($task->project_id != $request->input('project_id')){
            $priority = Task::fromProjectId($request->input('project_id'))->max('priority');
            $data['priority'] = $priority ? $priority + 1 : 1;
        }
        $task->update($data);
        return redirect()->route('Tasks');
    }
}
