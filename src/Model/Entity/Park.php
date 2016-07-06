<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Park Entity
 *
 * @property int $id
 * @property string $name
 * @property string $rank
 * @property int $sector_id
 * @property \Cake\I18n\Time $midreign
 * @property \Cake\I18n\Time $coronation
 * @property float $tax_rate
 * @property string $tax_type
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $deleted
 *
 * @property \App\Model\Entity\Sector $sector
 * @property \App\Model\Entity\Comment[] $comments
 * @property \App\Model\Entity\Fiefdom[] $fiefdoms
 * @property \App\Model\Entity\Persona[] $personas
 */
class Park extends Entity
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
