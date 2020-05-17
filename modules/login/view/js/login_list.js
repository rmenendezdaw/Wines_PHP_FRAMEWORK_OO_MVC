function validate_username(username){
	if(username.length > 0){
		var regexp = /^[a-zA-Z0-9]{1,15}$/;
		return regexp.test(username);
	}else{
        document.getElementById('e_username').innerHTML = "Username empty";
    }
	return 0;
}
function validate_email(email){
	if(email.length > 0){
		var regexp = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
		return regexp.test(email);
	}else{
        document.getElementById('e_email').innerHTML = "Email is not valid";
    }
	return 0;
}
function validate_password(password){
	if(password.length > 0){
        var regexp = /^[a-zA-Z0-9-_.]{5,20}$/;
		return regexp.test(password);

    }else{
        document.getElementById('e_password').innerHTML = "Password is empty";
    }
	return 0;
}
function validate_repassword(repassword){
	if(repassword.length > 0){
        var regexp = /^[a-zA-Z0-9-_.]{5,20}$/;
		return regexp.test(repassword);
    }else{
        document.getElementById('e_repassword').innerHTML = "This cannot be empty";
    }
	return 0;
}
function validate_register(){
    var error_res = false;

    var username = document.getElementById('username').value;
	var email = document.getElementById('email').value;
	var password = document.getElementById('password').value;
    var repassword = document.getElementById('repassword').value;

    var v_username = validate_username(username);
    var v_email = validate_email(email);
    var v_password = validate_password(password);
    var v_repassword = validate_repassword(repassword);

 console.log(password);
 console.log(repassword);
    
    
    if (!v_username){
        document.getElementById('e_username').innerHTML = "Username is not valid";
        error_res = true;
    }else{
        document.getElementById('e_username').innerHTML = "";
    }
    if (!v_email){
        document.getElementById('e_email').innerHTML = "Email is not valid";
        error_res = true;
    }else{
        document.getElementById('e_email').innerHTML = "";
    }
    if (!v_password){
        document.getElementById('e_password').innerHTML = "Password is not valid";
        error_res = true;
    }else{
        document.getElementById('e_password').innerHTML = "";
    }
    if (!v_repassword){
        document.getElementById('e_repassword').innerHTML = "Password is not valid";
        error_res = true;
    }else{
        document.getElementById('e_repassword').innerHTML = "";
    }
    if(password!=repassword){
        error_res=true;
        document.getElementById('e_repassword').innerHTML = "The password aren't equals";
    }else{
        document.getElementById('e_repassword').innerHTML = "";
    }


    
    $("#regForm").submit(function (e) {
        e.preventDefault();
        
        if(error_res == false){
            var data = {username: username, email: email, password: password};
            $.ajax({

                type: "POST",
                dataType: "JSON",
                url: amigable("?module=login&function=register"),
                data: data
            })
            .done(function(data){
                console.log(data);
                if (data=="success"){
                    toastr.success("Successfull register");
                    // window.location= "index.php?page=controller_login&op=login";
                }else{
                    alert("Error of register");
                }
            })
            .fail(function(){
                // alert("The user already exists");

            })
            
        }else{
            console.log("error validation");
            return false;
        }
      
    })
}
function validate_login(){
    var error_res = false;

    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    var v_username = validate_username(username);
    var v_password = validate_password(password);

    if (!v_username){
        document.getElementById('e_username').innerHTML = "Username is not valid";
        error_res = true;
    }else{
        document.getElementById('e_username').innerHTML = "";
    }
    if (!v_password){
        document.getElementById('e_password').innerHTML = "Password is not valid";
        error_res = true;
    }else{
        document.getElementById('e_password').innerHTML = "";
    }

    $("#logForm").submit(function (e) {
        e.preventDefault();
        if(error_res == false){
            var data = {username: username, password: password};
            $.ajax({

                type: "POST",
                dataType: "JSON",
                url: amigable("?module=login&function=login"),
                data: data
            })
            .done(function(data){
                console.log(data);
                MyPromise("POST", "module/cart/controller/controller_cart.php?op=getCart","JSON").then(function(data){
                    console.log(data);
                    cartAr=new Array();
                    QtyAr=new Array();

                    for (row in data){
                        cartAr.push(data[row].code);
                        QtyAr.push(data[row].quantity);
                    }
                    localStorage.setItem('cart', JSON.stringify(cartAr));
                    localStorage.setItem('qty', JSON.stringify(QtyAr));
                })
                .catch(function(error){
                    console.log(error);
                })
                .then(function(){
                    if(localStorage.getItem('purchase')==='on') {
                        window.location="index.php?page=controller_cart&op=list";
                        localStorage.removeItem('purchase');
                    }else{
                        window.location="index.php?page=controller_home&op=list";
                    }
                })
                
            })
            .fail(function(){

                alert("Invalid credentials");

            })
            
        }else{
            console.log("error validation");
            return false;
        }
      
    })
}

$(document).ready(function(){
    $('header').remove();
    $(document).on('click', '#linkReg', function(){
        setTimeout(window.location.href=amigable("?module=login&function=register_list"),1000);
    })
})