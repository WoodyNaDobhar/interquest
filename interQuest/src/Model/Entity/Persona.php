<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Persona Entity
 *
 * @property int $id
 * @property int $orkID
 * @property string $user_id
 * @property string $name
 * @property string $long_name
 * @property string $image
 * @property int $vocation_id
 * @property int $monster_id
 * @property int $npc_id
 * @property string $background_public
 * @property string $background_private
 * @property int $park_id
 * @property int $territory_id
 * @property int $gold
 * @property int $iron
 * @property int $timber
 * @property int $stone
 * @property int $grain
 * @property int $action_id
 * @property bool $is_knight
 * @property bool $is_rebel
 * @property bool $is_monarch
 * @property int $fiefs_assigned
 * @property \Cake\I18n\Time $shattered
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $deceased
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Vocation $vocation
 * @property \App\Model\Entity\Monster $monster
 * @property \App\Model\Entity\Npc $npc
 * @property \App\Model\Entity\Park $park
 * @property \App\Model\Entity\Territory $territory
 * @property \App\Model\Entity\Action[] $actions
 * @property \App\Model\Entity\Comment[] $comments
 * @property \App\Model\Entity\Fiefdom[] $fiefdoms
 * @property \App\Model\Entity\Fief[] $fieves
 * @property \App\Model\Entity\Equipment[] $equipments
 * @property \App\Model\Entity\Title[] $titles
 */
class Persona extends Entity
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
