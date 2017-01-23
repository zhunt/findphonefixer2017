<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $blog->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $blog->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Blogs'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $blog->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $blog->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Blogs'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($blog); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Blog']) ?></legend>
    <?php
    echo $this->Form->input('title');
    echo $this->Form->input('body');
    echo $this->Form->input('flag_published');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
