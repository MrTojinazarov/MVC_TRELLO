<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?php

                            if ($models['count'] || $models['count'] == 0) {
                                echo $models['count'];
                            }

                            ?></h3>

                        <h2>All Users</h2>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="/users" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>
                            <?php
                            if ($models['acptCount'] || $models['acptCount'] == 0) {
                                echo $models['acptCount'];
                            }
                            ?>
                        </h3>

                        <h2>Accepted Users</h2>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="/acceptedUsers" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row p-2">
            <div class="col-12">
                <h1>Confrim Users</h1>

                <table class="table table-striped table-bordered table-hover">
                    <tr>
                        <th style="width: 50px;">ID</th>
                        <th style="width: 150px;">NAME</th>
                        <th style="width: 60px;">ROLE</th>
                        <th style="width: 60px;">STATUS</th>
                    </tr>
                    <?php
                    foreach ($models['models'] as $model) {
                        if ($model->status == 0 && $model->role != 'admin') { ?>
                            <tr>
                                <td>
                                    <h5><?= $model->id ?></h5>
                                </td>
                                <td>
                                    <h5><?= $model->name ?></h5>
                                </td>
                                <td>
                                    <h5><?= $model->role ?></h5>
                                </td>
                                <td>
                                    <form action="updateUserStatus" method="POST">
                                        <input type="hidden" name="id" value="<?= $model->id ?>">
                                        <div class="row">
                                            <div class="col-8">
                                                <?php
                                                if ($model->status == 0) { ?>
                                                    <input type="hidden" name="status" value="1">
                                                    <button type="submit" name="ok" class="btn btn-danders" value="1" style="color: red; width:100px; border:none;">
                                                        <h5>Confrim</h5>
                                                    </button>
                                                <?php } elseif ($model->status == 1) { ?>
                                                    <input type="hidden" name="status" value="0">
                                                    <button type="submit" name="ok" class="btn btn-danders" value="1" style="color: blue; width:100px; border:none;">
                                                        <h5>Accepted</h5>
                                                    </button>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                    <?php }
                    } ?>
                </table>
            </div>
        </div>
    </div>
</section>