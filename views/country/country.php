<?php

use yii\helpers\Html;

use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'code') ?>

<?= $form->field($model, 'name') ?>

<?= $form->field($model, 'population') ?>

    <div class="form-group">

        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>

    </div>

<?php ActiveForm::end(); ?>