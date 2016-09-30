<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Terrain'), ['action' => 'edit', $terrain->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Terrain'), ['action' => 'delete', $terrain->id], ['confirm' => __('Are you sure you want to delete # {0}?', $terrain->id)]) ?> </li>
<li><?= $this->Html->link(__('List Terrains'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Terrain'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Terrain'), ['action' => 'edit', $terrain->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Terrain'), ['action' => 'delete', $terrain->id], ['confirm' => __('Are you sure you want to delete # {0}?', $terrain->id)]) ?> </li>
<li><?= $this->Html->link(__('List Terrains'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Terrain'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($terrain->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($terrain->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Description') ?></td>
            <td><?= h($terrain->description) ?></td>
        </tr>
        <tr>
            <td><?= __('Image') ?></td>
            <td><?= h($terrain->image) ?></td>
        </tr>
        <tr>
            <td><?= __('Color') ?></td>
            <td><?= h($terrain->color) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($terrain->id) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Territories') ?></h3>
    </div>
    <?php if (!empty($terrain->territories)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Sector Id') ?></th>
                <th><?= __('Row') ?></th>
                <th><?= __('Column') ?></th>
                <th><?= __('Steward Persona Id') ?></th>
                <th><?= __('Steward Cut') ?></th>
                <th><?= __('Terrain Id') ?></th>
                <th><?= __('Primary Resource') ?></th>
                <th><?= __('Secondary Resource') ?></th>
                <th><?= __('Castle Strength') ?></th>
                <th><?= __('Is Wasteland') ?></th>
                <th><?= __('Is No Mans Land') ?></th>
                <th><?= __('Has Road') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($terrain->territories as $territories): ?>
                <tr>
                    <td><?= h($territories->id) ?></td>
                    <td><?= h($territories->name) ?></td>
                    <td><?= h($territories->sector_id) ?></td>
                    <td><?= h($territories->row) ?></td>
                    <td><?= h($territories->column) ?></td>
                    <td><?= h($territories->steward_persona_id) ?></td>
                    <td><?= h($territories->steward_cut) ?></td>
                    <td><?= h($territories->terrain_id) ?></td>
                    <td><?= h($territories->primary_resource) ?></td>
                    <td><?= h($territories->secondary_resource) ?></td>
                    <td><?= h($territories->castle_strength) ?></td>
                    <td><?= h($territories->is_wasteland) ?></td>
                    <td><?= h($territories->is_no_mans_land) ?></td>
                    <td><?= h($territories->has_road) ?></td>
                    <td><?= h($territories->created) ?></td>
                    <td><?= h($territories->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Territories', 'action' => 'view', $territories->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Territories', 'action' => 'edit', $territories->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Territories', 'action' => 'delete', $territories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $territories->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Territories</p>
    <?php endif; ?>
</div>
