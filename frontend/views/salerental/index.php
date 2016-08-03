<?php
/**
 * Created by PhpStorm.
 * User: zzzzz
 * Date: 2016-08-01
 * Time: 18:02
 */
?>
<div class="container-fluid">
    <div class="blank"></div>
    <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
        <ul id="myTabs" class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">租</a></li>
            <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">售</a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                <p class="text-danger">免费提供小区内的租房信息</p>
                <div class="row">
                    <?php foreach ($models as $model): if ($model->type == 1):?>
                    <div class="col-xs-6 col-md-4">
                        <div class="thumbnail">
                            <img src="<?=Yii::$app->params['imgUrl'].$model->image?>" style="height: 200px;width: 400px" alt="...">
                            <div class="caption">
                                <h4><?=$model->name?></h4>
                                <p class="zushouInfo"><?=$model->intro?></p>
                                <p class="text-danger"><?=$model->price?>元/月</p>
                                <p><a href="<?=\yii\helpers\Url::to(['salerental/view','id'=>$model->id])?>" class="btn btn-danger zushouBtn">详细信息</a> </p>
                            </div>
                        </div>
                    </div>
                    <?php endif; endforeach;?>
                </div>

            </div>
            <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
                <div class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                    <p class="text-danger">免费提供小区内的二手房信息</p>
                    <div class="row">
                        <?php foreach ($models as $model): if ($model->type == 2):?>
                            <div class="col-xs-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="<?=Yii::$app->params['imgUrl'].$model->image?>" style="height: 200px;width: 400px" alt="...">
                                    <div class="caption">
                                        <h4><?=$model->name?></h4>
                                        <p class="zushouInfo"><?=$model->intro?></p>
                                        <p class="text-danger"><?=$model->price?>元/月</p>
                                        <p><a href="<?=\yii\helpers\Url::to(['salerental/view','id'=>$model->id])?>" class="btn btn-danger zushouBtn">详细信息</a> </p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; endforeach;?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
