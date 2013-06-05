<FORM ACTION="?m=news&do=add" METHOD=POST NAME="addnews">
<table>
	<tr>
		<td>News Text:</td>
		<td><TEXTAREA NAME="short" COLS="40" ROWS="3"></TEXTAREA></td>
	</tr>
	<tr>
		<td>News Link:</td>
		<td><INPUT TYPE="text" name="link" value="http://" style="width: 600px"></td>
	</tr>
	<tr>
		<td>News Date:</td>
		<td>
		<?
		echo "<SELECT name='day'>";
		for($i=1;$i<32;$i++){
			if(strlen($i)==1)$i="0".$i;
			echo "<OPTION value=$i ";
			if (($_POST["day"] == $i) || (!isset($_POST["day"]) && ($i==date("d"))))
				echo "selected";
			echo ">$i</OPTION>";
		}
		echo "</SELECT>";

		echo "<SELECT name='month'>";
		for($i=1;$i<13;$i++){
			if(strlen($i)==1)$i="0".$i;
			echo "<OPTION value=$i ";
			if (($_POST["month"] == $i) || (!isset($_POST["month"]) && ($i==date("m"))))
				echo "selected";
			echo ">".strftime("%b", strtotime(date("Y").$i."01"))."</OPTION>";
		}
		echo "</SELECT>";

		echo "<SELECT name='year'>";
		for($i=date("Y")-2;$i<date("Y")+3;$i++){
			echo "<OPTION value=$i ";
			if (($_POST["year"] == $i) || (!isset($_POST["year"]) && ($i==date("Y"))))
				echo "selected";
			echo ">$i</OPTION>";
		}
		echo "</SELECT>";

		echo "&nbsp;&nbsp;&nbsp;<SELECT name='hour'>";
		for($i=0;$i<23;$i++){
			if(strlen($i)==1) $i = "0".$i;

			echo "<OPTION value=$i ";
			if (($_POST["hour"] == $i) || (!isset($_POST["hour"]) && ($i==date("H"))))
				echo "selected";
			echo ">$i</OPTION>";
		}
		echo "</SELECT>";
		echo ":<SELECT name='minute'>";
		for($i=0;$i<59;$i++){
			if(strlen($i)==1) $i = "0".$i;

			echo "<OPTION value=$i ";
			if (($_POST["minute"] == $i) || (!isset($_POST["minute"]) && ($i==date("i"))))
				echo "selected";
			echo ">$i</OPTION>";
		}
		echo "</SELECT>";
		?>
		</td>
	</tr>
</table>
<INPUT TYPE="submit" VALUE="Add News">
</FORM>
