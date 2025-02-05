<?php

if (!function_exists('default_image')) {
    function default_image($src, $alt = '', $class = '')
    {
        $default = base_url('src/default-content/default_image.png');

        if (!empty($src) && !filter_var($src, FILTER_VALIDATE_URL)) {
            $filePath = 'uploads/' . $src;
            if (file_exists(FCPATH . $filePath)) {
                $src = base_url($filePath);
            } else {
                $src = $default;
            }
        } elseif (empty($src)) {
            $src = $default;
        } else {
            $src = base_url($src);
        }

        return '<img src="' . esc($src) . '" alt="' . esc($alt) . '" class="' . esc($class) . '">';
    }
}
