<?php
namespace mitrm\images;

use yii\web\AssetBundle;

/**
 * Module asset bundle.
 */
class Asset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@mitrm/images/assets';
    /**
     * @inheritdoc
     */
    public $js = [
        'js/images.js?1'
    ];
    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\web\YiiAsset'
    ];
}