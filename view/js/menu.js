$(document).ready(function(){
    MyPromise('POST',amigable("?module=login&function=return_user_token"),'JSON',{jwt:localStorage.getItem('JWT')})
    .then(function(data){
        console.log(data);
        if(data['type']=='user'){
            
        }
    })
    .catch(function(error){
        console.log(error);
    });
})