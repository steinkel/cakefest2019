<?php
declare(strict_types=1);

namespace App\Model\Entity;

use App\Model\Entity\Traits\NormalizeNameTrait;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string|null $first_name
 * @property string|null $last_name
 * @property \Cake\I18n\FrozenTime|null $activation_date
 * @property bool $active
 * @property string $role
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Ticket[] $tickets
 * @property \App\Model\Entity\Customer[] $customers
 */
class User extends Entity
{
    use NormalizeNameTrait;

    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';
    const ROLES = [self::ROLE_ADMIN, self::ROLE_USER];

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
        'username' => true,
        'email' => true,
        'password' => true,
        'first_name' => true,
        'last_name' => true,
        'activation_date' => true,
        'active' => true,
        'role' => false,
        'created' => true,
        'modified' => true,
        'tickets' => true,
        'customers' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];

    /**
     * Hash password
     *
     * @param string $password
     * @return string|null
     */
    protected function _setPassword(string $password) : ?string
    {
        if (mb_strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
    }
}
