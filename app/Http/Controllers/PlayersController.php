<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Requests\StorePlayersRequest;
use App\Http\Requests\UpdatePlayersRequest;

class PlayersController extends Controller
{
    public function index()
    {
        $players = Player::all();
        return view('players.index', ['players' => $players]);
    }

    public function create()
    {
        $teams = Team::all();
        return view('players.create', ['teams' => $teams]);
    }

    public function store(StorePlayersRequest $request)
    {
        Player::create($request->all());
        return redirect(route('players-index'));
    }

    public function edit($id)
    {
        $player = Player::where('id', $id)->first();

        if (!empty($player))
        {
            $teams = Team::all();
            return view('players.edit', ['teams' => $teams, 'player' => $player]);
        }

        return redirect(route('players-index'));
    }

    public function update(UpdatePlayersRequest $request, $id)
    {
        $data = [
            'name' => $request->name,
            'position' => $request->position,
            'number' => $request->number,
            'country' => $request->country,
            'born_at' => $request->born_at,
            'team_id' => $request->team_id
        ];

        Player::where('id', $id)->update($data);
        return redirect(route('players-index'));
    }

    public function destroy($id)
    {
        Player::where('id', $id)->delete();
        return redirect(route('players-index'));
    }
}
