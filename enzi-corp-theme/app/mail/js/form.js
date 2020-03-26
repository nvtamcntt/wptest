/////////////////////////////////////////////////////////////
// JavaScript Document Ver1.29 お問い合わせフォーム
/////////////////////////////////////////////////////////////

// jQuery
var jq = jQuery;

// パッケージを作る
var Usr = function() {};

// クラスを定義（コンストラクタ）
Usr.Forms = function() {};

// プロトタイプ
var pr = Usr.Forms.prototype;

// フォーム準備
pr.createForm = function()
{
    // 必須設定
    this.eventRequired();
    // バリデート
    this.eventValidation();
    // フィルター
    this.eventFilter();
    // イベント発火
    this.eventFire();

    // ID auto_name, auto_kana が存在した場合、かなを自動入力する
    if ( ( jq('#auto_name').length > 0 )
        && ( jq('#auto_kana').length > 0 )
       ) {
        jq.fn.autoKana('#auto_name', '#auto_kana', {
            katakana : false  //true：カタカナ、false：ひらがな（デフォルト）
        });
        jq.fn.autoKana('#auto_name2', '#auto_kana2', {
            katakana : false  //true：カタカナ、false：ひらがな（デフォルト）
        });
    }
}

// エラーメソッド
pr.errView = function(e, flg)
{
    var name = jq(e).prop('name');

    // NAME が取得できなかった場合は ID にする
    if ( typeof name === 'undefined' ) {
        name = jq(e).prop('id');
    }

    var errID = 'err_' + name;
    
    // 現在のフォーム内で探す
    var fm = jq(e).parents('.fm_action');
    // 該当のエレメント
    var ele = fm.find('.' + errID);

    if ( ! flg ) {
        //jq('#' + errID).slideDown('fast');
        ele.slideDown('fast');
    } else {
        //jq('#' + errID).slideUp('fast');
        ele.slideUp('fast');
    }
}

// 必須設定
pr.eventRequired = function(e)
{
    var self = this;

    // 必須項目
    var arr = jq('[required]');
    if ( arr.length > 0 ) {
        jq.each(arr, function(i, e) {

            var type = jq(e).prop('type');
            // 特定のフィールドタイプはキャンセル。
            if ( type == 'email' || type == 'tel' ) {
                return;
            }

            var name = jq(e).prop('name');
            // 特定のフィールドはキャンセル。
            if ( name == 'fm_mail' || name == 'fm_mail_rep'
                || name == 'postcode' || name == 'postcode1' || name == 'postcode2'
                || name == 'address1' || name == 'address2' || name == 'address3'
               ) {
                return;
            }

            // フォーカスが外れた時
            jq(e).blur(function(){
                // 値が空だったらエラー
                if ( jq(e).val() == '' ) {
                    self.errView(e, false);
                } else {
                    self.errView(e, true);
                }
            });
        });
    }

    // 必須項目(チェックボックス・ラジオボタン)
    var arr = jq('.fm_required');
    if ( arr.length > 0 ) {
        jq.each(arr, function(i, e) {
            var $i = jq(e).find('input:radio, input:checkbox');
            var fn = function() {
                var cnt = 0;
                // すべてのチェックが外されているか
                jq.each($i, function(ii, ee) {
                    if ( ! jq(ee).prop('checked') ) {
                        cnt++;
                    }
                });

                if ( cnt ==  $i.length ) {
                    $(e).find('.err_fm_required').slideDown('fast');
                } else {
                    $(e).find('.err_fm_required').slideUp('fast');
                }
            }

            $i.change(function(){
                fn();
            });
        });
    }
}

// mail
pr.validationMail = function( str )
{
    // メールチェックはゆるめにします。
    if ( ! str.match( /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/ )) {
        return false;
    } else {
        return true;
    }
}

// tel
pr.validationTel = function( str )
{
    // 数値とハイフンのみか
    if ( ! str.match(/^[0-9-]{10,13}$/)) {
        return false;
    } else {
        return true;
    }
}

// postcode
pr.validationPostcode = function( str )
{
    // 数値とハイフンのみか
    if ( ! str.match(/^[0-9-]{7,8}$/)) {
        return false;
    } else {
        return true;
    }
}

// postcode1
pr.validationPostcode1 = function( str )
{
    // 数値のみか
    if ( ! str.match(/^[0-9]{3}$/)) {
        return false;
    } else {
        return true;
    }
}

// postcode2
pr.validationPostcode2 = function( str )
{
    // 数値のみか
    if ( ! str.match(/^[0-9]{4}$/)) {
        return false;
    } else {
        return true;
    }
}

// error holder
var errorHolderCnt = true;
pr.errorHolder = function( str )
{
    if ( str === true || str === false ) {
        this.errorHolderCnt = str;
        return this.errorHolderCnt;
    } else {
        return this.errorHolderCnt
    }
}

// フォーカスの中身　mail
pr.blurMail = function( self, reqd, e )
{
    var str  = jq(e).val();
    var name = jq(e).prop('name');

    // 必須だった場合、必須チェックを挟む
    if ( reqd ) {
        if ( str == '' ) {
            self.errView(e, false);
            self.errorHolder(false);
        } else {
            // メールチェック
            if ( ! self.validationMail( str ) ) {
                self.errView(e, false);
                self.errorHolder(false);
            } else {
                // 確認入力だった場合、メールアドレスを比較する
                if ( name == 'fm_mail_rep' ) {
                    var ml = jq('[name=fm_mail]').val();
                    if ( ml != str ) {
                        self.errView(e, false);
                        self.errorHolder(false);
                    } else {
                        self.errView(e, true);
                    }
                } else {
                    self.errView(e, true);
                }
            }
        }
    } else {
        // 未入力は許す
        if ( str != '' ) {
            // メールチェック
            if ( ! self.validationMail( str ) ) {
                self.errView(e, false);
                self.errorHolder(false);
            } else {
                // 確認入力だった場合、メールアドレスを比較する
                if ( name == 'fm_mail_rep' ) {
                    var ml = jq('[name=fm_mail]').val();
                    if ( ml != str ) {
                        self.errView(e, false);
                        self.errorHolder(false);
                    } else {
                        self.errView(e, true);
                    }
                } else {
                    self.errView(e, true);
                }
            }
        } else {
            self.errView(e, true);
        }
    }
}

// フォーカスの中身　tel
pr.blurTel = function( self, reqd, e )
{
    var str  = jq(e).val();

    // 必須だった場合、必須チェックを挟む
    if ( reqd ) {
        if ( str == '' ) {
            self.errView(e, false);
            self.errorHolder(false);
        } else {
            // 電話番号チェック
            if ( ! self.validationTel( str ) ) {
                self.errView(e, false);
                self.errorHolder(false);
            } else {
                self.errView(e, true);
            }
        }
    } else {
        // 未入力は許す
        if ( str != '' ) {
            // 電話番号チェック
            if ( ! self.validationTel( str ) ) {
                self.errView(e, false);
                self.errorHolder(false);
            } else {
                self.errView(e, true);
            }
        } else {
            self.errView(e, true); // 必須でなかった場合、空修正だとエラーが残るので
        }
    }
}

// フォーカスの中身　postcode1_2
pr.blurPostcode1_2 = function( self, ptc1, ptc2 )
{
    var str1  = ptc1.val();
    var str2  = ptc2.val();

    // 未入力は許す
    if ( str1 != '' && str2 != '' ) {
        // 郵便番号チェック
        if ( ! self.validationPostcode1( str1 ) ) {
            self.errView(ptc2, false);
            self.errorHolder(false);
        } else {
            if ( ! self.validationPostcode2( str2 ) ) {
                self.errView(ptc2, false);
                self.errorHolder(false);
            } else {
                self.errView(ptc2, true);
            }
        }
    } else {
        self.errView(ptc2, true); // 必須でなかった場合、空修正だとエラーが残るので
    }
}

// フォーカスの中身 address
pr.blurAddress = function( self, ptc1, ptc2, add1, add2, add3 )
{
    if ( ptc1.val() == '' || ptc2 == '' || add1.val() == '' || add2.val() == '' || add3.val() == '' ) {
        self.errView(add1, false);
        self.errorHolder(false);
    } else {
        self.errView(add1, true);
    }
}

// チェンジの中身　File
pr.changeFile = function( self, e )
{
    var file = jq(e).prop('files')[0];
    
    // 未入力の場合はスルー
    if (typeof file !== 'undefined') {
        if ( file.size > 1048576 ) {
            self.errView( e, false );
            self.errorHolder(false);

        } else if ( (   file.type !== 'image/jpeg' ) // .jpg
                   && ( file.type !== 'image/png' ) // .png
                   && ( file.type !== 'image/gif' ) // .gif
                   && ( file.type !== 'application/zip' ) // .zip
                   && ( file.type !== 'application/pdf' ) // .pdf
                   && ( file.type !== 'application/vnd.ms-excel' ) // .xls
                   && ( file.type !== 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' ) // .xlsx
                   && ( file.type !== 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ) // .docx
                   && ( file.type !== 'application/postscript' ) // .ai
                   && ( file.type !== 'image/x-photoshop' ) // .psd
        ) {
            self.errView( e, false );
            self.errorHolder(false);

        } else {
            self.errView( e, true );
        }
    } else {
        self.errView( e, true );
    }
}

// チェンジの中身　Agree
pr.changeAgree = function( self, e, agr )
{
    if ( jq(e).val() == '同意する' ) {
        if ( ! jq(e).prop('checked') ) {
            self.errView( agr, false );
            self.errorHolder(false);
        } else {
            self.errView( agr, true );
        }
    }
}

// バリデーション
pr.eventValidation = function()
{
    var self = this;

    var array = jq('input[type=email]');
    // メールチェック
    if ( array.length > 0 ) {
        jq.each(array, function(i, e) {

            var reqd = jq(e).prop('required');

            // フォーカスが外れた時
            jq(e).blur(function(){
                self.blurMail( self, reqd, e );
            });
        });
    }

    var array = jq('[type=tel]');
    // 電話番号チェック
    if ( array.length > 0 ) {
        jq.each(array, function(i, e) {

            var reqd = jq(e).prop('required');

            // フォーカスが外れた時
            jq(e).blur(function(){
                self.blurTel( self, reqd, e );
            });
        });
    }

    // 郵便番号チェック（二つに分かれている場合） // 一つのケースを消してしまったので、一つの場合は、これをサンプルに追加する。
    var ptc1 = jq('[name=postcode1]');
    var ptc2 = jq('[name=postcode2]');
    if ( ptc2.length == 1 ) {

        var reqd = ptc2.prop('required');

        // 2のフォーカスが外れた時
        ptc2.blur(function(){
            self.blurPostcode1_2( self, ptc1, ptc2 );
        });

        // 必須だった場合、他の住所のエラーもまとめる。
        if ( reqd ) {
            var add1 = jq('[name=address1]');
            var add2 = jq('[name=address2]');
            var add3 = jq('[name=address3]');

            add3.blur(function(){
                self.blurAddress( self, ptc1, ptc2, add1, add2, add3 );
            });
        }
    }
    
    var array = jq('[type=file]');
    // ファイルチェック
    if ( array.length > 0 ) {
        jq.each(array, function(i, e) {
            jq(e).change(function(){
                self.changeFile( self, this );
            });
        });
    }
    
    // 同意するに変更された時、エラーを消す。
    var agr = jq('[name=agree]');
    if ( agr.length > 0 ) {
        agr.change(function(){
            self.changeAgree( self, this, agr );
        });
    }
}

// 入力フィルター（全角→半角など）
pr.eventFilter = function()
{
    var self = this;

    jq('[name=postcode]').change(function(){
        var str = jq(this).val();
        str = str.replace( /−|一|ー/g, '-' ); // 全角ハイフン|漢字の一|伸ばし棒
        str = str.replace( /[０-９]/g, function(s) {
            return String.fromCharCode( s.charCodeAt(0) - 0xFEE0 );
        });
        jq(this).val(str);
    });

    jq('[name=postcode1]').change(function(){
        var str = jq(this).val();
        str = str.replace( /[０-９]/g, function(s) {
            return String.fromCharCode( s.charCodeAt(0) - 0xFEE0 );
        });
        jq(this).val(str);
    });

    jq('[name=postcode2]').change(function(){
        var str = jq(this).val();
        str = str.replace( /[０-９]/g, function(s) {
            return String.fromCharCode( s.charCodeAt(0) - 0xFEE0 );
        });
        jq(this).val(str);
    });

    jq('[name=fm_kana]').change(function(){
        // ひらがなをカタカナに
        var fn = function (str)
        {
            var i, c, a = [];
            for ( i = str.length - 1; 0 <= i ; i-- ) {
                c = str.charCodeAt(i);
                a[i] = ( 0x3041 <= c && c <= 0x3096 ) ? c + 0x0060 : c;
            };
            return String.fromCharCode.apply(null, a);
        };
        var str = fn( jq(this).val() );
        jq(this).val(str);
    });

    jq('[name=fm_kana2]').change(function(){
        // ひらがなをカタカナに
        var fn = function (str)
        {
            var i, c, a = [];
            for ( i = str.length - 1; 0 <= i ; i-- ) {
                c = str.charCodeAt(i);
                a[i] = ( 0x3041 <= c && c <= 0x3096 ) ? c + 0x0060 : c;
            };
            return String.fromCharCode.apply(null, a);
        };
        var str = fn( jq(this).val() );
        jq(this).val(str);
    });

    jq('[type=tel]').change(function(){
        var str = jq(this).val();
        str = str.replace( /−|一|ー/g, '-' ); // 全角ハイフン|漢字の一|伸ばし棒
        str = str.replace( /[０-９]/g, function(s) {
            return String.fromCharCode( s.charCodeAt(0) - 0xFEE0 );
        });
        jq(this).val(str);
    });

    jq('[type=email]').change(function(){
        var str = jq(this).val();
        str = str.replace( /[Ａ-Ｚａ-ｚ０-９－！”＃＄％＆’（）＝＜＞，．？＿［］｛｝＠＾～￥]/g, function(s) {
            return String.fromCharCode(s.charCodeAt(0) - 65248);
        });
        jq(this).val(str);
    });
}

// イベント発火
pr.eventFire = function()
{
    var self = this;

    // ラジオボタンの「その他」と「その他テキスト」
    var rdo_txt = jq('#rdo_txt');

    if ( rdo_txt.length == 1 ) {

        var rdo_li = jq('.fm_radio').find('input:radio[value="その他"]');

        // その他テキスト」にフォーカスが当たったら
        rdo_txt.focus(function(){

            // 「その他」をチェック
            rdo_li.prop('checked', true);

            var r = jq('.fm_radio');
            // 再必須チェック
            if ( r.length > 0 ) {
                var $i = r.find('input:radio');
                var cnt = 0;
                // すべてのチェックが外されているか
                jq.each($i, function(ii, ee) {
                    if ( ! jq(ee).prop('checked') ) {
                        cnt++;
                    }
                });
                if ( cnt ==  $i.length ) {
                    self.errView( r, false );
                } else {
                    self.errView( r, true );
                }
            }
        });

        // 「その他」がチェックされたら
        rdo_li.click(function(){
            if ( jq(this).prop('checked') ) {
                rdo_txt.focus(); // フォーカスを当てる
            } else {
                rdo_txt.val(''); // テキストを空に
            }
        });


        // 「その他」が以外がチェックされたら
        var rdo_id = rdo_li.attr('id');
        var $i = jq('.fm_radio').find('input[type=radio]');
        jq.each($i, function(ii, ee) {
            if ( jq(ee).attr('id') != rdo_id ) {
                jq(ee).click(function() {
                    rdo_txt.val(''); // テキストを空に
                });
            }
        });
    }

    // チェックボックスの「その他」と「その他テキスト」
    var chk_txt = jq('#chk_txt');

    if ( chk_txt.length == 1 ) {

        var chk_li = jq('.fm_checkbox').find('input:checkbox[value="その他"]');

        // その他テキスト」にフォーカスが当たったら
        chk_txt.focus(function(){

            // 「その他」をチェック
            chk_li.prop('checked', true);

            var r = jq('.fm_checkbox');
            // 再必須チェック
            if ( r.length > 0 ) {
                var $i = r.find('input:checkbox');
                var cnt = 0;
                // すべてのチェックが外されているか
                jq.each($i, function(ii, ee) {
                    if ( ! jq(ee).prop('checked') ) {
                        cnt++;
                    }
                });
                if ( cnt ==  $i.length ) {
                    self.errView( r, false );
                } else {
                    self.errView( r, true );
                }
            }
        });

        // 「その他」がチェックされたら
        chk_li.click(function(){
            if ( jq(this).prop('checked') ) {
                chk_txt.focus(); // フォーカスを当てる
            } else {
                chk_txt.val(''); // テキストを空に
            }
        });
    }
}

// 確認ボタンをクリックした時、入力チェック
pr.eventCheck = function(e)
{
    var self   = this;

    // エラーカウントをリセット
    self.errorHolder(true);
    
    var fm = jq(e).parents('.fm_action');

    var fn = function() {

        // 必須項目
        var array = fm.find('[required]');
        if ( array.length > 0 ) {
            jq.each(array, function(i, e) {

                var type = jq(e).prop('type');
                // 特定のフィールドタイプはキャンセル。
                if ( type == 'email' || type == 'tel' ) {
                    return;
                }

                var name = jq(e).prop('name');
                // 特定のフィールドはキャンセル。
                if ( name == 'fm_mail' || name == 'fm_mail_rep'
                    || name == 'postcode' || name == 'postcode1' || name == 'postcode2'
                    || name == 'address1' || name == 'address2' || name == 'address3'
                   ) {
                    return;
                }

                // 値が空だったらエラー
                if ( jq(e).val() == '' ) {
                    self.errView(e, false);
                    self.errorHolder(false);
                } else {
                    self.errView(e, true);
                }

            });
        }

        // 必須項目(チェックボックス・ラジオボタン)
        var array = fm.find('.fm_required');
        if ( array.length > 0 ) {
            jq.each(array, function(i, e) {
                var $i = jq(e).find('input:radio, input:checkbox');

                var cnt = 0;
                // すべてのチェックが外されているか
                jq.each($i, function(ii, ee) {
                    if ( ! jq(ee).prop('checked') ) {
                        cnt++;
                    }
                });
                if ( cnt ==  $i.length ) {
                    $(e).find('.err_fm_required').slideDown('fast');
                    self.errorHolder(false);
                } else {
                    $(e).find('.err_fm_required').slideUp('fast');
                }
            });
        }

        var array = fm.find('input[type=email]');
        // メールチェック
        if ( array.length > 0 ) {
            jq.each(array, function(i, e) {
                var reqd = jq(e).prop('required');
                self.blurMail( self, reqd, e );
            });
        }

        var array = fm.find('input[type=tel]');
        // 電話番号チェック
        if ( array.length > 0 ) {
            jq.each(array, function(i, e) {
                var reqd = jq(e).prop('required');
                self.blurTel( self, reqd, e );
            });
        }

        // 郵便番号チェック（二つに分かれている場合）
        var ptc1 = fm.find('[name=postcode1]');
        var ptc2 = fm.find('[name=postcode2]');
        if ( ptc2.length == 1 ) {

            var reqd = ptc2.prop('required');

            // 正しい郵便番号か
            self.blurPostcode1_2( self, ptc1, ptc2 );

            // 必須だった場合、他の住所のエラーもまとめる。
            if ( reqd ) {
                var add1 = jq('[name=address1]');
                var add2 = jq('[name=address2]');
                var add3 = jq('[name=address3]');

                self.blurAddress( self, ptc1, ptc2, add1, add2, add3 );
            }
        }

        var agr = fm.find('[name=agree]');
        if ( agr.length > 0 ) {
            // 「同意する」のチェック行われているか
            jq.each(agr, function(i, e) {
                self.changeAgree( self, e, agr );
            });
        }
    }

    // エラーがなければ確認画面へ。エラーがあればエラー表示。
    jq.when(
        fn()
    ).done( function(){

        // エラーカウントを取得
        var error = self.errorHolder(1);

        if ( error ) {
            // ページのイベントを削除
            //$(window).off('beforeunload');
            
            fm.submit();
            return true;
        }

        // フォームのトップへスクロール
        if ( jq('#form_top').length ) {
            var p = jq('#form_top').offset().top;
            jq('html,body').animate({ scrollTop: p }, 'fast');
        }
    });
}

// 実行
jQuery(function(){

    // エラーエリアを非表示にする
    jq('[class^="err_"]').hide();
    jq('[class^="error_"]').hide();
    
    // クラス実行
    var cls = new Usr.Forms();
    // フォームチェック開始
    cls.createForm();

    // 確認画面へ
    jq('.fm_btn_confirm').click(function(e) {
        cls.eventCheck(this);
        return false;
    });
    
//    // ページ遷移確認
//    $(window).on('beforeunload', function(){
//        return '行った変更が保存されない可能性があります。';
//    });
//
//    // フォームをリセット
//    jq('.fm_btn_reset').click(function(e) {
//        jq('.fm_action').find('textarea, :text, select').val('').end().find(':checked').prop('checked', false);
//        return false;
//    });

});