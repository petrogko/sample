<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Article Entity.
 */
class Article extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'medium_id' => true,
        'title' => true,
        'body' => true,
        'description' => true,
        'author' => true,
        'date_published' => true,
        'updated_on' => true,
        'created_on' => true,
        'medium' => true,
    ];
}
