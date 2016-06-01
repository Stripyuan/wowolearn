<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "{{%focus_map}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $img_url
 * @property string $to_url
 * @property integer $created_at
 * @property integer $updated_at
 */
class FocusMap extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%focus_map}}';
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
            [['title','to_url','img_url'], 'required'],
            ['to_url','url'],
            [['title'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'img_url' => '图片地址',
            'to_url' => '链接地址',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
