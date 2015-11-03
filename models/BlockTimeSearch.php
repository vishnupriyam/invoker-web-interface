<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BlockTime;

/**
 * BlockTimeSearch represents the model behind the search form about `app\models\BlockTime`.
 */
class BlockTimeSearch extends BlockTime
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'course_id'], 'integer'],
            [['starttime', 'endtime', 'created_time'], 'safe'],
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
        $query = BlockTime::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'starttime' => $this->starttime,
            'endtime' => $this->endtime,
            'created_time' => $this->created_time,
            'course_id' => $this->course_id,
        ]);

        return $dataProvider;
    }
}
