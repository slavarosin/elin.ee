<?php /* Smarty version 2.6.9, created on 2005-05-04 17:01:24
         compiled from adm_tehtud.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'adm_tehtud.tpl', 36, false),)), $this); ?>
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
  <div align="center">
  Seda lehte on vaadatud <?php echo $this->_tpl_vars['page_views']; ?>
 korda
  <br>
  <?php unset($this->_sections['aasta']);
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
  <table width="100%" border="0" cellpadding="3" cellspacing="1">
    <tr bgcolor="#dddddd">
      <td width="18%">OBJEKT</td>
      <td width="18%">ASUKOHT</td>
      <td width="18%">TELLIJA</td>
      <td width="18%">GALERII</td>
      <td width="14%">MUUDA</td>
      <td width="14%">KUSTUTA</td>
    </tr><?php unset($this->_sections['job']);
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
    <form action="index.php?c=3&aasta=<?php echo $this->_tpl_vars['aasta']; ?>
" method="post">
      <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['projektid'][$this->_sections['job']['index']]['project_id']; ?>
">
      <input type="hidden" name="edit_c" value="3">
      <td width="17%"><input type="text" name="name" value="<?php echo $this->_tpl_vars['projektid'][$this->_sections['job']['index']]['name']; ?>
" class="vormCMS"></td>
      <td width="17%"><input type="text" name="place" value="<?php echo $this->_tpl_vars['projektid'][$this->_sections['job']['index']]['place']; ?>
" class="vormCMS"></td>
      <td width="17%"><input type="text" name="orderer" value="<?php echo $this->_tpl_vars['projektid'][$this->_sections['job']['index']]['orderer']; ?>
" class="vormCMS"></td>
      <td width="17%"><select name="gallery_id" class="vormCMS">
		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['galeriid'],'selected' => $this->_tpl_vars['projektid'][$this->_sections['job']['index']]['gallery_id']), $this);?>
        
        </select>
      </td>
      <td width="16%"><input type="submit" name="edit" value="MUUDA" class="nuppCMS"></td>
      <td width="16%"><input type="submit" name="delete" value="KUSTUTA" class="nuppCMS"></td>
    </form>
    </tr><?php endfor; endif; ?>
  </table>
  <p>Lisa uus:</p>
  <form action="index.php?c=3&aasta=<?php echo $this->_tpl_vars['aasta']; ?>
" method="post">
    <table width="100%" border="0" align="right" cellpadding="3" cellspacing="1">
      <tr>
        <td width="20%">Objekt:</td>
        <td width="20%">Asukoht:</td>
        <td width="20%">Tellija:</td>
        <td width="20%">Aasta:</td>
        <td width="20%">LISA</td>
      </tr>
      <tr>
        <input type="hidden" name="edit_c" value="3">
        <td width="20%"><input type="text" name="name" class="vormCMS"></td>
        <td width="20%"><input type="text" name="place" class="vormCMS"></td>
        <td width="20%"><input type="text" name="orderer" class="vormCMS"></td>
        <td width="20%"><input type="text" name="year" value="<?php echo $this->_tpl_vars['aasta']; ?>
" class="vormCMS"></td>
        <td width="20%"><input type="submit" name="add" value="LISA" class="nupp"></td>
      </tr>
    </table>
  </form>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 