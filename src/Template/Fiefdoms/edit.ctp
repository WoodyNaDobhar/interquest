<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $fiefdom->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $fiefdom->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Fiefdoms'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Npcs'), ['controller' => 'Npcs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Npc'), ['controller' => 'Npcs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Parks'), ['controller' => 'Parks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Park'), ['controller' => 'Parks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fieves'), ['controller' => 'Fieves', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fief'), ['controller' => 'Fieves', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fiefdoms form large-9 medium-8 columns content">
    <?= $this->Form->create($fiefdom) ?>
    <fieldset>
        <legend><?= __('Edit Fiefdom') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('persona_id', ['options' => $personas]);
            echo $this->Form->input('npc_id', ['options' => $npcs]);
            echo $this->Form->input('park_id', ['options' => $parks]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
