<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fiefdom Entity
 *
 * @property int $id
 * @property string $name
 * @property int $persona_id
 * @property int $npc_id
 * @property int $park_id
 *
 * @property \App\Model\Entity\Persona $persona
 * @property \App\Model\Entity\Npc $npc
 * @property \App\Model\Entity\Park $park
 * @property \App\Model\Entity\Fief[] $fieves
 */
class Fiefdom extends Entity
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
