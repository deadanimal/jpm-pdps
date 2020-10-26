<?php

namespace App\Http\Requests;

// use App\Tag;
use App\Orgdata;
// use App\Category;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class OrgdataRequest extends FormRequest
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
            'name' => [
                // 'required', 'min:3', Rule::unique((new Orgdata)->getTable())->ignore($this->route()->orgdata->id ?? null)
            ],
            'program_id' => [
            //     'required', 'exists:'.(new Category)->getTable().',id'
            ],
            'agensi_id' => [
            ],
            // 'excerpt' => [
            //     'required'
            // ],
            // 'photo' => [
            //     $this->route()->orgdata ? 'nullable' : 'required', 'image'
            // ],
            // 'tags' => [
            //     'required'
            // ],
            // 'tags.*' => [
            //     'exists:'.(new Tag)->getTable().',id'
            // ],
            // 'status' => [
            //     'required',
            //     'in:published,draft,archive'
            // ],
            // 'date' => [
            //     'required',
            //     'date_format:d-m-Y'
            // ]
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
            'name' => 'name',
        ];
    }
}
