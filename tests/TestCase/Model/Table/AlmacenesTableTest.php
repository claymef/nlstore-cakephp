<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AlmacenesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AlmacenesTable Test Case
 */
class AlmacenesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AlmacenesTable
     */
    public $Almacenes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Almacenes',
        'app.Users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Almacenes') ? [] : ['className' => AlmacenesTable::class];
        $this->Almacenes = TableRegistry::getTableLocator()->get('Almacenes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Almacenes);

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
