<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Npc'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Vocations'), ['controller' => 'Vocations', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Vocation'), ['controller' => 'Vocations', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Monsters'), ['controller' => 'Monsters', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Monster'), ['controller' => 'Monsters', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Actions'), ['controller' => 'Actions', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Action'), ['controller' => 'Actions', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Fiefdoms'), ['controller' => 'Fiefdoms', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Fiefdom'), ['controller' => 'Fiefdoms', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Fieves'), ['controller' => 'Fieves', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Fief'), ['controller' => 'Fieves', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Equipments'), ['controller' => 'Equipments', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Equipment'), ['controller' => 'Equipments', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('name'); ?></th>
            <th><?= $this->Paginator->sort('private_name'); ?></th>
            <th><?= $this->Paginator->sort('image'); ?></th>
            <th><?= $this->Paginator->sort('vocation_id'); ?></th>
            <th><?= $this->Paginator->sort('monster_id'); ?></th>
            <th><?= $this->Paginator->sort('territory_id'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($npcs as $npc): ?>
        <tr>
            <td><?= $this->Number->format($npc->id) ?></td>
            <td><?= h($npc->name) ?></td>
            <td><?= h($npc->private_name) ?></td>
            <td><?= h($npc->image) ?></td>
            <td>
                <?= $npc->has('vocation') ? $this->Html->link($npc->vocation->name, ['controller' => 'Vocations', 'action' => 'view', $npc->vocation->id]) : '' ?>
            </td>
            <td>
                <?= $npc->has('monster') ? $this->Html->link($npc->monster->name, ['controller' => 'Monsters', 'action' => 'view', $npc->monster->id]) : '' ?>
            </td>
            <td>
                <?= $npc->has('territory') ? $this->Html->link($npc->territory->name, ['controller' => 'Territories', 'action' => 'view', $npc->territory->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $npc->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $npc->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $npc->id], ['confirm' => __('Are you sure you want to delete # {0}?', $npc->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
