<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "{{%chapters}}".
 *
 * @property integer $id
 * @property integer $class_id
 * @property integer $online_time
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $chapter_name
 * @property string $chapter_summary
 *
 * @property OnlineClass $class
 */
class Chapters extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%chapters}}';
    }
    /**
    * @inheritdoc
    */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class_id', 'online_time', 'chapter_name', 'chapter_summary'], 'required'],
            [['class_id'], 'integer'],
            [['chapter_name'], 'string', 'max' => 255],
            [['chapter_summary'], 'string', 'max' => 1024],
            [['class_id'], 'exist', 'skipOnError' => true, 'targetClass' => OnlineClass::className(), 'targetAttribute' => ['class_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'class_id' => '课程名称',
            'class' => '课程名称',
            'online_time' => '直播时间',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'chapter_name' => '章节名称',
            'chapter_summary' => '摘要',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClass()
    {
        return $this->hasOne(OnlineClass::className(), ['id' => 'class_id']);
    }
}
