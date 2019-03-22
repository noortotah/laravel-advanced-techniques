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
        return Team::paginate();
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
