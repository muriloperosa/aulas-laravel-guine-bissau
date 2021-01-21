<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamsRequest;
use App\Http\Requests\UpdateTeamsRequest;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamsController extends Controller
{
    public function index(Request $request)
    {   
        // Buscando todos os times
        // $teams = Team::all();

        $q = $request->query('q', null);

        if ($q)
        {
            // pesquisar
            $teams = Team::where('name', 'LIKE', "%".$q."%")
                ->orWhere('country', 'LIKE', "%".$q."%")
                ->orderBy('id', 'DESC')
                ->paginate(10)
                ->withQueryString();
        }
        else
        {
            $teams = Team::orderBy('id', 'DESC')->paginate(10);
        }

        return view('teams.index', ['teams' => $teams, 'q' => $q]);
    }

    public function create()
    {
        return view('teams.create');
    }

    public function store(StoreTeamsRequest $request)
    {
        Team::create($request->all());
        return redirect(route('teams-index'));
    }

    public function edit($id)
    {
        $team = Team::find($id);
        if (empty($team))
        {
            return redirect(route('teams-index'));
        }

        return view('teams.edit', ['team' => $team]);
    }

    public function update(UpdateTeamsRequest $request, $id)
    {
        $data = [
            'name' => $request->name,
            'country' => $request->country,
            'foundation_year' => $request->foundation_year,
        ];

        Team::where('id', $id)->update($data);
        return redirect(route('teams-index'));
    }

    public function destroy($id)
    {
        Team::where('id', $id)->delete();
        return redirect(route('teams-index'));
    }
}
