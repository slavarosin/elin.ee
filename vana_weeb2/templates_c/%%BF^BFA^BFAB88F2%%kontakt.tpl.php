<?php /* Smarty version 2.6.9, created on 2005-05-04 16:59:05
         compiled from kontakt.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array('title' => 'Kontakt')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="ttlContainer"><img src="img/vahe_top.gif" alt="" width="740" height="29">
  <div id="ttl"><img src="img/ttl_kontakt.gif" alt="Kontakt" width="89" height="18"></div>
  <div id="tagasiside"><a href="index.php?c=6" id="feedback" class="rollover"><img src="img/tagasiside_out.gif" alt="Tagasiside" width="79" height="16" border="0"></a></div>
  <div id="triipParem"><img src="img/spacer.gif" alt="" width="1" height="1"></div>
  <div id="triipVasak"><img src="img/spacer.gif" alt="" width="1" height="1"></div>
</div>
<div id="hoidja">
  <div id="left"><a href="index.php?c=1" id="firmast" class="rollover"><img src="img/l_firmast_out.gif" alt="Firmast" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><img src="img/l_kontakt_over.gif" alt="Kontakt" width="141" height="26" border="0"><img src="img/vahe_hele.gif" alt="" width="141" height="1"><a href="index.php?c=3" id="tehtud" class="rollover"><img src="img/l_tehtud_out.gif" alt="Tehtud tööd" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><a href="index.php?c=4" id="galerii" class="rollover"><img src="img/l_galerii_out.gif" alt="Galerii" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><a href="index.php?c=5" id="litsentsid" class="rollover"><img src="img/l_litsentsid_out.gif" alt="Litsentsid" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><img src="img/promo.gif" alt="" width="141" height="54" vspace="25"> </div>
  <div id="main">
	<?php echo $this->_tpl_vars['content']; ?>

  </div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>