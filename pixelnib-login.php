<?php
/*
Plugin Name: PixelNib Login
Description: Helping Businesses Evolve.
Author: The Professor
Version: 1.0
Author URI: http://pixelnib.com
*/


// Enqueue Scripts and Styles
define('PIXELNIB_MU_PLUGIN_URL', content_url('/mu-plugins'));
function pixelnib_login_stylesheet() {
    wp_enqueue_style ( 'pixelnib-login', PIXELNIB_MU_PLUGIN_URL. '/css/style.css' );
    wp_enqueue_script ( 'pixelnib-login',PIXELNIB_MU_PLUGIN_URL. '/js/script.js', array('jquery') );
}

add_action( 'login_enqueue_scripts', 'pixelnib_login_stylesheet');

// Change the LOGO
function pixelnib_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url('https://pixelnib.com/wp-content/uploads/2020/06/pnlogo190.jpg');
        }
    </style>
<?php }

add_action('login_enqueue_scripts', 'pixelnib_logo');

// Chanage Logo title
function pixelnib_login_logo_title() {
    return 'PixelNib';
}

add_action ('login_headertext', 'pixelnib_login_logo_title');

// Change login URL
function pixelnib_login_log_url() {
    return 'www.pixelnib.com';
}

add_action('login_headerurl', 'pixelnib_login_log_url');

// Change username label
function pixelnib_username ( $modifying ) {
    return str_ireplace ('Username or Email Address', 'Username', $modifying);
}

add_action ('gettext', 'pixelnib_username');

// Add Message
function pixelnib_login_message ($head_message) {
    $head_message = "<div class='header-text'><h4>Welcome to your website!</h4><p>Use your crdentials to access the website</p></div>";
    return $head_message;
}

add_action('login_message', 'pixelnib_login_message');
