<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model mitrm\images\models\ImagesCommon */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="images-common-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class='col-md-6'>
        <?= $form->field($model, 'title')->textInput(['maxlength' => 250]) ?>
    </div>

    <div class='col-md-6'>
        <?= $form->field($model, 'path')->textInput(['maxlength' => 100]) ?>
    </div>

    <div class='col-md-6'>
        <?= $form->field($model, 'hash')->textInput(['maxlength' => 30]) ?>
    </div>

    <div class='col-md-6'>
        <?= $form->field($model, 'name')->textInput(['maxlength' => 50]) ?>
    </div>

    <div class='col-md-6'>
        <?= $form->field($model, 'exp')->textInput(['maxlength' => 10]) ?>
    </div>

    <div class='col-md-6'>
        <?= $form->field($model, 'is_active')->checkbox() ?>
    </div>

    <?php if(!$model->isNewRecord):?>
        <div class="clearfix"></div>
        <div class='col-md-12  margin-top-20'>
            Дата создания: <?= date('d.m.Y H:i', $model->created_at)?>
            <br>
            Дата обновления: <?= date('d.m.Y H:i', $model->updated_at)?>
        </div>
    <?php  endif;?>
    <div class="clearfix"></div>
    <div class="form-group margin-top-20">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
