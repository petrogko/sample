<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Article'), ['action' => 'edit', $article->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Article'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Article'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Medium'), ['controller' => 'Medium', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Medium'), ['controller' => 'Medium', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="article view large-10 medium-9 columns">
    <h2><?= h($article->title) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Medium') ?></h6>
            <p><?= $article->has('medium') ? $this->Html->link($article->medium->name, ['controller' => 'Medium', 'action' => 'view', $article->medium->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Title') ?></h6>
            <p><?= h($article->title) ?></p>
            <h6 class="subheader"><?= __('Author') ?></h6>
            <p><?= h($article->author) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($article->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Date Published') ?></h6>
            <p><?= h($article->date_published) ?></p>
            <h6 class="subheader"><?= __('Updated On') ?></h6>
            <p><?= h($article->updated_on) ?></p>
            <h6 class="subheader"><?= __('Created On') ?></h6>
            <p><?= h($article->created_on) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Body') ?></h6>
            <?= $this->Text->autoParagraph(h($article->body)); ?>

        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Description') ?></h6>
            <?= $this->Text->autoParagraph(h($article->description)); ?>

        </div>
    </div>
</div>
