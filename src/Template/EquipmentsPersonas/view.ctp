<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Equipments Persona'), ['action' => 'edit', $equipmentsPersona->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Equipments Persona'), ['action' => 'delete', $equipmentsPersona->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipmentsPersona->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Equipments Personas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Equipments Persona'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Equipments'), ['controller' => 'Equipments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Equipment'), ['controller' => 'Equipments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="equipmentsPersonas view large-9 medium-8 columns content">
    <h3><?= h($equipmentsPersona->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($equipmentsPersona->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Equipment') ?></th>
            <td><?= $equipmentsPersona->has('equipment') ? $this->Html->link($equipmentsPersona->equipment->name, ['controller' => 'Equipments', 'action' => 'view', $equipmentsPersona->equipment->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Persona') ?></th>
            <td><?= $equipmentsPersona->has('persona') ? $this->Html->link($equipmentsPersona->persona->name, ['controller' => 'Personas', 'action' => 'view', $equipmentsPersona->persona->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Territory') ?></th>
            <td><?= $equipmentsPersona->has('territory') ? $this->Html->link($equipmentsPersona->territory->name, ['controller' => 'Territories', 'action' => 'view', $equipmentsPersona->territory->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($equipmentsPersona->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($equipmentsPersona->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($equipmentsPersona->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Deleted') ?></th>
            <td><?= h($equipmentsPersona->deleted) ?></td>
        </tr>
    </table>
</div>
