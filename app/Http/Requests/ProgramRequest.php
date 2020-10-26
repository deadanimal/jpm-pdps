<?php

namespace App\Http\Requests;

// use App\Tag;
use App\Program;
use App\Category;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProgramRequest extends FormRequest
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
    //     CREATE TABLE `programs` (
    //     `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    //     `teras` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    //     `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    //     `kump_sasaran` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    //     `kategory_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    //     `sub_kategory` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    //     `tarikh_mula` date DEFAULT NULL,
    //     `tarikh_tamat` date DEFAULT NULL,
    //     `obj_program` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    //     `manfaat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    //     `kos` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    //     `kekerapan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    //     `status_pelaksanaan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    //     `tidak_aktif` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    //     `syarat_program` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    //     `agensi_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    //     `program_logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    //     `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    //     `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
    //     PRIMARY KEY (`id`)
    //   ) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

        return [
            'teras' => [
                // 'required', 'min:3', Rule::unique((new Orgdata)->getTable())->ignore($this->route()->orgdata->id ?? null)
            ],
            'name' => [
            ],
            'kump_sasaran' => [
                // 'required'
            ],
            'kategory_id' => [
                // 'required', 'exists:'.(new Category)->getTable().',id'
            ],
            'sub_kategory' => [
                // 'required'
            ],
            'tarikh_mula' => [
                // 'required',
                // 'date_format:d/m/Y'
            ],
            'tarikh_tamat' => [
                // 'required',
                // 'date_format:d/m/Y'
                // 'exists:'.(new Tag)->getTable().',id'
            ],
            'photo' => [
                $this->route()->program ? 'nullable' :  'image'
                // $this->route()->program ? 'nullable' : 'required', 'image'
            ],
            'obj_program' => [

            ],
            'manfaat' => [

            ],
            'kos' => [

            ],
            'kekerapan' => [

            ],
            'status_pelaksanaan' => [

            ],
            'tidak_aktif' => [

            ],
            'syarat_program' => [

            ],
            'agensi_url' => [

            ],
            'photo' => [
                // $this->route()->program ? 'nullable' : 'image'
            ]
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
            // 'teras' => 'teras',
            // 'name' => 'name',
            // 'kump_sasaran' => 'kump_sasaran',
            // 'kategory_id' => 'kategory_id',
            // 'sub_kategory' => 'sub_kategory',
            // 'tarikh_mula' => 'tarikh_mula',
            // 'tarikh_tamat' => 'tarikh_tamat',
            // 'photo' => 'photo',
            // 'obj_program' => 'obj_program',
            // 'manfaat' => 'manfaat',
            // 'kos' => 'kos',
            // 'kekerapan' => 'kekerapan',
            // 'status_pelaksanaan' => 'status_pelaksanaan',
            // 'tidak_aktif' => 'tidak_aktif',
            // 'syarat_program' => 'syarat_program',
            // 'agensi_url' => 'agensi_url',
            'photo' => 'gambar'
        ];
    }
}
