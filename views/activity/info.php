<?php
/**
 * @var $model \app\models\Activity
 */
?>

<div class="row">
    <div class="col-md-12">
<!--        <h4>Название события: --><?//= $model->title?><!--</h4><br>-->
<!--        <h4>Описание события: --><?//= $model->description?><!--</h4><br>-->
<!--        <h4>Начало события: --><?//= $model->startDate?><!--</h4><br>-->
<!--        <h4>Окончание события: --><?//= $model->endDate?><!--</h4><br>-->
<!--        <h4>Интервал повторений: --><?//= $model->isRepeated?><!--</h4><br>-->
<!--        <h4>Куда отправлять уведомление: --><?//= $model->email?><!--</h4><br>-->
<!--        <img src="/images/--><?//=$model->file?><!--" alt="">-->


<?php $form = \yii\bootstrap\ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]);?>
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
        <?= $form->field($model,'file[]')->fileInput(['multiple'=>true, 'accept' => 'images/*']);?>
        <div>
            <button class="btn btn-default" type="submit">Сохранить</button>
        </div>
<?php $form = \yii\bootstrap\ActiveForm::end();?>
    </div>
</div>
