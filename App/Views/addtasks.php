<div class="row p-3">
    <div class="col-12">
        <a href="/tasks" style="width: 100px;" class="btn btn-outline-warning">Back</a>
    </div>
</div>

<div class="row p-3">
    <h1>Task Qo'shish</h1>
    <form action="/addtasks" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title" class="form-label">Sarlavha:</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description" class="form-label">Tavsif:</label>
            <textarea id="description" name="description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="img" class="form-label">Rasm:</label>
            <input type="file" id="img" name="img" class="form-control">
        </div>

        <div class="form-group">
            <label for="user_id" class="form-label">Biriktirilgan shaxs</label>
            <select id="user_id" name="user_id" class="form-select" required>
                <?php foreach ($models as $model) { ?>
                    <option value="<?= $model->id ?>"><?= $model->name ?></option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" name="ok" class="btn btn-primary">Qo'shish</button>
    </form>
</div>