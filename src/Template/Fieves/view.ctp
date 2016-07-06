<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fief'), ['action' => 'edit', $fief->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fief'), ['action' => 'delete', $fief->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fief->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fieves'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fief'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fiefdoms'), ['controller' => 'Fiefdoms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fiefdom'), ['controller' => 'Fiefdoms', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Npcs'), ['controller' => 'Npcs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Npc'), ['controller' => 'Npcs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fieves view large-9 medium-8 columns content">
    <h3><?= h($fief->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($fief->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Territory') ?></th>
            <td><?= $fief->has('territory') ? $this->Html->link($fief->territory->name, ['controller' => 'Territories', 'action' => 'view', $fief->territory->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Fiefdom') ?></th>
            <td><?= $fief->has('fiefdom') ? $this->Html->link($fief->fiefdom->name, ['controller' => 'Fiefdoms', 'action' => 'view', $fief->fiefdom->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($fief->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Persona Id') ?></th>
            <td><?= $this->Number->format($fief->persona_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Npc Id') ?></th>
            <td><?= $this->Number->format($fief->npc_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($fief->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($fief->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Deleted') ?></th>
            <td><?= h($fief->deleted) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Personas') ?></h4>
        <?php if (!empty($fief->personas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Ork Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Long Name') ?></th>
                <th><?= __('Image') ?></th>
                <th><?= __('Vocation Id') ?></th>
                <th><?= __('Monster Id') ?></th>
                <th><?= __('Npc Id') ?></th>
                <th><?= __('Background Public') ?></th>
                <th><?= __('Background Private') ?></th>
                <th><?= __('Park Id') ?></th>
                <th><?= __('Territory Id') ?></th>
                <th><?= __('Gold') ?></th>
                <th><?= __('Iron') ?></th>
                <th><?= __('Timber') ?></th>
                <th><?= __('Stone') ?></th>
                <th><?= __('Grain') ?></th>
                <th><?= __('Action Id') ?></th>
                <th><?= __('Is Knight') ?></th>
                <th><?= __('Is Rebel') ?></th>
                <th><?= __('Is Monarch') ?></th>
                <th><?= __('Fiefs Assigned') ?></th>
                <th><?= __('Shattered') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Deceased') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($fief->personas as $personas): ?>
            <tr>
                <td><?= h($personas->id) ?></td>
                <td><?= h($personas->ork_id) ?></td>
                <td><?= h($personas->user_id) ?></td>
                <td><?= h($personas->name) ?></td>
                <td><?= h($personas->long_name) ?></td>
                <td><?= h($personas->image) ?></td>
                <td><?= h($personas->vocation_id) ?></td>
                <td><?= h($personas->monster_id) ?></td>
                <td><?= h($personas->npc_id) ?></td>
                <td><?= h($personas->background_public) ?></td>
                <td><?= h($personas->background_private) ?></td>
                <td><?= h($personas->park_id) ?></td>
                <td><?= h($personas->territory_id) ?></td>
                <td><?= h($personas->gold) ?></td>
                <td><?= h($personas->iron) ?></td>
                <td><?= h($personas->timber) ?></td>
                <td><?= h($personas->stone) ?></td>
                <td><?= h($personas->grain) ?></td>
                <td><?= h($personas->action_id) ?></td>
                <td><?= h($personas->is_knight) ?></td>
                <td><?= h($personas->is_rebel) ?></td>
                <td><?= h($personas->is_monarch) ?></td>
                <td><?= h($personas->fiefs_assigned) ?></td>
                <td><?= h($personas->shattered) ?></td>
                <td><?= h($personas->created) ?></td>
                <td><?= h($personas->modified) ?></td>
                <td><?= h($personas->deceased) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Personas', 'action' => 'view', $personas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Personas', 'action' => 'edit', $personas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Personas', 'action' => 'delete', $personas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $personas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Npcs') ?></h4>
        <?php if (!empty($fief->npcs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Private Name') ?></th>
                <th><?= __('Image') ?></th>
                <th><?= __('Vocation Id') ?></th>
                <th><?= __('Monster Id') ?></th>
                <th><?= __('Background Public') ?></th>
                <th><?= __('Background Private') ?></th>
                <th><?= __('Territory Id') ?></th>
                <th><?= __('Gold') ?></th>
                <th><?= __('Iron') ?></th>
                <th><?= __('Timber') ?></th>
                <th><?= __('Stone') ?></th>
                <th><?= __('Grain') ?></th>
                <th><?= __('Action Id') ?></th>
                <th><?= __('Deceased') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($fief->npcs as $npcs): ?>
            <tr>
                <td><?= h($npcs->id) ?></td>
                <td><?= h($npcs->name) ?></td>
                <td><?= h($npcs->private_name) ?></td>
                <td><?= h($npcs->image) ?></td>
                <td><?= h($npcs->vocation_id) ?></td>
                <td><?= h($npcs->monster_id) ?></td>
                <td><?= h($npcs->background_public) ?></td>
                <td><?= h($npcs->background_private) ?></td>
                <td><?= h($npcs->territory_id) ?></td>
                <td><?= h($npcs->gold) ?></td>
                <td><?= h($npcs->iron) ?></td>
                <td><?= h($npcs->timber) ?></td>
                <td><?= h($npcs->stone) ?></td>
                <td><?= h($npcs->grain) ?></td>
                <td><?= h($npcs->action_id) ?></td>
                <td><?= h($npcs->deceased) ?></td>
                <td><?= h($npcs->created) ?></td>
                <td><?= h($npcs->modified) ?></td>
                <td><?= h($npcs->deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Npcs', 'action' => 'view', $npcs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Npcs', 'action' => 'edit', $npcs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Npcs', 'action' => 'delete', $npcs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $npcs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
