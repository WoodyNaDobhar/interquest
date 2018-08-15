@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<section class="content-header">
			<h1 class="pull-left">Welcome to the quest!</h1>
		</section>
		<div class="content">
			<div class="clearfix"></div>
	
			@include('flash::message')
	
			<div class="clearfix"></div>
				
			<div class="row">
				<div class="col-md-12">
					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title">
								What's InterQuest?
							</h3>
							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
								</button>
							</div>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-md-12">
									&emsp;InterQuest is a system to provide a framework for <a href="http://www.amtgard.com" target="_blank">Amtgard</a> around which both local and inter-group quests, battlegames, story arcs, and raids can take place. Its goal is to set a feudal environment necessary to provide the motives that increase role play, friendly rivalries, guile, tactics, intrigue, and put titles, fighting companies, and households in the game. With the efforts of a storyteller we refer to as a MapKeeper, the generic weekly schedule of ‘ditch, Battlegame, ditch’ is expanded to a larger storyline encompassing every member of the park. The system is based off of a model first designed as AmtRisk, but expanded to promote natural balance, and include new factors that broaden the scenario to allow intra-park stories and fantasy elements. 
									<br><br>&emsp;Each group has a series of territories controlled by the local monarch and Personae with (limited) land-granting titles, as well as territories under the control of the Gentry, Commoners, Monsters, and NPCs. Each Territory generates a predefined set of Resources, and may contain an Artifact, an item of power useful in forging ultra-powerful Relics. Within the group, individual factions vie for power, land, and wealth, while defending the lands from constant threats. Intragroup interaction is encouraged by rewarding raids with Artifacts, land, or wealth. 
									<br><br>&emsp;While the rules are complicated enough to simulate feudal politics and warfare, they attempt to be as unobtrusive as possible, leaving the Players to fill in the blanks with as little or as much role-play as they desire. The combat oriented will find more than enough opportunity for warfare, the tactically minded will discover a whole new realm of strategy, and the lovers of role play will have ample NPCs and Personae to interact with. InterQuest is, above all things, the game YOU make it.
									<br><br>&emsp;Being an open, unguided system, it is quite easy to miss what opportunities lay before you.  You might think of IQ as little more than ‘noble vs. noble’, wherein all the fun, and thus the very point of the game, is in playing landed nobility.  This is a fine perspective for those who have put in the hard work and dedication to the game of Amtgard required to gain such titles, but it would leave the vast majority out of the real fun if such were so.  It’s not how we play tabletop RPG’s, it’s not how we do InterQuest.  IQ is a ‘pointless’ system, in that it does not seek to promote any specific end goal.  One does not ‘win’ IQ, one only plays.  There’s always an opportunity, and always someone bigger looking to take yours.
									<br><br>&emsp;In many feudal societies, infighting amongst the nobles often led to invasion.  Instead of such base goals, the game should focus on the City itself, not the nobles.  The City is, always, surrounded by enemies chomping at the bit.  Good monarchs should minimize noble squabbles whenever possible (or whenever it doesn’t meet their own needs, of course).  Good MapKeepers should have NPCs/Monsters invading every now and then, to remind people in the town why they are on the same side.  Good players should be securing their own fortunes, while following their own motives in relation to the City and its governance.  There is much to be done, and the petty bickering of two neighbor nobles need not be the focus of everyone's efforts.
									<br><br>&emsp;Each player, be they officer, noble, or Commoner, is responsible for finding their niche in the game, but often the goal of any game is dominance.  Everyone has roles to play, yes, but everyone has a path to power.  Tho you and your fellow town-mates fight side by side, there’s no reason you can’t also jockey for power.  Clever Commoners can discover there is great freedom in not being beholden to the monarch for their income, and with it great opportunity.  No noble rules alone, and no noble rules an empty house.  There is much power in the people.  Clever nobles will find ways to get advantages over their rivals while still maintaining order and unity, and the cleverest of them will secure authority even beyond their immediate means.  Clever monarchs will keep nobles bickering, but rarely fighting, all the while ensuring that the populace is happy with the security and governance of their town.
									<br><br>&emsp;The greatest gift of IQ is the impetus for role play.  Nothing in the rules suggests the solution to problems is fighting.  Diplomacy, economics, and the desire to explore are all paths that stand before each and every IQ player.  Each and every player has a whole world to discover and tame.  What you do with that world…well, that’s up to you.
									<br><br>Live, Love, Learn!
									<br>-Chibasama Ryúichiro
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
				
			<div class="row">
				<div class="col-md-12">
					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title">
								How do I get my park in on this?
							</h3>
							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
								</button>
							</div>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-md-12">
									First things first, if your park isn't already in <a href="/parks" target="_blank">this list</a>, you'll have to do two things.  First, have your PM update your park's ORK to include a specific location for the park.  Then, you'll have to have Chiba import the park.
									<br><br>&emsp;Once that's done, you'll need a MapKeeper.  We recommend electing the individual, but most corporas allow a Monarch to appoint a person to any job.  However your park selects their MapKeeper, that person will need to be verified by Chiba by the park's Monarch.  Send Chiba both the mapkeeper's email (used to log into facebook), and a link to the facebook group for the Park.  Once Chiba is done asking the Monarch if this is ok, he'll send the new MapKeeper a link to get them started, and set them as MapKeeper.
									<br><br>&emsp;After the MapKeeper is all settled in, they just have to start adding stuff 8)  Territory details, NPCs, Personae...whatever the MapKeeper needs to track should be trackable.
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
				
			<div class="row">
				<div class="col-md-12">
					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title">
								My park is already in, how do I get in on this?
							</h3>
							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
								</button>
							</div>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-md-12">
									This is an easy one: just send your facebook login email to your MapKeeper and ask them to hook you up 8)  They'll send you a link to claim your Persona if it already exists, or create it if it's new.
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
