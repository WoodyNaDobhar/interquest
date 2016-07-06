<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Actions Persona'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Actions'), ['controller' => 'Actions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Action'), ['controller' => 'Actions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="actionsPersonas index large-9 medium-8 columns content">
    <h3><?= __('Actions Personas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('action_id') ?></th>
                <th><?= $this->Paginator->sort('persona_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($actionsPersonas as $actionsPersona): ?>
            <tr>
                <td><?= $this->Number->format($actionsPersona->id) ?></td>
                <td><?= $actionsPersona->has('action') ? $this->Html->link($actionsPersona->action->name, ['controller' => 'Actions', 'action' => 'view', $actionsPersona->action->id]) : '' ?></td>
                <td><?= $actionsPersona->has('persona') ? $this->Html->link($actionsPersona->persona->name, ['controller' => 'Personas', 'action' => 'view', $actionsPersona->persona->id]) : '' ?></td>
                <td><?= h($actionsPersona->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $actionsPersona->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $actionsPersona->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $actionsPersona->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actionsPersona->id)]) ?>
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
