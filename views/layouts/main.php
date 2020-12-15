<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<header class="py-3">
    <div class="container">
        <div class="text-center">
            <a class="header-logo text-dark" href="<?= Yii::$app->homeUrl ?>">TaskManager</a>
        </div>

        <nav class="nav d-flex justify-content-center">
            <a class="p-2 text-muted" href="<?= Yii::$app->homeUrl ?>">Главная</a>
            <a class="p-2 text-muted" href="<?= Url::to(['/staff/index'])?>">Сотрудники</a>
            <a class="p-2 text-muted" href="<?= Url::to(['/tasks/index'])?>">Задачи</a>
        </nav>
    </div>
</header>

<div class="wrap">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
