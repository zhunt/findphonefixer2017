<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $cityRegion->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $cityRegion->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List City Regions'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $cityRegion->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $cityRegion->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List City Regions'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($cityRegion); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['City Region']) ?></legend>
    <?php
    echo $this->Form->input('name');
    echo $this->Form->input('seo_title');
    echo $this->Form->input('seo_desc');
    echo $this->Form->input('city_id', ['options' => $cities]);
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
