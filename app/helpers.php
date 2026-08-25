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
     * Check if a section model or section object/array is visible for the active locale.
     */
    function is_section_visible(mixed $section, ?string $locale = null): bool
    {
        if (is_null($section)) {
            return true; // Default visible if section model is null
        }

        if ($section instanceof \App\Models\Section) {
            return $section->isVisible($locale);
        }

        if (is_object($section) && method_exists($section, 'isVisible')) {
            return $section->isVisible($locale);
        }

        if (is_array($section) || is_object($section)) {
            $locale = $locale ?? app()->getLocale();
            $isEn = ($locale === 'en' || str_starts_with($locale, 'en'));
            $key = $isEn ? 'is_visible_en' : 'is_visible_pt';
            $val = data_get($section, $key, true);
            return (bool) $val;
        }

        return true;
    }
}
