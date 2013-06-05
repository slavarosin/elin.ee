<?php /* Smarty version 2.6.9, created on 2005-05-04 16:16:37
         compiled from tehtud.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array('title' => "Tehtud t&ouml;&ouml;d")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="ttlContainer"><img src="img/vahe_top.gif" alt="" width="740" height="29">
  <div id="ttl"><img src="img/ttl_tehtud.gif" alt="Tehtud tööd" width="137" height="18"></div>
  <div id="tagasiside"><a href="index.php?c=6" id="feedback" class="rollover"><img src="img/tagasiside_out.gif" alt="Tagasiside" width="79" height="16" border="0"></a></div>
  <div id="triipParem"><img src="img/spacer.gif" alt="" width="1" height="1"></div>
  <div id="triipVasak"><img src="img/spacer.gif" alt="" width="1" height="1"></div>
</div>
<div id="hoidja">
  <div id="left"><a href="index.php?c=1" id="firmast" class="rollover"><img src="img/l_firmast_out.gif" alt="Firmast" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><a href="index.php?c=2" id="kontakt" class="rollover"><img src="img/l_kontakt_out.gif" alt="Kontakt" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><img src="img/l_tehtud_over.gif" alt="Tehtud tööd" width="141" height="26" border="0"><img src="img/vahe_hele.gif" alt="" width="141" height="1"><a href="index.php?c=4" id="galerii" class="rollover"><img src="img/l_galerii_out.gif" alt="Galerii" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><a href="index.php?c=5" id="litsentsid" class="rollover"><img src="img/l_litsentsid_out.gif" alt="Litsentsid" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><img src="img/promo.gif" alt="" width="141" height="54" vspace="25"> </div>
  <div id="main">
    <div align="center"><?php unset($this->_sections['aasta']);
$this->_sections['aasta']['name'] = 'aasta';
$this->_sections['aasta']['loop'] = is_array($_loop=$this->_tpl_vars['aastad']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['aasta']['show'] = true;
$this->_sections['aasta']['max'] = $this->_sections['aasta']['loop'];
$this->_sections['aasta']['step'] = 1;
$this->_sections['aasta']['start'] = $this->_sections['aasta']['step'] > 0 ? 0 : $this->_sections['aasta']['loop']-1;
if ($this->_sections['aasta']['show']) {
    $this->_sections['aasta']['total'] = $this->_sections['aasta']['loop'];
    if ($this->_sections['aasta']['total'] == 0)
        $this->_sections['aasta']['show'] = false;
} else
    $this->_sections['aasta']['total'] = 0;
if ($this->_sections['aasta']['show']):

            for ($this->_sections['aasta']['index'] = $this->_sections['aasta']['start'], $this->_sections['aasta']['iteration'] = 1;
                 $this->_sections['aasta']['iteration'] <= $this->_sections['aasta']['total'];
                 $this->_sections['aasta']['index'] += $this->_sections['aasta']['step'], $this->_sections['aasta']['iteration']++):
$this->_sections['aasta']['rownum'] = $this->_sections['aasta']['iteration'];
$this->_sections['aasta']['index_prev'] = $this->_sections['aasta']['index'] - $this->_sections['aasta']['step'];
$this->_sections['aasta']['index_next'] = $this->_sections['aasta']['index'] + $this->_sections['aasta']['step'];
$this->_sections['aasta']['first']      = ($this->_sections['aasta']['iteration'] == 1);
$this->_sections['aasta']['last']       = ($this->_sections['aasta']['iteration'] == $this->_sections['aasta']['total']);
?><a href="index.php?c=3&aasta=<?php echo $this->_tpl_vars['aastad'][$this->_sections['aasta']['index']]['year']; ?>
" class="link12"><?php echo $this->_tpl_vars['aastad'][$this->_sections['aasta']['index']]['year']; ?>
</a> <?php endfor; endif; ?></div>
    <br>
    <br>
    Suuremad tehtud tööd aastal <?php echo $this->_tpl_vars['aasta']; ?>
<br>
    <br>
    <table width="100%" border="0" align="right" cellpadding="3" cellspacing="1">
      <tr bgcolor="#EEEEEE">
        <td width="187">OBJEKT</td>
        <td width="130">ASUKOHT</td>
        <td width="97">TELLIJA</td>
	<td width="97">GALERII</td>
      </tr>
      <?php unset($this->_sections['job']);
$this->_sections['job']['name'] = 'job';
$this->_sections['job']['loop'] = is_array($_loop=$this->_tpl_vars['projektid']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['job']['show'] = true;
$this->_sections['job']['max'] = $this->_sections['job']['loop'];
$this->_sections['job']['step'] = 1;
$this->_sections['job']['start'] = $this->_sections['job']['step'] > 0 ? 0 : $this->_sections['job']['loop']-1;
if ($this->_sections['job']['show']) {
    $this->_sections['job']['total'] = $this->_sections['job']['loop'];
    if ($this->_sections['job']['total'] == 0)
        $this->_sections['job']['show'] = false;
} else
    $this->_sections['job']['total'] = 0;
if ($this->_sections['job']['show']):

            for ($this->_sections['job']['index'] = $this->_sections['job']['start'], $this->_sections['job']['iteration'] = 1;
                 $this->_sections['job']['iteration'] <= $this->_sections['job']['total'];
                 $this->_sections['job']['index'] += $this->_sections['job']['step'], $this->_sections['job']['iteration']++):
$this->_sections['job']['rownum'] = $this->_sections['job']['iteration'];
$this->_sections['job']['index_prev'] = $this->_sections['job']['index'] - $this->_sections['job']['step'];
$this->_sections['job']['index_next'] = $this->_sections['job']['index'] + $this->_sections['job']['step'];
$this->_sections['job']['first']      = ($this->_sections['job']['iteration'] == 1);
$this->_sections['job']['last']       = ($this->_sections['job']['iteration'] == $this->_sections['job']['total']);
?>
      <tr<?php echo $this->_tpl_vars['projektid'][$this->_sections['job']['index']]['color']; ?>
>
        <td><?php echo $this->_tpl_vars['projektid'][$this->_sections['job']['index']]['name']; ?>
</td>
        <td><?php echo $this->_tpl_vars['projektid'][$this->_sections['job']['index']]['place']; ?>
</td>
        <td><?php echo $this->_tpl_vars['projektid'][$this->_sections['job']['index']]['orderer']; ?>
</td>
	<td><?php if ($this->_tpl_vars['projektid'][$this->_sections['job']['index']]['gallery_id'] != 0): ?><a href="index.php?c=4&galerii=<?php echo $this->_tpl_vars['projektid'][$this->_sections['job']['index']]['gallery_id']; ?>
">vaata</a><?php else: ?>-<?php endif; ?></td>
      </tr>
      <?php endfor; endif; ?>
    </table>
  </div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>