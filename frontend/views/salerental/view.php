<?php
/**
 * Created by PhpStorm.
 * User: zzzzz
 * Date: 2016-08-01
 * Time: 18:23
 */
?>
<div class="container-fluid">
    <div class="blank"></div>
    <h3 class="noticeDetailTitle"><strong><?=$model->name?></strong></h3>
    <div class="noticeDetailInfo">发布者<?=$model->user_id?></div>
    <div class="noticeDetailInfo">发布时间：<?=date('Y-m-d H:i:s',$model->create_time)?></div>
    <div class="noticeDetailInfo">联系电话：undo</div>
    <h4 class="text-danger">价格:<?=$model->price?>元/月</h4>
    <div class="noticeDetailContent">
        <img src="<?=Yii::$app->params['imgUrl'].$model->image?>" />
    </div>
</div>
</div>

