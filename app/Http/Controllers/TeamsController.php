<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamsController extends Controller
{
    public function index()
    {
        // retornar todos os times
        // $teams = Team::all();

        $teams = Team::where('id', '=', '1')->get();
        return $teams;
    }

    public function create()
    {
        echo 'rota de criação de time';
    }

    public function edit($id)
    {
        // $teams = Team::where('id', '=', $id)->get();
        $teams = Team::find($id);
        return $teams->name;
    }
}
