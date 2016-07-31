<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string $title
 * @property string $content
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $status
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'content', 'address', 'title'], 'required'],
            [['content'], 'string'],
            [['create_time', 'update_time', 'status'], 'integer'],
            [['name', 'phone'], 'string', 'max' => 32],
            [['address', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '姓名',
            'phone' => '电话',
            'address' => '地址',
            'title' => '标题',
            'content' => '内容',
            'create_time' => '创建时间',
            'update_time' => '修改时间',
            'status' => '状态',
        ];
    }

    public function beforeSave($insert)
    {
        if ($this->isNewRecord) {
            $this->update_time = time();
        }
        $this->create_time = time();
        return parent::beforeSave($insert);
    }
}
