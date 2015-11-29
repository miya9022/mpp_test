<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Shop'), ['action' => 'edit', $shop->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Shop'), ['action' => 'delete', $shop->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shop->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Shops'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Shop'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Area Distribution'), ['controller' => 'AreaDistribution', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Area Distribution'), ['controller' => 'AreaDistribution', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="shops view large-9 medium-8 columns content">
    <h3><?= h($shop->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Area Distribution') ?></th>
            <td><?= $shop->has('area_distribution') ? $this->Html->link($shop->area_distribution->name, ['controller' => 'AreaDistribution', 'action' => 'view', $shop->area_distribution->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($shop->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($shop->id) ?></td>
        </tr>
    </table>
</div>
