<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;

/**
 * Modelos Model
 *
 * @property \App\Model\Table\AlmacenesTable|\Cake\ORM\Association\BelongsTo $Almacenes
 *
 * @method \App\Model\Entity\Modelo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Modelo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Modelo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Modelo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Modelo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Modelo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Modelo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Modelo findOrCreate($search, callable $callback = null, $options = [])
 */
class ModelosTable extends Table
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
        $this->setTable('modelos');
        $this->setDisplayField('modelo_id');
        $this->setPrimaryKey('modelo_id');

        $this->hasMany('Prendas', [
            'foreignKey' => 'modelo_id'
        ]);

        $this->belongsTo('Almacenes', [
            'foreignKey' => 'almacen_id',
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
            ->integer('modelo_id')
            ->allowEmptyString('modelo_id', 'create');

        $validator
            ->scalar('modelo_nombre')
            ->maxLength('modelo_nombre', 100)
            ->requirePresence('modelo_nombre', 'create')
            ->notEmptyString('modelo_nombre', false)
            ->add('modelo_nombre', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['modelo_nombre']));
        $rules->add($rules->existsIn(['almacen_id'], 'Almacenes'));

        return $rules;
    }
    
    public function isOwnedBy($modeloId, $almacenId)
    {
        return $this->exists(['modelo_id' => $modeloId, 'almacen_id' => $almacenId]);
    }
}
