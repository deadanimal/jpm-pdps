<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Atribut: mesti diterima.',
    'active_url' => 'Atribut: bukan URL yang sah.',
    'after' => 'Atribut: mestilah tarikh selepas: tarikh.',
    'after_or_equal' => 'Atribut: mestilah tarikh selepas atau sama dengan: tarikh.',
    'alpha' => 'Atribut: hanya boleh mengandungi huruf.',
    'alpha_dash' => 'Atribut: hanya boleh mengandungi huruf, angka, tanda sempang dan garis bawah.',
    'alpha_num' => 'Atribut: hanya boleh mengandungi huruf dan angka.',
    'array' => 'Atribut: mestilah array.',
    'before' => 'Atribut: mestilah tarikh sebelum: tarikh.',
    'before_or_equal' => 'Atribut: mestilah tarikh sebelum atau sama dengan: tarikh.',
    'between' => [
        'numeric' => 'Atribut: mesti antara: min dan: maks.',
        'file' => 'Atribut: mesti antara: min dan: maksimum kilobyte.',
        'string' => 'Atribut: mestilah antara: min dan: maks aksara.',
        'array' => 'Atribut: mesti ada antara: min dan: item maks.',
    ],
    'boolean' => 'Medan atribut mesti betul atau salah.',
    'confirmed' => 'Pengesahan atribut tidak sepadan.',
    'date' => 'Atribut: bukan tarikh yang sah.',
    'date_equals' => 'Atribut: mestilah tarikh yang sama dengan: tarikh.',
    'date_format' => 'Atribut: tidak sepadan dengan format: format.',
    'different' => 'Atribut: dan: lain mesti berbeza.',
    'digits' => 'Atribut: mestilah: digit digit.',
    'digits_between' => 'Atribut: mestilah antara: min dan: digit maksimum.',
    'dimensions' => 'Atribut: mempunyai dimensi gambar yang tidak betul.',
    'distinct' => 'Medan atribut mempunyai nilai pendua.',
    'email' => 'Atribut: mestilah alamat e-mel yang sah.',
    'exists' => 'Atribut yang dipilih: tidak sah.',
    'file' => 'Atribut: mestilah fail.',
    'filled' => 'Medan atribut mesti mempunyai nilai.',
    'gt' => [
        'numeric' => 'Atribut: mesti lebih besar daripada: nilai.',
        'file' => 'Atribut: mesti lebih besar daripada: nilai kilobyte.',
        'string' => 'Atribut: mesti lebih besar daripada: aksara nilai.',
        'array' => 'Atribut: mesti mempunyai lebih daripada: item nilai.',
    ],
    'gte' => [
        'numeric' => 'Atribut: mesti lebih besar daripada atau sama: nilai.',
        'file' => 'Atribut: mesti lebih besar daripada atau sama: nilai kilobyte.',
        'string' => 'Atribut: mesti lebih besar daripada atau sama: watak nilai.',
        'array' => 'Atribut: mesti mempunyai: item nilai atau lebih.',
    ],
    'image' => 'Atribut: mestilah gambar.',
    'in' => 'Atribut yang dipilih: tidak sah.',
    'in_array' => 'Medan: atribut tidak wujud dalam: lain.',
    'integer' => 'Atribut: mestilah bilangan bulat.',
    'ip' => 'Atribut: mestilah alamat IP yang sah.',
    'ipv4' => 'Atribut: mestilah alamat IPv4 yang sah.',
    'ipv6' => 'Atribut: mestilah alamat IPv6 yang sah.',
    'json' => 'Atribut: mestilah rentetan JSON yang sah.',
    'lt' => [
        'numeric' => 'Atribut: mestilah kurang daripada: nilai.',
        'file' => 'Atribut: mestilah kurang daripada: nilai kilobyte.',
        'string' => 'Atribut: mestilah kurang daripada: nilai aksara.',
        'array' => 'Atribut: mesti mempunyai item kurang daripada: nilai.',
    ],
    'lte' => [
        'numeric' => 'Atribut: mesti kurang daripada atau sama: nilai.',
        'file' => 'Atribut: mesti kurang atau sama: nilai kilobyte.',
        'string' => 'Atribut: mestilah kurang daripada atau sama: aksara nilai.',
        'array' => 'Atribut: tidak boleh mengandungi lebih daripada: item nilai.',
    ],
    'max' => [
        'numeric' => 'Atribut: tidak boleh lebih besar daripada: maks.',
        'file' => 'Atribut: tidak boleh lebih besar daripada: kilobyte maksimum.',
        'string' => 'Atribut: tidak boleh lebih besar daripada: aksara maks.',
        'array' => 'Atribut: tidak boleh mengandungi lebih daripada: item maks.',
    ],
    'mimes' => 'Atribut: mestilah fail jenis:: nilai.',
    'mimetypes' => 'Atribut: mestilah fail jenis:: nilai.',
    'min' => [
        'numeric' => 'Atribut: mestilah sekurang-kurangnya: min.',
        'file' => 'Atribut: mestilah sekurang-kurangnya: min kilobyte.',
        'string' => 'Atribut: mestilah sekurang-kurangnya: aksara min.',
        'array' => 'Atribut: mesti mempunyai sekurang-kurangnya: item min.',
    ],
    'not_in' => 'Atribut yang dipilih: tidak sah.',
    'not_regex' => 'Format atribut tidak sah.',
    'numeric' => 'Atribut: mestilah nombor.',
    'present' => 'Medan atribut mesti ada.',
    'regex' => 'Format atribut tidak sah.',
    'required' => 'Medan atribut diperlukan.',
    'required_if' => 'Medan: atribut diperlukan apabila: lain adalah: nilai.',
    'required_unless' => 'Medan atribut diperlukan kecuali: lain dalam: nilai.',
    'required_with' => 'Medan atribut diperlukan apabila: nilai ada.',
    'required_with_all' => 'Medan: atribut diperlukan apabila: nilai ada.',
    'required_without' => 'Medan: atribut diperlukan apabila: nilai tidak ada.',
    'required_without_all' => 'Medan: atribut diperlukan apabila tiada: nilai ada.',
    'same' => 'dia: atribut dan: lain mesti sepadan.',
    'size' => [
        'numeric' => 'Atribut: mestilah: ukuran.',
        'file' => 'Atribut: mestilah: ukuran kilobyte.',
        'string' => 'Atribut: mestilah: aksara ukuran.',
        'array' => 'Atribut: mesti mengandungi: item ukuran.',
    ],
    'starts_with' => 'Atribut: mesti dimulakan dengan salah satu daripada yang berikut:: nilai',
    'string' => 'Atribut: mestilah rentetan.',
    'timezone' => 'Atribut: mestilah zon yang sah.',
    'unique' => 'Atribut: sudah diambil.',
    'uploaded' => 'Atribut: gagal dimuat naik.',
    'url' => 'Format atribut tidak sah.',
    'uuid' => 'Atribut: mestilah UUID yang sah.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
