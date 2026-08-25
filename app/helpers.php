<?php

if (!function_exists('trans_content')) {
    /**
     * Helper for retrieving bilingual content from section arrays.
     * Checks for key_en if locale is 'en', otherwise falls back to key or __() translation.
     */
    function trans_content(?array $content, string $key, mixed $default = null): mixed
    {
        $locale = app()->getLocale();
        $isEnglish = ($locale === 'en' || str_starts_with($locale, 'en'));

        if (!$content) {
            return ($isEnglish && is_string($default)) ? __($default) : $default;
        }

        if ($isEnglish) {
            $enVal = data_get($content, $key . '_en');
            if (!is_null($enVal) && trim((string) $enVal) !== '') {
                return $enVal;
            }

            // If an explicit English default was provided by the view
            if (!is_null($default) && $default !== data_get($content, $key)) {
                return is_string($default) ? __($default) : $default;
            }
        }

        $val = data_get($content, $key);
        if (is_null($val) || trim((string) $val) === '') {
            $val = $default;
        }

        if ($isEnglish && is_string($val)) {
            $translated = __($val);
            if ($translated !== $val) {
                return $translated;
            }

            // Clean leading/trailing spaces or newlines for dictionary lookup
            $trimmed = trim($val);
            $translatedTrimmed = __($trimmed);
            if ($translatedTrimmed !== $trimmed) {
                return $translatedTrimmed;
            }
        }

        return $val;
    }
}

if (!function_exists('is_section_visible')) {
    /**
     * Check if a section content array or model is visible for the active locale.
     * Reads directly from content array keys 'is_visible_pt' and 'is_visible_en' (defaults to true).
     */
    function is_section_visible(mixed $section, ?string $locale = null): bool
    {
        if (is_null($section)) {
            return true;
        }

        $content = ($section instanceof \App\Models\Section) ? $section->content : (is_array($section) ? $section : []);

        $locale = $locale ?? app()->getLocale();
        $isEn = ($locale === 'en' || str_starts_with($locale, 'en'));

        if ($isEn) {
            return (bool) data_get($content, 'is_visible_en', true);
        }

        return (bool) data_get($content, 'is_visible_pt', true);
    }
}
