<?php
declare(strict_types=1);

namespace App\Model\Behavior;

use Cake\Datasource\EntityInterface;
use Cake\Event\EventInterface;
use Cake\Mailer\MailerAwareTrait;
use Cake\ORM\Behavior;
use Cake\ORM\Table;

/**
 * Notify behavior
 */
class NotifyBehavior extends Behavior
{
    use MailerAwareTrait;

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function afterSave(EventInterface $event, EntityInterface $entity, \ArrayObject $options)
    {
        if ($entity->isNew()) {
            $customerId = (int)$entity->get('customer_id');
            $customer = $this->getTable()->Customers->get($customerId);
            $this->getMailer('Ticket')->send('newTicket', [$entity, $customer]);
        }
    }
}
