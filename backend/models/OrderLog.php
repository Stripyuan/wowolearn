<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%order_log}}".
 *
 * @property integer $id
 * @property integer $created_at
 * @property string $content
 * @property string $admin
 * @property string $action
 */
class OrderLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order_log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at'], 'integer'],
            [['content'], 'string'],
            [['admin', 'action'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'content' => 'Content',
            'admin' => 'Admin',
            'action' => 'Action',
        ];
    }

    public static function log($content,$action,$admin = false){
        $log = new self();
        $log->content = is_string($content)?$content:serialize($content);
        $log->action  = $action;
        $log->admin   = !$admin ? Yii::$app->user->identity->realname:$admin;
        $log->created_at = time();
        if($log->save())
            return $log;
        else
            return false;
    }
}
