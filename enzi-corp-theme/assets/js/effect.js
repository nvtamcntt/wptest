

// スクロールエフェクト
$(function () {
    // var headerHeight = 0; //ヘッダの高さ
	// if($(window).width() > 768) {
	// 	headerHeight = 120;
	// } else {
	// 	headerHeight = 55;
	// }
	var headerHeight = $('header').height();
    $('a[href^="#"]').click(function(){
        var href= $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        if ( target.length > 0 ) {
            var position = target.offset().top-headerHeight;
            $("html, body").animate({scrollTop:position}, 550, "swing");
            return false;
        }
    });
})

// ブログサムネイル 中心でトリミング
$(function () {
    if ( $('.obj_image').length > 0 ) {
        objectFitImages('.obj_image');
    }
});


// ヘッダーの固定エフェクト
(function($) {
	// var headerHeight;
	// if($(window).width() > 768) {
	// 	headerHeight = 120;
	// } else {
	// 	headerHeight = 55;
	// }
	var headerHeight = $('header').height();
    $(function() {
        var $header = $('header');
        $(window).scroll(function() {
            if ($(window).scrollTop() > 50) {
                $header.addClass('fixed');
            } else {
                $header.removeClass('fixed');
            }
        });
    });
})(jQuery);



// レスポンシブ画像切り替え imgにclass「js-image-switch」
$(function() {
	// 該当なしでも
	if ( $('.js-image-switch').length > 0 ) {
		
		var $elem = $('.js-image-switch');
		var sp = '_sp.';
		var pc = '_pc.';
		// 画像を切り替えるウィンドウサイズ
		var replaceWidth = 768;

		function imageSwitch() {
			var windowWidth = parseInt($(window).width());
			$elem.each(function() {
				var $this = $(this);
				if(windowWidth >= replaceWidth) {
				$this.attr('src', $this.attr('src').replace(sp, pc));
				} else {
					$this.attr('src', $this.attr('src').replace(pc, sp));
				}
			});
		}
		imageSwitch();

		var resizeTimer;
		$(window).on('resize', function() {
			clearTimeout(resizeTimer);
			resizeTimer = setTimeout(function() {
				imageSwitch();
			}, 200);
		});
	}
});




// アコーディオンの起動
$(function(){
	
	// 該当なしでも
	if ( $('dl.accordion dt').length > 0 ) {
		
		$("dl.accordion dt").click(function(){
			
			$(this).next("dd").slideToggle();
			$(this).toggleClass("open");
		});
	}
});



// ドロワーメニュー
$(function () {
    
    $('#toggle').click(function () {
        $(this).toggleClass('toggle_active');
        $('.drawer_bg').fadeToggle();
        $('.drawer').toggleClass('drawer_open');
        $('nav').toggleClass('is_open');
        
        if ($(this).hasClass('toggle_active')) {
            $('nav').removeClass('is_close');
        } else {
            $('nav').addClass('is_close');
        }
    });
    
    $('.drawer_bg').click(function () {
        $(this).fadeOut();
        $('#toggle').removeClass('toggle_active');
        $('.drawer').removeClass('drawer_open');
        $('nav').removeClass('is_open');
        $('nav').addClass('is_close');
    });
    
    // エリア内リンク用
    $('nav a').on('click', function(){
        if (window.innerWidth <= 768) {
            $('#toggle').click();
        }
    });
    
});


// ドロワー内アコーディオンの起動
$(function(){
	// 該当なしでも
	if ( $('nav ul.sub_menu').length > 0 ) {
		
		$('nav ul.sub_menu').before('<div class="lower_menu"></div>');
		
		$('div.lower_menu').on("click", function(){
			if (window.innerWidth <= 768) {
				//$(this).next("ul.sub_menu").toggleClass("open");
				$(this).parent().toggleClass("open");
			}
		});
	}
});




// facebookプラグインリサイズ処理
$(function () {
	// 該当なしでも
	if ( $('#pageplugin').length > 0 ) {

		var windowWidth = $(window).width();
		var htmlStr = $('#pageplugin').html();
		var timer = null;
		$(window).on('resize',function() {
			var resizedWidth = $(window).width();
			if(windowWidth != resizedWidth && resizedWidth < 500) {
				clearTimeout(timer);
				timer = setTimeout(function() {
					$('#pageplugin').html(htmlStr);
					window.FB.XFBML.parse();
			   //window.FB.XFBML.parse()で再レンダリングします。
					var windowWidth = $(window).width();
				}, 500);
			}
		});
	}
});

// TOPのパーティクルアニメーション
$(function () {
	$(window).on("load", function() {
		
		
		// first view
		
		if ($(window).width() > 768) {
		
			if ($('div.front div#bg_particles').length > 0) {

				
			
				particlesJS('bg_particles',{
				"particles":{

					//--シェイプの設定----------
						"number":{
							"value":150, //シェイプの数
							"density":{
								"enable":true, //シェイプの密集度を変更するか否か
								"value_area":800 //シェイプの密集度
							}
						},
						"color":{
							"value":"#333333" //シェイプの色
						},
						"opacity":{
							"value":0.5, //シェイプの透明度
							"random":true, //シェイプの透明度をランダムにするか否か
							"anim":{
								"enable":false, //シェイプの透明度をアニメーションさせるか否か
								"speed":10, //アニメーションのスピード
								"opacity_min":0.3, //透明度の最小値
								"sync":false //全てのシェイプを同時にアニメーションさせるか否か
							}
						},
						"size":{
							"value":4, //シェイプの大きさ
							"random":true, //シェイプの大きさをランダムにするか否か
							"anim":{
								"enable":false, //シェイプの大きさをアニメーションさせるか否か
								"speed":40, //アニメーションのスピード
								"size_min":1, //大きさの最小値
								"sync":false //全てのシェイプを同時にアニメーションさせるか否か
							}
						},
					//--------------------

					//--線の設定----------
						"line_linked":{
							"enable":true, //線を表示するか否か
							"distance":180, //線をつなぐシェイプの間隔
							"color":"#333333", //線の色
							"opacity":0.4, //線の透明度
							"width":1 //線の太さ
						},
					//--------------------

					//--動きの設定----------
						"move":{
							"speed":0.5, //シェイプの動くスピード
							"straight":false, //個々のシェイプの動きを止めるか否か
							"direction":"none", //エリア全体の動き(none、top、top-right、right、bottom-right、bottom、bottom-left、left、top-leftより選択)
							"out_mode":"out" //エリア外に出たシェイプの動き(out、bounceより選択)
						}
					//--------------------

					},

					"interactivity":{
						"detect_on":"canvas",
						"events":{

							//--マウスオーバー時の処理----------
							"onhover":{
								"enable":false, //マウスオーバーが有効か否か
								"mode":"repulse" //マウスオーバー時に発動する動き(下記modes内のgrab、repulse、bubbleより選択)
							},
							//--------------------

							//--クリック時の処理----------
							"onclick":{
								"enable":false, //クリックが有効か否か
								"mode":"push" //クリック時に発動する動き(下記modes内のgrab、repulse、bubble、push、removeより選択)
							},
							//--------------------

						}
					},
					"retina_detect":true, //Retina Displayを対応するか否か
					"resize":true //canvasのサイズ変更にわせて拡大縮小するか否か
				});
			}
				
			
		
			if ($('div.front div#bg_particles_l').length > 0) {
					
				particlesJS('bg_particles_l',{
				"particles":{

					//--シェイプの設定----------
						"number":{
							"value":250, //シェイプの数
							"density":{
								"enable":true, //シェイプの密集度を変更するか否か
								"value_area":750 //シェイプの密集度
							}
						},
						"color":{
							"value":"#cccccc" //シェイプの色
						},
						"opacity":{
							"value":1, //シェイプの透明度
							"random":true, //シェイプの透明度をランダムにするか否か
							"anim":{
								"enable":false, //シェイプの透明度をアニメーションさせるか否か
								"speed":10, //アニメーションのスピード
								"opacity_min":0.8, //透明度の最小値
								"sync":false //全てのシェイプを同時にアニメーションさせるか否か
							}
						},
						"size":{
							"value":4, //シェイプの大きさ
							"random":true, //シェイプの大きさをランダムにするか否か
							"anim":{
								"enable":false, //シェイプの大きさをアニメーションさせるか否か
								"speed":40, //アニメーションのスピード
								"size_min":1, //大きさの最小値
								"sync":false //全てのシェイプを同時にアニメーションさせるか否か
							}
						},
					//--------------------

					//--線の設定----------
						"line_linked":{
							"enable":true, //線を表示するか否か
							"distance":120, //線をつなぐシェイプの間隔
							"color":"#cccccc", //線の色
							"opacity":1, //線の透明度
							"width":1 //線の太さ
						},
					//--------------------

					//--動きの設定----------
						"move":{
							"speed":1.5, //シェイプの動くスピード
							"straight":false, //個々のシェイプの動きを止めるか否か
							"direction":"none", //エリア全体の動き(none、top、top-right、right、bottom-right、bottom、bottom-left、left、top-leftより選択)
							"out_mode":"out" //エリア外に出たシェイプの動き(out、bounceより選択)
						}
					//--------------------

					},

					"interactivity":{
						"detect_on":"canvas",
						"events":{

							//--マウスオーバー時の処理----------
							"onhover":{
								"enable":false, //マウスオーバーが有効か否か
								"mode":"repulse" //マウスオーバー時に発動する動き(下記modes内のgrab、repulse、bubbleより選択)
							},
							//--------------------

							//--クリック時の処理----------
							"onclick":{
								"enable":false, //クリックが有効か否か
								"mode":"push" //クリック時に発動する動き(下記modes内のgrab、repulse、bubble、push、removeより選択)
							},
							//--------------------

						}
					},
					"retina_detect":true, //Retina Displayを対応するか否か
					"resize":true //canvasのサイズ変更にわせて拡大縮小するか否か
				});
			}
			
		
		} else {
			
			if ($('div.front div#bg_particles').length > 0) {

				
			
				particlesJS('bg_particles',{
				"particles":{

					//--シェイプの設定----------
						"number":{
							"value":250, //シェイプの数
							"density":{
								"enable":true, //シェイプの密集度を変更するか否か
								"value_area":500 //シェイプの密集度
							}
						},
						"color":{
							"value":"#333333" //シェイプの色
						},
						"opacity":{
							"value":0.5, //シェイプの透明度
							"random":true, //シェイプの透明度をランダムにするか否か
							"anim":{
								"enable":false, //シェイプの透明度をアニメーションさせるか否か
								"speed":10, //アニメーションのスピード
								"opacity_min":0.3, //透明度の最小値
								"sync":false //全てのシェイプを同時にアニメーションさせるか否か
							}
						},
						"size":{
							"value":4, //シェイプの大きさ
							"random":true, //シェイプの大きさをランダムにするか否か
							"anim":{
								"enable":false, //シェイプの大きさをアニメーションさせるか否か
								"speed":40, //アニメーションのスピード
								"size_min":1, //大きさの最小値
								"sync":false //全てのシェイプを同時にアニメーションさせるか否か
							}
						},
					//--------------------

					//--線の設定----------
						"line_linked":{
							"enable":true, //線を表示するか否か
							"distance":100, //線をつなぐシェイプの間隔
							"color":"#333333", //線の色
							"opacity":0.4, //線の透明度
							"width":1 //線の太さ
						},
					//--------------------

					//--動きの設定----------
						"move":{
							"speed":0.5, //シェイプの動くスピード
							"straight":false, //個々のシェイプの動きを止めるか否か
							"direction":"none", //エリア全体の動き(none、top、top-right、right、bottom-right、bottom、bottom-left、left、top-leftより選択)
							"out_mode":"out" //エリア外に出たシェイプの動き(out、bounceより選択)
						}
					//--------------------

					},

					"interactivity":{
						"detect_on":"canvas",
						"events":{

							//--マウスオーバー時の処理----------
							"onhover":{
								"enable":false, //マウスオーバーが有効か否か
								"mode":"repulse" //マウスオーバー時に発動する動き(下記modes内のgrab、repulse、bubbleより選択)
							},
							//--------------------

							//--クリック時の処理----------
							"onclick":{
								"enable":false, //クリックが有効か否か
								"mode":"push" //クリック時に発動する動き(下記modes内のgrab、repulse、bubble、push、removeより選択)
							},
							//--------------------

						}
					},
					"retina_detect":true, //Retina Displayを対応するか否か
					"resize":true //canvasのサイズ変更にわせて拡大縮小するか否か
				});
			}
				
			
		
			if ($('div.front div#bg_particles_l').length > 0) {
					
				particlesJS('bg_particles_l',{
				"particles":{

					//--シェイプの設定----------
						"number":{
							"value":250, //シェイプの数
							"density":{
								"enable":true, //シェイプの密集度を変更するか否か
								"value_area":500 //シェイプの密集度
							}
						},
						"color":{
							"value":"#cccccc" //シェイプの色
						},
						"opacity":{
							"value":1, //シェイプの透明度
							"random":true, //シェイプの透明度をランダムにするか否か
							"anim":{
								"enable":false, //シェイプの透明度をアニメーションさせるか否か
								"speed":10, //アニメーションのスピード
								"opacity_min":0.8, //透明度の最小値
								"sync":false //全てのシェイプを同時にアニメーションさせるか否か
							}
						},
						"size":{
							"value":4, //シェイプの大きさ
							"random":true, //シェイプの大きさをランダムにするか否か
							"anim":{
								"enable":false, //シェイプの大きさをアニメーションさせるか否か
								"speed":40, //アニメーションのスピード
								"size_min":1, //大きさの最小値
								"sync":false //全てのシェイプを同時にアニメーションさせるか否か
							}
						},
					//--------------------

					//--線の設定----------
						"line_linked":{
							"enable":true, //線を表示するか否か
							"distance":100, //線をつなぐシェイプの間隔
							"color":"#cccccc", //線の色
							"opacity":1, //線の透明度
							"width":1 //線の太さ
						},
					//--------------------

					//--動きの設定----------
						"move":{
							"speed":1.5, //シェイプの動くスピード
							"straight":false, //個々のシェイプの動きを止めるか否か
							"direction":"none", //エリア全体の動き(none、top、top-right、right、bottom-right、bottom、bottom-left、left、top-leftより選択)
							"out_mode":"out" //エリア外に出たシェイプの動き(out、bounceより選択)
						}
					//--------------------

					},

					"interactivity":{
						"detect_on":"canvas",
						"events":{

							//--マウスオーバー時の処理----------
							"onhover":{
								"enable":false, //マウスオーバーが有効か否か
								"mode":"repulse" //マウスオーバー時に発動する動き(下記modes内のgrab、repulse、bubbleより選択)
							},
							//--------------------

							//--クリック時の処理----------
							"onclick":{
								"enable":false, //クリックが有効か否か
								"mode":"push" //クリック時に発動する動き(下記modes内のgrab、repulse、bubble、push、removeより選択)
							},
							//--------------------

						}
					},
					"retina_detect":true, //Retina Displayを対応するか否か
					"resize":true //canvasのサイズ変更にわせて拡大縮小するか否か
				});
			}
		}

	});
});