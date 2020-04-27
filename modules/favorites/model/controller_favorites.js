function look_fav(){

    $(document).on("click",".btn-fav" ,function() {
        const changeButton=$(this);
        var id = $(this).parent().attr("id");
        console.log(id);
        data={id:id};

        $.ajax({
            type:"POST",
            dataType:"JSON",
            url: "module/favorites/controller/controller_favorites.php?op=look_fav",
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
            window.location.href="index.php?page=controller_login&op=login"
            console.log("Error of ajax");
        })
    })
}

function show_fav(){
    $.ajax({
        type:"POST",
        dataType:"JSON",
        url: "module/favorites/controller/controller_favorites.php?op=select_fav",
    })
    .done(function(data){
        for (row in data){
            console.log(data[row]);
            $('#'+data[row].code).find('.btn-fav').addClass('btn-fav-active');
        }
    })
}

$(document).ready(function(){
    look_fav();
})