<?php

namespace App\Http\Requests;

use App\Models\Moduloitem;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class SubitemRequest extends FormRequest
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
        $this->merge([
            'slug' => Str::slug($this->nome),
            //'modulo_id' => Moduloitem::find($this->moduloitem_id)->modulo_id
        ]);   
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "nome" => ['required', 'min:3'],
            //"modulo_id" => ['numeric', 'required'],
            //"moduloitem_id" => ['numeric', 'required'],
            "active" => ['required', 'boolean']
        ];
    }
}
