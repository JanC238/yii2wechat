<?php

use yii\db\Migration;

/**
 * Handles the creation for table `article`.
 */
class m160729_143409_create_article_table extends Migration
{
    /**
     * 文章表
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('article', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->comment('标题'),
            'content' => $this->text()->comment('内容'),
            'create_time' => $this->integer()->comment('发布时间'),
            'user_id' => $this->integer()->comment('作者'),
            'image' => $this->string(255)->comment('图片'),
            'view_times' => $this->integer()->comment('浏览次数'),
            'cate_id' => $this->integer()->comment('分类id'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('article');
    }
}
