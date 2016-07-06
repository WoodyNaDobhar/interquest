<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
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
</nav>
<div class="territories view large-9 medium-8 columns content">
    <h3><?= h($territory->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Sector') ?></th>
            <td><?= $territory->has('sector') ? $this->Html->link($territory->sector->id, ['controller' => 'Sectors', 'action' => 'view', $territory->sector->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Terrain') ?></th>
            <td><?= $territory->has('terrain') ? $this->Html->link($territory->terrain->name, ['controller' => 'Terrains', 'action' => 'view', $territory->terrain->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Primary Resource') ?></th>
            <td><?= h($territory->primary_resource) ?></td>
        </tr>
        <tr>
            <th><?= __('Secondary Resource') ?></th>
            <td><?= h($territory->secondary_resource) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($territory->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= $this->Number->format($territory->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Row') ?></th>
            <td><?= $this->Number->format($territory->row) ?></td>
        </tr>
        <tr>
            <th><?= __('Column') ?></th>
            <td><?= $this->Number->format($territory->column) ?></td>
        </tr>
        <tr>
            <th><?= __('Steward Persona Id') ?></th>
            <td><?= $this->Number->format($territory->steward_persona_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Steward Cut') ?></th>
            <td><?= $this->Number->format($territory->steward_cut) ?></td>
        </tr>
        <tr>
            <th><?= __('Castle Strength') ?></th>
            <td><?= $this->Number->format($territory->castle_strength) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($territory->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($territory->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Wasteland') ?></th>
            <td><?= $territory->is_wasteland ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Is No Mans Land') ?></th>
            <td><?= $territory->is_no_mans_land ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Has Road') ?></th>
            <td><?= $territory->has_road ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Personas') ?></h4>
        <?php if (!empty($territory->personas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Ork Id') ?></th>
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
            <?php foreach ($territory->personas as $personas): ?>
            <tr>
                <td><?= h($personas->id) ?></td>
                <td><?= h($personas->ork_id) ?></td>
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
                    <?= $this->Html->link(__('View'), ['controller' => 'Personas', 'action' => 'view', $personas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Personas', 'action' => 'edit', $personas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Personas', 'action' => 'delete', $personas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $personas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Comments') ?></h4>
        <?php if (!empty($territory->comments)): ?>
        <table cellpadding="0" cellspacing="0">
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
                    <?= $this->Html->link(__('View'), ['controller' => 'Comments', 'action' => 'view', $comments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Comments', 'action' => 'edit', $comments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Comments', 'action' => 'delete', $comments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Equipments Npcs') ?></h4>
        <?php if (!empty($territory->equipments_npcs)): ?>
        <table cellpadding="0" cellspacing="0">
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
                    <?= $this->Html->link(__('View'), ['controller' => 'EquipmentsNpcs', 'action' => 'view', $equipmentsNpcs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'EquipmentsNpcs', 'action' => 'edit', $equipmentsNpcs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EquipmentsNpcs', 'action' => 'delete', $equipmentsNpcs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipmentsNpcs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Equipments Personas') ?></h4>
        <?php if (!empty($territory->equipments_personas)): ?>
        <table cellpadding="0" cellspacing="0">
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
                    <?= $this->Html->link(__('View'), ['controller' => 'EquipmentsPersonas', 'action' => 'view', $equipmentsPersonas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'EquipmentsPersonas', 'action' => 'edit', $equipmentsPersonas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EquipmentsPersonas', 'action' => 'delete', $equipmentsPersonas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipmentsPersonas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Fieves') ?></h4>
        <?php if (!empty($territory->fieves)): ?>
        <table cellpadding="0" cellspacing="0">
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
                    <?= $this->Html->link(__('View'), ['controller' => 'Fieves', 'action' => 'view', $fieves->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Fieves', 'action' => 'edit', $fieves->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fieves', 'action' => 'delete', $fieves->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fieves->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Npcs') ?></h4>
        <?php if (!empty($territory->npcs)): ?>
        <table cellpadding="0" cellspacing="0">
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
                    <?= $this->Html->link(__('View'), ['controller' => 'Npcs', 'action' => 'view', $npcs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Npcs', 'action' => 'edit', $npcs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Npcs', 'action' => 'delete', $npcs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $npcs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Buildings') ?></h4>
        <?php if (!empty($territory->buildings)): ?>
        <table cellpadding="0" cellspacing="0">
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
                <th><?= __('Size Maximum') ?></th>
                <th><?= __('Builds Maximum') ?></th>
                <th><?= __('Requires Castle') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
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
                <td><?= h($buildings->size_maximum) ?></td>
                <td><?= h($buildings->builds_maximum) ?></td>
                <td><?= h($buildings->requires_castle) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Buildings', 'action' => 'view', $buildings->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Buildings', 'action' => 'edit', $buildings->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Buildings', 'action' => 'delete', $buildings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $buildings->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
