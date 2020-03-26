<!DOCTYPE html>
<html lang="ja">

<?php get_header(); ?>

<body class="drawer">
    <?php get_sidebar(); ?>

    <!-- //// ALL START //// -->

    <!-- classにコンテンツディレクトリを付与する -->
    <div id="container" class="article recruit">


        <!-- //// HEADER START //// -->
        <?php get_sidebar('header'); ?>
        <!-- //// HEADER END //// -->


        <!-- //// PAGE TITLE START //// -->

        <div class="ttl">

            <div class="ttl_inner">

                <h1 class="ttl">RECRUIT<span>採用情報</span></h1>

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
                <section class="recruit_top">

                    <article>

                        <div class="text_cont">
                            <h2 class="ttl_20">社員の成長が、企業の力になる</h2>
                            <p>株式会社エンジは、社会貢献を基本理念に、ボーダーレスな事業展開を<br class="hide_ssp">しています。これから公開されるプロジェクトもまだまだ進行中。新しい<br class="hide_ssp">ことにチャレンジし続け、仕事を通して成長したい意欲のある方を待って<br class="hide_ssp">います！</p>
                        </div>

                    </article>
                </section>
                <!-- 企業の可能性をひらく、新しい人材ソリューション END -->


                <!-- ハッピーカンパニーをめざして START -->
                <section class="recruit_happy with_line">

                    <article>

                        <div class="both_side_line">

                            <h2 class="center">ハッピーカンパニーをめざして</h2>
                            <div class="cont">
                                <p>株式会社エンジは、何もないところからスタートした企業です。その企業が今、3つの事業を展開するほどに成長しました。これは、今いる社員のやり抜く力のおかげです。</p>
                                <p>だからこそ私たちは、新しいことへチャレンジする勇気と、仕事を形にする創意工夫、何よりその環境を楽しみながらやり抜く力を持つ人を求めます。社員の成長こそ、企業の発展に欠かせないパワーだからです。</p>
                                <p>1日の1／3を過ごすことになる会社での生活は、社員一人ひとりのQOL（クオリティオブライフ）を大きく左右し、仕事に喜びを感じられることは、しあわせになるために欠かせません。私たちがめざしているのは、全社員がしあわせになる企業。ともに働く仲間を大切にしながら、社会に貢献する仕事をし、充実した人生を送ってほしいと願っています。</p>
                            </div>

                        </div>
                    </article>

                </section>
                <!-- ハッピーカンパニーをめざして END -->

                <!-- 募集要項 START -->
                <section class="recruit_info with_line">

                    <article>

                        <div class="both_side_line">
                            <h2 class="ttl_20 center">募集要項</h2>

                            <dl class="accordion">

                                <dt>
                                    <h3>営業</h3>
                                    <p>弊社で取り扱う様々なサービスの促進、販売をしていただきます。未経験の方でも自分にあった商材が見つかります。</p>
                                </dt>
                                <dd>

                                    <?php
                                    $url = esc_url(home_url('/contact')) . '?from_page=recruit';
                                    ?>

                                    <div class="table_cont">
                                        <table>

                                            <tr>
                                                <th><span>勤務時間</span></th>
                                                <td>9:00〜18:00（休憩1時間）</td>
                                            </tr>

                                            <tr>
                                                <th><span>休日・休暇</span></th>
                                                <td>土日、有給休暇、夏季休暇、年末年始休暇</td>
                                            </tr>

                                            <tr>
                                                <th><span>雇用形態</span></th>
                                                <td>正社員（試用期間あり）</td>
                                            </tr>

                                            <tr>
                                                <th><span>勤務地</span></th>
                                                <td>鷺沼オフィス（神奈川県川崎市宮前区鷺沼3丁目2-9　鷺沼センタービル6F）</td>
                                            </tr>

                                            <tr>
                                                <th><span>募集人数</span></th>
                                                <td>数名</td>
                                            </tr>

                                            <tr>
                                                <th><span>選考の流れ</span></th>
                                                <td>問い合わせ・エントリー　→　一次面接　→　社長面接　→　採用</td>
                                            </tr>

                                        </table>
                                    </div>
                                    <div class="btn">
                                        <a href="<?php echo $url; ?>">
                                            <span>エントリーする</span>
                                        </a>
                                    </div>

                                </dd>

                                <dt>
                                    <h3>一般事務</h3>
                                    <p>営業や工事部のアシストをしていただきます。
                                        書類作成や案件管理に始まり、CADを使った図面の作成や来賓対応、
                                        記事の制作に至るまで、様々な業務を遂行していただきます。</p>
                                </dt>
                                <dd>

                                    <div class="table_cont">
                                        <table>

                                            <tr>
                                                <th><span>勤務時間</span></th>
                                                <td>9:00〜18:00（休憩1時間）</td>
                                            </tr>

                                            <tr>
                                                <th><span>休日・休暇</span></th>
                                                <td>土日、有給休暇、夏季休暇、年末年始休暇</td>
                                            </tr>

                                            <tr>
                                                <th><span>雇用形態</span></th>
                                                <td>正社員（試用期間あり）</td>
                                            </tr>

                                            <tr>
                                                <th><span>勤務地</span></th>
                                                <td>鷺沼オフィス（神奈川県川崎市宮前区鷺沼3丁目2-9　鷺沼センタービル6F）</td>
                                            </tr>

                                            <tr>
                                                <th><span>募集人数</span></th>
                                                <td>数名</td>
                                            </tr>

                                            <tr>
                                                <th><span>選考の流れ</span></th>
                                                <td>問い合わせ・エントリー　→　一次面接　→　社長面接　→　採用</td>
                                            </tr>

                                        </table>
                                    </div>
                                    <div class="btn">
                                        <a href="<?php echo $url; ?>">
                                            <span>エントリーする</span>
                                        </a>
                                    </div>

                                </dd>

                                <dt>
                                    <h3>施工管理・電気工事士</h3>
                                    <p>スキルや経験にあわせて電気工事の施工もしくは施工管理をお任せします。
                                        まずは電気工事士として経験を重ね、ゆくゆくは施工管理を手がけることもできますし、そのまま工事士としてスペシャリストを目指すこともできます。</p>
                                </dt>
                                <dd>

                                    <div class="table_cont">
                                        <table>

                                            <tr>
                                                <th><span>勤務時間</span></th>
                                                <td>9:00〜18:00（休憩1時間）</td>
                                            </tr>

                                            <tr>
                                                <th><span>休日・休暇</span></th>
                                                <td>土日、有給休暇、夏季休暇、年末年始休暇</td>
                                            </tr>

                                            <tr>
                                                <th><span>雇用形態</span></th>
                                                <td>正社員（試用期間あり）</td>
                                            </tr>

                                            <tr>
                                                <th><span>勤務地</span></th>
                                                <td>市が尾オフィス（神奈川県横浜市青葉区市ケ尾町111-2）</td>
                                            </tr>

                                            <tr>
                                                <th><span>募集人数</span></th>
                                                <td>数名</td>
                                            </tr>

                                            <tr>
                                                <th><span>選考の流れ</span></th>
                                                <td>問い合わせ・エントリー　→　一次面接　→　社長面接　→　採用</td>
                                            </tr>

                                        </table>
                                    </div>
                                    <div class="btn">
                                        <a href="<?php echo $url; ?>">
                                            <span>エントリーする</span>
                                        </a>
                                    </div>

                                </dd>

                                <dt>
                                    <h3>プログラマー</h3>
                                    <p>当社が提供しているサービスのWebサイト制作、アプリ開発、インフラ管理などをお任せします。ご自身のスキルを最大限に活かしていただけます。</p>
                                </dt>
                                <dd>

                                    <div class="table_cont">
                                        <table>

                                            <tr>
                                                <th><span>勤務時間</span></th>
                                                <td>9:00〜18:00（休憩1時間）</td>
                                            </tr>

                                            <tr>
                                                <th><span>休日・休暇</span></th>
                                                <td>土日、有給休暇、夏季休暇、年末年始休暇</td>
                                            </tr>

                                            <tr>
                                                <th><span>雇用形態</span></th>
                                                <td>正社員（試用期間あり）</td>
                                            </tr>

                                            <tr>
                                                <th><span>勤務地</span></th>
                                                <td>鷺沼オフィス（神奈川県川崎市宮前区鷺沼3丁目2-9　鷺沼センタービル6F）</td>
                                            </tr>

                                            <tr>
                                                <th><span>募集人数</span></th>
                                                <td>数名</td>
                                            </tr>

                                            <tr>
                                                <th><span>選考の流れ</span></th>
                                                <td>問い合わせ・エントリー　→　一次面接　→　社長面接　→　採用</td>
                                            </tr>

                                        </table>
                                    </div>
                                    <div class="btn">
                                        <a href="<?php echo $url; ?>">
                                            <span>エントリーする</span>
                                        </a>
                                    </div>

                                </dd>

                                <dt>
                                    <h3>デザイナー</h3>
                                    <p>当社が提供しているサービスのWebサイト、アプリのUIデザインなどをお任せします。また、Webサイトのデザインだけでなく、チラシやパンフレットなどのデザインなど、幅広い業務を担当していただきます。</p>
                                </dt>
                                <dd>

                                    <div class="table_cont">
                                        <table>

                                            <tr>
                                                <th><span>勤務時間</span></th>
                                                <td>9:00〜18:00（休憩1時間）</td>
                                            </tr>

                                            <tr>
                                                <th><span>休日・休暇</span></th>
                                                <td>土日、有給休暇、夏季休暇、年末年始休暇</td>
                                            </tr>

                                            <tr>
                                                <th><span>雇用形態</span></th>
                                                <td>正社員（試用期間あり）</td>
                                            </tr>

                                            <tr>
                                                <th><span>勤務地</span></th>
                                                <td>鷺沼オフィス（神奈川県川崎市宮前区鷺沼3丁目2-9　鷺沼センタービル6F）</td>
                                            </tr>

                                            <tr>
                                                <th><span>募集人数</span></th>
                                                <td>数名</td>
                                            </tr>

                                            <tr>
                                                <th><span>選考の流れ</span></th>
                                                <td>問い合わせ・エントリー　→　一次面接　→　社長面接　→　採用</td>
                                            </tr>

                                        </table>
                                    </div>
                                    <div class="btn">
                                        <a href="<?php echo $url; ?>">
                                            <span>エントリーする</span>
                                        </a>
                                    </div>

                                </dd>

                            </dl>
                        </div>
                    </article>

                </section>
                <!-- 募集要項 END -->

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