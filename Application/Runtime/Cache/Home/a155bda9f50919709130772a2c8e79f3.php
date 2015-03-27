<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content ="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="blank" />
<meta name="format-detection" content="telephone=no" />
<title><?php echo ((isset($title) && ($title !== ""))?($title):"Dr.K"); echo ($titleLater); ?></title>
<link rel="stylesheet" href="/akp/Public/css/style.css">
<link rel="stylesheet" href="/akp/Public/css/animate.min.css">
<script type="text/javascript" src="/akp/Public/js/jquery.js"></script>
<script type="text/javascript" src="/akp/Public/js/hammer.js"></script>
<script type="text/javascript" src="/akp/Public/js/jquery.hammer.js"></script>
</head>
<body>

<div id="header" class="wraper">
	<div class="HLeft HTop" style="margin-top:6px;" onclick="window.history.go(-1)">
		<img src="/akp/Public/img/ic/topLB.png" style="height:33px;cursor:pointer;">
	</div>
	<h1><?php echo ((isset($title) && ($title !== ""))?($title):"Dr.K"); ?></h1>
</div>

<div id="article" style="position:relative;" class="wraper">
	<form id="kPost" action="<?php echo U('test');?>">
	<input type="submit" value="保存" id="mpSubmit">
	<div class="userFull_w">
	<div class="userCard">
		<div class="userCardLeft">
			<img src="/akp/Public/img/1.jpg" alt="">
			<p style="width:100%;text-align:left;"><a class="uploadAvatarsLink" href="javascript:void(0);">上传头像</a></p>
		</div>
		<div class="userCardRight">
			<div class="ucr_a"><input type="text" class="wCardTxt wCardTxtNm" name="username" id="username" placeholder="请输入用户名"></div>
			<div class="ucr_b"><input type="text" class="wCardTxt" name="company" id="company" placeholder="公司"></div>
			<div class="ucr_c"><input type="text" class="wCardTxt" name="job" id="job" placeholder="职位"></div>
			<div class="ucr_d"><i></i><span>创业者</span><span>互联网</span></div>
		</div>
		<div class="userCardTip"><img id="cgUstatus" src="/akp/Public/img/tips/t1.png" alt=""><input type="hidden" name="ustatus" id="ustatus" value="1"></div>
	</div>
	<div class="userInfo hammer" id="">
		<div class="userInfo_num dq_num userInfo_numNk">
			<div class="userInfo_h"></div>
			<div class="userInfo_m">
				<div class="w_info_mt">
					<p>“优秀的介绍是成功的一半”<br>从这里开始</p>
					<img src="/akp/Public/img/ic/jt.png" alt="">
				</div>
			</div>
		</div>
	</div>
	</form>
	<div class="userOs">
		<div class="userOst" style="height:16px;"></div>
		<div class="userOsb">
			<form id="T" action="<?php echo U('uppicPost');?>" method="post" enctype="multipart/form-data">
			<div class="writeBar">
				<span>新建</span>
				<a class="addTextBtn" href="javascript:void(0);"><img src="/akp/Public/img/ic/w1.png" alt=""></a>
				<a class="addImgBtn" href="javascript:void(0);">
					<input type="file" name="file" id="file">
					<img src="/akp/Public/img/ic/w2.png" alt="">
				</a>
			</div>
			</form>
		</div>
	</div>
	</div>
</div>

<div class="ustatusDv animated">
	<a href="javascript:void(0);" class="ustatusDvLk" data="1">创业者</a>
	<a href="javascript:void(0);" class="ustatusDvLk" data="2">投资者</a>
	<a href="javascript:void(0);" class="ustatusDvLk" data="3">行业专家</a>
</div>

<div class="addTextCnt animated">
	<div class="addTCH"><input type="text" placeholder="请输入标题" name="jq_t" id="jq_t"></div>
	<div class="addTCM">
		<textarea name="jq_m" id="jq_m" placeholder="请输入内容"></textarea>
	</div>
	<div class="addTCB"><a class="add_jq_text" href="javascript:void(0);">确 定</a></div>
</div>

<div class="addTextImg animated">
	<div class="addTCH"><input type="text" placeholder="请输入标题" name="jq_it" id="jq_it"></div>
	<div class="addTCM">
	</div>
	<div class="addTCB"><a class="add_jq_img" href="javascript:void(0);">确 定</a></div>
</div>

<div id="footer" class="wraper">
	<table>
		<tr>
			<td><img src="/akp/Public/img/tips/bottom_af.png" alt=""><br><span>找人</span></td>
			<td><img src="/akp/Public/img/tips/bottom_b.png" alt=""><br><span>...</span></td>
			<td><img src="/akp/Public/img/tips/bottom_c.png" alt=""><br><span>...</span></td>
			<td><img src="/akp/Public/img/tips/bottom_d.png" alt=""><br><span>...</span></td>
		</tr>
	</table>
</div>

</body>
</html>
<script type="text/javascript" src="/akp/Public/js/jQuery.form.js"></script>
<script type="text/javascript" src="/akp/Public/js/extend.js"></script>
<script type="text/javascript">
$(function(){
	$('.addTextBtn').click(function(){
		var dv = $('.addTextCnt');
		dv.removeClass('bounceOutUp').show().addClass('bounceInDown');
		dv.mask();
		dv.center();
		$('#fun_mask').click(function(){
			dv.removeClass('bounceInDown').addClass('bounceOutUp').fadeOut(700,function(){
				$('#fun_mask').remove();
			});
		});
	});

	$('#file').change(function(){
		$('#T').ajaxSubmit({
			dataType : 'json',
			success : function(json){
				var ig = $('.addTextImg');
				ig.children('.addTCM').append('<img src="/akp/Public/Uploads/'+ json +'"><input type="hidden" id="jq_mt" value="'+ json +'">');
				ig.removeClass('bounceOutUp').show().addClass('bounceInDown');
				ig.mask();
				ig.center();				
			}
		});
	});

	$('.add_jq_text').click(function(){
		var t = $('#jq_t').val(),
			m = $('#jq_m').val();
		if(!t || !m){
			alert('请将内容填写完整');
			return false;
		}
		$('.userInfo_numNk').remove();
		$('.userInfo_num').removeClass('dq_num');
		var main = '<div class="userInfo_num kFor animated dq_num"><div class="userInfo_h">'+t+'</div><div class="userInfo_m">'+m+'</div>';
		var l = $('.kFor').length;
		main += '<input type="hidden" name="info['+l+'][title]" value="'+t+'">';
		main += '<input type="hidden" name="info['+l+'][content]" value="'+m+'">';
		main += '<input type="hidden" name="info['+l+'][type]" value="1">';
		main += '</div>';
		$('.userInfo').append(main);
		$('.userOstn').removeClass('userOstnfos');
		$('.userOst').append('<span class="userOstn userOstnfos"></span>');

		$('.addTextCnt').removeClass('bounceInDown').addClass('bounceOutUp').fadeOut(700,function(){
			$('#fun_mask').remove();
			$('#jq_t').val('');
			$('#jq_m').val('');
		});
	});

	$('.add_jq_img').click(function(){
		var t = $('#jq_it').val();
		var m = $('#jq_mt').val();
		if(!t||!m){
			alert('请将内容填写完整');
			return false;
		}
		$('.userInfo_numNk').remove();
		$('.userInfo_num').removeClass('dq_num');
		var main = '<div class="userInfo_num kFor animated dq_num"><div class="userInfo_h">'+t+'</div><div class="userInfo_m"><img src="/akp/Public/Uploads/'+m+'"></div>';
		var l = $('.kFor').length;
		main += '<input type="hidden" name="info['+l+'][title]" value="'+t+'">';
		main += '<input type="hidden" name="info['+l+'][content]" value="'+m+'">';
		main += '<input type="hidden" name="info['+l+'][type]" value="2">';
		main += '</div>';
		$('.userInfo').append(main);
		$('.userOstn').removeClass('userOstnfos');
		$('.userOst').append('<span class="userOstn userOstnfos"></span>');

		$('.addTextImg').removeClass('bounceInDown').addClass('bounceOutUp').fadeOut(700,function(){
			$('#fun_mask').remove();
			$('#jq_it').val('');
			$('.addTextImg').children('.addTCM').html('');
		});
	});

	var H = $(window).height();
	var s = $('.userInfo').offset().top;
	$('.userInfo').css("height",H-s-153);
	$('.userInfo_m').css("height",H-s-193);
	
	var hammertime = $('.hammer').hammer();
	hammertime.on('swiperight', function(ev){
		var num = $(this).children('.userInfo_num').length;
		if(num==1){return false;}
		$('.userInfo_num').each(function(){
			if($(this).hasClass('dq_num')){
				var i = $(this).index();
				var idx = i - 1;
				if(i==0){
					idx = num - 1;
				}
				$('.userInfo_num').eq(idx).addClass('dq_num').addClass('bounceInLeft');
				$('.userOstn').eq(idx).addClass('userOstnfos');
				$('.userInfo_num').eq(i).removeClass('dq_num bounceInLeft bounceInRight');
				$('.userOstn').eq(i).removeClass('userOstnfos');
				return false;
			}
		});
	});
	hammertime.on('swipeleft', function(ev){
		var num = $(this).children('.userInfo_num').length;
		// if(num==1){return false;}
		$('.userInfo_num').each(function(){
			if($(this).hasClass('dq_num')){
				var i = $(this).index();
				var idx = i + 1;
				if(idx == num){
					idx = 0;
				}
				$('.userInfo_num').eq(idx).addClass('dq_num').addClass('bounceInRight');
				$('.userOstn').eq(idx).addClass('userOstnfos');
				$('.userInfo_num').eq(i).removeClass('dq_num bounceInRight bounceInLeft');
				$('.userOstn').eq(i).removeClass('userOstnfos');
				return false;
			}
		});
	});


	$('#kPost').submit(function(){
		var ln = $(this).attr('action');
		var dt = $(this).serializeArray();
		$.ajax({
			url : ln,
			type : 'post',
			dataType : 'json',
			data : dt,
			success : function(json){
				if(json.status==1){
					location.href = '<?php echo U("index");?>';
					return false;
				}else{
					tips_dump(json.tips);
				}
			}
		});
		return false;
	})



	$('#cgUstatus').click(function(){
		var dv = $('.ustatusDv');
		dv.center();dv.mask();
		dv.show().removeClass('bounceOutRight').addClass('bounceInLeft');
		$('#fun_mask').click(function(){
			dv.removeClass('bounceInLeft').addClass('bounceOutRight').fadeOut(600,function(){
				$('#fun_mask').remove();
			});
		})
	});
	$('.ustatusDvLk').click(function(){
		var dt = $(this).attr('data');
		$('#ustatus').val(dt);
		$('#cgUstatus').attr('src','/akp/Public/img/tips/t'+dt+'.png');
		$('.ustatusDv').removeClass('bounceInLeft').addClass('bounceOutRight').fadeOut(600,function(){
			$('#fun_mask').remove();
		});
	});

	
});
</script>