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
                    <section class="news">

                        <article>

                            <ul>
                                
                                <?php
                                $sticky = get_option( 'sticky_posts' );

                                // 先頭に固定を取得
                                if ( $sticky && count( $sticky ) > 0 && ! is_paged() && is_post_type_archive( 'post' ) ) :

                                // パラメータ
                                $args = array(
                                    'post_type'      => 'post',
                                    'post_status'    => 'publish',
                                    'post__in'       => $sticky,
                                );

                                // SQL
                                $query = new WP_Query( $args );

                                if ( $query->have_posts() ) :
                                    while ( $query->have_posts() ) : $query->the_post();
                                ?>

                                <?php get_template_part( 'part-article' ); ?>

                                <?php
                                    endwhile;
                                endif;

                                else :
                                    $sticky = array();
                                endif;

                                // SQL クリア
                                wp_reset_postdata();
                                ?>


                                <?php
                                if ( have_posts() ) :
                                    while ( have_posts() ) : the_post();
                                    if ( count( $sticky ) > 0 ) {
                                        if ( in_array( get_the_ID(), $sticky ) ) continue;
                                    }
                                ?>

                                <?php get_template_part( 'part-article' ); ?>

                                <?php
                                    endwhile;
                                else :

                                // 投稿タイプを取得
                                $post_type = get_query_var( 'post_type' );
                                if ( ! $post_type ) $post_type = 'post';

                                $obj = get_post_type_object( $post_type );
                                if ( ! empty( $obj ) && ! is_wp_error( $obj ) ) {
                                    $name = $obj->label;
                                } else {
                                    $name = '未分類';
                                }

                                if ( is_category() ) {
                                    $name = single_cat_title( '', false );
                                }
                                else if ( is_tag() ) {
                                    $name = single_tag_title( '', false );
                                }
                                else if ( is_tax() ) {
                                    $name = single_term_title( '', false );
                                }
                                else if ( is_search() ) {
                                    $name = get_search_query();
                                }

                                ?>

                                <li>
                                    <dl>
                                        <dt>
                                            <h3><?php echo $name; ?>に関する記事は現在ございません。</h3>
                                        </dt>
                                    </dl>
                                </li>

                                <?php endif; ?>
                                
                            </ul>

                        </article>		

                    </section>
                    <!-- お知らせ END -->

                    <!-- PAGER START -->
                    <?php get_template_part( 'paginate' ); ?>
                    <!-- PAGER END -->

                </main>		
                <!-- //// MAIN CONTENT END //// -->


                <!-- //// SIDE CONTENT START //// -->		
                <?php get_sidebar( 'news' ); ?>
                <!-- CONTENTS END -->

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