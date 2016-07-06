<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $terrain->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $terrain->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Terrains'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Territories'), ['controller' => 'Territories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Territory'), ['controller' => 'Territories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="terrains form large-9 medium-8 columns content">
    <?= $this->Form->create($terrain) ?>
    <fieldset>
        <legend><?= __('Edit Terrain') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('image');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
