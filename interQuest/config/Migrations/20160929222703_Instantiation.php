<?php
use Migrations\AbstractMigration;

class Instantiation extends AbstractMigration
{

    public $autoId = false;

    public function up()
    {

        $this->table('actions')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('description', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('is_common', 'boolean', [
                'comment' => 'Only available to unlanded Personae.',
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('is_landed', 'boolean', [
                'comment' => 'Only available to landed Personae.',
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('check_required', 'boolean', [
                'comment' => 'Only available to landed Personae.',
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('actions_personas')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('action_id', 'integer', [
                'comment' => 'Should default to the Persona\'s default Action.',
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('persona_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'action_id',
                ]
            )
            ->addIndex(
                [
                    'persona_id',
                ]
            )
            ->create();

        $this->table('buildings')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('description', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('cost_gold', 'integer', [
                'default' => 0,
                'limit' => 2,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('cost_iron', 'integer', [
                'default' => 0,
                'limit' => 2,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('cost_timber', 'integer', [
                'default' => 0,
                'limit' => 2,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('cost_stone', 'integer', [
                'default' => 0,
                'limit' => 2,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('cost_grain', 'integer', [
                'default' => 0,
                'limit' => 2,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('cost_actions', 'integer', [
                'default' => 0,
                'limit' => 2,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('expandable', 'integer', [
                'default' => 0,
                'limit' => 2,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('builds_maximum', 'integer', [
                'default' => 0,
                'limit' => 2,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('resource_required', 'string', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ])
            ->addColumn('building_required', 'string', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ])
            ->addColumn('waterway_required', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('buildings_territories')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => true,
            ])
            ->addColumn('building_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('territory_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('size', 'integer', [
                'default' => 1,
                'limit' => 2,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('deleted', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'building_id',
                ]
            )
            ->addIndex(
                [
                    'territory_id',
                ]
            )
            ->create();

        $this->table('comments')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('npc_id', 'integer', [
                'default' => 0,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('park_id', 'integer', [
                'default' => 0,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('persona_id', 'integer', [
                'default' => 0,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('sector_id', 'integer', [
                'default' => 0,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('territory_id', 'integer', [
                'default' => 0,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('author_persona_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('subject', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('message', 'text', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('show_mapkeepers', 'boolean', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('deleted', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'author_persona_id',
                ]
            )
            ->addIndex(
                [
                    'npc_id',
                ]
            )
            ->addIndex(
                [
                    'park_id',
                ]
            )
            ->addIndex(
                [
                    'persona_id',
                ]
            )
            ->addIndex(
                [
                    'sector_id',
                ]
            )
            ->addIndex(
                [
                    'territory_id',
                ]
            )
            ->create();

        $this->table('equipments')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('price', 'integer', [
                'default' => null,
                'limit' => 4,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('units', 'integer', [
                'comment' => 'Number of units the cost/craft provides.',
                'default' => null,
                'limit' => 2,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('description', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('weight', 'decimal', [
                'default' => null,
                'null' => false,
                'precision' => 10,
                'scale' => 2,
            ])
            ->addColumn('cargo', 'integer', [
                'comment' => 'How many Personae & Gear or Resources the transport has.  Null if it\'s not a transport.',
                'default' => null,
                'limit' => 2,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('craft_gold', 'decimal', [
                'default' => null,
                'null' => true,
                'precision' => 10,
                'scale' => 2,
            ])
            ->addColumn('craft_iron', 'decimal', [
                'default' => null,
                'null' => true,
                'precision' => 10,
                'scale' => 2,
            ])
            ->addColumn('craft_timber', 'decimal', [
                'default' => null,
                'null' => true,
                'precision' => 10,
                'scale' => 2,
            ])
            ->addColumn('craft_stone', 'decimal', [
                'default' => null,
                'null' => true,
                'precision' => 10,
                'scale' => 2,
            ])
            ->addColumn('craft_grain', 'decimal', [
                'default' => null,
                'null' => true,
                'precision' => 10,
                'scale' => 2,
            ])
            ->addColumn('craft_actions', 'integer', [
                'default' => null,
                'limit' => 4,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('building_id', 'integer', [
                'comment' => 'Building required to craft the item.',
                'default' => null,
                'limit' => 10,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('is_artifact', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('is_relic', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'building_id',
                ]
            )
            ->create();

        $this->table('equipments_npcs')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('name', 'string', [
                'comment' => 'If the piece of equipment has a name.',
                'default' => null,
                'limit' => 50,
                'null' => true,
            ])
            ->addColumn('equipment_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('npc_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('territory_id', 'integer', [
                'comment' => 'If it isn\'t on the NPC, where it resides.',
                'default' => null,
                'limit' => 10,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('deleted', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'equipment_id',
                ]
            )
            ->addIndex(
                [
                    'npc_id',
                ]
            )
            ->addIndex(
                [
                    'territory_id',
                ]
            )
            ->create();

        $this->table('equipments_personas')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('name', 'string', [
                'comment' => 'If the piece of equipment has a name.',
                'default' => null,
                'limit' => 50,
                'null' => true,
            ])
            ->addColumn('equipment_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('persona_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('territory_id', 'integer', [
                'comment' => 'If it isn\'t on the NPC, where it resides.',
                'default' => null,
                'limit' => 10,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('deleted', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'equipment_id',
                ]
            )
            ->addIndex(
                [
                    'persona_id',
                ]
            )
            ->addIndex(
                [
                    'territory_id',
                ]
            )
            ->create();

        $this->table('fiefdoms')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('name', 'string', [
                'default' => 0,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('persona_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('npc_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('park_id', 'integer', [
                'default' => 0,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addIndex(
                [
                    'npc_id',
                ]
            )
            ->addIndex(
                [
                    'park_id',
                ]
            )
            ->addIndex(
                [
                    'persona_id',
                ]
            )
            ->create();

        $this->table('fieves')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->addColumn('territory_id', 'integer', [
                'default' => 0,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('fiefdom_id', 'integer', [
                'default' => 0,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('persona_id', 'integer', [
                'comment' => 'Owned by a Persona.  Is automatically public knowledge.',
                'default' => null,
                'limit' => 10,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('npc_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('deleted', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'fiefdom_id',
                ]
            )
            ->addIndex(
                [
                    'npc_id',
                ]
            )
            ->addIndex(
                [
                    'persona_id',
                ]
            )
            ->addIndex(
                [
                    'territory_id',
                ]
            )
            ->create();

        $this->table('fieves_npcs')
            ->addPrimaryKey([''])
            ->addColumn('fief_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('npc_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addIndex(
                [
                    'fief_id',
                ]
            )
            ->addIndex(
                [
                    'npc_id',
                ]
            )
            ->create();

        $this->table('fieves_personas')
            ->addPrimaryKey([''])
            ->addColumn('fief_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('persona_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addIndex(
                [
                    'fief_id',
                ]
            )
            ->addIndex(
                [
                    'persona_id',
                ]
            )
            ->create();

        $this->table('monsters')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('description', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('personable', 'boolean', [
                'comment' => 'Whether or not a Persona can be one.',
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('npcs')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('private_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('image', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('vocation_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('monster_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('background_public', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('background_private', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('territory_id', 'integer', [
                'comment' => 'The NPC\'s home Territory.',
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('gold', 'integer', [
                'default' => 0,
                'limit' => 4,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('iron', 'integer', [
                'default' => 0,
                'limit' => 4,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('timber', 'integer', [
                'default' => 0,
                'limit' => 4,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('stone', 'integer', [
                'default' => 0,
                'limit' => 4,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('grain', 'integer', [
                'default' => 0,
                'limit' => 4,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('action_id', 'integer', [
                'comment' => 'The NPC\'s default Action.',
                'default' => null,
                'limit' => 4,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('deceased', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('deleted', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'action_id',
                ]
            )
            ->addIndex(
                [
                    'monster_id',
                ]
            )
            ->addIndex(
                [
                    'territory_id',
                ]
            )
            ->addIndex(
                [
                    'vocation_id',
                ]
            )
            ->create();

        $this->table('parks')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('rank', 'string', [
                'default' => null,
                'limit' => 25,
                'null' => false,
            ])
            ->addColumn('sector_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('midreign', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('coronation', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('tax_rate', 'decimal', [
                'default' => 0,
                'null' => false,
                'precision' => 6,
                'scale' => 4,
            ])
            ->addColumn('tax_type', 'string', [
                'default' => 'flat',
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('deleted', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'sector_id',
                ]
            )
            ->create();

        $this->table('personas')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('orkID', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('user_id', 'uuid', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('long_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('image', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('vocation_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('monster_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('npc_id', 'integer', [
                'comment' => 'Influential Commoners are essentially NPC\'s.',
                'default' => null,
                'limit' => 10,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('background_public', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('background_private', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('park_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('territory_id', 'integer', [
                'comment' => 'Home territory.',
                'default' => null,
                'limit' => 10,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('gold', 'integer', [
                'default' => 0,
                'limit' => 4,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('iron', 'integer', [
                'default' => 0,
                'limit' => 4,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('timber', 'integer', [
                'default' => 0,
                'limit' => 4,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('stone', 'integer', [
                'default' => 0,
                'limit' => 4,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('grain', 'integer', [
                'default' => 0,
                'limit' => 4,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('action_id', 'integer', [
                'comment' => 'Default action.',
                'default' => null,
                'limit' => 10,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('is_knight', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('is_rebel', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('is_monarch', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('fiefs_assigned', 'integer', [
                'default' => 0,
                'limit' => 2,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('shattered', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('deceased', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'action_id',
                ]
            )
            ->addIndex(
                [
                    'monster_id',
                ]
            )
            ->addIndex(
                [
                    'park_id',
                ]
            )
            ->addIndex(
                [
                    'territory_id',
                ]
            )
            ->addIndex(
                [
                    'user_id',
                ]
            )
            ->addIndex(
                [
                    'vocation_id',
                ]
            )
            ->create();

        $this->table('personas_titles')
            ->addPrimaryKey([''])
            ->addColumn('persona_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('title_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addIndex(
                [
                    'persona_id',
                ]
            )
            ->addIndex(
                [
                    'title_id',
                ]
            )
            ->create();

        $this->table('sectors')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('row', 'integer', [
                'default' => 0,
                'limit' => 2,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('column', 'integer', [
                'default' => 0,
                'limit' => 2,
                'null' => false,
                'signed' => false,
            ])
            ->create();

        $this->table('terrains')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('description', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('image', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('color', 'string', [
                'default' => null,
                'limit' => 6,
                'null' => false,
            ])
            ->create();

        $this->table('territories')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('name', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('sector_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('row', 'integer', [
                'default' => 0,
                'limit' => 2,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('column', 'integer', [
                'default' => 0,
                'limit' => 2,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('steward_persona_id', 'integer', [
                'comment' => 'If there\'s a Steward, this is the guy.',
                'default' => null,
                'limit' => 10,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('steward_cut', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('terrain_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('primary_resource', 'string', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('secondary_resource', 'string', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('castle_strength', 'integer', [
                'default' => 0,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('is_wasteland', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('is_no_mans_land', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('has_road', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'sector_id',
                ]
            )
            ->addIndex(
                [
                    'steward_persona_id',
                ]
            )
            ->addIndex(
                [
                    'terrain_id',
                ]
            )
            ->create();

        $this->table('titles')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('is_landed', 'boolean', [
                'default' => true,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('fiefs_maximum', 'integer', [
                'default' => 1,
                'limit' => 2,
                'null' => false,
                'signed' => false,
            ])
            ->create();

        $this->table('vocations')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('name', 'string', [
                'default' => 0,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('ability', 'string', [
                'default' => null,
                'limit' => 25,
                'null' => false,
            ])
            ->addColumn('ability_description', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('actions_personas')
            ->addForeignKey(
                'action_id',
                'actions',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'persona_id',
                'personas',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('buildings_territories')
            ->addForeignKey(
                'building_id',
                'buildings',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'territory_id',
                'territories',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('comments')
            ->addForeignKey(
                'author_persona_id',
                'personas',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'npc_id',
                'npcs',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'park_id',
                'parks',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'persona_id',
                'personas',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'sector_id',
                'sectors',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'territory_id',
                'territories',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('equipments')
            ->addForeignKey(
                'building_id',
                'buildings',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('equipments_npcs')
            ->addForeignKey(
                'equipment_id',
                'equipments',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'npc_id',
                'npcs',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'territory_id',
                'territories',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('equipments_personas')
            ->addForeignKey(
                'equipment_id',
                'equipments',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'persona_id',
                'personas',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'territory_id',
                'territories',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('fiefdoms')
            ->addForeignKey(
                'npc_id',
                'npcs',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'park_id',
                'parks',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'persona_id',
                'personas',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('fieves')
            ->addForeignKey(
                'fiefdom_id',
                'fiefdoms',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'npc_id',
                'npcs',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'persona_id',
                'personas',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'territory_id',
                'territories',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('fieves_npcs')
            ->addForeignKey(
                'fief_id',
                'fieves',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'npc_id',
                'npcs',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('fieves_personas')
            ->addForeignKey(
                'fief_id',
                'fieves',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'persona_id',
                'personas',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('npcs')
            ->addForeignKey(
                'action_id',
                'actions',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'monster_id',
                'monsters',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'territory_id',
                'territories',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'vocation_id',
                'vocations',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('parks')
            ->addForeignKey(
                'sector_id',
                'sectors',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('personas')
            ->addForeignKey(
                'action_id',
                'actions',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'monster_id',
                'monsters',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'park_id',
                'parks',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'territory_id',
                'territories',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'vocation_id',
                'vocations',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('personas_titles')
            ->addForeignKey(
                'persona_id',
                'personas',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'title_id',
                'titles',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('territories')
            ->addForeignKey(
                'sector_id',
                'sectors',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'steward_persona_id',
                'personas',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'terrain_id',
                'terrains',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();
    }

    public function down()
    {
        $this->table('actions_personas')
            ->dropForeignKey(
                'action_id'
            )
            ->dropForeignKey(
                'persona_id'
            );

        $this->table('buildings_territories')
            ->dropForeignKey(
                'building_id'
            )
            ->dropForeignKey(
                'territory_id'
            );

        $this->table('comments')
            ->dropForeignKey(
                'author_persona_id'
            )
            ->dropForeignKey(
                'npc_id'
            )
            ->dropForeignKey(
                'park_id'
            )
            ->dropForeignKey(
                'persona_id'
            )
            ->dropForeignKey(
                'sector_id'
            )
            ->dropForeignKey(
                'territory_id'
            );

        $this->table('equipments')
            ->dropForeignKey(
                'building_id'
            );

        $this->table('equipments_npcs')
            ->dropForeignKey(
                'equipment_id'
            )
            ->dropForeignKey(
                'npc_id'
            )
            ->dropForeignKey(
                'territory_id'
            );

        $this->table('equipments_personas')
            ->dropForeignKey(
                'equipment_id'
            )
            ->dropForeignKey(
                'persona_id'
            )
            ->dropForeignKey(
                'territory_id'
            );

        $this->table('fiefdoms')
            ->dropForeignKey(
                'npc_id'
            )
            ->dropForeignKey(
                'park_id'
            )
            ->dropForeignKey(
                'persona_id'
            );

        $this->table('fieves')
            ->dropForeignKey(
                'fiefdom_id'
            )
            ->dropForeignKey(
                'npc_id'
            )
            ->dropForeignKey(
                'persona_id'
            )
            ->dropForeignKey(
                'territory_id'
            );

        $this->table('fieves_npcs')
            ->dropForeignKey(
                'fief_id'
            )
            ->dropForeignKey(
                'npc_id'
            );

        $this->table('fieves_personas')
            ->dropForeignKey(
                'fief_id'
            )
            ->dropForeignKey(
                'persona_id'
            );

        $this->table('npcs')
            ->dropForeignKey(
                'action_id'
            )
            ->dropForeignKey(
                'monster_id'
            )
            ->dropForeignKey(
                'territory_id'
            )
            ->dropForeignKey(
                'vocation_id'
            );

        $this->table('parks')
            ->dropForeignKey(
                'sector_id'
            );

        $this->table('personas')
            ->dropForeignKey(
                'action_id'
            )
            ->dropForeignKey(
                'monster_id'
            )
            ->dropForeignKey(
                'park_id'
            )
            ->dropForeignKey(
                'territory_id'
            )
            ->dropForeignKey(
                'user_id'
            )
            ->dropForeignKey(
                'vocation_id'
            );

        $this->table('personas_titles')
            ->dropForeignKey(
                'persona_id'
            )
            ->dropForeignKey(
                'title_id'
            );

        $this->table('territories')
            ->dropForeignKey(
                'sector_id'
            )
            ->dropForeignKey(
                'steward_persona_id'
            )
            ->dropForeignKey(
                'terrain_id'
            );

        $this->dropTable('actions');
        $this->dropTable('actions_personas');
        $this->dropTable('buildings');
        $this->dropTable('buildings_territories');
        $this->dropTable('comments');
        $this->dropTable('equipments');
        $this->dropTable('equipments_npcs');
        $this->dropTable('equipments_personas');
        $this->dropTable('fiefdoms');
        $this->dropTable('fieves');
        $this->dropTable('fieves_npcs');
        $this->dropTable('fieves_personas');
        $this->dropTable('monsters');
        $this->dropTable('npcs');
        $this->dropTable('parks');
        $this->dropTable('personas');
        $this->dropTable('personas_titles');
        $this->dropTable('sectors');
        $this->dropTable('terrains');
        $this->dropTable('territories');
        $this->dropTable('titles');
        $this->dropTable('vocations');
    }
}
