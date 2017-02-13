<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Venue'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Country'), ['controller' => 'Countries', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Provinces'), ['controller' => 'Provinces', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Province'), ['controller' => 'Provinces', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List CityRegions'), ['controller' => 'CityRegions', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New City Region'), ['controller' => 'CityRegions', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Malls'), ['controller' => 'Malls', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Mall'), ['controller' => 'Malls', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('name'); ?></th>
            <th><?= $this->Paginator->sort('slug'); ?></th>
            <th><?= $this->Paginator->sort('seo_title'); ?></th>
            <th><?= $this->Paginator->sort('city_id'); ?></th>
            <th><?= $this->Paginator->sort('country_id'); ?></th>
            <th><?= $this->Paginator->sort('province_id'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($venues as $venue): ?>
        <tr>
            <td><?= $this->Number->format($venue->id) ?></td>
            <td><?= h($venue->name) ?></td>
            <td><?= h($venue->slug) ?></td>
            <td><?= h($venue->seo_title) ?></td>
            <td>
                <?= $venue->has('city') ? $this->Html->link($venue->city->name, ['controller' => 'Cities', 'action' => 'view', $venue->city->id]) : '' ?>
            </td>
            <td>
                <?= $venue->has('country') ? $this->Html->link($venue->country->name, ['controller' => 'Countries', 'action' => 'view', $venue->country->id]) : '' ?>
            </td>
            <td>
                <?= $venue->has('province') ? $this->Html->link($venue->province->name, ['controller' => 'Provinces', 'action' => 'view', $venue->province->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $venue->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $venue->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $venue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venue->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
