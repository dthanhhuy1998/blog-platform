<?php
use Illuminate\Support\Str;
if (! function_exists('format_currency')) {
    /**
     * Format currency with custom symbol
     *
     * @param float|int|string|null $amount
     * @param string $symbol   Ví dụ: ₫, $, €, ¥
     * @param int $decimals
     * @param string $thousandsSep
     * @param string $decimalSep
     * @param string $symbolPosition before|after
     * @return string
     */
    function format_currency(
        $amount,
        string $symbol = '₫',
        int $decimals = 0,
        string $thousandsSep = '.',
        string $decimalSep = ',',
        string $symbolPosition = 'after'
    ) {
        if ($amount === null || $amount === '') {
            return '0';
        }

        if (! is_numeric($amount)) {
            return (string) $amount;
        }

        $number = number_format(
            (float) $amount,
            $decimals,
            $decimalSep,
            $thousandsSep
        );

        return $symbolPosition === 'before'
            ? $symbol . $number
            : $number . ' ' . $symbol;
    }

    function excerpt_html(?string $html, int $limit = 120, string $end = '...'): string
    {
        if (! $html) {
            return '';
        }

        return Str::limit(
            trim(strip_tags($html)),
            $limit,
            $end
        );
    }
}
