<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Terrain'), ['action' => 'edit', $terrain->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Terrain'), ['action' => 'delete', $terrain->id], ['confirm' => __('Are you sure you want to delete # {0}?', $terrain->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Terrains'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Terrain'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="terrains view large-9 medium-8 columns content">
    <h3><?= h($terrain->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($terrain->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($terrain->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Image') ?></th>
            <td><?= h($terrain->image) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($terrain->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Territories') ?></h4>
        <?php if (!empty($terrain->territories)): ?>
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
            <?php foreach ($terrain->territories as $territories): ?>
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
