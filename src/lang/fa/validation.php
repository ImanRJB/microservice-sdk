<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class Some of these rules have multiple versions such
    | as the size rules Feel free to tweak each of these messages here
    |
    */

    "accepted"         => ":attribute باید پذیرفته شده باشد",
    "active_url"       => "آدرس :attribute معتبر نیست",
    "after"            => ":attribute باید تاریخی بعد از :date باشد",
    "alpha"            => ":attribute باید شامل حروف الفبا باشد",
    "alpha_dash"       => ":attribute باید شامل حروف الفبا و عدد و خظ تیره(-) باشد",
    "alpha_num"        => ":attribute باید شامل حروف الفبا و عدد باشد",
    "array"            => ":attribute باید شامل آرایه باشد",
    "before"           => ":attribute باید تاریخی قبل از :date باشد",
    "between"          => array(
        "numeric" => ":attribute باید بین :min و :max باشد",
        "file"    => ":attribute باید بین :min و :max کیلوبایت باشد",
        "string"  => ":attribute باید بین :min و :max کاراکتر باشد",
        "array"   => ":attribute باید بین :min و :max آیتم باشد",
    ),
    "boolean"          => ":attribute باید ۰ یا ۱ باشد",
    "confirmed"        => ":attribute با تاییدیه مطابقت ندارد",
    "date"             => ":attribute یک تاریخ معتبر نیست",
    "date_format"      => ":attribute یک تاریخ معتبر نیست",
    "different"        => ":attribute و :other باید متفاوت باشند",
    "digits"           => ":attribute باید :digits رقم باشد",
    "digits_between"   => ":attribute باید بین :min و :max رقم باشد",
    "email"            => "فرمت :attribute معتبر نیست",
    "exists"           => ":attribute انتخاب شده، معتبر نیست",
    "image"            => ":attribute باید تصویر باشد",
    "in"               => ":attribute انتخاب شده، معتبر نیست",
    "integer"          => ":attribute باید نوع داده ای عددی (integer) باشد",
    "ip"               => ":attribute باید IP آدرس معتبر باشد",
    "max"              => array(
        "numeric" => ":attribute نباید بزرگتر از :max باشد",
        "file"    => ":attribute نباید بزرگتر از :max کیلوبایت باشد",
        "string"  => ":attribute نباید بیشتر از :max کاراکتر باشد",
        "array"   => ":attribute نباید بیشتر از :max آیتم باشد",
    ),
    "mimes"            => ":attribute باید یکی از فرمت های :values باشد",
    "min"              => array(
        "numeric" => ":attribute نباید کوچکتر از :min باشد",
        "file"    => ":attribute نباید کوچکتر از :min کیلوبایت باشد",
        "string"  => ":attribute نباید کمتر از :min کاراکتر باشد",
        "array"   => ":attribute نباید کمتر از :min آیتم باشد",
    ),
    "not_in"           => ":attribute انتخاب شده، معتبر نیست",
    "numeric"          => ":attribute باید شامل عدد باشد",
    "regex"            => ":attribute یک فرمت معتبر نیست",
    "required"         => ":attribute الزامی است",
    "required_if"      => "فیلد :attribute هنگامی که :other برابر با :value است، الزامیست",
    "required_with"    => ":attribute الزامی است زمانی که :values موجود است",
    "required_with_all"=> ":attribute الزامی است زمانی که :values موجود است",
    "required_without" => ":attribute الزامی است زمانی که :values موجود نیست",
    "required_without_all" => ":attribute الزامی است زمانی که :values موجود نیست",
    "same"             => ":attribute و :other باید مانند هم باشند",
    "size"             => array(
        "numeric" => ":attribute باید برابر با :size باشد",
        "file"    => ":attribute باید برابر با :size کیلوبایت باشد",
        "string"  => ":attribute باید برابر با :size کاراکتر باشد",
        "array"   => ":attribute باسد شامل :size آیتم باشد",
    ),
    "timezone"         => "The :attribute must be a valid zone",
    "unique"           => ":attribute قبلا انتخاب شده است",
    "url"              => "فرمت آدرس :attribute اشتباه است",
    "exists_code"      => "کد ارسالی در سیستم وجود ندارد",
    "expire_code"      => "اعتبار کد ارسالی به پایان رسیده است",
    "used"             => "این کد قبلا مورد استفاده قرار گرفته است",
    "exists_phone"     => "چنین شماره ای در سیستم ثبت نشده است",
    "recaptcha"        => "کپچا اعتبار لازم را ندارد",
    'dimensions' => 'سایز :attribute معتبر نمی باشد.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attributerule" to name the lines This makes it quick to
    | specify a specific custom language line for a given attribute rule
    |
    */

    'custom' => [],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email" This simply helps us make messages a little cleaner
    |
    */
    'attributes' => [
        "name" => "نام",
        "last_name" => "نام خانوادگی",
        "email" => "پست الکترونیکی",
        "mobile" => "شماره همراه",
        "code" => "کد ورود",
        'father_name' => 'نام پدر',
        'address' => 'آدرس',
        'national_code' => 'کد ملی',
        'label' => 'لیبل',
        'birth_at' => 'تاریخ تولد',
        'first_name_fa' => 'نام (فارسی)',
        'last_name_fa' => 'نام خانوادگی (فارسی)',
        'father_name_fa' => 'نام پدر (فارسی)',
        'first_name_en' => 'نام (انگلیسی)',
        'last_name_en' => 'نام خانوادگی (انگلیسی)',
        'father_name_en' => 'نام پدر (انگلیسی)',
        'birth_date' => 'تاریخ تولد',
        'gender' => 'جنسیت',
        'phone' => 'شماره ثابت',
        'fax' => 'فکس',
        'zip_code' => 'کد پستی',
        'national_card_image' => 'تصویر کارت ملی',
        'avatar' => 'آواتار',
        'iban' => 'شماره شبا',
        'merchant' => 'کاربر',
        'user_id' => 'شناسه کاربر',
        'company_name' => 'نام شرکت',
        'type' => 'نوع درخواست',
        'chart_type' => 'نوع  نمودار',
        'time_type' => 'نوع زمان نمودار',
        'register_date' => 'تاریخ تاسیس',
        'national_legal_code' => 'شناسه ملی',
        'national_card_photo' => 'تصویر کارت ملی',
        'kyc_photo' => 'برگه احراز هویت',
        'introduction_photo' => 'معرفی نامه شرکت',
        'otp' => 'رمز یکبار مصرف',
        'website' => 'وبسایت',
        'settlement_period' => 'دوره تسویه',
        'ip' => 'آی‌پی',
        'fee_payer' => 'نوع کسر کارمزد',
        'logo' => 'لوگو',
        'business_type' => 'نوع کسب و کار',
        'name_fa' => 'نام کسب و کار',
        'job_category_id' => 'حوزه کسب و کار',
        'com_name_fa' => 'نام شرکت',
        'tax_payer_code' => 'کد رهگیری مالیاتی',
        'uuid' => 'شناسه کسب و کار',
        'title' => 'عنوان',
        'amount' => 'مبلغ',
        'success_callback_url' => 'لینک بازگشت موفقیت آمیز',
        'failure_callback_url' => 'لینک بازگشت ناموفق',
        'callback_url' => 'لینک بازگشت',
        'terminal' => 'ترمینال',
        'department_id' => 'دپارتمان',
        'body' => 'متن',
        'customer_name' => 'نام و نام خانوادگی',
        'customer_email' => 'پست الکترونیک',
        'customer_mobile' => 'شماره همراه',
        'customer_note' => 'توضیحات',
    ]
);
