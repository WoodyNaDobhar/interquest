<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Comment Entity
 *
 * @property int $id
 * @property int $npc_id
 * @property int $park_id
 * @property int $persona_id
 * @property int $sector_id
 * @property int $territory_id
 * @property int $author_persona_id
 * @property string $subject
 * @property string $message
 * @property bool $show_mapkeepers
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $deleted
 *
 * @property \App\Model\Entity\Npc $npc
 * @property \App\Model\Entity\Park $park
 * @property \App\Model\Entity\Persona $persona
 * @property \App\Model\Entity\Sector $sector
 * @property \App\Model\Entity\Territory $territory
 */
class Comment extends Entity
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
