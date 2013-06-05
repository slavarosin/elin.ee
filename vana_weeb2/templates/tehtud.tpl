{include file="header.tpl" title="Tehtud t&ouml;&ouml;d"}

<div id="ttlContainer"><img src="img/vahe_top.gif" alt="" width="740" height="29">
  <div id="ttl"><img src="img/ttl_tehtud.gif" alt="Tehtud tööd" width="137" height="18"></div>
  <div id="tagasiside"><a href="index.php?c=6" id="feedback" class="rollover"><img src="img/tagasiside_out.gif" alt="Tagasiside" width="79" height="16" border="0"></a></div>
  <div id="triipParem"><img src="img/spacer.gif" alt="" width="1" height="1"></div>
  <div id="triipVasak"><img src="img/spacer.gif" alt="" width="1" height="1"></div>
</div>
<div id="hoidja">
  <div id="left"><a href="index.php?c=1" id="firmast" class="rollover"><img src="img/l_firmast_out.gif" alt="Firmast" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><a href="index.php?c=2" id="kontakt" class="rollover"><img src="img/l_kontakt_out.gif" alt="Kontakt" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><img src="img/l_tehtud_over.gif" alt="Tehtud tööd" width="141" height="26" border="0"><img src="img/vahe_hele.gif" alt="" width="141" height="1"><a href="index.php?c=4" id="galerii" class="rollover"><img src="img/l_galerii_out.gif" alt="Galerii" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><a href="index.php?c=5" id="litsentsid" class="rollover"><img src="img/l_litsentsid_out.gif" alt="Litsentsid" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><img src="img/promo.gif" alt="" width="141" height="54" vspace="25"> </div>
  <div id="main">
    <div align="center">{section name=aasta loop=$aastad}<a href="index.php?c=3&aasta={$aastad[aasta].year}" class="link12">{$aastad[aasta].year}</a> {/section}</div>
    <br>
    <br>
    Suuremad tehtud tööd aastal {$aasta}<br>
    <br>
    <table width="100%" border="0" align="right" cellpadding="3" cellspacing="1">
      <tr bgcolor="#EEEEEE">
        <td width="187">OBJEKT</td>
        <td width="130">ASUKOHT</td>
        <td width="97">TELLIJA</td>
	<td width="97">GALERII</td>
      </tr>
      {section name=job loop=$projektid}
      <tr{$projektid[job].color}>
        <td>{$projektid[job].name}</td>
        <td>{$projektid[job].place}</td>
        <td>{$projektid[job].orderer}</td>
	<td>{if $projektid[job].gallery_id != 0}<a href="index.php?c=4&galerii={$projektid[job].gallery_id}">vaata</a>{else}-{/if}</td>
      </tr>
      {/section}
    </table>
  </div>

{include file="footer.tpl"}
