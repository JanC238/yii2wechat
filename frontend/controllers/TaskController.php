<?php
/**
 * Created by PhpStorm.
 * User: zzzzz
 * Date: 2016-07-31
 * Time: 23:57
 */

namespace frontend\controllers;


use backend\models\Task;
use yii\web\Controller;
use yii\web\Request;

class TaskController extends Controller
{
    public function actionAdd()
    {
        $model = new Task();
        $request = new Request();
        if ($request->isPost) {
            $data = $request->post();
            $model->load($data);
            $res = $model->validate();
            if ($res) {
                $model->status = 0;
                $model->save();
                $cond = [
                    'type' => 'success',
                    'title' => '保修信息提交成功',
                    'content' => '点击确定返回首页',
                    'url' => ['site/index']
                ];
                return $this->render('../site/message', $cond);
            }
        }
        return $this->render('add', ['model' => $model]);
    }
}