<?php
if (!function_exists('awe_fs')) {
    function awe_fs() {
        global $awe_fs;
        if (!isset($awe_fs)) {
            require_once dirname(__FILE__, 2) . '/freemius/start.php';
            $awe_fs = fs_dynamic_init([
                'id' => '17015',
                'slug' => 'awesome-widgets-elementor',
                'type' => 'plugin',
                'public_key' => 'pk_23e89894238073bcb61ffa59279c6',
                'is_premium' => false,
                'has_addons' => false,
                'has_paid_plans' => false,
                'menu' => [
                    'slug' => 'awesome-widgets-elementor',
                    'account' => false,
                    'support' => false,
                ],
            ]);
        }
        return $awe_fs;
    }

    // Init Freemius
    awe_fs();
    do_action('awe_fs_loaded');
}
