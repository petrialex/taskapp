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
        $currentProjectTasks = Task::where(['project_id' => $projectId])->get();

        return view('home',[
           'project' => $project,
           'statuses' => $statuses,
           'users' => $users,
           'tasks' => $projectTasksPerStatus,
           'projectTasks' => $currentProjectTasks,
           'projects' => $projects,
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showDashboard(Request $request)
    {
        $projects = Project::all();
        $users = User::all();
        $tasks = Task::all();
        $tasksInProgress = Task::where(['status_id' => 2])->get();
        $statuses = Status::all();
        $tasksPerProject = [];
        foreach ($projects as $project){
            $projectTasks = Task::where(['project_id' => $project->id, 'status_id' => 1 ])->get();
            $tasksPerProject[$project->id] = $projectTasks;
        }

        return view('dashboard',[
            'users' => $users,
            'projects' => $projects,
            'tasks' => $tasks,
            'tasksInProgress' => $tasksInProgress,
            'tasksPerProject' => $tasksPerProject,
        ]);
    }

    public function addTaskAction(Request $request)
    {
        var_dump($request); die();
        return redirect('home');
    }
}
