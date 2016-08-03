<?php
/**
 * Created by PhpStorm.
 * User: zzzzz
 * Date: 2016-08-01
 * Time: 11:51
 */

namespace backend\controllers;


use backend\models\SaleRental;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\Request;
use yii\web\UploadedFile;

class SalerentalController extends Controller
{
    /**
     * 租售信息列表
     * @return string
     */
    public function actionIndex()
    {
        $query = SaleRental::find();
        $count = $query->count();
        $pages = new Pagination(['totalCount' => $count, 'pageSize' => 2]);
        $models = $query->limit($pages->limit)->offset($pages->offset)->all();
        return $this->render('index', ['models' => $models, 'pages' => $pages]);
    }

    /**
     * 添加租售信息
     * @return string|\yii\web\Response
     */
    public function actionAdd()
    {
        $request = new Request();
        $model = new SaleRental();
        if ($request->isPost) {
            $data = $request->post();

            $model->load($data);
            $res = $model->validate();
            $model->img = UploadedFile::getInstance($model, 'img');
            if ($res) {
//                echo "<pre/>";
//                var_dump($model->attributes);
//                exit;
                //todo user_id
                $model->user_id = 1;
                if ($model->img) {
                    $imgUrl = 'uploads/' . time() . rand(100, 999) . '.' . $model->img->extension;
                    if ($model->img->saveAs($imgUrl, false)) {
                        $model->image = $imgUrl;
                    }
                }

                $model->save(false);

                \Yii::$app->session->setFlash('success', '添加成功');
                return $this->redirect(['salerental/index']);
            } else {
                var_dump($model->getErrors());
            }
        }
        return $this->render('add', ['model' => $model]);
    }

    /**
     * 修改租售信息
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionEdit($id)
    {
        $model = SaleRental::findOne($id);
        $request = new Request();
        if ($request->isPost) {
            $data = $request->post();
            $model->load($data);
            $model->img = UploadedFile::getInstance($model, 'img');
            if ($model->validate()) {
                if ($model->img) {
                    $imgUrl = 'uploads/' . time() . rand(100, 999) . '.' . $model->img->extension;
                    if ($model->img->saveAs($imgUrl, false)) {
                        $model->image = $imgUrl;
                    }
                }
                if ($model->save()) {
                    \Yii::$app->session->setFlash('success', '修改成功');
                    return $this->redirect(['salerental/index']);
                } else {
                    \Yii::$app->session->setFlash('error', '修改出错了');
                    return $this->redirect(['salerental/index']);
                }
            } else {
                $url = \Yii::$app->request->getReferrer();
                \Yii::$app->session->setFlash('error', '数据错误');
                return $this->redirect($url);
            }
        }
        return $this->render('add', ['model' => $model]);
    }

    /**
     * 删除租售信息
     */
    public function actionDelete()
    {
        $id = \Yii::$app->request->post('id');
        $model = SaleRental::findOne($id);
        if ($model) {
            $res = $model->delete();
            if ($res) {
                echo 'success';
            } else {
                echo 'error';
            }
        } else {
            echo 'error';
        }
    }
}