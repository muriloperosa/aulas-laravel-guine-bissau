<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeamsRequest extends FormRequest
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
           'name' => 'required|max:50|unique:teams,name,'.$this->id.'|min:2',
           'country' => 'required|max:100|min:2',
           'foundation_year' => 'required|max:2021|min:1800|integer'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.max' => 'O tamanho máximo do nome é 50 caracteres',
            'name.unique' => 'O nome do time já está cadastrado.',
            'name.min' => 'O tamanho mínimo do nome é 2 caracteres',
            'country.required' => 'O campo país é obrigatório',
            'country.max' => 'O tamanho máximo do país é 100 caracteres',
            'country.min' => 'O tamanho mínimo do país é 2 caracteres',
            'foundation_year.required' => 'O campo ano de fundação é obrigatório',
            'foundation_year.max' => 'O ano máximo é 2021.',
            'foundation_year.min' => 'O ano mínimo é 1800.',
            'foundation_year.integer' => 'O ano deve ser inteiro.',
        ];
    }
}
