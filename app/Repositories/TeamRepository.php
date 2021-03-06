<?php 
namespace App\Repositories;

class TeamRepository
{
	public function points($team)
	{
		return $team->where('teams.id', $team->id)
					->join('tickets', 'teams.id', '=', 'tickets.team_id')
					->join('points', 'tickets.id', '=', 'points.ticket_id')
					->sum('points.value');
	}
}