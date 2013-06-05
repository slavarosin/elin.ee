{include file="header.tpl" title="Litsentsid"}
<div id="ttlContainer"><img src="img/vahe_top.gif" alt="" width="740" height="29">
  <div id="ttl"><img src="img/ttl_litsentsid.gif" alt="Litsentsid" width="105" height="18"></div>
  <div id="tagasiside"><a href="index.php?c=6" id="feedback" class="rollover"><img src="img/tagasiside_out.gif" alt="Tagasiside" width="79" height="16" border="0"></a></div>
  <div id="triipParem"><img src="img/spacer.gif" alt="" width="1" height="1"></div>
  <div id="triipVasak"><img src="img/spacer.gif" alt="" width="1" height="1"></div>
</div>
<div id="hoidja">
  <div id="left"><a href="index.php?c=1" id="firmast" class="rollover"><img src="img/l_firmast_out.gif" alt="Firmast" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><a href="index.php?c=2" id="kontakt" class="rollover"><img src="img/l_kontakt_out.gif" alt="Kontakt" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><a href="index.php?c=3" id="tehtud" class="rollover"><img src="img/l_tehtud_out.gif" alt="Tehtud tööd" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><a href="index.php?c=4" id="galerii" class="rollover"><img src="img/l_galerii_out.gif" alt="Galerii" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><img src="img/l_litsentsid_over.gif" alt="Litsentsid" width="141" height="26" border="0"><img src="img/vahe_hele.gif" alt="" width="141" height="1"><img src="img/promo.gif" alt="" width="141" height="54" vspace="25">&nbsp;</div>
  <div id="main">
    <table width="100%"  border="0" cellspacing="1" cellpadding="3">
      <tr>
	    {section name=litsents loop=$litsentsid}
        <td width="50%">
		  <table width="100%" border="0" cellspacing="1" cellpadding="3">
		    <tr>
			  <td><a href="#" onClick="window.open('index.php?c=7&license_id={$litsentsid[litsents].license_id}','','scrollbars=1,resizable=1')"><img src="./pics/{$litsentsid[litsents].link}" border="0" width="210" height="297" alt=""></a></td>
			</tr>
		    <tr>
			  <td>{$litsentsid[litsents].name}</td>
			</tr>
		  </table>
		</td>
	  {if $smarty.section.litsents.iteration mod 2 == 0 }
      <tr>
      </tr>
	  {/if}
	    {/section}
	  </tr>
    </table>  
  </div>
{include file="footer.tpl"}