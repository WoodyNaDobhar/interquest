<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Building'), ['action' => 'edit', $building->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Building'), ['action' => 'delete', $building->id], ['confirm' => __('Are you sure you want to delete # {0}?', $building->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Buildings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Building'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Equipments'), ['controller' => 'Equipments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Equipment'), ['controller' => 'Equipments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="buildings view large-9 medium-8 columns content">
    <h3><?= h($building->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($building->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($building->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Cost Gold') ?></th>
            <td><?= $this->Number->format($building->cost_gold) ?></td>
        </tr>
        <tr>
            <th><?= __('Cost Iron') ?></th>
            <td><?= $this->Number->format($building->cost_iron) ?></td>
        </tr>
        <tr>
            <th><?= __('Cost Timber') ?></th>
            <td><?= $this->Number->format($building->cost_timber) ?></td>
        </tr>
        <tr>
            <th><?= __('Cost Stone') ?></th>
            <td><?= $this->Number->format($building->cost_stone) ?></td>
        </tr>
        <tr>
            <th><?= __('Cost Grain') ?></th>
            <td><?= $this->Number->format($building->cost_grain) ?></td>
        </tr>
        <tr>
            <th><?= __('Cost Actions') ?></th>
            <td><?= $this->Number->format($building->cost_actions) ?></td>
        </tr>
        <tr>
            <th><?= __('Size Maximum') ?></th>
            <td><?= $this->Number->format($building->size_maximum) ?></td>
        </tr>
        <tr>
            <th><?= __('Builds Maximum') ?></th>
            <td><?= $this->Number->format($building->builds_maximum) ?></td>
        </tr>
        <tr>
            <th><?= __('Requires Castle') ?></th>
            <td><?= $building->requires_castle ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($building->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Equipments') ?></h4>
        <?php if (!empty($building->equipments)): ?>
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
            <?php foreach ($building->equipments as $equipments): ?>
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
        <h4><?= __('Related Territories') ?></h4>
        <?php if (!empty($building->territories)): ?>
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
            <?php foreach ($building->territories as $territories): ?>
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
