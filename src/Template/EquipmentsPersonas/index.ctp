<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Equipments Persona'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Equipments'), ['controller' => 'Equipments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Equipment'), ['controller' => 'Equipments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="equipmentsPersonas index large-9 medium-8 columns content">
    <h3><?= __('Equipments Personas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('equipment_id') ?></th>
                <th><?= $this->Paginator->sort('persona_id') ?></th>
                <th><?= $this->Paginator->sort('territory_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($equipmentsPersonas as $equipmentsPersona): ?>
            <tr>
                <td><?= $this->Number->format($equipmentsPersona->id) ?></td>
                <td><?= h($equipmentsPersona->name) ?></td>
                <td><?= $equipmentsPersona->has('equipment') ? $this->Html->link($equipmentsPersona->equipment->name, ['controller' => 'Equipments', 'action' => 'view', $equipmentsPersona->equipment->id]) : '' ?></td>
                <td><?= $equipmentsPersona->has('persona') ? $this->Html->link($equipmentsPersona->persona->name, ['controller' => 'Personas', 'action' => 'view', $equipmentsPersona->persona->id]) : '' ?></td>
                <td><?= $equipmentsPersona->has('territory') ? $this->Html->link($equipmentsPersona->territory->name, ['controller' => 'Territories', 'action' => 'view', $equipmentsPersona->territory->id]) : '' ?></td>
                <td><?= h($equipmentsPersona->created) ?></td>
                <td><?= h($equipmentsPersona->modified) ?></td>
                <td><?= h($equipmentsPersona->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $equipmentsPersona->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $equipmentsPersona->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $equipmentsPersona->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipmentsPersona->id)]) ?>
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
