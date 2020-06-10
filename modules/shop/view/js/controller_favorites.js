function look_fav(){

    $(document).on("click",".btn-fav" ,function() {
        const changeButton=$(this);
        var id = $(this).parent().attr("id");
        console.log(id);
        data={id:id, jwt: localStorage.getItem('JWT')};

        $.ajax({
            type:"POST",
            dataType:"JSON",
            url: amigable("?module=shop&function=look_favorites"),
            data: data
        })
        .done(function(data){
            console.log(data);

            if (data==true){
                changeButton.addClass('btn-fav-active');
            }else{
                changeButton.removeClass('btn-fav-active');
                }
        })
        .fail(function(){
            window.location.href=amigable("?module=login&function=login_list")
            console.log("Error of ajax");
        })
    })
}

function show_fav(){
    data={jwt: localStorage.getItem('JWT')};
    $.ajax({
        type:"POST",
        dataType:"JSON",
        url: amigable("?module=shop&function=save_favorites"),
        data: data
    })
    .done(function(data){
        for (row in data){
            // console.log(data[row]);
            $('#'+data[row].code).find('.btn-fav').addClass('btn-fav-active');
        }
    })
    .fail(function(error){
        console.log(error);
    })
}

$(document).ready(function(){
    look_fav();
    show_fav();
})