<?php

/*
|--------------------------------------------------------------------------
| Method Overview of RIOTs API
|--------------------------------------------------------------------------
|
| This document contains a overview of all methods which are available
| to call on RIOT's api servers.
|
*/
return [
	
	'champion' => [
		'base_url' => '/lol/platform/v3/champions',

		// Retrieve all champions.
		'all' => '',

		// Retrieve champion by Id
		'single' => '/lol/platform/v3/champions/{id}',
	],

	'champion_mastery' => [
		'base_url' => '/lol/champion-mastery/v3',

		// Get all champion mastery entries sorted by number of champion points descending.
		'all' => '/champion-masteries/by-summoner/{summonerId}',

		// Get a champion mastery by player ID and champion ID.
		'single' => '/champion-masteries/by-summoner/{summonerId}/by-champion/{championId}',

		//  Get a player's total champion mastery score, which is the sum of individual champion mastery levels.
		'score' => '/scores/by-summoner/{summonerId}',
	],

	'league' => [
		'base_url' => '/lol/league/v3',

		// Get the challenger league for a given queue.
		'getByQueue' => '/challengerleagues/by-queue/{queue}',

		// Get leagues in all queues for a given summoner ID.
		'getBySummoner' => '/leagues/by-summoner/{summonerId}',

		// Get the master league for a given queue.
		'getMasterOfQueue' => '/masterleagues/by-queue/{queue}',

		// Get league positions in all queues for a given summoner ID
		'getPositionsOfSummoner' => '/positions/by-summoner/{summonerId}',
	],

	'mastery' => [
		'base_url' => '/lol/platform/v3',

		// Get mastery pages for a given summoner ID.
		'all' => '/masteries/by-summoner/{summonerId}',
	],

	'match' => [
		'base_url' => '/lol/match/v3',

		// Get match by matchid.
		'single' => '/matches/{matchId}',

		/**
		 * Get matchlist for ranked games played on given account ID and platform ID and 
		 * filtered using given filter parameters, if any.
		 */
		'all' => '/matchlists/by-account/{accountId}',

		/**
		 * Get matchlist for last 20 matches played on given account ID.
		 */
		'last20' => '/matchlists/by-account/{accountId}/recent',

		// Get match timeline by match ID
		'timeline' => '/timelines/by-match/{matchId}',

		// Get match IDs by tournament code.
		'tournament' => '/matches/by-tournament-code/{tournamentCode}/ids',

		// Get match by match ID and tournament code.
		'singleByTournamentCode' => '/matches/{matchId}/by-tournament-code/{tournamentCode}',
	],

	'runes' => [
		'base_url' => '/lol/platform/v3',

		// Get rune pages for a given summoner id.
		'all' => '/runes/by-summoner/{summonerId}',
	],

	'spectator' => [
		'base_url' => '/active-games/by-summoner/{summonerId}',

		// Get current game information for the given summoner ID.
		'gamesOfSummoner' => '/active-games/by-summoner/{summonerId}',

		// Get list of featured games.
		'featureGames' => '/featured-games',
	],

	'status' => [
		'base_url' => '/lol/status/v3',

		// Get all statuses of riots online services (Client, Game, Store, Website)
		'all' => '/shard-data',
	],

	'summoner' => [
		'base_url' => '/lol/summoner/v3',

		// Get summoner by account ID.
		'byAccountId' => '/summoners/by-account/{accountId}',

		// Get summoner by summoner name
		'byName' => '/summoners/by-name/{summonerName}',

		// Get a summoner by summoner ID
		'byId' => '/summoners/by-name/{summonerName}',
	],
]; 