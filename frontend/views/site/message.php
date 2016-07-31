<?php
/**
 * Created by PhpStorm.
 * User: zzzzz
 * Date: 2016-08-01
 * Time: 00:12
 */
?>
<div class="alert alert-<?=$type?> alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <h4><?=$title?> </h4>
    <p><?=$content?> </p>
    <p>
        <?= \yii\bootstrap\Html::a('确定', $url, ['class' => 'btn btn-default btn-block']) ?>
    </p>
</div>
