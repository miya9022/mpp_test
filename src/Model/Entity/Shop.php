<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Shop Entity.
 *
 * @property int $id
 * @property int $area_id
 * @property \App\Model\Entity\AreaDistribution $area_distribution
 * @property string $name
 * @property string $address
 * @property string $phone
 * @property string $email
 */
class Shop extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
        'area_id' => false,
    ];
}
