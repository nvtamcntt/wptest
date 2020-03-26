<?php
////////////////////////////////////////////////////////
// WP Document Ver1.2  Smart_Custom_Fields 1.0
////////////////////////////////////////////////////////
// Only one custom template.


// Smart Custom Fieldsの設定はCSVでもインポートできないのでここで指定する

// オプションページを追加する
//function ootpl_scf_add_menu_page() {
//    if ( class_exists( 'Smart_Custom_Fields' ) ) {
//        
//    }
//}
//add_action( 'init', 'ootpl_scf_add_menu_page' );


// カスタムフィールド設定
function ootpl_register_fields( $settings, $type, $id, $meta_type )
{
    // 1:お問い合わせ
    if ( 'ootpl_my_contact' == $type ) {
        $tmp = SCF::add_setting( 'id-1', 'お問い合わせ' );

        $arr = array();
        $arr[] = array(
            'label'     => 'フォームID',
            'name'      => 'ootpl_my_contact_id',
            'type'      => 'text',
        );

        $arr[] = array(
            'label'     => '差出人名称（管理者）',
            'name'      => 'ootpl_my_contact_name',
            'type'      => 'text',
        );

        $arr[] = array(
            'label'     => '差出人メールアドレス（管理者）',
            'name'      => 'ootpl_my_contact_mail',
            'type'      => 'text',
        );

        $arr[] = array(
            'label'     => 'BCCメールアドレス（管理者）',
            'name'      => 'ootpl_my_contact_mail_bcc',
            'type'      => 'text',
        );

        $arr[] = array(
            'label'     => '管理者へのメール題名',
            'name'      => 'ootpl_my_contact_admin_title',
            'type'      => 'text',
        );

        $arr[] = array(
            'label'     => '管理者へのメール内容',
            'name'      => 'ootpl_my_contact_admin_body',
            'type'      => 'textarea',
            'rows'      => '15',
        );

        $arr[] = array(
            'label'     => '自動返信メール題名',
            'name'      => 'ootpl_my_contact_reply_title',
            'type'      => 'text',
        );


        $arr[] = array(
            'label'     => '自動返信メール内容',
            'name'      => 'ootpl_my_contact_reply_body',
            'type'      => 'textarea',
            'rows'      => '15',
        );

        $arr[] = array(
            'label'     => '値を取得する各パーツ名',
            'name'      => 'ootpl_my_contact_input',
            'type'      => 'textarea',
            'rows'      => '15',
        );

        $tmp->add_group( 'ootpl_my_contact_loop', false, $arr );
        $settings[] = $tmp;
    }
    
    return $settings;
}
add_filter( 'smart-cf-register-fields', 'ootpl_register_fields', 10, 4 );
