<?php

namespace mitrm\images\models\query;

use Yii;
use yii\db\ActiveQuery;


use mitrm\images\models\ImagesCommon;


class ImagesCommonQuery extends ActiveQuery
{

    /**
     * @param null $db
     * @return ImagesCommon|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }


    /**
     * @param null $db
     * @return ImagesCommon[]|null
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @brief filter active
     * @return $this
     */
    public function active()
    {
        $this->andWhere(['is_active' => 1]);
        return $this;
    }
}
