<?php
////////////////////////////////////////////////////////
// WP Document Ver1.2  template
////////////////////////////////////////////////////////
// Only one custom template.

// 煩雑になりがちなテンプレートをここで振り分ける

// フォームのテンプレートを振り分ける
function ootpl_page_template( $default_template ) {
    $new_template = $default_template;

    $arr = array();
    $arr[] = array( 'page'=>'contact', 'dir'=>'form/contact' );
    
    // 入力,確認,完了画面でそれぞれで振り分ける
    foreach ( $arr as $row ) {
        
        $page = isset( $row[ 'page' ] ) ? $row[ 'page' ] : '';
        $dir  = isset( $row[ 'dir' ] )  ? $row[ 'dir' ] : '';
        
        if ( is_page( $page ) ) {
            $new_template = locate_template( $dir . '/form.php' );
        }
        if ( is_page( $page . '/confirm' ) ) {
            $new_template = locate_template( $dir . '/confirm.php' );
        }
        if ( is_page( $page . '/complete' ) ) {
            $new_template = locate_template( $dir . '/complete.php' );
        }
    }
    
    return $new_template;
}
add_filter( 'page_template', 'ootpl_page_template' );


// タクソノミーのテンプレートを切り替える
//function ootpl_contact_taxonomy_template( $default_template ) {
//    $new_template = $default_template;
//    
////    if ( is_tax( 'news_cat' ) ) {
////        $new_template = locate_template( 'archive-news.php' );
////    }
//
//    return $new_template;
//}
//add_filter( 'taxonomy_template', 'ootpl_contact_taxonomy_template' );