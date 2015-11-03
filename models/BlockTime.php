<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "block_time".
 *
 * @property integer $id
 * @property string $starttime
 * @property string $endtime
 * @property string $created_time
 * @property integer $course_id
 *
 * @property Course $course
 */
class BlockTime extends \yii\db\ActiveRecord
{
    public $institute;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'block_time';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['starttime', 'endtime', 'course_id'], 'required'],
            [['starttime', 'endtime', 'created_time'], 'safe'],
            [['course_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'starttime' => 'Starttime',
            'endtime' => 'Endtime',
            'created_time' => 'Created Time',
            'course_id' => 'Course ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'course_id']);
    }

    public function getInstitute(){
        return $this->hasOne(Institute::className(), ['id' => $this->getCourse->institute_id]);
    }
}
