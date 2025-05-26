<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PacienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $pacienteId = $this->route('pacientes');

        return [
            'nome' => ['required'],
            'telefone' => ['required', 'min:11'],
            'email' => ['required','email', Rule::unique('pacientes')->ignore($pacienteId)->whereNull('deleted_at')],
            'endereco' => ['required'],
            'cpf' => ['required', Rule::unique('pacientes')->ignore($pacienteId)->whereNull('deleted_at')],
            'senha' => ['required','min:3'],
        ];
    }

    public function messages(): array{
        return[
            'nome.required' => 'Campo nome é obrigatório!',
            'telefone.required' => 'Campo telefone eh obrigatorio!',
            'telefone.min' => 'Minimo de 12 caracteres necessario! Desconsidere parenteses espaco e tracos!',
            'email.required' => 'Campo email é obrigatório!',
            'email.email' => 'Necessário Email válido!',
            'email.unique' => 'Email já cadastrado!',
            'endereco.required' => 'Campo endereco e obrigatorio!',
            'cpf.required' => 'Campo CPF e obrigatorio',
            'cpf.unique' => 'CPF já cadastrado!',
            'senha.required' => 'Campo senha é obrigatório!',
            'senha.min' => 'Mínimo de 3 caracteres para senha necessário!',
            
            
        ];
    }
}
