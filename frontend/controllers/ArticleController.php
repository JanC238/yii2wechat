<?php
/**
 * Created by PhpStorm.
 * User: zzzzz
 * Date: 2016-07-31
 * Time: 23:02
 */

namespace frontend\controllers;


use backend\models\Article;
use yii\web\Controller;

class ArticleController extends Controller
{
    /**
     * 文章列表
     * @param $cate_id
     * @return string
     */
    public function actionIndex($cate_id)
    {
        $articles = Article::findAll(['cate_id' => $cate_id]);
        return $this->render('index', ['articles' => $articles]);
    }

    /**
     * 文章详情
     * @param $id
     * @return string
     */
    public function actionView($id)
    {
        $article = Article::findOne($id);
        return $this->render('view', ['article' => $article]);
    }
}