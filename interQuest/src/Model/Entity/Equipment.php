<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Equipment Entity
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @property int $units
 * @property string $description
 * @property float $weight
 * @property int $cargo
 * @property float $craft_gold
 * @property float $craft_iron
 * @property float $craft_timber
 * @property float $craft_stone
 * @property float $craft_grain
 * @property int $craft_actions
 * @property int $building_id
 * @property bool $is_artifact
 * @property bool $is_relic
 *
 * @property \App\Model\Entity\Building $building
 * @property \App\Model\Entity\Npc[] $npcs
 * @property \App\Model\Entity\Persona[] $personas
 */
class Equipment extends Entity
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
