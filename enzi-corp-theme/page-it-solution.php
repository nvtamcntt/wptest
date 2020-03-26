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

                    <h1 class="ttl">IT SOLUTION<span>ITソリューション</span></h1>

                    <!-- パンくずリスト START -->
                    <?php get_template_part( 'breadcrumbs' ); ?>
                    <!-- パンくずリスト END -->
                </div>
            </div>

            <!-- //// PAGE TITLE END //// -->


            <div class="column_1">

                <!-- //// MAIN CONTENT START //// -->

                <main role="main">

                    <!-- 人にやさしい世界を創る、先進のITソリューションを提供 START -->
                    <section class="it_top">

                        <article>

                            <div class="text_cont">
                                <h2 class="ttl_20">人にやさしい世界を創る、先進のITソリューションを提供</h2>
                                <p>ITの最新トレンドを見つめながら、インターネットメディアやアプリを企画、<br class="hide_ssp">開発、運用。これまで培ったマーケティングノウハウを駆使し、時流の変化<br class="hide_ssp">を捉えた分析力で、ユーザーニーズに応えます。</p>
                            </div>

                        </article>
                    </section>
                    <!-- 企業の可能性をひらく、新しい人材ソリューション END -->

                    <!-- iOS・Android向けアプリ開発事業 START -->
                    <section class="it_appli bg_gray">

                        <article>

                            <h2 class="ttl_20 center">iOS・Android向けアプリ開発事業</h2>
                            <p class="narrow_text">たくさんのアプリをインストールしたスマートフォンやタブレットは、今や生活に欠かせないツールの1つ。さまざまなアプリが、ユーザーの毎日を豊かに楽しく彩ります。私たちは、日常に潜むあらゆるニーズを分析し、アプリ開発を行っています。</p>

                            <div class="appli_cont">

                                <div class="row">
                                    <div class="cont">
                                        <div class="image_cont">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/it/img_iphone_01.png" alt="スポトレ">
                                        </div>
                                        <div class="content_cont">
                                            <div class="appli_ttl">
                                                <div class="icon_cont">
                                                    <a href="http://sportrai.com/" target="_blank">
                                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/it/img_icon_01.png" alt="スポトレ">
                                                    </a>
                                                </div>
                                                <h3><a href="http://sportrai.com/" target="_blank">スポトレ</a></h3>
                                            </div>
                                            <p>「スポトレ」は、トレーナーとユーザーをつなぐマッチングアプリです。各種トレーニングの専門知識が豊富なプロのトレーナーが数多く登録。ユーザーは、パーソナルトレーナーのきめ細やかな指導とアドバイスを受けながら、トレーニングが可能になります。ストレスのない操作性と充実した機能が、これからの健康やスポーツの在り方を創造します。</p>
                                            <div class="inner_btns">
                                                <ul class="dl_btn">
                                                    <li class="app_store">
                                                        <a href="https://itunes.apple.com/jp/app/supotore/id1188222609?mt=8" target="_blank">
                                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/it/button_appstore.png" alt="App Store">
                                                        </a>
                                                    </li>
                                                    <li class="google_play">
                                                        <a href="https://play.google.com/store/apps/details?id=com.sportrai&hl=ja" target="_blank">
                                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/it/button_GooglePlay.png" alt="Google Play">
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div class="btn">
                                                    <a href="http://sportrai.com/" target="_blank"><span>「スポトレ」公式サイトへ</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="outer_btns">
                                        <ul class="dl_btn">
                                            <li class="app_store">
                                                <a href="https://itunes.apple.com/jp/app/supotore/id1188222609?mt=8" target="_blank">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/it/button_appstore.png" alt="App Store">
                                                </a>
                                            </li>
                                            <li class="google_play">
                                                <a href="https://play.google.com/store/apps/details?id=com.sportrai&hl=ja" target="_blank">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/it/button_GooglePlay.png" alt="Google Play">
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="btn">
                                            <a href="http://sportrai.com/" target="_blank"><span>「スポトレ」公式サイトへ</span></a>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="row">
<div class="cont">
<div class="image_cont">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/it/img_iphone_02.png" alt="アプリ名">
</div>
<div class="content_cont">
<div class="appli_ttl">
<div class="icon_cont">
<a href="" target="_blank">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/it/img_icon_02.png" alt="アプリ名">
</a>
</div>
<h3><a href="" target="_blank">アプリ名</a></h3>
</div>
<p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト※150字程度</p>
<div class="inner_btns">
<ul class="dl_btn">
<li class="app_store">
<a href="" target="_blank">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/it/button_appstore.png" alt="App Store">
</a>
</li>
<li class="google_play">
<a href="" target="_blank">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/it/button_GooglePlay.png" alt="Google Play">
</a>
</li>
</ul>
<div class="btn">
<a href="" target="_blank"><span>「」公式サイトへ</span></a>
</div>
</div>
</div>
</div>
<div class="outer_btns">
<ul class="dl_btn">
<li class="app_store">
<a href="" target="_blank">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/it/button_appstore.png" alt="App Store">
</a>
</li>
<li class="google_play">
<a href="" target="_blank">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/it/button_GooglePlay.png" alt="Google Play">
</a>
</li>
</ul>
<div class="btn">
<a href="" target="_blank"><span>「」公式サイトへ</span></a>
</div>
</div>-->
                            </div> 


                        </article>
                    </section>
                    <!-- iOS・Android向けアプリ開発事業 END -->

                    <!-- インターネットメディア開発事業 START -->
                    <section class="it_media bg_gray">

                        <article>

                            <h2 class="ttl_20 center">インターネットメディア開発事業</h2>
                            <p class="narrow_text">時間も場所も問わないインターネットの世界で、Webサイトを訪れるユーザーの、まだ言語化されていないニーズまでも捉える、顧客視点のマーケティングを展開。最新のデータを的確に分析し、幅広いユーザーのニーズを満たす、満足度の高いコンテンツを制作します。また、モバイルの利便性にも注目。ユーザーが利用しやすい、モバイルフレンドリーなWebデザインにも力を入れています。</p>

                            <div class="media_cont">

                                <div class="row">
                                    <div class="image_cont">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/it/img_pc_01.png" alt="らくらくペイント">
                                    </div>
                                    <div class="content_cont">
                                        <h3><a href="https://paint.enzi.co.jp/" target="_blank">らくらくペイント</a></h3>
                                        <p>「らくらくペイント」は、厳選した外壁塗装業者と、外壁塗装を考えているユーザーをつなぐサービスです。私たちの厳しい審査基準をクリアした優良業者だけを登録し、ユーザーの要望をかなえる最適な業者をご紹介することで、高品質な外壁塗装を納得価格でお届けします。見積もり依頼から発注までインターネット上でできるので、業者選びや見積もりの比較など、ユーザーの負担を限りなく軽くします。</p>

                                        <div class="btn">
                                            <a href="https://paint.enzi.co.jp/" target="_blank"><span>「らくらくペイント」公式サイトへ</span></a>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="row">
<div class="image_cont">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/it/img_pc_02.png" alt="サービス名">
</div>
<div class="content_cont">
<h3><a href="" target="_blank">サービス名</a></h3>
<p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト※150字程度</p>

<div class="btn">
<a href="" target="_blank"><span>〇〇公式サイトへ</span></a>
</div>
</div>-->
                            </div> 

                        </article>
                    </section>
                    <!-- インターネットメディア開発事業 END -->


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