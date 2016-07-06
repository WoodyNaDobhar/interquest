<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $fief->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $fief->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Fieves'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fiefdoms'), ['controller' => 'Fiefdoms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fiefdom'), ['controller' => 'Fiefdoms', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Npcs'), ['controller' => 'Npcs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Npc'), ['controller' => 'Npcs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fieves form large-9 medium-8 columns content">
    <?= $this->Form->create($fief) ?>
    <fieldset>
        <legend><?= __('Edit Fief') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('territory_id', ['options' => $territories]);
            echo $this->Form->input('fiefdom_id', ['options' => $fiefdoms]);
            echo $this->Form->input('persona_id');
            echo $this->Form->input('npc_id');
            echo $this->Form->input('deleted', ['empty' => true]);
            echo $this->Form->input('personas._ids', ['options' => $personas]);
            echo $this->Form->input('npcs._ids', ['options' => $npcs]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
