<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Comment'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Npcs'), ['controller' => 'Npcs', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Npc'), ['controller' => 'Npcs', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Parks'), ['controller' => 'Parks', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Park'), ['controller' => 'Parks', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Sectors'), ['controller' => 'Sectors', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Sector'), ['controller' => 'Sectors', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('npc_id'); ?></th>
            <th><?= $this->Paginator->sort('park_id'); ?></th>
            <th><?= $this->Paginator->sort('persona_id'); ?></th>
            <th><?= $this->Paginator->sort('sector_id'); ?></th>
            <th><?= $this->Paginator->sort('territory_id'); ?></th>
            <th><?= $this->Paginator->sort('author_persona_id'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($comments as $comment): ?>
        <tr>
            <td><?= $this->Number->format($comment->id) ?></td>
            <td>
                <?= $comment->has('npc') ? $this->Html->link($comment->npc->name, ['controller' => 'Npcs', 'action' => 'view', $comment->npc->id]) : '' ?>
            </td>
            <td>
                <?= $comment->has('park') ? $this->Html->link($comment->park->name, ['controller' => 'Parks', 'action' => 'view', $comment->park->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($comment->persona_id) ?></td>
            <td>
                <?= $comment->has('sector') ? $this->Html->link($comment->sector->id, ['controller' => 'Sectors', 'action' => 'view', $comment->sector->id]) : '' ?>
            </td>
            <td>
                <?= $comment->has('territory') ? $this->Html->link($comment->territory->name, ['controller' => 'Territories', 'action' => 'view', $comment->territory->id]) : '' ?>
            </td>
            <td>
                <?= $comment->has('persona') ? $this->Html->link($comment->persona->name, ['controller' => 'Personas', 'action' => 'view', $comment->persona->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $comment->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $comment->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $comment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comment->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
