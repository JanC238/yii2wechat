<?php
/**
 * Created by PhpStorm.
 * User: zzzzz
 * Date: 2016-07-30
 * Time: 00:35
 */
\backend\assets\UmeditorAsset::register($this);
$form = \yii\bootstrap\ActiveForm::begin();
echo $form->field($model, 'cate_id')->dropDownList($options);
echo $form->field($model, 'title')->textInput();
echo $form->field($model, 'content')->textarea(['style'=>'height:200px;']);
echo $form->field($model, 'img')->fileInput();
if (!$model->isNewRecord) {
    echo '<img src="'.\yii\helpers\Url::to($model->image,true).'" alt="" height="50"><br/>';
}
echo \yii\bootstrap\Html::submitButton($model->isNewRecord ? '添加' : '修改', ['class' => 'btn btn-info']);
\yii\bootstrap\ActiveForm::end();
$this->beginBlock('js');
?>
//article-content是输入框的id
window.um = UM.getEditor('article-content', {
/* 传入配置参数,可配参数列表看umeditor.config.js */
//toolbar: ['undo redo | bold italic underline']
});
<?php
$this->endBlock();
$this->registerJs($this->blocks['js']);
?>
