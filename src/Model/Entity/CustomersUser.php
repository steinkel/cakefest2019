<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CustomersUser Entity
 *
 * @property int $id
 * @property int $customer_id
 * @property int $user_id
 * @property int|null $assigned_by_user
 * @property \Cake\I18n\FrozenTime|null $assigned_date
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\User $user
 */
class CustomersUser extends Entity
{
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
        'assigned_by_user' => true,
        'assigned_date' => true,
        'customer' => true,
        'user' => true,
    ];
}
