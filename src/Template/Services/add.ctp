<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Services'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="services form large-9 medium-8 columns content">
    <?= $this->Form->create($service) ?>
    <fieldset>
        <legend><?= __('Add Service') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('content');
            echo $this->Form->input('img_src');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
