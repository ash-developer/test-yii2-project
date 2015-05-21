<?php

/**
 * @var $this yii\web\View
 * @var $channels \app\models\Channel[]
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="channels">
    <p>
        <? $form = ActiveForm::begin([
            'id' => 'channel-form', 'options' => ['class' => 'form-inline'],
        ]); ?>
            <div class="form-group">
                <input type="text" class="form-control" name="Channel[url]">
                <?= Html::submitButton('add', ['class' => 'btn btn-default']) ?>
            </div>
        <? ActiveForm::end(); ?>

    </p>

    <p>
        <? if (sizeof($channels) > 0): ?>
        <ul>
            <? foreach ($channels as $channel): ?>
            <li><?= $channel->url ?></li>
            <? endforeach; ?>
        </ul>
        <? else: ?>
        no channels
        <? endif; ?>
    </p>

</div>
