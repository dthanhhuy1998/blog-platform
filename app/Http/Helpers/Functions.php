<?php
    function heading($routeName) {
        return $routeName . ' &lsaquo; Trang quản trị &#8212; THWEBSHOP.COM';
    }

    function datetime_vi($date) {
        return date_format(date_create($date), 'd/m/Y H:i:s');
    }

    function date_vi($date) {
        return date_format(date_create($date), 'd/m/Y');
    }

    function date_string($date) {
        $day = date_format(date_create($date), 'd');
        $month = date_format(date_create($date), 'm');
        $year =  date_format(date_create($date), 'Y');
        return $day . ' tháng ' . $month . ', ' . $year;
    }

    function discountPercent($originalPrice, $price) {
        return 100 - ($price * 100)/$originalPrice;
    }

    function increaseCode($number = '') {
        if (empty($number)) {
            return '00001';
        }

        $number = (int)$number + 1;

        if ($number >= 10000) {
            return (string)$number;
        }
        elseif ($number >= 1000) {
            return '0' . (string)$number;
        }
        elseif ($number >= 100) {
            return '00' . (string)$number;
        }
        elseif ($number >= 10) {
            return '000' . (string)$number;
        }
        else {
            return '0000' . (string)$number;
        }
    }
?>