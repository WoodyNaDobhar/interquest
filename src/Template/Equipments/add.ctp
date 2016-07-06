<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Equipments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Buildings'), ['controller' => 'Buildings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Building'), ['controller' => 'Buildings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Npcs'), ['controller' => 'Npcs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Npc'), ['controller' => 'Npcs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="equipments form large-9 medium-8 columns content">
    <?= $this->Form->create($equipment) ?>
    <fieldset>
        <legend><?= __('Add Equipment') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('price');
            echo $this->Form->input('units');
            echo $this->Form->input('description');
            echo $this->Form->input('weight');
            echo $this->Form->input('cargo');
            echo $this->Form->input('craft_gold');
            echo $this->Form->input('craft_iron');
            echo $this->Form->input('craft_timber');
            echo $this->Form->input('craft_stone');
            echo $this->Form->input('craft_grain');
            echo $this->Form->input('craft_actions');
            echo $this->Form->input('building_id', ['options' => $buildings, 'empty' => true]);
            echo $this->Form->input('is_artifact');
            echo $this->Form->input('is_relic');
            echo $this->Form->input('npcs._ids', ['options' => $npcs]);
            echo $this->Form->input('personas._ids', ['options' => $personas]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
