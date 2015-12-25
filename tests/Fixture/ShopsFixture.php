<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ShopsFixture
 *
 */
class ShopsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'area_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'name' => ['type' => 'string', 'fixed' => true, 'length' => 255, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'address' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'phone' => ['type' => 'string', 'length' => 30, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'email' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'shops_area_distribution' => ['type' => 'index', 'columns' => ['area_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id', 'area_id'], 'length' => []],
            'shops_area_distribution' => ['type' => 'foreign', 'columns' => ['area_id'], 'references' => ['area_distribution', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_bin'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'area_id' => 1,
            'name' => 'Lorem ipsum dolor sit amet',
            'address' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'phone' => 'Lorem ipsum dolor sit amet',
            'email' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
