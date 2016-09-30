<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Territory'), ['action' => 'edit', $territory->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Territory'), ['action' => 'delete', $territory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $territory->id)]) ?> </li>
<li><?= $this->Html->link(__('List Territories'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Territory'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Sectors'), ['controller' => 'Sectors', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Sector'), ['controller' => 'Sectors', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Terrains'), ['controller' => 'Terrains', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Terrain'), ['controller' => 'Terrains', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Equipments Npcs'), ['controller' => 'EquipmentsNpcs', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Equipments Npc'), ['controller' => 'EquipmentsNpcs', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Equipments Personas'), ['controller' => 'EquipmentsPersonas', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Equipments Persona'), ['controller' => 'EquipmentsPersonas', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Fieves'), ['controller' => 'Fieves', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Fief'), ['controller' => 'Fieves', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Npcs'), ['controller' => 'Npcs', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Npc'), ['controller' => 'Npcs', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Buildings'), ['controller' => 'Buildings', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Building'), ['controller' => 'Buildings', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Territory'), ['action' => 'edit', $territory->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Territory'), ['action' => 'delete', $territory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $territory->id)]) ?> </li>
<li><?= $this->Html->link(__('List Territories'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Territory'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Sectors'), ['controller' => 'Sectors', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Sector'), ['controller' => 'Sectors', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Terrains'), ['controller' => 'Terrains', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Terrain'), ['controller' => 'Terrains', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Equipments Npcs'), ['controller' => 'EquipmentsNpcs', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Equipments Npc'), ['controller' => 'EquipmentsNpcs', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Equipments Personas'), ['controller' => 'EquipmentsPersonas', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Equipments Persona'), ['controller' => 'EquipmentsPersonas', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Fieves'), ['controller' => 'Fieves', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Fief'), ['controller' => 'Fieves', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Npcs'), ['controller' => 'Npcs', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Npc'), ['controller' => 'Npcs', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Buildings'), ['controller' => 'Buildings', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Building'), ['controller' => 'Buildings', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($territory->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Sector') ?></td>
            <td><?= $territory->has('sector') ? $this->Html->link($territory->sector->id, ['controller' => 'Sectors', 'action' => 'view', $territory->sector->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Terrain') ?></td>
            <td><?= $territory->has('terrain') ? $this->Html->link($territory->terrain->name, ['controller' => 'Terrains', 'action' => 'view', $territory->terrain->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Primary Resource') ?></td>
            <td><?= h($territory->primary_resource) ?></td>
        </tr>
        <tr>
            <td><?= __('Secondary Resource') ?></td>
            <td><?= h($territory->secondary_resource) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($territory->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= $this->Number->format($territory->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Row') ?></td>
            <td><?= $this->Number->format($territory->row) ?></td>
        </tr>
        <tr>
            <td><?= __('Column') ?></td>
            <td><?= $this->Number->format($territory->column) ?></td>
        </tr>
        <tr>
            <td><?= __('Steward Persona Id') ?></td>
            <td><?= $this->Number->format($territory->steward_persona_id) ?></td>
        </tr>
        <tr>
            <td><?= __('Steward Cut') ?></td>
            <td><?= $this->Number->format($territory->steward_cut) ?></td>
        </tr>
        <tr>
            <td><?= __('Castle Strength') ?></td>
            <td><?= $this->Number->format($territory->castle_strength) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($territory->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($territory->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Is Wasteland') ?></td>
            <td><?= $territory->is_wasteland ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <td><?= __('Is No Mans Land') ?></td>
            <td><?= $territory->is_no_mans_land ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <td><?= __('Has Road') ?></td>
            <td><?= $territory->has_road ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Personas') ?></h3>
    </div>
    <?php if (!empty($territory->personas)): ?>
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
            <?php foreach ($territory->personas as $personas): ?>
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
        <h3 class="panel-title"><?= __('Related Comments') ?></h3>
    </div>
    <?php if (!empty($territory->comments)): ?>
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
            <?php foreach ($territory->comments as $comments): ?>
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
        <h3 class="panel-title"><?= __('Related EquipmentsNpcs') ?></h3>
    </div>
    <?php if (!empty($territory->equipments_npcs)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Equipment Id') ?></th>
                <th><?= __('Npc Id') ?></th>
                <th><?= __('Territory Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($territory->equipments_npcs as $equipmentsNpcs): ?>
                <tr>
                    <td><?= h($equipmentsNpcs->id) ?></td>
                    <td><?= h($equipmentsNpcs->name) ?></td>
                    <td><?= h($equipmentsNpcs->equipment_id) ?></td>
                    <td><?= h($equipmentsNpcs->npc_id) ?></td>
                    <td><?= h($equipmentsNpcs->territory_id) ?></td>
                    <td><?= h($equipmentsNpcs->created) ?></td>
                    <td><?= h($equipmentsNpcs->modified) ?></td>
                    <td><?= h($equipmentsNpcs->deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'EquipmentsNpcs', 'action' => 'view', $equipmentsNpcs->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'EquipmentsNpcs', 'action' => 'edit', $equipmentsNpcs->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'EquipmentsNpcs', 'action' => 'delete', $equipmentsNpcs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipmentsNpcs->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related EquipmentsNpcs</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related EquipmentsPersonas') ?></h3>
    </div>
    <?php if (!empty($territory->equipments_personas)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Equipment Id') ?></th>
                <th><?= __('Persona Id') ?></th>
                <th><?= __('Territory Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($territory->equipments_personas as $equipmentsPersonas): ?>
                <tr>
                    <td><?= h($equipmentsPersonas->id) ?></td>
                    <td><?= h($equipmentsPersonas->name) ?></td>
                    <td><?= h($equipmentsPersonas->equipment_id) ?></td>
                    <td><?= h($equipmentsPersonas->persona_id) ?></td>
                    <td><?= h($equipmentsPersonas->territory_id) ?></td>
                    <td><?= h($equipmentsPersonas->created) ?></td>
                    <td><?= h($equipmentsPersonas->modified) ?></td>
                    <td><?= h($equipmentsPersonas->deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'EquipmentsPersonas', 'action' => 'view', $equipmentsPersonas->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'EquipmentsPersonas', 'action' => 'edit', $equipmentsPersonas->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'EquipmentsPersonas', 'action' => 'delete', $equipmentsPersonas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipmentsPersonas->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related EquipmentsPersonas</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Fieves') ?></h3>
    </div>
    <?php if (!empty($territory->fieves)): ?>
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
            <?php foreach ($territory->fieves as $fieves): ?>
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
        <h3 class="panel-title"><?= __('Related Npcs') ?></h3>
    </div>
    <?php if (!empty($territory->npcs)): ?>
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
            <?php foreach ($territory->npcs as $npcs): ?>
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
        <h3 class="panel-title"><?= __('Related Buildings') ?></h3>
    </div>
    <?php if (!empty($territory->buildings)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Cost Gold') ?></th>
                <th><?= __('Cost Iron') ?></th>
                <th><?= __('Cost Timber') ?></th>
                <th><?= __('Cost Stone') ?></th>
                <th><?= __('Cost Grain') ?></th>
                <th><?= __('Cost Actions') ?></th>
                <th><?= __('Expandable') ?></th>
                <th><?= __('Builds Maximum') ?></th>
                <th><?= __('Resource Required') ?></th>
                <th><?= __('Building Required') ?></th>
                <th><?= __('Waterway Required') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($territory->buildings as $buildings): ?>
                <tr>
                    <td><?= h($buildings->id) ?></td>
                    <td><?= h($buildings->name) ?></td>
                    <td><?= h($buildings->description) ?></td>
                    <td><?= h($buildings->cost_gold) ?></td>
                    <td><?= h($buildings->cost_iron) ?></td>
                    <td><?= h($buildings->cost_timber) ?></td>
                    <td><?= h($buildings->cost_stone) ?></td>
                    <td><?= h($buildings->cost_grain) ?></td>
                    <td><?= h($buildings->cost_actions) ?></td>
                    <td><?= h($buildings->expandable) ?></td>
                    <td><?= h($buildings->builds_maximum) ?></td>
                    <td><?= h($buildings->resource_required) ?></td>
                    <td><?= h($buildings->building_required) ?></td>
                    <td><?= h($buildings->waterway_required) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Buildings', 'action' => 'view', $buildings->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Buildings', 'action' => 'edit', $buildings->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Buildings', 'action' => 'delete', $buildings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $buildings->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Buildings</p>
    <?php endif; ?>
</div>
