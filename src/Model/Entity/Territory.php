<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Territory Entity
 *
 * @property int $id
 * @property int $name
 * @property int $sector_id
 * @property int $row
 * @property int $column
 * @property int $steward_persona_id
 * @property int $steward_cut
 * @property int $terrain_id
 * @property string $primary_resource
 * @property string $secondary_resource
 * @property int $castle_strength
 * @property bool $is_wasteland
 * @property bool $is_no_mans_land
 * @property bool $has_road
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Sector $sector
 * @property \App\Model\Entity\Persona[] $personas
 * @property \App\Model\Entity\Terrain $terrain
 * @property \App\Model\Entity\Comment[] $comments
 * @property \App\Model\Entity\EquipmentsNpc[] $equipments_npcs
 * @property \App\Model\Entity\EquipmentsPersona[] $equipments_personas
 * @property \App\Model\Entity\Fief[] $fieves
 * @property \App\Model\Entity\Npc[] $npcs
 * @property \App\Model\Entity\Building[] $buildings
 */
class Territory extends Entity
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
