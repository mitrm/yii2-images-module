<?php

use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\helpers\Html;

/**
 * @var $this \yii\web\View;
 */

?>


<?php Modal::begin([
     'header' => 'Загрузить изображение',
     'toggleButton' => $toggleButton,
 ]); ?>

<form action="<?= Url::toRoute(['/mitrm_images/images-common/upload-modal'])?>" method="post" class="js_mitrm_img_upload_form"  enctype="multipart/form-data">
    <div class="col-md-4">
        <?= Html::fileInput('images', '' ,['class' => 'form-control js_mitrm_input_clear', 'placeholder' => '', 'accept'=>'image/*'])?>
    </div>

    <div class="col-md-8">
        <?= Html::textInput('name', '' ,['class' => 'form-control js_mitrm_input_clear', 'placeholder' => 'Название изображения'])?>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-4 pull-right">
        <?= Html::submitButton('Отправить', ['class' => 'js_mitrm_img_upload_submit pull-right btn btn-primary'])?>
    </div>
    <div class="clearfix"></div>
    <?= Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->csrfToken)?>
</form>

<div class="js_mitrm_image_content" style="display: none; margin-top: 30px;">
    <div class="js_mitrm_image_link_size row" style="margin: 5px 0;">

    </div>
    <?= Html::textarea('mitrm_img', '' ,['class' => 'form-control js_mitrm_image_result', 'placeholder' => 'Ссылка на изображение'])?>
    <div class="js_mitrm_image_preview" style="margin-top: 20px;">

    </div>

</div>


<?php Modal::end();?>
