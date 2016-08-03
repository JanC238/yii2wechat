<?php
/**
 * Created by PhpStorm.
 * User: zzzzz
 * Date: 2016-08-01
 * Time: 18:01
 */

namespace frontend\controllers;


use backend\models\SaleRental;
use yii\web\Controller;
use yii\web\HttpException;

class SalerentalController extends Controller
{
    /**
     * 租售信息列表
     * @return string
     */
    public function actionIndex()
    {
        $models = SaleRental::find()->all();
        return $this->render('index', ['models' => $models]);
    }

    /**
     * 租售信息详情
     * @param $id
     * @return string
     * @throws HttpException
     */
    public function actionView($id)
    {
        $model = SaleRental::findOne($id);
        if (!$model) {
            throw new HttpException(404, '该租售信息不存在或已过期');
        }
        return $this->render('view', ['model' => $model]);
    }
}