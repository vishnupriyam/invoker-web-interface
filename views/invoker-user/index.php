<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InvokerUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Invoker Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="invoker-user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Invoker User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'mobile_id',
            'phone_number',
            'access_time',
            'reg_token',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
