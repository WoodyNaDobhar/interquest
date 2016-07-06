<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Comment'), ['action' => 'edit', $comment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Comment'), ['action' => 'delete', $comment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Comments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Comment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Npcs'), ['controller' => 'Npcs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Npc'), ['controller' => 'Npcs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parks'), ['controller' => 'Parks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Park'), ['controller' => 'Parks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sectors'), ['controller' => 'Sectors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sector'), ['controller' => 'Sectors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="comments view large-9 medium-8 columns content">
    <h3><?= h($comment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Npc') ?></th>
            <td><?= $comment->has('npc') ? $this->Html->link($comment->npc->name, ['controller' => 'Npcs', 'action' => 'view', $comment->npc->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Park') ?></th>
            <td><?= $comment->has('park') ? $this->Html->link($comment->park->name, ['controller' => 'Parks', 'action' => 'view', $comment->park->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Sector') ?></th>
            <td><?= $comment->has('sector') ? $this->Html->link($comment->sector->id, ['controller' => 'Sectors', 'action' => 'view', $comment->sector->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Territory') ?></th>
            <td><?= $comment->has('territory') ? $this->Html->link($comment->territory->name, ['controller' => 'Territories', 'action' => 'view', $comment->territory->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Persona') ?></th>
            <td><?= $comment->has('persona') ? $this->Html->link($comment->persona->name, ['controller' => 'Personas', 'action' => 'view', $comment->persona->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Subject') ?></th>
            <td><?= h($comment->subject) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($comment->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Persona Id') ?></th>
            <td><?= $this->Number->format($comment->persona_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($comment->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($comment->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Deleted') ?></th>
            <td><?= h($comment->deleted) ?></td>
        </tr>
        <tr>
            <th><?= __('Show Mapkeepers') ?></th>
            <td><?= $comment->show_mapkeepers ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Message') ?></h4>
        <?= $this->Text->autoParagraph(h($comment->message)); ?>
    </div>
</div>
