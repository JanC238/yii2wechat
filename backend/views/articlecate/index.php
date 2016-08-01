<?php
/**
 * Created by PhpStorm.
 * User: zzzzz
 * Date: 2016-07-29
 * Time: 22:56
 */
$this->title = '文章分类';
?>
<div class="row">
    <div class="col-md-3">
        <div class="list-group" style="margin-top: 35px">
            <a href="#" class="list-group-item disabled">
                菜单
            </a>
            <a href="<?=\yii\helpers\Url::to(['articlecate/index'])?>" class="list-group-item">文章分类管理</a>
            <a href="<?=\yii\helpers\Url::to(['article/index'])?>" class="list-group-item">文章管理</a>
            <a href="<?=\yii\helpers\Url::to(['salerental/index'])?>" class="list-group-item">租售信息</a>
            <a href="#" class="list-group-item">Vestibulum at eros</a>
        </div>
    </div>
    <div class="col-md-9">
        <?= \yii\bootstrap\Html::a('添加分类', ['articlecate/add'], ['class' => 'btn btn-primary pull-right']) ?>
        <h5>文章分类</h5>
        <table class="table table-bordered">
            <tr>
                <th>id</th>
                <th>分类名</th>
                <th>操作</th>
            </tr>
            <?php foreach ($model as $item): ?>
                <tr class="tr<?= $item->id ?>">
                    <td><?= $item->id ?></td>
                    <td><?= $item->name; ?></td>
                    <td>
                        <?= \yii\helpers\Html::a('修改', ['articlecate/edit', 'id' => $item->id], ['class' => 'btn btn-info']) ?>
                        <?= \yii\helpers\Html::a('删除', 'javascript:;', ['onclick' => "del({$item->id})", 'class' => 'btn btn-danger']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<script>
    function del(id) {
        if (confirm('确认删除？')) {
            $.post("<?=\yii\helpers\Url::to(['articlecate/delete'])?>", {id: id}, function (response) {
                if (response == 'success') {
                    $('.tr' + id).fadeOut();
                } else {
                    alert('删除失败');
                }
            })
        }
    }
</script>

