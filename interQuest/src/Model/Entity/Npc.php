<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Npc Entity
 *
 * @property int $id
 * @property string $name
 * @property string $private_name
 * @property string $image
 * @property int $vocation_id
 * @property int $monster_id
 * @property string $background_public
 * @property string $background_private
 * @property int $territory_id
 * @property int $gold
 * @property int $iron
 * @property int $timber
 * @property int $stone
 * @property int $grain
 * @property int $action_id
 * @property \Cake\I18n\Time $deceased
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $deleted
 *
 * @property \App\Model\Entity\Vocation $vocation
 * @property \App\Model\Entity\Monster $monster
 * @property \App\Model\Entity\Territory $territory
 * @property \App\Model\Entity\Action $action
 * @property \App\Model\Entity\Comment[] $comments
 * @property \App\Model\Entity\Fiefdom[] $fiefdoms
 * @property \App\Model\Entity\Fief[] $fieves
 * @property \App\Model\Entity\Persona[] $personas
 * @property \App\Model\Entity\Equipment[] $equipments
 */
class Npc extends Entity
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
