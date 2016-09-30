<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Park'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Sectors'), ['controller' => 'Sectors', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Sector'), ['controller' => 'Sectors', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Fiefdoms'), ['controller' => 'Fiefdoms', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Fiefdom'), ['controller' => 'Fiefdoms', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('name'); ?></th>
            <th><?= $this->Paginator->sort('rank'); ?></th>
            <th><?= $this->Paginator->sort('sector_id'); ?></th>
            <th><?= $this->Paginator->sort('midreign'); ?></th>
            <th><?= $this->Paginator->sort('coronation'); ?></th>
            <th><?= $this->Paginator->sort('tax_rate'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($parks as $park): ?>
        <tr>
            <td><?= $this->Number->format($park->id) ?></td>
            <td><?= h($park->name) ?></td>
            <td><?= h($park->rank) ?></td>
            <td>
                <?= $park->has('sector') ? $this->Html->link($park->sector->id, ['controller' => 'Sectors', 'action' => 'view', $park->sector->id]) : '' ?>
            </td>
            <td><?= h($park->midreign) ?></td>
            <td><?= h($park->coronation) ?></td>
            <td><?= $this->Number->format($park->tax_rate) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $park->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $park->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $park->id], ['confirm' => __('Are you sure you want to delete # {0}?', $park->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
