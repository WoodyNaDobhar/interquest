<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $territory->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $territory->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Territories'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Sectors'), ['controller' => 'Sectors', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Sector'), ['controller' => 'Sectors', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Terrains'), ['controller' => 'Terrains', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Terrain'), ['controller' => 'Terrains', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Equipments Npcs'), ['controller' => 'EquipmentsNpcs', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Equipments Npc'), ['controller' => 'EquipmentsNpcs', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Equipments Personas'), ['controller' => 'EquipmentsPersonas', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Equipments Persona'), ['controller' => 'EquipmentsPersonas', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Fieves'), ['controller' => 'Fieves', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Fief'), ['controller' => 'Fieves', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Npcs'), ['controller' => 'Npcs', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Npc'), ['controller' => 'Npcs', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Buildings'), ['controller' => 'Buildings', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Building'), ['controller' => 'Buildings', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $territory->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $territory->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Territories'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Sectors'), ['controller' => 'Sectors', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Sector'), ['controller' => 'Sectors', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Terrains'), ['controller' => 'Terrains', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Terrain'), ['controller' => 'Terrains', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Equipments Npcs'), ['controller' => 'EquipmentsNpcs', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Equipments Npc'), ['controller' => 'EquipmentsNpcs', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Equipments Personas'), ['controller' => 'EquipmentsPersonas', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Equipments Persona'), ['controller' => 'EquipmentsPersonas', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Fieves'), ['controller' => 'Fieves', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Fief'), ['controller' => 'Fieves', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Npcs'), ['controller' => 'Npcs', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Npc'), ['controller' => 'Npcs', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Buildings'), ['controller' => 'Buildings', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Building'), ['controller' => 'Buildings', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($territory); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Territory']) ?></legend>
    <?php
    echo $this->Form->input('name');
    echo $this->Form->input('sector_id', ['options' => $sectors]);
    echo $this->Form->input('row');
    echo $this->Form->input('column');
    echo $this->Form->input('steward_persona_id');
    echo $this->Form->input('steward_cut');
    echo $this->Form->input('terrain_id', ['options' => $terrains]);
    echo $this->Form->input('primary_resource');
    echo $this->Form->input('secondary_resource');
    echo $this->Form->input('castle_strength');
    echo $this->Form->input('is_wasteland');
    echo $this->Form->input('is_no_mans_land');
    echo $this->Form->input('has_road');
    echo $this->Form->input('buildings._ids', ['options' => $buildings]);
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
