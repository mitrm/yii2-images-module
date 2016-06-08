<?php
namespace mitrm\images\models\form;

use Yii;
use yii\base\Model;


class ImagesUploadForm extends Model
{
    public $title;
    public $images;

    public $error_message=false;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['images'], 'required'],
            [['images'], 'file'],
        ];
    }
	
    public function attributeLabels()
    {
        return [
            'images' => 'Изображения',
            'title' => 'Название',
        ];
    }

    /**
     * "@brief Сохраняем изображения
     */
    public function save()
    {

    }
    

    public function setErrorMessage()
    {
        $text = $this->getFirstError('images');
        if(!empty($text)) {
            $this->error_message = $text;
        }
    }

}
