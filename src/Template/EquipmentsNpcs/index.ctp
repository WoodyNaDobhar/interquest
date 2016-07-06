<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Equipments Npc'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Equipments'), ['controller' => 'Equipments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Equipment'), ['controller' => 'Equipments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Npcs'), ['controller' => 'Npcs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Npc'), ['controller' => 'Npcs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="equipmentsNpcs index large-9 medium-8 columns content">
    <h3><?= __('Equipments Npcs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('equipment_id') ?></th>
                <th><?= $this->Paginator->sort('npc_id') ?></th>
                <th><?= $this->Paginator->sort('territory_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($equipmentsNpcs as $equipmentsNpc): ?>
            <tr>
                <td><?= $this->Number->format($equipmentsNpc->id) ?></td>
                <td><?= h($equipmentsNpc->name) ?></td>
                <td><?= $equipmentsNpc->has('equipment') ? $this->Html->link($equipmentsNpc->equipment->name, ['controller' => 'Equipments', 'action' => 'view', $equipmentsNpc->equipment->id]) : '' ?></td>
                <td><?= $equipmentsNpc->has('npc') ? $this->Html->link($equipmentsNpc->npc->name, ['controller' => 'Npcs', 'action' => 'view', $equipmentsNpc->npc->id]) : '' ?></td>
                <td><?= $equipmentsNpc->has('territory') ? $this->Html->link($equipmentsNpc->territory->name, ['controller' => 'Territories', 'action' => 'view', $equipmentsNpc->territory->id]) : '' ?></td>
                <td><?= h($equipmentsNpc->created) ?></td>
                <td><?= h($equipmentsNpc->modified) ?></td>
                <td><?= h($equipmentsNpc->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $equipmentsNpc->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $equipmentsNpc->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $equipmentsNpc->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipmentsNpc->id)]) ?>
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
