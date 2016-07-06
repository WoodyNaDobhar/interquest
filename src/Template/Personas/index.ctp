<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Persona'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vocations'), ['controller' => 'Vocations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vocation'), ['controller' => 'Vocations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Monsters'), ['controller' => 'Monsters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Monster'), ['controller' => 'Monsters', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Npcs'), ['controller' => 'Npcs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Npc'), ['controller' => 'Npcs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Parks'), ['controller' => 'Parks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Park'), ['controller' => 'Parks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fiefdoms'), ['controller' => 'Fiefdoms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fiefdom'), ['controller' => 'Fiefdoms', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Actions'), ['controller' => 'Actions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Action'), ['controller' => 'Actions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fieves'), ['controller' => 'Fieves', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fief'), ['controller' => 'Fieves', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Equipments'), ['controller' => 'Equipments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Equipment'), ['controller' => 'Equipments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Titles'), ['controller' => 'Titles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Title'), ['controller' => 'Titles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="personas index large-9 medium-8 columns content">
    <h3><?= __('Personas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('ork_id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('long_name') ?></th>
                <th><?= $this->Paginator->sort('image') ?></th>
                <th><?= $this->Paginator->sort('vocation_id') ?></th>
                <th><?= $this->Paginator->sort('monster_id') ?></th>
                <th><?= $this->Paginator->sort('npc_id') ?></th>
                <th><?= $this->Paginator->sort('park_id') ?></th>
                <th><?= $this->Paginator->sort('territory_id') ?></th>
                <th><?= $this->Paginator->sort('gold') ?></th>
                <th><?= $this->Paginator->sort('iron') ?></th>
                <th><?= $this->Paginator->sort('timber') ?></th>
                <th><?= $this->Paginator->sort('stone') ?></th>
                <th><?= $this->Paginator->sort('grain') ?></th>
                <th><?= $this->Paginator->sort('action_id') ?></th>
                <th><?= $this->Paginator->sort('is_knight') ?></th>
                <th><?= $this->Paginator->sort('is_rebel') ?></th>
                <th><?= $this->Paginator->sort('is_monarch') ?></th>
                <th><?= $this->Paginator->sort('fiefs_assigned') ?></th>
                <th><?= $this->Paginator->sort('shattered') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('deceased') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($personas as $persona): ?>
            <tr>
                <td><?= $this->Number->format($persona->id) ?></td>
                <td><?= $this->Number->format($persona->ork_id) ?></td>
                <td><?= $persona->has('user') ? $this->Html->link($persona->user->id, ['controller' => 'Users', 'action' => 'view', $persona->user->id]) : '' ?></td>
                <td><?= h($persona->name) ?></td>
                <td><?= h($persona->long_name) ?></td>
                <td><?= h($persona->image) ?></td>
                <td><?= $persona->has('vocation') ? $this->Html->link($persona->vocation->name, ['controller' => 'Vocations', 'action' => 'view', $persona->vocation->id]) : '' ?></td>
                <td><?= $persona->has('monster') ? $this->Html->link($persona->monster->name, ['controller' => 'Monsters', 'action' => 'view', $persona->monster->id]) : '' ?></td>
                <td><?= $persona->has('npc') ? $this->Html->link($persona->npc->name, ['controller' => 'Npcs', 'action' => 'view', $persona->npc->id]) : '' ?></td>
                <td><?= $persona->has('park') ? $this->Html->link($persona->park->name, ['controller' => 'Parks', 'action' => 'view', $persona->park->id]) : '' ?></td>
                <td><?= $persona->has('territory') ? $this->Html->link($persona->territory->name, ['controller' => 'Territories', 'action' => 'view', $persona->territory->id]) : '' ?></td>
                <td><?= $this->Number->format($persona->gold) ?></td>
                <td><?= $this->Number->format($persona->iron) ?></td>
                <td><?= $this->Number->format($persona->timber) ?></td>
                <td><?= $this->Number->format($persona->stone) ?></td>
                <td><?= $this->Number->format($persona->grain) ?></td>
                <td><?= $this->Number->format($persona->action_id) ?></td>
                <td><?= h($persona->is_knight) ?></td>
                <td><?= h($persona->is_rebel) ?></td>
                <td><?= h($persona->is_monarch) ?></td>
                <td><?= $this->Number->format($persona->fiefs_assigned) ?></td>
                <td><?= h($persona->shattered) ?></td>
                <td><?= h($persona->created) ?></td>
                <td><?= h($persona->modified) ?></td>
                <td><?= h($persona->deceased) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $persona->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $persona->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $persona->id], ['confirm' => __('Are you sure you want to delete # {0}?', $persona->id)]) ?>
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
