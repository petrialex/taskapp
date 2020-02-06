<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Project;
use App\User;
use App\Status;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function addTask(Request $request)
    {
        $task = new Task();
        $task->title = $request->request->get('title');
        //$task->description = $request->request->get('description');
        $task->reported_by = Auth::id();
        $task->due_date = $request->request->get('dueDate');
        $task->user_id = $request->request->get('userId');
        $task->project_id = $request->request->get('projectId');
        $task->status_id = 1;
        $task->save();
        //return true;
    }





}
