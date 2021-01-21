@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h1>Times</h1>
            </div>
            <div class="col-sm-12 col-md-6">
                <a href="{{ route('teams-create') }}" class="btn btn-md btn-success float-right">Adicionar</a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-0  col-md-6"></div>
            <div class="col-sm-12 col-md-6">
                <form method="GET">
                    <div class="input-group mb-3 mt-2">
                        <input type="text" class="form-control" placeholder="Pesquisar..." name="q" value="{{$q}}"/>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                Pesquisar
                            </button>
                            <a href="{{ route('teams-index') }}" class="btn btn-danger">Limpar</a>
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
                                <th>País</th>
                                <th>Ano de Fundação</th>
                                <th>Número de Jogadores</th>
                                <th>...</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teams as $team)
                                <tr>
                                    <th>{{ $team->id }}</th>
                                    <td>{{ $team->name }}</td>
                                    <td>{{ $team->country }}</td>
                                    <td>{{ $team->foundation_year }}</td>
                                    <td>{{ count($team->players) }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('teams-edit', ['id' => $team->id]) }}" class="btn btn-sm btn-primary mr-1">Editar</a>
                                        <form method="POST" action="{{ route('teams-destroy', ['id' => $team->id ]) }}">
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
                        {{ $teams->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection