<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BlockTime */

$this->title = 'Update Block Time: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Block Times', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="block-time-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
