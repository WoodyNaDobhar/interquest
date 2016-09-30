<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Building'), ['action' => 'edit', $building->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Building'), ['action' => 'delete', $building->id], ['confirm' => __('Are you sure you want to delete # {0}?', $building->id)]) ?> </li>
<li><?= $this->Html->link(__('List Buildings'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Building'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Equipments'), ['controller' => 'Equipments', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Equipment'), ['controller' => 'Equipments', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Building'), ['action' => 'edit', $building->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Building'), ['action' => 'delete', $building->id], ['confirm' => __('Are you sure you want to delete # {0}?', $building->id)]) ?> </li>
<li><?= $this->Html->link(__('List Buildings'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Building'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Equipments'), ['controller' => 'Equipments', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Equipment'), ['controller' => 'Equipments', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($building->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($building->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Resource Required') ?></td>
            <td><?= h($building->resource_required) ?></td>
        </tr>
        <tr>
            <td><?= __('Building Required') ?></td>
            <td><?= h($building->building_required) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($building->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Cost Gold') ?></td>
            <td><?= $this->Number->format($building->cost_gold) ?></td>
        </tr>
        <tr>
            <td><?= __('Cost Iron') ?></td>
            <td><?= $this->Number->format($building->cost_iron) ?></td>
        </tr>
        <tr>
            <td><?= __('Cost Timber') ?></td>
            <td><?= $this->Number->format($building->cost_timber) ?></td>
        </tr>
        <tr>
            <td><?= __('Cost Stone') ?></td>
            <td><?= $this->Number->format($building->cost_stone) ?></td>
        </tr>
        <tr>
            <td><?= __('Cost Grain') ?></td>
            <td><?= $this->Number->format($building->cost_grain) ?></td>
        </tr>
        <tr>
            <td><?= __('Cost Actions') ?></td>
            <td><?= $this->Number->format($building->cost_actions) ?></td>
        </tr>
        <tr>
            <td><?= __('Expandable') ?></td>
            <td><?= $this->Number->format($building->expandable) ?></td>
        </tr>
        <tr>
            <td><?= __('Builds Maximum') ?></td>
            <td><?= $this->Number->format($building->builds_maximum) ?></td>
        </tr>
        <tr>
            <td><?= __('Waterway Required') ?></td>
            <td><?= $building->waterway_required ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <td><?= __('Description') ?></td>
            <td><?= $this->Text->autoParagraph(h($building->description)); ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Equipments') ?></h3>
    </div>
    <?php if (!empty($building->equipments)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Price') ?></th>
                <th><?= __('Units') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Weight') ?></th>
                <th><?= __('Cargo') ?></th>
                <th><?= __('Craft Gold') ?></th>
                <th><?= __('Craft Iron') ?></th>
                <th><?= __('Craft Timber') ?></th>
                <th><?= __('Craft Stone') ?></th>
                <th><?= __('Craft Grain') ?></th>
                <th><?= __('Craft Actions') ?></th>
                <th><?= __('Building Id') ?></th>
                <th><?= __('Is Artifact') ?></th>
                <th><?= __('Is Relic') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($building->equipments as $equipments): ?>
                <tr>
                    <td><?= h($equipments->id) ?></td>
                    <td><?= h($equipments->name) ?></td>
                    <td><?= h($equipments->price) ?></td>
                    <td><?= h($equipments->units) ?></td>
                    <td><?= h($equipments->description) ?></td>
                    <td><?= h($equipments->weight) ?></td>
                    <td><?= h($equipments->cargo) ?></td>
                    <td><?= h($equipments->craft_gold) ?></td>
                    <td><?= h($equipments->craft_iron) ?></td>
                    <td><?= h($equipments->craft_timber) ?></td>
                    <td><?= h($equipments->craft_stone) ?></td>
                    <td><?= h($equipments->craft_grain) ?></td>
                    <td><?= h($equipments->craft_actions) ?></td>
                    <td><?= h($equipments->building_id) ?></td>
                    <td><?= h($equipments->is_artifact) ?></td>
                    <td><?= h($equipments->is_relic) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Equipments', 'action' => 'view', $equipments->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Equipments', 'action' => 'edit', $equipments->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Equipments', 'action' => 'delete', $equipments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipments->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Equipments</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Territories') ?></h3>
    </div>
    <?php if (!empty($building->territories)): ?>
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
            <?php foreach ($building->territories as $territories): ?>
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
