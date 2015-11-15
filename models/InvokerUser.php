<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $mobile_id
 * @property string $phone_number
 * @property string $access_time
 * @property string $reg_token
 *
 * @property UserHasCourse[] $userHasCourses
 * @property Course[] $courses
 */
class InvokerUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mobile_id', 'phone_number'], 'required'],
            [['access_time'], 'safe'],
            [['mobile_id'], 'string', 'max' => 60],
            [['phone_number'], 'string', 'max' => 12],
            [['reg_token'], 'string', 'max' => 300],
            [['mobile_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mobile_id' => 'Mobile ID',
            'phone_number' => 'Phone Number',
            'access_time' => 'Access Time',
            'reg_token' => 'Reg Token',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserHasCourses()
    {
        return $this->hasMany(UserHasCourse::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['id' => 'course_id'])->viaTable('user_has_course', ['user_id' => 'id']);
    }
}
