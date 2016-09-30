<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Vocation'), ['action' => 'edit', $vocation->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Vocation'), ['action' => 'delete', $vocation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vocation->id)]) ?> </li>
<li><?= $this->Html->link(__('List Vocations'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Vocation'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Npcs'), ['controller' => 'Npcs', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Npc'), ['controller' => 'Npcs', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Vocation'), ['action' => 'edit', $vocation->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Vocation'), ['action' => 'delete', $vocation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vocation->id)]) ?> </li>
<li><?= $this->Html->link(__('List Vocations'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Vocation'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Npcs'), ['controller' => 'Npcs', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Npc'), ['controller' => 'Npcs', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($vocation->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($vocation->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Ability') ?></td>
            <td><?= h($vocation->ability) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($vocation->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Ability Description') ?></td>
            <td><?= $this->Text->autoParagraph(h($vocation->ability_description)); ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Npcs') ?></h3>
    </div>
    <?php if (!empty($vocation->npcs)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Private Name') ?></th>
                <th><?= __('Image') ?></th>
                <th><?= __('Vocation Id') ?></th>
                <th><?= __('Monster Id') ?></th>
                <th><?= __('Background Public') ?></th>
                <th><?= __('Background Private') ?></th>
                <th><?= __('Territory Id') ?></th>
                <th><?= __('Gold') ?></th>
                <th><?= __('Iron') ?></th>
                <th><?= __('Timber') ?></th>
                <th><?= __('Stone') ?></th>
                <th><?= __('Grain') ?></th>
                <th><?= __('Action Id') ?></th>
                <th><?= __('Deceased') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($vocation->npcs as $npcs): ?>
                <tr>
                    <td><?= h($npcs->id) ?></td>
                    <td><?= h($npcs->name) ?></td>
                    <td><?= h($npcs->private_name) ?></td>
                    <td><?= h($npcs->image) ?></td>
                    <td><?= h($npcs->vocation_id) ?></td>
                    <td><?= h($npcs->monster_id) ?></td>
                    <td><?= h($npcs->background_public) ?></td>
                    <td><?= h($npcs->background_private) ?></td>
                    <td><?= h($npcs->territory_id) ?></td>
                    <td><?= h($npcs->gold) ?></td>
                    <td><?= h($npcs->iron) ?></td>
                    <td><?= h($npcs->timber) ?></td>
                    <td><?= h($npcs->stone) ?></td>
                    <td><?= h($npcs->grain) ?></td>
                    <td><?= h($npcs->action_id) ?></td>
                    <td><?= h($npcs->deceased) ?></td>
                    <td><?= h($npcs->created) ?></td>
                    <td><?= h($npcs->modified) ?></td>
                    <td><?= h($npcs->deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Npcs', 'action' => 'view', $npcs->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Npcs', 'action' => 'edit', $npcs->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Npcs', 'action' => 'delete', $npcs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $npcs->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Npcs</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Personas') ?></h3>
    </div>
    <?php if (!empty($vocation->personas)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('OrkID') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Long Name') ?></th>
                <th><?= __('Image') ?></th>
                <th><?= __('Vocation Id') ?></th>
                <th><?= __('Monster Id') ?></th>
                <th><?= __('Npc Id') ?></th>
                <th><?= __('Background Public') ?></th>
                <th><?= __('Background Private') ?></th>
                <th><?= __('Park Id') ?></th>
                <th><?= __('Territory Id') ?></th>
                <th><?= __('Gold') ?></th>
                <th><?= __('Iron') ?></th>
                <th><?= __('Timber') ?></th>
                <th><?= __('Stone') ?></th>
                <th><?= __('Grain') ?></th>
                <th><?= __('Action Id') ?></th>
                <th><?= __('Is Knight') ?></th>
                <th><?= __('Is Rebel') ?></th>
                <th><?= __('Is Monarch') ?></th>
                <th><?= __('Fiefs Assigned') ?></th>
                <th><?= __('Shattered') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Deceased') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($vocation->personas as $personas): ?>
                <tr>
                    <td><?= h($personas->id) ?></td>
                    <td><?= h($personas->orkID) ?></td>
                    <td><?= h($personas->user_id) ?></td>
                    <td><?= h($personas->name) ?></td>
                    <td><?= h($personas->long_name) ?></td>
                    <td><?= h($personas->image) ?></td>
                    <td><?= h($personas->vocation_id) ?></td>
                    <td><?= h($personas->monster_id) ?></td>
                    <td><?= h($personas->npc_id) ?></td>
                    <td><?= h($personas->background_public) ?></td>
                    <td><?= h($personas->background_private) ?></td>
                    <td><?= h($personas->park_id) ?></td>
                    <td><?= h($personas->territory_id) ?></td>
                    <td><?= h($personas->gold) ?></td>
                    <td><?= h($personas->iron) ?></td>
                    <td><?= h($personas->timber) ?></td>
                    <td><?= h($personas->stone) ?></td>
                    <td><?= h($personas->grain) ?></td>
                    <td><?= h($personas->action_id) ?></td>
                    <td><?= h($personas->is_knight) ?></td>
                    <td><?= h($personas->is_rebel) ?></td>
                    <td><?= h($personas->is_monarch) ?></td>
                    <td><?= h($personas->fiefs_assigned) ?></td>
                    <td><?= h($personas->shattered) ?></td>
                    <td><?= h($personas->created) ?></td>
                    <td><?= h($personas->modified) ?></td>
                    <td><?= h($personas->deceased) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Personas', 'action' => 'view', $personas->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Personas', 'action' => 'edit', $personas->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Personas', 'action' => 'delete', $personas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $personas->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Personas</p>
    <?php endif; ?>
</div>
