<?php

/*
Plugin Name: bookReader
Description: افزونه ای جهت دیدن کتاب ها
Author: Saeed_200n
Version: 1.0.0
*/

function session01()
{
    //session
    function register_session_new()
    {
        if (!session_id()) {
            session_start();
        }
    }

    add_action('init', 'register_session_new');
}

session01();

//write php into page <?php?
function php_execute($html)
{
    if (strpos($html, "<" . "?php") !== false) {
        ob_start();
        eval("?" . ">" . $html);
        $html = ob_get_contents();
        ob_end_clean();
    }
    return $html;
}
add_filter('widget_text', 'php_execute', 100);

//use ajax into wp
function my_enqueue()
{
    wp_enqueue_script('menu_script01', plugins_url('menu_script01.js', __FILE__), array('jquery'), '20211', true);
    wp_localize_script('menu_script01', 'my_ajax_object', array('ajax_url' => plugins_url('database_book/write_book.php', __FILE__)));
}
 add_action('wp_enqueue_scripts', 'my_enqueue');

function css_js_hooks()
{
    //hook style
    function bb_style()
    {
        wp_enqueue_style('style', get_theme_file_uri('style.css'), '1.0.0', false);
        wp_enqueue_style('bb_style', plugins_url('bb_style.css', __FILE__), array('style'), '1.2.0', false);
    }
    add_action('wp_enqueue_scripts', 'bb_style');

    //hook js
    function bb_script()
    {
        wp_enqueue_script('bb_script', plugins_url('bb_script.js', __FILE__), array('jquery'), '20211202', true);
    }
    add_action('wp_enqueue_scripts', 'bb_script');

    //js menu
    add_action('admin_menu', 'add_Js_admin');
    function add_Js_admin()
    {
        wp_enqueue_script('menu_script01', plugins_url('menu_script01.js', __FILE__), array('jquery'), '20211', true);
    }


}
css_js_hooks();

// gets the product data in the header
add_action('wp_head', 'get_product_data');
function get_product_data()
{
    // only on the product page
    if (!is_product()) {
        return;
    }
    // gets the product object
    $product = wc_get_product(get_the_ID());

    $_SESSION['objproduct'] = $product;


    //product id
    global $product;
    $pid = $product->get_id();
    //echo $id;
    $_SESSION['pid'] = $pid;

    function displaySession()
    {
        if (isset($_SESSION['pid'])) {
            echo $_SESSION['pid'] . '<br>';
        }

        if (isset($_SESSION['objproduct'])) {
            echo 'objproduct ok' . '<br>';
        } else {
            echo 'objproduct noting' . '<br>';
        }
        if (isset($_SESSION['user_id_bought'])) {
            echo 'user_id_bought=' . $_SESSION['user_id_bought'] . '<br>';


        } else {
            echo 'no user_id_bought' . '<br>';
        }
        if (isset($_SESSION['product_id_bought'])) {
            echo 'product_id_bought=' . $_SESSION['product_id_bought'] . '<br>';
        } else {
            echo 'no product_id_bought' . '<br>';
        }
    }
   // displaySession();



    function ckBought()
    {

        function xx()
        {

            /**
             * Add a custom product data tab
             */
            add_filter('woocommerce_product_tabs', 'woo_new_product_tab');
            function woo_new_product_tab($tabs)
            {

                // Adds the new tab
                $tabs['Preview'] = array(
                    'title' => __('پیش نمایش کتاب', 'woocommerce'),
                    'priority' => 50,
                    'callback' => 'tab_Preview'
                );

                return $tabs;

            }

            function tab_Preview()
            {
            }
          
        /*  add_action( 'woocommerce_after_shop_loop_item', 'my_customer_already_bought_product', 30 ); 
            function my_customer_already_bought_product() { 
             global $product; 
             if ( ! is_user_logged_in() ) return; 
             if ( wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) {  
               echo 'You have purchased this in the past. Buy again?'; 
             } 
            }*/
          
          //ck bought product by user
            global $product;
         	 if ( ! is_user_logged_in() ) return; 
           /* $units_sold = get_post_meta( $product->get_id(), 'total_sales', true );*/
          $units_sold =  wc_customer_bought_product( '', get_current_user_id(), $product->get_id() );
            if (is_user_logged_in() && $units_sold) {
               /* echo 'product bought';*/

                add_filter('woocommerce_product_tabs', 'woo_remove_product_tabs', 98);

                function woo_remove_product_tabs($tabs)
                {
                    unset($tabs['Preview']);
                   $tabs['fullBook'] = array(
                        'title' => __('مطالعه کتاب', 'woocommerce'),
                        'priority' => 50,
                        'callback' => 'Full_book'
                    );
                    return $tabs;
                }

                function Full_book()
                {
                }
            }
        }

        xx();


    }

    ckBought();
}

function menu01()
{
    //add menu admin into panel wordpress
    class WPDocs_EB_EbtechModules
    {
        public static function init()
        {
            add_action('admin_enqueue_scripts', array(__CLASS__, 'adminAssets'));
            add_action('admin_menu', array(__CLASS__, 'adminMenu'));
        }

        public static function adminMenu()
        {
            add_menu_page(
                __('ورود کتاب', 'custome_menu'),
                __('کتابخوان', 'custome_menu'),
                'manage_options',
                'bookReaderId',
                array(__CLASS__, 'menuPage'),
                //'dashicons-book-alt',
                plugins_url() . '/bookReader/asset/img/open-book-48.png',
                6
            );
        }

        public static function menuPage()
        {
            if (is_file(plugin_dir_path(__FILE__) . 'menu_page.php')) {
                include_once plugin_dir_path(__FILE__) . 'menu_page.php';


            } else {
                ?>
                <pre>
                <?php
                echo plugin_dir_path(__FILE__);
                ?>
            </pre>
                <?php


            }
        }

        public static function getSettings()
        {
            return get_option('name_into_addressbar_option');
        }

        public static function adminAssets()
        {
            if (isset($_GET['page']) && !empty($_GET['page']) && 'name_into_addressbar' === $_GET['page']) {

            }
        }
    }

    WPDocs_EB_EbtechModules::init();
    WPDocs_EB_EbtechModules::getSettings();
}
menu01();


function addcss_adminPanel()
{
    echo '
  <style>
  #toplevel_page_bookReaderId img{
    padding: 0!important;
    width: 2rem;
  }
  </style>
  ';
}
add_action('admin_head', 'addcss_adminPanel');



add_action('init', 'add_php_file');
function add_php_file()
{
    include 'database_book/connect.php';
}


/**
 * @snippet       Display All Products Purchased by User via Shortcode - WooCommerce
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 3.6.3
 */
  
add_shortcode( 'my_purchased_products', 'tidaweb_products_bought_by_curr_user' );

function tidaweb_products_bought_by_curr_user() {

    // GET CURR USER
    $current_user = wp_get_current_user();
    if ( 0 == $current_user->ID ) return;

    // GET USER ORDERS (COMPLETED + PROCESSING)
    $customer_orders = get_posts( array(
        'numberposts' => -1,
        'meta_key'    => '_customer_user',
        'meta_value'  => $current_user->ID,
        'post_type'   => wc_get_order_types(),
        'post_status' => array_keys( wc_get_is_paid_statuses() ),
    ) );

    // LOOP THROUGH ORDERS AND GET PRODUCT IDS
    if ( ! $customer_orders ) return;
    $product_ids = array();
    foreach ( $customer_orders as $customer_order ) {
        $order = wc_get_order( $customer_order->ID );
        $items = $order->get_items();
        foreach ( $items as $item ) {
            $product_id = $item->get_product_id();
            $product_ids[] = $product_id;
        }
    }
    $product_ids = array_unique( $product_ids );
    $product_ids_str = implode( ",", $product_ids );

    // PASS PRODUCT IDS TO PRODUCTS SHORTCODE
    return do_shortcode("[products ids='$product_ids_str']");
   
}

