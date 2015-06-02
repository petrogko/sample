<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $medium->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $medium->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Medium'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Article'), ['controller' => 'Article', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Article', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="medium form large-10 medium-9 columns">
    <?= $this->Form->create($medium) ?>
    <fieldset>
        <legend><?= __('Edit Medium') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('web_id');
            echo $this->Form->input('config');
            echo $this->Form->input('updated_on');
            echo $this->Form->input('created_on');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
