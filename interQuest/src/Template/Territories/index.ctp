<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Territory'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Sectors'), ['controller' => 'Sectors', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Sector'), ['controller' => 'Sectors', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Terrains'), ['controller' => 'Terrains', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Terrain'), ['controller' => 'Terrains', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List EquipmentsNpcs'), ['controller' => 'EquipmentsNpcs', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Equipments Npc'), ['controller' => 'EquipmentsNpcs', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List EquipmentsPersonas'), ['controller' => 'EquipmentsPersonas', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Equipments Persona'), ['controller' => 'EquipmentsPersonas', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Fieves'), ['controller' => 'Fieves', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Fief'), ['controller' => 'Fieves', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Npcs'), ['controller' => 'Npcs', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Npc'), ['controller' => 'Npcs', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Buildings'), ['controller' => 'Buildings', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Building'), ['controller' => 'Buildings', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('name'); ?></th>
            <th><?= $this->Paginator->sort('sector_id'); ?></th>
            <th><?= $this->Paginator->sort('row'); ?></th>
            <th><?= $this->Paginator->sort('column'); ?></th>
            <th><?= $this->Paginator->sort('steward_persona_id'); ?></th>
            <th><?= $this->Paginator->sort('steward_cut'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($territories as $territory): ?>
        <tr>
            <td><?= $this->Number->format($territory->id) ?></td>
            <td><?= $this->Number->format($territory->name) ?></td>
            <td>
                <?= $territory->has('sector') ? $this->Html->link($territory->sector->id, ['controller' => 'Sectors', 'action' => 'view', $territory->sector->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($territory->row) ?></td>
            <td><?= $this->Number->format($territory->column) ?></td>
            <td><?= $this->Number->format($territory->steward_persona_id) ?></td>
            <td><?= $this->Number->format($territory->steward_cut) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $territory->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $territory->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $territory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $territory->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
