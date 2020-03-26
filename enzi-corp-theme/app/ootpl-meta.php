<?php
////////////////////////////////////////////////////////
// WP Document Ver2.2  META / OGP タグ取得
////////////////////////////////////////////////////////
// Only one custom template.

// 一部カスタマイズ有り

/*

「All in One SEO Pack」について
・後から入れられることが多いので、先に入れて対応する。

「All in One SEO Pack」の注意点
・OGPタグは生成されない。
・get_the_archive_description()の値がある場合、強制的にディスクリプションが出力される。

*/


class ootpl_meta_ogp {

    // --- タイトルセパレーター
    protected $separator        = '｜';

    // title
    protected $site_title       = '';
    // description
    protected $site_description = '';
    // keywords
    protected $site_keywords    = '';

    // --- OGP
    // description
    protected $og_doc           = '';
    // og:title
    protected $og_ttl           = '';
    // og:site_name
    protected $og_name          = '';
    // og:description
    protected $og_description   = '';
    // og:url
    protected $og_url           = '';
    // og:image
    protected $og_tmb           = '';
    // og:image:width
    protected $og_width         = '';
    // og:image:height
    protected $og_height        = '';
    // og:type
    protected $og_type          = '';
    // og:locale
    protected $og_locale        = '';

    // All in One SEO Pack対応
    protected $All_in_One_SEO_Pack = false;

    function __construct( $keywords ) {

        $bloginfo_name          = get_bloginfo( 'name' );
        $bloginfo_description   = get_bloginfo( 'description' );
        $bloginfo_url           = esc_url( home_url( '/' ) );

        // title
        $this->site_title        = $bloginfo_name;
        // description
        $this->site_description  = $bloginfo_description;
        // keywords
        $this->site_keywords      = $keywords;

        // og:title
        $this->og_ttl             = $bloginfo_name;
        // og:site_name
        $this->og_site_name       = $bloginfo_name;
        // og:description
        $this->og_description     = $bloginfo_description;
        // og:url
        $this->og_url             = $bloginfo_url;
        // og:image
        $this->og_tmb             = get_template_directory_uri() . '/assets/img/icon/fb.png';
        // og:image:width
        $this->og_width           = '800';
        // og:image:height
        $this->og_height          = '800';
        // og:type
        $this->og_type            = 'article';
        // og:locale
        $this->og_locale          = 'ja_JP';


        // All in One SEO Packが有効であれば true
        if ( ootpl_is_plugin_active( 'all-in-one-seo-pack/all_in_one_seo_pack.php' ) ) {
            $this->All_in_One_SEO_Pack = true;
        }
    }

    // META（OGP）タグを出力する
    public function view()
    {
        // META（OGP）タグに必要な情報を取得する。
        $this->get_meta_ogp();

?>
<title><?php echo $this->site_title; ?></title>

<?php if ( $this->site_description ) : ?>
<meta name="description" content="<?php echo $this->site_description; ?>">
<?php endif; ?>
<?php if ( $this->site_keywords ) : ?>
<meta name="keywords" content="<?php echo $this->site_keywords; ?>">
<?php endif; ?>

<meta property="og:locale" content="<?php echo $this->og_locale; ?>">
<meta property="og:title" content="<?php echo $this->og_ttl; ?>">
<meta property="og:site_name" content="<?php echo $this->og_site_name; ?>">
<meta property="og:description" content="<?php echo $this->og_description; ?>">
<meta property="og:image" content="<?php echo $this->og_tmb; ?>">
<meta property="og:image:width" content="<?php echo $this->og_width; ?>">
<meta property="og:image:height" content="<?php echo $this->og_height; ?>">
<meta property="og:url" content="<?php echo $this->og_url; ?>">
<meta property="og:type" content="<?php echo $this->og_type; ?>">

<?php

    }


    // 文字列を整形する
    private function create_document( $content, $count_num=110 )
    {
        // タグは全て削除
        $content = str_replace( array( "\r\n", "\r", "\n", "\t" ), '', strip_tags( $content ) );
        // 稀にダブルクォーテーションが混じるのでシングルに
        $content = str_replace( '"', '\'', $content );
        // 文字数が多ければ文字をカット
        $doc = mb_substr( $content, 0, $count_num );
        // カットした以上に文字があれば「..」を追加
        if ( mb_strlen( $content, 'UTF-8' ) > $count_num ) {
            $doc .= '..';
        }
        return $doc;
    }


    // META（OGP）タグに必要な情報を取得する。
    protected function get_meta_ogp()
    {
        if ( ! is_single() && ! is_page() ) {

            if ( is_front_page() || is_home() ) {
                $this->og_type  = 'website';
            }

        } else {

            the_post();

            // サムネイルを取得
            if ( has_post_thumbnail() ) {
                $image_attributes   = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                $this->og_tmb       = $image_attributes[0];
                $this->og_width     = $image_attributes[1];
                $this->og_height    = $image_attributes[2];
            }

            // 自動ディスクリプション
            $txt = get_the_content();
            if ( $txt ) {
                $txt = $this->create_document( $txt );
                $this->site_description = $txt;
                $this->og_description   = $txt;
            }

            // パーマリンク
            $this->og_url = get_the_permalink();
        }

        // タイトル・ディスクリプションを指定する
        $this->get_meta_page();

        // アーカイブ別にタイトル・ディスクリプションを指定する
        $this->get_meta_archive();
    }


    // タイトル・ディスクリプションを指定する
    protected function get_meta_page()
    {   
        $title = $this->site_title;

        // フロントページ
        if ( is_front_page() || is_home() ) {

            if ( $this->All_in_One_SEO_Pack ) {

                $aio_otp = get_option( 'aioseop_options' );

                if ( is_array( $aio_otp ) && count( $aio_otp ) > 0 ) {
                    $aio_otp_ttl    = isset( $aio_otp['aiosp_home_title'] )         ? $aio_otp['aiosp_home_title']       : '';
                    $aio_otp_doc    = isset( $aio_otp['aiosp_home_description'] )   ? $aio_otp['aiosp_home_description'] : '';

                    $this->site_title       = $aio_otp_ttl;
                    $this->site_description = '';
                    $this->og_ttl           = $aio_otp_ttl;
                    $this->og_description   = $aio_otp_doc;
                }

                return null;
            }
        }

        if ( is_singular() ) {
            $ID = get_the_ID();

            // 投稿タイプを取得
            $term_object = get_queried_object();
            $post_type   = $term_object->post_type;

            // 投稿タイプを追加する
            if ( $post_type && $post_type != 'page' ) {
                $obj = get_post_type_object( $post_type );
                if ( ! empty( $obj ) && ! is_wp_error( $obj ) ) {
                    $title = $obj->label . $this->separator . $title;
                }
            }

            // 固定ページならば親ページを追加する
            if ( $post_type && $post_type == 'page' ) {
                // 親ページのIDを取得
                $arr = get_post_ancestors( $ID );
                // 親ページがあれば親ページも含める
                if ( count( $arr ) > 0 ) {
                    $tmp    = array();
                    $tmp[]  = $title;
                    foreach ( $arr as $parent_id ) {
                        $parent_page = get_post( $parent_id );
                        $tmp[] = $parent_page->post_title;
                    }
                    // 親→先祖の順なので、逆順にする
                    $tmp = array_reverse( $tmp );
                    // 追加する
                    $title = implode( $this->separator, $tmp );
                }
            }

            // 個別ページ名
            $ttl = get_the_title();
            $this->site_title   = $ttl . $this->separator . $title;
            $this->og_ttl       = $ttl . $this->separator . $title;

            // All in One SEO Packがあったら上書きする
            if ( $this->All_in_One_SEO_Pack ) {

                $aio_ttl = get_post_meta( $ID, '_aioseop_title',        true );
                $aio_doc = get_post_meta( $ID, '_aioseop_description',  true );
                $aio_key = get_post_meta( $ID, '_aioseop_keywords',     true );

                if ( $aio_ttl ) {
                    $this->site_title   = $aio_ttl . $this->separator . $title;
                    $this->og_ttl       = $aio_ttl . $this->separator . $title;
                }
                if ( $aio_doc ) {
                    $this->site_description = '';
                    $this->og_description   = $aio_doc;
                }
                if ( $aio_key ) {
                    $this->site_keywords = '';
                }

            }

            return null;
        }


        // その他
        $tmp = array();
        $tmp[] = trim( wp_title( '', false ) );
        $tmp[] = $title;

        $title = implode( $this->separator, $tmp );
        $this->site_title   = $title;
        $this->og_ttl       = $title;

    }


    // アーカイブ別にタイトル・ディスクリプションを指定する
    protected function get_meta_archive()
    {
        $title  = $this->site_title;
        $desc   = $this->site_description;

        $txt_description = array();

        $meta_file = get_template_directory() . '/app/ootpl-meta-txt.php';
        if ( is_readable( $meta_file ) ) {
            require $meta_file;
        }

        // アーカイブ
        if ( is_archive() ) {
            $tmp = get_the_archive_description();
            if ( $tmp ) {

                // 不要タグ削除
                $tmp = $this->create_document( $tmp );

                $this->site_description = $tmp;
                $this->og_description   = $tmp;

                // get_the_archive_descriptionがあるとディスクリプションが強制出力されるので一度ディスクリプションは削除する
                if ( $this->All_in_One_SEO_Pack ) {
                    $this->site_description = '';
                }

            } else {

                // カスタム投稿
                if ( is_post_type_archive() ) {
                    //$name = post_type_archive_title( '', false );

                    // 定型文を追加する
                    $term_object = get_queried_object();
                    $name = $term_object->label;
                    $slug = $term_object->name;
                    if ( isset( $txt_description[ $slug ] ) && $txt_description[ $slug ] != '' ) {
                        //$desc = $name . $this->separator . $txt_description[ $slug ];
                        $desc = $txt_description[ $slug ];
                    } else {
                        $desc = $name . $this->separator . $desc;
                    }
                    
                }
                // タクソノミー
                else if ( is_tax() ) {

                    $name = single_term_title( '', false );

                    // タクソノミーを取得
                    $taxonomy = get_query_var( 'taxonomy' );

                    // 投稿タイプを取得
                    $tax = get_taxonomy( $taxonomy );
                    $post_type = isset( $tax->object_type[0] ) ? $tax->object_type[0] : '';
                    // 定型文を追加する
                    if ( $post_type ) {
                        $obj = get_post_type_object( $post_type );
                        if ( ! empty( $obj ) && ! is_wp_error( $obj ) ) {
                            if ( isset( $txt_description[ $post_type ] ) && $txt_description[ $post_type ] != '' ) {
                                $desc = $obj->label . $this->separator . $txt_description[ $post_type ];
                            } else {
                                $desc = $obj->label . $this->separator . $desc;
                            }
                            $title = $name . $this->separator . $obj->label . $this->separator . $this->og_site_name;
                        }
                    }
                }
                // その他
                else if ( is_archive() ) {

                    if ( is_category() ) {
                        $name = single_cat_title( '', false );
                    }
                    else if ( is_tag() ) {
                        $name = single_tag_title( '', false );
                    }
                    else if ( is_date() ) {
                        $name = get_the_time( 'Y年n月' );

                        // 日付はタイトルも日本語で整える
                        $title = $name . $this->separator . $this->og_site_name;

                    }
                    else if ( is_search() ) {
                        $name = get_search_query();
                    }
                    
                    
                    // 投稿タイプを指定
                    $obj = get_post_type_object( 'post' );
                    if ( ! empty( $obj ) && ! is_wp_error( $obj ) ) {
                        if ( $obj->has_archive ) {
                            $name  = $name . $this->separator . $obj->label;
                            $title = $name . $this->separator . $this->og_site_name;
                        }
                    }
                    
                    // 定型文を追加する
                    if ( isset( $txt_description[ 'post' ] ) && $txt_description[ 'post' ] != '' ) {
                        $desc = $name . $this->separator . $txt_description[ 'post' ];
                    } else {
                        $desc = $name . $this->separator . $desc;
                    }
                }

                $this->site_description = $desc;
                $this->og_description   = $desc;

                $this->site_title       = $title;
                $this->og_ttl           = $title;
            }


        }

        // タクソノミー

        // カスタム投稿

        // アーカイブ

    }
}
