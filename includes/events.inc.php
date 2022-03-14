

<div class="row">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-header d-flex justify-content-end border-0">


                <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-xl">
                    <i class="bx bx-calendar font-size-16 align-middle me-2"></i> Add Event
                </button>


            </div>
            <div class="card-body">
                <h4 class="card-title mb-4">Upcoming Events Timeline</h4>

                <div class="hori-timeline">
                    <div class="owl-carousel owl-theme  navs-carousel events" id="timeline-carousel">
                    <?php foreach ($events->AllUpcomingEvents() as $event) : ?>
                        <div class="item event-list active">
                            <div>
                                <div class="event-date">
                                    <div class="text-primary mb-1"><?= date('d M', strtotime($event->start_date)); ?></div>
                                    <h5 class="mb-4" style="text-transform: capitalize;"><?= $event->event_name; ?></h5>
                                </div>
                                <div class="event-down-icon">
                                    <i class="bx bx-down-arrow-circle h1 text-primary down-arrow-icon"></i>
                                </div>

                                <div class="mt-3 px-3">
                                    <p class="text-muted"><?= $event->description; ?></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>

                        
                    </div>
                </div>
            </div>
        </div>
        <!-- end card -->
    </div>
</div>
<!-- end row -->


<div class="row">
    <div class="col-12">
        <div class="card">


            <div class="card-body">

                <table id="events-table" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Event</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Group</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>


                    <tbody>
                        

                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->



<script src="assets/pages/events.page.js"></script>