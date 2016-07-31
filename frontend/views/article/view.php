<?php
/**
 * Created by PhpStorm.
 * User: zzzzz
 * Date: 2016-07-31
 * Time: 23:25
 */
?>
<div class="container-fluid">
    <div class="blank"></div>
    <h3 class="noticeDetailTitle"><strong><?=$article->title?></strong></h3>
    <div class="noticeDetailInfo">发布者:<?=$article->user_id?></div>
    <div class="noticeDetailInfo">发布时间：<?=date('Y-m-d H:i:s',$article->create_time)?></div>
    <div class="noticeDetailContent">
        <?=$article->content?>
    </div>
</div>

