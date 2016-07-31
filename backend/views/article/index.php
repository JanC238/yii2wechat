<?php
/**
 * Created by PhpStorm.
 * User: zzzzz
 * Date: 2016-07-29
 * Time: 22:56
 */
/*
 *                     <td><?=\yii\bootstrap\Html::img(\yii\helpers\Url::to($item->iamge))?></td>
 */
$this->title = '文章';
?>
<div class="row">
    <div class="col-md-3">
        <div class="list-group" style="margin-top: 35px">
            <a href="#" class="list-group-item disabled">
                菜单
            </a>
            <a href="<?=\yii\helpers\Url::to(['articlecate/index'])?>" class="list-group-item">文章分类管理</a>
            <a href="<?=\yii\helpers\Url::to(['article/index'])?>" class="list-group-item">文章管理</a>
            <a href="#" class="list-group-item">Porta ac consectetur ac</a>
            <a href="#" class="list-group-item">Vestibulum at eros</a>
        </div>
    </div>
    <div class="col-md-9">
        <?= \yii\bootstrap\Html::a('添加文章', ['article/add'], ['class' => 'btn btn-primary pull-right']) ?>
        <h5>文章</h5>
        <table class="table table-bordered">
            <tr>
                <th>id</th>
                <th>标题</th>
                <th>图片</th>
                <th>发布时间</th>
                <th>浏览次数</th>
                <th>操作</th>
            </tr>
            <?php foreach ($models as $item): ?>
                <tr class="tr<?= $item->id ?>">
                    <td><?= $item->id ?></td>
                    <td><?= $item->title ?></td>
                    <td><img src="<?=\yii\helpers\Url::to($item->image,true)?>" height="50" alt=""></td>
                    <td><?=date('Y-m-d H:i:s',$item->create_time)  ?></td>
                    <td><?=$item->view_times ?></td>
                    <td>
                        <?= \yii\helpers\Html::a('修改', ['article/edit', 'id' => $item->id], ['class' => 'btn btn-info']) ?>
                        <?= \yii\helpers\Html::a('删除', 'javascript:;', ['onclick' => "del({$item->id})", 'class' => 'btn btn-danger']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?=\yii\widgets\LinkPager::widget(['pagination'=>$pages])?>
    </div>
</div>
<script>
    function del(id) {
        if (confirm('确认删除？')) {
            $.post("<?=\yii\helpers\Url::to(['article/delete'])?>", {id: id}, function (response) {
                if (response == 'success') {
                    $('.tr' + id).fadeOut();
                } else {
                    alert('删除失败');
                }
            })
        }
    }
</script>

