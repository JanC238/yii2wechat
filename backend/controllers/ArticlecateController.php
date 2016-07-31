<?php
/**
 * Created by PhpStorm.
 * User: zzzzz
 * Date: 2016-07-29
 * Time: 22:53
 */

namespace backend\controllers;


use backend\models\Articlecate;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\Request;

class ArticlecateController extends Controller
{
    /**
     * 文章分类列表
     */
    public function actionIndex()
    {
        $model = Articlecate::find()->all();
        return $this->render('index', ['model' => $model]);
    }

    /**
     * 添加文章分类
     */
    public function actionAdd()
    {
        $request = new Request();
        $model = new Articlecate();
        if ($request->isPost) {
            $data = $request->post();
            $model->load($data);
            if ($model->validate()) {
                $res = $model->save();
                if ($res) {
                    \Yii::$app->session->setFlash('success', '添加成功');
                    return $this->redirect(['articlecate/index']);
                }
            }
        }
        return $this->render('add',['model'=>$model]);
    }

    /**
     * 修改文章分类
     */
    public function actionEdit($id)
    {
        $request = new Request();
        $model = Articlecate::findOne($id);
        if ($request->isPost) {
            $data = $request->post();
            $model->load($data);
            if ($model->validate()) {
                $res = $model->save();
                if ($res) {
                    \Yii::$app->session->setFlash('success', '修改成功');
                    return $this->redirect(['articlecate/index']);
                }
            }
        }
        return $this->render('add',['model'=>$model]);
    }

    /**
     * 删除文章分类
     */
    public function actionDelete()
    {
        $id = \Yii::$app->request->post('id');
        $model = Articlecate::findOne($id);
        if ($model == null) {
            throw new HttpException(404, '未找到该分类或已被删除');
            exit;
        }
        $res = $model->delete();
        if ($res) {
            echo 'success';
        } else {
            echo 'fail';
        }
    }

}