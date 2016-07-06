<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Buildings Territory'), ['action' => 'edit', $buildingsTerritory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Buildings Territory'), ['action' => 'delete', $buildingsTerritory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $buildingsTerritory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Buildings Territories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Buildings Territory'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Buildings'), ['controller' => 'Buildings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Building'), ['controller' => 'Buildings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="buildingsTerritories view large-9 medium-8 columns content">
    <h3><?= h($buildingsTerritory->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($buildingsTerritory->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Building') ?></th>
            <td><?= $buildingsTerritory->has('building') ? $this->Html->link($buildingsTerritory->building->name, ['controller' => 'Buildings', 'action' => 'view', $buildingsTerritory->building->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Territory') ?></th>
            <td><?= $buildingsTerritory->has('territory') ? $this->Html->link($buildingsTerritory->territory->name, ['controller' => 'Territories', 'action' => 'view', $buildingsTerritory->territory->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($buildingsTerritory->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Size') ?></th>
            <td><?= $this->Number->format($buildingsTerritory->size) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($buildingsTerritory->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($buildingsTerritory->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Deleted') ?></th>
            <td><?= h($buildingsTerritory->deleted) ?></td>
        </tr>
    </table>
</div>
