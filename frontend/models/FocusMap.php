<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "{{%focus_map}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $img_url
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $to_url
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
            [['title', 'img_url', 'to_url'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 45],
            [['img_url', 'to_url'], 'string', 'max' => 255],
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
            'img_url' => '上传图片',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'to_url' => 'To Url',
        ];
    }
}
