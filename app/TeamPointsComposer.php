<?php 
namespace App;

use App\Repositories\TeamRepository;
use Illuminate\View\View;

class TeamPointsComposer
{
    public function __construct(TeamRepository $team)
    {		
        $this->team = $team;
    }

    public function compose(View $view)
    {
    	$view->with('points', $this->team->points(\App\Team::first()));
    }
}
