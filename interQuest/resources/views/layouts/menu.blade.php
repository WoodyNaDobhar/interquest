<li class="{{ Request::is('actions*') ? 'active' : '' }}">
    <a href="{!! route('actions.index') !!}"><i class="fa fa-edit"></i><span>Actions</span></a>
</li>

<li class="{{ Request::is('buildings*') ? 'active' : '' }}">
    <a href="{!! route('buildings.index') !!}"><i class="fa fa-edit"></i><span>Buildings</span></a>
</li>

<li class="{{ Request::is('comments*') ? 'active' : '' }}">
    <a href="{!! route('comments.index') !!}"><i class="fa fa-edit"></i><span>Comments</span></a>
</li>

<li class="{{ Request::is('equipment*') ? 'active' : '' }}">
    <a href="{!! route('equipments.index') !!}"><i class="fa fa-edit"></i><span>Equipments</span></a>
</li>

<li class="{{ Request::is('fiefdoms*') ? 'active' : '' }}">
    <a href="{!! route('fiefdoms.index') !!}"><i class="fa fa-edit"></i><span>Fiefdom</span></a>
</li>

<li class="{{ Request::is('fieves*') ? 'active' : '' }}">
    <a href="{!! route('fieves.index') !!}"><i class="fa fa-edit"></i><span>Fieves</span></a>
</li>

<li class="{{ Request::is('races*') ? 'active' : '' }}">
    <a href="{!! route('races.index') !!}"><i class="fa fa-edit"></i><span>Races</span></a>
</li>

<li class="{{ Request::is('npcs*') ? 'active' : '' }}">
    <a href="{!! route('npcs.index') !!}"><i class="fa fa-edit"></i><span>Npcs</span></a>
</li>

<li class="{{ Request::is('parks*') ? 'active' : '' }}">
    <a href="{!! route('parks.index') !!}"><i class="fa fa-edit"></i><span>Parks</span></a>
</li>

<li class="{{ Request::is('personae*') ? 'active' : '' }}">
    <a href="{!! route('personae.index') !!}"><i class="fa fa-edit"></i><span>Personae</span></a>
</li>

<li class="{{ Request::is('revisions*') ? 'active' : '' }}">
    <a href="{!! route('revisions.index') !!}"><i class="fa fa-edit"></i><span>Revisions</span></a>
</li>

<li class="{{ Request::is('terrains*') ? 'active' : '' }}">
    <a href="{!! route('terrains.index') !!}"><i class="fa fa-edit"></i><span>Terrains</span></a>
</li>

<li class="{{ Request::is('territories*') ? 'active' : '' }}">
    <a href="{!! route('territories.index') !!}"><i class="fa fa-edit"></i><span>Territories</span></a>
</li>

<li class="{{ Request::is('titles*') ? 'active' : '' }}">
    <a href="{!! route('titles.index') !!}"><i class="fa fa-edit"></i><span>Titles</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('vocations*') ? 'active' : '' }}">
    <a href="{!! route('vocations.index') !!}"><i class="fa fa-edit"></i><span>Vocations</span></a>
</li>

