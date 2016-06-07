<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%chapters}}".
 *
 * @property integer $id
 * @property integer $class_id
 * @property string $online_time
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
    public function rules()
    {
        return [
            [['class_id', 'online_time', 'created_at', 'updated_at', 'chapter_name', 'chapter_summary'], 'required'],
            [['class_id', 'created_at', 'updated_at'], 'integer'],
            [['online_time'], 'string', 'max' => 32],
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
            'class_id' => 'Class ID',
            'online_time' => 'Online Time',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'chapter_name' => 'Chapter Name',
            'chapter_summary' => 'Chapter Summary',
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
