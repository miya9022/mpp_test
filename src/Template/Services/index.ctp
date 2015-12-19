<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Service'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="services index large-9 medium-8 columns content">
    <h3><?= __('Services') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('content') ?></th>
                <th><?= $this->Paginator->sort('img_src') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($services as $service): ?>
            <tr>
                <td><?= $this->Number->format($service->id) ?></td>
                <td><?= h($service->name) ?></td>
                <td><?= h($service->content) ?></td>
                <td><?= h($service->img_src) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $service->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $service->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $service->id], ['confirm' => __('Are you sure you want to delete # {0}?', $service->id)]) ?>
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
