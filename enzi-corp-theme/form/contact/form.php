<!DOCTYPE html>
<html lang="ja">

<?php get_header(); ?>

<body class="drawer">
    <?php get_sidebar(); ?>

    <!-- //// ALL START //// -->

    <!-- classにコンテンツディレクトリを付与する -->
    <div id="container" class="article form">


        <!-- //// HEADER START //// -->
        <?php get_sidebar('header'); ?>
        <!-- //// HEADER END //// -->


        <!-- //// PAGE TITLE START //// -->

        <div class="ttl">

            <div class="ttl_inner">

                <h1 class="ttl">CONTACT<span>お問い合わせ</span></h1>

                <!-- パンくずリスト START -->
                <?php get_template_part('breadcrumbs'); ?>
                <!-- パンくずリスト END -->
            </div>
        </div>

        <!-- //// PAGE TITLE END //// -->

        <div class="column_1">

            <!-- //// MAIN CONTENT START //// -->

            <main role="main">

                <section class="section_head">
                    <article>
                        <h2 class="ttl">お電話でのお問い合わせ</h2>
                        <p>お電話でのお問い合わせもお受けしております。</p>

                        <div class="tel">
                            <a href="tel:044-750-8640" class="tel_anchor">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/article/img_phone-number.png" alt="044-750-8640" class="image_tel">
                            </a>
                            <span class="human_number">[人材関連受付窓口：<span>044-873-8685</span>]</span>
                            <span>受付時間:午前9時より午後6時</span>
                        </div>
                    </article>
                </section>

                <!-- CONTENTS START -->
                <section>
                    <article>

                        <div class="center">
                            <h2 class="ttl">メールフォームからのお問い合わせ</h2>
                            <p class="head"><span class="essential">必須</span>は必須項目です。弊社へお問い合わせいただく方は、<a href="<?php echo esc_url(home_url('/privacy')); ?>" target="_blank">個人情報の取り扱いについて</a>を必ずお読みください。</p>
                        </div>

                    </article>

                    <div class="flow_nav form_top" id="form_top">
                        <ul class="front">
                            <li><span>1 入力</span></li>
                            <li><span>2 確認</span></li>
                            <li><span>3 完了</span></li>
                        </ul>
                    </div>


                    <!-- FORM START -->
                    <div id="fm_form">

                        <?php get_template_part('form/contact/part-form'); ?>

                    </div>
                    <!-- FORM END -->

                </section>
                <!-- CONTENTS END -->

                <!-- CTA END -->
                <?php get_template_part('part-contact'); ?>
                <!-- CTA END -->

            </main>

            <!-- //// MAIN CONTENT END //// -->

        </div>

        <!-- //// FOOTER START //// -->
        <?php get_sidebar('footer'); ?>
        <!-- //// FOOTER END //// -->


    </div>

    <!-- //// ALL END //// -->


    <?php get_footer(); ?>
</body>

</html>