<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Equipment'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Buildings'), ['controller' => 'Buildings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Building'), ['controller' => 'Buildings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Npcs'), ['controller' => 'Npcs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Npc'), ['controller' => 'Npcs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="equipments index large-9 medium-8 columns content">
    <h3><?= __('Equipments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('price') ?></th>
                <th><?= $this->Paginator->sort('units') ?></th>
                <th><?= $this->Paginator->sort('weight') ?></th>
                <th><?= $this->Paginator->sort('cargo') ?></th>
                <th><?= $this->Paginator->sort('craft_gold') ?></th>
                <th><?= $this->Paginator->sort('craft_iron') ?></th>
                <th><?= $this->Paginator->sort('craft_timber') ?></th>
                <th><?= $this->Paginator->sort('craft_stone') ?></th>
                <th><?= $this->Paginator->sort('craft_grain') ?></th>
                <th><?= $this->Paginator->sort('craft_actions') ?></th>
                <th><?= $this->Paginator->sort('building_id') ?></th>
                <th><?= $this->Paginator->sort('is_artifact') ?></th>
                <th><?= $this->Paginator->sort('is_relic') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($equipments as $equipment): ?>
            <tr>
                <td><?= $this->Number->format($equipment->id) ?></td>
                <td><?= h($equipment->name) ?></td>
                <td><?= $this->Number->format($equipment->price) ?></td>
                <td><?= $this->Number->format($equipment->units) ?></td>
                <td><?= $this->Number->format($equipment->weight) ?></td>
                <td><?= $this->Number->format($equipment->cargo) ?></td>
                <td><?= $this->Number->format($equipment->craft_gold) ?></td>
                <td><?= $this->Number->format($equipment->craft_iron) ?></td>
                <td><?= $this->Number->format($equipment->craft_timber) ?></td>
                <td><?= $this->Number->format($equipment->craft_stone) ?></td>
                <td><?= $this->Number->format($equipment->craft_grain) ?></td>
                <td><?= $this->Number->format($equipment->craft_actions) ?></td>
                <td><?= $equipment->has('building') ? $this->Html->link($equipment->building->name, ['controller' => 'Buildings', 'action' => 'view', $equipment->building->id]) : '' ?></td>
                <td><?= h($equipment->is_artifact) ?></td>
                <td><?= h($equipment->is_relic) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $equipment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $equipment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $equipment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipment->id)]) ?>
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
