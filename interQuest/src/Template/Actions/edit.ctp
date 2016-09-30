<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $action->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $action->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Actions'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Npcs'), ['controller' => 'Npcs', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Npc'), ['controller' => 'Npcs', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $action->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $action->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Actions'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Npcs'), ['controller' => 'Npcs', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Npc'), ['controller' => 'Npcs', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($action); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Action']) ?></legend>
    <?php
    echo $this->Form->input('name');
    echo $this->Form->input('description');
    echo $this->Form->input('is_common');
    echo $this->Form->input('is_landed');
    echo $this->Form->input('check_required');
    echo $this->Form->input('personas._ids', ['options' => $personas]);
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
