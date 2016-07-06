<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Park'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sectors'), ['controller' => 'Sectors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sector'), ['controller' => 'Sectors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fiefdoms'), ['controller' => 'Fiefdoms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fiefdom'), ['controller' => 'Fiefdoms', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="parks index large-9 medium-8 columns content">
    <h3><?= __('Parks') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('rank') ?></th>
                <th><?= $this->Paginator->sort('sector_id') ?></th>
                <th><?= $this->Paginator->sort('midreign') ?></th>
                <th><?= $this->Paginator->sort('coronation') ?></th>
                <th><?= $this->Paginator->sort('tax_rate') ?></th>
                <th><?= $this->Paginator->sort('tax_type') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($parks as $park): ?>
            <tr>
                <td><?= $this->Number->format($park->id) ?></td>
                <td><?= h($park->name) ?></td>
                <td><?= h($park->rank) ?></td>
                <td><?= $park->has('sector') ? $this->Html->link($park->sector->id, ['controller' => 'Sectors', 'action' => 'view', $park->sector->id]) : '' ?></td>
                <td><?= h($park->midreign) ?></td>
                <td><?= h($park->coronation) ?></td>
                <td><?= $this->Number->format($park->tax_rate) ?></td>
                <td><?= h($park->tax_type) ?></td>
                <td><?= h($park->created) ?></td>
                <td><?= h($park->modified) ?></td>
                <td><?= h($park->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $park->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $park->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $park->id], ['confirm' => __('Are you sure you want to delete # {0}?', $park->id)]) ?>
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
