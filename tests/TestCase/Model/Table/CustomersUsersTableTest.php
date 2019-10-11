<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CustomersUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CustomersUsersTable Test Case
 */
class CustomersUsersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CustomersUsersTable
     */
    public $CustomersUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CustomersUsers',
        'app.Customers',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CustomersUsers') ? [] : ['className' => CustomersUsersTable::class];
        $this->CustomersUsers = TableRegistry::getTableLocator()->get('CustomersUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CustomersUsers);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
