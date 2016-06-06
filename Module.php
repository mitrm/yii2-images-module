<?php
namespace mitrm\images;

use Yii;
use yii\base\InvalidConfigException;

/**
 * ShortLinks module.
 */
class Module extends \yii\base\Module
{
    public $is_backend = true;

    public $domain = false;

    /**
     * @inheritdoc
     */
    public function init()
    {
        if(!$this->domain) {
            throw new InvalidConfigException('Не указан домен');
        }
        if ($this->is_backend === true) {
            $this->setViewPath('@mitrm/images/views/backend');
            if ($this->controllerNamespace === null) {
                $this->controllerNamespace = 'mitrm\images\controllers';
            }
        } else {

        }
        parent::init();
    }
}