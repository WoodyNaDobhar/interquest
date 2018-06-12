
<li class="treeview {!! Request::is('actions*') || Request::is('buildings*') || Request::is('equipment*') || Request::is('races*') || Request::is('terrains*') || Request::is('titles*') || Request::is('vocations*') ? 'menu-open' : '' !!}">
	<a href="#">
		<i class="fa fa-leanpub"></i>
		<span>References</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu" {!! Request::is('actions*') || Request::is('buildings*') || Request::is('equipment*') || Request::is('races*') || Request::is('terrains*') || Request::is('titles*') || Request::is('vocations*') ? 'style="display: block;"' : '' !!}>
		<li class="{!! Request::is('actions*') ? 'active' : '' !!}">
			<a href="{!! route('actions.index') !!}"><i class="fa fa-play"></i><span>Actions</span></a>
		</li>
		<li class="{!! Request::is('buildings*') ? 'active' : '' !!}">
			<a href="{!! route('buildings.index') !!}"><i class="fa fa-building"></i><span>Buildings</span></a>
		</li>
		<li class="{!! Request::is('equipment*') ? 'active' : '' !!}">
			<a href="{!! route('equipment.index') !!}"><i class="fa fa-shield"></i><span>Equipment</span></a>
		</li>
		<li class="{!! Request::is('races*') ? 'active' : '' !!}">
			<a href="{!! route('races.index') !!}"><i class="fa fa-users"></i><span>Races</span></a>
		</li>
		<li class="{!! Request::is('terrains*') ? 'active' : '' !!}">
			<a href="{!! route('terrains.index') !!}"><i class="fa fa-tree"></i><span>Terrains</span></a>
		</li>
		<li class="{!! Request::is('titles*') ? 'active' : '' !!}">
			<a href="{!! route('titles.index') !!}"><i class="fa fa-black-tie"></i><span>Titles</span></a>
		</li>
		<li class="{!! Request::is('vocations*') ? 'active' : '' !!}">
			<a href="{!! route('vocations.index') !!}"><i class="fa fa-industry"></i><span>Vocations</span></a>
		</li>
	</ul>
</li>
<li class="treeview {!! Request::is('parks*') || Request::is('personae*') ? 'menu-open' : '' !!}">
	<a href="#">
		<i class="fa fa-map"></i>
		<span>Public Records</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu" {!! Request::is('parks*') || Request::is('personae*') ? 'style="display: block;"' : '' !!}>
		<li class="{!! Request::is('parks*') ? 'active' : '' !!}">
			<a href="{!! route('parks.index') !!}"><i class="fa fa-leaf"></i><span>Settlements</span></a>
		</li>
		<li class="{!! Request::is('personae*') ? 'active' : '' !!}">
			<a href="{!! route('personae.index') !!}"><i class="fa fa-user"></i><span>Personae</span></a>
		</li>
	</ul>
</li>
@if(Auth::user()->is_admin || Auth::user()->is_mapkeeper)
<li class="treeview {!! Request::is('fiefdoms*') || Request::is('npcs*') || Request::is('territories*') || Request::is('users*') ? 'menu-open' : '' !!}">
	<a href="#">
		<i class="fa fa-map-o"></i>
		<span>Private Records</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu" {!! Request::is('fiefdoms*') || Request::is('npcs*') || Request::is('territories*') || Request::is('users*') ? 'style="display: block;"' : '' !!}>
		<li class="{!! Request::is('fiefdoms*') ? 'active' : '' !!}">
			<a href="{!! route('fiefdoms.index') !!}"><i class="fa fa-cubes"></i><span>Fiefdoms</span></a>
		</li>
		<li class="{!! Request::is('npcs*') ? 'active' : '' !!}">
			<a href="{!! route('npcs.index') !!}"><i class="fa fa-user-secret"></i><span>Npcs</span></a>
		</li>
		<li class="{!! Request::is('territories*') ? 'active' : '' !!}">
			<a href="{!! route('territories.index') !!}"><i class="fa fa-connectdevelop"></i><span>Territories</span></a>
		</li>
		@if(Auth::user()->is_admin)
		<li class="{!! Request::is('users*') ? 'active' : '' !!}">
			<a href="{!! route('users.index') !!}"><i class="fa fa-user-plus"></i><span>Users</span></a>
		</li>
		@endif
	</ul>
</li>
@endif