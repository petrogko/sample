<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Medium Entity.
 */
class Medium extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'web_id' => true,
        'config' => true,
        'updated_on' => true,
        'created_on' => true,
        'article' => true,
    ];
}
