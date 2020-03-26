<!DOCTYPE html>
<html lang="ja">

<?php get_header(); ?>

<body class="drawer">
    <?php get_sidebar(); ?>

    <!-- //// ALL START //// -->

    <!-- classにコンテンツディレクトリを付与する -->
    <div id="container" class="article service">


        <!-- //// HEADER START //// -->
        <?php get_sidebar('header'); ?>
        <!-- //// HEADER END //// -->


        <!-- //// PAGE TITLE START //// -->

        <div class="ttl">

            <div class="ttl_inner">

                <h1 class="ttl">HUMAN RESOURCES SOLUTION<span>人材ソリューション</span></h1>

                <!-- パンくずリスト START -->
                <?php get_template_part('breadcrumbs'); ?>
                <!-- パンくずリスト END -->
            </div>
        </div>

        <!-- //// PAGE TITLE END //// -->


        <div class="column_1">

            <!-- //// MAIN CONTENT START //// -->

            <main role="main">

                <!-- 企業の可能性をひらく、新しい人材ソリューション START -->
                <section class="human_top">

                    <article>

                        <div class="text_cont">
                            <h2 class="ttl_20">企業の可能性をひらく、新しい人材ソリューション</h2>
                            <p>優秀な人材の確保は、企業の将来に深く関わる大切なミッションです。<br class="hide_ssp">私たちは、人と企業の縁を結び、その可能性を未来にひらくお手伝いを<br class="hide_ssp">いたします。</p>
                        </div>

                    </article>
                </section>
                <!-- 企業の可能性をひらく、新しい人材ソリューション END -->

                <!-- グローバル人材が企業の未来をひらく START -->
                <section class="human_impression with_line">

                    <article>

                        <div class="both_side_line">

                            <div class="impression_layout image_text">
                                <div class="image_cont">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/human/img_human_02_01.jpg" alt="グローバル人材が企業の未来をひらく">
                                </div>
                                <div class="text_cont">
                                    <div class="box">
                                        <h2 class="ttl_20">グローバル人材が企業の未来をひらく</h2>
                                        <p>今、日本が抱えるもっとも気がかりな問題の1つが少子高齢化からくる人材不足です。</p>
                                        <p>日本の人口はこのまま進めば、2030年には65歳以上の高齢者が人口の3割を超え、さらに、2060年には人口は2010年と比較して3割減となることが予想されており、労働力人口は目に見えて減っていきます。人材が不足すると、企業の成長や発展は望めず、今後、企業に期待されている国際競争力の強化もままならない状況に陥ってしまいます。</p>
                                    </div>
                                </div>
                            </div>

                            <div class="impression_layout text_image">
                                <div class="text_cont">
                                    <div class="box">
                                        <p>こうした中で、今注目を集めているのがグローバル人材です。日本で働く意欲を持ち、語学はもちろん各分野において高度スキルを持つグローバル人材は、日本企業の人手不足を補うだけではなく、国際競争力を高めるための戦力としても期待できる知識と能力を秘めています。</p>
                                        <p>私たちは、多様化する人材ニーズをいち早くとらえ、世界的なフィールドで活躍できるグローバル人材を獲得し、人材不足に悩む企業にご紹介しています。企業の成長に欠かせない、優秀なグローバル人材との縁を結び、日本企業の発展に貢献していきます。</p>
                                    </div>
                                </div>
                                <div class="image_cont">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/human/img_human_02_02.jpg" alt="グローバル人材が企業の未来をひらく">
                                </div>
                            </div>

                        </div>

                    </article>
                </section>
                <!-- グローバル人材が企業の未来をひらく END -->

                <!-- 今、ベトナムの人材に注目 START -->
                <!-- <section class="human_table bg_gray">
                    <article>

                        <h2 class="ttl_20 center">今、ベトナムの人材に注目</h2>
                        <p>各国のグローバル人材のなかでも、私たちが注目しているのはベトナム人です。ベトナムは親日家が多い国としても有名で、その国民性は穏やかでまじめ。日本人との相性も良く、公私に渡って良好な関係を築くことができます。また、教育水準も高く勉強熱心で、日本で就職を目指す場合には、大学在学中から自己負担で日本語学校に通っている人がほとんどです。目的意識も高いので、熱心に勉強を続けて、日本や職場に馴染む努力も惜しみません。</p>

                        <div class="table_cont">
                            <table>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>ベトナム人</th>
                                        <th>中国人</th>
                                        <th>インド人</th>
                                        <th>フィリピン人</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>語学：日本語</th>
                                        <td><span class="double_circle"></span></td>
                                        <td><span class="double_circle"></span></td>
                                        <td><span class="triangle"></span></td>
                                        <td><span class="circle"></span></td>
                                    </tr>
                                    <tr>
                                        <th>語学：英語</th>
                                        <td><span class="triangle"></span></td>
                                        <td><span class="circle"></span></td>
                                        <td><span class="double_circle"></span></td>
                                        <td><span class="double_circle"></span></td>
                                    </tr>
                                    <tr>
                                        <th>技術力</th>
                                        <td><span class="circle"></span></td>
                                        <td><span class="double_circle"></span></td>
                                        <td><span class="double_circle"></span></td>
                                        <td><span class="triangle"></span></td>
                                    </tr>
                                    <tr>
                                        <th>日本文化との親和性</th>
                                        <td><span class="double_circle"></span></td>
                                        <td><span class="circle"></span></td>
                                        <td><span class="triangle"></span></td>
                                        <td><span class="circle"></span></td>
                                    </tr>
                                    <tr>
                                        <th>柔軟性</th>
                                        <td><span class="double_circle"></span></td>
                                        <td><span class="triangle"></span></td>
                                        <td><span class="triangle"></span></td>
                                        <td><span class="circle"></span></td>
                                    </tr>
                                    <tr>
                                        <th>適応力</th>
                                        <td><span class="double_circle"></span></td>
                                        <td><span class="triangle"></span></td>
                                        <td><span class="triangle"></span></td>
                                        <td><span class="circle"></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </article>
                    
                </section> -->
                <!-- 今、ベトナムの人材に注目 END -->


                <!-- 人材確保から採用までをフルサポート START -->


                <section class="human_support bg_gray">
                    <article>

                        <h2 class="ttl_20 center">人材確保から採用までをフルサポート</h2>
                        <p class="narrow_text">私たちは、海外の拠点と日本オフィスのシームレスな連携により、優秀なグローバル人材の確保から日本企業とのマッチング、アフターフォローまで、すべてのプロセスをていねいにサポートします。</p>

                        <div class="support_cont">

                            <div class="col">
                                <div class="icon_cont">
                                    <img class="tall" src="<?php echo get_template_directory_uri(); ?>/assets/img/common/icon/icon_user.png" alt="リクルート">
                                </div>
                                <h3>リクルート</h3>
                                <p>グローバル人材の募集や選考は、弊社と提携のある現地の大学や日本語学校とオンラインで行っています。直接提携しているので、優秀で勤勉なグローバル人材を優先的に推薦いたします。</p>
                                
                            </div>

                            <div class="col">
                                <div class="icon_cont">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/icon/icon_head.png" alt="教育">
                                </div>
                                <h3>教育</h3>
                                <p>ビザ申請の待機期間中に現地オフィスで、日本語教育と日本で通用するビジネスマナーや職種に応じた技能教育を行います。就業時には、即戦力となる教育を実践します。</p>

                            </div>

                            <div class="col">
                                <div class="icon_cont">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/icon/icon_team.png" alt="安心のサポート">
                                </div>
                                <h3>安心のサポート</h3>
                                <p>面接のセッティングから採用の決定、入国までフルにサポートいたします。また、採用決定後もケア＆サポートを実施。社内マニュアルや工程表などの翻訳、在日スタッフのよる在留中のケアなども行います。</p>
                            </div>

                            <div class="col">
                                <div class="icon_cont">
                                    <img class="wide" src="<?php echo get_template_directory_uri(); ?>/assets/img/common/icon/icon_handshake.png" alt="マッチング">
                                </div>
                                <h3>マッチング</h3>
                                <p>グローバル人材の採用には、疑問がつきものです。私たちはお客様とグローバル人材とのマッチングサイトをご用意し、御社の要望に最適な人材とのご縁をつなぎます。</p>
                            </div>

                        </div>
                    </article>
                </section>

                <!-- 人材確保から採用までをフルサポート END -->


                <!-- ベトナム人スタッフの声 START -->
                <section class="human_voice with_line">

                    <article>

                        <div class="both_side_line border_bottom">

                            <h2 class="ttl_20 center">ベトナム人スタッフの声</h2>
                            <p class="narrow_text">私たちの会社には、すでに来日2年以上になるベトナム人スタッフがたくさん働いています。大切な戦力として活躍する彼らの声をご紹介します。</p>

                            <div class="voice_cont">

                                <!-- <div class="row">
                                    <div class="image_cont">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/human/img_human_voice_01.png" alt="レー・ドゥケ・トゥアン IT部 勤続2年">
                                    </div>
                                    <div class="text_cont">
                                        <p>情報技術エンジニアとして、2年前からエンジで働いています。優れたマネージャーになることを目標に、新しい技術の習得と日本語を向上させるため、毎日がんばって勉強を続けています。</p>
                                        <p>エンジは、フレンドリーでダイナミックな環境で、目標を達成するためのやる気を引き出してくれる職場です。</p>
                                        <p class="name">レー・ドゥケ・トゥアン IT部 勤続2年</p>
                                    </div>
                                </div> -->

                                <div class="row">
                                    <div class="image_cont">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/human/img_human_voice_02.png" alt="レ・コン・クオン 施工部 勤続１年">
                                    </div>
                                    <div class="text_cont">
                                        <p>日本で経験豊富なマネージャーになることを目標に、１年前からエンジで働いています。</p>
                                        <p>エンジは、私達にとても親切で働きやすい職場です。日本人の先輩から沢山の技術の習得と日本語を教えてもらっています。そんなエンジのメンバーになれたことに幸運を感じています。</p>
                                        <p class="name">レ・コン・クオン 施工部 勤続１年</p>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </article>

                </section>
                <!-- ベトナム人スタッフの声 END -->


                <!-- 拠点紹介 START -->
                <!--                    <section class="human_base with_line">-->
                <!---->
                <!--                        <article>-->
                <!---->
                <!--                            <div class="both_side_line padding_tall">-->
                <!---->
                <!--                                <h2 class="ttl_20 center">拠点紹介</h2>-->
                <!---->
                <!--                                <div class="base_access">-->
                <!---->
                <!--                                    <div class="col">-->
                <!--                                        <h3>現地（ベトナム）オフィス</h3>-->
                <!--                                        <p>TEL: 044-750-8640<br>-->
                <!--                                            FAX: 044-750-8641<br>-->
                <!--                                            Mail: info@enzi.co.jp<br>-->
                <!--                                            url: https://enzi.co.jp<br>-->
                <!--                                            神奈川県川崎市宮前区鷺沼3丁目2-9　鷺沼センタービル6F</p>-->
                <!--                                        <div class="iframe_cont">-->
                <!--                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3244.933212626489!2d139.57017465084127!3d35.58004024302531!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018f6fcc8ade5cf%3A0xa5ec4afdf9c77b5e!2z44CSMjE2LTAwMDQg56We5aWI5bed55yM5bed5bSO5biC5a6u5YmN5Yy66be65rK877yT5LiB55uu77yS4oiS77yZ!5e0!3m2!1sja!2sjp!4v1553072730960" width="100%" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>-->
                <!--                                        </div>-->
                <!--                                    </div>-->
                <!---->
                <!--                                    <div class="col">-->
                <!--                                        <h3>日本オフィス</h3>-->
                <!--                                        <p>TEL: 044-750-8640<br>-->
                <!--                                            FAX: 044-750-8641<br>-->
                <!--                                            Mail: info@enzi.co.jp<br>-->
                <!--                                            url: https://enzi.co.jp<br>-->
                <!--                                            神奈川県川崎市宮前区鷺沼3丁目2-9　鷺沼センタービル6F</p>-->
                <!--                                        <div class="iframe_cont">-->
                <!--                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3244.933212626489!2d139.57017465084127!3d35.58004024302531!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018f6fcc8ade5cf%3A0xa5ec4afdf9c77b5e!2z44CSMjE2LTAwMDQg56We5aWI5bed55yM5bed5bSO5biC5a6u5YmN5Yy66be65rK877yT5LiB55uu77yS4oiS77yZ!5e0!3m2!1sja!2sjp!4v1553072730960" width="100%" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>-->
                <!--                                        </div>-->
                <!--                                    </div>-->
                <!---->
                <!--                                </div>-->
                <!---->
                <!--                            </div>-->
                <!--                        </article>-->
                <!---->
                <!--                    </section>-->
                <!-- 拠点紹介 END -->

                <!-- ご紹介までの流れ START -->
                <!--
                    <section class="human_flow bg_gray">

                        <article>

                            <h2 class="ttl_20 center">ご紹介までの流れ</h2>
                            <p class="narrow_text">お客様からのリクエストから始まるベトナム人材の採用。アフターフォローまでの流れをご紹介します。</p>

                            <div class="fig_cont">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/human/fig_human_flow.png" alt="ご紹介までの流れ" class="hide_sp">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/human/fig_human_flow_sp.png" alt="ご紹介までの流れ" class="hide_pc">
                            </div>

                        </article>

                    </section>
-->
                <!-- ご紹介までの流れ END -->


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