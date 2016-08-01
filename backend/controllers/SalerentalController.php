<?php
/**
 * Created by PhpStorm.
 * User: zzzzz
 * Date: 2016-08-01
 * Time: 11:51
 */

namespace backend\controllers;


use backend\models\SaleRental;
use yii\web\Controller;
use yii\web\Request;
use yii\web\UploadedFile;

class SalerentalController extends Controller
{
    public function actionIndex()
    {

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
}