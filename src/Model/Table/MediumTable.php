<?php
namespace App\Model\Table;

use App\Model\Entity\Medium;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Medium Model
 */
class MediumTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('medium');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->hasMany('Article', [
            'foreignKey' => 'medium_id'
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');
            
        $validator
            ->allowEmpty('name');
            
        $validator
            ->allowEmpty('config');
            
        $validator
            ->requirePresence('updated_on', 'create')
            ->notEmpty('updated_on');
            
        $validator
            ->requirePresence('created_on', 'create')
            ->notEmpty('created_on');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    /*
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['web_id'], 'Webs'));
        return $rules;
    }
    */
}
