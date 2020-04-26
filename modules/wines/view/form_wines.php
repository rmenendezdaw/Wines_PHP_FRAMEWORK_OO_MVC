<div id="content"> 
<h1 class="myh1" data-tr="Create Wine"></h1>

<form method="post" name="formwines" id="formwines">
	<?php
		if(isset($error)){
			print ("<BR><span CLASS='styerror'>" . "* ".$error . "</span><br/>");
		}?>
		
	 <table class="table_create">
		<tr>
			<td>
				<label for="name" data-tr="Name:"></label>
			</td>
			<td>
				<input name="name" id="name" type="text" placeholder="Name" value="<?php echo $_POST?$_POST['name']:""; ?>" />
				<span id="e_name" class="styerror"></span>
			</td>
			<td>
				<label for="code" data-tr="Code:"></label>
			</td>
			<td>
				<input name="code" id="code" type="text" placeholder="1234-A" size="6" value="<?php echo $_POST?$_POST['code']:""; ?>" />
				<span id="e_code" class="styerror"></span>
			</td>
		</tr>
		<tr>
			<td>
				<label for="mark" data-tr="Mark:"></label>
			</td>
			<td>
				<input name="mark" id="mark" type="text" placeholder="Mark" value="<?php echo $_POST?$_POST['mark']:""; ?>" />
				<span id="e_mark" class="styerror"></span>
			</td>
		
			<td>
				<label for="grades" data-tr="Grades:"></label>
			</td>
			<td>
				<input name="grades" id="grades" type="text" placeholder="12.4"  size="5" value="<?php echo $_POST?$_POST['grades']:""; ?>" />
				<span id="e_grades" class="styerror"></span>
			</td>
		</tr>
		<tr>
			<td style="align-items: center;" colspan="2">
				<label for="grades"data-tr="Type of Wine:"></label><br>
			
			<select id="type" name="type" placeholder="type" value="">
				<option value="Red" data-tr="Red"></option>
				<option value="White" data-tr="White"></option>
				<option value="Pink" data-tr="Pink"></option>
				</select></td>
			<td><span id="e_type" class="styerror"></span></td>
		
			<td>
				<label for="grades" data-tr="Pink">Type of Grapes:</label><br>
			
				<select multiple id="grapes[]" name="grapes[]" placeholder="grapes" value="">
				<optgroup label="Red Grapes">
				<option value="Black Corinth">Black Corinth</option>
				<option value="Black Monukka">Black Monukka</option>
				<option value="Black Rose">Black Rose</option>
				<option value="Cardinal">Cardinal</option>
				<option value="Mazzarrone">Mazzarrone</option>
				</optgroup>
				<optgroup label="White Grapes">
				<option value="Calmeria">Calmeria</option>
				<option value="Centennial">Centennial</option>
				<option value="Koshu">Koshu</option>
				<option value="Perlette">Perlette</option>
				<option value="Rozaki">Rozaki</option>	
				</optgroup>
				<optgroup label="Pink Grapes">
				<option value="Alden">Alden</option>
				<option value="Bluebell">Bluebell</option>
				<option value="Buffalo">Buffalo</option>
				<option value="Concord">Concord</option>
				<option value="Mars">Mars</option>	
				</optgroup>
				</select></td>
			<td><span id="e_grades" class="styerror"></span></td>
		</tr>
		<tr>
			<td>
				<label for="origin" data-tr="Origin:"></label>
			</td>
			<td>
				<input name="origin" id="origin" type="text" placeholder="Origin" value="<?php echo $_POST?$_POST['origin']:""; ?>" />
				<span id="e_origin" class="styerror"></span>
			</td>
	
		<td>
				<label for="year" data-tr="Year:"></label>
			</td>
			<td>
				<input name="year" id="year" type="text" placeholder="1990" value="<?php echo $_POST?$_POST['year']:""; ?>" />
				<span id="e_year" class="styerror"></span>
			</td>
			
		</tr>
		<tr>
			<td>
				<label for="imported" data-tr="Imported:"></label>
			</td>
			<td>
				<input type="checkbox" name="imported" id="imported" type="text" placeholder="imported">
			</td>
			<td style="align-items: center;" colspan="2">
				<label for="cellar" data-tr="Cellar:"></label><br>
			
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
		
			<td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input name="create" type="button" value="Send" onclick="validate_wines(0)" />
			</td>
		</tr> 
	 </table>
	 <a href="index.php?page=controller_wines&op=list" data-tr="Return"></a>
	</form>
</div>