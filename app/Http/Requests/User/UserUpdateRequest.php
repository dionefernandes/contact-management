<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
		{
			$userId = $this->segment(3);

			$rules = [
				'nome'			=> 'required|string|min:5',
				'contato'		=> 'required|numeric|digits:9',
				'email'     => ['required', 'email', Rule::unique('users')->ignore($userId)],
			];

			if ($this->filled('password')) {
					$rules['password'] = 'string|min:6|max:16|confirmed';
			}

			return $rules;
		}

		public function messages()
		{
			return [
				'required'		    => 'Este campo é obrigatório',
				'string'		    	=> 'Este campo precisa ser um texto',
				'nome.min'				=> 'Este campo deve ter ao menos 5 caracteres,',
				'email.unique'	  => 'Este e-mail já está cadastrado',
				'password.min'	  => 'A senha precisa ter ao menos 6 caracteres',
				'password.max'	  => 'A senha precisa ter no máximo 16 caracteres',
				'confirmed'		    => 'A confirmação do campo de senha não corresponde.',
				'contato.numeric'	=> 'O contato precisa ser um número',
				'contato.digits'	=> 'O contato precisa ter exatamente 9 dígitos',
			];
		}
}
