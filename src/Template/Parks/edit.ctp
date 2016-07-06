<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $park->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $park->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Parks'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sectors'), ['controller' => 'Sectors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sector'), ['controller' => 'Sectors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fiefdoms'), ['controller' => 'Fiefdoms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fiefdom'), ['controller' => 'Fiefdoms', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="parks form large-9 medium-8 columns content">
    <?= $this->Form->create($park) ?>
    <fieldset>
        <legend><?= __('Edit Park') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('rank');
            echo $this->Form->input('sector_id', ['options' => $sectors]);
            echo $this->Form->input('midreign', ['empty' => true]);
            echo $this->Form->input('coronation', ['empty' => true]);
            echo $this->Form->input('tax_rate');
            echo $this->Form->input('tax_type');
            echo $this->Form->input('deleted', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
