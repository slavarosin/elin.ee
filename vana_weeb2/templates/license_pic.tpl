<html>
<head>
<title>Litsents</title>
<link href="styles.css" rel="stylesheet" type="text/css">
{literal}
		<script language='javascript'>
			var picUrl = {/literal}{$pic_url}{literal};
			var NS = (navigator.appName=="Netscape")?true:false;

			function fitPic() {
				iWidth = (NS)?window.innerWidth:document.body.clientWidth;
				iHeight = (NS)?window.innerHeight:document.body.clientHeight;
				iWidth = document.images[0].width - iWidth;
				iHeight = document.images[0].height - iHeight;
				window.resizeBy(iWidth+20, iHeight-1+90);
				self.focus();
			};
		</script>
{/literal}
</head>
<body onload='fitPic();'>
<a href="#" onClick="window.close()"><img src="./pics/{$pic_url}" border="0" alt=""></a>
<br>
<a title="Prindi litsents" href="#" onClick="window.print()" class="rollover">Prindi litsents</a>
</body>
</html>