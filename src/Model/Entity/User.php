<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $user_id
 * @property string $user_nombre
 * @property string $user_apellido
 * @property int $user_dni
 * @property string $user_correo
 * @property string $user_contraseña
 * @property string $user_role
 * @property bool|null $user_status
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class User extends Entity
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
        'user_nombre' => true,
        'user_apellido' => true,
        'user_dni' => true,
        'user_correo' => true,
        'user_contraseña' => true,
        'user_role' => true,
        'user_status' => true,
        'created' => true,
        'modified' => true
    ];
    protected $_hidden = [
        'user_contraseña'
    ];
    protected function _setUserContraseña($value)
    {
        if(strlen($value)) {
            $hasher = new DefaultPasswordHasher();
            return $hasher->hash($value);
        }
    }
}
