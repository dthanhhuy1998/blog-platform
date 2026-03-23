<?php

if (!function_exists('vn_datetime')) {
    /**
     * Convert datetime sang format Việt Nam
     *
     * @param string|\Carbon\Carbon|null $date
     * @param string $format
     * @return string|null
     */
    function vn_datetime($date, $format = 'd/m/Y H:i')
    {
        if (!$date) return null;

        try {
            return \Carbon\Carbon::parse($date)
                ->timezone('Asia/Ho_Chi_Minh')
                ->format($format);
        } catch (\Exception $e) {
            return null;
        }
    }
}