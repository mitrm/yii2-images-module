<?php

namespace mitrm\images\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use mitrm\images\models\ImagesCommon;

/**
 * ImagesCommonSearch represents the model behind the search form about `mitrm\images\models\ImagesCommon`.
 */
class ImagesCommonSearch extends ImagesCommon
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_active', 'created_at', 'updated_at'], 'integer'],
            [['title', 'path', 'hash', 'name', 'exp'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ImagesCommon::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id'=> SORT_DESC,
                ]
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'path', $this->path])
            ->andFilterWhere(['like', 'hash', $this->hash])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'exp', $this->exp]);

        return $dataProvider;
    }
}
