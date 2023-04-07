/*Set Logo to login page*/

function my_login_logo_one() { 
?> 
<style type="text/css"> 
body.login div#login h1 a {
background-image: url(https://yoursite.com/wp-admin/images/logo.png); 
padding-bottom: 5px; 
} 
</style>
<?php 
} add_action( 'login_enqueue_scripts', 'my_login_logo_one' );



/*Set Logo adminbar-28/28px logo*/

if( !function_exists( 'custom_admin_bar_logo' ) ) {
    function custom_admin_bar_logo()
    {
        if(!is_user_logged_in()){
            return;
        }
        echo '
        <style>
            #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
                background-image: url("https://yoursite.com/wp-admin/images/logo2828.png") !important;
                background-position: 0 0;
                color:rgba(0, 0, 0, 0);
                background-size: contain;
            }
            #wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
                background-position: 0 0;
            }
        </style>
        ';
    }
    add_action('admin_head', 'custom_admin_bar_logo'); // for the back-end
    add_action('wp_head', 'custom_admin_bar_logo'); // for the front end
}

/*remove links adminbar page*/

if( !function_exists( 'custom_admin_bar_logo_link' ) ){
    function custom_admin_bar_logo_link() {
        if( !is_user_logged_in() ){
            return;
        }
        echo "
        <script type='text/javascript'>
            (function(){
                document
                    .getElementById('wp-admin-bar-wp-logo')
                    .children[0]
                    .setAttribute('href', 'yoursite.com')
            })();
        </script>
        ";
    }
    add_action('admin_footer', 'custom_admin_bar_logo_link'); //Trigger on backend
    add_action('wp_footer', 'custom_admin_bar_logo_link'); //Trigger on front-end
}
