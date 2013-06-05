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
  <div align="center">
  Seda lehte on vaadatud {$page_views} korda
  <br>
  {section name=aasta loop=$aastad}<a href="index.php?c=3&aasta={$aastad[aasta].year}" class="link12">{$aastad[aasta].year}</a> {/section}</div>
  <br>
  <br>
  Suuremad tehtud tööd aastal {$aasta}<br>
  <br>
  <table width="100%" border="0" cellpadding="3" cellspacing="1">
    <tr bgcolor="#dddddd">
      <td width="18%">OBJEKT</td>
      <td width="18%">ASUKOHT</td>
      <td width="18%">TELLIJA</td>
      <td width="18%">GALERII</td>
      <td width="14%">MUUDA</td>
      <td width="14%">KUSTUTA</td>
    </tr>{section name=job loop=$projektid}	
    <tr{$projektid[job].color}>    
    <form action="index.php?c=3&aasta={$aasta}" method="post">
      <input type="hidden" name="id" value="{$projektid[job].project_id}">
      <input type="hidden" name="edit_c" value="3">
      <td width="17%"><input type="text" name="name" value="{$projektid[job].name}" class="vormCMS"></td>
      <td width="17%"><input type="text" name="place" value="{$projektid[job].place}" class="vormCMS"></td>
      <td width="17%"><input type="text" name="orderer" value="{$projektid[job].orderer}" class="vormCMS"></td>
      <td width="17%"><select name="gallery_id" class="vormCMS">
		{html_options options=$galeriid selected=$projektid[job].gallery_id}        
        </select>
      </td>
      <td width="16%"><input type="submit" name="edit" value="MUUDA" class="nuppCMS"></td>
      <td width="16%"><input type="submit" name="delete" value="KUSTUTA" class="nuppCMS"></td>
    </form>
    </tr>{/section}
  </table>
  <p>Lisa uus:</p>
  <form action="index.php?c=3&aasta={$aasta}" method="post">
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
        <td width="20%"><input type="text" name="year" value="{$aasta}" class="vormCMS"></td>
        <td width="20%"><input type="submit" name="add" value="LISA" class="nupp"></td>
      </tr>
    </table>
  </form>
</div>
{include file="footer.tpl"} 