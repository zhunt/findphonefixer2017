<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Venue'), ['action' => 'edit', $venue->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Venue'), ['action' => 'delete', $venue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venue->id)]) ?> </li>
<li><?= $this->Html->link(__('List Venues'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Venue'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Country'), ['controller' => 'Countries', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Provinces'), ['controller' => 'Provinces', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Province'), ['controller' => 'Provinces', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List City Regions'), ['controller' => 'CityRegions', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New City Region'), ['controller' => 'CityRegions', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Malls'), ['controller' => 'Malls', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Mall'), ['controller' => 'Malls', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Venue'), ['action' => 'edit', $venue->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Venue'), ['action' => 'delete', $venue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venue->id)]) ?> </li>
<li><?= $this->Html->link(__('List Venues'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Venue'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Country'), ['controller' => 'Countries', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Provinces'), ['controller' => 'Provinces', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Province'), ['controller' => 'Provinces', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List City Regions'), ['controller' => 'CityRegions', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New City Region'), ['controller' => 'CityRegions', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Malls'), ['controller' => 'Malls', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Mall'), ['controller' => 'Malls', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($venue->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($venue->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Slug') ?></td>
            <td><?= h($venue->slug) ?></td>
        </tr>
        <tr>
            <td><?= __('Seo Title') ?></td>
            <td><?= h($venue->seo_title) ?></td>
        </tr>
        <tr>
            <td><?= __('City') ?></td>
            <td><?= $venue->has('city') ? $this->Html->link($venue->city->name, ['controller' => 'Cities', 'action' => 'view', $venue->city->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Country') ?></td>
            <td><?= $venue->has('country') ? $this->Html->link($venue->country->name, ['controller' => 'Countries', 'action' => 'view', $venue->country->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Province') ?></td>
            <td><?= $venue->has('province') ? $this->Html->link($venue->province->name, ['controller' => 'Provinces', 'action' => 'view', $venue->province->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('City Region') ?></td>
            <td><?= $venue->has('city_region') ? $this->Html->link($venue->city_region->name, ['controller' => 'CityRegions', 'action' => 'view', $venue->city_region->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Admin Level 2') ?></td>
            <td><?= h($venue->admin_level_2) ?></td>
        </tr>
        <tr>
            <td><?= __('Mall') ?></td>
            <td><?= $venue->has('mall') ? $this->Html->link($venue->mall->name, ['controller' => 'Malls', 'action' => 'view', $venue->mall->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($venue->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Geo Latt') ?></td>
            <td><?= $this->Number->format($venue->geo_latt) ?></td>
        </tr>
        <tr>
            <td><?= __('Geo Long') ?></td>
            <td><?= $this->Number->format($venue->geo_long) ?></td>
        </tr>
        <tr>
            <td><?= __('Rating') ?></td>
            <td><?= $this->Number->format($venue->rating) ?></td>
        </tr>
        <tr>
            <td><?= __('Last Update') ?></td>
            <td><?= h($venue->last_update) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($venue->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($venue->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Flag Mall') ?></td>
            <td><?= $venue->flag_mall ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <td><?= __('Flag Featured') ?></td>
            <td><?= $venue->flag_featured ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <td><?= __('Flag Published') ?></td>
            <td><?= $venue->flag_published ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <td><?= __('Seo Desc') ?></td>
            <td><?= $this->Text->autoParagraph(h($venue->seo_desc)); ?></td>
        </tr>
        <tr>
            <td><?= __('Address') ?></td>
            <td><?= $this->Text->autoParagraph(h($venue->address)); ?></td>
        </tr>
        <tr>
            <td><?= __('Phones') ?></td>
            <td><?= $this->Text->autoParagraph(h($venue->phones)); ?></td>
        </tr>
        <tr>
            <td><?= __('Websites') ?></td>
            <td><?= $this->Text->autoParagraph(h($venue->websites)); ?></td>
        </tr>
        <tr>
            <td><?= __('Amenities') ?></td>
            <td><?= $this->Text->autoParagraph(h($venue->amenities)); ?></td>
        </tr>
        <tr>
            <td><?= __('Features') ?></td>
            <td><?= $this->Text->autoParagraph(h($venue->features)); ?></td>
        </tr>
        <tr>
            <td><?= __('Services') ?></td>
            <td><?= $this->Text->autoParagraph(h($venue->services)); ?></td>
        </tr>
        <tr>
            <td><?= __('Products') ?></td>
            <td><?= $this->Text->autoParagraph(h($venue->products)); ?></td>
        </tr>
        <tr>
            <td><?= __('Photos') ?></td>
            <td><?= $this->Text->autoParagraph(h($venue->photos)); ?></td>
        </tr>
    </table>
</div>

