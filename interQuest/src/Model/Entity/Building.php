<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Building Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $cost_gold
 * @property int $cost_iron
 * @property int $cost_timber
 * @property int $cost_stone
 * @property int $cost_grain
 * @property int $cost_actions
 * @property int $expandable
 * @property int $builds_maximum
 * @property string $resource_required
 * @property string $building_required
 * @property bool $waterway_required
 *
 * @property \App\Model\Entity\Equipment[] $equipments
 * @property \App\Model\Entity\Territory[] $territories
 */
class Building extends Entity
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
        'id' => false
    ];
}
