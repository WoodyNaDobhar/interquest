<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Sector'), ['action' => 'edit', $sector->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Sector'), ['action' => 'delete', $sector->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sector->id)]) ?> </li>
<li><?= $this->Html->link(__('List Sectors'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Sector'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Parks'), ['controller' => 'Parks', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Park'), ['controller' => 'Parks', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Sector'), ['action' => 'edit', $sector->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Sector'), ['action' => 'delete', $sector->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sector->id)]) ?> </li>
<li><?= $this->Html->link(__('List Sectors'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Sector'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Parks'), ['controller' => 'Parks', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Park'), ['controller' => 'Parks', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($sector->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($sector->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Row') ?></td>
            <td><?= $this->Number->format($sector->row) ?></td>
        </tr>
        <tr>
            <td><?= __('Column') ?></td>
            <td><?= $this->Number->format($sector->column) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Comments') ?></h3>
    </div>
    <?php if (!empty($sector->comments)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Npc Id') ?></th>
                <th><?= __('Park Id') ?></th>
                <th><?= __('Persona Id') ?></th>
                <th><?= __('Sector Id') ?></th>
                <th><?= __('Territory Id') ?></th>
                <th><?= __('Author Persona Id') ?></th>
                <th><?= __('Subject') ?></th>
                <th><?= __('Message') ?></th>
                <th><?= __('Show Mapkeepers') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($sector->comments as $comments): ?>
                <tr>
                    <td><?= h($comments->id) ?></td>
                    <td><?= h($comments->npc_id) ?></td>
                    <td><?= h($comments->park_id) ?></td>
                    <td><?= h($comments->persona_id) ?></td>
                    <td><?= h($comments->sector_id) ?></td>
                    <td><?= h($comments->territory_id) ?></td>
                    <td><?= h($comments->author_persona_id) ?></td>
                    <td><?= h($comments->subject) ?></td>
                    <td><?= h($comments->message) ?></td>
                    <td><?= h($comments->show_mapkeepers) ?></td>
                    <td><?= h($comments->created) ?></td>
                    <td><?= h($comments->modified) ?></td>
                    <td><?= h($comments->deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Comments', 'action' => 'view', $comments->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Comments', 'action' => 'edit', $comments->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Comments', 'action' => 'delete', $comments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comments->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Comments</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Parks') ?></h3>
    </div>
    <?php if (!empty($sector->parks)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Rank') ?></th>
                <th><?= __('Sector Id') ?></th>
                <th><?= __('Midreign') ?></th>
                <th><?= __('Coronation') ?></th>
                <th><?= __('Tax Rate') ?></th>
                <th><?= __('Tax Type') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($sector->parks as $parks): ?>
                <tr>
                    <td><?= h($parks->id) ?></td>
                    <td><?= h($parks->name) ?></td>
                    <td><?= h($parks->rank) ?></td>
                    <td><?= h($parks->sector_id) ?></td>
                    <td><?= h($parks->midreign) ?></td>
                    <td><?= h($parks->coronation) ?></td>
                    <td><?= h($parks->tax_rate) ?></td>
                    <td><?= h($parks->tax_type) ?></td>
                    <td><?= h($parks->created) ?></td>
                    <td><?= h($parks->modified) ?></td>
                    <td><?= h($parks->deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Parks', 'action' => 'view', $parks->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Parks', 'action' => 'edit', $parks->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Parks', 'action' => 'delete', $parks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parks->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Parks</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Territories') ?></h3>
    </div>
    <?php if (!empty($sector->territories)): ?>
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
            <?php foreach ($sector->territories as $territories): ?>
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
