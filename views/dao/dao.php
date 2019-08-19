<?php


/* @var $this \yii\web\View */

?>
<div class="row">
    <div class="col-md-6">
        <pre>
            <?= print_r($users); ?>
        </pre>
    </div>
    <div class="row">
        <div class="col-md-6">
        <pre>
            <?= print_r($activityUser); ?>
        </pre>
        </div>
        <div class="col-md-6">
        <pre>
            <?= print_r($activity) ?>
        </pre>
        </div>
        <div class="col-md-6">
        <pre>
            <?php echo $count ?>
        </pre>
        </div>
        <div class="col-md-6">
        <pre>
            <?php foreach ($reader as $value): ?>
                <pre><?=print_r($value)?></pre>
            <?php endforeach;?>
        </pre>
        </div>

    </div>
