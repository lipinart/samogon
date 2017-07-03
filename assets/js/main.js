$(document).ready(function(){
	sizer.init();

	if($(window).width()<767){
		$('.wow').css('visibility','visible');
	} else {
		new WOW().init();
		$('.wow').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			$(this).removeClass('wow wow');
		});
	}
	
	header.init();
	$('.slider').amSlider();
	$('.full-width-slider').amFullWidthSlider();
});

var sizer={
	init:function(){
		if(document.location.toString().indexOf('verstka.fl')==-1) return false;
		var _this=this;
		$('<div />').attr('id','sizer').css({
			position:'fixed',
			right:0,
			bottom:0,
			padding:'10px 20px',
			zIndex:9999,
			background:'#fff'
		}).appendTo('body');
		$(window).on('resize.setSize',function(){
			_this.setSize();
		}).trigger('resize.setSize');
	},
	setSize:function(){
		var width=$(window).width();
		var type='phone';
		if(width>=751) type='tablet';
		if(width>974) type='desktop';
		if(width>1182) type='desktop lg';
		$('#sizer').html(width+'x'+$(window).height()+' ('+type+')');
	}
}


var header={
	init:function(){
		var className='';
		$(document).on('scroll.setHeader',function(){
			var top=$(document).scrollTop();
			if(top>100 && className==''){
				$('#header').addClass('scrolled');
				className='scrolled';
			}
			if(top<=100 && className!=''){
				$('#header').removeClass('scrolled');
				className='';
			}
		}).trigger('scroll.setHeader');
	}
}



$.fn.amSlider=function(){
	return $(this).each(function(){
		var slider=$(this);
		var wrapper=$('.wrapper',slider);
		var ul=$('ul',wrapper);
		var nav=$('.nav',slider);
		
		var tot=null;
		function checkWidth(time){
			if(!time) time=1;
			if(tot) window.clearTimeout(tot);
			tot=window.setTimeout(function(){
				var w=0;
				wrapper.css('width','auto');
				$('li',ul).each(function(){
					w+=$(this).outerWidth(true);
				});
				if(w<wrapper.width()){
					wrapper.width(w);
					slider.addClass('not-nav');
				} else {
					slider.removeClass('not-nav');
				}
			},time);
		}
		checkWidth();
		$(window).on('resize.setAmSliderWidth',function(){
			checkWidth(50);
		});
		$('img',slider).on('load.setAmSliderWidth',function(){
			checkWidth();
		});
		
		function checkLiCnt(){
			var w2=0, cnt=0, w=0, ww=wrapper.width();
			$('li',ul).each(function(){
				var ow=$(this).outerWidth(true);
				if(ow+w<=ww){
					w+=ow; cnt++;
				} else {
					w2+=ow;
				}
			});
			if(w2<ww){
				var cloned=$('li',ul).clone(true);
				cloned.appendTo(ul);
				checkLiCnt();
			}
			return {w:w,cnt:cnt,ww:ww};
		}
		
		
		$('a',nav).click(function(){
			if(slider.data('isAnimate')) return false;
			slider.data('isAnimate',true);
			var data=checkLiCnt();
			var left=0, isNext=false;
			if($(this).hasClass('next')){
				isNext=true;
				var w=0, ww=wrapper.width();
				if(data.w==0 && data.cnt==0){
					data.w=$('li:first',ul).outerWidth(true);
					data.cnt=1;
				}
				left=-data.w;
			} else {
				var w=0, last;
				while(w<data.ww){
					last=$('li:last',ul);
					w+=last.outerWidth(true);
					if(w<data.ww || data.cnt==0) last.prependTo(ul);
				}
				if(data.cnt!=0) w-=last.outerWidth(true);
				ul.css('margin-left',-w+'px');
			}
			
			ul.animate({marginLeft:left},750,function(){
				slider.data('isAnimate',false);
				if(isNext){
					for(var i=1;i<=data.cnt;i++) $('li:first',ul).appendTo(ul);
					ul.css('margin-left',0);
				}
			});
		});
		
	});
}

$.fn.amFullWidthSlider=function(){
	return $(this).each(function(){
		var slider=$(this);
		var wrapper=$('.wrapper',slider);
		var ul=$('ul',wrapper);
		var nav=$('.nav',slider);
		$('li:gt(0)',ul).hide();
		$('a',nav).click(function(){
			if(slider.data('isAnimate')) return false;
			slider.data('isAnimate',true);
			wrapper.height(wrapper.height());
			
			var isNext=false, left=0;
			var width=$('li:first',ul).width();
			var outerWidth=$('li:first',ul).outerWidth(true);
			ul.width(outerWidth*2);
			$('li',ul).width(width);
			var target=$('li:eq(1)',ul);
			if($(this).hasClass('next')){
				left=-width;
				isNext=true;
			} else {
				target=$('li:last',ul);
				target.prependTo(ul);
				ul.css('margin-left',-target.outerWidth(true)+'px');
			}
			
			target.show();
			wrapper.animate({height:target.height()},500);
			
			ul.animate({marginLeft:left},500,function(){
				if(isNext){
					$('li:first',ul).appendTo(ul);
					ul.css('margin-left','0px');
				}
				$('li:gt(0)',ul).hide();
				$('li',ul).css('width','auto');
				ul.css('width','auto');
				slider.data('isAnimate',false);
				wrapper.css('height','auto');
			});
		});
	});
}

//submit btn
//open btn
//close btn



//open modal
$('.btn-open').on('click', function (e) {
	e.preventDefault();
	var form_id = $(this).attr("data-order");
	var modal_title = $(this).attr("data-form-title");
	form_reset();
	//alert(form_id);
	$(".modal-header > h3").text(modal_title);
	$(".modal-body > form").attr('id', form_id);
	$("input[name='callback_product']").val(form_id);
});

//Submit form: fid = form ID
$('form').submit(function(e){
	e.preventDefault();
	var form_data=$(this).serialize();
	var fid = "#"+$(this).attr("id");
	$.ajax({
		type: 'POST',
		url: 'send.php',
		data: form_data,
		success: function(response){
			if(response != "1"){
				$(".oneClickInput").removeClass("error animated shake");
				$(fid+" "+response).parents(".oneClickInput").addClass("error animated shake");
			}else{
				$(".oneClickInput").removeClass("error animated shake");
				$(fid+" .form-body").hide();
				$(".modal-header > h3").empty().hide();
				$(fid+" .form-result").addClass("animated bounceIn").show();
				setTimeout(function(){
				    form_reset();
				}, 6000);
			}
		},
		error: function(response){
			alert('Error');
		}
	});
});
//close & reset
function form_reset(){
	$("#modal-form").modal('hide');
	$("input[name='callback_product']").val();
	$(".oneClickInput").removeClass("error animated shake");
	$(".form-result").removeClass("animated bounceIn").hide();	
	$("form").trigger("reset").children(".form-body").show();
	$(".modal-header > h3").show();
	$(".modal-body > form").attr('id', 'modal-form');
	$("#modal-form").modal('hide');
}

$(".btn-ok, .close").on('click', function(e){
    e.preventDefault();
    form_reset();
});

$('.modal').on('hidden.bs.modal', function (e) {
  	e.preventDefault();
    form_reset();
});