@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h1>Cadastrar Jogador</h1>
            </div>
            <div class="col-sm-12 col-md-6">
                <a href="{{ route('players-index') }}" class="btn btn-md btn-primary float-right">Voltar</a>
            </div>
        </div> 

        <div class="bg-white pt-3 mt-2">

            <div class="col-sm-12">
                <h5>Informe os dados do time:</h5>
                <br/>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="col-sm-12">
                <form method="POST" action="{{ route('players-store') }}">
                    @csrf
                    @method('POST')

                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input type="text" id="name" name="name" required class="form-control" placeholder="Informe um nome para o jogador..."/>
                    </div>

                    <div class="form-group">
                        <label for="country">País:</label>
                        <input type="text" id="country" name="country" required class="form-control" placeholder="Informe um país para o jogador..."/>
                    </div>

                    <div class="form-group">
                        <label for="number">Número:</label>
                        <input type="number" min="0" max="99" step="1" id="number" name="number" class="form-control" required placeholder="Informe um número para o jogador..."/>
                    </div>

                    <div class="form-group">
                        <label for="position">Posição:</label>
                        <input type="text" id="position" name="position" required class="form-control" placeholder="Informe uma posição para o jogador..."/>
                    </div>

                    <div class="form-group"> 
                        <label for="born_at">Data de Nascimento:</label>
                        <input type="date" id="born_at" name="born_at" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="team_id">Time:</label>
                        <select name="team_id" id="team_id" class="form-control" required>
                            <option>Selecione o time do jogador...</option>
                            @foreach($teams as $team)
                                <option value="{{ $team->id }}"> {{ $team->name }} </option>
                            @endforeach
                        </select>
                    </div>

                    <br/>
                    <div class="form-group float-right mt-2">
                        <button type="submit" class="btn btn-md btn-primary">Salvar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection