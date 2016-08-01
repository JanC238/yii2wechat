<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sale_rental".
 *
 * @property integer $id
 * @property integer $type
 * @property string $name
 * @property string $intro
 * @property string $content
 * @property string $image
 * @property integer $create_time
 * @property integer $user_id
 * @property string $price
 */
class SaleRental extends \yii\db\ActiveRecord
{
    public $arr = [
        1 => '租',
        2 => '售',
    ];
    public $img;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sale_rental';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'create_time', 'user_id'], 'integer', 'skipOnEmpty' => true,],
            ['intro', 'string', 'skipOnEmpty' => true],
            [['price'], 'number'],
            [['name', 'image'], 'string', 'max' => 255],
            ['img', 'file', 'extensions' => ['jpg', 'png', 'gif'], 'skipOnEmpty' => true,],
            ['content', 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => '租/售',
            'name' => '名称',
            'intro' => '简介',
            'content' => '详细信息',
            'image' => '图片',
            'create_time' => '发布时间',
            'user_id' => '发布者',
            'price' => '价格',
        ];
    }

    public function beforeSave($insert)
    {
        if ($this->isNewRecord) {
            $this->create_time = time();
        }
        return parent::beforeSave($insert);
    }
}
