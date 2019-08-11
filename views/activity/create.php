<?php
/**
 * @var $model \app\models\Activity
 */

?>

<h3>Активность</h3>

<div class="col-md-6">
    <?php $form = \yii\bootstrap\ActiveForm::begin()?>

    <?= $form->field($model,'title')?>
    <?= $form->field($model,'description')->textarea();?>
    <?= $form->field($model,'startDate')->input('date')?>
    <?= $form->field($model,'endDate')->input('date')?>
    <?= $form->field($model,'isBlocked')->checkbox()?>
    <?= $form->field($model,'isRepeated')->checkbox()?>
    <div>
        <button class="btn btn-default" type="submit">Отправить</button>
    </div>


    <?php $form = \yii\bootstrap\ActiveForm::end()?>
</div>
