<FORM id=form name=form action="index.php?m=check" method="post">
<TABLE border=0>
<TBODY>
<?

if ($_GET["err"] != "") {
	echo "<TR><TD colspan=3 align=center style='color:red'><STRONG>";

if ($_GET["err"] == "error1")
	echo "Login or password is invalid!";

echo "</TD></TR>";
}
?>
<TR>
<TD align=left>
<?

echo "<DIV style='PADDING-LEFT: 4px; PADDING-TOP: 0px;PADDING-RIGHT: 5px;";
if ($_GET["err"] == "error1")
	echo "color:red";
echo "'>Login:</td>";
echo "<td><INPUT ";
if ($_POST["login"] != "")
	echo "value=" . $_POST["login"];
echo " name=login style='WIDTH: 122px;'></DIV></td></tr>";

?>
<TR>
<TD align=left>
<?

echo "<DIV style='PADDING-LEFT: 4px; PADDING-TOP: 0px;PADDING-RIGHT: 5px;";
if ($_GET["err"] == "error1")
	echo "color:red";
echo "'>Password:</Td>";
echo "<Td align=left><INPUT type=password name=pass style='WIDTH: 122px;'></td></tr>";
?>
<tr><TD colspan=2>
<DIV align=right><INPUT TYPE=submit VALUE="Login"/></DIV>
</TBODY>
</TABLE>
</FORM>