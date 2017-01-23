<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Blog'), ['action' => 'edit', $blog->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Blog'), ['action' => 'delete', $blog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blog->id)]) ?> </li>
<li><?= $this->Html->link(__('List Blogs'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Blog'), ['action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Blog'), ['action' => 'edit', $blog->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Blog'), ['action' => 'delete', $blog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blog->id)]) ?> </li>
<li><?= $this->Html->link(__('List Blogs'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Blog'), ['action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($blog->title) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Title') ?></td>
            <td><?= h($blog->title) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($blog->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($blog->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Flag Published') ?></td>
            <td><?= $blog->flag_published ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <td><?= __('Body') ?></td>
            <td><?= $this->Text->autoParagraph(h($blog->body)); ?></td>
        </tr>
    </table>
</div>

