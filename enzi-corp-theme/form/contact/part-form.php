<?php
// メール設定を読み込み
ootpl_contact_setting( 'contact' );
// メールクラス
class FM_Class extends FM_Mail_Input {
    // select1
    public function setSelect1()
    {
        $name    = 'fm_select1';
        $arr     = array( '人材ソリューションについて', 'ITソリューションについて', '施工について', '求人情報について' );
        $default = '';

        if ( isset( $_GET[ 'from_page' ] ) && $_GET[ 'from_page' ] == 'recruit' ) {
            $default = '求人情報について';
        }

        $this->setValue( $name, $arr, $default, 1 );
    }
}
$cls = new FM_Class();
?>

<form class="fm_action h-adr" action="<?php echo esc_url( home_url( '/contact/confirm' ) ); ?>" method="post">
    <style>
        div[class*='err_'] {
            display:none;
        }
    </style>

    <table>
        <tbody>
            <tr>
                <th>
                    <p>お問い合わせ件名</p>
                    <span class="essential">必須</span>
                </th>
                <td>
                    <div class="err_area err_fm_select1">
                        <p>お問い合わせ件名を入力してください。</p>
                    </div>
                    <select name="fm_select1" id="" class="selectBox80" required>
                        <option value="">選択してください</option>
                        <?php $cls->setSelect1(); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>
                    <p>会社名</p>
                </th>
                <td>
                    <p><span class="arrow">法人のお客様のみご入力ください。</span></p>
                    <input name="fm_company" value="<?php $cls->getPost( 'fm_company' ); ?>" placeholder="">
                </td>
            </tr>
            <tr>
                <th>
                    <p>お名前</p>
                    <span class="essential">必須</span>
                </th>
                <td>
                    <div class="err_area err_fm_name">
                        <p>お名前を入力してください。</p>
                    </div>
                    <input name="fm_name" id="auto_name" value="<?php $cls->getPost( 'fm_name' ); ?>" placeholder="" required>
                </td>
            </tr>
            <tr>
                <th>
                    <p>ふりがな</p>
                </th>
                <td>
                    <input name="fm_kana" id="auto_kana" value="<?php $cls->getPost( 'fm_kana' ); ?>" placeholder="">
                </td>
            </tr>
            <tr>
                <th>
                    <p>電話番号</p>
                    <span class="essential">必須</span>
                </th>
                <td>
                    <div class="err_area err_fm_tel">
                        <p>電話番号を入力してください。</p>
                    </div>

                    <input type="tel" name="fm_tel" value="<?php $cls->getPost( 'fm_tel' ); ?>" placeholder="" required>
                </td>
            </tr>
            <tr>
                <th>
                    <p>メールアドレス</p>
                    <span class="essential">必須</span>
                </th>
                <td>
                    <div class="err_area err_fm_mail">
                        <p>メールアドレスを入力してください。</p>
                    </div>
                    <input type="email" name="fm_mail" value="<?php $cls->getPost( 'fm_mail' ); ?>" placeholder="" required>
                </td>
            </tr>
            <tr>
                <th>
                    <p>住所</p>
                    <span class="essential">必須</span>
                </th>
                <td>
                    <span class="p-country-name" style="display:none;">Japan</span>

                    <div class="err_area err_address1">
                        <p>住所を入力してください。</p>
                    </div>

                    <div class="err_area err_postcode2">
                        <p>郵便番号を入力してください。</p>
                    </div>

                    <p><span class="arrow">郵便番号 (半角数字)</span></p>

                    <ul class="number">
                        <li><input type="text" name="postcode1" value="<?php $cls->getPost( 'postcode1' ); ?>" placeholder="000" maxlength="3" class="p-postal-code" required><span>-</span></li>
                        <li><input type="text" name="postcode2" class="p-postal-code" value="<?php $cls->getPost( 'postcode2' ); ?>" placeholder="1234"maxlength="4" required></li>
                    </ul>

                    <p><span class="arrow">都道府県</span></p>
                    <select name="address1" class="selectBox200 p-region" required>
                        <?php $cls->setAddress(); ?>
                    </select>

                    <p><span class="arrow">市区町村</span></p>
                    <input type="text" name="address2" value="<?php $cls->getPost( 'address2' ); ?>" class="p-locality p-street-address p-extended-address" placeholder="〇〇区〇〇町" required>

                    <p><span class="arrow">以降の住所</span></p>
                    <input type="text" name="address3" value="<?php $cls->getPost( 'address3' ); ?>" required>
                </td>
            </tr>
            <tr>
                <th>
                    <p>お問い合わせ内容</p>
                    <span class="essential">必須</span>
                </th>
                <td>
                    <div class="err_area err_fm_comment">
                        <p>お問い合わせ内容を入力してください。</p>
                    </div>
                    <textarea name="fm_comment" required><?php $cls->getPost( 'fm_comment' ); ?></textarea>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- 個人情報の同意 START -->
    <div class="agree_box">

        <p class="bold color_blue">弊社へお問い合わせいただく方は、下記「<a href="<?php echo esc_url( home_url( '/privacy' ) ); ?>" target="_blank">個人情報の取り扱いについて</a>」を必ずお読みください。</p>

        <p>以上の「個人情報の取り扱いについて」に同意いただける場合は下記ボックスをチェックし、お問い合わせフォームに必要事項をご記入のうえ送信してください。尚、お問い合わせの内容によっては、返信に時間がかかる場合や、お答えできない場合があることをご了承ください。</p>

        <h3>個人情報の取り扱いについて<span class="essential">必須</span></h3>

        <!-- エラー文 START -->
        <ul class="error_access err_agree">
            <li>プライバシーポリシーについて同意が必要です。</li>
        </ul>
        <!-- エラー文 END -->

        <ul class="check_list">
            <?php $cls->setAgree(); ?>
        </ul>

        <p class="closing">すべて入力がおすみになりましたら、確認画面ボタンを押してください。</p>

        <ul class="transmission">
            <li><input type="submit" class="fm_btn_confirm" value="確認画面へ"></li>
        </ul>

    </div>
    <!-- 個人情報の同意 END -->

    <input type="hidden" name="token" value="<?php echo $cls->token; ?>">
</form>


<script src="<?php echo get_template_directory_uri(); ?>/app/mail/js/form.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/app/mail/js/jquery.autoKana.min.js"></script>
<script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
