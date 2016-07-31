<?php
/**
 * Created by PhpStorm.
 * User: zzzzz
 * Date: 2016-07-29
 * Time: 22:29
 */

namespace backend\controllers;


use backend\models\Article;
use backend\models\Articlecate;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\Request;
use yii\web\UploadedFile;

class ArticleController extends Controller
{
    /**
     * 文章列表
     */
    public function actionIndex()
    {
        $query = Article::find();
        $count = $query->count();
        $pages = new Pagination(['totalCount' => $count, 'pageSize' => 2]);
        $models = $query->limit($pages->limit)->offset($pages->offset)->all();
        return $this->render('index', ['models' => $models, 'pages' => $pages]);
    }

    /**
     * 添加文章
     */
    public function actionAdd()
    {
        $model = new Article();

        $request = new Request();

        if ($request->isPost) {
            $model->load($request->post());
            $model->img = UploadedFile::getInstance($model, 'img');
            if ($model->validate()) {
                $imgUrl = 'uploads/' . time() . rand(100, 999) . '.' . $model->img->extension;
                if ($model->img->saveAs($imgUrl, false)) {
                    $model->image = $imgUrl;
                }
                //>>todo 用户id
                $model->user_id = 1;
                if ($model->save()) {
                    \Yii::$app->session->setFlash('success', '添加成功');
                }
                return $this->redirect(['article/index']);
            }
        }
        $cates = Articlecate::find()->all();
//        $options = array();
//        foreach ($cates as $cate) {
//            $options[$cate->id] = $cate->name;
//        }
        $options = ArrayHelper::map($cates, 'id', 'name');
        return $this->render('add', ['model' => $model, 'options' => $options]);
    }

    /**
     * 修改文章
     */
    public function actionEdit($id)
    {
        $model = Article::findOne($id);
        if (!$model) {
            throw new HttpException(404, '文章未找到或已被删除');
        }
        $request = new Request();

        if ($request->isPost) {
            $model->load($request->post());
            $model->img = UploadedFile::getInstance($model, 'img');
            if ($model->validate()) {
                if ($model->img) {
                    $imgUrl = 'uploads/' . time() . rand(100, 999) . '.' . $model->img->extension;
                    if ($model->img->saveAs($imgUrl, false)) {
                        $model->image = $imgUrl;
                    }
                }
                //>>todo 用户id
                $model->user_id = 1;
                if ($model->save()) {
                    \Yii::$app->session->setFlash('success', '添加成功');
                }
                return $this->redirect(['article/index']);
            }
        }
        $cates = Articlecate::find()->all();
//        $options = array();
//        foreach ($cates as $cate) {
//            $options[$cate->id] = $cate->name;
//        }
        $options = ArrayHelper::map($cates, 'id', 'name');
        return $this->render('add', ['model' => $model, 'options' => $options]);
    }

    /**
     * 删除文章
     */
    public function actionDelete()
    {
        $id = \Yii::$app->request->post('id');
        $model = Article::findOne($id);
//        if ($model == null) {
//            throw new HttpException(404, '未找到该分类或已被删除');
//            exit;
//        }
        $res = $model->delete();
        if ($res) {
            echo 'success';
        } else {
            echo 'fail';
        }
    }
}