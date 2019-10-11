<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomersUser $customersUser
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $customersUser->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $customersUser->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Customers Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="customersUsers form content">
            <?= $this->Form->create($customersUser) ?>
            <fieldset>
                <legend><?= __('Edit Customers User') ?></legend>
                <?php
                    echo $this->Form->control('customer_id', ['options' => $customers]);
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('assigned_by_user');
                    echo $this->Form->control('assigned_date', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
