<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Persona'), ['action' => 'edit', $persona->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Persona'), ['action' => 'delete', $persona->id], ['confirm' => __('Are you sure you want to delete # {0}?', $persona->id)]) ?> </li>
<li><?= $this->Html->link(__('List Personas'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Persona'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Vocations'), ['controller' => 'Vocations', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Vocation'), ['controller' => 'Vocations', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Monsters'), ['controller' => 'Monsters', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Monster'), ['controller' => 'Monsters', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Npcs'), ['controller' => 'Npcs', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Npc'), ['controller' => 'Npcs', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Parks'), ['controller' => 'Parks', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Park'), ['controller' => 'Parks', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Fiefdoms'), ['controller' => 'Fiefdoms', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Fiefdom'), ['controller' => 'Fiefdoms', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Actions'), ['controller' => 'Actions', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Action'), ['controller' => 'Actions', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Fieves'), ['controller' => 'Fieves', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Fief'), ['controller' => 'Fieves', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Equipments'), ['controller' => 'Equipments', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Equipment'), ['controller' => 'Equipments', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Titles'), ['controller' => 'Titles', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Title'), ['controller' => 'Titles', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Persona'), ['action' => 'edit', $persona->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Persona'), ['action' => 'delete', $persona->id], ['confirm' => __('Are you sure you want to delete # {0}?', $persona->id)]) ?> </li>
<li><?= $this->Html->link(__('List Personas'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Persona'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Vocations'), ['controller' => 'Vocations', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Vocation'), ['controller' => 'Vocations', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Monsters'), ['controller' => 'Monsters', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Monster'), ['controller' => 'Monsters', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Npcs'), ['controller' => 'Npcs', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Npc'), ['controller' => 'Npcs', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Parks'), ['controller' => 'Parks', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Park'), ['controller' => 'Parks', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Fiefdoms'), ['controller' => 'Fiefdoms', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Fiefdom'), ['controller' => 'Fiefdoms', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Actions'), ['controller' => 'Actions', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Action'), ['controller' => 'Actions', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Fieves'), ['controller' => 'Fieves', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Fief'), ['controller' => 'Fieves', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Equipments'), ['controller' => 'Equipments', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Equipment'), ['controller' => 'Equipments', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Titles'), ['controller' => 'Titles', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Title'), ['controller' => 'Titles', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($persona->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('User Id') ?></td>
            <td><?= h($persona->user_id) ?></td>
        </tr>
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($persona->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Long Name') ?></td>
            <td><?= h($persona->long_name) ?></td>
        </tr>
        <tr>
            <td><?= __('Image') ?></td>
            <td><?= h($persona->image) ?></td>
        </tr>
        <tr>
            <td><?= __('Vocation') ?></td>
            <td><?= $persona->has('vocation') ? $this->Html->link($persona->vocation->name, ['controller' => 'Vocations', 'action' => 'view', $persona->vocation->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Monster') ?></td>
            <td><?= $persona->has('monster') ? $this->Html->link($persona->monster->name, ['controller' => 'Monsters', 'action' => 'view', $persona->monster->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Npc') ?></td>
            <td><?= $persona->has('npc') ? $this->Html->link($persona->npc->name, ['controller' => 'Npcs', 'action' => 'view', $persona->npc->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Park') ?></td>
            <td><?= $persona->has('park') ? $this->Html->link($persona->park->name, ['controller' => 'Parks', 'action' => 'view', $persona->park->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Territory') ?></td>
            <td><?= $persona->has('territory') ? $this->Html->link($persona->territory->name, ['controller' => 'Territories', 'action' => 'view', $persona->territory->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($persona->id) ?></td>
        </tr>
        <tr>
            <td><?= __('OrkID') ?></td>
            <td><?= $this->Number->format($persona->orkID) ?></td>
        </tr>
        <tr>
            <td><?= __('Gold') ?></td>
            <td><?= $this->Number->format($persona->gold) ?></td>
        </tr>
        <tr>
            <td><?= __('Iron') ?></td>
            <td><?= $this->Number->format($persona->iron) ?></td>
        </tr>
        <tr>
            <td><?= __('Timber') ?></td>
            <td><?= $this->Number->format($persona->timber) ?></td>
        </tr>
        <tr>
            <td><?= __('Stone') ?></td>
            <td><?= $this->Number->format($persona->stone) ?></td>
        </tr>
        <tr>
            <td><?= __('Grain') ?></td>
            <td><?= $this->Number->format($persona->grain) ?></td>
        </tr>
        <tr>
            <td><?= __('Action Id') ?></td>
            <td><?= $this->Number->format($persona->action_id) ?></td>
        </tr>
        <tr>
            <td><?= __('Fiefs Assigned') ?></td>
            <td><?= $this->Number->format($persona->fiefs_assigned) ?></td>
        </tr>
        <tr>
            <td><?= __('Shattered') ?></td>
            <td><?= h($persona->shattered) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($persona->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($persona->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Deceased') ?></td>
            <td><?= h($persona->deceased) ?></td>
        </tr>
        <tr>
            <td><?= __('Is Knight') ?></td>
            <td><?= $persona->is_knight ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <td><?= __('Is Rebel') ?></td>
            <td><?= $persona->is_rebel ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <td><?= __('Is Monarch') ?></td>
            <td><?= $persona->is_monarch ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <td><?= __('Background Public') ?></td>
            <td><?= $this->Text->autoParagraph(h($persona->background_public)); ?></td>
        </tr>
        <tr>
            <td><?= __('Background Private') ?></td>
            <td><?= $this->Text->autoParagraph(h($persona->background_private)); ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Comments') ?></h3>
    </div>
    <?php if (!empty($persona->comments)): ?>
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
            <?php foreach ($persona->comments as $comments): ?>
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
    <?php if (!empty($persona->fiefdoms)): ?>
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
            <?php foreach ($persona->fiefdoms as $fiefdoms): ?>
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
        <h3 class="panel-title"><?= __('Related Actions') ?></h3>
    </div>
    <?php if (!empty($persona->actions)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Is Common') ?></th>
                <th><?= __('Is Landed') ?></th>
                <th><?= __('Check Required') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($persona->actions as $actions): ?>
                <tr>
                    <td><?= h($actions->id) ?></td>
                    <td><?= h($actions->name) ?></td>
                    <td><?= h($actions->description) ?></td>
                    <td><?= h($actions->is_common) ?></td>
                    <td><?= h($actions->is_landed) ?></td>
                    <td><?= h($actions->check_required) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Actions', 'action' => 'view', $actions->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Actions', 'action' => 'edit', $actions->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Actions', 'action' => 'delete', $actions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actions->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Actions</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Fieves') ?></h3>
    </div>
    <?php if (!empty($persona->fieves)): ?>
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
            <?php foreach ($persona->fieves as $fieves): ?>
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
    <?php if (!empty($persona->equipments)): ?>
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
            <?php foreach ($persona->equipments as $equipments): ?>
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
        <h3 class="panel-title"><?= __('Related Titles') ?></h3>
    </div>
    <?php if (!empty($persona->titles)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Is Landed') ?></th>
                <th><?= __('Fiefs Maximum') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($persona->titles as $titles): ?>
                <tr>
                    <td><?= h($titles->id) ?></td>
                    <td><?= h($titles->name) ?></td>
                    <td><?= h($titles->is_landed) ?></td>
                    <td><?= h($titles->fiefs_maximum) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Titles', 'action' => 'view', $titles->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Titles', 'action' => 'edit', $titles->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Titles', 'action' => 'delete', $titles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $titles->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Titles</p>
    <?php endif; ?>
</div>
