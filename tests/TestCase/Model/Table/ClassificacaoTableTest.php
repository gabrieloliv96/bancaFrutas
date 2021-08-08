<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClassificacaoTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClassificacaoTable Test Case
 */
class ClassificacaoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ClassificacaoTable
     */
    protected $Classificacao;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Classificacao',
        'app.Frutas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Classificacao') ? [] : ['className' => ClassificacaoTable::class];
        $this->Classificacao = $this->getTableLocator()->get('Classificacao', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Classificacao);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ClassificacaoTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
