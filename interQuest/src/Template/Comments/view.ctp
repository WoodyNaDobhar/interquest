<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
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
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
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
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($comment->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Npc') ?></td>
            <td><?= $comment->has('npc') ? $this->Html->link($comment->npc->name, ['controller' => 'Npcs', 'action' => 'view', $comment->npc->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Park') ?></td>
            <td><?= $comment->has('park') ? $this->Html->link($comment->park->name, ['controller' => 'Parks', 'action' => 'view', $comment->park->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Sector') ?></td>
            <td><?= $comment->has('sector') ? $this->Html->link($comment->sector->id, ['controller' => 'Sectors', 'action' => 'view', $comment->sector->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Territory') ?></td>
            <td><?= $comment->has('territory') ? $this->Html->link($comment->territory->name, ['controller' => 'Territories', 'action' => 'view', $comment->territory->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Persona') ?></td>
            <td><?= $comment->has('persona') ? $this->Html->link($comment->persona->name, ['controller' => 'Personas', 'action' => 'view', $comment->persona->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Subject') ?></td>
            <td><?= h($comment->subject) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($comment->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Persona Id') ?></td>
            <td><?= $this->Number->format($comment->persona_id) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($comment->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($comment->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Deleted') ?></td>
            <td><?= h($comment->deleted) ?></td>
        </tr>
        <tr>
            <td><?= __('Show Mapkeepers') ?></td>
            <td><?= $comment->show_mapkeepers ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <td><?= __('Message') ?></td>
            <td><?= $this->Text->autoParagraph(h($comment->message)); ?></td>
        </tr>
    </table>
</div>

