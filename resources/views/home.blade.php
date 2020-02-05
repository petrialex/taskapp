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
                            <a href="/dashboard" class="menu-link"><span class="menu-icon fa fa-home"></span> <span class="menu-text">Dashboard</span></a>
                        </li><!-- /.menu-item -->

                        <li class="menu-item">
                            <a href="#" class="menu-link"><span class="menu-icon fa fa-rocket"></span> <span class="menu-text">Projects</span></a>
                            <ul class="menu">
                                @foreach($projects as $projectDetails)

                                    <li class="menu-item  <?php echo ($project && $projectDetails->id == $project->id) ? 'has-active':''; ?>">
                                        <a  href="{{ route('home') }}?project={{ $projectDetails->id }}" class="menu-link">{{ $projectDetails->name }}</a>
                                    </li>
                                @endforeach

                            </ul>
                        </li><!-- /.menu-item -->
                        <li class="menu-item">
                            <a href="/my-issues?project={{ $project->id }}" class="menu-link"><span class="menu-icon fa fa-tasks"></span> <span class="menu-text">My opened issues</span></a>
                        </li><!-- /.menu-item -->
                        <li class="menu-item">
                            <a href="/all-issues?project={{ $project->id }}" class="menu-link"><span class="menu-icon fa fa-table"></span> <span class="menu-text">All project issues</span></a>
                        </li><!-- /.menu-item -->
                        <li class="menu-item">
                            <a href="/reported-by-me?project={{ $project->id }}" class="menu-link"><span class="menu-icon fa fa-flag"></span> <span class="menu-text">Reported by me</span></a>
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
              <button type="button" class="btn btn-light btn-icon" title="Invite members" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-plus"></i></button> <!-- .dropdown-menu -->
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-rich stop-propagation">
                <div class="dropdown-arrow"></div>
                <div class="dropdown-header"> Add members </div>
                <div class="form-group px-3 py-2 m-0">
                  <input type="text" class="form-control" placeholder="e.g. @bent10" data-toggle="tribute" data-remote="" data-menu-container="#people-list" data-item-template="true" data-autofocus="true" data-tribute="true"> <small class="form-text text-muted">Search people by username or email address to invite them.</small>
                </div>
                <div id="people-list" class="tribute-inline stop-propagation"></div><a href="#" class="dropdown-footer">Invite member by link <i class="far fa-clone"></i></a>
              </div><!-- /.dropdown-menu -->
            </div><!-- /invite members -->
            <button type="button" class="btn btn-light btn-icon" data-toggle="page-expander" title="Expand board"><i class="oi oi-fullscreen-enter fa-rotate-90 fa-fw"></i></button> <button type="button" class="btn btn-light btn-icon" data-toggle="modal" data-target="#modalBoardConfig" title="Show menu"><i class="fa fa-cog fa-fw"></i></button>
          </div><!-- /right actions -->
        </header><!-- /.page-navs -->
        <!-- .board -->
        <div id="board" class="board" data-toggle="sortable" data-draggable=".tasks" data-handle=".task-header" data-delay="100" data-force-fallback="true">
          <!-- .tasks -->
          @foreach ($statuses as $status)
            <div class="tasks">
              <!-- .tasks-header -->
              <div class="task-header">
                <h3 class="task-title mr-auto"> {{ $status->name }} <span class="badge text-muted">({{ count($tasks[$status->id]) }})</span>
                </h3><!-- .btn -->
                <button class="btn btn-light btn-icon text-muted" data-toggle="modal" data-target="#modalNewTask" title="Add task"><i class="fa fa-plus-circle"></i></button> <!-- /.btn -->
                <!-- .dropdown -->
                <div class="dropdown">
                  <!-- .btn -->
                  <button class="btn btn-light btn-icon text-muted" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></button> <!-- /.btn -->
                  <!-- .dropdown-menu -->
                  <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-arrow"></div><a href="#" class="dropdown-item">Edit</a> <a href="#" class="dropdown-item">Move</a> <a href="#" class="dropdown-item">Duplicate</a> <a href="#" class="dropdown-item">Subcribe</a> <a href="#" class="dropdown-item">Trash</a>
                  </div><!-- /.dropdown-menu -->
                </div><!-- /.dropdown -->
              </div><!-- /.tasks-header -->
              <!-- .task-body -->
              <div class="task-body" data-toggle="sortable" data-group="tasks" data-delay="50" data-force-fallback="true">
              @foreach ($tasks[$status->id] as $task)
                  <?php
                  $taskUser = \App\User::where(['id' => $task->user_id])->first();
                  ?>
                  <!-- .task-issue -->
                  <div class="task-issue">
                    <!-- .card -->
                    <div class="card">
                      <!-- .card-header -->
                      <div class="card-header">
                        <div class="task-label-group">
                          <span class="task-label bg-teal"></span> <span class="task-label bg-green"></span>
                        </div>
                        <h4 class="card-title">
                          <a href="#" data-toggle="modal" data-target="#modalViewTask">{{ $task->title }}</a>
                        </h4>
                        <h6 class="card-subtitle text-muted">
                          <span class="text-muted">{{ $task->due_date }}</span>
                        </h6>
                      </div><!-- /.card-header -->
                      <!-- .card-body -->
                      <div class="card-body pt-0">

                        <div class="list-group">

                          <div class="list-group-item" data-toggle="modal" data-target="#modalViewTask">
                            <a href="#" class="stretched-link"></a> <!-- .list-group-item-body -->
                            <div class="list-group-item-body">
                              <!-- members -->
                              <figure class="user-avatar user-avatar-sm" data-toggle="tooltip" title="" data-original-title="Johnny Day">
                                <img src="{{ Voyager::image(  $taskUser->avatar ) }}" alt="{{$taskUser->name}}">
                              </figure>

                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer">
                        <a href="#" class="card-footer-item card-footer-item-bordered text-muted" data-toggle="modal" data-target="#modalViewTask" draggable="false"><i class="fa fa-comments mr-1"></i> 36</a>
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
    <div class="modal modal-drawer fade" id="modalBoardConfig" tabindex="-1" role="dialog" aria-labelledby="modalBoardConfigTitle" aria-hidden="true">

      <div class="modal-dialog modal-drawer-right" role="document">

        <div id="modalContentLayer1" class="modal-content">
          <!-- .modal-header -->
          <div class="modal-header">
            <h5 id="modalBoardConfigTitle" class="modal-title"> Menu </h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
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
    <div class="modal modal-drawer fade" id="modalLayer2" tabindex="-1" role="dialog" aria-labelledby="modalLayer2Title" aria-hidden="true">

      <div class="modal-dialog modal-drawer-right" role="document">

        <div id="modalContentLayer2" class="modal-content">
          <!-- .modal-header -->
          <div class="modal-header d-block">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active">
                <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modalBoardConfig"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Back</a>
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

    <form id="addNewTask" action="{{ route('add-task') }}?project={{ $project->id }}" method="post" enctype="multipart/form-data" name="addNewTask">
      <!-- .modal -->
      <div class="modal fade" id="modalNewTask" tabindex="-1" role="dialog" aria-labelledby="modalNewTaskLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg" role="document">

          <div class="modal-content px-lg-4 py-lg-3">
            <!-- .modal-header -->
            <div class="modal-header">
              <h6 id="modalNewTaskLabel" class="modal-title"> Add new tasks </h6>
            </div><!-- /.modal-header -->

            <div class="modal-body">

              <div class="form-group">
                <label for="tasksTitle">Title</label> <input type="text" name="taskTitle" id="tasksTitle" class="form-control" required="" autocomplete="off" data-autofocus="true">
              </div>

              <div class="form-group">
                <div class="d-flex justify-content-between">
                  <label for="taskDescription">Description</label>
                </div>
                <textarea name="taskDescription" id="taskDescription" class="form-control"></textarea>

              </div>

              <hr>

              <div class="form-group form-row">
                <!-- .col -->
                <div class="col-md-6">

                  <div class="form-group">
                    <label>Assignee</label>
                    <select class="form-control">
                      <option>User name</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Priority</label>
                    <select class="form-control">
                      <option>User name</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">

                  <div class="form-group">
                    <label class="control-label" for="taskDueDate">Due date</label>
                    <div class="input-group input-group-alt flatpickr" data-toggle="flatpickr" data-wrap="true" data-min-date="today">
                      <input name="taskDueDate" id="taskDueDate" type="text" class="form-control flatpickr-input" data-input="" readonly="readonly">
                      <div class="input-group-append">
                        <button type="button" class="btn btn-secondary" data-toggle=""><i class="far fa-calendar"></i></button> <button type="button" class="btn btn-secondary" data-clear=""><i class="fa fa-times"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <hr>

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Save</button> <button type="reset" class="btn btn-light" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- .modal -->
    <div class="modal modal-drawer fade has-shown" id="modalViewTask" tabindex="-1" role="dialog" aria-labelledby="modalViewTaskLabel" style="display: none;" aria-hidden="true">

      <div class="modal-dialog modal-lg modal-drawer-right" role="document">

        <div class="modal-content">

          <div class="modal-body p-3 p-lg-4">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active">
                <a href="#" data-dismiss="modal"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>In Progress</a>
              </li>
            </ol>
            <h5 id="modalViewTaskLabel" class="modal-title"> Ride a Roller Coaster </h5>
            <hr>
            <p class="text-muted"> Opened one week ago by <a href="#" class="link-text" data-toggle="tooltip" title="" data-original-title="@jgrif"><span class="user-avatar user-avatar-xs"><img src="https://uselooper.com/assets/images/avatars/uifaces6.jpg" alt=""></span> Jacob Griffin</a>
            </p>
            <hr>
            <div class="task-description">
              <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus perferendis magnam fugit veritatis numquam perspiciatis. Mollitia optio vero eum velit, recusandae! Amet in consectetur expedita repellat, obcaecati non deserunt molestias. </p>
            </div>
            <div class="row my-3">

              <div class="col-6 mb-3">

                <div class="time-tracking">
                  <h6> Time tracking </h6><button class="btn btn-subtle-success btn-icon"><i class="fa fa-play"></i></button> <span class="counter ml-1"><span class="hours">00</span> <span class="separtor">:</span> <span class="minutes">00</span> <span class="separtor">:</span> <span class="second">00</span></span> / <span class="estimate">8h</span>
                </div>
              </div>

              <div class="col-6 mb-3">
                <h6> Due date </h6>
                <div class="inline-editable pt-1">
                  <input type="text" class="form-control" value="No due date">
                </div>
              </div>

              <div class="col-6 mb-3">
                <h6> Labels </h6><span class="tile bg-green"></span> <span class="tile bg-pink"></span> <span class="tile bg-yellow"></span>
                <div class="dropdown d-inline-block">
                  <a href="#" class="tile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-plus"></i></a> <!-- .dropdown-menu -->
                  <div class="dropdown-menu dropdown-menu-md stop-propagation" id="dntmLabels" aria-labelledby="dropdownTaskLabels2" style="">
                    <h6 id="dropdownTaskLabels2" class="dropdown-header"> Select labels </h6>
                    <div class="dropdown-divider"></div>
                    <div class="form-group px-3 py-2 mb-0">
                      <input type="text" class="form-control" data-filter="#dntmLabels .filterable" placeholder="Search" data-autofocus="true">
                    </div><label class="custom-control custom-checkbox filterable"><input type="checkbox" class="custom-control-input task-nolabel" name="taskLabels[]" value="0" data-label="No Label" checked=""> <span class="custom-control-label">No Label</span></label>
                    <div class="dropdown-divider"></div>
                    <div class="dropdown-scroll">
                      <label class="custom-control custom-checkbox filterable"><input type="checkbox" class="custom-control-input task-label" name="taskLabels[]" value="1" data-label="https://uselooper.com/assets"> <span class="custom-control-label"><i class="fa fa-square fa-lg text-blue mr-1"></i> Assets</span></label> <label class="custom-control custom-checkbox filterable"><input type="checkbox" class="custom-control-input task-label" name="taskLabels[]" value="2" data-label="Build Tools"> <span class="custom-control-label"><i class="fa fa-square fa-lg text-indigo mr-1"></i> Build Tools</span></label> <label class="custom-control custom-checkbox filterable"><input type="checkbox" class="custom-control-input task-label" name="taskLabels[]" value="3" data-label="Components"> <span class="custom-control-label"><i class="fa fa-square fa-lg text-purple mr-1"></i> Components</span></label> <label class="custom-control custom-checkbox filterable"><input type="checkbox" class="custom-control-input task-label" name="taskLabels[]" value="4" data-label="Dependencies"> <span class="custom-control-label"><i class="fa fa-square fa-lg text-pink mr-1"></i> Dependencies</span></label> <label class="custom-control custom-checkbox filterable"><input type="checkbox" class="custom-control-input task-label" name="taskLabels[]" value="5" data-label="Design"> <span class="custom-control-label"><i class="fa fa-square fa-lg text-red mr-1"></i> Design</span></label> <label class="custom-control custom-checkbox filterable"><input type="checkbox" class="custom-control-input task-label" name="taskLabels[]" value="6" data-label="Documentation"> <span class="custom-control-label"><i class="fa fa-square fa-lg text-orange mr-1"></i> Documentation</span></label> <label class="custom-control custom-checkbox filterable"><input type="checkbox" class="custom-control-input task-label" name="taskLabels[]" value="7" data-label="Doing"> <span class="custom-control-label"><i class="fa fa-square fa-lg text-yellow mr-1"></i> Doing</span></label> <label class="custom-control custom-checkbox filterable"><input type="checkbox" class="custom-control-input task-label" name="taskLabels[]" value="8" data-label="JS"> <span class="custom-control-label"><i class="fa fa-square fa-lg text-green mr-1"></i> JS</span></label> <label class="custom-control custom-checkbox filterable"><input type="checkbox" class="custom-control-input task-label" name="taskLabels[]" value="9" data-label="SCSS"> <span class="custom-control-label"><i class="fa fa-square fa-lg text-teal mr-1"></i> SCSS</span></label> <label class="custom-control custom-checkbox filterable"><input type="checkbox" class="custom-control-input task-label" name="taskLabels[]" value="10" data-label="To Do"> <span class="custom-control-label"><i class="fa fa-square fa-lg text-cyan mr-1"></i> To Do</span></label>
                    </div>
                    <div class="dropdown-divider"></div><a href="#" class="dropdown-item">Create new label</a> <a href="#" class="dropdown-item">Manage labels</a>
                  </div><!-- /.dropdown-menu -->
                </div>
              </div>

              <div class="col-6 mb-3">
                <!-- .assignee -->
                <div class="assignee">
                  <h6> Assignee </h6>
                  <div class="avatar-group">
                    <a href="#" class="user-avatar" data-toggle="tooltip" title="" data-original-title="You"><img src="https://uselooper.com/assets/images/avatars/uifaces2.jpg" alt="You"></a> <a href="#" class="user-avatar" data-toggle="tooltip" title="" data-original-title="Mellisa Day"><img src="https://uselooper.com/assets/images/avatars/uifaces4.jpg" alt="Mellisa Day"></a>
                    <div class="dropdown d-inline-block">
                      <a href="#" class="tile tile-circle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-plus"></i></a> <!-- .dropdown-menu -->
                      <div class="dropdown-menu dropdown-menu-md overflow-auto stop-propagation" aria-labelledby="dropdownAssignee2" style="max-height: 30rem;">
                        <h6 id="dropdownAssignee2" class="dropdown-header"> Add assignee </h6>
                        <div class="dropdown-divider"></div>
                        <div class="form-group px-3 py-2 mb-0">
                          <input type="text" class="form-control" placeholder="Search members" data-autofocus="true">
                        </div><label class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input task-unassignees" name="taskAssignees[]" value="0" data-label="Unassigned"> <span class="custom-control-label">Unassigned</span></label>
                        <div class="dropdown-divider"></div>
                        <h6 class="dropdown-header"> Assignee(s) </h6><label class="custom-control custom-checkbox filterable" data-sort="Beni Arisandi"><input type="checkbox" class="custom-control-input task-assignees" name="taskAssignees[]" value="4" data-label="Beni Arisandi" checked=""> <span class="custom-control-label custom-control-label-media"><span class="media"><span class="mr-2"><span class="user-avatar"><img src="https://uselooper.com/assets/images/avatars/uifaces2.jpg" alt=""></span></span> <span class="media-body">Beni Arisandi<br>
                                      <span class="text-muted">@benz</span></span></span></span></label> <label class="custom-control custom-checkbox filterable" data-sort="Melissa Day"><input type="checkbox" class="custom-control-input task-assignees" name="taskAssignees[]" value="2" data-label="Melissa Day" checked=""> <span class="custom-control-label custom-control-label-media"><span class="media"><span class="mr-2"><span class="user-avatar"><img src="https://uselooper.com/assets/images/avatars/uifaces4.jpg" alt=""></span></span> <span class="media-body">Melissa Day<br>
                                      <span class="text-muted">@melday</span></span></span></span></label>
                        <div id="dntmDivider" class="dropdown-divider"></div><label class="custom-control custom-checkbox filterable" data-sort="Adam Medina"><input type="checkbox" class="custom-control-input task-assignees" name="taskAssignees[]" value="3" data-label="Adam Medina"> <span class="custom-control-label custom-control-label-media"><span class="media"><span class="mr-2"><span class="user-avatar"><img src="https://uselooper.com/assets/images/avatars/uifaces15.jpg" alt=""></span></span> <span class="media-body">Adam Medina<br>
                                      <span class="text-muted">@amed</span></span></span></span></label> <label class="custom-control custom-checkbox filterable" data-sort="Diana Miller"><input type="checkbox" class="custom-control-input task-assignees" name="taskAssignees[]" value="1" data-label="Diana Miller"> <span class="custom-control-label custom-control-label-media"><span class="media"><span class="mr-2"><span class="user-avatar"><img src="https://uselooper.com/assets/images/avatars/uifaces9.jpg" alt=""></span></span> <span class="media-body">Diana Miller<br>
                                      <span class="text-muted">@dmiller</span></span></span></span></label> <label class="custom-control custom-checkbox filterable" data-sort="Douglas Lucas"><input type="checkbox" class="custom-control-input task-assignees" name="taskAssignees[]" value="5" data-label="Douglas Lucas"> <span class="custom-control-label custom-control-label-media"><span class="media"><span class="mr-2"><span class="user-avatar"><img src="https://uselooper.com/assets/images/avatars/uifaces5.jpg" alt=""></span></span> <span class="media-body">Douglas Lucas<br>
                                      <span class="text-muted">@lucaldoug</span></span></span></span></label>
                      </div><!-- /.dropdown-menu -->
                    </div>
                  </div>
                </div><!-- /.assignee -->
              </div>
            </div><!-- /grid row -->

            <div class="form-group">
              <div class="d-flex justify-content-between">
                <label>Todos</label> <span class="text-muted">(2/3)</span>
              </div><!-- .progress -->
              <div class="progress progress-sm">
                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="66.67" aria-valuemin="0" aria-valuemax="100" style="width: 66.67%">
                  <span class="sr-only">66.67% Complete</span>
                </div>
              </div>
            </div>

            <div class="form-group">
              <!-- save task todos to this input hidden -->
              <input type="hidden" name="vtTodos"> <!-- .todo-list -->
              <div id="vtTodos" class="todo-list">

                <div class="todo">

                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="vtodo0" value="0" checked=""> <label class="custom-control-label" for="vtodo0">Eat corn on the cob</label>
                  </div><

                  <div class="todo-actions pr-1">
                    <button type="button" class="btn btn-sm btn-light">Delete</button>
                  </div>
                </div>

                <div class="todo">

                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="vtodo1" value="1"> <label class="custom-control-label" for="vtodo1">Mix up a pitcher of sangria</label>
                  </div><

                  <div class="todo-actions pr-1">
                    <button type="button" class="btn btn-sm btn-light">Delete</button>
                  </div>
                </div>

                <div class="todo">

                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="vtodo2" value="2" checked=""> <label class="custom-control-label" for="vtodo2">Have a barbecue</label>
                  </div><

                  <div class="todo-actions pr-1">
                    <button type="button" class="btn btn-sm btn-light">Delete</button>
                  </div>
                </div>
              </div><!-- /.todo-list -->
              <!-- .publisher -->
              <div class="publisher">
                <!-- .publisher-input -->
                <div class="publisher-input pr-0">
                  <input class="form-control form-control-reflow" placeholder="Add a todo" autocomplete="off">
                </div><!-- /.publisher-input -->
                <!-- .publisher-actions -->
                <div class="publisher-actions">
                  <!-- .publisher-tools -->
                  <div class="publisher-tools pb-0">
                    <button type="button" class="btn btn-secondary">Add</button> <button type="button" class="btn btn-light"><i class="fa fa-times"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <hr>

            <div class="media">
              <figure class="user-avatar user-avatar-md mr-2">
                <img src="https://uselooper.com/assets/images/avatars/profile.jpg" alt="">
              </figure>
              <div class="media-body">

                <div class="publisher keep-focus focus">
                  <label for="publisherInput7" class="publisher-label">Add comment</label>
                  <div class="publisher-input">
                    <textarea id="publisherInput7" class="form-control" placeholder="Write a comment"></textarea>
                  </div>

                  <div class="publisher-actions">

                    <div class="publisher-tools mr-auto">
                      <div class="btn btn-light btn-icon fileinput-button">
                        <i class="fa fa-paperclip"></i> <input type="file" id="attachment7" name="attachment7[]" multiple="">
                      </div><button type="button" class="btn btn-light btn-icon"><i class="far fa-smile"></i></button>
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
  </div>
    </main>

@endsection
