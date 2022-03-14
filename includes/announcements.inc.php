<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-end border-0">

                <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-xl">
                    <i class="bx bx-chat font-size-16 align-middle me-2"></i> Add Announcement
                </button>


            </div>
            <div class="card-body">

                <table id="datatable-buttons" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Group</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>


                    <tbody>

                        <?php foreach ($announcements->AllAnouncement() as $announcement) : ?>
                            <tr>
                                <td style="text-transform:capitalize;">
                                    <?= $announcement->title; ?></td>
                                <td style="text-transform: capitalize;"><?= $announcement->description; ?></td>
                                <td style="text-transform: capitalize;"><i class="bx bx-group m-0 text-muted h5"></i> <?= $announcement->name ?> </td>
                                <td><?= date('d/m/Y', strtotime($announcement->created_date)); ?></td>
                                <td>


                                    <div class="dropdown float-start">
                                        <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bx bx-message-square-dots m-0 text-muted h5"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div> <!-- end dropdown -->
                                </td>
                            </tr>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->