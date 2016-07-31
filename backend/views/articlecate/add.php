<?php
/**
 * Created by PhpStorm.
 * User: zzzzz
 * Date: 2016-07-29
 * Time: 23:08
 */
$form = \yii\bootstrap\ActiveForm::begin();
echo $form->field($model, 'name')->textInput();
echo \yii\bootstrap\Html::submitButton($model->isNewRecord ? '添加' : '修改', ['class' => 'btn btn-info']);
\yii\bootstrap\ActiveForm::end();