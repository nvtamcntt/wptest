<?php
// メール設定を読み込み
ootpl_contact_setting( 'contact' );
// メールクラス
$cls = new FM_Mail_Confirm();
?>

<!-- 実フォーム -->
<form id="fm_action" name="fm_action" method="post">
    <?php $cls->getInput(); ?>
</form>

<?php if ( ! $cls->checkError() ) : ?>
<!-- エラーエリア -->
<div class="error_area">

    <ul class="error_list">
        <?php $cls->getError(); ?>
    </ul>

    <ul class="transmission">
        <li><input type="button" value="戻る" onclick="clickReturn()"></li>
    </ul>

</div>
<?php else : ?>

<table>
    <tbody>
        <tr>
            <th>
                <p>お問い合わせ件名</p>
            </th>
            <td>
                <p><?php $cls->view( 'fm_select1' ); ?></p>
            </td>
        </tr>
        <tr>
            <th>
                <p>会社名</p>
            </th>
            <td>
                <p><?php $cls->view( 'fm_company' ); ?></p>
            </td>
        </tr>
        <tr>
            <th>
                <p>お名前</p>
            </th>
            <td>
                <p><?php $cls->view( 'fm_name' ); ?></p>
            </td>
        </tr>
        <tr>
            <th>
                <p>ふりがな</p>
            </th>
            <td>
                <p><?php $cls->view( 'fm_kana' ); ?></p>
            </td>
        </tr>
        <tr>
            <th>
                <p>電話番号</p>
            </th>
            <td>
                <p><?php $cls->view( 'fm_tel' ); ?></p>
            </td>
        </tr>
        <tr>
            <th>
                <p>メールアドレス</p>
            </th>
            <td>
                <p><?php $cls->view( 'fm_mail' ); ?></p>
            </td>
        </tr>
        <tr>
            <th>
                <p>住所</p>
            </th>
            <td>
                <p><span class="arrow">郵便番号</span></p>
                <p><?php $cls->view( 'postcode' ); ?></p>

                <p><span class="arrow">都道府県</span></p>
                <p><?php $cls->view( 'address1' ); ?></p>

                <p><span class="arrow">市区町村</span></p>
                <p><?php $cls->view( 'address2' ); ?></p>

                <p><span class="arrow">以降の住所</span></p>
                <p><?php $cls->view( 'address3' ); ?></p>
            </td>
        </tr>
        <tr>
            <th>
                <p>お問い合わせ内容</p>
            </th>
            <td>
                <p><?php $cls->view( 'fm_comment' ); ?></p>
            </td>
        </tr>
    </tbody>
</table>


<ul class="transmission transmission_confirm">
    <li><input type="button" value="戻る" onclick="clickReturn()"></li>
    <li><input type="button" value="送信" onclick="clickComplete()" /></li>
</ul>

<?php endif; ?>


<script>
    function clickComplete() {
        document.fm_action.action= '<?php echo esc_url( home_url( '/contact/complete' ) ); ?>';
        document.fm_action.submit();
    }
    function clickReturn() {
        document.fm_action.action= '<?php echo esc_url( home_url( '/contact' ) ); ?>#form_top';
        document.fm_action.submit();
    }

    <?php if ( ! $cls->checkError() ) : ?>

    // タイトルを変更
    var tmp_txt = document.title;
    var new_txt = tmp_txt.replace( 'ご確認ください', 'エラーが発生しました' );
    document.title = new_txt;

    // パンくずを変更
    var arr = jQuery('div.in ul');
    if ( arr.length > 0 ) {
        jQuery.each(arr,function() {
            var li = jQuery(this).find('li:last');
            var txt = li.html().replace( 'ご確認ください', 'エラーが発生しました' );
            li.html( txt );
        });
    }
    <?php endif; ?>

</script>