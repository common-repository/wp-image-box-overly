jQuery(document).ready(function($){


jQuery('.imagebox').each(function(){var cth=jQuery(this).find('.imagebox-content').height();jQuery(this).find('.imagebox-content').css({'bottom':(cth)*-1});jQuery(this).hover(function(){jQuery(this).addClass('active');jQuery(this).find('.imagebox-mark').stop().animate({'opacity':1},300,'jswing');jQuery(this).find('.imagebox-content').stop().animate({'bottom':0,'opacity':1},300,'jswing');},function(){jQuery(this).removeClass('active');jQuery(this).find('.imagebox-mark').stop().animate({'opacity':0},300,'jswing');jQuery(this).find('.imagebox-content').stop().animate({'bottom':(cth)*-1,'opacity':0},300,'jswing');});});

jQuery('.probox').each(function(){var cth=jQuery(this).find('.probox-desc').height();jQuery(this).find('.probox-heading').css({'bottom':(cth+25)*-1});jQuery(this).hover(function(){jQuery(this).addClass('active');jQuery(this).find('.probox-desc').stop().animate({'opacity':1},300,'jswing');jQuery(this).find('.probox-heading').stop().animate({'bottom':0});},function(){jQuery(this).removeClass('active');jQuery(this).find('.probox-desc').stop().animate({'opacity':0},300,'jswing');jQuery(this).find('.probox-heading').stop().animate({'bottom':(cth+25)*-1});});});


});