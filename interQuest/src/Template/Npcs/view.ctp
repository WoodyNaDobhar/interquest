<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Npc'), ['action' => 'edit', $npc->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Npc'), ['action' => 'delete', $npc->id], ['confirm' => __('Are you sure you want to delete # {0}?', $npc->id)]) ?> </li>
<li><?= $this->Html->link(__('List Npcs'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Npc'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Vocations'), ['controller' => 'Vocations', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Vocation'), ['controller' => 'Vocations', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Monsters'), ['controller' => 'Monsters', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Monster'), ['controller' => 'Monsters', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Actions'), ['controller' => 'Actions', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Action'), ['controller' => 'Actions', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Fiefdoms'), ['controller' => 'Fiefdoms', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Fiefdom'), ['controller' => 'Fiefdoms', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Fieves'), ['controller' => 'Fieves', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Fief'), ['controller' => 'Fieves', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Equipments'), ['controller' => 'Equipments', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Equipment'), ['controller' => 'Equipments', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Npc'), ['action' => 'edit', $npc->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Npc'), ['action' => 'delete', $npc->id], ['confirm' => __('Are you sure you want to delete # {0}?', $npc->id)]) ?> </li>
<li><?= $this->Html->link(__('List Npcs'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Npc'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Vocations'), ['controller' => 'Vocations', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Vocation'), ['controller' => 'Vocations', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Monsters'), ['controller' => 'Monsters', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Monster'), ['controller' => 'Monsters', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Actions'), ['controller' => 'Actions', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Action'), ['controller' => 'Actions', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Fiefdoms'), ['controller' => 'Fiefdoms', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Fiefdom'), ['controller' => 'Fiefdoms', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Fieves'), ['controller' => 'Fieves', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Fief'), ['controller' => 'Fieves', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Equipments'), ['controller' => 'Equipments', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Equipment'), ['controller' => 'Equipments', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($npc->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($npc->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Private Name') ?></td>
            <td><?= h($npc->private_name) ?></td>
        </tr>
        <tr>
            <td><?= __('Image') ?></td>
            <td><?= h($npc->image) ?></td>
        </tr>
        <tr>
            <td><?= __('Vocation') ?></td>
            <td><?= $npc->has('vocation') ? $this->Html->link($npc->vocation->name, ['controller' => 'Vocations', 'action' => 'view', $npc->vocation->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Monster') ?></td>
            <td><?= $npc->has('monster') ? $this->Html->link($npc->monster->name, ['controller' => 'Monsters', 'action' => 'view', $npc->monster->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Territory') ?></td>
            <td><?= $npc->has('territory') ? $this->Html->link($npc->territory->name, ['controller' => 'Territories', 'action' => 'view', $npc->territory->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Action') ?></td>
            <td><?= $npc->has('action') ? $this->Html->link($npc->action->name, ['controller' => 'Actions', 'action' => 'view', $npc->action->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($npc->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Gold') ?></td>
            <td><?= $this->Number->format($npc->gold) ?></td>
        </tr>
        <tr>
            <td><?= __('Iron') ?></td>
            <td><?= $this->Number->format($npc->iron) ?></td>
        </tr>
        <tr>
            <td><?= __('Timber') ?></td>
            <td><?= $this->Number->format($npc->timber) ?></td>
        </tr>
        <tr>
            <td><?= __('Stone') ?></td>
            <td><?= $this->Number->format($npc->stone) ?></td>
        </tr>
        <tr>
            <td><?= __('Grain') ?></td>
            <td><?= $this->Number->format($npc->grain) ?></td>
        </tr>
        <tr>
            <td><?= __('Deceased') ?></td>
            <td><?= h($npc->deceased) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($npc->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($npc->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Deleted') ?></td>
            <td><?= h($npc->deleted) ?></td>
        </tr>
        <tr>
            <td><?= __('Background Public') ?></td>
            <td><?= $this->Text->autoParagraph(h($npc->background_public)); ?></td>
        </tr>
        <tr>
            <td><?= __('Background Private') ?></td>
            <td><?= $this->Text->autoParagraph(h($npc->background_private)); ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Comments') ?></h3>
    </div>
    <?php if (!empty($npc->comments)): ?>
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
            <?php foreach ($npc->comments as $comments): ?>
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
    <?php if (!empty($npc->fiefdoms)): ?>
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
            <?php foreach ($npc->fiefdoms as $fiefdoms): ?>
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
    <?php if (!empty($npc->personas)): ?>
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
            <?php foreach ($npc->personas as $personas): ?>
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
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Fieves') ?></h3>
    </div>
    <?php if (!empty($npc->fieves)): ?>
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
            <?php foreach ($npc->fieves as $fieves): ?>
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
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Equipments') ?></h3>
    </div>
    <?php if (!empty($npc->equipments)): ?>
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
            <?php foreach ($npc->equipments as $equipments): ?>
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
