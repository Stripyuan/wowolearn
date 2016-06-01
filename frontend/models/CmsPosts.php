<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%cms_posts}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property string $content
 * @property integer $view_times
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $category_id
 * @property string $summary
 * @property integer $is_del
 */
class CmsPosts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cms_posts}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'title', 'content', 'created_at', 'updated_at', 'category_id'], 'required'],
            [['user_id', 'view_times', 'created_at', 'updated_at', 'category_id', 'is_del'], 'integer'],
            [['content'], 'string'],
            [['title', 'summary'], 'string', 'max' => 1024],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'title' => 'Title',
            'content' => 'Content',
            'view_times' => '阅读次数',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'category_id' => 'Category ID',
            'summary' => '摘要',
            'is_del' => 'Is Del',
        ];
    }

    public function getCategory(){
        return $this->hasOne(CmsCategory::className(),['id' => 'category_id']);
    }
}
