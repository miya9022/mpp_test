<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity.
 *
 * @property int $id
 * @property string $serial
 * @property string $name
 * @property string $description
 * @property string $img_src_bg
 * @property string $img_small
 * @property int $type_id
 * @property \App\Model\Entity\ProductType $product_type
 * @property \App\Model\Entity\OrderDetail[] $order_detail
 */
class Product extends Entity
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
    ];
}