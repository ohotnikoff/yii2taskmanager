<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';

?>
<div class="task-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'created_at',
            // 'name',
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function($model){
                    return Html::a($model->name, ['/tasks/view', 'id' => $model->id]);
                }
            ],
            'description:ntext',
            [
                'attribute' => 'status_id',
                'value' => function($model){
                    return $model->status();
                }
            ],
            // 'created_by',
            //'assigned_to',
            //'updated_at',

            // ['class' => 'yii\grid\ActionColumn'],
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


</div>
