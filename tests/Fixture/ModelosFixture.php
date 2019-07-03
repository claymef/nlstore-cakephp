<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ModelosFixture
 */
class ModelosFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'modelo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'almacen_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'modelo_nombre' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'almacen_key' => ['type' => 'index', 'columns' => ['almacen_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['modelo_id'], 'length' => []],
            'modelo_nombre' => ['type' => 'unique', 'columns' => ['modelo_nombre'], 'length' => []],
            'modelos_ibfk_1' => ['type' => 'foreign', 'columns' => ['almacen_id'], 'references' => ['almacenes', 'almacen_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'modelo_id' => 1,
                'almacen_id' => 1,
                'modelo_nombre' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
