<?php
/**
 * Created by PhpStorm.
 * User: zzzzz
 * Date: 2016-08-01
 * Time: 09:20
 */
?>
<div class="container">
    <div class="blank"></div>
    <div class="row">
        <div class="col-xs-3">
            <img src="../image/5.png" width="60" height="60"/>
        </div>
        <div class="col-xs-9">
            ZhangSan<br/>
            北大花园小区<br/>
            积分:<span class="text-danger">100</span>
        </div>
    </div>
    <div class="blank"></div>
    <div class="row text-center myLabel">
        <div class="col-xs-4 label-danger"><a href="#"><span class="iconfont">&#xe60b;</span>我的资料</a></div>
        <div class="col-xs-4 label-success"><a href="<?= \yii\helpers\Url::to(['user/task']) ?>"><span class="iconfont">&#xe609;</span>我的报修</a>
        </div>
        <div class="col-xs-4 label-primary"><a href="#"><span class="iconfont">&#xe606;</span>报名的活动</a></div>
    </div>
    <div class="blank"></div>
    <div>
        <ul class="list-group fuwuList">
            <li class="list-group-item"><a href="diaochawenjuan.html" class="text-danger"><span class="iconfont">&#xe60a;</span>我的缴费账单</a>
            </li>
            <li class="list-group-item"><a href="yezhurenzheng.html" class="text-info"><span
                        class="iconfont">&#xe608;</span>我的物业通知</a></li>
            <li class="list-group-item"><a href="yezhurenzheng.html" class="text-info"><span
                        class="iconfont">&#xe607;</span>我的水电气使用</a></li>
        </ul>
    </div>
</div>
</div>
