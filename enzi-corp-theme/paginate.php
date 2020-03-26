<?php
// ページネーション
global $wp_query;

$big = 999999999; // need an unlikely integer

// 検索の時のみベースの形を変える。
if ( is_search() ) {
    $base = '?paged=%#%';
} else {
    $base = str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) );
}

// 基本パラメーター
$args = array(
    'base'      => $base,
    'format'    => '?paged=%#%',
    'current'   => max( 1, $paged ),
    'total'     => $wp_query->max_num_pages,
    'prev_next' => true,
    'prev_text' => '',
    'next_text' => '',
    'type'		=> 'array'
);

$paginate_links = paginate_links( $args );

$page_str = '';
if ( is_array( $paginate_links ) ) {
    $page_num = 'Page ' . $paged . ' of ' . $wp_query->max_num_pages;
    $page_str = '<ul class="pager">';
    foreach ( $paginate_links as $page ) {
        if ( strpos( $page, 'current' ) === false) {
            $page_str .= '<li>' . $page . '</li>';
        } else {
            $page_str .= '<li class="active">' . $page . '</li>';
        }
    }
    $page_str .= '</ul>';
}

echo $page_str;
?>