<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FrutasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FrutasTable Test Case
 */
class FrutasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FrutasTable
     */
    protected $Frutas;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Frutas',
        'app.Classificacaos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Frutas') ? [] : ['className' => FrutasTable::class];
        $this->Frutas = $this->getTableLocator()->get('Frutas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Frutas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FrutasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\FrutasTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
