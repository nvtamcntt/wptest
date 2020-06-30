<!DOCTYPE html>
<html lang="ja">

<?php get_header(); ?>

<body class="drawer">
    <?php get_sidebar(); ?>

    <!-- //// ALL START //// -->

    <!-- classにコンテンツディレクトリを付与する -->
    <div id="container" class="article company">


        <!-- //// HEADER START //// -->
        <?php get_sidebar('header'); ?>
        <!-- //// HEADER END //// -->


        <!-- //// PAGE TITLE START //// -->

        <div class="ttl">

            <div class="ttl_inner">

                <h1 class="ttl">COMPANY<span>会社案内</span></h1>

                <!-- パンくずリスト START -->
                <?php get_template_part('breadcrumbs'); ?>
                <!-- パンくずリスト END -->
            </div>
        </div>

        <!-- //// PAGE TITLE END //// -->


        <div class="column_1">

            <!-- //// MAIN CONTENT START //// -->

            <main role="main">

                <!-- 100年続く、企業をめざして START -->
                <section class="company_top">

                    <article>

                        <div class="text_cont">
                            <h2 class="ttl_20">100年続く、企業をめざして</h2>
                            <p>毎日の生活にも、ビジネスのなかにも、尽きることなくある、「あったらい<br class="hide_ssp">いな」。私たちは、たくさんの人が発信する、「あったらいいな」に応える<br class="hide_ssp">事業を展開しています。つながる人との縁を大切に、みんなが幸せにな<br class="hide_ssp">る社会をめざしています。</p>
                        </div>

                    </article>
                </section>
                <!-- 企業の可能性をひらく、新しい人材ソリューション END -->

                <!-- 当社が大切にしていること START -->
                <section class="company_importances bg_gray">

                    <article>

                        <h2 class="ttl_20 center">当社が大切にしていること</h2>
                        <p class="narrow_text">私たちは、お客さまが求める真の価値と社会・経済の変化に柔軟に対応し、常に顧客満足を追求しながら最高のサービスを永続的に開発し、お客様から信用され必要とされることで永続的に成長できる企業であり続けます。</p>

                        <div class="importances_2col">
                            <div class="text_cont">

                                <div class="cont">
                                    <h3>挑戦（Challenge)</h3>
                                    <p>時代の変化を恐れず、スピードと行動力を重視し、お客様にとって最良かつ最適な商品・サービスを提供し続けます。</p>
                                </div>

                                <div class="cont">
                                    <h3>やりぬく力（Grit)</h3>
                                    <p>お客様が求めるニーズ、社会にとって価値のある商品・サービスを具現化するまで努力を厭わずやりぬく力を発揮し続けます。</p>
                                </div>

                                <div class="cont">
                                    <h3>創造性（Creativity）</h3>
                                    <p>幅広い視野を持ち、時代の一歩先を見据えた先見性を養いながら、常に時代やお客様のニーズに最適な商品・サービスを創造し続けます。</p>
                                </div>

                                <div class="cont">
                                    <h3>顧客志向（Customer Oriented）</h3>
                                    <p>お客様のニーズこそがスタートライン。私たちは、ニーズに応える価値あるサービスで社会に貢献し、笑顔を届けます。</p>
                                </div>

                                <div class="cont">
                                    <h3>チームワーク（Teamwork）</h3>
                                    <p>私たちは、社員一人ひとりが持てる力を存分に発揮し、互いに助け合い、強みをさらに強化するチームワークで仕事に取り組みます。</p>
                                </div>

                                <div class="cont">
                                    <h3>当たり前に感謝（Grateful）</h3>
                                    <p>たくさんの人が支える “当たり前”。私たちは、“当たり前”が当たり前であるしあわせに気づき、感謝します。</p>
                                </div>

                                <div class="cont">
                                    <h3>仲間を尊重（Respect)</h3>
                                    <p>お客様を大切にするはじめの一歩。それは、もっとも身近な仲間を尊重し、大切にすることから始まります。</p>
                                </div>

                                <div class="cont">
                                    <h3>楽しみの追求（Enjoyment）</h3>
                                    <p>お客様の生活やビジネスにとって有意義かつ楽しみ甲斐のある商品・サービスの開発を思う存分楽しむ企業であり続けます。</p>
                                </div>

                            </div>
                            <div class="image_cont hide_sp">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/about/fig_company_importances.png" alt="当社が大切にしていること">
                            </div>
                        </div>
                    </article>
                </section>
                <!-- 当社が大切にしていること END -->

                <!-- 社長挨拶 START -->
                <section class="company_greeting with_line">

                    <article>

                        <div class="both_side_line">

                            <div class="image_cont">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/about/img_company_greeting.jpg" alt="社長挨拶">
                            </div>

                            <div class="text_cont">
                                <h2 class="ttl_20">社長挨拶</h2>

                                <p>株式会社エンジは、現在3つの事業を手がけています。創業当初から主軸であった、地球規模でエコを考える再生可能エネルギー設備の施工事業、世界をつなぐインターネットを利用して人々の生活を豊かに楽しくするITソリューション事業、そして新しくスタートしたばかりの人手不足の日本企業とグローバル人材をつなぐ人材ソリューション事業。どの事業も人と企業のニーズを満たすと同時に、社会に貢献する事業です。</p>
                                <p>3つの事業は、人との出会いから生まれました。特に新しくスタートした人材ソリューション事業は、当社の人手不足を補うために採用したベトナム人材との出会いがきっかけです。彼らのまじめな人柄と意欲的に仕事へ取り組む姿勢は、日本企業の人手不足の悩みを解決するだけでなく、国際競争力を強化することにも役立つと感じたからです。すでにグローバル人材を企業の力としていく時代が始まっています。</p>
                                <p>社名である「エンジ」は、「縁事」という言葉を読みやすくカタカナにしたものです。この名前どおり、当社は人との縁に導かれてニーズと出会い、それを社会に貢献する形で事業化することで発展してきました。</p>
                                <p>縁でつながるのは、社員も同じです。社員の力があってこそ、当社はここまで成長することができたといえます。やり抜く力を持つ社員とともに、社会に貢献する事業をこの先も展開していく。100年続く、企業をめざし、つながる人との縁を大切に、みんなが幸せになる企業として成長し続けていきます。</p>
                                <div class="name company_manager_content">
                                    <p class="company_manager_position">株式会社エンジ<br>代表取締役</p>
                                    <p class="company_manager_name"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/about/img_company_sign.png" alt="髙梨 海"></p>
                                </div>

                            </div>

                        </div>
                    </article>

                </section>
                <!-- 社長挨拶 END -->


                <!-- 会社概要 START -->
                <section class="company_outline with_line">

                    <article>

                        <div class="both_side_line">
                            <h2 class="ttl_20 center">会社概要</h2>

                            <div class="table_cont">
                                <table>

                                    <tr>
                                        <th>企業名</th>
                                        <td>株式会社エンジ ENZI Co.,Ltd.</td>
                                    </tr>

                                    <tr>
                                        <th>代表取締役社長</th>
                                        <td>髙梨 海</td>
                                    </tr>

                                    <tr>
                                        <th>設立</th>
                                        <td>2013年</td>
                                    </tr>

                                    <tr>
                                        <th>資本金</th>
                                        <td>1,000万円</td>
                                    </tr>

                                    <tr>
                                        <th>事業内容</th>
                                        <td>人材ソリューション事業、IT事業、住宅設備施工事業</td>
                                    </tr>

                                    <tr>
                                        <th>許認可等</th>
                                        <td>建設業許可 神奈川県知事許可（般-1）第86848号<br>
                                            有料職業紹介事業 許可番号 14-ユ-301424</td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </article>

                </section>
                <!-- 会社概要 END -->

                <!-- アクセス START -->
                <section class="company_access with_line">

                    <article>

                        <div class="both_side_line">

                            <h2 class="ttl_20 center">アクセス</h2>

                            <div class="base_access">

                                <div class="col">
                                    <h3>市が尾オフィス</h3>
                                    <p>TEL:045-277-1515<br>
                                        FAX:045-277-1516<br>
                                        神奈川県横浜市青葉区市ケ尾町111-2</p>
                                    <div class="iframe_cont">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3246.534208674485!2d139.54112651551458!3d35.54050668022736!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018f7eb58b7cab7%3A0x7b39ac98107bdad3!2z44CSMjI1LTAwMjQg56We5aWI5bed55yM5qiq5rWc5biC6Z2S6JGJ5Yy65biC44Kx5bC-55S677yR77yR77yR4oiS77yS!5e0!3m2!1sja!2sjp!4v1553227881688" width="100%" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>
                                    </div>
                                    <p>徒歩:東急田園都市線「市ヶ尾駅」より15分<br>
                                        バス:市ヶ尾駅より【東急バス市03系統 新横浜駅行き】<br>
                                        または【市43系統 中山駅行き】で約7分、「下根」バス停降車すぐ。降車すると目の前にセブンイレブンが御座いますので車道を挟んだ向かい側が事務所になります。<br>
                                        <br>
                                        お帰りの際のバス停は、市ヶ尾駅方面に向かって徒歩1分程度の所にございます。</p>
                                </div>

                                <div class="col">
                                    <h3>鷺沼オフィス</h3>
                                    <p>TEL:044-750-8640（代表）<br>TEL:044-873-8685（人材関連受付窓口）<br>
                                        FAX:044-750-8641<br>
                                        神奈川県川崎市宮前区鷺沼3丁目2-9　鷺沼センタービル6F</p>
                                    <div class="iframe_cont">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3244.933212626489!2d139.57017465084127!3d35.58004024302531!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018f6fcc8ade5cf%3A0xa5ec4afdf9c77b5e!2z44CSMjE2LTAwMDQg56We5aWI5bed55yM5bed5bSO5biC5a6u5YmN5Yy66be65rK877yT5LiB55uu77yS4oiS77yZ!5e0!3m2!1sja!2sjp!4v1553072730960" width="100%" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>
                                    </div>
                                    <p>徒歩:地下鉄 東急田園都市線「鷺沼駅」より徒歩2分</p>
                                </div>

                            </div>

                        </div>
                    </article>

                </section>
                <!-- 拠点紹介 END -->

                <!-- 沿革 START -->
                <section class="company_history with_line">

                    <article>

                        <div class="both_side_line">
                            <h2 class="ttl_20">沿革</h2>

                            <div class="table_cont">
                                <table>
                                    <tr>
                                        <th>2019年6月</th>
                                        <td>人材ソリューション部門設立</td>
                                    </tr>

                                    <tr>
                                        <th>2018年3月</th>
                                        <td>ITソリューション部門を神奈川県川崎市宮前区鷺沼3丁目2-9に移転</td>
                                    </tr>

                                    <tr>
                                        <th>2015年6月</th>
                                        <td>会社を神奈川県横浜市青葉区市ケ尾町111-2に移転</td>
                                    </tr>

                                    <tr>
                                        <th>2014年12月</th>
                                        <td>社名を株式会社エンジに変更</td>
                                    </tr>

                                    <tr>
                                        <th>2014年9月</th>
                                        <td>ITソリューション部門設立</td>
                                    </tr>

                                    <tr>
                                        <th>2013年8月</th>
                                        <td>リベラルエンジニアリング株式会社法人化</td>
                                    </tr>

                                    <tr>
                                        <th>2011年4月</th>
                                        <td>震災後太陽光発電の販売・施工開始</td>
                                    </tr>

                                    <tr>
                                        <th>2010年</th>
                                        <td>オール電化などの販売・設置などを行う。</td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </article>

                </section>
                <!-- 沿革 END -->

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