<?php

namespace App\Http\Requests;

// use App\Tag;
use App\Media;
use App\KumpulanSasar;
// use App\Category;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PortalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return auth()->check();
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_age' => [
                // 'required'
            ],
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    
    // public function attributes()
    // {
    //     return [
    //         'user_age' => 'gambar'
    //     ];
    // }
}
