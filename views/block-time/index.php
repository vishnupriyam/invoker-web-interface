<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BlockTimeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Block Times';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block-time-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Block Time', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'starttime',
            'endtime',
            [
                'attribute' => 'course',
                'value' => 'course.name',
            ],
            [
                'attribute' => 'course.institute',
                'value' => 'course.institute.name',
            ],

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view}'],
        ],
    ]); ?>

</div>
