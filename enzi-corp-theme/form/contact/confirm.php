<!DOCTYPE html>
<html lang="ja">
    
    <?php get_header(); ?>
    
    <body class="drawer">
        <?php get_sidebar(); ?>

        <!-- //// ALL START //// -->

        <!-- classにコンテンツディレクトリを付与する -->
        <div id="container" class="article form">


            <!-- //// HEADER START //// -->
            <?php get_sidebar( 'header' ); ?>
            <!-- //// HEADER END //// -->


            <!-- //// PAGE TITLE START //// -->

            <div class="ttl">

                <div class="ttl_inner">

                    <h1 class="ttl">CONTACT<span>お問い合わせ（確認）</span></h1>

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

                            <div class="center">
                                <h2 class="ttl">メールフォームからのお問い合わせ</h2>
                            </div>

                        </article>

                        <div class="flow_nav">
                            <ul class="confirm">
                                <li><span>1 入力</span></li>
                                <li><span>2 確認</span></li>
                                <li><span>3 完了</span></li>
                            </ul>
                        </div>

                        <!-- FORM START -->
                        <div id="fm_form">

                            <?php get_template_part( 'form/contact/part-confirm' ); ?>
                            
                        </div>	
                        <!-- FORM END -->

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