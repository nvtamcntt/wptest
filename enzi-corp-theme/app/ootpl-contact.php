<?php
////////////////////////////////////////////////////////
// WP Document Ver1.2  お問い合わせフォーム( Ver1.2 )
////////////////////////////////////////////////////////
// Only one custom template.


// セッションをONにする
function ootpl_init_sessions() {
    if ( ! session_id() ) {
        session_start();
    }
}
add_action( 'init', 'ootpl_init_sessions' );


// カスタム投稿を追加
function ootpl_contact_create_menu() {

    ///////////////////////////////////////////
    // カスタム投稿 / タクソノミー
    $name = 'お問合せ';

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

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        //'rewrite'            => array( 'with_front' => false )
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 30,
        'menu_icon'          => 'dashicons-email',
        'supports'           => array( 'title' )
    );

    register_post_type( 'ootpl_my_contact', $args );

    ///////////////////////////////////////////

}
add_action( 'init', 'ootpl_contact_create_menu' );


// 表側
function ootpl_contact_setting( $formID=null ) {
    if ( ! $formID ) return false;
    
    // パラメータ
    $args = array(
        'post_type'      => 'ootpl_my_contact',
        'post_status'    => 'private,publish',
        'posts_per_page' => 1,
        'paged'          => 1,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'meta_query'     => array(
            array(
                'key'     => 'ootpl_my_contact_id',
                'value'   => $formID,
            )
        )
    );
    // SQL
    $query = new WP_Query( $args );

    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
           
            $con = $query->the_post();

            $val_name           = get_post_meta( get_the_ID(), 'ootpl_my_contact_name',         true );
            $val_mail           = get_post_meta( get_the_ID(), 'ootpl_my_contact_mail',         true );
            $val_bcc_mail       = get_post_meta( get_the_ID(), 'ootpl_my_contact_bcc_mail',     true );
            $val_admin_title    = get_post_meta( get_the_ID(), 'ootpl_my_contact_admin_title',  true );
            $val_admin_body     = get_post_meta( get_the_ID(), 'ootpl_my_contact_admin_body',   true );
            $val_reply_title    = get_post_meta( get_the_ID(), 'ootpl_my_contact_reply_title',  true );
            $val_reply_body     = get_post_meta( get_the_ID(), 'ootpl_my_contact_reply_body',   true );
            $val_input          = get_post_meta( get_the_ID(), 'ootpl_my_contact_input',        true );
            
        }
    }
    // SQL クリア
    wp_reset_postdata();
    
    // フォームの値を取得する
    $str = str_replace( array ( "\r\n", "\r", "\n" ), "\n", $val_input ); // 改行コードを統一
    // 改行を変換
    $_post_str = str_replace( "\n", '::', $str );

    // BCC 有無
    if ( ( isset( $val_bcc_mail ) && $val_bcc_mail != '' ) ) {
        $val_bcc_flag = true;
    } else {
        $val_bcc_mail = false;
        $val_bcc_flag = false;
    }

    $val_name_default = 'ENZI';
    $val_mail_default = 'info@enzi.co.jp';
    $val_admin_title_default = 'ホームページよりお問い合わせがありました';
    $val_admin_body_default = 'お客様よりお問い合わせをいただきました。
ご対応をよろしくお願いいたします。
    
-----------------------------
[お問い合わせ件名] [fm_select1]
[会社名] [fm_company]
[お名前] [fm_name]
[ふりがな] [fm_kana]
[電話番号] [fm_tel]
[メールアドレス] [fm_mail] 
[住所] 〒[postcode1]-[postcode2] [address2][address3]
[お問い合わせ内容] [fm_comment]
-----------------------------';
    $val_reply_title_default = 'ホームページよりお問い合わせがありました';
    $val_reply_body_default = 'このたびは株式会社エンジへ
お問い合わせいただき、誠にありがとうございます。
お問い合わせ内容につきましては、
早急に担当者よりご連絡を差し上げます。
また、ご返信に時間がかかる場合がございますのでご了承ください。
誠に恐縮ではございますが、
今しばらくお待ち下さいますよう、お願い申し上げます。';
    // 差出人名称
    define( 'FM_MAIL_ADMIN_NAME', (isset( $val_name ) && $val_name != '' ) ? $val_name : $val_name_default);
    // 差出人メールアドレス
    define( 'FM_MAIL_ADMIN_MAIL', (isset( $val_mail ) && $val_mail != '' ) ? $val_mail : $val_mail_default);
    // システムエラー用メールアドレス
    define( 'FM_MAIL_ERR_MAIL', (isset( $val_mail ) && $val_mail != '' ) ? $val_mail : $val_mail_default);
    // 管理者へメール CC
    define( 'FM_MAIL_ADMIN_MAIL_BCC', $val_bcc_mail);
    // 管理者へメール CCフラグ
    define( 'FM_MAIL_ADMIN_MAIL_BCC_FLG', $val_bcc_flag );
    // 管理者へメール題名
    define( 'FM_MAIL_ADMIN_TITLE', (isset( $val_admin_title ) && $val_admin_title != '' ) ? $val_admin_title : $val_admin_title_default);
    // 管理者へメール内容
    define( 'FM_MAIL_ADMIN_BODY', (isset( $val_admin_body ) && $val_admin_body != '' ) ? $val_admin_body : $val_admin_body_default);
    // 自動返信メール題名
    define( 'FM_MAIL_USER_TITLE',  (isset( $val_reply_title ) && $val_reply_title != '' ) ? $val_reply_title : $val_reply_title_default);
    // 自動返信メール内容
    define( 'FM_MAIL_USER_BODY',   (isset( $val_reply_body ) && $val_reply_body != '' ) ? $val_reply_body : $val_reply_body_default);
    // フォームの値
    define( 'FM_MAIL_POST_STR',    $_post_str );

    // メールクラス
    require_once( get_template_directory() . '/app/mail/mail.class.php' );
}
