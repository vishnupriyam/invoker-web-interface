<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Course;

/**
 * CourseSearch represents the model behind the search form about `app\models\Course`.
 */
class CourseSearch extends Course
{
    public $institute;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'institute_id'], 'integer'],
            [['name','institute'], 'safe'],
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
        $query = Course::find();
        $query->joinWith(['institute']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['institute'] = [
            'asc' => ['institute.name' => SORT_ASC],
            'desc' => ['institute.name' => SORT_DESC],
        ];

        if (!($this->load($params) && $this->validate())) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'institute_id' => $this->institute_id,
            ]);

        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->andFilterWhere(['like', 'institute.name', $this->institute]);

        return $dataProvider;
    }
}
