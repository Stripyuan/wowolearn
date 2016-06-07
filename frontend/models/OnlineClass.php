<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%online_class}}".
 *
 * @property integer $id
 * @property string $class_name
 * @property string $class_code
 * @property string $class_img
 * @property string $class_summary
 * @property integer $class_time
 * @property string $class_category
 * @property string $class_subject
 * @property string $online_time
 * @property string $price
 * @property string $price_now
 * @property string $teaching_plan
 * @property integer $like_times
 * @property integer $class_type
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $teacher_id
 * @property integer $in_times
 * @property string $content
 * @property string $integral
 * @property integer $status
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

    const STATUS_OPEN   = 1;
    const STATUS_CLOSE  = 2;
    const STATUS_DONE  = 3;
    const STATUS_LABELS = [
        self::STATUS_OPEN       => '审核中',
        self::STATUS_DONE       => '审核通过',
        self::STATUS_CLOSE      => '审核未通过',
    ];
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
    public function rules()
    {
        return [
            [['class_name', 'class_code', 'class_img', 'class_summary', 'class_category', 'class_subject', 'online_time', 'created_at', 'updated_at', 'teacher_id'], 'required'],
            [['class_time', 'like_times', 'class_type', 'created_at', 'updated_at', 'teacher_id', 'in_times', 'integral', 'status'], 'integer'],
            [['price', 'price_now'], 'number'],
            [['content'], 'string'],
            [['class_name', 'class_img', 'teaching_plan'], 'string', 'max' => 255],
            [['class_code', 'online_time'], 'string', 'max' => 32],
            [['class_summary'], 'string', 'max' => 1024],
            [['class_category'], 'string', 'max' => 11],
            [['class_subject'], 'string', 'max' => 64],
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
            'class_name' => 'Class Name',
            'class_code' => 'Class Code',
            'class_img' => 'Class Img',
            'class_summary' => 'Class Summary',
            'class_time' => '课时',
            'class_category' => '年级',
            'class_subject' => 'Class Subject',
            'online_time' => 'Online Time',
            'price' => '课程价格',
            'price_now' => '现在的价格',
            'teaching_plan' => 'Teaching Plan',
            'like_times' => '关注人数',
            'class_type' => '课程类型：作业直播，文化课程，艺术课程',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'teacher_id' => 'Teacher ID',
            'in_times' => '报名人数',
            'content' => 'Content',
            'integral' => 'Integral',
            'status' => 'Status',
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
        return $this->hasMany(Users::className(), ['id' => 'student_id'])->viaTable('{{%attention_class}}', ['class_id' => 'id']);
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
        return $this->hasOne(Users::className(), ['id' => 'teacher_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOnlineClassCommonts()
    {
        return $this->hasMany(OnlineClassCommonts::className(), ['class_id' => 'id']);
    }

    public static function findByClassCode($code){
        return static::find()->where(['class_code' => $code])->one();
    }

    /**
     * 判断当前用户是否关注了此课程
     */
    public function getCurrentUserLike(){

    }
}
