<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ticket $ticket
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Tickets'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tickets form content">
            <?= $this->Form->create($ticket) ?>
            <fieldset>
                <legend><?= __('Select Customer') ?></legend>
                <?php
                    echo $this->Form->control('customer_id', [
                        'empty' => __('New Customer, please enter email below...'),
                        'options' => $customers
                    ]);
                    echo $this->Form->control('customer.email', [
                        'required' => false,
                    ]);
                    ?>
                <legend><?= __('Ticket') ?></legend>
                <?php
                    echo $this->Form->control('subject');
                    echo $this->Form->control('body');
                    echo $this->Form->control('status', ['options' => $statuses]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
