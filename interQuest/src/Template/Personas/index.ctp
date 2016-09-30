<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Persona'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Vocations'), ['controller' => 'Vocations', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Vocation'), ['controller' => 'Vocations', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Monsters'), ['controller' => 'Monsters', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Monster'), ['controller' => 'Monsters', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Npcs'), ['controller' => 'Npcs', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Npc'), ['controller' => 'Npcs', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Parks'), ['controller' => 'Parks', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Park'), ['controller' => 'Parks', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Fiefdoms'), ['controller' => 'Fiefdoms', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Fiefdom'), ['controller' => 'Fiefdoms', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Actions'), ['controller' => 'Actions', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Action'), ['controller' => 'Actions', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Fieves'), ['controller' => 'Fieves', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Fief'), ['controller' => 'Fieves', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Equipments'), ['controller' => 'Equipments', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Equipment'), ['controller' => 'Equipments', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Titles'), ['controller' => 'Titles', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Title'), ['controller' => 'Titles', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('orkID'); ?></th>
            <th><?= $this->Paginator->sort('user_id'); ?></th>
            <th><?= $this->Paginator->sort('name'); ?></th>
            <th><?= $this->Paginator->sort('long_name'); ?></th>
            <th><?= $this->Paginator->sort('image'); ?></th>
            <th><?= $this->Paginator->sort('vocation_id'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($personas as $persona): ?>
        <tr>
            <td><?= $this->Number->format($persona->id) ?></td>
            <td><?= $this->Number->format($persona->orkID) ?></td>
            <td>
                <?= $persona->has('user') ? $this->Html->link($persona->user->id, ['controller' => 'Users', 'action' => 'view', $persona->user->id]) : '' ?>
            </td>
            <td><?= h($persona->name) ?></td>
            <td><?= h($persona->long_name) ?></td>
            <td><?= h($persona->image) ?></td>
            <td>
                <?= $persona->has('vocation') ? $this->Html->link($persona->vocation->name, ['controller' => 'Vocations', 'action' => 'view', $persona->vocation->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $persona->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $persona->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $persona->id], ['confirm' => __('Are you sure you want to delete # {0}?', $persona->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
