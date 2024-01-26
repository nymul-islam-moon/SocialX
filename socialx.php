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
        'dashicons-buddicons-replies', // Icon URL
        6 // Position
    );
}

// Display the table
function socialx_display_cards() {
    // Include Font Awesome for icons (make sure to include it only once across your plugin)
    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">';

    // Array of social media platforms with their corresponding Font Awesome icons
    $social_media_platforms = array(
        'Facebook' => 'fab fa-facebook-square',
        'Twitter' => 'fab fa-twitter-square',
        'Instagram' => 'fab fa-instagram-square',
        'LinkedIn' => 'fab fa-linkedin',
        'Pinterest' => 'fab fa-pinterest-square',
        'YouTube' => 'fab fa-youtube-square',
        'TikTok' => 'fab fa-tiktok',
        'Snapchat' => 'fab fa-snapchat-square',
        'Reddit' => 'fab fa-reddit-square',
        'WhatsApp' => 'fab fa-whatsapp-square'
    );
    ?>
    <div class="wrap">
        <h1>SocialX Social Media Platforms</h1>
        <div class="socialx-card-container">
            <?php foreach ($social_media_platforms as $platform => $icon): ?>
                <div class="socialx-card <?php echo strtolower($platform); ?>">
                    <i class="<?php echo esc_attr($icon); ?>"></i>
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
            justify-content: start;
            align-items: stretch;
        }
        .socialx-card {
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            padding: 20px;
            width: 250px; /* Increased width */
            height: 150px; /* Added height */
            text-align: center;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            transition: transform 0.2s, box-shadow 0.2s;
            color: #fff; /* White text color */
            cursor: pointer;
            background: rgba(255, 255, 255, 0.1); /* Semi-transparent background */
            backdrop-filter: blur(10px); /* Blur effect for the background */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .socialx-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.2);
        }
        .socialx-card i {
            font-size: 50px; /* Increased icon size */
            margin-bottom: 10px;
        }


        /* Keyframes for the spin animation */
        @keyframes spin {
            from { transform: rotateY(0deg); }
            to { transform: rotateY(360deg); }
        }

        /* Keyframes for the shine effect */
        @keyframes shine {
            from { background-position: -200px; }
            to { background-position: 200px; }
        }

        .socialx-card {
            /* ... (existing styles) */
            position: relative; /* Added for the ::before pseudo-element positioning */
            overflow: hidden; /* Ensure the shine effect is contained within the card borders */
        }

        .socialx-card::before {
            content: '';
            position: absolute;
            top: 0; left: -50%;
            width: 200%; height: 100%;
            background: linear-gradient(45deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0) 50%);
            transform: skewX(-15deg);
            transition: 0.5s;
            background-size: 200px 100%;
        }

        .socialx-card:hover {
            box-shadow: 0 6px 12px rgba(0,0,0,0.3);
            animation: spin 1s ease-in-out; /* Spin animation */
        }

        .socialx-card:hover::before {
            left: 120%;
            transition-delay: 0.5s;
            animation: shine 0.5s; /* Shine effect */
        }

        /* Specific styles for each social media platform with more realistic brand colors */
        .facebook { background: rgba(24, 119, 242, 0.8); } /* Facebook Blue */
        .twitter { background: rgba(29, 161, 242, 0.8); } /* Twitter Blue */
        .instagram { background: linear-gradient(45deg, rgba(405, 112, 187, 0.8), rgba(228, 64, 95, 0.8), rgba(252, 175, 69, 0.8)); } /* Instagram Gradient */
        .linkedin { background: rgba(10, 102, 194, 0.8); } /* LinkedIn Blue */
        .pinterest { background: rgba(189, 8, 28, 0.8); } /* Pinterest Red */
        .youtube { background: rgba(255, 0, 0, 0.8); } /* YouTube Red */
        .tiktok { background: rgba(0, 0, 0, 0.8); } /* TikTok Black */
        .snapchat { background: rgba(255, 252, 0, 0.8); } /* Snapchat Yellow */
        .reddit { background: rgba(255, 69, 0, 0.8); } /* Reddit Orange */
        .whatsapp { background: rgba(37, 211, 102, 0.8); } /* WhatsApp Green */

    </style>

    <?php
}