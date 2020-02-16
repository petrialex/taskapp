@extends('layouts.app')

@section('content')
    <aside class="app-aside app-aside-expand-md app-aside-light">
        <!-- .aside-content -->
        <div class="aside-content">
            <!-- .aside-header -->
            <!-- .aside-menu -->
            <div class="aside-menu overflow-hidden ps">
                <!-- .stacked-menu -->
                <nav id="stacked-menu" class="stacked-menu stacked-menu-has-collapsible">
                    <!-- .menu -->
                    <ul class="menu">
                        <!-- .menu-item -->
                        <li class="menu-item">
                            <a href="/dashboard" class="menu-link"><span class="menu-icon fa fa-home"></span> <span
                                    class="menu-text">Dashboard</span></a>
                        </li><!-- /.menu-item -->

                        <li class="menu-item">
                            <a href="#" class="menu-link"><span class="menu-icon fa fa-rocket"></span> <span
                                    class="menu-text">Projects</span></a>
                            <ul class="menu">
                                @foreach($projects as $projectDetails)

                                    <li class="menu-item  <?php echo ($project && $projectDetails->id == $project->id) ? 'has-active' : ''; ?>">
                                        <a href="?project={{ $projectDetails->id }}"
                                           class="menu-link">{{ $projectDetails->name }}</a>
                                    </li>
                                @endforeach

                            </ul>
                        </li><!-- /.menu-item -->
                        <li class="menu-item">
                            <a href="/my-issues?project={{ $project->id }}" class="menu-link"><span
                                    class="menu-icon fa fa-tasks"></span> <span
                                    class="menu-text">My opened issues</span></a>
                        </li><!-- /.menu-item -->
                        <li class="menu-item">
                            <a href="/all-issues?project={{ $project->id }}" class="menu-link"><span
                                    class="menu-icon fa fa-table"></span> <span
                                    class="menu-text">All project issues</span></a>
                        </li><!-- /.menu-item -->
                        <li class="menu-item">
                            <a href="/reported-by-me?project={{ $project->id }}" class="menu-link"><span
                                    class="menu-icon fa fa-flag"></span> <span
                                    class="menu-text">Reported by me</span></a>
                        </li><!-- /.menu-item -->

                    </ul><!-- /.menu -->
                </nav><!-- /.stacked-menu -->

            </div>
    </aside>
    <main class="app-main">
        <!-- .wrapper -->
        <div class="wrapper">
            <!-- .page -->
            <div class="page">
                <!-- .page-inner -->
                <div class="page-inner page-inner-fill">
                    <!-- .page-navs -->
                    <header class="page-navs shadow-sm pr-3">
                        <!-- .btn-account -->
                        <a href="{{ route('home') }}?project={{ $project->id }}" class="btn-account">
                            <div class="has-badge">

                            </div>
                            <div class="account-summary">
                                <h1 class="card-title"> {{ $project->name }} </h1>
                                <h6 class="card-subtitle text-muted"> {{ count($projectTasks) }} task(s) </h6>
                            </div>
                        </a> <!-- /.btn-account -->
                        <!-- right actions -->
                        <div class="ml-auto">
                            <!-- invite members -->
                            <div class="dropdown d-inline-block">
                                <button type="button" class="btn btn-light btn-icon" title="Invite members"
                                        data-toggle="dropdown" data-display="static" aria-haspopup="true"
                                        aria-expanded="false"><i class="fa fa-user-plus"></i></button>
                                <!-- .dropdown-menu -->
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-rich stop-propagation">
                                    <div class="dropdown-arrow"></div>
                                    <div class="dropdown-header"> Add members</div>
                                    <div class="form-group px-3 py-2 m-0">
                                        <input type="text" class="form-control" placeholder="e.g. @bent10"
                                               data-toggle="tribute" data-remote="" data-menu-container="#people-list"
                                               data-item-template="true" data-autofocus="true" data-tribute="true">
                                        <small class="form-text text-muted">Search people by username or email address
                                            to invite them.</small>
                                    </div>
                                    <div id="people-list" class="tribute-inline stop-propagation"></div>
                                    <a href="#" class="dropdown-footer">Invite member by link <i
                                            class="far fa-clone"></i></a>
                                </div><!-- /.dropdown-menu -->
                            </div><!-- /invite members -->
                            <button type="button" class="btn btn-light btn-icon" data-toggle="page-expander"
                                    title="Expand board"><i class="oi oi-fullscreen-enter fa-rotate-90 fa-fw"></i>
                            </button>
                            <button type="button" class="btn btn-light btn-icon" data-toggle="modal"
                                    data-target="#modalBoardConfig" title="Show menu"><i class="fa fa-cog fa-fw"></i>
                            </button>
                        </div><!-- /right actions -->
                    </header><!-- /.page-navs -->
                    <!-- .board -->
                    <div id="board" class="board" data-toggle="sortable" data-draggable=".tasks"
                         data-handle=".task-header" data-delay="100" data-force-fallback="true">
                        <!-- .tasks -->
                        @foreach ($statuses as $status)
                            <div class="tasks">
                                <!-- .tasks-header -->
                                <div class="task-header">
                                    <h3 class="task-title mr-auto"> {{ $status->name }} <span class="badge text-muted">({{ count($tasks[$status->id]) }})</span>
                                    </h3><!-- .btn -->
                                    <button class="btn btn-light btn-icon text-muted" data-toggle="modal"
                                            data-target="#modalNewTask" title="Add task"><i
                                            class="fa fa-plus-circle"></i></button> <!-- /.btn -->
                                </div><!-- /.tasks-header -->
                                <!-- .task-body -->
                                <div class="task-body" data-toggle="sortable" data-group="tasks" data-delay="50"
                                     data-force-fallback="true">
                                @foreach ($tasks[$status->id] as $task)
                                    <?php
                                    $taskUser = \App\User::where(['id' => $task->user_id])->first();
                                    $taskOwner = \App\User::where(['id' => $task->reported_by])->first();
                                    $tskType = \App\Type::where(['id' => $task->type_id])->first();
                                    $tskPriority = \App\Priority::where(['id' => $task->priority_id])->first();
                                    $taskImages = json_decode($task->images);
                                    ?>
                                    <!-- .task-issue -->
                                        <div class="task-issue">
                                            <!-- .card -->
                                            <div class="card">
                                                <!-- .card-header -->
                                                <div class="card-header">
                                                    <div class="task-label-group">
                                                        @if ($status->id == 1)
                                                        <span class="task-label"></span>
                                                            @elseif($status->id == 2)
                                                            <span class="task-label bg-yellow"></span>
                                                            @elseif($status->id == 3)
                                                            <span class="task-label bg-pink"></span>
                                                            @elseif($status->id == 4)
                                                            <span class="task-label bg-green"></span>
                                                        @else
                                                            <span class="task-label bg-green"></span>
                                                        @endif
                                                    </div>
                                                    <h4 class="card-title">
                                                        <a href="#" data-toggle="modal"
                                                           data-target="#modalViewTask{{$task->id}}">{{ $task->title }}</a>
                                                    </h4>
                                                    <h6 class="card-subtitle text-muted">
                                                        <span class="text-muted">{{ $task->due_date }}</span>
                                                    </h6>
                                                    <br>
                                                    <div class="row">
                                                        @if(isset($tskType))
                                                            <div class="col-md-6">
                                                                <h6 class="card-subtitle text-muted">
                                                                   Type: <span class="text-muted">{{ $tskType->title }}</span>
                                                                </h6>
                                                            </div>
                                                        @endif
                                                        @if(isset($tskPriority))
                                                            <div class="col-md-6">
                                                                <h6 class="card-subtitle text-muted" >
                                                                   Priority: <span class="text-muted" >{{ $tskPriority->title }}</span>
                                                                    <span style="display:inline-block;width: 2rem;height: 1rem; background:{{ $tskPriority->color }};border-radius: 3px"></span>
                                                                </h6>
                                                            </div>
                                                        @endif
                                                    </div>

                                                </div><!-- /.card-header -->
                                                <!-- .card-body -->
                                                <div class="card-body pt-0">

                                                    <div class="list-group">

                                                        <div class="list-group-item" data-toggle="modal"
                                                             data-target="#modalViewTask{{$task->id}}">
                                                            <a href="#" class="stretched-link"></a>
                                                            <!-- .list-group-item-body -->
                                                            <div class="list-group-item-body">
                                                                <!-- members -->
                                                                <figure class="user-avatar user-avatar-sm"
                                                                        data-toggle="tooltip" title=""
                                                                        data-original-title="">
                                                                    <img
                                                                        src="{{ Voyager::image(  $taskUser->avatar ) }}"
                                                                        alt="{{$taskUser->name}}">
                                                                </figure>
                                                                {{ $taskUser->name  }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <a href="#"
                                                       class="card-footer-item card-footer-item-bordered text-muted"
                                                       data-toggle="modal" data-target="#modalViewTask{{$task->id}}"
                                                       draggable="false"><i class="fa fa-comments mr-1"></i> {{$task->id}}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal modal-drawer fade has-shown" id="modalViewTask{{$task->id}}" tabindex="-1" role="dialog"
                                             aria-labelledby="modalViewTaskLabel" style="display: none;" aria-hidden="true">

                                            <div class="modal-dialog modal-lg modal-drawer-right" role="document">

                                                <div class="modal-content">

                                                    <div class="modal-body p-3 p-lg-4">
                                                        <ol class="breadcrumb">
                                                            <li class="breadcrumb-item active">
                                                                <a href="#" data-dismiss="modal"><i
                                                                            class="breadcrumb-icon fa fa-angle-left mr-2"></i>{{ $status->name }}</a>
                                                            </li>
                                                        </ol>
                                                        <h5 id="modalViewTaskLabel" class="modal-title"> {{ $task->title }} </h5>
                                                        <hr>
                                                        <p class="text-muted"> Opened  by <a href="#" class="link-text"
                                                                                                         data-toggle="tooltip" title=""
                                                                                                         data-original-title="@jgrif"><span
                                                                        class="user-avatar user-avatar-xs"><img
                                                                            src="{{ Voyager::image(  $taskOwner->avatar ) }}"
                                                                            alt="{{$taskUser->name}}"></span> {{$taskOwner->name}}</a> on <b>{{ $task->created_at }}</b>
                                                        </p>
                                                        <hr>
                                                        <div class="task-description">
                                                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                        </div>
                                                        <div class="row my-3">

                                                            <div class="col-6 mb-3">

                                                                <div class="time-tracking">
                                                                    <h6> Type  </h6>
                                                                    <button class="btn btn-subtle-success btn-icon"><i class="fa fa-play"></i>
                                                                    </button>
                                                                    @if(isset($tskType))
                                                                        {{ $tskType->title }}
                                                                    @endif

                                                                    </div>
                                                            </div>

                                                            <div class="col-6 mb-3">
                                                                <h6> Due date </h6>
                                                                <div class="inline-editable pt-1">
                                                                    {{ $task->due_date }}
                                                                </div>
                                                            </div>

                                                            <div class="col-6 mb-3">
                                                                <h6> Status </h6>
                                                                <select class="form-control" onchange="updateTask({{$task->id}}, this.value)">
                                                                    @foreach($statuses as $st)
                                                                        <option <?php echo $status->id == $st->id ? "selected='selected'" :""; ?> class="" value="{{ $st->id }}">{{ $st->name }}</option>
                                                                        @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="col-6 mb-3">
                                                                <!-- .assignee -->
                                                                <div class="assignee">
                                                                    <h6> Assignee </h6>
                                                                    <div class="avatar-group">
                                                                         <a href="#" class="user-avatar" data-toggle="tooltip"
                                                                                                      title="" data-original-title=""><img
                                                                                    src="{{ Voyager::image(  $taskUser->avatar ) }}"
                                                                                    alt=""></a>  {{$taskUser->name}}

                                                                    </div>
                                                                </div><!-- /.assignee -->
                                                            </div>
                                                        </div><!-- /grid row -->
                                                        @if($taskImages)
                                                        <div class="row">
                                                            @foreach($taskImages as $image)
                                                                <img src="{{ Voyager::image(  $image ) }}" width="150px">
                                                            @endforeach
                                                        </div>
                                                        @endif
                                                        <hr>

                                                        <div class="media">
                                                            <figure class="user-avatar user-avatar-md mr-2">
                                                                <img src="{{ Voyager::image(  Auth::user()->avatar ) }}" alt="">
                                                            </figure>
                                                            <div class="media-body">

                                                                <div class="publisher keep-focus focus">
                                                                    <label for="publisherInput" class="publisher-label">Add comment</label>
                                                                    <div class="publisher-input">
                                            <textarea id="publisherInput" class="form-control"
                                                      placeholder="Write a comment"></textarea>
                                                                    </div>

                                                                    <div class="publisher-actions">

                                                                        <div class="publisher-tools mr-auto">
                                                                            <div class="btn btn-light btn-icon fileinput-button">
                                                                                <i class="fa fa-paperclip"></i> <input type="file" id="attachment"
                                                                                                                       name="attachment[]"
                                                                                                                       multiple="">
                                                                            </div>
                                                                            <button type="button" class="btn btn-light btn-icon"><i
                                                                                        class="far fa-smile"></i></button>
                                                                        </div>
                                                                        <button type="submit" class="btn btn-primary">Publish</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div><!-- /.task-body -->
                            </div>
                        @endforeach
                    </div><!-- /.board -->
                </div><!-- /.page-inner -->
            </div><!-- /.page -->
            <!-- Layer #1 Modal -->
            <!-- .modalBoardConfig -->
            <div class="modal modal-drawer fade" id="modalBoardConfig" tabindex="-1" role="dialog"
                 aria-labelledby="modalBoardConfigTitle" aria-hidden="true">

                <div class="modal-dialog modal-drawer-right" role="document">

                    <div id="modalContentLayer1" class="modal-content">
                        <!-- .modal-header -->
                        <div class="modal-header">
                            <h5 id="modalBoardConfigTitle" class="modal-title"> Menu </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                        </div><!-- /.modal-header -->

                        <div class="modal-body">
                            <!-- .nav -->
                            <ul class="nav flex-column">

                            </ul><!-- /.nav -->
                            <hr>
                            <h2 class="section-title">
                                <i class="oi oi-pulse text-muted mr-2"></i>Recent activity </h2><!-- .timeline -->

                            <div class="text-center p-3">
                                <a href="#" class="btn btn-link">View all activity ...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modalBoardConfig -->

            <!-- .modalBoardConfig -->
            <div class="modal modal-drawer fade" id="modalLayer2" tabindex="-1" role="dialog"
                 aria-labelledby="modalLayer2Title" aria-hidden="true">

                <div class="modal-dialog modal-drawer-right" role="document">

                    <div id="modalContentLayer2" class="modal-content">
                        <!-- .modal-header -->
                        <div class="modal-header d-block">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">
                                    <a href="#" data-dismiss="modal" data-toggle="modal"
                                       data-target="#modalBoardConfig"><i
                                            class="breadcrumb-icon fa fa-angle-left mr-2"></i>Back</a>
                                </li>
                            </ol>
                            <h5 id="modalLayer2Title" class="modal-title">
                                <span id="layer-title">Overview</span>
                            </h5>
                        </div><!-- /.modal-header -->

                        <div class="modal-body">
                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, neque odio nisi. </p>
                        </div>
                    </div>
                </div>
            </div><!-- /.modalBoardConfig -->

            <form id="addNewTask" action="" method="POST"
                  enctype="multipart/form-data" name="addNewTask">
                @csrf
                <!-- .modal -->
                <div class="modal fade" id="modalNewTask" tabindex="-1" role="dialog"
                     aria-labelledby="modalNewTaskLabel" aria-hidden="true">

                    <div class="modal-dialog modal-lg" role="document">

                        <div class="modal-content px-lg-4 py-lg-3">
                            <!-- .modal-header -->
                            <div class="modal-header">
                                <h6 id="modalNewTaskLabel" class="modal-title"> Add new tasks </h6>
                            </div><!-- /.modal-header -->

                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="tasksTitle">Title</label> <input type="text" name="taskTitle"
                                                                                 id="tasksTitle" class="form-control"
                                                                                 required="" autocomplete="off"
                                                                                 data-autofocus="true">
                                </div>

                                <div class="form-group">
                                    <div class="d-flex justify-content-between">
                                        <label for="taskDescription">Description</label>
                                    </div>
                                    <textarea name="taskDescription" id="taskDescription"
                                              class="form-control"></textarea>

                                </div>

                                <hr>

                                <div class="form-group form-row">
                                    <!-- .col -->
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Assignee</label>
                                            <select class="form-control" name="user" id="userId">
                                                @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->email }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Priority</label>
                                            <select class="form-control" name="priority" id="priority">
                                                @foreach ($priorities as $priority)
                                                    <option value="{{ $priority->id }}">{{ $priority->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label class="control-label" for="taskDueDate">Due date</label>
                                            <div class="input-group input-group-alt flatpickr" data-toggle="flatpickr"
                                                 data-wrap="true" data-min-date="today">
                                                <input name="taskDueDate" id="taskDueDate" type="text"
                                                       class="form-control flatpickr-input datepicker" data-input=""
                                                      >
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-secondary" data-toggle=""><i
                                                            class="fa fa-calendar"></i></button>
                                                    <button type="button" class="btn btn-secondary" data-clear=""><i
                                                            class="fa fa-times"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Type</label>
                                            <select class="form-control" name="type" id="taskType">
                                                @foreach ($types as $type)
                                                    <option value="{{ $type->id }}">{{ $type->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <hr>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="reset" class="btn btn-light" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- .modal -->

        </div>
    </main>
    <script>
        $(document).ready(function () {
            $("#addNewTask").on("submit", function(e){
                e.preventDefault();
                saveTask();
            });
            $(".datepicker").datepicker();
        });
        function saveTask() {
            $.post( "/add-new-task", {
                    title: $("#tasksTitle").val(),
                    description: $("#taskDescription").val() ,
                    dueDate: $("#taskDueDate").val() ,
                    priority: $("#priority").val() ,
                    type: $("#taskType").val() ,
                    user: $("#userId").val() ,
                    projectId: '{{ $project->id }}',
                    '_token': "{{ csrf_token() }}"})
                .done(function( data ) {
                     window.location.href = "/home?project={{ $project->id }}'"
                });

        }
        function updateTask(taskId, statusId) {
            $.post( "/update-task", {
                task: taskId ,
                status: statusId,
                '_token': "{{ csrf_token() }}"})
                .done(function( data ) {
                    window.location.href = "/home?project={{ $project->id }}'"
                });

        }
    </script>

@endsection
