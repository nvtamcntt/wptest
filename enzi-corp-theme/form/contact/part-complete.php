<?php
// メール設定を読み込み
ootpl_contact_setting( 'contact' );
// メールクラス
$cls = new FM_Mail_Complete();
?>


<?php if ( ! $cls->checkError() ) : ?>
<!-- エラーエリア -->
<div class="error_area">

    <ul class="error_access">
        <?php $cls->getError(); ?>
    </ul>

    <ul class="transmission">
        <li><input type="button" value="戻る" onclick="clickReturn()"></li>
    </ul>

</div>

<?php else : ?>

<div class="basket_box f_complete">

    <h1>お問い合わせありがとうございます。</h1>

    <p>お問い合わせ頂きありがとうございます。内容をご確認させていただき、折り返し担当者よりご連絡をいたしますので、しばらくお待ち下さい。3営業日ほど弊社よりご連絡がなかった場合、お手数ではございますがお電話、またはお問い合わせにて再度ご連絡ください。</p>

    <div class="btn">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span>トップページに戻る</span></a>
    </div>

</div>

<?php endif; ?>


<script>
    function clickReturn() {
        window.location.href = '<?php echo esc_url( home_url( '/contact' ) ); ?>';
    }

    <?php if ( ! $cls->checkError() ) : ?>

    // タイトルを変更
    var tmp_txt = document.title;
    var new_txt = tmp_txt.replace( '送信が完了しました', 'エラーが発生しました' );
    document.title = new_txt;

    // パンくずを変更
    var arr = jQuery('div.in ul');
    if ( arr.length > 0 ) {
        jQuery.each(arr,function() {
            var li = jQuery(this).find('li:last');
            var txt = li.html().replace( '送信が完了しました', 'エラーが発生しました' );
            li.html( txt );
        });
    }
    <?php endif; ?>

</script>