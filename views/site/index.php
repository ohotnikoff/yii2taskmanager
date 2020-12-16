<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">

        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <thead>
                        <tr><th scope="col">Города (<?= count($cities) ?>)</th></tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cities as $city): ?>
                        <tr>
                            <td>
                            <?php if(count($city['data']) == 0): ?>
                            <b class="text-success"><?= $city['name'] ?> (<?= count($city['data']) ?>):</b> нет данных
                            <?php elseif(count($city['data']) > 5): ?>
                            <b class="text-success"><?= $city['name'] ?> (<?= count($city['data']) ?>):</b> <?= sprintf("%s&hellip;", implode(', ', array_slice($city['data'], 0, 5))) ?>
                            <?php else: ?>
                            <b class="text-success"><?= $city['name'] ?> (<?= count($city['data']) ?>):</b> <?= implode(', ', $city['data']) ?>
                            <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table">
                    <thead>
                        <tr><th scope="col">Сотрудники (<?= count($staff) ?>)</th></tr>
                    </thead>
                    <tbody>
                        <?php foreach ($staff as $key => $item): ?>
                        <?php if($key > 5) continue; ?>
                        <tr>
                            <td>

                            <b class="text-success"><?= $item['fullname'] ?> (<?= count($item['assignedTasks']) ?>):</b><br>
                            <?php if(count($item['assignedTasks']) == 0): ?>
                                <span class="text-danger">-- нет назначенных задач</span>
                            <?php else: ?>

                                <?php foreach ($item['assignedTasks'] as $task): ?>
                                    <?= $task['created_at'] ?> - <?= Html::a($task['name'], ['/tasks/view', 'id' => $task['id']]) ?><br>
                                <?php endforeach; ?>

                            <?php endif; ?>

                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>


        <div id="carouselExampleControls" class="carousel slide mt-5" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="/images/cats/001.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/images/cats/002.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/images/cats/003.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>
</div>
