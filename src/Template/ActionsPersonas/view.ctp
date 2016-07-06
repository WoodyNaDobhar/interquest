<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Actions Persona'), ['action' => 'edit', $actionsPersona->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Actions Persona'), ['action' => 'delete', $actionsPersona->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actionsPersona->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Actions Personas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Actions Persona'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Actions'), ['controller' => 'Actions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Action'), ['controller' => 'Actions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="actionsPersonas view large-9 medium-8 columns content">
    <h3><?= h($actionsPersona->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Action') ?></th>
            <td><?= $actionsPersona->has('action') ? $this->Html->link($actionsPersona->action->name, ['controller' => 'Actions', 'action' => 'view', $actionsPersona->action->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Persona') ?></th>
            <td><?= $actionsPersona->has('persona') ? $this->Html->link($actionsPersona->persona->name, ['controller' => 'Personas', 'action' => 'view', $actionsPersona->persona->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($actionsPersona->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($actionsPersona->created) ?></td>
        </tr>
    </table>
</div>
