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
                <th style="width: 60px;">User</th>
                <th style="width: 150px;">Status</th>
                <th style="width: 150px;">Comment</th>
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
                        <form action="sendRequestTask" method="POST">
                            <input type="hidden" name="task_id" value="<?= $model->id; ?>">
                            <select name="new_status" class="form-select" onchange="this.form.submit()">
                                <option value="0" <?= $model->status == 0 ? 'selected' : ''; ?>>Topshiriq qaytarildi</option>
                                <option value="1" <?= $model->status == 1 ? 'selected' : ''; ?>>Jarayonda</option>
                                <option value="2" <?= $model->status == 2 ? 'selected' : ''; ?>>Kutilmoqda</option>
                                <option value="3" <?= $model->status == 3 ? 'selected' : ''; ?>>Qabul qilindi</option>
                                <option value="4" <?= $model->status == 4 ? 'selected' : ''; ?>>Bekor qilindi</option>
                            </select>
                        </form>
                    </td>
                    <td><?= $model->comment ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>