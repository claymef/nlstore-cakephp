<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;

/**
 * Almacenes Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Almacene get($primaryKey, $options = [])
 * @method \App\Model\Entity\Almacene newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Almacene[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Almacene|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Almacene saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Almacene patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Almacene[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Almacene findOrCreate($search, callable $callback = null, $options = [])
 */
class AlmacenesTable extends Table
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

        $this->addBehavior('Timestamp');
        $this->setTable('almacenes');
        $this->setDisplayField('almacen_id');
        $this->setPrimaryKey('almacen_id');

        $this->hasMany('Modelos', [
            'foreignKey' => 'almacen_id'
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
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
            ->integer('almacen_id')
            ->allowEmptyString('almacen_id', 'create');

        $validator
            ->scalar('almacen_nombre')
            ->maxLength('almacen_nombre', 100)
            ->requirePresence('almacen_nombre', 'create')
            ->notEmptyString('almacen_nombre', 'A name is required')
            ->add('almacen_nombre', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['almacen_nombre']));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }

    public function isOwnedBy($almacenId, $userId)
    {
        return $this->exists(['almacen_id' => $almacenId, 'user_id' => $userId]);
    }
}
