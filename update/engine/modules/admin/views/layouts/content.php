<?php

use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;

?>
<div class="content-wrapper">
    <?= notify()->show();?>
    <div class="notify-wrapper"></div>
    <section class="content-header">
        <h1>&nbsp;</h1>
        <?php echo Breadcrumbs::widget([
            'homeLink'  => ['label' => t('app', 'Home'), 'url' => url(['/admin'])],
            'links'     => view_param('pageBreadcrumbs'),
            'options'   => ['class' => 'breadcrumb breadcrumb-top'],
            'tag'       => 'ul',
        ]); ?>
    </section>
    <section class="content <?= app()->controller->id . '-' . app()->controller->action->id;?>">
        <?= Alert::widget() ?>
        <?= $content ?>
    </section>
</div>

<footer class="main-footer">
    <div class="">
        <b><a href="https://store.codinbit.com" target="_blank"><?= APP_NAME . ' ';?></a></b><?=t('app', 'Version') . ' ' .app()->options->get("app.data.version", "1.0");?> Created by <a target="_blank" href="https://www.codinbit.com">CodinBit</a>
    </div>
</footer>