<?php

namespace App\Http\Requests;

use App\Models\Pessoa;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        // if($this->record_from_database)
        //     $nome = (Pessoa::find($this->pessoa_id)->nome) ?? null;

        // // $senha = geraSenha();
        // $this->merge([
        //     'cad_user_id' => auth()->user()->id,
        //     'password' => bcrypt($this->senha),
        //     'name' => $this->nome
        // ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:3', 'max:255'],
        ];
    }
}
