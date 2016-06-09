<?php
namespace mitrm\images;

use Yii;
use yii\base\InvalidConfigException;

/**
 * ShortLinks module.
 */
class Module extends \yii\base\Module
{
    public $base_dir = false;
    public $base_path = false;

    public $image_driver = 'Imagick';


    /**
     * @brief Расрешенные размеры при изменении размера
     * @var array
     */
    public $allow_size = [
        50,
        100,
        500,
        1000,
    ];

    public $is_backend = true;

    public $domain = false;

    /**
     * @inheritdoc
     */
    public function init()
    {
        if(!$this->domain || !$this->base_path || !$this->base_dir) {
            throw new InvalidConfigException('Не указанs обязательные параметры');
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