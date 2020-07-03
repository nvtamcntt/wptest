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

                <!-- ヘッダー START -->
                <section class="human_top">
                    <article>
                        <div class="text_cont">
                            <h2 class="ttl_20">企業の可能性をひらく、<span class="nowrap">新しい人材ソリューション</span></h2>
                            <p>優秀な人材の確保は、企業の将来に深く関わる大切なミッションです。<br class="hide_ssp">私たちは、人と企業の縁を結び、その可能性を未来にひらくお手伝いを<br class="hide_ssp">いたします。</p>
                        </div>
                    </article>
                </section>
                <!-- ヘッダー END -->

                <!-- ページ内リンク START -->
                <section class="with_line btn_human">
                    <article>
                        <div class="both_side_line btn_human_wrap">
                            <a href="#human_woman" clas="butn_human_woman">
                                <div class="btn_icon icon_woman"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/human/icon_woman.png" alt=""></div>
                                <h2 class="btn_human_title">女性のキャリア形成<span class="nowrap">サポート部門</span></h2>
                                <!-- <p class="more">詳しく見る</p> -->
                            </a>
                            <a href="#human_global" class="btn_human_global">
                                <div class="btn_icon icon_human"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/human/icon_human.png" alt=""></div>
                                <h2 class="btn_human_title">グローバル人材<span class="nowrap">採用部門</span></h2>
                                <!-- <p class="more">詳しく見る</p> -->
                            </a>
                        </div>
                    </article>
                </section>
                <!-- ページ内リンク END -->


                <!-- 女性のキャリア形成サポート START -->
                <section class="human_impression with_line">
                    <article>
                        <div class="both_side_line">

                            <div id="human_woman" class="impression_title_wrap">
                                <h2 class="impression_title">女性のキャリア形成サポート</h2>
                            </div>

                            <div class="impression_layout image_text">
                                <div class="image_cont">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/human/img_human_02_01.jpg" alt="女性の活躍が日本の未来を変える">
                                </div>
                                <div class="text_cont">
                                    <div class="box">
                                        <h3 class="ttl_20">女性の活躍が<span class="nowrap">日本の未来を変える</span></h3>
                                        <p>日本の人手不足、人材不足をカバーするだけでなく、未来を変える原動力となると期待されているのが女性のパワーです。</p>
                                        <p>今や、多くの女性が生涯を通じて、仕事を持つことが当たり前になりました。仕事は自己実現の一つであり、働く・働かないといった基本的なことから職種まで、誰もが自由に選ぶ権利を持っています。この道筋を社会に開いたのは、1985年に制定された「雇用の分野における男女の均等な機会及び待遇の確保等に関する法律」、いわゆる男女雇用機会均等法です。1986年に施行され、その後、改正を繰り返して、女性が仕事をする権利は男性と同等となっていきました。また、母性の保護も規定され、出産や育児はキャリアを阻むものではなくなりました。法律的には女性の働く環境はどんどん良くなっているのです。</p>
                                    </div>
                                </div>
                            </div>

                            <div class="impression_layout text_image">
                                <div class="text_cont">
                                    <div class="box">
                                        <p>ところが現実は、どうでしょうか？結婚や出産を機に仕事を手放したり、家族の都合を優先してキャリアをあきらめたりする女性がいまだにあとを絶ちません。</p>
                                        <p>これでは、あまりにももったいない。女性もまた、ライフイベントをキャリアを積む障害にせず、自分の目標に合わせたキャリア形成を考えることが当たり前であるべきです。私たちは、女性が自らの力で輝く場所をつかむサポートをします。</p>
                                    </div>
                                </div>
                                <div class="image_cont">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/human/img_human_02_02.jpg" alt="女性の活躍が日本の未来を変える">
                                </div>
                            </div>

                        </div>

                    </article>
                </section>
                <!-- 女性のキャリア形成サポート END -->


                <!-- 的確なマッチングで働く人と企業の未来に希望を START -->
                <section class="human_support bg_gray">
                    <article>

                        <h3 class="ttl_20 center">的確なマッチングで<span class="nowrap">働く人と企業の未来に希望を</span></h3>
                        <p class="narrow_text">仕事に対する価値観は、一人ひとり違うもの。だから、長期的な目線で希望と適性に合わせたキャリア形成をサポート。企業の経営戦略に適した人材をマッチングし、働く人と企業が豊かな未来を築くお手伝いをします。</p>

                        <div class="support_summary">
                            <img class="summary_img" src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/human/summary_woman.png" alt="キャリア形成サポート">
                        </div>

                        <div class="support_cont">
                            <div class="col">
                                <!-- <div class="icon_cont">
                                    <img class="tall" src="<?php echo get_template_directory_uri(); ?>/assets/img/common/icon/icon_user.png" alt="キャリア形成サポート">
                                </div> -->
                                <h4><span class="nowrap">キャリア形成</span><span class="nowrap">サポート</span></h4>
                                <p>働く意欲はあっても、人生のなかでどう仕事と関わっていくかを長期的なスパンで考えている人は、あまり多くはありません。私たちは、働く人一人ひとりの要望と適正に合わせて、キャリア形成のサポートを行います。</p>

                            </div>

                            <div class="col">
                                <!-- <div class="icon_cont">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/icon/icon_head.png" alt="マッチング">
                                </div> -->
                                <h4>マッチング</h4>
                                <p>働く人にとっては、実現したいと考えるキャリア形成に適した企業を、企業にとっては、経営戦略に基づく採用・教育計画に沿った人材を。働く人と企業が輝かしい未来を実現するマッチングを行います。</p>

                            </div>

                            <div class="col">
                                <!-- <div class="icon_cont">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/icon/icon_team.png" alt="経営戦略を共有">
                                </div> -->
                                <h4>経営戦略を共有</h4>
                                <p>人材は、企業の未来を左右する大切なファクターです。経営戦略に基づく人材の採用・教育計画を共有することで、企業の未来を担うにふさわしい人材をマッチングします。</p>
                            </div>

                            <div class="col">
                                <!-- <div class="icon_cont">
                                    <img class="wide" src="<?php echo get_template_directory_uri(); ?>/assets/img/common/icon/icon_handshake.png" alt="サポート">
                                </div> -->
                                <h4>サポート</h4>
                                <p>働きたい人の不安や不満を解消することもサポートの一環です。また、面接のセッティングから採用決定、採用後のケアも実施。働く人と企業が満足できる出会いをサポートします。</p>
                            </div>

                        </div>
                    </article>
                </section>
                <!-- 的確なマッチングで働く人と企業の未来に希望を END -->


                <!-- グローバル人材 START -->
                <section class="human_impression with_line">
                    <article>
                        <div class="both_side_line">

                            <div id="human_global" class="impression_title_wrap">
                                <h2 class="impression_title">グローバル人材</h2>
                            </div>

                            <div class="impression_layout image_text">
                                <div class="image_cont">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/human/img_human_01_01.jpg" alt="グローバル人材が企業の未来をひらく">
                                </div>
                                <div class="text_cont">
                                    <div class="box">
                                        <h3 class="ttl_20">グローバル人材が<span class="nowrap">企業の未来をひらく</span></h3>
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
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/human/img_human_01_02.jpg" alt="グローバル人材が企業の未来をひらく">
                                </div>
                            </div>

                        </div>

                    </article>
                </section>
                <!-- グローバル人材 END -->


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

                        <h3 class="ttl_20 center">人材確保から採用までを<span class="nowrap">フルサポート</span></h3>
                        <p class="narrow_text">私たちは、海外の拠点と日本オフィスのシームレスな連携により、優秀なグローバル人材の確保から日本企業とのマッチング、アフターフォローまで、すべてのプロセスをていねいにサポートします。</p>

                        <div class="support_cont">

                            <div class="col">
                                <div class="icon_cont">
                                    <img class="tall" src="<?php echo get_template_directory_uri(); ?>/assets/img/common/icon/icon_user.png" alt="リクルート">
                                </div>
                                <h4>リクルート</h4>
                                <p>グローバル人材の募集や選考は、弊社と提携のある現地の大学や日本語学校とオンラインで行っています。直接提携しているので、優秀で勤勉なグローバル人材を優先的に推薦いたします。</p>

                            </div>

                            <div class="col">
                                <div class="icon_cont">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/icon/icon_head.png" alt="教育">
                                </div>
                                <h4>教育</h4>
                                <p>ビザ申請の待機期間中に現地オフィスで、日本語教育と日本で通用するビジネスマナーや職種に応じた技能教育を行います。就業時には、即戦力となる教育を実践します。</p>

                            </div>

                            <div class="col">
                                <div class="icon_cont">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/icon/icon_team.png" alt="安心のサポート">
                                </div>
                                <h4>安心のサポート</h4>
                                <p>面接のセッティングから採用の決定、入国までフルにサポートいたします。また、採用決定後もケア＆サポートを実施。社内マニュアルや工程表などの翻訳、在日スタッフのよる在留中のケアなども行います。</p>
                            </div>

                            <div class="col">
                                <div class="icon_cont">
                                    <img class="wide" src="<?php echo get_template_directory_uri(); ?>/assets/img/common/icon/icon_handshake.png" alt="マッチング">
                                </div>
                                <h4>マッチング</h4>
                                <p>グローバル人材の採用には、疑問がつきものです。私たちはお客様とグローバル人材とのマッチングサイトをご用意し、御社の要望に最適な人材とのご縁をつなぎます。</p>
                            </div>

                        </div>
 <div style="margin-top: 50px;text-align: center;text-align: -webkit-center;" >
   <a class="enjob_site_btn" href="https://career.enzi-job.com/" class="row" style="display: flex; max-width: 300px; max-height: 76px; background-color: #003c9f" >
      <img class="col-sm-2" style="width: 30%; background-color: white; margin: 10px; padding: 20px 5px 20px 5px; display: flex;" src="https://enzi.co.jp/wp/wp-content/uploads/2020/06/logo.png" alt="安心のサポート">
     <span class="col-sm-8" style="color: white; padding: 15px 0 15px 0; text-align: left; font-size: 14px;">日本で働きたい外国人のための求人サイト</span>
   </a>
</div>
                    </article>
                </section>
                <!-- 人材確保から採用までをフルサポート END -->


                <!-- ベトナム人スタッフの声 START -->
                <section class="human_voice with_line">
                    <article>
                        <div class="both_side_line border_bottom">
                            <h3 class="ttl_20 center">ベトナム人スタッフの声</h3>
                            <p class="narrow_text">私たちの会社には、来日して2年以上経つベトナム人スタッフがたくさん働いています。大切な戦力として活躍する彼らの声をご紹介します。</p>

                            <div class="voice_cont">

                                <div class="row">
                                    <div class="image_cont">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/human/img_human_voice_01.png" alt="グエン・ティ・ディン">
                                    </div>
                                    <div class="text_cont">
                                        <p>日本で働く夢を持って来日し、4年間学校で学んだあと、就職活動を行いました。そのときに何度もトライして、大変だった経験があります。この経験を活かし、私と同じ夢を持つ人を応援したいと考え、エンジの人材ソリューション事業部に就職しました。日本で働きたいと考えている外国人は、専門技術と日本語をとても頑張って勉強しています。そのサポートをすることが私の仕事です。また、エンジは会社として外国人人材に未来をもたらすこと、外国人と日本企業の架け橋となる目標を持っています。この目標を実現するために、私も毎日同僚と仲良く、一生懸命仕事をしています。</p>
                                        <p class="name">グエン・ティ・ディン／<span class="nowrap">人材ソリューション事業部 勤続2年</span></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="image_cont">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/human/img_human_voice_02.png" alt="キュー・ガック・チェン">
                                    </div>
                                    <div class="text_cont">
                                        <p>ITエンジニアとして4年前に来日し、エンジで働き始めて2年が経ちます。現在は、ITソリューション事業部で開発チームのリーダーを務め、他部署がお客様用に用意しているWebサイトのプログラミングを行っています。セキュリティなど気を遣うところがたくさんあって、仕事は大変ですが、やりがいも感じています。同僚には、日本人もベトナム人もいて、みんな一生懸命に頑張っていて、いい環境だと思っています。私の仕事は、会社の成長に直接関わるものなので、会社が大きく成長できるよう、これからも頑張っていきたいと考えています。</p>
                                        <p class="name">キュー・ガック・チェン／<span class="nowrap">ITソリューション事業部 勤続2年</span></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="image_cont">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/human/img_human_voice_03.png" alt="グエン・バン・タム">
                                    </div>
                                    <div class="text_cont">
                                        <p>日本のような先進国で仕事をしたいと思い、2017年の始めに来日し、留学生として1年半学校で勉強をしてからエンジにプログラマーとして就職しました。同僚はみんなやさしくて、仕事の環境は快適です。私自身の考え方と、日本人の仕事や人に対する考え方は異なりますが、それもおもしろい経験です。日本のアニメや茶道のような文化に興味があり、特に茶道は研究したいと思っています。できるだけ長く日本で働いて、将来は家族も日本に呼ぶことが目標です。</p>
                                        <p class="name">グエン・バン・タム／<span class="nowrap">ITソリューション事業部 勤続2年</span></p>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </article>

                </section>
                <!-- ベトナム人スタッフの声 END -->


                <!-- 拠点紹介 START -->
                <!-- <setcion class="human_base with_line">
                    <article>
                        <div class="both_side_line padding_tall">
                            <h2 class="ttl_20 center">拠点紹介</h2>
                            <div class="base_access">
                                <div class="col">
                                    <h3>現地（ベトナム）オフィス</h3>




                                    <p>TEL: 044-750-8640<br>
                                        FAX: 044-750-8641<br>
                                        Mail: info@enzi.co.jp<br>
                                        url: https://enzi.co.jp<br>
                                        神奈川県川崎市宮前区鷺沼3丁目2-9　鷺沼センタービル6F</p>
                                    <div class="iframe_cont">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3244.933212626489!2d139.57017465084127!3d35.58004024302531!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018f6fcc8ade5cf%3A0xa5ec4afdf9c77b5e!2z44CSMjE2LTAwMDQg56We5aWI5bed55yM5bed5bSO5biC5a6u5YmN5Yy66be65rK877yT5LiB55uu77yS4oiS77yZ!5e0!3m2!1sja!2sjp!4v1553072730960" width="100%" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>
                                    </div>
                                </div>

                                <div class="col">
                                    <h3>日本オフィス</h3>
                                    <p>TEL: 044-750-8640<br>
                                        FAX: 044-750-8641<br>
                                        Mail: info@enzi.co.jp<br>
                                        url: https://enzi.co.jp<br>
                                        神奈川県川崎市宮前区鷺沼3丁目2-9　鷺沼センタービル6F</p>
                                    <div class="iframe_cont">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3244.933212626489!2d139.57017465084127!3d35.58004024302531!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018f6fcc8ade5cf%3A0xa5ec4afdf9c77b5e!2z44CSMjE2LTAwMDQg56We5aWI5bed55yM5bed5bSO5biC5a6u5YmN5Yy66be65rK877yT5LiB55uu77yS4oiS77yZ!5e0!3m2!1sja!2sjp!4v1553072730960" width="100%" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </section> -->
                <!-- 拠点紹介 END -->

                <!-- ご紹介までの流れ START -->
                <!-- <section class="human_flow bg_gray">
                    <article>
                        <h2 class="ttl_20 center">ご紹介までの流れ</h2>
                        <p class="narrow_text">お客様からのリクエストから始まるベトナム人材の採用。アフターフォローまでの流れをご紹介します。</p>

                        <div class="fig_cont">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/human/fig_human_flow.png" alt="ご紹介までの流れ" class="hide_sp">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/content/service/human/fig_human_flow_sp.png" alt="ご紹介までの流れ" class="hide_pc">
                        </div>
                    </article>
                </sectoin> -->
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