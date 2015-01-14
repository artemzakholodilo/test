<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bigproduct;

/**
 * BigproductSearch represents the model behind the search form about `app\models\Bigproduct`.
 */
class BigproductSearch extends Bigproduct
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'supplier_id', 'instock'], 'integer'],
            [['name'], 'safe'],
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
    public function search($params, $model = null)
    {
        if (is_null($model)){
            $query = Bigproduct::find()->with('supplier');
        }
        else{
            $query = $model;
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'supplier_id' => $this->supplier_id,
            'instock' => $this->instock,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);
        
        $query->with(['supplier']);

        return $dataProvider;
    }
}
