<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Brand'), ['action' => 'edit', $brand->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Brand'), ['action' => 'delete', $brand->id], ['confirm' => __('Are you sure you want to delete # {0}?', $brand->id)]) ?> </li>
<li><?= $this->Html->link(__('List Brands'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Brand'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Brand'), ['action' => 'edit', $brand->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Brand'), ['action' => 'delete', $brand->id], ['confirm' => __('Are you sure you want to delete # {0}?', $brand->id)]) ?> </li>
<li><?= $this->Html->link(__('List Brands'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Brand'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($brand->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($brand->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Slug') ?></td>
            <td><?= h($brand->slug) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($brand->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($brand->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($brand->modified) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Venues') ?></h3>
    </div>
    <?php if (!empty($brand->venues)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Slug') ?></th>
                <th><?= __('Seo Title') ?></th>
                <th><?= __('Seo Desc') ?></th>
                <th><?= __('Address') ?></th>
                <th><?= __('City Id') ?></th>
                <th><?= __('Phones') ?></th>
                <th><?= __('Websites') ?></th>
                <th><?= __('Amenities') ?></th>
                <th><?= __('Features') ?></th>
                <th><?= __('Services') ?></th>
                <th><?= __('Products') ?></th>
                <th><?= __('Photos') ?></th>
                <th><?= __('Country Id') ?></th>
                <th><?= __('Province Id') ?></th>
                <th><?= __('City Region Id') ?></th>
                <th><?= __('Geo Latt') ?></th>
                <th><?= __('Geo Long') ?></th>
                <th><?= __('Admin Level 2') ?></th>
                <th><?= __('Flag Mall') ?></th>
                <th><?= __('Mall Id') ?></th>
                <th><?= __('Last Update') ?></th>
                <th><?= __('Flag Featured') ?></th>
                <th><?= __('Rating') ?></th>
                <th><?= __('Flag Published') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($brand->venues as $venues): ?>
                <tr>
                    <td><?= h($venues->id) ?></td>
                    <td><?= h($venues->name) ?></td>
                    <td><?= h($venues->slug) ?></td>
                    <td><?= h($venues->seo_title) ?></td>
                    <td><?= h($venues->seo_desc) ?></td>
                    <td><?= h($venues->address) ?></td>
                    <td><?= h($venues->city_id) ?></td>
                    <td><?= h($venues->phones) ?></td>
                    <td><?= h($venues->websites) ?></td>
                    <td><?= h($venues->amenities) ?></td>
                    <td><?= h($venues->features) ?></td>
                    <td><?= h($venues->services) ?></td>
                    <td><?= h($venues->products) ?></td>
                    <td><?= h($venues->photos) ?></td>
                    <td><?= h($venues->country_id) ?></td>
                    <td><?= h($venues->province_id) ?></td>
                    <td><?= h($venues->city_region_id) ?></td>
                    <td><?= h($venues->geo_latt) ?></td>
                    <td><?= h($venues->geo_long) ?></td>
                    <td><?= h($venues->admin_level_2) ?></td>
                    <td><?= h($venues->flag_mall) ?></td>
                    <td><?= h($venues->mall_id) ?></td>
                    <td><?= h($venues->last_update) ?></td>
                    <td><?= h($venues->flag_featured) ?></td>
                    <td><?= h($venues->rating) ?></td>
                    <td><?= h($venues->flag_published) ?></td>
                    <td><?= h($venues->created) ?></td>
                    <td><?= h($venues->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Venues', 'action' => 'view', $venues->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Venues', 'action' => 'edit', $venues->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Venues', 'action' => 'delete', $venues->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venues->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Venues</p>
    <?php endif; ?>
</div>
