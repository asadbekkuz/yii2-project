<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * SpecificationSearch represents the model behind the search form of `common\models\Specification`.
 */
class SpecificationSearch extends Specification
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category_id','specification_label_id',], 'integer'],
            [['specification_name'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
//        $query = Specification::findBySql('select
//                        DISTINCT(s1.specification_label_id),
//                        s1.category_id,
//                        (SELECT  GROUP_CONCAT(specification_name)
//                           FROM specification s2
//                        WHERE s2.category_id = s1.category_id) as specification_name from specification  s1');
        $query = Specification::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $this->category_id,
            'specification_label_id' => $this->specification_label_id,
        ]);

        $query->andFilterWhere(['like', 'specification_name', $this->specification_name]);

        return $dataProvider;
    }
}
