<?php /* Smarty version 2.6.9, created on 2005-05-04 17:01:44
         compiled from adm_litsentsid.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "adm_header.tpl", 'smarty_include_vars' => array('title' => 'Litsentsid')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="ttlContainer"><img src="img/vahe_top.gif" alt="" width="740" height="29">
  <div id="ttl"><img src="img/ttl_litsentsid.gif" alt="Litsentsid" width="105" height="18"></div>
  <div id="tagasiside"><a href="index.php?c=6" id="feedback" class="rollover"><img src="img/tagasiside_out.gif" alt="Tagasiside" width="79" height="16" border="0"></a></div>
  <div id="triipParem"><img src="img/spacer.gif" alt="" width="1" height="1"></div>
  <div id="triipVasak"><img src="img/spacer.gif" alt="" width="1" height="1"></div>
</div>
<div id="hoidja">
<div id="left"><a href="index.php?c=1" id="firmast" class="rollover"><img src="img/l_firmast_out.gif" alt="Firmast" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><a href="index.php?c=2" id="kontakt" class="rollover"><img src="img/l_kontakt_out.gif" alt="Kontakt" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><a href="index.php?c=3" id="tehtud" class="rollover"><img src="img/l_tehtud_out.gif" alt="Tehtud tööd" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><a href="index.php?c=4" id="galerii" class="rollover"><img src="img/l_galerii_out.gif" alt="Galerii" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><img src="img/l_litsentsid_over.gif" alt="Litsentsid" width="141" height="26" border="0"><img src="img/vahe_hele.gif" alt="" width="141" height="1"><img src="img/promo.gif" alt="" width="141" height="54" vspace="25">&nbsp;</div>
<div id="main">
  Seda lehte on vaadatud <?php echo $this->_tpl_vars['page_views']; ?>
 korda
  <br>
  <p>Lisa uus:</p>
  <p><?php echo $this->_tpl_vars['error']; ?>
</p>
  <form action="index.php?c=5" method="post" enctype="multipart/form-data">
	Pilt: <input type="file" name="picture" class="vormCMSlai">
	Nimetus: <input type="text" name="name" class="vormCMSlai">
	<input type="hidden" name="edit_c" value="5"><input type="submit" name="add" value="Sisesta" class="nupp">
  </form>
    <table width="100%"  border="0" cellspacing="1" cellpadding="3">
      <tr>
	    <?php unset($this->_sections['litsents']);
$this->_sections['litsents']['name'] = 'litsents';
$this->_sections['litsents']['loop'] = is_array($_loop=$this->_tpl_vars['litsentsid']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['litsents']['show'] = true;
$this->_sections['litsents']['max'] = $this->_sections['litsents']['loop'];
$this->_sections['litsents']['step'] = 1;
$this->_sections['litsents']['start'] = $this->_sections['litsents']['step'] > 0 ? 0 : $this->_sections['litsents']['loop']-1;
if ($this->_sections['litsents']['show']) {
    $this->_sections['litsents']['total'] = $this->_sections['litsents']['loop'];
    if ($this->_sections['litsents']['total'] == 0)
        $this->_sections['litsents']['show'] = false;
} else
    $this->_sections['litsents']['total'] = 0;
if ($this->_sections['litsents']['show']):

            for ($this->_sections['litsents']['index'] = $this->_sections['litsents']['start'], $this->_sections['litsents']['iteration'] = 1;
                 $this->_sections['litsents']['iteration'] <= $this->_sections['litsents']['total'];
                 $this->_sections['litsents']['index'] += $this->_sections['litsents']['step'], $this->_sections['litsents']['iteration']++):
$this->_sections['litsents']['rownum'] = $this->_sections['litsents']['iteration'];
$this->_sections['litsents']['index_prev'] = $this->_sections['litsents']['index'] - $this->_sections['litsents']['step'];
$this->_sections['litsents']['index_next'] = $this->_sections['litsents']['index'] + $this->_sections['litsents']['step'];
$this->_sections['litsents']['first']      = ($this->_sections['litsents']['iteration'] == 1);
$this->_sections['litsents']['last']       = ($this->_sections['litsents']['iteration'] == $this->_sections['litsents']['total']);
?>
        <td width="50%">
		  <table width="100%" border="0" cellspacing="1" cellpadding="3">
		    <tr>
			  <td><img src="./pics/<?php echo $this->_tpl_vars['litsentsid'][$this->_sections['litsents']['index']]['link']; ?>
" border="1" width="210" height="297" alt=""></td>
			</tr>
			<form action="index.php?c=5" method="post">
		    <tr>
			  <td><input type="hidden" name="edit_c" value="5"><input type="hidden" name="license_id" value="<?php echo $this->_tpl_vars['litsentsid'][$this->_sections['litsents']['index']]['license_id']; ?>
"><input type="text" name="name" class="vormCMSlai" value="<?php echo $this->_tpl_vars['litsentsid'][$this->_sections['litsents']['index']]['name']; ?>
"></td>
			</tr>
		    <tr>
			  <td><input type="submit" name="edit" value="Muuda nime" class="nupp"><input type="submit" name="delete" value="Kustuta" class="nupp"></td>
			</tr>
			</form>
		  </table>
		</td>
	  <?php if ($this->_sections['litsents']['iteration'] % 2 == 0): ?>
      <tr>
      </tr>
	  <?php endif; ?>
	    <?php endfor; endif; ?>
	  </tr>
    </table>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>