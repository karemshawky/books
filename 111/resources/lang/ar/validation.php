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

    'accepted'        => ':attribute غير مقبولة',
    'active_url'      => ':attribute رابط غير صحيح',
    'after'           => ':attribute يجب أن يكون بعد :date.',
    'after_or_equal'  => ':attribute يجب أن يكون بعد أو فى :date.',
    'alpha'           => ':attribute يجب أن يحتوى على حروف',
    'alpha_dash'      => ':attribute يجب أن يحتوى على حروف, أرقام, dass or underscore.',
    'alpha_num'       => ':attribute يجب أن يحتوى على حروف أو أرقام.',
    'array'           => ':attribute يجب أن يكون مجموعة',
    'before'          => ':attribute يجب أن يكون قبل :date.',
    'before_or_equal' => ':attribute يجب أن يكون قبل أو فى :date.',
    'between' => [
        'numeric' => ':attribute يجب أن يكون بين :min و :max.',
        'file'    => ':attribute يجب أن يكون بين :min و :max كيلو بت.',
        'string'  => ':attribute يجب أن يكون بين :min و :max حروف.',
        'array'   => ':attribute يجب أن يكون بين :min و :max عدد.',
    ],
    'boolean'        => ':attribute يجب أن يكون منطقى',
    'confirmed'      => 'لم يتم تأكيد :attribute',
    'date'           => ':attribute ليس تاريخ صحيح',
    'date_format'    => ':attribute يجب أن يكون تنسيقه :format.',
    'different'      => ':attribute و :other يجب أن يكونوا مختلفين',
    'digits'         => ':attribute يجب أن يتكون من :digits عدد',
    'digits_between' => ':attribute يجب أن يكون بين :min و :max عدد',
    'dimensions'     => ':attribute لديه أبعاد غير صحيحة',
    'distinct'       => ':attribute يجب أن يكون فريد',
    'email'          => ':attribute حساب إلكترونى غير صحيح',
    'exists'         => ':attribute إختياره خطأ',
    'file'           => ':attribute يجب أن يكون ملف',
    'filled'         => ':attribute يجب أن يكون لديه قيمة',
    'gt' => [
        'numeric' => ':attribute يجب أن يكون أكبر من :value.',
        'file'    => ':attribute يجب أن يكون أكبر من :value كيلو بت.',
        'string'  => ':attribute يجب أن يكون أكبر من :value حروف.',
        'array'   => ':attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => ':attribute يجب أن يكون أكبر من أو يساوى :value.',
        'file'    => ':attribute يجب أن يكون أكبر من أو يساوى :value كيلو بت.',
        'string'  => ':attribute يجب أن يكون أكبر من أو يساوى :value حروف.',
        'array'   => ':attribute must have :value items or more.',
    ],
    'image'    => ':attribute يجب أن يكون صورة',
    'in'       => 'selected :attribute is invalid.',
    'in_array' => ':attribute field does not exist in :other.',
    'integer'  => ':attribute يجب أن يكون رقم صحيح',
    'ip'       => ':attribute must be a valid IP address.',
    'ipv4'     => ':attribute must be a valid IPv4 address.',
    'ipv6'     => ':attribute must be a valid IPv6 address.',
    'json'     => ':attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => ':attribute يجب أن تكون أقل من :value.',
        'file'    => ':attribute يجب أن تكون أقل من :value كيلو بت.',
        'string'  => ':attribute يجب أن تكون أقل من :value حروف.',
        'array'   => ':attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => ':attribute يجب أن تكون أقل من or equal :value.',
        'file'    => ':attribute يجب أن تكون أقل من or equal :value كيلو بت.',
        'string'  => ':attribute يجب أن تكون أقل من or equal :value حروف.',
        'array'   => ':attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => ':attribute يجب أن تكون أقل من :max.',
        'file'    => ':attribute يجب أن تكون أقل من :max كيلو بت.',
        'string'  => ':attribute يجب أن تكون أقل من :max حروف.',
        'array'   => ':attribute may not have more than :max items.',
    ],
    'mimes'     => ':attribute يجب أن يكون من صيغة type: :values.',
    'mimetypes' => ':attribute يجب أن يكون من صيغة type: :values.',
    'min' => [
        'numeric' => ':attribute يجب أن تكون أكثر من :min.',
        'file'    => ':attribute يجب أن تكون أكثر من :min كيلو بت.',
        'string'  => ':attribute يجب أن تكون أكثر من :min حروف.',
        'array'   => ':attribute must have at least :min items.',
    ],
    'not_in'               => 'selected :attribute is invalid.',
    'not_regex'            => ':attribute format is invalid.',
    'numeric'              => ':attribute must be a number.',
    'present'              => ':attribute field must be present.',
    'regex'                => ':attribute format is invalid.',
    'required'             => ':attribute يجب أن لا يكون خالى.',
    'required_if'          => ':attribute يجب أن لا يكون خالى when :other is :value.',
    'required_unless'      => ':attribute يجب أن لا يكون خالى unless :other is in :values.',
    'required_with'        => ':attribute يجب أن لا يكون خالى when :values is present.',
    'required_with_all'    => ':attribute يجب أن لا يكون خالى when :values is present.',
    'required_without'     => ':attribute يجب أن لا يكون خالى when :values is not present.',
    'required_without_all' => ':attribute يجب أن لا يكون خالى when none of :values are present.',
    'same' => ':attribute و :other يجب أن يكونوا متماثلين',
    'size' => [
        'numeric' => ':attribute must be :size.',
        'file'    => ':attribute must be :size كيلو بت.',
        'string'  => ':attribute must be :size حروف.',
        'array'   => ':attribute must contain :size items.',
    ],
    'string'   => ':attribute must be a string.',
    'timezone' => ':attribute must be a valid zone.',
    'unique'   => ':attribute لا يجب أن يكون مكرر',
    'uploaded' => ':attribute failed to upload.',
    'url'      => 'الرابط :attribute غير صحيح',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
     */

    'attributes' => [],

];
