function carousel(){
    $.ajax({

        type: "POST",
        dataType: "JSON",
        url: amigable("?module=home&function=load_slider")
    })
    .done(function(data) {
        // console.log(data);
        for (row in data) {
            // console.log(data[row].code);
            if (row == 0) {
                $('<div></div>').attr({'class':"carousel-item active",
                "style":"background-image: url(http://localhost/Wines_PHP_FRAMEWORK_OO_MVC/"+data[row].img_wine+");height:100%;background-size: cover;background-position: center center;"}).appendTo('.carousel-inner').html (
                    '<h2 id="'+data[row].code+'" class="img-text">'+data[row].name+'<br>'+data[row].year+'</h2>');
        
            }else {
            $('<div></div>').attr({'id':+data[row].code,'class':"carousel-item", "style":"background-image: url(http://localhost/Wines_PHP_FRAMEWORK_OO_MVC/"+data[row].img_wine+");height:100%;background-size: cover;background-position: center center;"}).appendTo('.carousel-inner').html (
                '<h2 id="'+data[row].code+'" class="img-text">'+data[row].name+'<br>'+data[row].year+'</h2>');
            //  $('<div></div>').attr({'id':"catdiv", "style":"flex: 0 0 33.33333%;max-width:33.33333%;"}).appendTo('#main_contents').html ('<a href="" class="card">'+data[row].img_wine+'</a> ');
            }
            show_details_carousel();
        }
})
    .fail(function() {
        console.log("Fail from Ajax");
});

}
function Type_cat(limit){
data= {"data":limit};
$.ajax({

    type: "POST",
    dataType: "JSON",
    async: false,
    data: data,
    url: amigable("?module=home&function=load_categories")
})
.done(function(data) {
    console.log(data);
    for (row in data) {
      $('<div></div>').attr({'id':data[row].type,'class':"catdiv",
       "style":"flex: 0 0 33.33333%;max-width:33.33333%; background-image: url(http://localhost/Wines_PHP_FRAMEWORK_OO_MVC/"+data[row].img+");"
    }).appendTo('#main_contents').html ('<p class="intdiv">'+data[row].type+'</p> ');
    }
    categories();
})
.fail(function() {
});

}

function show_details_carousel(){
$('.img-text').on("click", function() {
    id = this.getAttribute('id');
    // console.log(type);
    localStorage.setItem('id', id);
    setTimeout(window.location.href="index.php?page=controller_shop&op=list",1000);
});
}
function categories (){
$('.catdiv').on("click", function() {
    type = this.getAttribute('id');
    // console.log(type);
    localStorage.setItem('type', type);
    // setTimeout(window.location.href="index.php?page=controller_shop&op=list",1000);
});
}

function scroll_cat(){

$(document).on("scroll", function() {
    var top=$(window).scrollTop();
    var height=$(document).height()-$(window).height();
    if( top === height){
        console.log($('.catdiv').length);
        Type_cat($('.catdiv').length);
    }    
});
}
// function count_cat(){
// $.ajax({

//     type: "GET",
//     dataType: "JSON",
//     url: "module/home/controller/controller_home.php?op=type_cat&num="+num,
// })
// .done(function(data) {
//     console.log(data);
//     for (row in data) {

//       $('<div></div>').attr({'id':data[row].type,'class':"catdiv",
//        "style":"flex: 0 0 33.33333%;max-width:33.33333%; background-image: url("+data[row].img+");"
//     }).appendTo('#main_contents').html ('<p class="intdiv">'+data[row].type+'</p> ');
//     }
//     categories();
// })
// .fail(function() {
// });

// }
function add_visited(){
$(document).on("click", '.catdiv',function(){
    id = this.getAttribute('id');
    console.log(id);
    $.ajax({
        type: "POST",
        dataType: "JSON",
        data: {"code": id},
        url: amigable("?module=home&function=add_visit")
    })
    .done(function(data) {
        console.log(data);
        localStorage.setItem('type', id);
    })
    .fail(function() {
        console.log("fail");

    });

});
}
function moreRelated(){

$.ajax({
    type: "GET",
    dataType: "JSON",
    url: "https://www.googleapis.com/books/v1/volumes?q=star%20wars",
})
.done(function(data) {
    for(i=0;i<data.items.length;i++){
    // console.log(data.items[i].volumeInfo.title);

        $('<div></div>').attr({"id":"relateDiv","style":"flex: 0 0 33.33333%;max-width:33.33333%;"}).appendTo('#related').html(
            '<p class="relateDiv" >'+data.items[i].volumeInfo.title+'</p>'
        );
    }
})
.fail(function() {
    console.log("fail");

});
}
$(document).ready(function(){

add_visited();
carousel();
Type_cat(0);
scroll_cat();
moreRelated();
});