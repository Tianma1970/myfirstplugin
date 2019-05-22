<?php

//Add our settings page to the admin menu
function wrp_add_settings_page_to_menu() {
    add_submenu_page(
                    'options-general.php',             //parent page
                    'WCMS18 Related Posts Settings',    //page title
                    'Related Posts',                    //menu title
                    'manage_options',                   //minimum capability
                    'relatedposts',                     //slug for our page
                    'wrp_settings_page');               //callback to render page
                }

add_action('admin_menu', 'wrp_add_settings_page_to_menu');

//Render settings page

function wrp_settings_page() {
    ?>
    <div class="wrap">
			<h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            <form method="post" action="options.php">
            <?php 
            //output security fields for the registrered section
                settings_fields("wrp_general_options");

                //output setting sections and their fields
                do_settings_sections("relatedposts");

                //output save settings button
                submit_button();
            
            ?>
            </form>
    </div>

    <?php
}

//Register all options for pur settings page
function wrp_settings_init(){

    /**
     * Add settings Section 'General options
     */
    add_settings_section(
                        'wrp_general_options',//id (same as some above parameter) 
                        'General Options', //section title
                        'wrp_general_options_section',
                        'relatedposts' );
                        

                        /**
                         * Add settings Fields to Settings Section 'General Options
                         */
            //Default title
            add_settings_field(
                'wrp_default_title',                //id
                'Default title',                    //label
                'wrp_default_title_cb',             //callback for rendering 
                'relatedposts',                     //page to add setting to
                'wrp_general_options'               //section to add setting field to
            
            );

            register_setting('wrp_general_options', 'wrp_default_title');
            
            add_settings_field(
                'wrp_add_to_posts',                //id
                'Add related Posts to all posts',    //label
                'wrp_add_to_posts_cb',
                //add a settings field
                //'Show Metadata for all Posts',
                //'wrp_show_metadata_for_posts_cb',
                'relatedposts',                     //page to add setting to
                'wrp_general_options'               //section to add setting field to
            
            );

            register_setting('wrp_general_options', 'wrp_add_to_posts');
}


add_action('admin_init', 'wrp_settings_init');

function wrp_general_options_section() {
    ?>
    <p>Related Posts</p>

    <?php 
         var_dump([
		 		'wrp_default_title' => get_option('wrp_default_title'),
		 		'wrp_add_to_posts' => get_option('wrp_add_to_posts'),
		 	]);
    ?>

    <?php
}

function wrp_default_title_cb() {
    ?>
        <input type="text" 
                name="wrp_default_title"
                id="wrp_default_title" 
                value="<?php echo get_option('wrp_default_title', 'Related Posts'); ?>" 
                

    <?php
}
//Add related post to all posts
function wrp_add_to_posts_cb() {
    ?>
        <input type="checkbox" 
                name="wrp_add_to_posts"
                id="wrp_add_to_posts" 
                value="1" 
                <?php 
                    checked(1, get_option('wrp_add_to_posts'));
                    ?>
                    
                >

    <?php
}
//försök på att lägga till en
function wrp_show_metadata_for_posts_cb() {
    ?>
        <input 
                type="checkbox" 
                name="wrp_add_to_posts"
                id="wrp_add_to_posts" 
                value="1" 
                <?php 
                    checked(1, get_option('wrp_add_to_posts')); ?>
                    
                >

    <?php
}