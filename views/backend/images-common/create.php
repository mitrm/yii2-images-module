<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model mitrm\images\models\ImagesCommon */

$this->title = 'Create ';
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
<div class="portlet light images-common-create">
	<div class="portlet-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

	</div>
</div>

