<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Types'), ['controller' => 'ProductTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Type'), ['controller' => 'ProductTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Order Detail'), ['controller' => 'OrderDetail', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order Detail'), ['controller' => 'OrderDetail', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="products view large-9 medium-8 columns content">
    <h3><?= h($product->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Serial') ?></th>
            <td><?= h($product->serial) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($product->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($product->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Img Src Bg') ?></th>
            <td><?= h($product->img_src_bg) ?></td>
        </tr>
        <tr>
            <th><?= __('Img Small') ?></th>
            <td><?= h($product->img_small) ?></td>
        </tr>
        <tr>
            <th><?= __('Product Type') ?></th>
            <td><?= $product->has('product_type') ? $this->Html->link($product->product_type->name, ['controller' => 'ProductTypes', 'action' => 'view', $product->product_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($product->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Order Detail') ?></h4>
        <?php if (!empty($product->order_detail)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Product Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Price') ?></th>
                <th><?= __('Shop Id') ?></th>
                <th><?= __('Shop Name') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Area Id') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->order_detail as $orderDetail): ?>
            <tr>
                <td><?= h($orderDetail->id) ?></td>
                <td><?= h($orderDetail->product_id) ?></td>
                <td><?= h($orderDetail->created) ?></td>
                <td><?= h($orderDetail->price) ?></td>
                <td><?= h($orderDetail->shop_id) ?></td>
                <td><?= h($orderDetail->shop_name) ?></td>
                <td><?= h($orderDetail->customer_id) ?></td>
                <td><?= h($orderDetail->area_id) ?></td>
                <td><?= h($orderDetail->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OrderDetail', 'action' => 'view', $orderDetail->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'OrderDetail', 'action' => 'edit', $orderDetail->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OrderDetail', 'action' => 'delete', $orderDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderDetail->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
