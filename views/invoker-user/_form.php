<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InvokerUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="invoker-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mobile_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'access_time')->textInput() ?>

    <?= $form->field($model, 'reg_token')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
