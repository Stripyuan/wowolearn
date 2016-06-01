<?php

namespace frontend\models;

use Yii;

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
    public function rules()
    {
        return [
            [['name', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at', 'parent_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'parent_id' => 'Parent ID',
        ];
    }

    public function getParent(){
        return $this->hasOne(self::className(),['id' => 'parent_id']);
    }
    public function getChild()
    {
        return $this->hasMany(self::className(),['parent_id' => 'id']);
    }

    private $breadcrumb = [];

    /**
     * @param CmsCategory $current
     */
    protected function initBreadcrumb($current = null){
        if($current == null){
            $this->breadcrumb[] = [
                'id'    => $this->id,
                'name'  => $this->name,
            ];
            if($parent = $this->parent){
                $this->initBreadcrumb($parent);
            }
        } else {
            if($parent = $current->parent){
                $this->initBreadcrumb($parent);
            } else {
                $this->breadcrumb[] = [
                    'id'    => $current->id,
                    'name'  => $current->name,
                ];
                return;
            }
        }
    }
    public function getBreadcrumb(){
        $this->initBreadcrumb();
        return array_reverse($this->breadcrumb);
    }
}
