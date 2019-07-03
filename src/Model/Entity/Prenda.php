<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Prenda Entity
 *
 * @property int $prenda_id
 * @property int $modelo_id
 * @property string $prenda_nombre
 * @property int $prenda_stock
 * @property float $prenda_precio
 *
 * @property \App\Model\Entity\Modelo $modelo
 */
class Prenda extends Entity
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
        'modelo_id' => true,
        'prenda_nombre' => true,
        'prenda_stock' => true,
        'prenda_precio' => true,
        'modelo' => true
    ];
}
