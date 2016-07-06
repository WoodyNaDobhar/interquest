<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Equipments Npc'), ['action' => 'edit', $equipmentsNpc->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Equipments Npc'), ['action' => 'delete', $equipmentsNpc->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipmentsNpc->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Equipments Npcs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Equipments Npc'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Equipments'), ['controller' => 'Equipments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Equipment'), ['controller' => 'Equipments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Npcs'), ['controller' => 'Npcs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Npc'), ['controller' => 'Npcs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="equipmentsNpcs view large-9 medium-8 columns content">
    <h3><?= h($equipmentsNpc->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($equipmentsNpc->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Equipment') ?></th>
            <td><?= $equipmentsNpc->has('equipment') ? $this->Html->link($equipmentsNpc->equipment->name, ['controller' => 'Equipments', 'action' => 'view', $equipmentsNpc->equipment->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Npc') ?></th>
            <td><?= $equipmentsNpc->has('npc') ? $this->Html->link($equipmentsNpc->npc->name, ['controller' => 'Npcs', 'action' => 'view', $equipmentsNpc->npc->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Territory') ?></th>
            <td><?= $equipmentsNpc->has('territory') ? $this->Html->link($equipmentsNpc->territory->name, ['controller' => 'Territories', 'action' => 'view', $equipmentsNpc->territory->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($equipmentsNpc->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($equipmentsNpc->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($equipmentsNpc->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Deleted') ?></th>
            <td><?= h($equipmentsNpc->deleted) ?></td>
        </tr>
    </table>
</div>
