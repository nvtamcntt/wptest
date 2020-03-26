<!DOCTYPE html>
<html lang="ja">

    <?php get_header(); ?>

    <body class="drawer">
        <?php get_sidebar(); ?>

        <!-- //// ALL START //// -->

        <!-- classにコンテンツディレクトリを付与する -->
        <div id="container" class="article service">


            <!-- //// HEADER START //// -->
            <?php get_sidebar( 'header' ); ?>
            <!-- //// HEADER END //// -->


            <!-- //// PAGE TITLE START //// -->

            <div class="ttl">

                <div class="ttl_inner">

                    <h1 class="ttl">service<span>サービス</span></h1>

                    <!-- パンくずリスト START -->
                    <?php get_template_part( 'breadcrumbs' ); ?>
                    <!-- パンくずリスト END -->
                </div>
            </div>

            <!-- //// PAGE TITLE END //// -->


            <div class="column_1">

                <!-- //// MAIN CONTENT START //// -->

                <main role="main">

                    <section class="service_content">

                        <article>
                            <h2 class="ttl_20">人と企業のニーズを満たし、<br>社会に貢献するエンジのサービス</h2>

                            <div class="list_cont">
                                <ul class="service_list">
                                    <li>
                                        <div class="inner">
                                            <a href="<?php echo esc_url( home_url( '/service/human-resources-solution' ) ); ?>">
                                                <div class="image_cont">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/img_list_human.jpg" alt="人材ソリューション" class="obj_image">
                                                </div>
                                                <h4>HUMAN RESOURCES<br>SOLUTION<span>人材ソリューション</span></h4>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="inner">
                                            <a href="<?php echo esc_url( home_url( '/service/it-solution' ) ); ?>">
                                                <div class="image_cont">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/img_list_it.jpg" alt="ITソリューション" class="obj_image">
                                                </div>
                                                <h4>IT SOLUTION<span>ITソリューション</span></h4>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="inner">
                                            <a href="<?php echo esc_url( home_url( '/service/construct' ) ); ?>">
                                                <div class="image_cont">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/img_list_construct.jpg" alt="施工" class="obj_image">
                                                </div>
                                                <h4>CONSTRUCT<span>施工</span></h4>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </article>
                    </section>

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
