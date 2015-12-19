<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Product Types'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="productTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($productType) ?>
    <fieldset>
        <legend><?= __('Add Product Type') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
