<?php

use yii\db\Migration;

/**
 * Handles the creation for table `task`.
 */
class m160731_154007_create_task_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('task', [
            'id' => $this->primaryKey(),
            //>>姓名电话地址标题内容创建时间更新时间
            'name' => $this->string(32)->comment('姓名'),
            'phone' => $this->string(32)->comment('电话'),
            'address' => $this->string(255)->comment('地址'),
            'title' => $this->string(255)->comment('标题'),
            'content' => $this->text()->comment('内容'),
            'create_time' => $this->integer()->comment('创建时间'),
            'update_time' => $this->integer()->comment('修改时间'),
            'status' => $this->integer(1)->comment('状态'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('task');
    }
}
