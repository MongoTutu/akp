jQuery.fn.extend({
	center: function() {
		var l = ($(window).width() - this.width()) / 2,
			t = ($(window).height() - this.height()) / 2;
		this.css({'position': 'fixed','left': l,'top': t});
	},
	mask: function(){
		var e = this;
		var mask = '<div id="fun_mask"></div>';
		$('body').append(mask);
		var mk = $('#fun_mask');
		var w = $(window).width(),
			h = $(window).height();
		mk.css({'width':'100%','height':h,'background':'#9a9a9a','opacity':'0.5','position':'fixed','left':'0','top':'0','z-index':'998'});
		e.css('z-index','999');
		mk.click(function(){
			return false;
			e.remove();
			this.remove();
		});
	},
	loading: function(){
		var e = this;
		var eH = e.height(),
			eW = e.width(),
			iH = (eH-65)/2,
			iW = (eW-65)/2;
		var load = '<div id="load_mask"><img src="/zol/Public/img/loading.gif"></div>';
		e.append(load).css('position','relative');
		$('#load_mask').css({'width':eW,'height':eH,'background':'#efefef','position':'absolute','left':'0','top':'0'});
		$('#load_mask img').css({'margin-left':iW,'margin-top':iH});
	}
})
var tips_dump = function($content, $title) {
	if (!$content) $content = '这里是提示的内容！';
	if (!$title) $title = '提示';
	var content = '<div style="width:340px;background:#FFF;border:1px solid #c0cfcf;z-index:1000;position:absolute;" id="tips">\
				<h5 style="line-height:35px;background:#127ac3;color:#FFF;padding-left:20px;">' + $title + '</h5>\
				<p style="margin:20px">' + $content + '</p>\
				<a id="tips_close" style="width:80px;height:26px;display:block;background:#127ac3;color:#FFF;line-height:26px;text-align:center;font-weight:600;float:right;margin-right:25px;margin-bottom:20px;font-size:14px;" href="javascript:void(0);">确 定</a>\
			</div>';
	$('body').append(content);
	var tip = $('#tips');
	tip.center();
	$('body').click(function(){
		tip.remove();
	});
	$('#tips_close').click(function(){
		tip.remove();
	});
};
function CheckUrl(str) { 
	var RegUrl = new RegExp();
	RegUrl.compile("^[A-Za-z]+://[A-Za-z0-9-_]+\\.[A-Za-z0-9-_%&\?\/.=]+$");
	if (!RegUrl.test(str)) {
		return false;
	} 
	return true;
};
//重新刷新页面，使用location.reload()有可能导致重新提交
function reloadPage(win) {
    var location = win.location;
    location.href = location.pathname + location.search;
}
//页面跳转
function redirect(url) {
    location.href = url;
}
//读取cookie
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1, c.length);
        }
        if (c.indexOf(nameEQ) == 0) {
            return c.substring(nameEQ.length, c.length);
        }
    };
    return null;
}
//设置cookie
function setCookie(name, value, days) {
    var argc = setCookie.arguments.length;
    var argv = setCookie.arguments;
    var secure = (argc > 5) ? argv[5] : false;
    var expire = new Date();
    if(days==null || days==0) days=1;
    expire.setTime(expire.getTime() + 3600000*24*days);
    document.cookie = name + "=" + escape(value) + ("; path=/") + ((secure == true) ? "; secure" : "") + ";expires="+expire.toGMTString();
}
