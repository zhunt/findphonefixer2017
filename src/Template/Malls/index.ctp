<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Mall'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('name'); ?></th>
            <th><?= $this->Paginator->sort('slug'); ?></th>
            <th><?= $this->Paginator->sort('seo_title'); ?></th>
            <th><?= $this->Paginator->sort('seo_desc'); ?></th>
            <th><?= $this->Paginator->sort('city_id'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($malls as $mall): ?>
        <tr>
            <td><?= $this->Number->format($mall->id) ?></td>
            <td><?= h($mall->name) ?></td>
            <td><?= h($mall->slug) ?></td>
            <td><?= h($mall->seo_title) ?></td>
            <td><?= h($mall->seo_desc) ?></td>
            <td>
                <?= $mall->has('city') ? $this->Html->link($mall->city->name, ['controller' => 'Cities', 'action' => 'view', $mall->city->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $mall->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $mall->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $mall->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mall->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>
