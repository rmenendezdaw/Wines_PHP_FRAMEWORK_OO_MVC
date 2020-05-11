function activity(){
    setInterval(function(){
        $.ajax({
            type:"GET",
            url: "module/login/controller/controller_login.php?op=activity"
        })
        .done(function(data){
            console.log(data);
            if(data=='inactive'){
                alert("The session has been closed for inactivity");
                logout();
            }
        })
        .fail(function(){

        })
    }, 10000)
}
function logout(){
    let result=save_cart();
    result.then(function(){
        $.ajax({
            type:"GET",
            url: "module/login/controller/controller_login.php?op=logout"
        })
        .done(function(data){
            console.log(data);
            localStorage.removeItem('cart');
            localStorage.removeItem('qty');
            window.location.href="index.php?page=controller_home&op=list";
    
        })
        .fail(function(){
            console.log('exit');
        })
    })

   
}

function regenerate(){
    setInterval(function(){
        $.ajax({
            type:"GET",
            url:"module/login/controller/controller_login.php?op=reg_session"
        })
        .done(function(data){
            console.log(data);

        })
        .fail(function(){
        })
    }, 10000)
}
$(document).ready(function(){
    console.log("regenerate");
    activity();
    regenerate();
    $('#logout').on('click',  function(){
        logout();
    })
})


