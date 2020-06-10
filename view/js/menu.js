function print_menu(user){
    if(user){
        $('<li></li>').attr({'class':"navbar-nav ml-auto"}).appendTo('#ulMenu').html (
            '<a class="nav-link" href="'+amigable("?module=profile&function=profile_list")+
            '" data-tr="">'+user[0].username+
            '<span class="sr-only">(current)</span>'+
            '</a>');

        $('<li></li>').attr({'class':"navbar-nav ml-auto"}).appendTo('#ulMenu').html (
            '<a style="cursor: pointer" id="logoutBtn" class="nav-link" data-tr="">Log Out'+
            '<span class="sr-only">(current)</span>'+
            '</a>');
        if(user[0].type=='admin'){
            $('<li></li>').attr({'class':"navbar-nav ml-auto"}).appendTo('#ulMenu').html (
                '<a class="nav-link" href="'+amigable("?module=wines&function=wines_list")+
                '" data-tr="">Create Wine'+
                '<span class="sr-only">(current)</span>'+
                '</a>');
        }
    }else{
        $('<li></li>').attr({'class':"navbar-nav ml-auto"}).appendTo('#ulMenu').html (
            '<a class="nav-link" href="'+amigable("?module=login&function=login_list")+
            '" data-tr="">Log In'+
            '<span class="sr-only">(current)</span>'+
            '</a>');
    }

}
function events(){
    $(document).on('click','#logoutBtn', function(){
        localStorage.removeItem('JWT');
        window.location.href=amigable("?module=home&function=home_list")
    })
}
$(document).ready(function(){
    MyPromise('POST',amigable("?module=login&function=return_user_token"),'JSON',{jwt:localStorage.getItem('JWT')})
    .then(function(data){
        console.log(data);
        print_menu(data);
    })
    .catch(function(error){
        console.log("error");
        print_menu(false);
    });
    events();
})
