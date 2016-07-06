<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Building'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Equipments'), ['controller' => 'Equipments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Equipment'), ['controller' => 'Equipments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="buildings index large-9 medium-8 columns content">
    <h3><?= __('Buildings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('cost_gold') ?></th>
                <th><?= $this->Paginator->sort('cost_iron') ?></th>
                <th><?= $this->Paginator->sort('cost_timber') ?></th>
                <th><?= $this->Paginator->sort('cost_stone') ?></th>
                <th><?= $this->Paginator->sort('cost_grain') ?></th>
                <th><?= $this->Paginator->sort('cost_actions') ?></th>
                <th><?= $this->Paginator->sort('size_maximum') ?></th>
                <th><?= $this->Paginator->sort('builds_maximum') ?></th>
                <th><?= $this->Paginator->sort('requires_castle') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($buildings as $building): ?>
            <tr>
                <td><?= $this->Number->format($building->id) ?></td>
                <td><?= h($building->name) ?></td>
                <td><?= $this->Number->format($building->cost_gold) ?></td>
                <td><?= $this->Number->format($building->cost_iron) ?></td>
                <td><?= $this->Number->format($building->cost_timber) ?></td>
                <td><?= $this->Number->format($building->cost_stone) ?></td>
                <td><?= $this->Number->format($building->cost_grain) ?></td>
                <td><?= $this->Number->format($building->cost_actions) ?></td>
                <td><?= $this->Number->format($building->size_maximum) ?></td>
                <td><?= $this->Number->format($building->builds_maximum) ?></td>
                <td><?= h($building->requires_castle) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $building->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $building->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $building->id], ['confirm' => __('Are you sure you want to delete # {0}?', $building->id)]) ?>
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
