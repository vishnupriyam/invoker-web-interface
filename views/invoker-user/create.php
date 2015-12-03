<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\InvokerUser */

$this->title = 'Create Invoker User';
$this->params['breadcrumbs'][] = ['label' => 'Invoker Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invoker-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
