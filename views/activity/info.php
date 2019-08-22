<?php
/**
 * @var $model \app\models\Activity
 */
?>

<div class="row">
    <div class="col-md-12">
        <h4>Название события: <?= $model->title?></h4><br>
        <h4>Описание события: <?= $model->description?></h4><br>
        <h4>Начало события: <?= $model->startDate?></h4><br>
        <h4>Окончание события: <?= $model->endDate?></h4><br>
        <h4>Интервал повторений: <?= $model->isRepeated?></h4><br>
        <h4>Куда отправлять уведомление: <?= $model->email?></h4><br>
        <img src="/images/<?=$model->file?>" alt="">





    </div>
</div>
