<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use backend\models\Admins;
/**
 * This is the model class for table "{{%cms_posts}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property string $content
 * @property string $summary
 * @property integer $view_times
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $category_id
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
            [['user_id', 'title', 'content','category_id'], 'required'],
            [['user_id', 'view_times', 'category_id'], 'integer'],
            [['content','summary'], 'string'],
            [['title'], 'string', 'max' => 1024],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => '用户',
            'title' => '标题',
            'summary' => '摘要',
            'content' => '内容',
            'view_times' => '阅读次数',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'category_id' => '分类',
        ];
    }


    public function beforeValidate()
    {
        $this->user_id = Yii::$app->user->id;
        return parent::beforeValidate();
    }

    public function delete()
    {
        $this->is_del = 1;
        return $this->save();
    }

    public function getUser()
    {
        return $this->hasOne(Admins::className(),['id' => 'user_id']);
    }

    public function getCategory()
    {
        return $this->hasOne(CmsCategory::className(),['id' => 'category_id']);
    }
}
