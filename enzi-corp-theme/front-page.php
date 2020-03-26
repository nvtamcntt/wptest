<!DOCTYPE html>
<html lang="ja">

    <?php get_header(); ?>

    <body class="drawer">
        <?php get_sidebar(); ?>


        <!-- //// ALL START //// -->

        <div id="container" class="front">


            <!-- //// HEADER START //// -->
            <?php get_sidebar( 'header' ); ?>
            <!-- //// HEADER END //// -->

            <div class="column_1">

                <!-- //// MAIN CONTENT START //// -->

                <main role="main">


                    <!-- 1st View START -->
                    <div class="kv">
                        <div class="kv_inner center">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/front/text_top_kv.png" alt="世界を人でつなぐ">
                           <p>人材ソリューションのプロフェッショナル</p>
                        </div>
                        <div id="bg_particles_l" class="particles"></div>
                        <div id="bg_particles" class="particles"></div>
                    </div>
                    <!-- 1st View END -->



                    <!-- サービス START -->
                    <section class="service">
                        <article>
                            <div class="both_side_line service_top">
                                <div class="bg_box_left bg_gray">
                                    <div class="inner">
                                        <h2 class="ttl">SERVICE<span>サービス</span></h2>
                                        <h3 class="copy">世の中をよくする、<br class="hide_pc">フィールドは世界</h3>
                                        <p>今の時代のニーズに応えるために生まれた3つの事業。すべては世の中<br class="hide_sp">をよくするため、グローバルな視野で真摯に取り組んでいます。</p>
                                    </div>
                                </div>
                            </div>
                            <div class="both_side_line service_intro">
                                <div class="service_intro_1col service_intro_row">
                                    <div class="image_cont">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/front/img_top_service_01.jpg" alt="人材ソリューション">
                                    </div>
                                    <div class="nav_cont">
                                        <div class="inner">
                                            <p class="service_no">Service 01</p>
                                            <h3><a href="<?php echo esc_url( home_url( '/service/human-resources-solution' ) ); ?>" class="arrow_link">人材ソリューション</a></h3>
                                            <p class="detail">日本企業が抱える人材不足の悩みに応える人材ソリューション事業。世界をフィールドに、グローバル人材と企業をつなぎます。</p>
                                            <div class="btn">
                                                <a href="<?php echo esc_url( home_url( '/service/human-resources-solution' ) ); ?>"><span>MORE</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="service_intro_2col service_intro_row">
                                    <div class="col">
                                        <div class="image_cont">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/front/img_top_service_02.jpg" alt="ITソリューション">
                                        </div>
                                        <div class="nav_cont">
                                            <div class="inner">
                                                <p class="service_no">Service 02</p>
                                                <h3><a href="<?php echo esc_url( home_url( '/service/it-solution' ) ); ?>" class="arrow_link">ITソリューション</a></h3>
                                                <p class="detail">毎日の生活を便利に楽しくするインターネットメディアやアプリを開発しています。</p>
                                                <div class="btn">
                                                    <a href="<?php echo esc_url( home_url( '/service/it-solution' ) ); ?>"><span>MORE</span></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col">
                                        <div class="image_cont">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/front/img_top_service_03.jpg" alt="施工">
                                        </div>
                                        <div class="nav_cont">
                                            <div class="inner">
                                                <p class="service_no">Service 03</p>
                                                <h3><a href="<?php echo esc_url( home_url( '/service/construct' ) ); ?>" class="arrow_link">施工</a></h3>
                                                <p class="detail">地球規模でエコを考える、再生可能エネルギー設備の施工を行っています。</p>
                                                <div class="btn">
                                                    <a href="<?php echo esc_url( home_url( '/service/construct' ) ); ?>"><span>MORE</span></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </article>
                    </section>
                    <!-- サービス END -->

                    <!-- 会社案内 START -->
                    <section class="company">
                        <article>
                            <div class="both_side_line">
                                <div class="bg_box_right bg_gray">
                                    <div class="inner">
                                        <h2 class="ttl">COMPANY<span>会社案内</span></h2>
                                        <h3 class="copy">つながる人との縁を大切に、<br>100年続く企業をめざします</h3>
                                        <p>企業ミッション、トップメッセージ、会社概要、アクセスはこちらから</p>
                                        <div class="btn"><a href="<?php echo esc_url( home_url( '/about' ) ); ?>"><span>MORE</span></a></div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </section>
                    <!-- 会社案内 END -->

                    <!-- お知らせ START -->
                    <section class="news">

                        <article>
                            <div class="both_side_line">

                                <h2 class="ttl center">TOPICS<span>お知らせ</span></h2>

                                <ul>

                                    <?php
                                    // 先頭に固定を取得
                                    $sticky = get_option( 'sticky_posts' );

                                    if ( $sticky && count( $sticky ) > 0 ) :

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

                                    // SQL クリア
                                    wp_reset_postdata();

                                    else :
                                        $sticky = array();
                                    endif;
                                    ?>

                                    <?php
                                    // パラメータ
                                    $args = array(
                                        'post_type'      => 'post',
                                        'post_status'    => 'publish',
                                        'posts_per_page' => 5 - count( $sticky ),
                                        'paged'          => 1,
                                    );

                                    // SQL
                                    $query = new WP_Query( $args );

                                    if ( $query->have_posts() ) :
                                        while ( $query->have_posts() ) : $query->the_post();
                                            if ( ! is_sticky() ) :
                                    ?>

                                    <?php get_template_part( 'part-article' ); ?>

                                    <?php
                                            endif;
                                        endwhile;
                                    else :
                                    ?>

                                    <li>
                                        <dl>
                                            <dt>
                                                <h3>記事は現在ございません。</h3>
                                            </dt>
                                        </dl>
                                    </li>

                                    <?php
                                    endif;

                                    // SQL クリア
                                    wp_reset_postdata();
                                    ?>

                                </ul>

                                <div class="btn">
                                    <a href="<?php echo esc_url( home_url( '/news' ) ); ?>"><span>MORE</span></a>
                                </div>
                            </div>
                        </article>

                    </section>
                    <!-- お知らせ END -->

                    <!-- 採用情報 START -->
                    <section class="recruit">

                        <article>
                            <div class="both_side_line">
                                <div class="bg_box_left">
                                    <div class="inner">
                                        <h2 class="ttl">RECRUIT<span>採用情報</span></h2>
                                        <p>株式会社エンジは、一緒に働く仲間を求めています。<br class="hide_sp">大切なのは、チャレンジする気持ちと成長したいという意欲。<br class="hide_sp">未経験の方も歓迎します。</p>

                                        <div class="btn btn_w">
                                            <a href="<?php echo esc_url( home_url( '/recruit' ) ); ?>"><span>MORE</span></a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </article>

                    </section>
                    <!-- お知らせ END -->

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
