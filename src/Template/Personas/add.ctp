<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Personas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vocations'), ['controller' => 'Vocations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vocation'), ['controller' => 'Vocations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Monsters'), ['controller' => 'Monsters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Monster'), ['controller' => 'Monsters', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Npcs'), ['controller' => 'Npcs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Npc'), ['controller' => 'Npcs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Parks'), ['controller' => 'Parks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Park'), ['controller' => 'Parks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fiefdoms'), ['controller' => 'Fiefdoms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fiefdom'), ['controller' => 'Fiefdoms', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Actions'), ['controller' => 'Actions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Action'), ['controller' => 'Actions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fieves'), ['controller' => 'Fieves', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fief'), ['controller' => 'Fieves', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Equipments'), ['controller' => 'Equipments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Equipment'), ['controller' => 'Equipments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Titles'), ['controller' => 'Titles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Title'), ['controller' => 'Titles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="personas form large-9 medium-8 columns content">
    <?= $this->Form->create($persona) ?>
    <fieldset>
        <legend><?= __('Add Persona') ?></legend>
        <?php
            echo $this->Form->input('ork_id');
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('name');
            echo $this->Form->input('long_name');
            echo $this->Form->input('image');
            echo $this->Form->input('vocation_id', ['options' => $vocations, 'empty' => true]);
            echo $this->Form->input('monster_id', ['options' => $monsters, 'empty' => true]);
            echo $this->Form->input('npc_id', ['options' => $npcs, 'empty' => true]);
            echo $this->Form->input('background_public');
            echo $this->Form->input('background_private');
            echo $this->Form->input('park_id', ['options' => $parks, 'empty' => true]);
            echo $this->Form->input('territory_id', ['options' => $territories, 'empty' => true]);
            echo $this->Form->input('gold');
            echo $this->Form->input('iron');
            echo $this->Form->input('timber');
            echo $this->Form->input('stone');
            echo $this->Form->input('grain');
            echo $this->Form->input('action_id');
            echo $this->Form->input('is_knight');
            echo $this->Form->input('is_rebel');
            echo $this->Form->input('is_monarch');
            echo $this->Form->input('fiefs_assigned');
            echo $this->Form->input('shattered', ['empty' => true]);
            echo $this->Form->input('deceased', ['empty' => true]);
            echo $this->Form->input('actions._ids', ['options' => $actions]);
            echo $this->Form->input('fieves._ids', ['options' => $fieves]);
            echo $this->Form->input('equipments._ids', ['options' => $equipments]);
            echo $this->Form->input('titles._ids', ['options' => $titles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
