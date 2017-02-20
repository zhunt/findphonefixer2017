<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Mall'), ['action' => 'edit', $mall->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Mall'), ['action' => 'delete', $mall->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mall->id)]) ?> </li>
<li><?= $this->Html->link(__('List Malls'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Mall'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Mall'), ['action' => 'edit', $mall->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Mall'), ['action' => 'delete', $mall->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mall->id)]) ?> </li>
<li><?= $this->Html->link(__('List Malls'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Mall'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($mall->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($mall->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Slug') ?></td>
            <td><?= h($mall->slug) ?></td>
        </tr>
        <tr>
            <td><?= __('Seo Title') ?></td>
            <td><?= h($mall->seo_title) ?></td>
        </tr>
        <tr>
            <td><?= __('Seo Desc') ?></td>
            <td><?= h($mall->seo_desc) ?></td>
        </tr>
        <tr>
            <td><?= __('City') ?></td>
            <td><?= $mall->has('city') ? $this->Html->link($mall->city->name, ['controller' => 'Cities', 'action' => 'view', $mall->city->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($mall->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Intro Text') ?></td>
            <td><?= $this->Text->autoParagraph(h($mall->intro_text)); ?></td>
        </tr>
    </table>
</div>

