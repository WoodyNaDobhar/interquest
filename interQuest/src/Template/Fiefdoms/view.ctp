<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Fiefdom'), ['action' => 'edit', $fiefdom->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Fiefdom'), ['action' => 'delete', $fiefdom->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fiefdom->id)]) ?> </li>
<li><?= $this->Html->link(__('List Fiefdoms'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Fiefdom'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Npcs'), ['controller' => 'Npcs', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Npc'), ['controller' => 'Npcs', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Parks'), ['controller' => 'Parks', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Park'), ['controller' => 'Parks', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Fieves'), ['controller' => 'Fieves', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Fief'), ['controller' => 'Fieves', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Fiefdom'), ['action' => 'edit', $fiefdom->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Fiefdom'), ['action' => 'delete', $fiefdom->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fiefdom->id)]) ?> </li>
<li><?= $this->Html->link(__('List Fiefdoms'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Fiefdom'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Npcs'), ['controller' => 'Npcs', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Npc'), ['controller' => 'Npcs', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Parks'), ['controller' => 'Parks', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Park'), ['controller' => 'Parks', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Fieves'), ['controller' => 'Fieves', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Fief'), ['controller' => 'Fieves', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($fiefdom->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($fiefdom->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Persona') ?></td>
            <td><?= $fiefdom->has('persona') ? $this->Html->link($fiefdom->persona->name, ['controller' => 'Personas', 'action' => 'view', $fiefdom->persona->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Npc') ?></td>
            <td><?= $fiefdom->has('npc') ? $this->Html->link($fiefdom->npc->name, ['controller' => 'Npcs', 'action' => 'view', $fiefdom->npc->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Park') ?></td>
            <td><?= $fiefdom->has('park') ? $this->Html->link($fiefdom->park->name, ['controller' => 'Parks', 'action' => 'view', $fiefdom->park->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($fiefdom->id) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Fieves') ?></h3>
    </div>
    <?php if (!empty($fiefdom->fieves)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Territory Id') ?></th>
                <th><?= __('Fiefdom Id') ?></th>
                <th><?= __('Persona Id') ?></th>
                <th><?= __('Npc Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($fiefdom->fieves as $fieves): ?>
                <tr>
                    <td><?= h($fieves->id) ?></td>
                    <td><?= h($fieves->name) ?></td>
                    <td><?= h($fieves->territory_id) ?></td>
                    <td><?= h($fieves->fiefdom_id) ?></td>
                    <td><?= h($fieves->persona_id) ?></td>
                    <td><?= h($fieves->npc_id) ?></td>
                    <td><?= h($fieves->created) ?></td>
                    <td><?= h($fieves->modified) ?></td>
                    <td><?= h($fieves->deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Fieves', 'action' => 'view', $fieves->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Fieves', 'action' => 'edit', $fieves->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Fieves', 'action' => 'delete', $fieves->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fieves->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Fieves</p>
    <?php endif; ?>
</div>
