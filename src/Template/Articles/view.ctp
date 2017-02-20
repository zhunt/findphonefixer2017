<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Article'), ['action' => 'edit', $article->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Article'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?> </li>
<li><?= $this->Html->link(__('List Articles'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Article'), ['action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Article'), ['action' => 'edit', $article->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Article'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?> </li>
<li><?= $this->Html->link(__('List Articles'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Article'), ['action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($article->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($article->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Seo Title') ?></td>
            <td><?= h($article->seo_title) ?></td>
        </tr>
        <tr>
            <td><?= __('Meta Desc') ?></td>
            <td><?= h($article->meta_desc) ?></td>
        </tr>
        <tr>
            <td><?= __('Social Media Url') ?></td>
            <td><?= h($article->social_media_url) ?></td>
        </tr>
        <tr>
            <td><?= __('Tags') ?></td>
            <td><?= h($article->tags) ?></td>
        </tr>
        <tr>
            <td><?= __('Homepage Image Url') ?></td>
            <td><?= h($article->homepage_image_url) ?></td>
        </tr>
        <tr>
            <td><?= __('Categories') ?></td>
            <td><?= h($article->categories) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($article->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Publish Date') ?></td>
            <td><?= h($article->publish_date) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($article->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modifed') ?></td>
            <td><?= h($article->modifed) ?></td>
        </tr>
        <tr>
            <td><?= __('Flag Published') ?></td>
            <td><?= $article->flag_published ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <td><?= __('Body') ?></td>
            <td><?= $this->Text->autoParagraph(h($article->body)); ?></td>
        </tr>
        <tr>
            <td><?= __('Homepage Text') ?></td>
            <td><?= $this->Text->autoParagraph(h($article->homepage_text)); ?></td>
        </tr>
    </table>
</div>

