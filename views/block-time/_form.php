<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Institute;
use app\models\Course;
use kartik\datetime\DateTimePicker;

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

    <? if($model->institute != null){
    echo $form->field($model,'course_id')->dropdownList(
        Course::find()->where(['institute_id'=>$model->institute->id])->select(['name','id'])->indexBy('id')->column(),
        [
            'prompt' => 'Select Courses',
        ]);
    }
    else{
        echo $form->field($model,'course_id')->dropdownList(
        [],
        [
            'prompt' => 'Select Courses',
        ]);
    }
    ?>


    <label class="control-label" for="blocktime-starttime">Starttime</label>
    <?=
        DateTimePicker::widget([
            'model' => $model,
            'attribute' => 'starttime',
            'name' => 'starttime',
            'type' => DateTimePicker::TYPE_INPUT,
            'value' => '2015-11-01 14:00:00',
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd hh:ii:ss'
            ]
        ]);
    ?>

    <label class="control-label" for="blocktime-endtime">Endtime</label>
    <?=
        DateTimePicker::widget([
            'model' => $model,
            'attribute' => 'endtime',
            'name' => 'endtime',
            'type' => DateTimePicker::TYPE_INPUT,
            'value' => '2015-11-01 14:00:00',
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd hh:ii:ss'
            ]
        ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
