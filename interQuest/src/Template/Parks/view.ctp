<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Park'), ['action' => 'edit', $park->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Park'), ['action' => 'delete', $park->id], ['confirm' => __('Are you sure you want to delete # {0}?', $park->id)]) ?> </li>
<li><?= $this->Html->link(__('List Parks'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Park'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Sectors'), ['controller' => 'Sectors', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Sector'), ['controller' => 'Sectors', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Fiefdoms'), ['controller' => 'Fiefdoms', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Fiefdom'), ['controller' => 'Fiefdoms', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Park'), ['action' => 'edit', $park->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Park'), ['action' => 'delete', $park->id], ['confirm' => __('Are you sure you want to delete # {0}?', $park->id)]) ?> </li>
<li><?= $this->Html->link(__('List Parks'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Park'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Sectors'), ['controller' => 'Sectors', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Sector'), ['controller' => 'Sectors', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Fiefdoms'), ['controller' => 'Fiefdoms', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Fiefdom'), ['controller' => 'Fiefdoms', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($park->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($park->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Rank') ?></td>
            <td><?= h($park->rank) ?></td>
        </tr>
        <tr>
            <td><?= __('Sector') ?></td>
            <td><?= $park->has('sector') ? $this->Html->link($park->sector->id, ['controller' => 'Sectors', 'action' => 'view', $park->sector->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Tax Type') ?></td>
            <td><?= h($park->tax_type) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($park->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Tax Rate') ?></td>
            <td><?= $this->Number->format($park->tax_rate) ?></td>
        </tr>
        <tr>
            <td><?= __('Midreign') ?></td>
            <td><?= h($park->midreign) ?></td>
        </tr>
        <tr>
            <td><?= __('Coronation') ?></td>
            <td><?= h($park->coronation) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($park->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($park->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Deleted') ?></td>
            <td><?= h($park->deleted) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Comments') ?></h3>
    </div>
    <?php if (!empty($park->comments)): ?>
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
            <?php foreach ($park->comments as $comments): ?>
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
        <h3 class="panel-title"><?= __('Related Fiefdoms') ?></h3>
    </div>
    <?php if (!empty($park->fiefdoms)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Persona Id') ?></th>
                <th><?= __('Npc Id') ?></th>
                <th><?= __('Park Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($park->fiefdoms as $fiefdoms): ?>
                <tr>
                    <td><?= h($fiefdoms->id) ?></td>
                    <td><?= h($fiefdoms->name) ?></td>
                    <td><?= h($fiefdoms->persona_id) ?></td>
                    <td><?= h($fiefdoms->npc_id) ?></td>
                    <td><?= h($fiefdoms->park_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Fiefdoms', 'action' => 'view', $fiefdoms->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Fiefdoms', 'action' => 'edit', $fiefdoms->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Fiefdoms', 'action' => 'delete', $fiefdoms->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fiefdoms->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Fiefdoms</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Personas') ?></h3>
    </div>
    <?php if (!empty($park->personas)): ?>
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
            <?php foreach ($park->personas as $personas): ?>
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
