<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Buildings'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Equipments'), ['controller' => 'Equipments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Equipment'), ['controller' => 'Equipments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="buildings form large-9 medium-8 columns content">
    <?= $this->Form->create($building) ?>
    <fieldset>
        <legend><?= __('Add Building') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('cost_gold');
            echo $this->Form->input('cost_iron');
            echo $this->Form->input('cost_timber');
            echo $this->Form->input('cost_stone');
            echo $this->Form->input('cost_grain');
            echo $this->Form->input('cost_actions');
            echo $this->Form->input('size_maximum');
            echo $this->Form->input('builds_maximum');
            echo $this->Form->input('requires_castle');
            echo $this->Form->input('territories._ids', ['options' => $territories]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
