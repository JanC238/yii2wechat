<?php

use yii\db\Migration;

/**
 * Handles the creation for table `articlecate`.
 */
class m160729_143758_create_articleCate_table extends Migration
{
    /**
     * 文章分类表
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('articlecate', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->comment('分类名称'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('articlecate');
    }
}
