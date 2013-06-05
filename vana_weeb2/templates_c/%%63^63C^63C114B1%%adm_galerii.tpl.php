<?php /* Smarty version 2.6.9, created on 2005-05-04 17:01:38
         compiled from adm_galerii.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array('title' => 'Galerii')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="ttlContainer"><img src="img/vahe_top.gif" alt="" width="740" height="29">
  <div id="ttl"><img src="img/ttl_galerii.gif" alt="Galerii" width="78" height="18"></div>
  <div id="tagasiside"><a href="index.php?c=6" id="feedback" class="rollover"><img src="img/tagasiside_out.gif" alt="Tagasiside" width="79" height="16" border="0"></a></div>
  <div id="triipParem"><img src="img/spacer.gif" alt="" width="1" height="1"></div>
  <div id="triipVasak"><img src="img/spacer.gif" alt="" width="1" height="1"></div>
</div>
<div id="hoidja">
<div id="left"><a href="index.php?c=1" id="firmast" class="rollover"><img src="img/l_firmast_out.gif" alt="Firmast" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><a href="index.php?c=2" id="kontakt" class="rollover"><img src="img/l_kontakt_out.gif" alt="Kontakt" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><a href="index.php?c=3" id="tehtud" class="rollover"><img src="img/l_tehtud_out.gif" alt="Tehtud tööd" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><img src="img/l_galerii_over.gif" alt="Galerii" width="141" height="26" border="0"><img src="img/vahe_hele.gif" alt="" width="141" height="1"><a href="index.php?c=5" id="litsentsid" class="rollover"><img src="img/l_litsentsid_out.gif" alt="Litsentsid" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><img src="img/promo.gif" alt="" width="141" height="54" vspace="25"> </div>
<div id="main">
  Seda lehte on vaadatud <?php echo $this->_tpl_vars['page_views']; ?>
 korda
  <br>
  <table width="100%"  border="0" cellspacing="1" cellpadding="3">
    <?php unset($this->_sections['galerii']);
$this->_sections['galerii']['name'] = 'galerii';
$this->_sections['galerii']['loop'] = is_array($_loop=$this->_tpl_vars['pildid']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['galerii']['show'] = true;
$this->_sections['galerii']['max'] = $this->_sections['galerii']['loop'];
$this->_sections['galerii']['step'] = 1;
$this->_sections['galerii']['start'] = $this->_sections['galerii']['step'] > 0 ? 0 : $this->_sections['galerii']['loop']-1;
if ($this->_sections['galerii']['show']) {
    $this->_sections['galerii']['total'] = $this->_sections['galerii']['loop'];
    if ($this->_sections['galerii']['total'] == 0)
        $this->_sections['galerii']['show'] = false;
} else
    $this->_sections['galerii']['total'] = 0;
if ($this->_sections['galerii']['show']):

            for ($this->_sections['galerii']['index'] = $this->_sections['galerii']['start'], $this->_sections['galerii']['iteration'] = 1;
                 $this->_sections['galerii']['iteration'] <= $this->_sections['galerii']['total'];
                 $this->_sections['galerii']['index'] += $this->_sections['galerii']['step'], $this->_sections['galerii']['iteration']++):
$this->_sections['galerii']['rownum'] = $this->_sections['galerii']['iteration'];
$this->_sections['galerii']['index_prev'] = $this->_sections['galerii']['index'] - $this->_sections['galerii']['step'];
$this->_sections['galerii']['index_next'] = $this->_sections['galerii']['index'] + $this->_sections['galerii']['step'];
$this->_sections['galerii']['first']      = ($this->_sections['galerii']['iteration'] == 1);
$this->_sections['galerii']['last']       = ($this->_sections['galerii']['iteration'] == $this->_sections['galerii']['total']);
?>
    <tr>
      <form action="index.php?c=4" method="post">
        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['pildid'][$this->_sections['galerii']['index']]['gallery_id']; ?>
">
        <input type="hidden" name="edit_c" value="4">
        <td><input type="text" name="description" value="<?php echo $this->_tpl_vars['pildid'][$this->_sections['galerii']['index']]['description']; ?>
" class="vorm"></td>
        <td><input type="submit" name="edit" value="MUUDA NIME" class="nupp"></td>
      </form>
      <td><a href="admin.php?action=edit_gallery&gallery=<?php echo $this->_tpl_vars['pildid'][$this->_sections['galerii']['index']]['gallery_id']; ?>
">PILTIDE
          HALDUS</a></td>
    </tr>
    <?php endfor; endif; ?>
  </table>
  <a href="admin.php?action=add_gallery">Lisa uus galerii</a> </div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 