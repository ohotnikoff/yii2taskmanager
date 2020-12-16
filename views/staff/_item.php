<div class="card flex-md-row mb-4 box-shadow h-md-250">
    <div class="card-body d-flex flex-column align-items-start">
        <div class="staff-item__head">
            <!-- <strong class="d-inline-block mb-2 text-primary">World</strong> -->
            <h3 class="mb-0">
                <a class="text-dark" href="#"><?= $model->fullname ?></a>
            </h3>
        </div>
        <div class="mt-5"><span class="text-muted">тел:</span> <?= $model->phone?></div>
        <div class="mb-1"><span class="text-muted">email:</span> <?= $model->email?></div>
        <div class="mb-1"><span class="text-muted">город:</span> <?= $model->city()?></div>
        <div class="mb-1"><span class="text-muted">отдел:</span> <?= $model->department()?></div>
        <h5 class="card-text mb-auto mt-1">Задачи к исполнению:</h5>
        <?php if(count($model->assignedTasks) == 0): ?>
            <p>нет задач</p>
        <?php else: ?>
            <?php foreach($model->assignedTasks as $task): ?>
            <a href="#"><?= $task->name ?></a>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <?php if($model->id == 1): ?>
        <img class="card-img-right flex-auto d-none d-md-block" src="/images/staff/1.jpg" alt="Card image cap">
    <?php else: ?>
        <img class="card-img-right flex-auto d-none d-md-block" src="/images/staff/nophoto.png" alt="Card image cap">
    <?php endif; ?>
</div>
