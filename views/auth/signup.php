<?php
/**
 * @var $model \app\models\Users
 */
?>

<div class="row">
    <div class="col-md-6">
        <?php
        $form=\yii\bootstrap\ActiveForm::begin();?>

        <?=$form->field($model, 'email');?>
        <?=$form->field($model, 'password')?>

        <?php \yii\bootstrap\ActiveForm::end();?>
    </div>
</div>
