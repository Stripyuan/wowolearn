<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "{{%virtual_currency_log}}".
 *
 * @property integer $student_id
 * @property string $currency
 * @property integer $created_at
 * @property integer $admin_id
 *
 * @property Students $student
 */
class VirtualCurrencyLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%virtual_currency_log}}';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id', 'currency', 'created_at', 'admin_id'], 'required'],
            [['student_id', 'created_at', 'admin_id'], 'integer'],
            [['currency'], 'number'],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Students::className(), 'targetAttribute' => ['student_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'student_id' => '学生',
            'currency' => '积分',
            'created_at' => '时间',
            'admin_id' => '操作员',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Students::className(), ['id' => 'student_id']);
    }
    public function getAdmin()
    {
        return $this->hasOne(Admins::className(), ['id' => 'admin_id']);
    }
    public static function log($student,$currency,$admin = false){
        $log = new self();
        $log->admin_id = $admin ? $admin:Yii::$app->user->identity->getId();
        $log->created_at = time();
        $log->currency = $currency;
        $log->student_id = $student;
        if($log->save())
            return $log;
    }
}
