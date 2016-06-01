<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "{{%online_questions}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $user_id
 * @property integer $user_type
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property QuestionAnswers[] $questionAnswers
 */
class OnlineQuestions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%online_questions}}';
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
            [['title', 'content', 'user_id', 'created_at'], 'required'],
            [['content'], 'string'],
            [['user_id', 'user_type', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'user_id' => 'User ID',
            'user_type' => 'User Type',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestionAnswers()
    {
        return $this->hasMany(QuestionAnswers::className(), ['question_id' => 'id']);
    }
}
