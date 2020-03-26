<?php
////////////////////////////////////////////////////////
// WP Document Ver1.2  ログイン画面を変更する
////////////////////////////////////////////////////////
// Only one custom template.


// SiteGuard WP Plugin を使うと WP Super Cache とぶつかるのでここで行う
function ootpl_login_change(){}


// 変更後の管理画面ファイル
define( 'LOGIN_CHANGE_PAGE', 'admin-panel.php' );


// 指定以外のログインURLはエラーにする
if ( ! function_exists( 'login_change_init' ) ) {
    function login_change_init() {
        if ( ! defined( 'LOGIN_CHANGE' ) || sha1( 'keyword' ) != LOGIN_CHANGE ) {
            //status_header( 403 );
            wp_redirect( home_url( '/404' ) );
            exit;
        }
    }
}

// ログイン済みか新設のログインURLの場合は wp-login.php を置き換える
if ( ! function_exists( 'login_change_site_url' ) ) {
    function login_change_site_url( $url, $path, $orig_scheme, $blog_id ) {
        if ( $path == 'wp-login.php'
            && ( is_user_logged_in() || strpos( $_SERVER[ 'REQUEST_URI' ], LOGIN_CHANGE_PAGE ) !== false )
           ) {
            $url = str_replace( 'wp-login.php', LOGIN_CHANGE_PAGE, $url );
        }
        return $url;
    }
}

// ログアウト時のリダイレクト先の設定
if ( ! function_exists( 'login_change_wp_redirect' ) ) {
    function login_change_wp_redirect( $location, $status ) {
        if ( strpos( $_SERVER[ 'REQUEST_URI' ], LOGIN_CHANGE_PAGE ) !== false ) {
            $location = str_replace( 'wp-login.php', LOGIN_CHANGE_PAGE, $location );
        }
        return $location;
    }
}

// 記事のパスワード対応（ログインURLが見えてしまうが、許容範囲内で）
if ( ! function_exists( 'login_change_password_form' ) ) {
    function login_change_password_form() {
        $html = '
            <form action="' . home_url() . '/wp/admin-panel.php?action=postpass" class="post-password-form" method="post">
                <p>このコンテンツはパスワードで保護されています。閲覧するには以下にパスワードを入力してください。</p>
                <p><label for="pwbox-104">パスワード <input name="post_password" id="pwbox-104" type="password" size="20" /></label>
                <input type="submit" name="Submit" value="確定" /></p>
            </form>
        ';
        return $html;
    }
}

add_action( 'login_init',        'login_change_init' );
add_filter( 'site_url',          'login_change_site_url', 10, 4 );
add_filter( 'wp_redirect',       'login_change_wp_redirect', 10, 2 );
add_filter( 'the_password_form', 'login_change_password_form', 10, 2 );
