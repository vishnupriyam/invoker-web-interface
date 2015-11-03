<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BlockTime */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="block-time-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'starttime')->textInput() ?>

    <?= $form->field($model, 'endtime')->textInput() ?>

    <?= $form->field($model, 'created_time')->textInput() ?>

    <?= $form->field($model, 'course_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
