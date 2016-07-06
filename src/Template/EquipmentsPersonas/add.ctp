<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Equipments Personas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Equipments'), ['controller' => 'Equipments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Equipment'), ['controller' => 'Equipments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="equipmentsPersonas form large-9 medium-8 columns content">
    <?= $this->Form->create($equipmentsPersona) ?>
    <fieldset>
        <legend><?= __('Add Equipments Persona') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('equipment_id', ['options' => $equipments]);
            echo $this->Form->input('persona_id', ['options' => $personas]);
            echo $this->Form->input('territory_id', ['options' => $territories, 'empty' => true]);
            echo $this->Form->input('deleted', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
