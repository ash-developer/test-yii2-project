<?php
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>

<div>

    <form class="form-inline">
        <input type="text" class="form-control">
        <a class="btn btn-default">show</a>
    </form>

    <? foreach ($rss->item as $item): ?>
        <div><?= $item->title ?></div>
    <? endforeach; ?>

</div>
