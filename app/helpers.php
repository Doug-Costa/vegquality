<?php

if (!function_exists('trans_content')) {
    /**
     * Helper for retrieving bilingual content from section arrays.
     * Checks for key_en if locale is 'en', otherwise falls back to key or __() translation.
     */
    function trans_content(?array $content, string $key, mixed $default = null): mixed
    {
        if (!$content) {
            return is_string($default) ? __($default) : $default;
        }

        $locale = app()->getLocale();
        $isEnglish = ($locale === 'en' || str_starts_with($locale, 'en'));

        if ($isEnglish) {
            $enVal = data_get($content, $key . '_en');
            if (!is_null($enVal) && $enVal !== '') {
                return $enVal;
            }
        }

        $val = data_get($content, $key);
        if (is_null($val) || $val === '') {
            $val = $default;
        }

        if ($isEnglish && is_string($val)) {
            $translated = __($val);
            if ($translated !== $val) {
                return $translated;
            }
        }

        return $val;
    }
}
