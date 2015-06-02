<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Medium'), ['action' => 'edit', $medium->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Medium'), ['action' => 'delete', $medium->id], ['confirm' => __('Are you sure you want to delete # {0}?', $medium->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Medium'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Medium'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Article'), ['controller' => 'Article', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Article', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="medium view large-10 medium-9 columns">
    <h2><?= h($medium->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($medium->name) ?></p>
            <h6 class="subheader"><?= __('Web Id') ?></h6>
            <p><?= h($medium->web_id) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($medium->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Updated On') ?></h6>
            <p><?= h($medium->updated_on) ?></p>
            <h6 class="subheader"><?= __('Created On') ?></h6>
            <p><?= h($medium->created_on) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Config') ?></h6>
            <?= $this->Text->autoParagraph(h($medium->config)); ?>

        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Article') ?></h4>
    <?php if (!empty($medium->article)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Medium Id') ?></th>
            <th><?= __('Title') ?></th>
            <th><?= __('Body') ?></th>
            <th><?= __('Description') ?></th>
            <th><?= __('Author') ?></th>
            <th><?= __('Date Published') ?></th>
            <th><?= __('Updated On') ?></th>
            <th><?= __('Created On') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($medium->article as $article): ?>
        <tr>
            <td><?= h($article->id) ?></td>
            <td><?= h($article->medium_id) ?></td>
            <td><?= h($article->title) ?></td>
            <td><?= h($article->body) ?></td>
            <td><?= h($article->description) ?></td>
            <td><?= h($article->author) ?></td>
            <td><?= h($article->date_published) ?></td>
            <td><?= h($article->updated_on) ?></td>
            <td><?= h($article->created_on) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Article', 'action' => 'view', $article->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Article', 'action' => 'edit', $article->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Article', 'action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
