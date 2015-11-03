<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BlockTime */

$this->title = 'Create Block Time';
$this->params['breadcrumbs'][] = ['label' => 'Block Times', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block-time-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
