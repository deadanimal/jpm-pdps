<?php

namespace App\Http\Requests;

use App\Profil;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProfilRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    
    // public function rules()
    // {
    //     return [
    //         'name' => [],
    //         'email' => ['required', 'email', Rule::unique((new User)->getTable())->ignore(auth()->id())],
    //     ];
    // }

    public function attributes()
    {
        return [
            'name' => 'name',
            'description' => 'description'
        ];
    }
}
