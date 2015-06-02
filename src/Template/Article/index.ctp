<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Article'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Medium'), ['controller' => 'Medium', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Medium'), ['controller' => 'Medium', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="article index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('medium_id') ?></th>
            <th><?= $this->Paginator->sort('title') ?></th>
            <th><?= $this->Paginator->sort('author') ?></th>
            <th><?= $this->Paginator->sort('date_published') ?></th>
            <th><?= $this->Paginator->sort('updated_on') ?></th>
            <th><?= $this->Paginator->sort('created_on') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($article as $article): ?>
        <tr>
            <td><?= $this->Number->format($article->id) ?></td>
            <td>
                <?= $article->has('medium') ? $this->Html->link($article->medium->name, ['controller' => 'Medium', 'action' => 'view', $article->medium->id]) : '' ?>
            </td>
            <td><?= h($article->title) ?></td>
            <td><?= h($article->author) ?></td>
            <td><?= h($article->date_published) ?></td>
            <td><?= h($article->updated_on) ?></td>
            <td><?= h($article->created_on) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $article->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $article->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
