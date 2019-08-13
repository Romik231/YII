<?php
//$session = Yii::$app->session;
//$session->open();


/**
 * @var $model \app\models\Activity
 */

?>

<h3>Активность</h3>

<div class="col-md-6">
    <?php $form = \yii\bootstrap\ActiveForm::begin();?>

    <?= $form->field($model,'title');?>
    <?= $form->field($model,'description')->textarea();?>
    <?= $form->field($model,'startDate')->widget(\kartik\datetime\DateTimePicker::class,[
        'convertFormat'=>true,
        'options'=>['placeholder'=>'Выберите дату начала'],
        'pluginOptions'=>[
            'format'=>'d.MM.yyyy',
            'autoclose'=> true,
            'weekstart'=>1,
            'startDate'=>'12.08.2018',
            'todayBtn'=>true,
            'todayHighLite'=>true,
        ]
    ]);?>
    <?= $form->field($model,'endDate')->widget(\kartik\datetime\DateTimePicker::class,[
        'convertFormat'=>true,
        'options'=>['placeholder'=>'Выберите дату окончания'],
        'pluginOptions'=>[
            'format'=>'d.MM.yyyy',
            'autoclose'=> true,
            'weekstart'=>1,
            'startDate'=>'12.08.2018',
            'todayBtn'=>true,
            'todayHighLite'=>true,
        ]
    ]);?>
    <?= $form->field($model,'repeatedType')->dropDownList($model::REPEATED_TYPE);?>
    <?= $form->field($model,'isBlocked')->checkbox();?>
    <?= $form->field($model,'isRepeated')->checkbox();?>
    <?= $form->field($model, 'useNotification')->checkbox();?>
    <?= $form->field($model, 'email', ['enableAjaxValidation'=>true, 'enableClientValidation'=>false]);?>
    <?= $form->field($model, 'emailRepeat', ['enableAjaxValidation'=>true, 'enableClientValidation'=>false]);?>
    <div>
        <button class="btn btn-default" type="submit">Отправить</button>
    </div>


    <?php $form = \yii\bootstrap\ActiveForm::end();?>
</div>
