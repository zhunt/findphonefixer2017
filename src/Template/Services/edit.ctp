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
        ['action' => 'delete', $service->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $service->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Services'), ['action' => 'index']) ?></li>
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
        ['action' => 'delete', $service->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $service->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Services'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($service); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Service']) ?></legend>
    <?php
    echo $this->Form->input('name');
    echo $this->Form->input('slug');
    echo $this->Form->input('venues._ids', ['options' => $venues]);
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
