<?php

/**
 * SocialX
 *
 * @package           SocialX
 * @author            Nymul Islam
 * @copyright         2024 Nymul Islam
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       SocialX
 * Plugin URI:        https://example.com/plugin-name
 * Description:       Description of the plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            Nymul Islam
 * Author URI:        https://nymul-islam-moon.github.io/
 * Text Domain:       socialx
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://example.com/my-plugin/
 */

/*
{SocialX} is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

{SocialX} is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with {SocialX}. If not, see {URI to Plugin License}.
*/


defined('ABSPATH') or die('Hay, You can not access the area');

// Add the admin menu
add_action('admin_menu', 'socialx_add_admin_menu');

function socialx_add_admin_menu() {
    add_menu_page(
        'SocialX', // Page title
        'SocialX', // Menu title
        'manage_options', // Capability
        'socialx', // Menu slug
        'socialx_display_cards', // Function to execute
        'dashicons-share', // Icon URL
        6 // Position
    );
}

// Display the table
function socialx_display_cards() {

    // Array of social media platforms
    $social_media_platforms = array(
        'Facebook',
        'Twitter',
        'Instagram',
        'LinkedIn',
        'Pinterest',
        'YouTube'
    );
    ?>
    <div class="wrap">
        <h1>SocialX Social Media Platforms</h1>
        <div class="socialx-card-container">
            <?php foreach ($social_media_platforms as $platform): ?>
                <div class="socialx-card">
                    <h2><?php echo esc_html($platform); ?></h2>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <style>
        .socialx-card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .socialx-card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 16px;
            width: 200px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }
        .socialx-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.2);
        }
    </style>
    <?php
}