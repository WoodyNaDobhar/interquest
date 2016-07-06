<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Fief'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fiefdoms'), ['controller' => 'Fiefdoms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fiefdom'), ['controller' => 'Fiefdoms', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Npcs'), ['controller' => 'Npcs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Npc'), ['controller' => 'Npcs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fieves index large-9 medium-8 columns content">
    <h3><?= __('Fieves') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('territory_id') ?></th>
                <th><?= $this->Paginator->sort('fiefdom_id') ?></th>
                <th><?= $this->Paginator->sort('persona_id') ?></th>
                <th><?= $this->Paginator->sort('npc_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fieves as $fief): ?>
            <tr>
                <td><?= $this->Number->format($fief->id) ?></td>
                <td><?= h($fief->name) ?></td>
                <td><?= $fief->has('territory') ? $this->Html->link($fief->territory->name, ['controller' => 'Territories', 'action' => 'view', $fief->territory->id]) : '' ?></td>
                <td><?= $fief->has('fiefdom') ? $this->Html->link($fief->fiefdom->name, ['controller' => 'Fiefdoms', 'action' => 'view', $fief->fiefdom->id]) : '' ?></td>
                <td><?= $this->Number->format($fief->persona_id) ?></td>
                <td><?= $this->Number->format($fief->npc_id) ?></td>
                <td><?= h($fief->created) ?></td>
                <td><?= h($fief->modified) ?></td>
                <td><?= h($fief->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $fief->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fief->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fief->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fief->id)]) ?>
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
