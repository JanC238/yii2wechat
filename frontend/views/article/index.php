<?php
/**
 * Created by PhpStorm.
 * User: zzzzz
 * Date: 2016-07-31
 * Time: 23:04
 */
?>
<div class="container-fluid">
    <?php foreach ($articles as $article): ?>
        <div class="row noticeList">
            <a href="<?=\yii\helpers\Url::to(['article/view','id'=>$article->id])?>">
                <div class="col-xs-2">
                    <img class="noticeImg" src="<?= Yii::$app->params['imgUrl'] . $article->image;?>"/>
                </div>
                <div class="col-xs-10">
                    <p class="title"><?= $article->title ?></p>
                    <p class="intro">
                        <?= strip_tags(mb_substr($article->content, 0, 20, 'utf8')); ?>
                        <?php if (mb_strlen($article->content) > 20) {
                            echo '...';
                        } ?>
                    </p>
                    <p class="info">浏览: 199 <span class="pull-right"><?= date('Y-m-d H:i:s', $article->create_time) ?></span></p>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>
