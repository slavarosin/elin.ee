<?php /* Smarty version 2.6.9, created on 2005-05-04 17:00:36
         compiled from login.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array('title' => 'Meldimine')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="ttlContainer"><img src="img/vahe_top.gif" alt="" width="740" height="29">
  <div id="ttl"><img src="img/ttl_tagasiside.gif" alt="Tagasiside" width="120" height="23"></div>
  <div id="tagasiside"><a href="index.php?c=6" id="feedback" class="rollover"><img src="img/tagasiside_out.gif" alt="Tagasiside" width="79" height="16" border="0"></a></div>
  <div id="triipParem"><img src="img/spacer.gif" alt="" width="1" height="1"></div>
  <div id="triipVasak"><img src="img/spacer.gif" alt="" width="1" height="1"></div>
</div>
<div id="hoidja">
  <div id="left"><a href="index.php?c=1" id="firmast" class="rollover"><img src="img/l_firmast_out.gif" alt="Firmast" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><a href="index.php?c=2" id="kontakt" class="rollover"><img src="img/l_kontakt_out.gif" alt="Kontakt" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><a href="index.php?c=3" id="tehtud" class="rollover"><img src="img/l_tehtud_out.gif" alt="Tehtud tööd" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><a href="index.php?c=4" id="galerii" class="rollover"><img src="img/l_galerii_out.gif" alt="Galerii" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><a href="index.php?c=5" id="litsentsid" class="rollover"><img src="img/l_litsentsid_out.gif" alt="Litsentsid" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><img src="img/promo.gif" alt="" width="141" height="54" vspace="25"> </div>
  <div id="main">
	<p><?php echo $this->_tpl_vars['teade']; ?>
</p>
    <form action="<?php echo $this->_tpl_vars['tegevus']; ?>
" method="post" name="form1" id="form1">
      <table width="500"  border="0" align="center" cellpadding="3" cellspacing="1">
        <tr>
          <td width="130" align="right">Kasutajanimi:</td>
          <td width="370"><input name="username" type="text" class="vorm" id="nimi">
          </td>
        </tr>
        <tr>
          <td width="130" align="right">Salas&otilde;na:</td>
          <td width="370"><input name="password" type="password" class="vorm" id="email"></td>
        </tr>
        <tr>
          <td width="130" align="right" valign="top">&nbsp;</td>
          <td width="370"><input name="submit" type="submit" class="nupp" value="Sisene">
            <input name="Reset" type="reset" class="nupp" value="Puhasta"></td>
        </tr>
      </table>
    </form>
  </div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>