<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
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
</nav>
<div class="parks view large-9 medium-8 columns content">
    <h3><?= h($park->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($park->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Rank') ?></th>
            <td><?= h($park->rank) ?></td>
        </tr>
        <tr>
            <th><?= __('Sector') ?></th>
            <td><?= $park->has('sector') ? $this->Html->link($park->sector->id, ['controller' => 'Sectors', 'action' => 'view', $park->sector->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Tax Type') ?></th>
            <td><?= h($park->tax_type) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($park->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Tax Rate') ?></th>
            <td><?= $this->Number->format($park->tax_rate) ?></td>
        </tr>
        <tr>
            <th><?= __('Midreign') ?></th>
            <td><?= h($park->midreign) ?></td>
        </tr>
        <tr>
            <th><?= __('Coronation') ?></th>
            <td><?= h($park->coronation) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($park->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($park->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Deleted') ?></th>
            <td><?= h($park->deleted) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Comments') ?></h4>
        <?php if (!empty($park->comments)): ?>
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
        <?php if (!empty($park->fiefdoms)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Persona Id') ?></th>
                <th><?= __('Npc Id') ?></th>
                <th><?= __('Park Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($park->fiefdoms as $fiefdoms): ?>
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
        <?php if (!empty($park->personas)): ?>
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
            <?php foreach ($park->personas as $personas): ?>
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
</div>
