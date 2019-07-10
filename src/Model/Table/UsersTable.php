<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('user_id');
        $this->setPrimaryKey('user_id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Almacenes', [
            'foreignKey' => 'user_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('user_id')
            ->allowEmptyString('user_id', 'create');

        $validator
            ->scalar('user_nombre')
            ->maxLength('user_nombre', 100)
            ->requirePresence('user_nombre', 'create')
            ->notEmpty('user_nombre', 'A username is required');

        $validator
            ->scalar('user_apellido')
            ->maxLength('user_apellido', 100)
            ->requirePresence('user_apellido', 'create')
            ->notEmpty('user_apellido', 'A lastname is required');

        $validator
            ->integer('user_dni')
            ->requirePresence('user_dni', 'create')
            ->notEmpty('user_dni', 'A dni is required')
            ->add('user_dni', [
                'number' => [
                    'rule' => ['range', 0, 100000000],
                    'message' => 'Por favor ingrere una cantidad correcta.'
                ],
                'minLength' => [
                    'rule' => ['minLength', 8],
                    'last' => true,
                    'messaje' => 'El DNI debe ser de 8 digitos'
                ],
                'maxLength' => [
                    'rule' => ['maxLength', 8],
                    'message' => 'El DNI debe ser de 8 digitos'
                ]
            ]);

        $validator
            ->scalar('user_correo')
            ->maxLength('user_correo', 100)
            ->requirePresence('user_correo', 'create')
            ->notEmpty('user_correo', 'A mail is required');

        $validator
            ->scalar('user_contraseña')
            ->maxLength('user_contraseña', 255)
            ->requirePresence('user_contraseña', 'create')
            ->notEmpty('user_contraseña', 'A password is required');

        $validator
            ->scalar('user_role')
            ->maxLength('user_role', 50)
            ->requirePresence('user_role', 'create')
            ->notEmpty('user_role', 'A role is required')
            ->add('user_role', 'inList', [
                'rule' => ['inList', ['admin', 'cliente']],
                'message' => 'Please enter a valid role'
            ]);

        $validator
            ->boolean('user_status')
            ->allowEmptyString('user_status');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['user_correo']));
        $rules->add($rules->isUnique(['user_dni']));

        return $rules;
    }

    public function isOwnedBy($userId)
    {
        return $this->exists(['user_id' => $userId]);
    }
}
