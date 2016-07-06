<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Buildings Territory'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Buildings'), ['controller' => 'Buildings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Building'), ['controller' => 'Buildings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="buildingsTerritories index large-9 medium-8 columns content">
    <h3><?= __('Buildings Territories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('building_id') ?></th>
                <th><?= $this->Paginator->sort('territory_id') ?></th>
                <th><?= $this->Paginator->sort('size') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($buildingsTerritories as $buildingsTerritory): ?>
            <tr>
                <td><?= $this->Number->format($buildingsTerritory->id) ?></td>
                <td><?= h($buildingsTerritory->name) ?></td>
                <td><?= $buildingsTerritory->has('building') ? $this->Html->link($buildingsTerritory->building->name, ['controller' => 'Buildings', 'action' => 'view', $buildingsTerritory->building->id]) : '' ?></td>
                <td><?= $buildingsTerritory->has('territory') ? $this->Html->link($buildingsTerritory->territory->name, ['controller' => 'Territories', 'action' => 'view', $buildingsTerritory->territory->id]) : '' ?></td>
                <td><?= $this->Number->format($buildingsTerritory->size) ?></td>
                <td><?= h($buildingsTerritory->created) ?></td>
                <td><?= h($buildingsTerritory->modified) ?></td>
                <td><?= h($buildingsTerritory->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $buildingsTerritory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $buildingsTerritory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $buildingsTerritory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $buildingsTerritory->id)]) ?>
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
