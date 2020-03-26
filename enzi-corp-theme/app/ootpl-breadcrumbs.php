<?php
////////////////////////////////////////////////////////
// WP Document Ver1.2  パンくずリスト 1.2.2
////////////////////////////////////////////////////////
// Only one custom template.


function ootpl_create_breadcrumbs() {
    global $s, $post;

    $html = array();

    // TOP
    if ( is_front_page() || is_home() ) {
        //$html[] = '<li>TOP</li>';
    } else {
        //$html[] = '<li><a href="' . esc_url( home_url( '/' ) ) . '">TOP</a></li>';
        $html[] = '<li class="home"><a href="' . esc_url( home_url( '/' ) ) . '"><img src="' . get_template_directory_uri() . '/assets/img/common/icon/icon_home_b.svg" alt="TOP"></a></li>';
    }

    // アーカイブと投稿ページには「投稿タイプ」を追加する
    // 投稿アーカイブ
    if ( is_post_type_archive() ) {
        // 投稿タイプを取得
        $post_type = get_query_var( 'post_type' );

        $obj = get_post_type_object( $post_type );
        if ( ! empty( $obj ) && ! is_wp_error( $obj ) ) {
            // カスタム投稿タイプが付いた日付アーカイブもしくは検索アーカイブならリンクを付ける
            if ( is_date() || is_search() ) {
                $html[] = '<li><a href="' . esc_url( get_post_type_archive_link( $obj->name ) ) . '">' . $obj->label . '</a></li>';
            } else {
                $html[] = '<li>' . $obj->label . '</li>';
            }
        }
    }
    // アーカイブもしくは通常投稿
    else if ( is_archive() || is_singular( 'post' ) ) {
        // タクソノミーはカスタム投稿も含まれるので弾く
        if ( ! is_tax() ) {
            // 投稿タイプを指定
            $obj = get_post_type_object( 'post' );
            if ( ! empty( $obj ) && ! is_wp_error( $obj ) ) {
                if ( $obj->has_archive ) {
                    $html[] = '<li><a href="' . esc_url( home_url( $obj->has_archive ) ) . '">' . $obj->label . '</a></li>';
                }
            }
        }
    }
    // カスタム投稿
    else if ( is_singular() ) {
        // カスタム投稿タイプを取得
        $post_type = get_query_var( 'post_type' );
        
        $obj = get_post_type_object( $post_type );
        if ( ! empty( $obj ) && ! is_wp_error( $obj ) ) {
            $html[] = '<li><a href="' . get_post_type_archive_link( $obj->name ) . '">' . $obj->label . '</a></li>';
        }
    }


    // パンくず生成
    // 検索
    if ( is_search() ) {
        // カテゴリの指定があったら、親カテゴリを追加する
        $cat_ID = get_query_var( 'cat' );
        if ( $cat_ID != '' ) {
            // 親カテゴリを取得
            $thisCat = get_category( $cat_ID, false );
            $html[] = '<li><a href="' . get_category_link( $thisCat->term_id ) . '">' . $thisCat->cat_name . '</a></li>';
        }
        $html[] = '<li>"' . $s . '"の検索結果</li>'; 
    }
    // エラー
    else if ( is_404() ) {
        $html[] = '<li>ページが見つかりませんでした</li>';
    }
    // 固定ページ
    else if ( is_page() ) {
        // 親ページのIDを取得
        $arr = get_post_ancestors( $post->ID );
        // 親ページがあれば親ページも含める
        if ( count( $arr ) > 0 ) {
            $tmp = array();
            foreach ( $arr as $parent_id ) {
                $tmp[] = '<li><a href="' . get_permalink( $parent_id ) . '">' . get_the_title( $parent_id ) . '</a></li>';
            }
            // 親→先祖の順なので、逆順にする
            $tmp = array_reverse( $tmp );
            // パンくずに追加する
            $html = array_merge( $html, $tmp );
        }
        $html[] = '<li>' . get_the_title() . '</li>';
    }
    // 日付
    else if ( is_date() ) {

        // カテゴリの指定があったら、親カテゴリを追加する
        $cat_ID = get_query_var( 'cat' );
        if ( $cat_ID != '' ) {
            // 親カテゴリを取得
            $thisCat = get_category( $cat_ID, false );
            $html[] = '<li><a href="' . get_category_link( $thisCat->term_id ) . '">' . $thisCat->cat_name . '</a></li>';
        }

        $year     = ( get_query_var( 'year' ) != '' ) ? get_query_var( 'year' ) . '年' : '';
        $monthnum = ( get_query_var( 'monthnum' ) != '' ) ? get_query_var( 'monthnum' ) . '月' : '';
        $day      = ( get_query_var( 'day' ) != '' ) ? get_query_var( 'day' ) . '日' : '';

        $html[] = '<li>' . $year . $monthnum . $day . '</li>';
    }
    // タグ
    else if ( is_tag() ) {
        $tag_ID = get_query_var( 'tag_id' );
        $tag    = get_term( $tag_ID, 'post_tag' );
        $html[] = '<li>' . $tag->name . '</li>';
    }
    // タクソノミー 
    else if ( is_tax() ) {
        // タクソノミーを取得
        $taxonomy = get_query_var( 'taxonomy' );

        // 投稿タイプを取得
        $tax = get_taxonomy( $taxonomy );
        $post_type = isset( $tax->object_type[0] ) ? $tax->object_type[0] : '';
        if ( $post_type ) {
            $obj = get_post_type_object( $post_type );
            if ( ! empty( $obj ) && ! is_wp_error( $obj ) ) {
                $html[] = '<li><a href="' . esc_url( get_post_type_archive_link( $obj->name ) ) . '">' . $obj->label . '</a></li>';
            }
        }

        // タクソノミー
        $html[] = '<li>' . single_term_title( '', false ) . '</li>';
    }
    // カテゴリー
    else if ( is_category() ) {
        $cat_ID = get_query_var( 'cat' );

        // 親子階層を取得
        $arr = get_ancestors( $cat_ID, 'category' );

        // 展開
        $tmp = array();
        if ( count( $arr ) > 0 ) {
            foreach ( $arr as $parent_ID ) {
                $tmp[] = '<li><a href="' . get_category_link( $parent_ID ) . '">' . get_cat_name( $parent_ID ) . '</a></li>';
            }
        }
        // 親→先祖の順なので、逆順にする
        $tmp = array_reverse( $tmp );
        // パンくずに追加する
        $html = array_merge( $html, $tmp );

        $html[] = '<li>' . get_cat_name( $cat_ID ) . '</li>';

    }
    // 投稿ページ
    else if ( is_singular() ) {
        // 通常投稿
        if ( is_singular( 'post' ) ) {

            // Category Order and Taxonomy Terms Orderプラグインを利用しているのであれば term_order を含める
            if ( ootpl_is_plugin_active( 'taxonomy-terms-order/taxonomy-terms-order.php' ) ) {
                // ソート順で取得する
                $args = array( 'orderby'=>'term_order', 'order'=>'ASC' );
            } else {
                $args = array( 'orderby'=>'name', 'order'=>'ASC', 'fields'=>'all' );
            }

            // カテゴリー一覧を取得
            $terms = wp_get_object_terms( get_the_ID(), 'category', $args );

            // 全体のカテゴリ, 親であるカテゴリ
            $self_tmp   = array();
            $parent_tmp = array();
            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                foreach( $terms as $term ) {
                    $self_tmp[]   = (string) $term->term_id;
                    $parent_tmp[] = (string) $term->parent;
                }
            }

            // 全体のカテゴリ - 親であるカテゴリ = 親ではないカテゴリ
            $child_cat_arr = array_diff( $self_tmp, $parent_tmp );

            // 子が複数の可能性があるので、一番お尻から取得
            $child_ID = '';
            if ( is_array( $child_cat_arr ) ) {
                $tmp = $child_cat_arr;
                $child_ID = array_pop( $tmp );
            }

            // 親子階層を取得
            $arr = get_ancestors( $child_ID, 'category' );

            // 展開
            $tmp = array();
            if ( count( $arr ) > 0 ) {
                foreach ( $arr as $parent_ID ) {
                    $tmp[] = '<li><a href="' . get_category_link( $parent_ID ) . '">' . get_cat_name( $parent_ID ) . '</a></li>';
                }
            }
            // 親→先祖の順なので、逆順にする
            $tmp = array_reverse( $tmp );
            // パンくずに追加する
            $html = array_merge( $html, $tmp );

            // 並列になっている最下層を追加
            if ( is_array( $child_cat_arr ) ) {
                $tmp = array();
                foreach( $child_cat_arr as $child_ID ) {
                    $tmp[] = '<a href="' . get_category_link( $child_ID ) . '">' . get_cat_name( $child_ID ) . '</a>';
                }
                if ( count( $tmp ) > 0 ) $html[] = '<li>' . implode( ' / ', $tmp ) . '</li>';
            }

            // ページ名
            $html[] = '<li>' . get_the_title() . '</li>';

            // カスタム投稿タイプ
        } else {

            // カスタム投稿タイプを取得
            $post_type = get_query_var( 'post_type' );
            // タクソノミー
            $taxonomy  = $post_type . '_cat';
                        
            // タクソノミー
            $terms = wp_get_object_terms( get_the_ID(), $taxonomy );
            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                $tmp = array();
                foreach( $terms as $term ) {
                    $tmp[] = '<a href="' . get_term_link( $term->slug, $taxonomy ) . '">' . $term->name . '</a>';
                }
                if ( count( $tmp ) > 0 ) $html[] = '<li>' . implode( ' / ', $tmp ) . '</li>';
            }
            
            $html[] = '<li>' . get_the_title() . '</li>';
        }
    }

    // HTML出力
    if ( count( $html ) > 0 ) {
        echo implode( "\n", $html ) . "\n";
    }
}