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
        ['action' => 'delete', $chain->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $chain->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Chains'), ['action' => 'index']) ?></li>
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
        ['action' => 'delete', $chain->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $chain->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Chains'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($chain); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Chain']) ?></legend>
    <?php
    echo $this->Form->input('name');
    echo $this->Form->input('slug');
    echo $this->Form->input('local_chain');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
