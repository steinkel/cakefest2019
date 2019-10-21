<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ticket Entity
 *
 * @property int $id
 * @property int $customer_id
 * @property int $user_id
 * @property string $subject
 * @property string|null $body
 * @property int $status
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Email[] $emails
 */
class Ticket extends Entity
{
    const STATUS_OPEN = 0;
    const STATUS_CLOSED = 1;

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'customer_id' => true,
        'user_id' => true,
        'subject' => true,
        'body' => true,
        'status' => true,
        'customer' => true,
        'user' => true,
        'emails' => true,
    ];

    protected function _getStatusList(): array
    {
        return [
            static::STATUS_OPEN => __('Open'),
            static::STATUS_CLOSED => __('Closed'),
        ];
    }
}
