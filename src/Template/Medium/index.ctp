<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Medium'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Article'), ['controller' => 'Article', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Article', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="medium index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('web_id') ?></th>
            <th><?= $this->Paginator->sort('updated_on') ?></th>
            <th><?= $this->Paginator->sort('created_on') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($medium as $medium): ?>
        <tr>
            <td><?= $this->Number->format($medium->id) ?></td>
            <td><?= h($medium->name) ?></td>
            <td><?= h($medium->web_id) ?></td>
            <td><?= h($medium->updated_on) ?></td>
            <td><?= h($medium->created_on) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $medium->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $medium->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $medium->id], ['confirm' => __('Are you sure you want to delete # {0}?', $medium->id)]) ?>
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
