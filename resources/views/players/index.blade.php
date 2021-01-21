@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h1>Jogadores</h1>
            </div>
            <div class="col-sm-12 col-md-6">
                <a href="{{ route('players-create') }}" class="btn btn-md btn-success float-right">Adicionar</a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-0 col-md-6"></div>
            <div class="col-sm-12 col-md-6">
                <form>
                    <div class="input-group mb-3 mt-2">
                        <input type="text" name="q" class="form-control" placeholder="Pesquisar..." value="{{ $q }}"/>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                Pesquisar
                            </button>
                            <a href="{{ route('players-index') }}" class="btn btn-danger">Limpar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row bg-white pt-3 mt-2">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Posição</th>
                                <th>Número</th>
                                <th>País</th>
                                <th>Data Nascimento</th>
                                <th>Time</th>
                                <th>...</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($players as $player)
                                <tr>
                                    <th>{{ $player->id }}</th>
                                    <td>{{ $player->name }}</td>
                                    <td>{{ $player->position }}</td>
                                    <td>{{ $player->number }}</td>
                                    <td>{{ $player->country }}</td>
                                    <td>{{ $player->born_at->format('Y-m-d') }}</td>
                                    <td>{{ $player->team->name }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('players-edit', ['id' => $player->id]) }}" class="btn btn-sm btn-primary mr-1">Editar</a>
                                        <form method="POST" action="{{ route('players-destroy', ['id' => $player->id ]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr/>
                    <div class="float-right">
                        {{ $players->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection