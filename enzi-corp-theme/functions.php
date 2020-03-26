<?php
////////////////////////////////////////////////////////
// WP Document Ver1.2
////////////////////////////////////////////////////////
// Only one custom template.


// テーマ機能
function ootpl_theme_setup() {
    // アイキャッチを利用する
    add_theme_support( 'post-thumbnails' );
    // RSSフィード
    add_theme_support( 'automatic-feed-links' );
}
add_action( 'after_setup_theme', 'ootpl_theme_setup' );


// 投稿アーカイブを有効にする
function ootpl_register_post_type_args( $args, $post_type ) {
    if ( 'post' == $post_type ) {

        $name = 'お知らせ';

        $labels = array(
            'name'               => $name,
            'singular_name'      => $name,
            'add_new'            => _x( 'Add New', 'post' ),
            'add_new_item'       => __( 'Add New Post' ),
            'edit_item'          => __( 'Edit Post' ),
            'new_item'           => _x( 'Add New', 'post' ),
            'all_items'          => __( 'All Posts' ),
            'view_item'          => __( 'View Posts' ),
            'search_items'       => __( 'Search Posts' ),
            'not_found'          => __( 'No posts found.' ),
            'not_found_in_trash' => __( 'No posts found in Trash.' ),
            'parent_item_colon'  => '',
            'menu_name'          => $name
        );

        $args[ 'rewrite' ]     = true;
        $args[ 'labels' ]      = $labels;
        $args[ 'has_archive' ] = 'news';
    }
    return $args;
}
add_filter( 'register_post_type_args', 'ootpl_register_post_type_args', 10, 2 );


// qualityは100%
add_filter( 'jpeg_quality', function( $arg ){ return 100; } );


// SVGも許可する
function ootpl_upload_mimes( $mimes ) {
    $mimes[ 'svg' ] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'ootpl_upload_mimes' );


// 文末文字を変更する
function ootpl_excerpt_more( $more ) {
    return '..';
}
add_filter( 'excerpt_more', 'ootpl_excerpt_more' );


// 抜粋の文字数
function ootpl_excerpt_length( $length ) {
    return 250;	
}	
add_filter( 'excerpt_length', 'ootpl_excerpt_length', 999 );


// カテゴリの親子階層は崩さない
function ootpl_wp_terms_checklist_args( $args ) {
    $args[ 'checked_ontop' ] = false;
    return $args;
}
add_action( 'wp_terms_checklist_args', 'ootpl_wp_terms_checklist_args' );


// 投稿のNEWチェック、NEWが付く時にTRUE
if ( ! function_exists( 'ootpl_is_new_post' ) ) {
    function ootpl_is_new_post( $date ) {
        $today = new DateTime( date( 'Y-m-d' ) );
        $date  = new DateTime( $date );
        $interval = $today->diff( $date );
        if ( $interval->format( '%r%a' ) <= -7 ) { // 7日以内
            return false;
        } else {
            return true;
        }
    }
}


// プラグインが有効になっているかチェック
if ( ! function_exists( 'ootpl_is_plugin_active' ) ) {
    function ootpl_is_plugin_active( $plugin )
    {
        if ( function_exists( 'is_plugin_active' ) ) {
            return is_plugin_active($plugin);
        } else {
            return in_array(
                $plugin,
                get_option( 'active_plugins' )
            );  
        }   
    }
}


//// pre_get_posts
//function ootpl_pre_get_posts( $query ) {
//
//    // 管理画面は通さない
//    if ( is_admin() || ! $query->is_main_query() ){
//        return $query;
//    }
//    
//    return $query;
//}
//add_action( 'pre_get_posts', 'ootpl_pre_get_posts' );


///////////////////////////////////////////////////////////////////////////////////////////////
// テンプレートを新しくする場合は、下記ファイルを mu-plugins ディレクトリに移動させると機能の引き継ぎができる。
///////////////////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////// START ヘッダーカスタム ///////////////

if ( ! function_exists( 'ootpl_get_meta_ogp_tags' ) ) {
    require get_template_directory() . '/app/ootpl-meta.php';
}

////////////////////////////////////// END ヘッダーカスタム /////////////////


////////////////////////////////////// START パンくずリスト ///////////////

if ( ! function_exists( 'ootpl_create_breadcrumbs' ) ) {
    require get_template_directory() . '/app/ootpl-breadcrumbs.php';
}

////////////////////////////////////// END パンくずリスト /////////////////


////////////////////////////////////// START タクソノミー(カテゴリー)一覧 /////

if ( ! function_exists( 'ootpl_taxonomy_parents_cat_list' ) ) {
    require get_template_directory() . '/app/ootpl-cat-list.php';
}

////////////////////////////////////// END タクソノミー(カテゴリー)一覧 ///////


////////////////////////////////////// START Smart Custom Fieldsの設定 //////////

if ( ! function_exists( 'ootpl_register_fields' ) ) {
    require get_template_directory() . '/app/ootpl-scf.php';
}

////////////////////////////////////// END Smart Custom Fieldsの設定 ////////////


////////////////////////////////////// START ログイン画面を変更する //////////
// SiteGuard WP Plugin を使うと WP Super Cache とぶつかるのでテンプレートで行う

if ( ! function_exists( 'ootpl_login_change' ) ) {
    require get_template_directory() . '/app/ootpl-login.php';
}

////////////////////////////////////// END ログイン画面を変更する ////////////


////////////////////////////////////// START テンプレートの振り分け /////////

if ( ! function_exists( 'ootpl_page_template' ) ) {
    require get_template_directory() . '/app/ootpl-template.php';
}

////////////////////////////////////// END テンプレートの振り分け ///////////


////////////////////////////////////// START お問い合わせ機能 /////////

if ( ! function_exists( 'ootpl_contact_setting' ) ) {
    require get_template_directory() . '/app/ootpl-contact.php';
}

////////////////////////////////////// END お問い合わせ機能 ///////////