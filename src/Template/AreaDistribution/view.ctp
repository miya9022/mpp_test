<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Area Distribution'), ['action' => 'edit', $areaDistribution->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Area Distribution'), ['action' => 'delete', $areaDistribution->id], ['confirm' => __('Are you sure you want to delete # {0}?', $areaDistribution->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Area Distribution'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Area Distribution'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="areaDistribution view large-9 medium-8 columns content">
    <h3><?= h($areaDistribution->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($areaDistribution->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($areaDistribution->id) ?></td>
        </tr>
    </table>
</div>
