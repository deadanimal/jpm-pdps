<?php

namespace App\Http\Requests;

// use App\Tag;
use App\Media;
// use App\Category;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class MediaRequest extends FormRequest
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
    public function rules()
    {
        return [
            'jenis' => [
                // 'required', 'min:3', Rule::unique((new Orgdata)->getTable())->ignore($this->route()->orgdata->id ?? null)
            ],
            'program_id' => [
            ],
            'tajuk' => [
                // 'required', 'exists:'.(new Category)->getTable().',id'
            ],
            'keterangan' =>[],
            'tarikh_mula' => [
                // 'required'
            ],
            'tarikh_tamat' => [
                // 'required',
                // 'date_format:d/m/Y'
            ],
            'status' => [
                // 'required'
            ],
            'photo' => [
                // $this->route()->media ? 'nullable' :  'image'
            ],
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'photo' => 'gambar'
        ];
    }
}
