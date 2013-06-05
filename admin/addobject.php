<FORM ACTION="?m=objects&do=add" METHOD=POST NAME="addobject" enctype="multipart/form-data">
<table>
	<tr>
		<td>Name:</td>
		<td><INPUT TYPE="text" name="name" style="width: 600px"></td>
	</tr>
	<tr>
		<td>Place:</td>
		<td><INPUT TYPE="text" name="place" style="width: 600px"></td>
	</tr>
	<tr>
		<td>Orderer:</td>
		<td><INPUT TYPE="text" name="orderer" style="width: 600px"></td>
	</tr>
	<tr>
		<td>Year:</td>
		<td>
		<?
		echo "<SELECT name='year'>";
		for($i=1992;$i<=date("Y")+1;$i++){
			echo "<OPTION value=$i ";
			if (($_POST["year"] == $i) || (!isset($_POST["year"]) && ($i==date("Y"))))
				echo "selected";
			echo ">$i</OPTION>";
		}
		echo "</SELECT>";
		?>
		</td>
	</tr>
	<tr>
		<td>Active:</td>
		<td align="left"><INPUT TYPE="checkbox" name="active" checked="checked"></td>
	</tr>
	<tr>
		<td>Photos:</td>
		<td align="left"><INPUT TYPE="checkbox" name="gallery_id"></td>
	</tr>
	<tr>
        <td>Select file</td>
        <td align="left">
            <input name="ufile[]" type="file" id="ufile[]" size="50" />
        </td>
	</tr>
	<tr>
        <td>Select file</td>
        <td align="left">
            <input name="ufile[]" type="file" id="ufile[]" size="50" />
        </td>
	</tr>
	<tr>
        <td>Select file</td>
        <td align="left">
            <input name="ufile[]" type="file" id="ufile[]" size="50" />
        </td>
	</tr>
    <tr>
        <td>Select file</td>
        <td align="left">
            <input name="ufile[]" type="file" id="ufile[]" size="50" />
        </td>
    </tr>
    <tr>
        <td>Select file</td>
        <td align="left">
            <input name="ufile[]" type="file" id="ufile[]" size="50" />
        </td>
    </tr>
</table>
<INPUT TYPE="submit" VALUE="Add Object">
</FORM>