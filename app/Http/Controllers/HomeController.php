<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Project;
use App\User;
use App\Status;


class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $projects = Project::all();
        $projectId = $request->get('project')?$request->get('project'):$projects[0]->id;
        $project = Project::findOrFail($projectId);
        $users = User::all();
        $statuses = Status::all();
        $projectTasksPerStatus = [];
        foreach ($statuses as $status){
            $projectTasks = Task::where(['project_id' => $projectId, 'status_id' => $status->id ])->get();
            $projectTasksPerStatus[$status->id] = $projectTasks;
        }

        return view('home',[
           'project' => $project,
           'statuses' => $statuses,
           'users' => $users,
           'tasks' => $projectTasksPerStatus,
        ]);
    }

    public function addTaskAction(Request $request)
    {
        
        return redirect('home');
    }
}
