<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "income".
 *
 * @property string $date_time
 * @property string $income
 * @property string $type
 */
class Income extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'income';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_time'], 'required'],
            [['income'], 'number'],
            [['date_time'], 'string', 'max' => 8],
            [['type'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'date_time' => 'Date Time',
            'income' => 'Income',
            'type' => 'Type',
        ];
    }

    public function getType0(){
        return OnlineClass::CLASS_TYPE_LABELS[$this->type];
    }
}
