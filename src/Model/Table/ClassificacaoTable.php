<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Classificacao Model
 *
 * @property \App\Model\Table\FrutasTable&\Cake\ORM\Association\HasMany $Frutas
 *
 * @method \App\Model\Entity\Classificacao newEmptyEntity()
 * @method \App\Model\Entity\Classificacao newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Classificacao[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Classificacao get($primaryKey, $options = [])
 * @method \App\Model\Entity\Classificacao findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Classificacao patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Classificacao[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Classificacao|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Classificacao saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Classificacao[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Classificacao[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Classificacao[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Classificacao[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ClassificacaoTable extends Table
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

        $this->setTable('classificacao');
        $this->setDisplayField('id_classificacao');
        $this->setPrimaryKey('id_classificacao');

        $this->addBehavior('Timestamp');

        $this->hasMany('Frutas', [
            'foreignKey' => 'classificacao_id',
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
            ->integer('id_classificacao')
            ->allowEmptyString('id_classificacao', null, 'create');

        $validator
            ->scalar('classificacao')
            ->maxLength('classificacao', 60)
            ->requirePresence('classificacao', 'create')
            ->notEmptyString('classificacao');

        return $validator;
    }
}
