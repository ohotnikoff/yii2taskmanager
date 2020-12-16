<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */

$this->title = 'Staff';

?>
<div class="staff-index">

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item',
        'layout' => "<div class='row mb-2'>{items}</div><nav aria-label='Page navigation'>{pager}</nav>",
        'itemOptions' => [
            'tag' => 'div',
            'class' => 'col-md-6',
        ],
        'pager' => [
            'hideOnSinglePage' => true,
            'options' => [
                'class' => 'pagination pagination-template d-flex justify-content-center',
                'role' => 'navigation',
            ],
            'linkContainerOptions' => ['class' => 'page-item'],
            'linkOptions' => ['class' => 'page-link'],

            // Customzing CSS class for navigating link
            'disabledPageCssClass' => 'd-none disable',
            'activePageCssClass' => 'active',
        ],
    ]); ?>

    <?php /*foreach($staff as $item): ?>

    <?php endforeach;*/ ?>


    <p>
        <?= Html::a('Создать сотрудника', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
