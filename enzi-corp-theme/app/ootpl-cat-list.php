<?php
////////////////////////////////////////////////////////
// WP Document Ver1.3  タクソノミー（カテゴリ）一覧を取得する
////////////////////////////////////////////////////////
// Only one custom template.

// プラグイン「Category Order and Taxonomy Terms Order」が hide_empty=0 だと正しく動かないので、ここで弄る


// タクソノミー（カテゴリ）を親子階層を維持したまま取得する
function ootpl_taxonomy_parents_cat_list( $parent_ID=0, $taxonomy='category', $object_id=0 ) {

    $parent_ID = (int) $parent_ID;
    $object_id = (int) $object_id;
    
    $arr = array();
    
    // Category Order and Taxonomy Terms Orderが有効であればDBから直接引き抜く
    if ( ootpl_is_plugin_active( 'taxonomy-terms-order/taxonomy-terms-order.php' ) )
    {
        global $wpdb;
        // クエリ実行
        ootpl_taxonomy_parents_data_get( $arr, $parent_ID, $child_ID=0, $taxonomy, $object_id );
    }
    // 無効であればget_termsで素直に取得する
    else {
        if ( $object_id > 0 ) {
            $args  = array( 'orderby'=>'name', 'order'=>'ASC' );
            $terms = wp_get_object_terms( $object_id, $taxonomy, $args );
            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                $arr = $terms;
            }
            
        } else {
            $args  = array( 'orderby'=>'name', 'order'=>'ASC', 'hide_empty'=>0 );
            $terms = get_terms( $taxonomy, $args );
            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                $arr = $terms;
            }
        }       
    }
    return $arr;
}

// 親を取得し、子が存在すれば再帰的に子まで取得する
function ootpl_taxonomy_parents_data_get( &$arr, $parent_ID=0, $child_ID=0, $taxonomy='category', $object_id=0 ) {
    // 同階層のタクソノミーを取得
    $data = ootpl_taxonomy_parents_sql_get( $parent_ID, $child_ID, $taxonomy, $object_id );
    // 展開
    if ( $data && count( $data ) > 0 ) {
        foreach ( $data as $row ) {
            $name    = isset( $row->name )    ? esc_html( $row->name ) : '';
            $term_id = isset( $row->term_id ) ? (int) $row->term_id : '';
            $parent  = isset( $row->parent )  ? (int) $row->parent : '';            
            $arr[] = $row;
            
            // 子が存在するか
            ootpl_taxonomy_parents_data_get( $arr, 0, $term_id, $taxonomy, $object_id );
        }
    }
}

// 親もしくは子の一覧を取得する
function ootpl_taxonomy_parents_sql_get( $parent_ID=0, $child_ID=0, $taxonomy='category', $object_id=0 ) {

    global $wpdb;
    
//SELECT
//    DISTINCT wp_terms.`term_id`, wp_terms.`name`, wp_terms.`slug`, wp_term_taxonomy.taxonomy, wp_term_taxonomy.count
//FROM
//    wp_term_taxonomy
//LEFT JOIN wp_terms ON wp_terms.term_id = wp_term_taxonomy.term_id
//LEFT JOIN wp_term_relationships ON wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id
//WHERE
//    1 = 1
//    AND `parent` = 0
//    AND wp_term_taxonomy.taxonomy = 'category'
//ORDER BY
//wp_terms.term_order ASC

    // select句
    $select = "SELECT
        DISTINCT {$wpdb->terms}.term_id, {$wpdb->terms}.name, {$wpdb->terms}.slug, {$wpdb->term_taxonomy}.parent, {$wpdb->term_taxonomy}.count
    FROM
        {$wpdb->term_taxonomy}
    LEFT JOIN {$wpdb->terms} ON {$wpdb->terms}.term_id = {$wpdb->term_taxonomy}.term_id
    LEFT JOIN {$wpdb->term_relationships} ON {$wpdb->term_relationships}.term_taxonomy_id = {$wpdb->term_taxonomy}.term_taxonomy_id";

    $holder = array();
    // where句
    // タクソノミーを指定
    $where    = " WHERE {$wpdb->term_taxonomy}.taxonomy = %s";
    $holder[] = $taxonomy;
    
    // 親か子で絞り込む
    if ( $child_ID > 0 ) {
        $where   .= " AND {$wpdb->term_taxonomy}.parent = %d";
        $holder[] = $child_ID;
    } else {
        $where   .= " AND {$wpdb->term_taxonomy}.parent = %d";
        $holder[] = $parent_ID;
    }
    
    // 記事を絞り込む
    if ( $object_id > 0 ) {
        $where   .= " AND {$wpdb->term_relationships}.object_id = %d";
        $holder[] = $object_id;
    }

    // order句
    $order = " ORDER BY {$wpdb->terms}.term_order ASC";

    // sql
    $sql = $select . $where . $order;

    // クエリ実行
    $data = $wpdb->get_results( $wpdb->prepare( $sql, $holder ), OBJECT );
    return $data;
}