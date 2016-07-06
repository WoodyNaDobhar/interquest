<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $vocation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $vocation->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Vocations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Npcs'), ['controller' => 'Npcs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Npc'), ['controller' => 'Npcs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vocations form large-9 medium-8 columns content">
    <?= $this->Form->create($vocation) ?>
    <fieldset>
        <legend><?= __('Edit Vocation') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('ability');
            echo $this->Form->input('ability_description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
