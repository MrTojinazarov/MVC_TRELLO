<div class="row pt-3 ps-3 pe-3">
    <div class="col-12">
        <a href="/addtasks" style="width: 100px;" class="btn btn-outline-warning">Add tasks</a>
    </div>
</div>

<div class="row p-3">
    <div class="col-12">
        <h1>Tasks</h1>

        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th style="width: 50px;">ID</th>
                <th style="width: 150px;">Title</th>
                <th style="width: 200px;">Description</th>
                <th style="width: 100px;">Image</th>
                <th style="width: 60px;">User ID</th>
                <th style="width: 100px;">Status</th>
                <th style="width: 200px;">Comment</th>
                <th style="width: 100px;">Options</th>
            </tr>
            <?php

            use App\Models\User;

            foreach ($models as $model) { ?>
                <tr>
                    <td><?= $model->id ?></td>
                    <td><?= $model->title ?></td>
                    <td><?= $model->description ?></td>
                    <td><img src="App/<?= $model->img ?>" alt="model Image" style="width: 100px; height: auto;"></td>
                    <td><?= (User::getUserById($model->user_id))->name ?></td>
                    <td>
                        <?php
                        switch ($model->status) {
                            case 0:
                                echo "New";
                                break;
                            case 1:
                                echo "In Progress";
                                break;
                            case 2:
                                echo "Under Review";
                                break;
                            case 3:
                                echo "Completed";
                                break;
                            case 4:
                                echo "Failed";
                                break;
                            default:
                                echo "Unknown status";
                                break;
                        }
                        ?>
                    </td>
                    <td><?= $model->comment ?></td>
                    <td>
                        <div class="row mb-1">
                            <div class="col-12">
                                <button type="button" class="btn btn-outline-warning" style="width: 100px;" data-bs-toggle="modal" data-bs-target="#updateModal<?= $model->id ?>">
                                    Update
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <form action="/deleteTask" method="POST">
                                    <input type="hidden" name="id" value="<?= $model->id ?>">
                                    <button type="submit" name="ok" value="1" style="width: 100px;" class="btn btn-outline-primary">Delete</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>

                <!-- Update Modal -->
                <div class="modal fade" id="updateModal<?= $model->id ?>" tabindex="-1" aria-labelledby="updateModalLabel<?= $model->id ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateModalLabel<?= $model->id ?>">model: <?= $model->title ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="/saveUpdatedmodel" method="POST">
                                <div class="modal-body">
                                    <p><strong>Title:</strong></p>
                                    <input type="text" name="title" value="<?= $model->title ?>" class="form-control">
                                    <br>
                                    <p><strong>Description:</strong></p>
                                    <textarea name="description" class="form-control"><?= $model->description ?></textarea>
                                    <br>
                                    <p><strong>Status:</strong></p>
                                    <select name="status" class="form-select">
                                        <option value="0" <?= $model->status == 0 ? 'selected' : '' ?>>New</option>
                                        <option value="1" <?= $model->status == 1 ? 'selected' : '' ?>>In Progress</option>
                                        <option value="2" <?= $model->status == 2 ? 'selected' : '' ?>>Under Review</option>
                                        <option value="3" <?= $model->status == 3 ? 'selected' : '' ?>>Completed</option>
                                        <option value="4" <?= $model->status == 4 ? 'selected' : '' ?>>Failed</option>
                                    </select>
                                </div>

                                <div class="modal-footer">
                                    <input type="hidden" name="id" value="<?= $model->id ?>">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="ok" value="1" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </table>
    </div>
</div>