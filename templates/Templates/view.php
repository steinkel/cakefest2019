<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Template $template
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Template'), ['action' => 'edit', $template->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Template'), ['action' => 'delete', $template->id], ['confirm' => __('Are you sure you want to delete # {0}?', $template->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Templates'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Template'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="templates view content">
            <h3><?= h($template->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($template->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Subject') ?></th>
                    <td><?= h($template->subject) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($template->id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Body') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($template->body)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
