<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Entity\Ticket;
use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\TicketsTable&\Cake\ORM\Association\HasMany $Tickets
 * @property \App\Model\Table\CustomersTable&\Cake\ORM\Association\BelongsToMany $Customers
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('username');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Tickets', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('OpenTickets')
            ->setClassName(TicketsTable::class)
            ->setForeignKey('user_id')
            ->setConditions([
                'OpenTickets.status' => Ticket::STATUS_OPEN
            ]);
        $this->belongsToMany('Customers', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'customer_id',
            'joinTable' => 'customers_users',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('username')
            ->maxLength('username', 255)
            ->requirePresence('username', 'create')
            ->notEmptyString('username');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->add('password', [
                'minLengthForAdmins' => [
                    'rule' => ['minLength', 9],
                    'message' => __('Admins password length must be 9+ characters'),
                    'on' => function (array $context) {
                        $role = $context['data']['role'] ?? null;

                        return $role === 'admin';
                    }
                ],
                'atLeast1Number' => [
                    'rule' => ['custom', '/.*\d+.*/'],
                    'message' => __('At least 1 number'),
                ],
                'atLeast1Capital' => [
                    'rule' => ['custom', '/.*[A-Z]+.*/'],
                    'message' => __('At least 1 capital letter'),
                ]
            ])
            ->notEmptyString('password');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 50)
            ->allowEmptyString('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 50)
            ->allowEmptyString('last_name');

        $validator
            ->dateTime('activation_date')
            ->allowEmptyDateTime('activation_date');

        $validator
            ->boolean('active')
            ->notEmptyString('active');

        $validator
            ->scalar('role')
            ->maxLength('role', 255)
            ->notEmptyString('role')
            ->inList('role', User::ROLES, __(
                'Role is not valid, valid options: {0}',
                implode(',', User::ROLES
                )
            ));

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
