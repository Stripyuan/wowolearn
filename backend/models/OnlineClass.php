<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "{{%online_class}}".
 *
 * @property integer $id
 * @property string $class_name
 * @property string $class_code
 * @property string $class_img
 * @property string $class_summary
 * @property integer $class_time
 * @property integer $class_category
 * @property integer $class_subject
 * @property integer $online_time
 * @property string $price
 * @property string $price_now
 * @property string $teaching_plan
 * @property integer $like_times
 * @property integer $class_type
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $teacher_id
 * @property integer $in_times
 * @property integer $integral
 * @property string $content
 *
 * @property AttentionClass[] $attentionClasses
 * @property Students[] $students
 * @property Chapters[] $chapters
 * @property Teachers $teacher
 * @property OnlineClassCommonts[] $onlineClassCommonts
 */
class OnlineClass extends \yii\db\ActiveRecord
{
    const CLASS_TYPE_HOMEWORK   = 1;
    const CLASS_TYPE_CULTURES   = 2;
    const CLASS_TYPE_ARTS       = 3;

    const CLASS_TYPE_LABELS= [
        self::CLASS_TYPE_HOMEWORK   => '作业直播',
        self::CLASS_TYPE_CULTURES   => '文化直播',
        self::CLASS_TYPE_ARTS       => '艺术直播',
    ];
    // 课程年级
    const CLASS_CATEGORY_JUNIOR = 'junior';
    const CLASS_CATEGORY_SENIOR = 'senior';
    const CLASS_CATEGORY_PRIMARY = 'primary';
    // 艺术类型
    const CLASS_ARTS_MUSIC	 = 'music';
    const CLASS_ARTS_ART	 = 'art';
    const CLASS_ARTS_PHYSICAL_EDUCATION	 = 'physical_education';

    const CLASS_ARTS_LABELS  =[
        self::CLASS_ARTS_MUSIC	 => '音乐',
        self::CLASS_ARTS_ART	 => '美术',
        self::CLASS_ARTS_PHYSICAL_EDUCATION	 => '体育',
    ];
    const CLASS_CATEGORY_LABELS= [
        'junior'    => '初中',
        'senior'    => '高中',
        'primary'    => '小学',
    ];
    // 课程学科
    const CLASS_SUBJECT_CHINESE	= 'chinese';
    const CLASS_SUBJECT_MATHEMATICS	= 'mathematics';
    const CLASS_SUBJECT_ENGLISH	= 'english';
    const CLASS_SUBJECT_POLITICAL	= 'political';
    const CLASS_SUBJECT_PHYSICAL	= 'physical';
    const CLASS_SUBJECT_CHEMISTRY	= 'chemistry';
    const CLASS_SUBJECT_BIOLOGICAL	= 'biological';
    const CLASS_SUBJECT_HISTORY	= 'history';
    const CLASS_SUBJECT_GEOGRAPHY	= 'geography';

    const CLASS_SUBJECT_LABELS= [
        'chinese'	=> '语文',
        'mathematics'	=> '数学',
        'english'	=> '英语',
        'political'	=> '政治',
        'physical'	=> '物理',
        'chemistry'	=> '化学',
        'biological'	=> '生物',
        'history'	=> '历史',
        'geography'	=> '地理',
    ];


    public function getClassCategoryLabels()
    {
        return self::CLASS_CATEGORY_LABELS[$this->class_category];
    }
    public function getClassSubjectLabels()
    {
        $labels = array_merge(self::CLASS_ARTS_LABELS,self::CLASS_SUBJECT_LABELS);
        return $labels[$this->class_subject];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%online_class}}';
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
            [['integral','class_name', 'class_code', 'class_img', 'class_summary', 'class_category', 'class_subject', 'online_time',
                'teacher_id','price', 'price_now','content','class_time'], 'required'],
            [['class_time', 'integral','like_times', 'class_type', 'created_at', 'updated_at', 'teacher_id', 'in_times'], 'integer'],
            [['price', 'price_now'], 'number'],
            [['class_name', 'class_img', 'teaching_plan'], 'string', 'max' => 255],
            [['class_code'], 'string', 'max' => 32],
            [['class_code'], 'jasmine2\dwz\validators\CreditCardValidator'],
            [['class_summary'], 'string', 'max' => 1024],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teachers::className(), 'targetAttribute' => ['teacher_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'class_name' => '课程名称',
            'class_code' => '课程代码',
            'class_img' => '课程图片',
            'class_summary' => '课程摘要',
            'class_time' => '课时',
            'class_category' => '课程年级',
            'classCategoryLabels' => '课程年级',
            'class_subject' => '课程学科',
            'classSubjectLabels' => '课程学科',
            'online_time' => '直播时间',
            'price' => '原价',
            'price_now' => '售价',
            'teaching_plan' => '教案',
            'like_times' => '关注人数',
            'class_type' => '课程类型',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'teacher_id' => '主讲老师',
            'teacher' => '主讲老师',
            'in_times' => '报名人数',
            'content' => '详细介绍',
            'integral'	=> '积分',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttentionClasses()
    {
        return $this->hasMany(AttentionClass::className(), ['class_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Students::className(), ['id' => 'student_id'])->viaTable('{{%attention_class}}', ['class_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChapters()
    {
        return $this->hasMany(Chapters::className(), ['class_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teachers::className(), ['id' => 'teacher_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOnlineClassCommonts()
    {
        return $this->hasMany(OnlineClassCommonts::className(), ['class_id' => 'id']);
    }
}
