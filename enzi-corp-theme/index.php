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

                    <h1 class="ttl"><?php the_title(); ?></h1>

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

                                <h1><?php the_title(); ?></h1>

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