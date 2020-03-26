<!DOCTYPE html>
<html lang="ja">
    
    <?php get_header(); ?>

    <body class="drawer">
        <?php get_sidebar(); ?>

        <!-- //// ALL START //// -->

        <!-- classにコンテンツディレクトリを付与する -->
        <div id="container" class="article edit">


            <!-- //// HEADER START //// -->
            <?php get_sidebar( 'header' ); ?>
            <!-- //// HEADER END //// -->


            <!-- //// PAGE TITLE START //// -->

            <div class="ttl">

                <div class="ttl_inner">

                    <h1 class="ttl">NEWS<span>お知らせ</span></h1>

                    <!-- パンくずリスト START -->
                    <?php get_template_part( 'breadcrumbs' ); ?>
                    <!-- パンくずリスト END -->
                    
                </div>
            </div>

            <!-- //// PAGE TITLE END //// -->

            <div class="ttl_new">
                <h2 class="ttl">お知らせ一覧</h2>
            </div>

            <div class="column_2">

                <!-- //// MAIN CONTENT START //// -->

                <main role="main">

                    <!-- CONTENTS START -->
                    <section class="">

                        <article>

                            <!-- ARTICLE DITAIL START -->
                            <div class="article_head">

                                <!-- 日時・カテゴリ -->
                                <ul>
                                    
                                    <?php
                                    
                                    $html = array();
                                    
                                    if ( ootpl_is_new_post( get_the_time( 'Y-m-d' ) ) ) {
                                        $html[] = '<li><span class="span_blue">NEW</span></li>';
                                    }
                                    
                                    $ID  = get_the_ID();
                                    $tax = 'category';
                                    $arr = ootpl_taxonomy_parents_cat_list( $parent=0, $tax, $ID );
                                    if ( $arr && count( $arr ) > 0 ) {
                                        foreach ( $arr as $row ) {
                                            $name    = isset( $row->name )    ? esc_html( $row->name ) : '';
                                            $term_id = isset( $row->term_id ) ? (int) $row->term_id : '';
                                            $slug    = isset( $row->slug )    ? esc_html( $row->slug ) : '';
                                            $count   = isset( $row->count )   ? (int) $row->count : 0;

                                            $html[] = '<li><a href="' . get_term_link( $term_id, $tax ) . '"><span>' . $name . '</span></a></li>';
                                        }
                                        if ( count( $html ) > 0 ) {
                                    ?>

                                    <li>
                                        <ul class="article_cgy_color">
                                            <?php echo implode( "\n", $html ); ?>
                                        </ul>
                                    </li>

                                    <?php
                                        }
                                    }
                                    ?>
                                    
                                    <li class="article_day"><?php echo get_the_time( get_option( 'date_format' ) ); ?></li>
                                </ul>

                                <!-- タイトル -->
                                <h2><?php the_title(); ?></h2>
                                
                                <!-- サムネイル -->
                                <?php if ( has_post_thumbnail() ) : ?>
                                <div class="thum">
                                    <?php the_post_thumbnail( 'full' ); ?>
                                </div>
                                <?php endif; ?>

                            </div>
                            <!-- ARTICLE DITAIL END -->


                            <!-- エディターエリア START -->
                            <div class="editor">
                                
                                <?php
                                the_content();

                                wp_link_pages(
                                    array(
                                        'before' => '<div class="page-links">' . __( 'Pages:' ),
                                        'after'  => '</div>',
                                    )
                                );
                                ?>
                                
                            </div>
                            <!-- エディターエリア END -->

                        </article>


                        <div class="article_nav">

                            <!-- 前後の記事リンク START -->
                            <ul class="article_transfer">
                                <li><?php previous_post_link( '%link', '前の記事', false ); ?></li> 
                                <li><a class="page-numbers" href="<?php echo esc_url( home_url( '/news' ) ); ?>">一覧に戻る</a></li> 
                                <li><?php next_post_link( '%link', '次の記事', false ); ?></li>
                            </ul>
                            <!-- 前後の記事リンク END -->

                        </div>

                    </section>


                </main>

                <!-- //// MAIN CONTENT END //// -->


                <!-- //// SIDE CONTENT START //// -->
                <?php get_sidebar( 'news' ); ?>
                <!-- //// SIDE CONTENT END //// -->

            </div>

            <!-- CTA END -->
            <?php get_template_part( 'part-contact' ); ?>
            <!-- CTA END -->

            <!-- //// FOOTER START //// -->
            <?php get_sidebar( 'footer' ); ?>
            <!-- //// FOOTER END //// -->


        </div>

        <!-- //// ALL END //// -->

        <?php get_footer(); ?>
    </body>
</html>