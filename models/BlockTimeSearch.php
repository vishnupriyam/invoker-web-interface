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
    public $course;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'course_id'], 'integer'],
            [['starttime', 'endtime', 'created_time','course'], 'safe'],
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
        $query->joinWith(['course']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['course'] = [
            'asc' => ['course.name' => SORT_ASC],
            'desc' => ['course.name' => SORT_DESC],
        ];

        if (!($this->load($params) && $this->validate())) {
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

        $query->andFilterWhere(['like', 'course.name', $this->course]);
        return $dataProvider;
    }
}
