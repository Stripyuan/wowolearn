<?php

namespace backend\models;

use jasmine2\dwz\helpers\ArrayHelper;
use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "{{%cms_category}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $parent_id
 */
class CmsCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cms_category}}';
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
            [['name',], 'required'],
            [['name'], 'unique'],
            [['parent_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '分类名',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'parent_id' => '父类',
        ];
    }

    public function getParent(){
        return $this->hasOne(self::className(),['id' => 'parent_id']);
    }

    public function getChild()
    {
        return $this->hasMany(self::className(),['parent_id' => 'id']);
    }


}
