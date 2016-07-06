<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
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
</nav>
<div class="sectors view large-9 medium-8 columns content">
    <h3><?= h($sector->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($sector->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Row') ?></th>
            <td><?= $this->Number->format($sector->row) ?></td>
        </tr>
        <tr>
            <th><?= __('Column') ?></th>
            <td><?= $this->Number->format($sector->column) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Comments') ?></h4>
        <?php if (!empty($sector->comments)): ?>
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
        <h4><?= __('Related Parks') ?></h4>
        <?php if (!empty($sector->parks)): ?>
        <table cellpadding="0" cellspacing="0">
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
                    <?= $this->Html->link(__('View'), ['controller' => 'Parks', 'action' => 'view', $parks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Parks', 'action' => 'edit', $parks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Parks', 'action' => 'delete', $parks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parks->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Territories') ?></h4>
        <?php if (!empty($sector->territories)): ?>
        <table cellpadding="0" cellspacing="0">
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
                    <?= $this->Html->link(__('View'), ['controller' => 'Territories', 'action' => 'view', $territories->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Territories', 'action' => 'edit', $territories->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Territories', 'action' => 'delete', $territories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $territories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
