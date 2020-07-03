
<header>

<div class="inner">

    <!-- 会社名ロゴ -->
    <h1><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/logo.svg" alt="株式会社エンジ"></a></h1>

    <!-- ハンバーガーボタン -->
    <div class="toggle_button" id="toggle">
        <span class="bar top"></span>
        <span class="bar middle"></span>
        <span class="bar bottom"></span>
    </div>

    <!-- ナビゲーション -->
    <div class="drawer_bg"></div>
    <nav>
        <ul>
            <li class="switching">
                <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/logo.svg" alt="株式会社エンジ"></a>
            </li>
            <li class="parent_menu"><a href="<?php echo esc_url(home_url('/service')); ?>">サービス</a>

                <ul class="sub_menu">
                   <li class="parent_menu2"><a class="parent_link">人材ソリューション</a>
                    <ul class="sub_menu2">
                        <li><a href="<?php echo esc_url(home_url('/service/human-resources-solution')); ?>">女性のキャリア形成サポート部門</a></li>
                        <li><a href="<?php echo esc_url(home_url('/service/2')); ?>">グローバル人材採用部門</a></li>
                        <li><a href="<?php echo esc_url(home_url('/service/3')); ?>">湯灌師・納棺師（葬祭業）人材紹介部門</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo esc_url(home_url('/service/it-solution')); ?>">ITソリューション</a></li>
                    <li><a href="<?php echo esc_url(home_url('/service/construct')); ?>">施工</a></li>
                </ul>
            </li>
            <li><a href="<?php echo esc_url(home_url('/about')); ?>">会社案内</a></li>
            <li><a href="<?php echo esc_url(home_url('/news')); ?>">お知らせ</a></li>
            <li><a href="<?php echo esc_url(home_url('/recruit')); ?>">採用情報</a></li>
            <li class="cv"><a href="<?php echo esc_url(home_url('/contact')); ?>">お問い合わせ</a></li>
        </ul>
    </nav>


</div>

</header>
