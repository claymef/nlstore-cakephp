<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DetalleventaFixture
 */
class DetalleventaFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'detalleventa';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'detalle_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'factura_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'prenda_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'detalle_cantidad' => ['type' => 'integer', 'length' => 3, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'detalle_precio' => ['type' => 'decimal', 'length' => 5, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'prenda_key' => ['type' => 'index', 'columns' => ['prenda_id'], 'length' => []],
            'factura_key' => ['type' => 'index', 'columns' => ['factura_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['detalle_id'], 'length' => []],
            'factura_key' => ['type' => 'foreign', 'columns' => ['factura_id'], 'references' => ['facturas', 'factura_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'prenda_key' => ['type' => 'foreign', 'columns' => ['prenda_id'], 'references' => ['prendas', 'prenda_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'detalle_id' => 1,
                'factura_id' => 1,
                'prenda_id' => 1,
                'detalle_cantidad' => 1,
                'detalle_precio' => 1.5,
                'created' => '2019-07-01 01:09:52'
            ],
        ];
        parent::init();
    }
}
