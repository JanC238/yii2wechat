<?php

use yii\db\Migration;

/**
 * Handles the creation for table `sale_rental`.
 */
class m160801_034432_create_sale_rental_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('sale_rental', [
            'id' => $this->primaryKey(),
            'type' => $this->integer(1)->comment('租/售'),
            'name' => $this->string(255)->comment('名称'),
            'intro' => $this->text()->comment('简介'),
            'content' => $this->text()->comment('详细信息'),
            'image' => $this->string(255)->comment('图片'),
            'create_time' => $this->integer()->comment('发布时间'),
            'user_id' => $this->integer()->comment('发布者'),
            'price' => $this->decimal()->comment('价格')
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('sale_rental');
    }
}
