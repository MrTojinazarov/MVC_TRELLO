<?php
foreach($models as $model){
    $accept = $model->ustatus;
    if($model->ustatus != 1){?>

       <div class="row">
        <div class="col-8 offset-2">
            <p style="font-size: 40px; color: red;">Siz admin tomonidan active qilinmagansiz!</p>
        </div>
       </div> 

   <?php break; }
}
?>
<?php
if($accept){?>

<div class="row mt-3 mb-4 ms-2">
    <div class="col-10 offset-1">
        <h1>My tasks</h1>
    </div>
</div>

<?php
if (!empty($models)) {
    foreach ($models as $model) {
?>
        <div class="col-10 offset-1 mb-4">
            <div class="card shadow-sm">
                <div class="row g-0">
                    <div class="col-md-4">
                        <?php if (!empty($model->img)) { ?>
                            <img src="App/<?= $model->img ?>" class="img-fluid rounded-start" alt="Task Image">
                        <?php } else { ?>
                            <img src="default-image.jpg" class="img-fluid rounded-start" alt="No Image Available">
                        <?php } ?>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-title text-primary" style="font-size: 30px;">Task: <?= $model->title; ?></p>
                                <p class="card-text" style="font-size: 25px;">
                                    Description:
                                    <?php if (strlen($model->description) > 10): ?>
                                        <a href="#" data-bs-toggle="modal" class="text-warning" data-bs-target="#modal-description-<?= $model->id; ?>">
                                            <?= substr($model->description, 0, 20) . '...';
                                            ?>
                                        </a>
                                    <?php else: ?>
                                        <?= htmlspecialchars($model->description);
                                        ?>
                                    <?php endif; ?>
                                </p>
                                <div class="modal fade" id="modal-description-<?= $model->id; ?>" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabel"><?= htmlspecialchars($model->title); ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><?= htmlspecialchars($model->description); ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Yopish</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <h3>
                                <p class="card-text">
                                    Holat:
                                    <small class="<?= ($model->tstatus == 0) ? 'text-danger' : (($model->tstatus == 1) ? 'text-warning' : (($model->tstatus == 2) ? 'text-info' : 'text-success')) ?>">
                                        <?php
                                        switch ($model->tstatus) {
                                            case 0:
                                                echo "Topshiriq qaytarildi";
                                                break;
                                            case 1:
                                                echo "Jarayonda";
                                                break;
                                            case 2:
                                                echo "Kutilmoqda";
                                                break;
                                            case 3:
                                                echo "Qabul qilindi";
                                                break;
                                            case 4:
                                                echo "Bekor qilindi";
                                                break;
                                        }
                                        ?>
                                    </small>
                                </p>
                            </h3>
                            <?php if ($model->tstatus == 1) { ?>
                                <form action="sendTask" method="post" class="mt-2">
                                    <input type="hidden" name="task_id" value="<?= $model->id; ?>">
                                    <input type="hidden" name="new_status" value="2">
                                    <button type="submit" name="ok" value="1" class="btn btn-success">Taskni yuborish</button>
                                </form>
                            <?php } elseif ($model->tstatus == 0) { ?>
                                <form action="sendTask" method="post" class="mt-2">
                                    <input type="hidden" name="task_id" value="<?= $model->id; ?>">
                                    <input type="hidden" name="new_status" value="2">
                                    <button type="submit" name="ok" value="1" class="btn btn-secondary">Qayta yuborish</button>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
} else {
    echo "<p>Qaytarilgan topshiriqlar mavjud emas.</p>";
}
}
?>