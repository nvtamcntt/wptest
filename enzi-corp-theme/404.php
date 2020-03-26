<!DOCTYPE html>
<html lang="ja">

    <?php get_header(); ?>

    <body class="drawer">
        <?php get_sidebar(); ?>


        <!-- //// ALL START //// -->

        <!-- classにコンテンツディレクトリを付与する -->
        <div id="container" class="article">


            <!-- //// HEADER START //// -->
            <?php get_sidebar( 'header' ); ?>
            <!-- //// HEADER END //// -->


            <!-- //// PAGE TITLE START //// -->

            <div class="ttl">

                <div class="ttl_inner">

                    <h1 class="ttl">404 File not found.<span></span></h1>

                    <!-- パンくずリスト START -->
                    <?php get_template_part( 'breadcrumbs' ); ?>
                    <!-- パンくずリスト END -->
                </div>
            </div>

            <!-- //// PAGE TITLE END //// -->


            <div class="column_1">

                <!-- //// MAIN CONTENT START //// -->

                <main role="main">


                    <!-- CONTENTS START -->
                    <section>

                        <article>

                            <div class="basket_box n_found">

                                <h1>404 File not found.</h1>

                                <p>ページが見つかりませんでした。お探しのページは、一時的にアクセスができない状態にあるか、もしくは削除された可能性があります。</p>

                                <div class="btn">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span>トップページに戻る</span></a>
                                </div>

                            </div>

                        </article>		

                    </section>
                    <!-- CONTENTS END -->

                    <!-- CTA END -->
                    <?php get_template_part( 'part-contact' ); ?>
                    <!-- CTA END -->

                </main>

                <!-- //// MAIN CONTENT END //// -->

            </div>

            <!-- //// FOOTER START //// -->
            <?php get_sidebar( 'footer' ); ?>
            <!-- //// FOOTER END //// -->




        </div>

        <!-- //// ALL END //// -->

        <?php get_footer(); ?>
    </body>
</html>