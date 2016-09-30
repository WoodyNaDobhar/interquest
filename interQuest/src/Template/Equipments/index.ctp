<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Equipment'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Buildings'), ['controller' => 'Buildings', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Building'), ['controller' => 'Buildings', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Npcs'), ['controller' => 'Npcs', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Npc'), ['controller' => 'Npcs', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('name'); ?></th>
            <th><?= $this->Paginator->sort('price'); ?></th>
            <th><?= $this->Paginator->sort('units'); ?></th>
            <th><?= $this->Paginator->sort('weight'); ?></th>
            <th><?= $this->Paginator->sort('cargo'); ?></th>
            <th><?= $this->Paginator->sort('craft_gold'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($equipments as $equipment): ?>
        <tr>
            <td><?= $this->Number->format($equipment->id) ?></td>
            <td><?= h($equipment->name) ?></td>
            <td><?= $this->Number->format($equipment->price) ?></td>
            <td><?= $this->Number->format($equipment->units) ?></td>
            <td><?= $this->Number->format($equipment->weight) ?></td>
            <td><?= $this->Number->format($equipment->cargo) ?></td>
            <td><?= $this->Number->format($equipment->craft_gold) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $equipment->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $equipment->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $equipment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipment->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
