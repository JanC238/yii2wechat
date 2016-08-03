<?php
/**
 * Created by PhpStorm.
 * User: zzzzz
 * Date: 2016-08-01
 * Time: 11:53
 */
\backend\assets\UmeditorAsset::register($this);
$form = \yii\bootstrap\ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
echo $form->field($model, 'name')->textInput();
echo $form->field($model, 'intro')->textInput();
echo $form->field($model, 'content')->textInput();
echo $form->field($model, 'img')->fileInput();
if (!$model->isNewRecord) {
    echo \yii\bootstrap\Html::img(Yii::$app->params['imgUrl'] . $model->image, ['height' => '50px']);
}
echo $form->field($model, 'price')->textInput();
echo $form->field($model, 'type')->radioList($model->arr);
echo \yii\bootstrap\Html::submitButton('提交', ['class' => 'btn btn-info']);
\yii\bootstrap\ActiveForm::end();
$this->beginBlock('js');
?>
//article-content是输入框的id
window.um = UM.getEditor('salerental-content', {
/* 传入配置参数,可配参数列表看umeditor.config.js */
//toolbar: ['undo redo | bold italic underline']
});
<?php
$this->endBlock();
$this->registerJs($this->blocks['js'])
?>
