<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Project;
use App\User;
use App\Status;
use Illuminate\Support\Facades\Auth;


class ProjectController extends Controller
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
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showUserIssues(Request $request)
    {
        $projects = Project::all();
        $projectId = $request->get('project')?$request->get('project'):$projects[0]->id;
        $project = Project::findOrFail($projectId);
        $users = User::all();
        $statuses = Status::all();
        $projectTasksPerStatus = [];
        foreach ($statuses as $status){
            $projectTasks = Task::where(['project_id' => $projectId, 'status_id' => $status->id, 'user_id' => Auth::id() ])->get();
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
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showUserReportedIssues(Request $request)
    {
        $projects = Project::all();
        $projectId = $request->get('project')?$request->get('project'):$projects[0]->id;
        $project = Project::findOrFail($projectId);
        $users = User::all();
        $statuses = Status::all();
        $projectTasksPerStatus = [];
        foreach ($statuses as $status){
            $projectTasks = Task::where(['project_id' => $projectId, 'status_id' => $status->id, 'reported_by' => Auth::id() ])->get();
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





}
