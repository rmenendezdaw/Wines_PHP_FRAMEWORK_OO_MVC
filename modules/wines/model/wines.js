function validate_name(name){
	if(name.length > 0){
		var regexp = /^[a-zA-Z0-9]{1,15}$/;
		return regexp.test(name);
	}
	return 0;
}
function validate_code(code){
	if(code.length > 0){
		var regexp = /^[0-9]{4}-[A-z]$/;
		return regexp.test(code);
	}
	return 0;
}
function validate_mark(mark){
	if(mark.length > 0){
		var regexp = /^[a-zA-Z0-9]{1,15}$/;
		return regexp.test(mark);
	}
	return 0;
}
function validate_type(type){
	if (type.length > 0){
		return true;
	}
}
function validate_grapes(grapes){
	for (var i = 0, l=grapes.options.length, option; i < l ; i++){
		option = grapes.options[i];
		if (option.selected ){
			return true;
		}
	}
	return false;
}
// function validate_import (import){
// 	var check = false;
// 	if(import.length > 0){
// 		$check=true;
// 	}
// 	return $check;
// }
function validate_grades(grades){
	if(grades.length > 0){
		var regexp = /^[0-9]{1,2}.[0-9]{1,2}$|^[0-9]{1,2}$/;
		return regexp.test(grades);
	}
	return 0;
}
function validate_origin(origin){
	if(origin.length > 0 ){
		var regexp = /^[a-zA-Z]{1,15}$/;
		return regexp.test(origin);
	}
	return 0;
}
function validate_year(year){
	if(year.length > 0 ){
		var regexp = /^(19|20)\d{2}$/;
		return regexp.test(year);
	}
	return 0;
}
function validate_wines($option) {
	 var error_res = false;
	 var name = document.getElementById('name').value;
	 var code = document.getElementById('code').value;
	 var mark = document.getElementById('mark').value;
	 var type = document.getElementById('type').value;
	//  var grapes = document.getElementById('grapes[]');
	 var grades = document.getElementById('grades').value;
	 var origin = document.getElementById('origin').value;
	 var year = document.getElementById('year').value;

	var v_name = validate_name(name);
	var v_code = validate_code(code);
	var v_mark = validate_mark(mark);
	var v_type = validate_type(type);
	// var v_grapes = validate_grapes(grapes);
	var v_grades = validate_grades(grades);
	var v_origin = validate_origin(origin);
	var v_year = validate_year(year);


if (!v_name){
	document.getElementById('e_name').innerHTML = "Name is not valid";
	error_res = true;
}else{
	document.getElementById('e_name').innerHTML = "";

}
if (!v_code){
	document.getElementById('e_code').innerHTML = "Code is not valid";
	error_res = true;
}else{
	document.getElementById('e_code').innerHTML = "";

}
if (!v_mark){
	document.getElementById('e_mark').innerHTML = "Mark is not valid";
	error_res = true;
}else{
	document.getElementById('e_mark').innerHTML = "";

}
if (!v_grades){
	document.getElementById('e_grades').innerHTML = "Grades is not valid";
	error_res = true;
}else{
	document.getElementById('e_grades').innerHTML = "";

}
if (!v_type){
	document.getElementById('e_type').innerHTML = "* You dont not select any type";
	error_res = true;
}else{
	document.getElementById('e_type').innerHTML = "";

 }
// if (!v_grapes){

// 	document.getElementById('e_grapes').innerHTML = "* You dont not select any grape";
// 	error_res = true;
// }else{
// 	document.getElementById('e_grapes').innerHTML = "";

// }
if (!v_origin){
	document.getElementById('e_origin').innerHTML = "Origin is not valid";
	error_res = true;
}else{
	document.getElementById('e_origin').innerHTML = "";

}
if (!v_year){
	document.getElementById('e_year').innerHTML = "Year is not valid";
	error_res = true;
}else{
	document.getElementById('e_year').innerHTML = "";

}

	if(error_res == false){
		document.formwines.submit();
		if($option == 0){
			document.formwines.action="index.php?page=controller_wines&op=create";
		}else if($option == 1){
			document.formwines.action="index.php?page=controller_wines&op=update";
		}
	}else{
		return false;
	}
}


