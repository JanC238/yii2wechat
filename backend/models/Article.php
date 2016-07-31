<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $create_time
 * @property integer $user_id
 * @property string $image
 * @property integer $view_times
 * @property integer $cate_id
 */
class Article extends \yii\db\ActiveRecord
{
    public $img;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cate_id', 'title', 'content'], 'required'],
            [['content'], 'string'],
            [['create_time', 'user_id', 'view_times', 'cate_id'], 'integer'],
            [['title', 'image'], 'string', 'max' => 255],
            ['img', 'file', 'extensions' => ['jpg', 'png', 'gif'], 'skipOnEmpty' => true]
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
            'content' => '内容',
            'create_time' => '发布时间',
            'user_id' => '作者',
            'image' => '图片',
            'view_times' => '浏览次数',
            'cate_id' => '分类id',
            'img' => '上传图片'
        ];
    }

    public function beforeSave($insert)
    {
        if ($this->isNewRecord) {
            $this->create_time = time();
            $this->view_times = 0;
        }
        return parent::beforeSave($insert);
    }
}
