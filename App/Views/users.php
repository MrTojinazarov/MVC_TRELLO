<div class="row p-2">
    <div class="col-12">
        <h1>Users</h1>

        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th style="width: 50px;">ID</th>
                <th style="width: 150px;">NAME</th>
                <th style="width: 60px;">ROLE</th>
                <th style="width: 60px;">STATUS</th>
                <th style="width: 100px;">OPTIONS</th>
            </tr>
            <?php foreach ($models as $model) { ?>
                <tr>
                    <td><?= $model->id ?></td>
                    <td><?= $model->name ?></td>
                    <td><?= $model->role ?></td>
                    <td><?php
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
                    <td>
                        <div class="row">
                            <div class="col-12">
                                <form action="/deleteUser" method="POST">
                                    <input type="hidden" name="id" value="<?= $model->id ?>">
                                    <button type="submit" name="ok" value="1" style="width: 100px;" class="btn btn-outline-primary">Delete</button>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                    </td>
                </tr>
        </table>
    </div>
</div>