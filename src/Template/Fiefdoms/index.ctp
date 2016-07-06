<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Fiefdom'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Npcs'), ['controller' => 'Npcs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Npc'), ['controller' => 'Npcs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Parks'), ['controller' => 'Parks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Park'), ['controller' => 'Parks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fieves'), ['controller' => 'Fieves', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fief'), ['controller' => 'Fieves', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fiefdoms index large-9 medium-8 columns content">
    <h3><?= __('Fiefdoms') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('persona_id') ?></th>
                <th><?= $this->Paginator->sort('npc_id') ?></th>
                <th><?= $this->Paginator->sort('park_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fiefdoms as $fiefdom): ?>
            <tr>
                <td><?= $this->Number->format($fiefdom->id) ?></td>
                <td><?= h($fiefdom->name) ?></td>
                <td><?= $fiefdom->has('persona') ? $this->Html->link($fiefdom->persona->name, ['controller' => 'Personas', 'action' => 'view', $fiefdom->persona->id]) : '' ?></td>
                <td><?= $fiefdom->has('npc') ? $this->Html->link($fiefdom->npc->name, ['controller' => 'Npcs', 'action' => 'view', $fiefdom->npc->id]) : '' ?></td>
                <td><?= $fiefdom->has('park') ? $this->Html->link($fiefdom->park->name, ['controller' => 'Parks', 'action' => 'view', $fiefdom->park->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $fiefdom->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fiefdom->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fiefdom->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fiefdom->id)]) ?>
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
