<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;

/**
 * Detalleventa Model
 *
 * @property \App\Model\Table\FacturasTable|\Cake\ORM\Association\BelongsTo $Facturas
 * @property \App\Model\Table\PrendasTable|\Cake\ORM\Association\BelongsTo $Prendas
 *
 * @method \App\Model\Entity\Detalleventum get($primaryKey, $options = [])
 * @method \App\Model\Entity\Detalleventum newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Detalleventum[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Detalleventum|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Detalleventum saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Detalleventum patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Detalleventum[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Detalleventum findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DetalleventaTable extends Table
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

        $this->setTable('detalleventa');
        $this->setDisplayField('detalle_id');
        $this->setPrimaryKey('detalle_id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Facturas', [
            'foreignKey' => 'factura_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Prendas', [
            'foreignKey' => 'prenda_id',
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
            ->integer('detalle_id')
            ->allowEmptyString('detalle_id', 'create');

        $validator
            ->integer('detalle_cantidad')
            ->requirePresence('detalle_cantidad', 'create')
            ->notEmptyString('detalle_cantidad', 'A cant is required');

        $validator
            ->decimal('detalle_precio')
            ->requirePresence('detalle_precio', 'create')
            ->notEmptyString('detalle_precio', 'A price is required');

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
        $rules->add($rules->existsIn(['factura_id'], 'Facturas'));
        $rules->add($rules->existsIn(['prenda_id'], 'Prendas'));

        return $rules;
    }
    public function isOwnedBy($detalleId, $prendaId)
    {
        return $this->exists(['detalle_id' => $detalleId, 'prenda_id' => $prendaId]);
    }
}
