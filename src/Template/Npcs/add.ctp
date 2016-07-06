<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Npcs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Vocations'), ['controller' => 'Vocations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vocation'), ['controller' => 'Vocations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Monsters'), ['controller' => 'Monsters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Monster'), ['controller' => 'Monsters', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Actions'), ['controller' => 'Actions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Action'), ['controller' => 'Actions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fiefdoms'), ['controller' => 'Fiefdoms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fiefdom'), ['controller' => 'Fiefdoms', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fieves'), ['controller' => 'Fieves', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fief'), ['controller' => 'Fieves', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Equipments'), ['controller' => 'Equipments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Equipment'), ['controller' => 'Equipments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="npcs form large-9 medium-8 columns content">
    <?= $this->Form->create($npc) ?>
    <fieldset>
        <legend><?= __('Add Npc') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('private_name');
            echo $this->Form->input('image');
            echo $this->Form->input('vocation_id', ['options' => $vocations]);
            echo $this->Form->input('monster_id', ['options' => $monsters, 'empty' => true]);
            echo $this->Form->input('background_public');
            echo $this->Form->input('background_private');
            echo $this->Form->input('territory_id', ['options' => $territories]);
            echo $this->Form->input('gold');
            echo $this->Form->input('iron');
            echo $this->Form->input('timber');
            echo $this->Form->input('stone');
            echo $this->Form->input('grain');
            echo $this->Form->input('action_id', ['options' => $actions, 'empty' => true]);
            echo $this->Form->input('deceased', ['empty' => true]);
            echo $this->Form->input('deleted', ['empty' => true]);
            echo $this->Form->input('fieves._ids', ['options' => $fieves]);
            echo $this->Form->input('equipments._ids', ['options' => $equipments]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
