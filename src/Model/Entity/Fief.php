<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fief Entity
 *
 * @property int $id
 * @property string $name
 * @property int $territory_id
 * @property int $fiefdom_id
 * @property int $persona_id
 * @property int $npc_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $deleted
 *
 * @property \App\Model\Entity\Territory $territory
 * @property \App\Model\Entity\Fiefdom $fiefdom
 * @property \App\Model\Entity\Persona[] $personas
 * @property \App\Model\Entity\Npc[] $npcs
 */
class Fief extends Entity
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
