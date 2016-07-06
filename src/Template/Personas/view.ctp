<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Persona'), ['action' => 'edit', $persona->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Persona'), ['action' => 'delete', $persona->id], ['confirm' => __('Are you sure you want to delete # {0}?', $persona->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Personas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Persona'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
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
</nav>
<div class="personas view large-9 medium-8 columns content">
    <h3><?= h($persona->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $persona->has('user') ? $this->Html->link($persona->user->id, ['controller' => 'Users', 'action' => 'view', $persona->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($persona->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Long Name') ?></th>
            <td><?= h($persona->long_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Image') ?></th>
            <td><?= h($persona->image) ?></td>
        </tr>
        <tr>
            <th><?= __('Vocation') ?></th>
            <td><?= $persona->has('vocation') ? $this->Html->link($persona->vocation->name, ['controller' => 'Vocations', 'action' => 'view', $persona->vocation->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Monster') ?></th>
            <td><?= $persona->has('monster') ? $this->Html->link($persona->monster->name, ['controller' => 'Monsters', 'action' => 'view', $persona->monster->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Npc') ?></th>
            <td><?= $persona->has('npc') ? $this->Html->link($persona->npc->name, ['controller' => 'Npcs', 'action' => 'view', $persona->npc->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Park') ?></th>
            <td><?= $persona->has('park') ? $this->Html->link($persona->park->name, ['controller' => 'Parks', 'action' => 'view', $persona->park->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Territory') ?></th>
            <td><?= $persona->has('territory') ? $this->Html->link($persona->territory->name, ['controller' => 'Territories', 'action' => 'view', $persona->territory->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($persona->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Ork Id') ?></th>
            <td><?= $this->Number->format($persona->ork_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Gold') ?></th>
            <td><?= $this->Number->format($persona->gold) ?></td>
        </tr>
        <tr>
            <th><?= __('Iron') ?></th>
            <td><?= $this->Number->format($persona->iron) ?></td>
        </tr>
        <tr>
            <th><?= __('Timber') ?></th>
            <td><?= $this->Number->format($persona->timber) ?></td>
        </tr>
        <tr>
            <th><?= __('Stone') ?></th>
            <td><?= $this->Number->format($persona->stone) ?></td>
        </tr>
        <tr>
            <th><?= __('Grain') ?></th>
            <td><?= $this->Number->format($persona->grain) ?></td>
        </tr>
        <tr>
            <th><?= __('Action Id') ?></th>
            <td><?= $this->Number->format($persona->action_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Fiefs Assigned') ?></th>
            <td><?= $this->Number->format($persona->fiefs_assigned) ?></td>
        </tr>
        <tr>
            <th><?= __('Shattered') ?></th>
            <td><?= h($persona->shattered) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($persona->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($persona->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Deceased') ?></th>
            <td><?= h($persona->deceased) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Knight') ?></th>
            <td><?= $persona->is_knight ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Is Rebel') ?></th>
            <td><?= $persona->is_rebel ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Is Monarch') ?></th>
            <td><?= $persona->is_monarch ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Background Public') ?></h4>
        <?= $this->Text->autoParagraph(h($persona->background_public)); ?>
    </div>
    <div class="row">
        <h4><?= __('Background Private') ?></h4>
        <?= $this->Text->autoParagraph(h($persona->background_private)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Comments') ?></h4>
        <?php if (!empty($persona->comments)): ?>
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
        <?php if (!empty($persona->fiefdoms)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Persona Id') ?></th>
                <th><?= __('Npc Id') ?></th>
                <th><?= __('Park Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($persona->fiefdoms as $fiefdoms): ?>
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
        <h4><?= __('Related Actions') ?></h4>
        <?php if (!empty($persona->actions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Is Common') ?></th>
                <th><?= __('Is Landed') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($persona->actions as $actions): ?>
            <tr>
                <td><?= h($actions->id) ?></td>
                <td><?= h($actions->name) ?></td>
                <td><?= h($actions->description) ?></td>
                <td><?= h($actions->is_common) ?></td>
                <td><?= h($actions->is_landed) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Actions', 'action' => 'view', $actions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Actions', 'action' => 'edit', $actions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Actions', 'action' => 'delete', $actions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Fieves') ?></h4>
        <?php if (!empty($persona->fieves)): ?>
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
        <?php if (!empty($persona->equipments)): ?>
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
                    <?= $this->Html->link(__('View'), ['controller' => 'Equipments', 'action' => 'view', $equipments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Equipments', 'action' => 'edit', $equipments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Equipments', 'action' => 'delete', $equipments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Titles') ?></h4>
        <?php if (!empty($persona->titles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Is Landed') ?></th>
                <th><?= __('Fiefs Maximum') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($persona->titles as $titles): ?>
            <tr>
                <td><?= h($titles->id) ?></td>
                <td><?= h($titles->name) ?></td>
                <td><?= h($titles->is_landed) ?></td>
                <td><?= h($titles->fiefs_maximum) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Titles', 'action' => 'view', $titles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Titles', 'action' => 'edit', $titles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Titles', 'action' => 'delete', $titles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $titles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
