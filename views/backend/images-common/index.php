<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel mitrm\images\models\search\ImagesCommonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Images Commons';
$this->params['breadcrumbs'][] = $this->title;
?>
<h3 class="page-title"><?= Html::encode($this->title) ?></h3>
<div class="portlet light images-common-index">
	<div class="portlet-body">
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить Images Common', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'title',
            [
                'label' => 'Изображение',
                'format' => 'html',
                'value' => function($model){
                    return  Html::a(Html::img($model->getImage(100)), 'http://'.Yii::$app->getModule('mitrm_images')->domain.$model->getImgOrigin());
                }

            ],
//            'path',
//            'hash',
//            'name',
            // 'exp',
            'is_active:boolean',
            'created_at:dateTime',
            // 'updated_at',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>

	</div>
</div>


