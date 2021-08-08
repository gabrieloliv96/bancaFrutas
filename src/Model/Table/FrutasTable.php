<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Frutas Model
 *
 * @property \App\Model\Table\ClassificacaosTable&\Cake\ORM\Association\BelongsTo $Classificacaos
 *
 * @method \App\Model\Entity\Fruta newEmptyEntity()
 * @method \App\Model\Entity\Fruta newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Fruta[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fruta get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fruta findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Fruta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fruta[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fruta|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fruta saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fruta[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fruta[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fruta[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Fruta[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FrutasTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('frutas');
        $this->setDisplayField('fruta');
        $this->setPrimaryKey('id_fruta');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Classificacaos', [
            'foreignKey' => 'classificacao_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id_fruta')
            ->allowEmptyString('id_fruta', null, 'create');

        $validator
            ->scalar('fruta')
            ->maxLength('fruta', 60)
            ->requirePresence('fruta', 'create')
            ->notEmptyString('fruta');

        $validator
            ->boolean('fresca')
            ->requirePresence('fresca', 'create')
            ->notEmptyString('fresca');

        $validator
            ->integer('qtd_disponivel')
            ->requirePresence('qtd_disponivel', 'create')
            ->notEmptyString('qtd_disponivel');

        $validator
            ->numeric('preco')
            ->requirePresence('preco', 'create')
            ->notEmptyString('preco');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['classificacao_id'], 'Classificacaos'), ['errorField' => 'classificacao_id']);

        return $rules;
    }
}
