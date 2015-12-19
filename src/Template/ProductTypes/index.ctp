<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Product Type'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productTypes index large-9 medium-8 columns content">
    <h3><?= __('Product Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productTypes as $productType): ?>
            <tr>
                <td><?= $this->Number->format($productType->id) ?></td>
                <td><?= h($productType->name) ?></td>
                <td><?= h($productType->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $productType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productType->id)]) ?>
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
