<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Article'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Medium'), ['controller' => 'Medium', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Medium'), ['controller' => 'Medium', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="article form large-10 medium-9 columns">
    <?= $this->Form->create($article) ?>
    <fieldset>
        <legend><?= __('Add Article') ?></legend>
        <?php
            echo $this->Form->input('medium_id', ['options' => $medium, 'empty' => true]);
            echo $this->Form->input('title');
            echo $this->Form->input('body');
            echo $this->Form->input('description');
            echo $this->Form->input('author');
            echo $this->Form->input('date_published');
            echo $this->Form->input('updated_on');
            echo $this->Form->input('created_on');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
