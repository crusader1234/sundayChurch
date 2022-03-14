<?php

?>



<div class="row">
    <div class="col-xl-4">
        <div class="card bg-primary bg-soft">
            <div>
                <div class="row">
                    <div class="col-7">
                        <div class="text-primary p-3">
                            <h5 class="text-primary"><?php include 'includes/greet/welcome.php';?></h5>
                            <p><?=$_SESSION['username'];?> - <?=$_SESSION['role'];?></p>


                        </div>
                    </div>
                    <div class="col-5 align-self-end">
                        <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Monthly Contributions</h4>
                <div class="row">
                    <div class="col-sm-6">
                        <p class="text-muted">This month</p>
                        <h3>Gh&#8373; <span id="contribute">0</span> </h3>
                        <p class="text-muted"><span class="text-success me-2"> 12% <i class="mdi mdi-arrow-up"></i> </span> From previous period</p>

                        <div class="mt-4">
                            <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light btn-sm">View More <i class="mdi mdi-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mt-4 mt-sm-0">
                            <div id="radialBar-chart" class="apex-charts"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <div class="card">
            <div class="card-header bg-transparent border-bottom">
                <div class="d-flex flex-wrap align-items-start">
                    <div class="me-2">
                        <h5 class="card-title mt-1 mb-0">Posts</h5>
                    </div>
                    <ul class="nav nav-tabs nav-tabs-custom card-header-tabs ms-auto" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#post-recent" role="tab">
                                Announcements
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#post-popular" role="tab">
                                Events
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#birthdays" role="tab">
                                Birthdays
                            </a>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="card-body">

                <div data-simplebar style="max-height: 295px;">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="post-recent" role="tabpanel">
                            <div class="d-flex flex-wrap align-items-start">
                                <div class="me-2">
                                    <h5 class="card-title mb-3">Today's Announcements</h5>
                                </div>
                                <div class="dropdown ms-auto">
                                    <a class="text-muted dropdown-toggle font-size-16" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                        <i class="mdi mdi-dots-horizontal"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                </div>
                            </div>

                            <div data-simplebar style="max-height: 310px;">
                                <ul class="list-group list-group-flush">


                                    <?php foreach ($announcements->AllAnouncement() as $announcement): ?>
                                        <li class="list-group-item py-3">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title rounded-circle bg-light text-primary">
                                                            <i class="bx bxs-chat"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h5 class="font-size-14 mb-1"><?=$announcement->title;?> <small class="text-muted float-end">1 hr Ago</small></h5>
                                                    <p class="text-muted">If several languages coalesce, the grammar of the resulting of the individual</p>
                                                    <div>
                                                        <a href="javascript: void(0);" class="text-success"><i class="mdi mdi-reply me-1"></i> View</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach;?>


                                </ul>
                            </div>
                        </div>
                        <!-- end tab pane -->

                        <div class="tab-pane" id="post-popular" role="tabpanel">

                            <div class="d-flex flex-wrap align-items-start">
                                <div class="me-2">
                                    <h5 class="card-title mb-3">Upcoming Events</h5>
                                </div>
                                <div class="dropdown ms-auto">
                                    <a class="text-muted dropdown-toggle font-size-16" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                        <i class="mdi mdi-dots-horizontal"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                </div>
                            </div>

                            <div data-simplebar style="max-height: 310px;">
                                <ul class="verti-timeline list-unstyled">
                                <?php foreach ($events->AllUpcomingEvents() as $event): ?>
                                    <li class="event-list active">
                                        <div class="event-timeline-dot">
                                            <i class="bx bxs-right-arrow-circle font-size-18 bx-fade-right"></i>
                                        </div>
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <h5 class="font-size-14"><?=date('d M', strtotime($event->start_date));?> <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div>
                                                    <span class="fw-semibold" style="text-transform: capitalize;"><?=$event->event_name;?></span>
                                                </div>
                                                <div>
                                                    <?=$event->description;?>... <a href="javascript: void(0);">View</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach;?>

                            </ul>
                            </div>

                        </div>
                        <!-- end tab pane -->

                        <div class="tab-pane" id="birthdays" role="tabpanel">

                            <div class="d-flex flex-wrap align-items-start">
                                <div class="me-2">
                                    <h5 class="card-title mb-3">Upcoming Events</h5>
                                </div>
                                <div class="dropdown ms-auto">
                                    <a class="text-muted dropdown-toggle font-size-16" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                        <i class="mdi mdi-dots-horizontal"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                </div>
                            </div>

                            <div data-simplebar style="max-height: 310px;">
                                <div class="hori-timeline">
                            <div class="owl-carousel owl-theme  navs-carousel events" id="timeline-carousel">
                                <?php foreach ($events->GetCurrentMonthBirthdays() as $birthday): ?>
                                    <div class="item event-list active">
                                        <div>
                                            <div class="event-date">
                                                <div class="text-primary mb-1"><?=date('d M', strtotime($birthday->birth_date));?></div>
                                                <h5 class="mb-4" style="text-transform: capitalize;"><?=$birthday->firstname . ' ' . $birthday->lastname;?></h5>
                                            </div>
                                            <div class="event-down-icon">
                                                <i class="bx bx-down-arrow-circle h1 text-primary down-arrow-icon"></i>
                                            </div>

                                        </div>
                                    </div>
                                <?php endforeach;?>

                            </div>
                        </div>

                            </div>

                        </div>
                    </div>
                    <!-- end tab content -->
                </div>
            </div>
        </div>

        <!--  -->
    </div>
    <div class="col-xl-8">
        <div class="row">
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Members</p>
                                <h4 class="mb-0"><span id="members">0</span></h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center">
                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                    <span class="avatar-title">
                                        <i class="bx bx-group font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Groups / Zones</p>
                                <h4 class="mb-0"><span id="groups">0</span></h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center ">
                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-primary">
                                        <i class="bx bx-group font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Families</p>
                                <h4 class="mb-0"><span id="families">0</span></h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center">
                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-primary">
                                        <i class="bx bx-group font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->


        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap align-items-start">
                    <h5 class="card-title me-2">Attendance</h5>
                    <div class="ms-auto">
                        <div class="toolbar button-items text-end">
                            <button type="button" class="btn btn-light btn-sm">
                                ALL
                            </button>
                            <button type="button" class="btn btn-light btn-sm">
                                1M
                            </button>
                            <button type="button" class="btn btn-light btn-sm">
                                6M
                            </button>
                            <button type="button" class="btn btn-light btn-sm active">
                                1Y
                            </button>

                        </div>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-lg-4">
                        <div class="mt-4">
                            <p class="text-muted mb-1">Today</p>
                            <h5>1024</h5>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mt-4">
                            <p class="text-muted mb-1">This Month</p>
                            <h5>12356 <span class="text-success font-size-13">0.2 % <i class="mdi mdi-arrow-up ms-1"></i></span></h5>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mt-4">
                            <p class="text-muted mb-1">This Year</p>
                            <h5>102354 <span class="text-success font-size-13">0.1 % <i class="mdi mdi-arrow-up ms-1"></i></span></h5>
                        </div>
                    </div>
                </div>

                <hr class="mb-4">

                <div class="apex-charts" id="area-chart" dir="ltr"></div>
            </div>
        </div>


    </div>
</div>


<!-- end row -->


<script src="assets/pages/dashboard.page.js"></script>

