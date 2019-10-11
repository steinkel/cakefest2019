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
            <?= $this->Html->link(__('Edit Customers User'), ['action' => 'edit', $customersUser->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Customers User'), ['action' => 'delete', $customersUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customersUser->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Customers Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Customers User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="customersUsers view content">
            <h3><?= h($customersUser->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Customer') ?></th>
                    <td><?= $customersUser->has('customer') ? $this->Html->link($customersUser->customer->id, ['controller' => 'Customers', 'action' => 'view', $customersUser->customer->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $customersUser->has('user') ? $this->Html->link($customersUser->user->id, ['controller' => 'Users', 'action' => 'view', $customersUser->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($customersUser->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Assigned By User') ?></th>
                    <td><?= $this->Number->format($customersUser->assigned_by_user) ?></td>
                </tr>
                <tr>
                    <th><?= __('Assigned Date') ?></th>
                    <td><?= h($customersUser->assigned_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
