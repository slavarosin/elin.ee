<?php /* Smarty version 2.6.9, created on 2005-05-04 16:59:28
         compiled from license_pic.tpl */ ?>
<html>
<head>
<title>Litsents</title>
<link href="styles.css" rel="stylesheet" type="text/css">
<?php echo '
		<script language=\'javascript\'>
			var picUrl = ';  echo $this->_tpl_vars['pic_url'];  echo ';
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
'; ?>

</head>
<body onload='fitPic();'>
<a href="#" onClick="window.close()"><img src="./pics/<?php echo $this->_tpl_vars['pic_url']; ?>
" border="0" alt=""></a>
<br>
<a title="Prindi litsents" href="#" onClick="window.print()" class="rollover">Prindi litsents</a>
</body>
</html>