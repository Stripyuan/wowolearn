<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "{{%integral_log}}".
 *
 * @property integer $teacher_id
 * @property string $integral
 * @property integer $created_at
 * @property integer $admin_id
 *
 * @property Teachers $teacher
 */
class IntegralLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%integral_log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['teacher_id', 'integral', 'created_at', 'admin_id'], 'required'],
            [['teacher_id', 'created_at', 'admin_id'], 'integer'],
            [['integral'], 'number'],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teachers::className(), 'targetAttribute' => ['teacher_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'teacher_id' => 'Teacher ID',
            'integral' => 'Integral',
            'created_at' => 'Created At',
            'admin_id' => 'Admin ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teachers::className(), ['id' => 'teacher_id']);
    }
    public function getAdmin()
    {
        return $this->hasOne(Admins::className(), ['id' => 'admin_id']);
    }
    public static function log($teacher,$integral,$admin = false){
        $log = new self();
        $log->admin_id = $admin ? $admin:Yii::$app->user->identity->getId();
        $log->created_at = time();
        $log->integral = $integral;
        $log->teacher_id = $teacher;
        if($log->save())
            return $log;
    }
}
