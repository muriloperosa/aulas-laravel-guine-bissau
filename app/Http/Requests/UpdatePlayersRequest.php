<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlayersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:100|min:2',
            'country' => 'required|string|max:100|min:2',
            'position' => 'required|string|max:50|min:2',
            'number' => 'required|integer|max:100|min:0',
            'born_at' => 'date|before:today',
            'team_id' => 'required|integer|exists:teams,id'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.max' => 'O tamanho máximo do nome é 100 caracteres',
            'name.min' => 'O tamanho mínimo do nome é 2 caracteres',
            'name.string' => 'O campo nome deve ser do tipo string',
            'country.required' => 'O campo país é obrigatório',
            'country.max' => 'O tamanho máximo do país é 100 caracteres',
            'country.min' => 'O tamanho mínimo do país é 2 caracteres',
            'country.string' => 'O campo país deve ser do tipo string',
            'position.required' => 'O campo posição é obrigatório',
            'position.max' => 'O tamanho máximo da posição é 100 caracteres',
            'position.min' => 'O tamanho mínimo da posição é 2 caracteres',
            'position.string' => 'O campo posição deve ser do tipo string',
            'number.required' => 'O campo número é obrigatório',
            'number.integer' => 'O campo número deve ser do tipo inteiro',
            'number.max' => 'O campo número deve ser no máximo 100',
            'number.min' => 'O campo número deve ser no mínimo 0',
            'born_at.date' => 'O campo data de nascimento deve ser do tipo date',
            'born_at.before' => 'O campo data de nascimento deve ser anterior ao dia de hoje',
            'team_id.required' => 'O campo time é obrigatório',
            'team_id.integer' => 'O campo time deve ser do tipo inteiro',
            'team_id.exists' => 'O campo time deve ser equivalente ao id de um time existente',
        ];
    }
}
