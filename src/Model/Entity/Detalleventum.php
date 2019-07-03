<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Detalleventum Entity
 *
 * @property int $detalle_id
 * @property int $factura_id
 * @property int $prenda_id
 * @property int $detalle_cantidad
 * @property float $detalle_precio
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\Factura $factura
 * @property \App\Model\Entity\Prenda $prenda
 */
class Detalleventum extends Entity
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
        'factura_id' => true,
        'prenda_id' => true,
        'detalle_cantidad' => true,
        'detalle_precio' => true,
        'created' => true,
        'factura' => true,
        'prenda' => true
    ];
}
