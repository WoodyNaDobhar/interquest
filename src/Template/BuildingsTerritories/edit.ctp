<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $buildingsTerritory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $buildingsTerritory->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Buildings Territories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Buildings'), ['controller' => 'Buildings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Building'), ['controller' => 'Buildings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="buildingsTerritories form large-9 medium-8 columns content">
    <?= $this->Form->create($buildingsTerritory) ?>
    <fieldset>
        <legend><?= __('Edit Buildings Territory') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('building_id', ['options' => $buildings]);
            echo $this->Form->input('territory_id', ['options' => $territories]);
            echo $this->Form->input('size');
            echo $this->Form->input('deleted', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
