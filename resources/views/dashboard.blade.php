@extends('layouts.app')

@section('content')

    <div class="page-inner">
<header class="page-title-bar">
    <div class="d-flex flex-column flex-md-row">
        <p class="lead">
            <span class="font-weight-bold">Hi, {{ Auth::user()->name }}.</span> <span class="d-block text-muted">Here’s what’s happening with your business today.</span>
        </p>
    </div>
</header>
<div class="page-section">
    <!-- .section-block -->
    <div class="section-block">
        <!-- metric row -->
        <div class="metric-row">
            <div class="col-lg-9">
                <div class="metric-row metric-flush">
                    <!-- metric column -->
                    <div class="col">
                        <!-- .metric -->
                        <a href="#" class="metric metric-bordered align-items-center">
                            <h2 class="metric-label"> Users </h2>
                            <p class="metric-value h3">
                                <sub><i class="fa fa-users"></i></sub> <span class="value">{{ count($users) }}</span>
                            </p>
                        </a> <!-- /.metric -->
                    </div><!-- /metric column -->
                    <!-- metric column -->
                    <div class="col">
                        <!-- .metric -->
                        <a href="#" class="metric metric-bordered align-items-center">
                            <h2 class="metric-label"> Projects </h2>
                            <p class="metric-value h3">
                                <sub><i class="fa fa-folder"></i></sub> <span class="value">{{ count($projects) }}</span>
                            </p>
                        </a> <!-- /.metric -->
                    </div><!-- /metric column -->
                    <!-- metric column -->
                    <div class="col">
                        <!-- .metric -->
                        <a href="#" class="metric metric-bordered align-items-center">
                            <h2 class="metric-label"> Active Tasks </h2>
                            <p class="metric-value h3">
                                <sub><i class="fa fa-tasks"></i></sub> <span class="value">{{ count($tasks) }}</span>
                            </p>
                        </a> <!-- /.metric -->
                    </div><!-- /metric column -->
                </div>
            </div><!-- metric column -->
            <div class="col-lg-3">
                <!-- .metric -->
                <a href="#" class="metric metric-bordered">
                    <div class="metric-badge">
                        <span class="badge badge-lg badge-success"><span class="oi oi-media-record pulse mr-1"></span> ONGOING TASKS</span>
                    </div>
                    <p class="metric-value h3">
                        <sub><i class="fa fa-clock"></i></sub> <span class="value">{{ count($tasksInProgress) }}</span>
                    </p>
                </a> <!-- /.metric -->
            </div><!-- /metric column -->
        </div><!-- /metric row -->
    </div><!-- /.section-block -->

    <!-- card-deck-xl -->
    <div class="card-deck-xl">
        <!-- .card -->
        <div class="card card-fluid pb-3">
            <div class="card-header"> Active Projects </div><!-- .lits-group -->
            <div class="lits-group list-group-flush">
                @foreach($projects as $project)

                    <div class="list-group-item">
                        <!-- .lits-group-item-figure -->
                        <div class="list-group-item-figure">
                            <div class="has-badge">
                                <a href="{{ route('home') }}?project={{ $project->id }}" class="tile tile-md bg-purple">P</a> <a href="#team" class="user-avatar user-avatar-xs"></a>
                            </div>
                        </div><!-- .lits-group-item-figure -->
                        <!-- .lits-group-item-body -->
                        <div class="list-group-item-body">
                            <h5 class="card-title">
                                <a href="{{ route('home') }}?project={{ $project->id }}">{{ $project->name }}</a>
                            </h5>
                            <p class="card-subtitle text-muted mb-1"> Progress in 74% - Last update 1d </p><!-- .progress -->
                            <div class="progress progress-xs bg-transparent">
                                <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="2181" aria-valuemin="0" aria-valuemax="100" style="width: 74%">
                                    <span class="sr-only">74% Complete</span>
                                </div>
                            </div><!-- /.progress -->
                        </div><!-- .lits-group-item-body -->
                    </div><!-- /.lits-group-item -->
                @endforeach

            </div><!-- /.lits-group -->
        </div><!-- /.card -->
        <!-- .card -->
        <div class="card card-fluid">
            <div class="card-header"> Active Tasks: To-Dos </div><!-- .card-body -->
            <div class="card-body">
                <!-- .todo-list -->
                <div class="todo-list">
                    <!-- .todo-header -->
                    @foreach($projects as $project)
                        <div class="todo-header"> {{ $project->name }}</div><!-- /.todo-header -->
                        @foreach($tasksPerProject[$project->id] as $task)
                        <div class="todo">
                            <!-- .custom-control -->
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="todo1"> <label class="custom-control-label" for="todo1">{{ $task->title }}</label>
                            </div><!-- /.custom-control -->
                        </div><!-- /.todo -->
                            @endforeach
                    @endforeach


                </div><!-- /.todo-list -->
            </div><!-- /.card-body -->

        </div><!-- /.card -->
    </div><!-- /card-deck-xl -->
</div>
</div>
@endsection
