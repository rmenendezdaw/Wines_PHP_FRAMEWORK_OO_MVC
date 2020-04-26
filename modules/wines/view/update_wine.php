<div id="contenido">
    <form autocomplete="on" method="post" name="formwines" id="formwines" >
    <?php
		if(isset($error)){
			print ("<BR><span CLASS='styerror'>" . "* ".$error . "</span><br/>");
		}?>
        <div class="myh1" data-tr="Update Wine"></div>
        <table border='0'>
            <tr>
                <td>Name: </td>
                <td><input type="text" id="name" name="name" placeholder="Name" value="<?php echo $rdo['name'];?>" /></td>
                <td><font color="red">
                    <span id="e_name" class="error">
                    </span>
                </font></font></td>
            </tr>
            <tr>
                <td>Code: </td>
                <td><input type="text" id="code" name="code" placeholder="code" value="<?php echo $rdo['code'];?>"  /></td>
                <td><font color="red">
                    <span id="e_code" class="error">
                    </span>
                </font></font></td>
            </tr>
            <tr>
                <td>Mark: </td>
                <td><input type="text" id="mark" name="mark" placeholder="mark" value="<?php echo $rdo['mark'];?>"  /></td>
                <td><font color="red">
                    <span id="e_mark" class="error">
                    </span>
                </font></font></td>
            </tr>
            <tr>
                <td>Grades: </td>
                <td><input type="text" id="grades" name="grades" placeholder="grades" value="<?php echo $rdo['grades'];?>"  /></td>
                <td><font color="red">
                    <span id="e_grades" class="error">
                    </span>
                </font></font></td>
            </tr>
            <tr>
                <td>
				<label for="grades">Type of Wine:</label><br>
                </td>
                <td>
                <select id="type" name="type" placeholder="type" value="">
                    <option value="Red">Red</option>
                    <option value="White">White</option>
                    <option value="Pink">Pink</option>
                    </select></td>
                <td><span id="e_type" class="styerror"></span></td>
            </tr>
            <tr>
                <td>Origin: </td>
                <td><input type="text" id="origin" name="origin" placeholder="origin" value="<?php echo $rdo['origin'];?>"  /></td>
                <td><font color="red">
                    <span id="e_origin" class="error">
                    </span>
                </font></font></td>
            </tr>
            <tr>
                <td>Year: </td>
                <td><input type="text" id="year" name="year" placeholder="year" value="<?php echo $rdo['year'];?>"  /></td>
                <td><font color="red">
                    <span id="e_year" class="error">
                    </span>
                </font></font></td>
                
            </tr>
            <tr>
            <td style="align-items: center;">
				<label for="grades" data-tr="Cellar:"></label><br>
            </td>
            <td>
			<select id="cellar" name="cellar" placeholder="cellar">
				<option value="AGR01">Agribergium</option>
				<option value="ALSO1">Alto Sotillo</option>
				<option value="ALT01">Aalto</option>
				<option value="BAR01">Barcillo</option>
				<option value="PIN01">Pingon</option>
				<option value="PRO01">Protots</option>
				<option value="REQ01">Requiem</option>
				</select></td>
			<td><span id="e_cellar" class="styerror"></span></td>
            </tr>
            <tr>
                <td><input name="update" type="button" value="Send" onclick="validate_wines(1)"/></td>
                <td align="right"><a href="index.php?page=controller_wines&op=list">Volver</a></td>
            </tr>
        </table>
    </form>
</div>