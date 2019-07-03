<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Modelo Entity
 *
 * @property int $modelo_id
 * @property int $almacen_id
 * @property string $modelo_nombre
 *
 * @property \App\Model\Entity\Almacene $almacene
 */
class Modelo extends Entity
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
        'almacen_id' => true,
        'modelo_nombre' => true,
        'almacene' => true
    ];
}
