<?php

namespace App\Http\Controllers\Web;

use App\Team;
use App\Repositories\TeamRepository;
use App\Http\Requests\StoreTeamRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exceptions\ActionNotCompletedException;
class TeamController extends Controller
{
    public function __construct(TeamRepository $teamRepository)
    {
        $this->teamRepo = $teamRepository;
        $this->authorizeResource(Team::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Team::paginate();
        // return Team::all()->firstWhere('users_count', '>' , 2);
        // return Team::all()->filter(function ($team)
        // {
        //     return $team->users_count > 2;
        // });
        // return Team::all()->reject(function ($team)
        // {
        //     return $team->users_count > 2;
        // });
        // return Team::all()->search(function ($team)
        // {
        //     return $team->users_count > 2;
        // });

        // return Team::all()->mapToGroups(function($team){
        //         return [$team->users_count => $team->id];
        // });

        // return Team::all()->reduce(function($carry, $team){
        //     return $carry + $team->users_count;
        // });

        // return Team::all()->sortBy('users_count')->values();
        // return Team::all()->pluck('title');
        // return Team::all()->transform(function($team){
        //     $team->title = strtoupper($team->title);
        //     return $team;
        // });

        $collection1 =  Team::all();
        $collection2 = $collection1->nth(2);

        return $collection2;



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeamRequest $request)
    {
        Team::create($request->validated());
        return redirect($to = '/teams', $status = 302, $headers = [], $secure = null);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return response()->json($team);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        throw new ActionNotCompletedException();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
    }

    public function points(Team $team)
    {
        $this->authorize('view', $team);
        return response()->json($this->teamRepo->points($team));
    }
}
