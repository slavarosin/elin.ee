{include file="header.tpl" title="Galerii"}
<div id="ttlContainer"><img src="img/vahe_top.gif" alt="" width="740" height="29">
  <div id="ttl"><img src="img/ttl_galerii.gif" alt="Galerii" width="78" height="18"></div>
  <div id="tagasiside"><a href="index.php?c=6" id="feedback" class="rollover"><img src="img/tagasiside_out.gif" alt="Tagasiside" width="79" height="16" border="0"></a></div>
  <div id="triipParem"><img src="img/spacer.gif" alt="" width="1" height="1"></div>
  <div id="triipVasak"><img src="img/spacer.gif" alt="" width="1" height="1"></div>
</div>
<div id="hoidja">
<div id="left"><a href="index.php?c=1" id="firmast" class="rollover"><img src="img/l_firmast_out.gif" alt="Firmast" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><a href="index.php?c=2" id="kontakt" class="rollover"><img src="img/l_kontakt_out.gif" alt="Kontakt" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><a href="index.php?c=3" id="tehtud" class="rollover"><img src="img/l_tehtud_out.gif" alt="Tehtud tööd" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><img src="img/l_galerii_over.gif" alt="Galerii" width="141" height="26" border="0"><img src="img/vahe_hele.gif" alt="" width="141" height="1"><a href="index.php?c=5" id="litsentsid" class="rollover"><img src="img/l_litsentsid_out.gif" alt="Litsentsid" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><img src="img/promo.gif" alt="" width="141" height="54" vspace="25"> </div>
<div id="main">
  Seda lehte on vaadatud {$page_views} korda
  <br>
  <table width="100%"  border="0" cellspacing="1" cellpadding="3">
    {section name=galerii loop=$pildid}
    <tr>
      <form action="index.php?c=4" method="post">
        <input type="hidden" name="id" value="{$pildid[galerii].gallery_id}">
        <input type="hidden" name="edit_c" value="4">
        <td><input type="text" name="description" value="{$pildid[galerii].description}" class="vorm"></td>
        <td><input type="submit" name="edit" value="MUUDA NIME" class="nupp"></td>
      </form>
      <td><a href="admin.php?action=edit_gallery&gallery={$pildid[galerii].gallery_id}">PILTIDE
          HALDUS</a></td>
    </tr>
    {/section}
  </table>
  <a href="admin.php?action=add_gallery">Lisa uus galerii</a> </div>
{include file="footer.tpl"} 