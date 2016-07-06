<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Comment'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Npcs'), ['controller' => 'Npcs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Npc'), ['controller' => 'Npcs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Parks'), ['controller' => 'Parks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Park'), ['controller' => 'Parks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sectors'), ['controller' => 'Sectors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sector'), ['controller' => 'Sectors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="comments index large-9 medium-8 columns content">
    <h3><?= __('Comments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('npc_id') ?></th>
                <th><?= $this->Paginator->sort('park_id') ?></th>
                <th><?= $this->Paginator->sort('persona_id') ?></th>
                <th><?= $this->Paginator->sort('sector_id') ?></th>
                <th><?= $this->Paginator->sort('territory_id') ?></th>
                <th><?= $this->Paginator->sort('author_persona_id') ?></th>
                <th><?= $this->Paginator->sort('subject') ?></th>
                <th><?= $this->Paginator->sort('show_mapkeepers') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comments as $comment): ?>
            <tr>
                <td><?= $this->Number->format($comment->id) ?></td>
                <td><?= $comment->has('npc') ? $this->Html->link($comment->npc->name, ['controller' => 'Npcs', 'action' => 'view', $comment->npc->id]) : '' ?></td>
                <td><?= $comment->has('park') ? $this->Html->link($comment->park->name, ['controller' => 'Parks', 'action' => 'view', $comment->park->id]) : '' ?></td>
                <td><?= $this->Number->format($comment->persona_id) ?></td>
                <td><?= $comment->has('sector') ? $this->Html->link($comment->sector->id, ['controller' => 'Sectors', 'action' => 'view', $comment->sector->id]) : '' ?></td>
                <td><?= $comment->has('territory') ? $this->Html->link($comment->territory->name, ['controller' => 'Territories', 'action' => 'view', $comment->territory->id]) : '' ?></td>
                <td><?= $comment->has('persona') ? $this->Html->link($comment->persona->name, ['controller' => 'Personas', 'action' => 'view', $comment->persona->id]) : '' ?></td>
                <td><?= h($comment->subject) ?></td>
                <td><?= h($comment->show_mapkeepers) ?></td>
                <td><?= h($comment->created) ?></td>
                <td><?= h($comment->modified) ?></td>
                <td><?= h($comment->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $comment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $comment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $comment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comment->id)]) ?>
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
