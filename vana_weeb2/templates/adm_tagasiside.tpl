{include file="header.tpl" title="Tagasiside"}

<div id="ttlContainer"><img src="img/vahe_top.gif" alt="" width="740" height="29">
  <div id="ttl"><img src="img/ttl_tagasiside.gif" alt="Tagasiside" width="120" height="23"></div>
  <div id="tagasiside"><a href="index.php?c=6" id="feedback" class="rollover"><img src="img/tagasiside_out.gif" alt="Tagasiside" width="79" height="16" border="0"></a></div>
  <div id="triipParem"><img src="img/spacer.gif" alt="" width="1" height="1"></div>
  <div id="triipVasak"><img src="img/spacer.gif" alt="" width="1" height="1"></div>
</div>
<div id="hoidja">
  <div id="left"><a href="index.php?c=1" id="firmast" class="rollover"><img src="img/l_firmast_out.gif" alt="Firmast" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><a href="index.php?c=2" id="kontakt" class="rollover"><img src="img/l_kontakt_out.gif" alt="Kontakt" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><a href="index.php?c=3" id="tehtud" class="rollover"><img src="img/l_tehtud_out.gif" alt="Tehtud t��d" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><a href="index.php?c=4" id="galerii" class="rollover"><img src="img/l_galerii_out.gif" alt="Galerii" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><a href="index.php?c=5" id="litsentsid" class="rollover"><img src="img/l_litsentsid_out.gif" alt="Litsentsid" width="141" height="26" border="0"></a><img src="img/vahe_hele.gif" alt="" width="141" height="1"><img src="img/promo.gif" alt="" width="141" height="54" vspace="25"> </div>
  <div id="main">
    Seda lehte on vaadatud {$page_views} korda
  	<br>
	<p>{$message}</p>
    <form action="mail.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
      <table width="500"  border="0" align="center" cellpadding="3" cellspacing="1">
        <tr>
          <td width="130" align="right">Nimi:</td>
          <td width="370"><input name="name" type="text" class="vorm" id="nimi">
          </td>
        </tr>
        <tr>
          <td width="130" align="right">E-mail:</td>
          <td width="370"><input name="mail" type="text" class="vorm" id="email"></td>
        </tr>
        <tr>
          <td width="130" align="right" valign="top">Kiri:</td>
          <td width="370"><textarea name="message" cols="5" rows="5" class="vorm" id="kiri"></textarea></td>
        </tr>
        <tr>
          <td width="130" align="right">Fail:</td>
          <td width="370"><input name="attach" type="file" class="vorm" id="fail"></td>
        </tr>
        <tr>
          <td width="130" align="right" valign="top">&nbsp;</td>
          <td width="370"><input name="submit" type="submit" class="nupp" value="Saada">
            <input name="Reset" type="reset" class="nupp" value="Puhasta"></td>
        </tr>
      </table>
    </form>
  </div>

{include file="footer.tpl"}
