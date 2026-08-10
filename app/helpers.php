<?php

if (!function_exists('trans_content')) {
    /**
     * Helper for retrieving bilingual content from section arrays.
     * Checks for key_en if locale is 'en', otherwise falls back to key.
     */
    function trans_content(?array $content, string $key, mixed $default = null): mixed
    {
        if (!$content) {
            return $default;
        }

        $locale = app()->getLocale();

        if ($locale === 'en') {
            $enKey = $key . '_en';
            if (!empty($content[$enKey])) {
                return $content[$enKey];
            }
        }

        $val = data_get($content, $key);
        return (!is_null($val) && $val !== '') ? $val : $default;
    }
}
