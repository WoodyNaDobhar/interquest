<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fiefdom'), ['action' => 'edit', $fiefdom->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fiefdom'), ['action' => 'delete', $fiefdom->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fiefdom->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fiefdoms'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fiefdom'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Npcs'), ['controller' => 'Npcs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Npc'), ['controller' => 'Npcs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parks'), ['controller' => 'Parks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Park'), ['controller' => 'Parks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fieves'), ['controller' => 'Fieves', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fief'), ['controller' => 'Fieves', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fiefdoms view large-9 medium-8 columns content">
    <h3><?= h($fiefdom->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($fiefdom->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Persona') ?></th>
            <td><?= $fiefdom->has('persona') ? $this->Html->link($fiefdom->persona->name, ['controller' => 'Personas', 'action' => 'view', $fiefdom->persona->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Npc') ?></th>
            <td><?= $fiefdom->has('npc') ? $this->Html->link($fiefdom->npc->name, ['controller' => 'Npcs', 'action' => 'view', $fiefdom->npc->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Park') ?></th>
            <td><?= $fiefdom->has('park') ? $this->Html->link($fiefdom->park->name, ['controller' => 'Parks', 'action' => 'view', $fiefdom->park->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($fiefdom->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Fieves') ?></h4>
        <?php if (!empty($fiefdom->fieves)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Territory Id') ?></th>
                <th><?= __('Fiefdom Id') ?></th>
                <th><?= __('Persona Id') ?></th>
                <th><?= __('Npc Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($fiefdom->fieves as $fieves): ?>
            <tr>
                <td><?= h($fieves->id) ?></td>
                <td><?= h($fieves->name) ?></td>
                <td><?= h($fieves->territory_id) ?></td>
                <td><?= h($fieves->fiefdom_id) ?></td>
                <td><?= h($fieves->persona_id) ?></td>
                <td><?= h($fieves->npc_id) ?></td>
                <td><?= h($fieves->created) ?></td>
                <td><?= h($fieves->modified) ?></td>
                <td><?= h($fieves->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Fieves', 'action' => 'view', $fieves->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Fieves', 'action' => 'edit', $fieves->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fieves', 'action' => 'delete', $fieves->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fieves->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
