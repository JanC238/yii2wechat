<?php
/**
 * Created by PhpStorm.
 * User: zzzzz
 * Date: 2016-08-01
 * Time: 09:16
 */

namespace frontend\controllers;


use backend\models\Task;
use yii\web\Controller;

class UserController extends Controller
{
    /**
     * 用户信息首页
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * 我的保修信息
     * @return string
     */
    public function actionTask()
    {
        $tasks = Task::findAll(['phone' => '123']);
        return $this->render('task', ['tasks' => $tasks]);
    }
}