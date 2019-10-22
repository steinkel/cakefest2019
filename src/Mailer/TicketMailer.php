<?php
declare(strict_types=1);

namespace App\Mailer;

use App\Model\Entity\Customer;
use App\Model\Entity\Ticket;
use Cake\Mailer\Mailer;

/**
 * Ticket mailer.
 */
class TicketMailer extends Mailer
{
    /**
     * Mailer's name.
     *
     * @var string
     */
    public static $name = 'Ticket';

    public function newTicket(Ticket $ticket, Customer $customer) : void
    {
        $this
            ->setTo($customer->get('email'))
            ->setSubject(__('Ticket #{0} : {1}', $ticket['id'], $ticket['subject']))
            ->setViewVars(compact('ticket'));
    }
}
