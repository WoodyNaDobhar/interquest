<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Building'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Equipments'), ['controller' => 'Equipments', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Equipment'), ['controller' => 'Equipments', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('name'); ?></th>
            <th><?= $this->Paginator->sort('cost_gold'); ?></th>
            <th><?= $this->Paginator->sort('cost_iron'); ?></th>
            <th><?= $this->Paginator->sort('cost_timber'); ?></th>
            <th><?= $this->Paginator->sort('cost_stone'); ?></th>
            <th><?= $this->Paginator->sort('cost_grain'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($buildings as $building): ?>
        <tr>
            <td><?= $this->Number->format($building->id) ?></td>
            <td><?= h($building->name) ?></td>
            <td><?= $this->Number->format($building->cost_gold) ?></td>
            <td><?= $this->Number->format($building->cost_iron) ?></td>
            <td><?= $this->Number->format($building->cost_timber) ?></td>
            <td><?= $this->Number->format($building->cost_stone) ?></td>
            <td><?= $this->Number->format($building->cost_grain) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $building->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $building->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $building->id], ['confirm' => __('Are you sure you want to delete # {0}?', $building->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
