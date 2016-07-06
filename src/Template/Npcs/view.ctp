<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
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
</nav>
<div class="npcs view large-9 medium-8 columns content">
    <h3><?= h($npc->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($npc->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Private Name') ?></th>
            <td><?= h($npc->private_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Image') ?></th>
            <td><?= h($npc->image) ?></td>
        </tr>
        <tr>
            <th><?= __('Vocation') ?></th>
            <td><?= $npc->has('vocation') ? $this->Html->link($npc->vocation->name, ['controller' => 'Vocations', 'action' => 'view', $npc->vocation->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Monster') ?></th>
            <td><?= $npc->has('monster') ? $this->Html->link($npc->monster->name, ['controller' => 'Monsters', 'action' => 'view', $npc->monster->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Territory') ?></th>
            <td><?= $npc->has('territory') ? $this->Html->link($npc->territory->name, ['controller' => 'Territories', 'action' => 'view', $npc->territory->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Action') ?></th>
            <td><?= $npc->has('action') ? $this->Html->link($npc->action->name, ['controller' => 'Actions', 'action' => 'view', $npc->action->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($npc->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Gold') ?></th>
            <td><?= $this->Number->format($npc->gold) ?></td>
        </tr>
        <tr>
            <th><?= __('Iron') ?></th>
            <td><?= $this->Number->format($npc->iron) ?></td>
        </tr>
        <tr>
            <th><?= __('Timber') ?></th>
            <td><?= $this->Number->format($npc->timber) ?></td>
        </tr>
        <tr>
            <th><?= __('Stone') ?></th>
            <td><?= $this->Number->format($npc->stone) ?></td>
        </tr>
        <tr>
            <th><?= __('Grain') ?></th>
            <td><?= $this->Number->format($npc->grain) ?></td>
        </tr>
        <tr>
            <th><?= __('Deceased') ?></th>
            <td><?= h($npc->deceased) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($npc->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($npc->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Deleted') ?></th>
            <td><?= h($npc->deleted) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Background Public') ?></h4>
        <?= $this->Text->autoParagraph(h($npc->background_public)); ?>
    </div>
    <div class="row">
        <h4><?= __('Background Private') ?></h4>
        <?= $this->Text->autoParagraph(h($npc->background_private)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Comments') ?></h4>
        <?php if (!empty($npc->comments)): ?>
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
        <h4><?= __('Related Fiefdoms') ?></h4>
        <?php if (!empty($npc->fiefdoms)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Persona Id') ?></th>
                <th><?= __('Npc Id') ?></th>
                <th><?= __('Park Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($npc->fiefdoms as $fiefdoms): ?>
            <tr>
                <td><?= h($fiefdoms->id) ?></td>
                <td><?= h($fiefdoms->name) ?></td>
                <td><?= h($fiefdoms->persona_id) ?></td>
                <td><?= h($fiefdoms->npc_id) ?></td>
                <td><?= h($fiefdoms->park_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Fiefdoms', 'action' => 'view', $fiefdoms->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Fiefdoms', 'action' => 'edit', $fiefdoms->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fiefdoms', 'action' => 'delete', $fiefdoms->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fiefdoms->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Personas') ?></h4>
        <?php if (!empty($npc->personas)): ?>
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
            <?php foreach ($npc->personas as $personas): ?>
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
        <h4><?= __('Related Fieves') ?></h4>
        <?php if (!empty($npc->fieves)): ?>
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
        <h4><?= __('Related Equipments') ?></h4>
        <?php if (!empty($npc->equipments)): ?>
        <table cellpadding="0" cellspacing="0">
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
                    <?= $this->Html->link(__('View'), ['controller' => 'Equipments', 'action' => 'view', $equipments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Equipments', 'action' => 'edit', $equipments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Equipments', 'action' => 'delete', $equipments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
