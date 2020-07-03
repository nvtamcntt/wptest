<?php
////////////////////////////////////////////////////////
// WP/PHP Document Ver1.3.3 お問い合わせフォーム
////////////////////////////////////////////////////////

////  PHPMailer version 6.0.5
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
//
//require_once( dirname( __FILE__ ) . '/PHPMailer/src/Exception.php' );
//require_once( dirname( __FILE__ ) . '/PHPMailer/src/PHPMailer.php' );

// wp_mailで送信
if ( function_exists( 'wp_mail' ) ) {

    define( 'FM_WP_FLG', true );
    date_default_timezone_set( get_option( 'timezone_string' ) );
    // 画像一時ディレクトリ
    define( 'FM_WP_IMG_TEMP', get_template_directory() . '/app/mail/temp/' );
    define( 'FM_WP_IMG_URL',  get_template_directory_uri() . '/app/mail/temp/' );

} else {

//    define( 'FM_WP_FLG', false );
//    date_default_timezone_set( 'Asia/Tokyo' );
//    // 画像一時ディレクトリ
//    define( 'FM_WP_IMG_TEMP', dirname( __FILE__ ) . '/temp/' );
//    define( 'FM_WP_IMG_URL',  '/mail/temp/' );
//    // カウンター（連番）ファイル
//    define( 'FM_WP_COUNTER_TXT', dirname( __FILE__ ) . '/temp/counter.txt' );
}


// Mail class
class FM_Mail {

    protected $error = array();
    protected $data  = array();
    protected $files = array();
    protected $_post_arr = array();

    public function __construct()
    {
        $this->createPostInput();
    }

    // $_post_arr
    protected function createPostInput()
    {
        // 文字列からで配列化
        $arr = explode( '::', FM_MAIL_POST_STR );

        // 整形
        $post_arr = array();
        if ( count( $arr ) > 0 ) {
            foreach ($arr as $value) {
                $tmp = explode( ':', $value );
                $key = isset( $tmp[0] ) ? $tmp[0] : '';
                $val = isset( $tmp[1] ) ? $tmp[1] : '';
                $post_arr[ $key ] = $val;
            }
        }
        $this->_post_arr = $post_arr; // グローバル化して渡します
    }

    // POST
    protected function post()
    {
        $_post_arr = $this->_post_arr;

        // POST 値
        if ( $_POST ) {
            foreach ($_POST as $key => $value) {
                // 入力された値
                $val = isset( $_POST[ $key ] ) ? $_POST[ $key ] : '';

                // 配列は分解する
                if ( is_array( $val ) ) {
                    $val = array_filter( $val, 'strlen' ); // 配列内の空を削除
                    $val = implode( $val, ',' );
                }
                // <br>は改行コードに
                $val = str_replace( array( '<br>', '<br />' ), "\n", $val );
                // タグを削除
                //$val = strip_tags( $val );
                // 値を代入
                $this->data[$key] = $val;

                // 必須項目が未入力だった場合、エラー
                if ( ( $value == 'req' )
                    && ( $val == '' )
                   ) {
                    $this->error[0] = '未入力の項目があります。';
                }

                // 送信時間
                if ( $key == 'send_date' ) {
                    $this->data['send_date'] = date( 'Y-m-d H:i:s' );
                }

                // IP アドレス
                if ( $key == 'send_ip' ) {
                    $this->data['send_ip'] = isset( $_SERVER[ 'REMOTE_ADDR' ] ) ? $_SERVER[ 'REMOTE_ADDR' ] : '';
                }

                // ホスト
                if ( $key == 'send_host' ) {
                    $this->data['send_host'] = isset( $_SERVER[ 'REMOTE_HOST' ] ) ? $_SERVER[ 'REMOTE_HOST' ] : gethostbyaddr($_SERVER['REMOTE_ADDR']);
                }

                // ユーザーエージェント
                if ( $key == 'send_user_agent' ) {
                    $this->data['send_user_agent'] = isset( $_SERVER[ 'HTTP_USER_AGENT' ] ) ? $_SERVER[ 'HTTP_USER_AGENT' ] : '';
                }

                // ラジオボタンその他
                if ( $key == 'rdo_txt' ) {
                    $this->data['rdo'] .= ( $val != '' ) ? '（' . $val . '）' : '';
                }

                // チェックボックスその他
                if ( $key == 'chk_txt' ) {
                    $this->data['chk'] .= ( $val != '' ) ? '（' . $val . '）' : '';
                }

                // 郵便番号
                if ( $key == 'postcode1' ) {
                    $this->data['postcode'] = ( $val != '' ) ? $val : '';
                }
                if ( $key == 'postcode2' ) {
                    $this->data['postcode'] .= ( $val != '' ) ? '-' . $val : '';
                }

                // かなはカタカナ
//                if ( $key == 'fm_kana' ) {
//                    $this->data['fm_kana'] = ( $val != '' ) ? mb_convert_kana( $val, 'KVC', 'UTF-8' ) : '';
//                }

                // メールアドレスチェック
                if ( ( $key == 'fm_mail' )
                    && ( $val != '' )
                   ) {
                    $pattern = "^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$";
                    if ( ! preg_match( '{' . $pattern . '}', $val) ) {
                        $this->error[1] = 'メールアドレスが不正です。';
                    }
                }

                // 添付ファイルチェック
                if ( preg_match( '/^fm_files_[0-9]$/', $key ) ) {
                    if ( ( isset( $_FILES[ $key ][ 'tmp_name' ] ) ) && ( $_FILES[ $key ][ 'tmp_name' ] != '' ) ) {

                        // 一時アップロード先ファイルパス
                        $tmpFile = $_FILES[ $key ][ 'tmp_name' ];
                        // ファイル名
                        $fileName = $_FILES[ $key ][ 'name' ];
                        // ファイルタイプ
                        $fileType = $_FILES[ $key ][ 'type' ];
                        // ファイルサイズ
                        $fileSize = $_FILES[ $key ][ 'size' ];
                        // 正式保存先ファイルパス（ファイル名はユニークにする）
                        $file = FM_WP_IMG_TEMP . date( 'YmdHis' ) . '_' . rand( 1, 100 ) . '_' . $fileName;

                        // ファイルチェック
                        if ( ( $fileType == 'image/jpeg' )
                            || ( $fileType == 'image/gif' )
                            || ( $fileType == 'image/png' )
                            || ( $fileType == 'application/zip' )
                            || ( $fileType == 'application/pdf' )
                            || ( $fileType == 'application/vnd.ms-excel' ) // .xls
                            || ( $fileType == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' ) // .xlsx
                            || ( $fileType == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ) // .docx
                            || ( $fileType == 'application/postscript' ) // .ai
                            || ( $fileType == 'image/x-photoshop' ) // .psd
                           ) {
                            // ファイル移動
                            $result = @move_uploaded_file( $tmpFile, $file );

                            if ( $result === true ) {
                                @chmod( $file, 0755 );
                                $this->data[ $key ]  = FM_WP_IMG_URL . basename( $file );
                                $this->data[ $key . '_name' ] = $fileName;

                            } else {
                                $this->data[ $key . '_name' ] = 'ファイルの取得に失敗しました。';
                            }

                        } else {
                            $this->data[ $key . '_name' ] = 'ファイルの取得に失敗しました。';
                        }

                    } else {
                        if ( ( isset( $this->data[ $key . '_temp' ] ) ) && ( $this->data[ $key . '_temp' ] == '' ) ) {
                            $this->data[ $key . '_name' ] = 'ファイルは添付されていません。';
                        }
                    }
                }
                // 一時ディレクトリに移されたファイルは扱いやすいように絶対パスにして$this->filesにまとめておく
                if ( preg_match( '/^fm_files_[0-9]_temp$/', $key ) ) {
                    if ( $val ) {
                        $this->files[] = FM_WP_IMG_TEMP . basename( $val );
                    }
                }
            }
            return true;

        } else {
            return false;
        }
    }

    // send
    protected function send()
    {
        // メールアドレスの存在チェック
        $mail = ( isset( $this->data['fm_mail'] ) && $this->data['fm_mail'] != '' ) ? $this->data['fm_mail'] : '';
        $name = ( isset( $this->data['fm_name'] ) && $this->data['fm_name'] != '' ) ? $this->data['fm_name'] : '';

        // 管理者へのメールのフォーマットを取得
        list( $_subject, $_content ) = $this->mailFormat( $this->data );

        // WPに保存する
        $this->saveWP( $this->data );
        // 管理者へメール送信
        if ( $this->mail_utf8 (
            FM_MAIL_ADMIN_MAIL,
            FM_MAIL_ADMIN_NAME,
            $_subject,
            $_content,
            $reply_mail = $mail,
            $reply_name = $name,
            $bcc        = FM_MAIL_ADMIN_MAIL_BCC_FLG,
            $attachments= $this->files
        )
           ) {
            if ( FM_MAIL_USER_TITLE != '' && FM_MAIL_USER_BODY != '' && $mail != '' ) {
                // 自動返信のメールフォーマットを取得
                list( $_reply_subject, $_reply_content ) = $this->mailFormatReply( $this->data );
                // 送信
                $this->mail_utf8( $mail, $name, $_reply_subject, $_reply_content );
            }
            return true;

        } else {
            return false;
        }
    }

    // mail UTF-8(特殊文字も文字化けしない。ガラケーでは読めない)
    private function mail_utf8( $to, $name, $subject, $message,
                               $reply_mail=FM_MAIL_ADMIN_MAIL, $reply_name=FM_MAIL_ADMIN_NAME, $bcc=false, $attachments=array() )
    {
        // wp_mailで送信する
        if ( FM_WP_FLG === true ) {

            $headers   = array();
            $headers[] = 'From: ' . FM_MAIL_ADMIN_NAME . ' <' . FM_MAIL_ADMIN_MAIL . '>';
            $headers[] = 'Reply-To: ' . $reply_name . ' <' . $reply_mail . '>';

            // BCC
            if ( $bcc ) {
                $arr = explode( ',', FM_MAIL_ADMIN_MAIL_BCC );
                if ( count( $arr ) > 0 ) {
                    foreach( $arr as $val ) {
                        $headers[] = 'Bcc: ' . $val . ' <' . $val . '>';
                    }
                }
            }
            return wp_mail( $to, $subject, $message, $headers, $attachments );

        }
        // PHPMailerで送信する
        else {

            $mail = new PHPMailer( true );

            try {

                $mail->CharSet  = 'UTF-8';
                $mail->Encoding = 'base64';

                $mail->setFrom( FM_MAIL_ADMIN_MAIL, FM_MAIL_ADMIN_NAME );
                $mail->addAddress( $to, $name );
                $mail->addReplyTo( $reply_mail, $reply_name );

                // BCC
                if ( $bcc ) {
                    $arr = explode( ',', FM_MAIL_ADMIN_MAIL_BCC );
                    if ( count( $arr ) > 0 ) {
                        foreach( $arr as $val ) {
                            $mail->addBCC( $val );
                        }
                    }
                }

                // Attachments
                if ( count( $this->files ) > 0 ) {
                    $mail->addAttachment( $this->files );
                    // 自動返信にはファイルは含めないのでリセットする。
                    $this->files = array();
                }

                //$mail->isHTML( true );
                $mail->Subject = $subject;
                $mail->Body    = $message;

                $mail->send();

                return true;

            } catch ( Exception $e ) {
                //echo 'Mailer Error: ' . $mail->ErrorInfo;
                return false;
            }
        }
    }
    
    // mb_send_mail で送信する
    private function send_mail_utf8( $to, $subject, $message, $reply, $bcc=false )
    {
        //  mail() の設定
        @mb_language( 'ja' );
        // 文字コード指定
        @mb_internal_encoding( 'UTF-8' );

        $reply = ( $reply != '' ) ? $reply : FM_MAIL_ADMIN_MAIL; // 返信先が空だった場合、デフォルトのアドレスをセット

        // 改行コードを統一しないと Outlook で文字化ける。
        $message = preg_replace( "/\r\n|\r|\n/", "\r\n", $message );
        // 文字コード変換
        $message = ($message !== '') ? mb_convert_encoding( $message, 'UTF-8' ) : '';
        //（タイトルは変換しない方が文字化けしない？）
        $subject = ($subject !== '') ? mb_convert_encoding( $subject, 'UTF-8' ) : '';

        // 添付ファイルがあるか。
        $filesFlg = false;
        if ( count( $this->files ) > 0 ) {
            $filesFlg = true;
        }

        $boundary = '_boundary_' . uniqid ( rand( 1000, 9999 ) . '_' ) . '_';

        // ヘッダー情報
        $headers = array();
        $headers[] = "From: \"" . mb_encode_mimeheader( FM_MAIL_ADMIN_NAME, 'UTF-8', 'B', "\r\n" ) . "\""."<" . mb_encode_mimeheader( FM_MAIL_ADMIN_MAIL, 'UTF-8', 'B', "\r\n" ) . ">";

        if ( $bcc ) {
            $arr = explode( ',', FM_MAIL_ADMIN_MAIL_BCC );
            if ( count( $arr ) > 0 ) {
                foreach( $arr as $val ) {
                    $headers[] = "Bcc: " . mb_encode_mimeheader( $val, 'UTF-8', 'B', "\r\n" );
                }
            }
        }

        $headers[] = "MIME-Version: 1.0";

        // 添付ファイルがあれば、mixed にする。
        if ( $filesFlg ) {
            $headers[] = "Content-Type: multipart/mixed; boundary=\"{$boundary}\""; // バウンダリを指定
        } else {
            $headers[] = "Content-Type: multipart/alternative; boundary=\"{$boundary}\""; // バウンダリを指定
        }
        // 文字列化
        $additional_headers = implode( "\r\n", $headers );

        $bodys = array();
        // 本文
        if ( $filesFlg ) {
            $bodys[] = "--{$boundary}";
            $bodys[] = "Content-Type: text/plain; charset=\"UTF-8\"";
            $bodys[] = "Content-Transfer-Encoding: Base64";
            $bodys[] = "Content-Disposition: inline\r\n";
            $bodys[] = chunk_split( base64_encode( $message ) );
        } else {
            $bodys[] = "--{$boundary}";
            $bodys[] = "Content-Type: text/plain; charset=\"UTF-8\"";
            $bodys[] = "Content-Transfer-Encoding: Base64";
            $bodys[] = "Content-Disposition: inline\r\n";
            $bodys[] = chunk_split( base64_encode( $message ) );
            $bodys[] = "--{$boundary}--";
        }

        // ファイルがあれば添付する。
        if ( $filesFlg ) {

            $file = isset( $this->files['file'] ) ? $this->files['file'] : '';
            $name = isset( $this->files['name'] ) ? $this->files['name'] : '';
            $type = isset( $this->files['type'] ) ? $this->files['type'] : '';

            if ( file_exists( $file ) ) {
                // ファイル名の文字コードも統一する。
                $fileName = mb_encode_mimeheader( $name, 'UTF-8', 'B', "\r\n" );

                // ファイルを展開
                $handle = fopen( $file, 'r' );
                $attachFile = fread( $handle, filesize( $file ) );
                fclose( $handle );
                $attachEncode = base64_encode( $attachFile );
                // ファイルを削除
                unlink( $file );

                // 添付
                $bodys[] = "--{$boundary}";
                $bodys[] = "Content-Type: " . $type . "; name=\"" . $fileName . "\"";
                $bodys[] = "Content-Transfer-Encoding: Base64";
                $bodys[] = "Content-Disposition: attachment; filename=\"" . $fileName . "\"\r\n";
                $bodys[] = chunk_split( $attachEncode );
                $bodys[] = "--{$boundary}--";

            } else {
                $str = mb_convert_encoding( '【ファイルの添付に失敗しました。】', 'UTF-8' );
                $bodys[] = chunk_split( base64_encode( $str ) );
                $bodys[] = "--{$boundary}--";
            }

            // 自動返信にはファイルは含めないので、リセットする。
            $this->files = array();
        }
        $body = implode( "\r\n", $bodys );

        // セーフモードが ON の場合は第5引数が使えません。
        if ( ini_get( 'safe_mode' ) ) {
            $result = mb_send_mail( $to, $subject, $body, $additional_headers );
        } else {
            $result = mb_send_mail( $to, $subject, $body, $additional_headers, '-f ' . FM_MAIL_ERR_MAIL );
        }

        return $result;
    }

    // WPに保存する
    private function saveWP( $data )
    {
        if ( is_array( $data ) ) {
            // 必要な処理を記述
        }
    }

    // tempディレクトリを空にする
    public function clearDir()
    {
        // 削除期限
        $expire = strtotime( '24 hours ago' );

        $list = scandir( FM_WP_IMG_TEMP );
        foreach( $list as $name ){
            $file = FM_WP_IMG_TEMP . $name;
            if( ! is_file ( $file ) ) continue;
            $modified = filemtime( $file );
            if ( $modified < $expire ) {
                @unlink( $file );
            }
        }
    }
    
    // カウンター（連番）ファイルを用意する
    public function counterFile()
    {
        $counter_file = FM_WP_COUNTER_TXT;
        
        clearstatcache();
        $i = 0;
        if ( file_exists( $counter_file ) ) {
            $fh = fopen( $counter_file, 'r+' );
            while(1) {
                if ( flock( $fh, LOCK_EX ) ) {
                    $buffer = chop( fread( $fh, filesize( $counter_file ) ) );
                    $buffer++;
                    rewind( $fh );
                    fwrite( $fh, $buffer );
                    fflush( $fh );
                    ftruncate( $fh, ftell( $fh ) );     
                    flock( $fh, LOCK_UN );
                    break;
                }
                usleep( 100000 ); // 0.1秒遅延
                $i++;
                if ( $i > 50 ) break;
            }
        }
        else {
            $fh = fopen( $counter_file, 'w+' );
            fwrite( $fh, "1" );
            $buffer = "1";
        }
        fclose($fh);
        
        echo $buffer;
    }

    // 管理者へのメールを変換する
    private function mailFormat( $arr )
    {
        // 変換するフォームの値
        $search = array();
        foreach ( $arr as $key => $val ) {
            $search[] = '[' . $key . ']';
        }
        // タイトル
        $_subject = FM_MAIL_ADMIN_TITLE;
        // 本文
        $_content = str_replace( $search, $arr, FM_MAIL_ADMIN_BODY ); // 変換する
        // 戻す
        return array( $_subject, $_content );
    }

    // 自動返信のメールを変換する
    private function mailFormatReply( $arr )
    {
        // 変換するフォームの値
        $search = array();
        foreach ( $arr as $key => $val ) {
            $search[] = '[' . $key . ']';
        }
        // タイトル
        $_reply_subject = FM_MAIL_USER_TITLE;
        // 本文
        $_reply_content = str_replace( $search, $arr, FM_MAIL_USER_BODY ); // 変換する
        // 戻す
        return array( $_reply_subject, $_reply_content );
    }

    // トークンを生成
    protected function createToken()
    {
        $code = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJLKMNOPQRSTUVWXYZ0123456789';
        $token = substr( str_shuffle( $code ), 0, 30 );

        $_SESSION[ 'FM_Mail_token' ] = $token;
        return $token;
    }

    // トークンを削除
    protected function removeToken()
    {
        if ( isset( $_SESSION[ 'FM_Mail_token' ] ) ) {
            unset( $_SESSION[ 'FM_Mail_token' ] );
        }
    }

    // トークンのチェック
    protected function checkToken()
    {
        $post_token = filter_input( INPUT_POST, 'token', FILTER_UNSAFE_RAW );

        // ワンタイムトークンチェック
        if ( empty( $_SESSION[ 'FM_Mail_token' ] ) || ( empty( $post_token ) ) || ( $post_token !== $_SESSION[ 'FM_Mail_token' ] )
           ) {
            // トークンは削除する。
            unset( $_SESSION[ 'FM_Mail_token' ] );
            return false;
        } else {
            return true;
        }
    }

    // json
    protected function createJson( $arr )
    {
        header("Content-Type: application/json; charset=utf-8");
        echo json_encode( $arr );
    }

    // select
    protected function createSelect( $arr, $selected, $space=false )
    {
        $html = array();

        if ( $space ) $html[] = '<option value="">選択してください</option>';

        foreach ( $arr as $key => $val ) {
            if ( $selected == $val ) {
                $html[] = '<option value="' . $val . '" selected>' . $val . '</option>';
            } else {
                $html[] = '<option value="' . $val . '">' . $val . '</option>';
            }
        }
        echo implode( "\n", $html ), "\n";
    }

    // select custom
    protected function createSelectCustom( $arr, $selected, $space=false )
    {
        $html = array();

        if ( $space ) $html[] = '<option value="">選択してください</option>';

        foreach ( $arr as $k => $v ) {
            $html[] = '<optgroup label="' . $k . '">';
            foreach ( $v as $val ) {
                if ( $selected == $val ) {
                    $html[] = '<option value="' . $val . '" selected>' . $val . '</option>';
                } else {
                    $html[] = '<option value="' . $val . '">' . $val . '</option>';
                }
            }
            $html[] = '</optgroup>';
        }
        echo implode( "\n", $html ), "\n";
    }

    // radio
    protected function createRadio( $name, $arr, $selected )
    {
        $html = array();
        foreach ( $arr as $key => $val ) {

            $html[] = '<li>';

            $id = $name . '_' . $key . '_' . rand( 10, 99 );

            $agree = '';
            //if ( $val == '同意する' ) $agree = '<span class="essential">必須</span>';

            if ( $selected === $val ) {
                $html[] = '<input type="radio" name="' . $name . '" id="' . $id . '" value="' . $val . '" checked><label for="' . $id . '">' . $val . $agree . '</label>';
            } else {
                $html[] = '<input type="radio" name="' . $name . '" id="' . $id . '" value="' . $val . '"><label for="' . $id . '">' . $val . $agree . '</label>';
            }

            $html[] = '</li>';
        }
        echo implode( "\n", $html ), "\n";
    }

    // radio custom
    protected function createRadioCustom( $name, $arr, $selected )
    {
        $html = array();
        foreach ( $arr as $key => $val ) {

            $id = $name . '_' . $key;

            if ( $val === 'その他' ) {

                $txt = isset( $_POST[ $name . '_txt' ] ) ? $_POST[ $name . '_txt' ] : '';

                if ( $selected === $val ) {
                    $html[] = '<li><input type="radio" name="' . $name . '" id="' . $id . '" value="' . $val . '" checked><label for="' . $id . '">' . $val . '</label><input type="text" name="' . $name . '_txt" value="' . $txt . '"></li>';
                } else {
                    $html[] = '<li><input type="radio" name="' . $name . '" id="' . $id . '" value="' . $val . '"><label for="' . $id . '">' . $val . '</label><input type="text" name="' . $name . '_txt" value="' . $txt . '"></li>';
                }

            } else {
                if ( $selected === $val ) {
                    $html[] = '<li><input type="radio" name="' . $name . '" id="' . $id . '" value="' . $val . '" checked><label for="' . $id . '">' . $val . '</label></li>';
                } else {
                    $html[] = '<li><input type="radio" name="' . $name . '" id="' . $id . '" value="' . $val . '"><label for="' . $id . '">' . $val . '</label></li>';
                }
            }

        }
        echo implode( "\n", $html ), "\n";
    }

    // checkbox
    protected function createCheckbox( $name, $arr, $selected )
    {
        $html = array();
        foreach ( $arr as $key => $val ) {

            $html[] = '<li>';

            $tmp = $name . '[' . $key . ']';
            $id  = $name . '_' . $key;

            if ( is_array( $selected ) ) {
                if ( array_search( $val, $selected ) !== false ) {
                    $html[] = '<input type="hidden" name="' . $tmp . '" value="">';
                    $html[] = '<input type="checkbox" name="' . $tmp . '" id="' . $id . '" value="' . $val . '" checked>';
                    $html[] = '<label for="' . $id . '">' . $val . '</label>';
                    continue;
                }
            }
            else if ( $selected === $val ) {
                $html[] = '<input type="hidden" name="' . $tmp . '" value="">';
                $html[] = '<input type="checkbox" name="' . $tmp . '" id="' . $id . '" value="' . $val . '" checked>';
                $html[] = '<label for="' . $id . '">' . $val . '</label>';
                continue;
            }
            $html[] = '<input type="hidden" name="' . $tmp . '" value="">';
            $html[] = '<input type="checkbox" name="' . $tmp . '" id="' . $id . '" value="' . $val . '">';
            $html[] = '<label for="' . $id . '">' . $val . '</label>';

            $html[] = '</li>';
        }
        echo implode( "\n", $html ), "\n";
    }

    // one checkbox
    protected function createOneCheckbox( $name, $arr, $selected )
    {
        $key = 0;
        $val1 = isset( $arr[0] ) ? $arr[0] : '';
        $val2 = isset( $arr[1] ) ? $arr[1] : '';

        $tmp = $name . '[' . $key . ']';
        $id  = $name . '_' . $key;

        $html = array();

        if ( is_array( $selected ) && ( array_search( $val1, $selected ) !== false ) ) {
            $html[] = '<input type="hidden" name="' . $tmp . '" value="' . $val2 . '">';
            $html[] = '<input type="checkbox" name="' . $tmp . '" id="' . $id . '" value="' . $val1 . '" checked>';
            $html[] = '<label for="' . $id . '">' . $val1 . '</label>';

        } else {
            $html[] = '<input type="hidden" name="' . $tmp . '" value="' . $val2 . '">';
            $html[] = '<input type="checkbox" name="' . $tmp . '" id="' . $id . '" value="' . $val1 . '">';
            $html[] = '<label for="' . $id . '">' . $val1 . '</label>';
        }

        echo implode( "\n", $html ), "\n";
    }

    // checkbox custom
    protected function createCheckboxCustom( $name, $arr, $selected )
    {
        $html = array();
        $i = 0;
        foreach ( $arr as $key => $val ) {

            $html[] = '<li>';

            foreach ( $val as $k => $v ) {

                $tmp = $name . '[' . $i . ']';
                $id  = $name . '_' . $i;

                if ( $selected ) {
                    if ( array_search( $v, $selected ) !== false ) {
                        $html[] = '<input type="hidden" name="' . $tmp . '" value="">';
                        $html[] = '<input type="checkbox" name="' . $tmp . '" id="' . $id . '" value="' . $v . '" checked>';
                        $html[] = '<label for="' . $id . '">' . $v . '</label>';
                        $i++;
                        continue;
                    }
                }
                $html[] = '<input type="hidden" name="' . $tmp . '" value="">';
                $html[] = '<input type="checkbox" name="' . $tmp . '" id="' . $id . '" value="' . $v . '">';
                $html[] = '<label for="' . $id . '">' . $v . '</label>';

                $i++;
            }

            $html[] = '</li>';
        }
    }

    // HTML エンティティ と改行処理
    public function h( $str )
    {
        // 特殊文字変換
        $search  = array( '\\', '"', "''", "'", '...' );
        $replace = array(   '', '“',  '”', '‘',   '…' );
        $str = str_replace( $search, $replace, $str );

        // HTML エンティティ
        $str = htmlspecialchars( $str, ENT_QUOTES, 'UTF-8' );
        // 改行変換
        $str = str_replace( array( "\r\n", "\r", "\n" ), '<br />', $str );
        return $str;
    }

    // get
    public function getData( $str='' )
    {
        return isset( $this->data[ $str ] ) ? $this->data[ $str ] : '';
    }

    // set
    public function setValue( $name, $arr, $default='', $type=1 )
    {
        $selected = isset( $this->data[ $name ] ) ? $this->data[ $name ] : $default;

        // 1:select, 2:radio, 3:checkbox, 4:one checkbox, 5:select custom, 6:radio custom, 7:checkbox custom
        switch ( $type )
        {
            case 1:
                $this->createSelect( $arr, $selected );
                break;
            case 2:
                $this->createRadio( $name, $arr, $selected );
                break;
            case 3:
                $this->createCheckbox( $name, $arr, $selected );
                break;
            case 4:
                $this->createOneCheckbox( $name, $arr, $selected );
                break;
            case 5:
                $this->createSelectCustom( $arr, $selected );
                break;
            case 6:
                $this->createRadioCustom( $name, $arr, $selected );
                break;
            case 7:
                $this->createCheckboxCustom( $name, $arr, $selected );
                break;

            default:
                break;
        }
    }

    // view
    public function view( $str='' )
    {
        echo $this->h( $this->getData( $str ) );
    }

    // view post data
    public function view_post( $str='' )
    {
        return $this->getData( $str );
    }

    // エラーチェック
    public function checkError()
    {
        if ( count( $this->error ) > 0 ) {
            return false;
        } else {
            return true;
        }
    }
}


// 入力画面
class FM_Mail_Input extends FM_Mail {

    public $token = '';

    public function __construct()
    {
        parent::__construct();

        if ( $this->checkToken() ) {
            if ( $this->post() ) {
                $this->token = $_SESSION[ 'FM_Mail_token' ];
                $this->data  = $_POST;
            } else {
                $this->data = array();
            }
        } else {
            $this->token = $this->createToken();
        }
    }

    // POST値
    public function getPost( $str )
    {
        echo isset( $this->data[ $str ] ) ? $this->data[ $str ] : '';
    }

    // address
    public function setAddress()
    {
        $name    = 'address1';
        $arr     = array(
            '北海道・東北地方' => array( '北海道', '青森県', '岩手県', '秋田県', '宮城県', '山形県', '福島県' ),
            '関東地方' => array( '東京都', '神奈川県', '埼玉県', '千葉県', '茨城県', '栃木県', '群馬県' ),
            '甲信越地方' => array( '山梨県', '長野県', '新潟県' ),
            '東海地方' => array( '静岡県', '愛知県', '岐阜県', '三重県' ),
            '北陸地方' => array( '富山県', '石川県', '福井県' ),
            '近畿地方' => array( '大阪府', '京都府', '奈良県', '滋賀県', '和歌山県', '兵庫県' ),
            '中国地方' => array( '岡山県', '広島県', '鳥取県', '島根県', '山口県' ),
            '四国地方' => array( '香川県', '徳島県', '愛媛県', '高知県' ),
            '九州・沖縄地方' => array( '福岡県', '佐賀県', '長崎県', '大分県', '熊本県', '宮崎県', '鹿児島県', '沖縄県' )
        );
        $default = '';

        $this->setValue( $name, $arr, $default, 5 );
    }

    // agree
    public function setAgree()
    {
        $name    = 'agree';
        $arr     = array( '同意する', '同意しない' );
        $default = '同意しない';

        $this->setValue( $name, $arr, $default, 2 );
    }

    // select1
    public function setSelect1()
    {
        $name    = 'select1';
        $arr     = array( 'AAA', 'BBB', 'CCC' );
        $default = '';

        $this->setValue( $name, $arr, $default, 1 );
    }

    // radio1
    public function setRadio1()
    {
        $name    = 'rdo';
        $arr     = array( 'radioA', 'radioB', 'radioC' );
        $default = '';

        $this->setValue( $name, $arr, $default, 2 );
    }

    // one checkbox
    public function setOneCheckbox()
    {
        $name    = 'oneChk';
        $arr     = array( '希望する', '希望しない' );
        $default = '';

        $this->setValue( $name, $arr, $default, 4 );
    }

    // checkbox1
    public function setCheckbox1()
    {
        $name    = 'chk';
        $arr     = array( 'checkboxA', 'checkboxB', 'checkboxC' );
        $default = '';

        $this->setValue( $name, $arr, $default, 3 );
    }

    // checkbox2
    public function setCheckbox2()
    {
        $name    = 'chk2';
        $arr     = array();
        $arr[0]  = array( 'checkboxA-1', 'checkboxA-2', 'checkboxA-3' );
        $arr[1]  = array( 'checkboxB-1', 'checkboxB-2' );
        $arr[2]  = array( 'checkboxC以上' );
        $default = '';

        $this->setValue( $name, $arr, $default, 7 );
    }
}

// 確認画面
class FM_Mail_Confirm extends FM_Mail {

    public function __construct()
    {
        parent::__construct();

        // トークンチェック
        if ( $this->checkToken() ) {
            // 入力値チェック
            if ( ! $this->post() ) {
                $this->error[] = '不正なページ遷移です。';
            }
        } else {
            $this->error[] = '不正なページ遷移です。';
        }
    }

    // GET Input
    public function getInput()
    {
        $_post_arr = $this->_post_arr;

        $html = array();

        if ( $_POST ) {
            foreach ( $_POST as $key => $value ) {

                $val = isset( $_POST[ $key ] ) ? $_POST[ $key ] : '';

                if ( is_array( $val ) ) {
                    foreach ( $val as $k => $v ) {
                        $html[] = '<input type="hidden" name="' . $key . '[' . $k . ']" value="' . $v . '">';
                    }
                } else {
                    // htmlspecialchars
                    //$val = htmlspecialchars( $val, ENT_QUOTES, 'UTF-8' );

                    // 特殊文字変換
                    $search  = array( '\\', '"', "''", "'", '...' );
                    $replace = array(   '', '“',  '”', '‘',   '…' );
                    $val = str_replace( $search, $replace, $val );

                    if ( strpos( $key, 'fm_files_' ) === false ) { // 添付ファイルは別処理する
                        $html[] = '<input type="hidden" name="' . $key . '" value="' . $val . '">';
                    }
                }
            }

            // 添付ファイル
            if ( count( $this->data ) > 0 ) {
                foreach ( $this->data as $key => $val ) {
                    // 添付ファイルがあるか
                    if ( strpos( $key, 'fm_files_' ) !== false ) {
                        // 一時ファイル
                        if ( preg_match( '/^fm_files_[0-9]$/', $key ) ) {
                            $html[] = '<input type="hidden" name="' . $key . '_temp" value="' . $val . '">';                       
                        }
                        // ファイル名
                        if ( preg_match( '/^fm_files_[0-9]_name$/', $key ) ) {
                            $html[] = '<input type="hidden" name="' . $key . '" value="' . $val . '">';                       
                        }
                    }
                }
            }

            echo implode( "\n", $html ), "\n";
        }
    }

    // GET Error
    public function getError()
    {
        foreach ( $this->error as $val ) {
            echo '<li>', $val, '</li>';
        }
    }
}

// 完了画面
class FM_Mail_Complete extends FM_Mail {

    public function __construct()
    {
        parent::__construct();

        // トークンチェック
        if ( $this->checkToken() ) {
            // 入力値チェック
            if ( ! $this->post() ) {
                $this->error[] = '不正なページ遷移です。';
            }
        } else {
            $this->error[] = '不正なページ遷移です。';
        }

        $this->action();
    }

    // アクション
    public function action()
    {
        // メール送信
        if ( count( $this->error ) === 0 ) {

            // トークンは削除
            $this->removeToken();

            if ( ! $this->send() ) {
                $this->error[] = 'メールの送信に失敗しました。';
            } else {

            }
        }
    }

    // GET Error
    public function getError()
    {
        foreach ( $this->error as $val ) {
            echo '<li>', $val, '</li>';
        }
    }
}
?>