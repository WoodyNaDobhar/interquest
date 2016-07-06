<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Territory'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sectors'), ['controller' => 'Sectors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sector'), ['controller' => 'Sectors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Terrains'), ['controller' => 'Terrains', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Terrain'), ['controller' => 'Terrains', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Equipments Npcs'), ['controller' => 'EquipmentsNpcs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Equipments Npc'), ['controller' => 'EquipmentsNpcs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Equipments Personas'), ['controller' => 'EquipmentsPersonas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Equipments Persona'), ['controller' => 'EquipmentsPersonas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fieves'), ['controller' => 'Fieves', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fief'), ['controller' => 'Fieves', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Npcs'), ['controller' => 'Npcs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Npc'), ['controller' => 'Npcs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Buildings'), ['controller' => 'Buildings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Building'), ['controller' => 'Buildings', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="territories index large-9 medium-8 columns content">
    <h3><?= __('Territories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('sector_id') ?></th>
                <th><?= $this->Paginator->sort('row') ?></th>
                <th><?= $this->Paginator->sort('column') ?></th>
                <th><?= $this->Paginator->sort('steward_persona_id') ?></th>
                <th><?= $this->Paginator->sort('steward_cut') ?></th>
                <th><?= $this->Paginator->sort('terrain_id') ?></th>
                <th><?= $this->Paginator->sort('primary_resource') ?></th>
                <th><?= $this->Paginator->sort('secondary_resource') ?></th>
                <th><?= $this->Paginator->sort('castle_strength') ?></th>
                <th><?= $this->Paginator->sort('is_wasteland') ?></th>
                <th><?= $this->Paginator->sort('is_no_mans_land') ?></th>
                <th><?= $this->Paginator->sort('has_road') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($territories as $territory): ?>
            <tr>
                <td><?= $this->Number->format($territory->id) ?></td>
                <td><?= $this->Number->format($territory->name) ?></td>
                <td><?= $territory->has('sector') ? $this->Html->link($territory->sector->id, ['controller' => 'Sectors', 'action' => 'view', $territory->sector->id]) : '' ?></td>
                <td><?= $this->Number->format($territory->row) ?></td>
                <td><?= $this->Number->format($territory->column) ?></td>
                <td><?= $this->Number->format($territory->steward_persona_id) ?></td>
                <td><?= $this->Number->format($territory->steward_cut) ?></td>
                <td><?= $territory->has('terrain') ? $this->Html->link($territory->terrain->name, ['controller' => 'Terrains', 'action' => 'view', $territory->terrain->id]) : '' ?></td>
                <td><?= h($territory->primary_resource) ?></td>
                <td><?= h($territory->secondary_resource) ?></td>
                <td><?= $this->Number->format($territory->castle_strength) ?></td>
                <td><?= h($territory->is_wasteland) ?></td>
                <td><?= h($territory->is_no_mans_land) ?></td>
                <td><?= h($territory->has_road) ?></td>
                <td><?= h($territory->created) ?></td>
                <td><?= h($territory->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $territory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $territory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $territory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $territory->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
