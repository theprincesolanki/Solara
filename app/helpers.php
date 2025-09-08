<?php

if (!function_exists('frontend_asset')) {
    /**
     * Generate URL for frontend assets using APP_URL + /frontend/assets/
     *
     * @param string $path
     * @return string
     */
    function frontend_asset($path) {
        return rtrim(env('APP_URL'), '/') . '/frontend/assets/' . ltrim($path, '/');
    }
}

if (!function_exists('backend_asset')) {
    /**
     * Generate URL for backend assets using APP_URL + /backend/assets/
     *
     * @param string $path
     * @return string
     */
    function backend_asset($path) {
        return rtrim(env('APP_URL'), '/') . '/backend/assets/' . ltrim($path, '/');
    }
}
