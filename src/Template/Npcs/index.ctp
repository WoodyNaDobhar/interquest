<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Npc'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vocations'), ['controller' => 'Vocations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vocation'), ['controller' => 'Vocations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Monsters'), ['controller' => 'Monsters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Monster'), ['controller' => 'Monsters', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Actions'), ['controller' => 'Actions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Action'), ['controller' => 'Actions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fiefdoms'), ['controller' => 'Fiefdoms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fiefdom'), ['controller' => 'Fiefdoms', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fieves'), ['controller' => 'Fieves', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fief'), ['controller' => 'Fieves', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Equipments'), ['controller' => 'Equipments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Equipment'), ['controller' => 'Equipments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="npcs index large-9 medium-8 columns content">
    <h3><?= __('Npcs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('private_name') ?></th>
                <th><?= $this->Paginator->sort('image') ?></th>
                <th><?= $this->Paginator->sort('vocation_id') ?></th>
                <th><?= $this->Paginator->sort('monster_id') ?></th>
                <th><?= $this->Paginator->sort('territory_id') ?></th>
                <th><?= $this->Paginator->sort('gold') ?></th>
                <th><?= $this->Paginator->sort('iron') ?></th>
                <th><?= $this->Paginator->sort('timber') ?></th>
                <th><?= $this->Paginator->sort('stone') ?></th>
                <th><?= $this->Paginator->sort('grain') ?></th>
                <th><?= $this->Paginator->sort('action_id') ?></th>
                <th><?= $this->Paginator->sort('deceased') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($npcs as $npc): ?>
            <tr>
                <td><?= $this->Number->format($npc->id) ?></td>
                <td><?= h($npc->name) ?></td>
                <td><?= h($npc->private_name) ?></td>
                <td><?= h($npc->image) ?></td>
                <td><?= $npc->has('vocation') ? $this->Html->link($npc->vocation->name, ['controller' => 'Vocations', 'action' => 'view', $npc->vocation->id]) : '' ?></td>
                <td><?= $npc->has('monster') ? $this->Html->link($npc->monster->name, ['controller' => 'Monsters', 'action' => 'view', $npc->monster->id]) : '' ?></td>
                <td><?= $npc->has('territory') ? $this->Html->link($npc->territory->name, ['controller' => 'Territories', 'action' => 'view', $npc->territory->id]) : '' ?></td>
                <td><?= $this->Number->format($npc->gold) ?></td>
                <td><?= $this->Number->format($npc->iron) ?></td>
                <td><?= $this->Number->format($npc->timber) ?></td>
                <td><?= $this->Number->format($npc->stone) ?></td>
                <td><?= $this->Number->format($npc->grain) ?></td>
                <td><?= $npc->has('action') ? $this->Html->link($npc->action->name, ['controller' => 'Actions', 'action' => 'view', $npc->action->id]) : '' ?></td>
                <td><?= h($npc->deceased) ?></td>
                <td><?= h($npc->created) ?></td>
                <td><?= h($npc->modified) ?></td>
                <td><?= h($npc->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $npc->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $npc->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $npc->id], ['confirm' => __('Are you sure you want to delete # {0}?', $npc->id)]) ?>
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
