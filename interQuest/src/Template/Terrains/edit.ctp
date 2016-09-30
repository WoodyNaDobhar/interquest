<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $terrain->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $terrain->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Terrains'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $terrain->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $terrain->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Terrains'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($terrain); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Terrain']) ?></legend>
    <?php
    echo $this->Form->input('name');
    echo $this->Form->input('description');
    echo $this->Form->input('image');
    echo $this->Form->input('color');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
