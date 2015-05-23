<?php
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>

<div>

    <? foreach ($posts as $post): ?>
        <div><?= $post->title ?></div>
    <? endforeach; ?>

</div>
