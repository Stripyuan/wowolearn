<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "{{%links}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $url
 * @property integer $created_at
 * @property integer $updated_at
 */
class Links extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%links}}';
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
            [['title', 'url'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['url'], 'string', 'max' => 1024],
            [['url'], 'url',],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'title' => '标题',
            'url' => 'URL地址',
            'created_at' => '增加时间',
            'updated_at' => '更新时间',
        ];
    }
}
