<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model mitrm\images\models\ImagesCommon */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Images Commons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h3 class="page-title"><?= Html::encode($this->title) ?></h3>
 <div class="page-bar">
    <?         echo \mitrm\metronic\widgets\Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]);   
    ?>
</div>
<div class="portlet light images-common-view">
	<div class="portlet-body">
   

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'path',
            'hash',
            'name',
            'exp',
            'is_active',
            'created_at',
            'updated_at',
        ],
    ]) ?>
	</div>
</div>

