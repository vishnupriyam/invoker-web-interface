<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Institute;

/* @var $this yii\web\View */
/* @var $model app\models\BlockTime */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="block-time-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'institute')->dropdownList(
        institute::find()->select(['name','id'])->indexBy('id')->column(),
        [
            'prompt'=>'Select Institute',
            'onchange' => '$.post( "index.php?r=institute/courses&id=" +$(this).val(), function( data ) {
                                $( "select#blocktime-course_id" ).html( data );
                           });'
        ]
    ); ?>

    <?= $form->field($model,'course_id')->dropdownList(
        [],
        [
            'prompt' => 'Select Courses',
        ])?>

    <?= $form->field($model, 'starttime')->textInput() ?>

    <?= $form->field($model, 'endtime')->textInput() ?>

    <?= $form->field($model, 'created_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
