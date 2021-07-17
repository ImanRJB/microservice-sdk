<?php
if ( ! function_exists('convertToEn') ) {
    function convertToEn($value)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١', '٠'];
        $num = range(0, 9);
        $convertedPersianNums = str_replace($persian, $num, $value);
        $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);
        return $englishNumbersOnly;
    }
}

if ( ! function_exists('ibanValidation') ) {
    function ibanValidation($iban)
    {
        if (substr($iban, 0, 2) != 'IR' and !is_int(substr($iban, 2))) {
            return false;
        }
        return bcmod(substr($iban, 4) . '1827' . substr($iban, 2, 2), '97') == 1 ? true : false;
    }
}

if ( ! function_exists('getIbanBank') ) {
    function getIbanBank($iban)
    {
        $code = substr($iban, 4, 3);
        switch ($code) {
            case '055':
                return ['name' => 'Eghtesad Novin', 'label' => 'بانک اقتصاد نوین', 'logo' => 'en'];
            case '054':
                return ['name' => 'Parsian', 'label' => 'بانک پارسیان', 'logo' => 'parsian'];
            case '057':
                return ['name' => 'Pasargad', 'label' => 'بانک پاسارگاد', 'logo' => 'bpi'];
            case '021':
                return ['name' => 'Iran Post Bank', 'label' => 'پست بانک ایران', 'logo' => 'post'];
            case '018':
                return ['name' => 'Tejarat', 'label' => 'بانک تجارت', 'logo' => 'tejarat'];
            case '051':
                return ['name' => 'Moasese Etebari Tose-e', 'label' => 'موسسه اعتباری توسعه', 'logo' => 'tt'];
            case '020':
                return ['name' => 'Tose-e Saderat', 'label' => 'بانک توسعه تجارت', 'logo' => 'tt'];
            case '013':
                return ['name' => 'Refah', 'label' => 'بانک رفاه', 'logo' => 'rb'];
            case '056':
                return ['name' => 'Saman', 'label' => 'بانک سامان', 'logo' => 'sb'];
            case '015':
                return ['name' => 'Sepah', 'label' => 'بانک سپه', 'logo' => 'sepah'];
            case '058':
                return ['name' => 'Sarmayeh', 'label' => 'بانک سرمایه', 'logo' => 'sarmayeh'];
            case '019':
                return ['name' => 'Saderat Iran', 'label' => 'بانک صادرات ایران', 'logo' => 'bsi'];
            case '011':
                return ['name' => 'Sanat Madan', 'label' => 'بانک صنعت و معدن', 'logo' => 'bim'];
            case '053':
                return ['name' => 'Kar Afarin', 'label' => 'بانک کارآفرین', 'logo' => 'kar'];
            case '016':
                return ['name' => 'Keshavarzi', 'label' => 'بانک کشاورزی', 'logo' => 'bki'];
            case '010':
                return ['name' => 'Central Bank', 'label' => 'بانک مرکزی', 'logo' => null];
            case '014':
                return ['name' => 'Maskan', 'label' => 'بانک مسکن', 'logo' => 'maskan'];
            case '012':
                return ['name' => 'Mellat', 'label' => 'بانک ملت', 'logo' => 'mellat'];
            case '017':
                return ['name' => 'Melli Iran', 'label' => 'بانک ملی ایران', 'logo' => 'bmi'];
            default:
                return ['name' => 'Unknown', 'label' => 'ناشناس', 'logo' => null];
        }
    }
}


if ( ! function_exists('randomString') ) {
    function randomString($length = 10, $strtoupper = true)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        if ($strtoupper) {
            return strtoupper($randomString);
        }
        return $randomString;
    }
}

if ( ! function_exists('is_json') ) {
    function is_json($string)
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
}


if ( ! function_exists('getBankٔ') ) {
    function getBankٔ($card_no)
    {
        $code = substr($card_no, 0, 6);
        switch ($code) {
            case '603799':
                return ['label' => 'بانک ملی ایران', 'logo' => 'bmi'];
            case '589210':
                return ['label' => 'بانک سپه', 'logo' => 'sepah'];
            case '627648':
                return ['label' => 'بانک توسعه صادرات', 'logo' => 'edbi'];
            case '627961':
                return ['label' => 'بانک صنعت و معدن', 'logo' => 'bim'];
            case '603770':
                return ['label' => 'بانک کشاورزی', 'logo' => 'bki'];
            case '628023':
                return ['label' => 'بانک مسکن', 'logo' => 'maskan'];
            case '627760':
                return ['label' => 'پست بانک ایران', 'logo' => 'post'];
            case '502908':
                return ['label' => 'بانک توسعه تعاون', 'logo' => 'tt'];
            case '627412':
                return ['label' => 'بانک اقتصاد نوین', 'logo' => 'en'];
            case '622106':
                return ['label' => 'بانک پارسیان', 'logo' => 'parsian'];
            case '502229':
                return ['label' => 'بانک پاسارگاد', 'logo' => 'bpi'];
            case '627488':
                return ['label' => 'بانک کارآفرین', 'logo' => 'kar'];
            case '621986':
                return ['label' => 'بانک سامان', 'logo' => 'sb'];
            case '639346':
                return ['label' => 'بانک سینا', 'logo' => 'sina'];
            case '639607':
                return ['label' => 'بانک سرمایه', 'logo' => 'sarmayeh'];
            case '636214':
                return ['label' => 'بانک آینده', 'logo' => 'ba'];
            case '502806':
                return ['label' => 'بانک شهر', 'logo' => 'shahr'];
            case '502938':
                return ['label' => 'بانک دی', 'logo' => 'day'];
            case '603769':
                return ['label' => 'بانک صادرات', 'logo' => 'bsi'];
            case '610433':
                return ['label' => 'بانک ملت', 'logo' => 'mellat'];
            case '627353':
                return ['label' => 'بانک تجارت', 'logo' => 'tejarat'];
            case '589463':
                return ['label' => 'بانک رفاه', 'logo' => 'rb'];
            case '627381':
                return ['label' => 'بانک انصار', 'logo' => 'ansar'];
            case '639370':
                return ['label' => 'بانک مهر اقتصاد', 'logo' => 'sepah'];
            default:
                return ['label' => 'ناشناس', 'logo' => null];
        }
    }
}