$(function(){var e=$("header").height();$('a[href^="#"]').click(function(){var n=$(this).attr("href"),i=$("#"==n||""==n?"html":n);if(i.length>0){var a=i.offset().top-e;return $("html, body").animate({scrollTop:a},550,"swing"),!1}})}),$(function(){$(".obj_image").length>0&&objectFitImages(".obj_image")}),function(e){var n=e("header").height();e(function(){var n=e("header");e(window).scroll(function(){e(window).scrollTop()>50?n.addClass("fixed"):n.removeClass("fixed")})})}(jQuery),$(function(){if($(".js-image-switch").length>0){var e=$(".js-image-switch"),n="_sp.",i="_pc.",a=768,t;function o(){var t=parseInt($(window).width());e.each(function(){var e=$(this);t>=a?e.attr("src",e.attr("src").replace(n,i)):e.attr("src",e.attr("src").replace(i,n))})}o(),$(window).on("resize",function(){clearTimeout(t),t=setTimeout(function(){o()},200)})}}),$(function(){$("dl.accordion dt").length>0&&$("dl.accordion dt").click(function(){$(this).next("dd").slideToggle(),$(this).toggleClass("open")})}),$(function(){$("#toggle").click(function(){$(this).toggleClass("toggle_active"),$(".drawer_bg").fadeToggle(),$(".drawer").toggleClass("drawer_open"),$("nav").toggleClass("is_open"),$(this).hasClass("toggle_active")?$("nav").removeClass("is_close"):$("nav").addClass("is_close")}),$(".drawer_bg").click(function(){$(this).fadeOut(),$("#toggle").removeClass("toggle_active"),$(".drawer").removeClass("drawer_open"),$("nav").removeClass("is_open"),$("nav").addClass("is_close")}),$("nav a").on("click",function(){window.innerWidth<=768&&$("#toggle").click()})}),$(function(){$("nav ul.sub_menu").length>0&&($("nav ul.sub_menu").before('<div class="lower_menu"></div>'),$("div.lower_menu").on("click",function(){window.innerWidth<=768&&$(this).parent().toggleClass("open")}))}),$(function(){if($("#pageplugin").length>0){var e=$(window).width(),n=$("#pageplugin").html(),i=null;$(window).on("resize",function(){var a=$(window).width();e!=a&&a<500&&(clearTimeout(i),i=setTimeout(function(){$("#pageplugin").html(n),window.FB.XFBML.parse();var e=$(window).width()},500))})}}),$(function(){$(window).on("load",function(){$(window).width()>768?($("div.front div#bg_particles").length>0&&particlesJS("bg_particles",{particles:{number:{value:150,density:{enable:!0,value_area:800}},color:{value:"#333333"},opacity:{value:.5,random:!0,anim:{enable:!1,speed:10,opacity_min:.3,sync:!1}},size:{value:4,random:!0,anim:{enable:!1,speed:40,size_min:1,sync:!1}},line_linked:{enable:!0,distance:180,color:"#333333",opacity:.4,width:1},move:{speed:.5,straight:!1,direction:"none",out_mode:"out"}},interactivity:{detect_on:"canvas",events:{onhover:{enable:!1,mode:"repulse"},onclick:{enable:!1,mode:"push"}}},retina_detect:!0,resize:!0}),$("div.front div#bg_particles_l").length>0&&particlesJS("bg_particles_l",{particles:{number:{value:250,density:{enable:!0,value_area:750}},color:{value:"#cccccc"},opacity:{value:1,random:!0,anim:{enable:!1,speed:10,opacity_min:.8,sync:!1}},size:{value:4,random:!0,anim:{enable:!1,speed:40,size_min:1,sync:!1}},line_linked:{enable:!0,distance:120,color:"#cccccc",opacity:1,width:1},move:{speed:1.5,straight:!1,direction:"none",out_mode:"out"}},interactivity:{detect_on:"canvas",events:{onhover:{enable:!1,mode:"repulse"},onclick:{enable:!1,mode:"push"}}},retina_detect:!0,resize:!0})):($("div.front div#bg_particles").length>0&&particlesJS("bg_particles",{particles:{number:{value:250,density:{enable:!0,value_area:500}},color:{value:"#333333"},opacity:{value:.5,random:!0,anim:{enable:!1,speed:10,opacity_min:.3,sync:!1}},size:{value:4,random:!0,anim:{enable:!1,speed:40,size_min:1,sync:!1}},line_linked:{enable:!0,distance:100,color:"#333333",opacity:.4,width:1},move:{speed:.5,straight:!1,direction:"none",out_mode:"out"}},interactivity:{detect_on:"canvas",events:{onhover:{enable:!1,mode:"repulse"},onclick:{enable:!1,mode:"push"}}},retina_detect:!0,resize:!0}),$("div.front div#bg_particles_l").length>0&&particlesJS("bg_particles_l",{particles:{number:{value:250,density:{enable:!0,value_area:500}},color:{value:"#cccccc"},opacity:{value:1,random:!0,anim:{enable:!1,speed:10,opacity_min:.8,sync:!1}},size:{value:4,random:!0,anim:{enable:!1,speed:40,size_min:1,sync:!1}},line_linked:{enable:!0,distance:100,color:"#cccccc",opacity:1,width:1},move:{speed:1.5,straight:!1,direction:"none",out_mode:"out"}},interactivity:{detect_on:"canvas",events:{onhover:{enable:!1,mode:"repulse"},onclick:{enable:!1,mode:"push"}}},retina_detect:!0,resize:!0}))})});