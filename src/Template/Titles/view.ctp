<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Title'), ['action' => 'edit', $title->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Title'), ['action' => 'delete', $title->id], ['confirm' => __('Are you sure you want to delete # {0}?', $title->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Titles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Title'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="titles view large-9 medium-8 columns content">
    <h3><?= h($title->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($title->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($title->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Fiefs Maximum') ?></th>
            <td><?= $this->Number->format($title->fiefs_maximum) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Landed') ?></th>
            <td><?= $title->is_landed ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Personas') ?></h4>
        <?php if (!empty($title->personas)): ?>
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
            <?php foreach ($title->personas as $personas): ?>
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
</div>
