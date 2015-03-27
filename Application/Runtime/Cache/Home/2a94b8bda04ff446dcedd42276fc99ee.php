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
	<a href="<?php echo U('mp');?>">
	<div class="HLeft HTop">
		<img src="/akp/Public/img/ic/topLW.png" alt="">
		<span>写名片</span>
	</div>
	</a>
	<h1><?php echo ((isset($title) && ($title !== ""))?($title):"Dr.K"); ?></h1>
	<div class="HRight HTop">
		<img src="/akp/Public/img/ic/topR.png" alt="">
		<span>筛选</span>
	</div>
</div>

<div id="article" class="wraper">
	<?php if(is_array($dv)): $i = 0; $__LIST__ = $dv;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i;?><div class="userFull animated bounceInRight">
	<div class="userCard">
		<div class="userCardLeft">
			<img src="/akp/Public/img/1.jpg" alt="">
			<p><i></i><span>距32m</span></p>
		</div>
		<div class="userCardRight">
			<div class="ucr_a"><?php echo ($info["username"]); ?></div>
			<div class="ucr_b"><?php echo ($info["company"]); ?></div>
			<div class="ucr_c"><?php echo ($info["job"]); ?></div>
			<div class="ucr_d"><i></i><span>创业者</span><span>互联网</span></div>
		</div>
		<div class="userCardTip"><img src="/akp/Public/img/tips/t<?php echo ($info["ustatus"]); ?>.png" alt=""></div>
	</div>
	<div class="userInfo hammer" id="">
		<?php if(is_array($info["info"])): $i = 0; $__LIST__ = $info["info"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if($i == 1): ?><div class="userInfo_num animated dq_num"><?php else: ?><div class="userInfo_num animated"><?php endif; ?>
			<div class="userInfo_h"><?php echo ($v["title"]); ?></div>
			<div class="userInfo_m"><?php if($v['type'] == 1): echo ($v["content"]); else: ?><img src="/akp/Public/Uploads/<?php echo ($v["content"]); ?>"><?php endif; ?></div>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	<div class="userOs">
		<div class="userOst"><?php if(is_array($info["info"])): $i = 0; $__LIST__ = $info["info"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vs): $mod = ($i % 2 );++$i; if($i == 1): ?><span class="userOstn userOstnfos"></span><?php else: ?><span class="userOstn"></span><?php endif; endforeach; endif; else: echo "" ;endif; ?></div>
		<div class="userOsb"><a class="userOsb_ps" href="javascript:void(0);">不想见</a><a class="userOsb_cg" href="javascript:void(0);">换名片</a></div>
	</div>
	</div><?php endforeach; endif; else: echo "" ;endif; ?>
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
<script type="text/javascript">
$(function(){
	$('.userFull').eq(0).show();
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
		if(num==1){return false;}
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

	$('.userOsb_ps').click(function(){
		var first = 0;
		$('.userFull').eq(first).addClass('bounceOutLeft').fadeOut(600,function(){
			$(this).remove();
		});
		first++;
		var l = $('.userFull').length;
		if(l==1){
			window.location.reload();
		}
		$('.userFull').eq(first).show().addClass('bounceInRight');
	});
	
});
</script>