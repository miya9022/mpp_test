<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Service'), ['action' => 'edit', $service->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Service'), ['action' => 'delete', $service->id], ['confirm' => __('Are you sure you want to delete # {0}?', $service->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Services'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Service'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="services view large-9 medium-8 columns content">
    <h3><?= h($service->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($service->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Content') ?></th>
            <td><?= h($service->content) ?></td>
        </tr>
        <tr>
            <th><?= __('Img Src') ?></th>
            <td><?= h($service->img_src) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($service->id) ?></td>
        </tr>
    </table>
</div>
