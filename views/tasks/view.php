<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Task */

$this->title = $model->name;

\yii\web\YiiAsset::register($this);
?>
<div class="task-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'created_at',
            'name',
            'description:ntext',
            // 'status_id',
            [
                'attribute' => 'status_id',
                'value' => function($model){
                    return $model->status();
                }
            ],
            // 'created_by',
            [
                'attribute' => 'created_by',
                'format' => 'raw',
                'value' => function($model){
                    return $this->render('_createdBy', ['model' => $model->createdBy]);
                }
            ],
            // 'assigned_to',
            [
                'attribute' => 'assigned_to',
                'format' => 'raw',
                'value' => function($model){
                    return $this->render('_assignedTo', ['model' => $model->assignedTo]);
                }
            ],
            // 'updated_at',
        ],
    ]) ?>

</div>
