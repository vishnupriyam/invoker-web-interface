<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BlockTime */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Block Times', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block-time-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'course.name',
            'course.institute.name',
            'starttime',
            'endtime',
        ],
    ]) ?>

</div>
