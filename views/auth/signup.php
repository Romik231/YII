<?php



/* @var $this \yii\web\View */
/* @var $model \app\models\Users */
?>
<div class="row">
    <div class="col-md-6">
        <?php $form=\yii\bootstrap\ActiveForm::begin();?>
        <?=$form->field($model, 'email');?>
        <?=$form->field($model, 'password');?>

        <div class="form-group">
            <button class="btn btn-default" type="submit">Регистрация</button>
        </div>

        <?php \yii\bootstrap\ActiveForm::end();?>
    </div>
</div>
