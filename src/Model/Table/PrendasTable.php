<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;

/**
 * Prendas Model
 *
 * @property \App\Model\Table\ModelosTable|\Cake\ORM\Association\BelongsTo $Modelos
 *
 * @method \App\Model\Entity\Prenda get($primaryKey, $options = [])
 * @method \App\Model\Entity\Prenda newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Prenda[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Prenda|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Prenda saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Prenda patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Prenda[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Prenda findOrCreate($search, callable $callback = null, $options = [])
 */
class PrendasTable extends Table
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
        $this->setTable('prendas');
        $this->setDisplayField('prenda_id');
        $this->setPrimaryKey('prenda_id');

        $this->belongsTo('Modelos', [
            'foreignKey' => 'modelo_id',
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
            ->integer('prenda_id')
            ->allowEmptyString('prenda_id', 'create');

        $validator
            ->scalar('prenda_nombre')
            ->maxLength('prenda_nombre', 100)
            ->requirePresence('prenda_nombre', 'create')
            ->notEmptyString('prenda_nombre', false)
            ->add('prenda_nombre', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('prenda_stock')
            ->requirePresence('prenda_stock', 'create')
            ->notEmptyString('prenda_stock', false);

        $validator
            ->decimal('prenda_precio')
            ->requirePresence('prenda_precio', 'create')
            ->notEmptyString('prenda_precio', false);

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
        $rules->add($rules->isUnique(['prenda_nombre']));
        $rules->add($rules->existsIn(['modelo_id'], 'Modelos'));

        return $rules;
    }

    public function isOwnedBy($prendaId, $modeloId)
    {
        return $this->exists(['prenda_id' => $prendaId, 'modelo_id' => $modeloId]);
    }
}
