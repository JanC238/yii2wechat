<?php
/**
 * Created by PhpStorm.
 * User: zzzzz
 * Date: 2016-07-30
 * Time: 00:35
 */
$form = \yii\bootstrap\ActiveForm::begin();
echo $form->field($model, 'cate_id')->dropDownList($options);
echo $form->field($model, 'title')->textInput();
echo $form->field($model, 'content')->textarea();
echo $form->field($model, 'img')->fileInput();
if (!$model->isNewRecord) {
    echo '<img src="'.\yii\helpers\Url::to($model->image,true).'" alt="" height="50"><br/>';
}
echo \yii\bootstrap\Html::submitButton($model->isNewRecord ? '添加' : '修改', ['class' => 'btn btn-info']);
\yii\bootstrap\ActiveForm::end();