<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;

class TaskController extends Controller
{
    function getIndex(){
        $tasks = Task::all();
        return view('index', compact('tasks'));
    }
}
