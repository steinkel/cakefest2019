<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomersUser[]|\Cake\Collection\CollectionInterface $customersUsers
 */
?>
<div class="customersUsers index content">
    <?= $this->Html->link(__('New Customers User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Customers Users') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('customer_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('assigned_by_user') ?></th>
                    <th><?= $this->Paginator->sort('assigned_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customersUsers as $customersUser): ?>
                <tr>
                    <td><?= $this->Number->format($customersUser->id) ?></td>
                    <td><?= $customersUser->has('customer') ? $this->Html->link($customersUser->customer->id, ['controller' => 'Customers', 'action' => 'view', $customersUser->customer->id]) : '' ?></td>
                    <td><?= $customersUser->has('user') ? $this->Html->link($customersUser->user->id, ['controller' => 'Users', 'action' => 'view', $customersUser->user->id]) : '' ?></td>
                    <td><?= $this->Number->format($customersUser->assigned_by_user) ?></td>
                    <td><?= h($customersUser->assigned_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $customersUser->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $customersUser->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customersUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customersUser->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
