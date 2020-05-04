
function list_ajax(url){
    console.log(url);
    $.ajax({
        type: "POST",
        dataType: "JSON",
        url: url,
    })
    .done(function(data) {
        console.log(data);
        if (localStorage.getItem('type')){
            $('<div></div>').attr({'class':"title_type"})
            .appendTo('#title_type').html ('<p>'+localStorage.getItem('type')+' Wines</p>');
            for (row in data) {
            $('<div></div>').attr({'class':"prodiv", "style":"flex: 0 0 33.33333%;max-width:33.33333%; "})
            .appendTo('#prods').html ('<p class="prodcard" id="'+data[row].code+'">'
            +data[row].name+'<br>'+data[row].mark+'<br>'+data[row].year+'</p><hr>');
            $('<div></div>').attr({'class':"btn-fav"}).appendTo('#'+data[row].code).html('<svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M528.1 171.5L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6zM388.6 312.3l23.7 138.4L288 385.4l-124.3 65.3 23.7-138.4-100.6-98 139-20.2 62.2-126 62.2 126 139 20.2-100.6 98z"></path></svg>');
        }
            show_fav();
            localStorage.removeItem('type');
        
        }else {
            $('#prods').empty();
            for (row in data) {

                $('<div></div>').attr({'class':"prodiv", "style":"flex: 0 0 33.33333%;max-width:33.33333%; "})
                .appendTo('#prods').html ('<p class="prodcard" id="'+data[row].code+'">'
                +data[row].name+'<br>'+data[row].mark+'<br>'+data[row].year+'</p><hr>');
                $('<div></div>').attr({'class':"btn-fav"}).appendTo('#'+data[row].code).html('<svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="star" class="svg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M528.1 171.5L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6zM388.6 312.3l23.7 138.4L288 385.4l-124.3 65.3 23.7-138.4-100.6-98 139-20.2 62.2-126 62.2 126 139 20.2-100.6 98z"></path></svg>');
              }
              show_fav();
              console.log(data.length);

        }
        
        details_prod();
    })
    .fail(function() {
        console.log("fail");

    });
}

function list_prod(){
    list_ajax(amigable("?module=shop&function=product_list"));

}
function list_categories(){
        type = localStorage.getItem('type');
        list_ajax("module/shop/controller/controller_shop.php?op=list_cat&type="+type);
}
function details_ajax(url){
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: url,
    })
    .done(function(data) {
        console.log(data);
            $('#content').empty();
            $('<div></div>').attr('class','myh1').appendTo('#content').html(
                data.name+', '+data.mark
            );
          
            $('<div></div>').attr('id','details_prod').appendTo('#content');
            $('<div></div>').attr({'class':'div_details'}).appendTo('#details_prod').html(
                 '<img class="card-img-top" src="'+data.img_wine+'" />'
            );
            $('<div></div>').attr('id','detail').appendTo('.div_details').html(
                '<br><span>Name:   <span id="name">'+data.name+'</span></span></br>'+
                '<br><span>Mark:     <span id="mark">'+data.mark+'</span></span></br>'+
                '<br><span>Type:     <span id="type">'+data.type+'</span></span></br>'+
                '<br><span>Grades:     <span id="grades">'+data.grades+'</span></span></br>'+
                '<br><span>Origin:     <span id="origin">'+data.origin+'</span></span></br>'+
                '<br><span>Year:    <span id="year">'+data.year+'</span></span></br>'+
                '<br><span>Price:    <span id="price">'+data.price+'€</span></span></br>'+
                '<br><input type="button" id="'+data.code+'" class="addCart" value="Add to Cart" />'+
                '<select id="qty">'+
                '<option value="1">1</option>'+
                '<option value="2">2</option>'+
                '<option value="3">3</option>'+
                '</select>'
            );
            localStorage.removeItem('id');

        })
        .fail(function() {
            console.log("error");
        });
}
function details_prod(){
        $('#prods').on("click",".prodcard", function(even) {
         var id = this.getAttribute('id');
         console.log(even.target);
         if (!$(event.target).is('.btn-fav, svg , path')) {
            details_ajax("module/shop/controller/controller_shop.php?op=details_prod&modal=" + id);
        }
        });

}

function detail_carousel(){
    id = localStorage.getItem('id');
    details_ajax("module/shop/controller/controller_shop.php?op=details_prod&modal=" + id);
    // localStorage.removeItem('id');

}
function create_filters(){
    '<input type="button" id="btn-loadmap" value="Load Map">'
    $('<div></div>').attr({"name":"form_filters","class":"form_filters", "style":"float:left;"}).appendTo('#filters').html(
        );
    $('<button></button>').attr({'id': 'btn-loadmap'}).html('MAP').appendTo('.form_filters');
    $('<div></div>').attr({"class":"filter_mark"}).appendTo('.form_filters').html(
            '<h3>Mark</h3>'+
				'<input type="checkbox" id="mark" value="Verdana" class="check">Verdana</br>'+
				'<input type="checkbox" id="mark" value="Rioja" class="check">Rioja</br>'+
				'<input type="checkbox" id="mark" value="Rosen" class="check">Rosen</br>'+
				'<input type="checkbox" id="mark" value="Neho" class="check">Neho</br><hr>'
        );
    $('<div></div>').attr({"class":"filter_type"}).appendTo('.form_filters').html(
            '<h3>Type</h3>'+
				'<input type="checkbox" id="type" value="Red" class="check">Red</br>'+
				'<input type="checkbox" id="type" value="White" class="check">White</br>'+
				'<input type="checkbox" id="type" value="Pink" class="check">Pink</br><hr>'
        );
    $('<div></div>').attr({"class":"filter_year"}).appendTo('.form_filters').html(
            '<h3>Year</h3>'+
				'<input type="checkbox" id="year" value="1950-1970" class="check">1950-1970</br>'+
				'<input type="checkbox" id="year" value="1971-1990" class="check">1971-1990</br>'+
                '<input type="checkbox" id="year" value="1991-2000" class="check">1991-2000</br>'+
                '<input type="checkbox" id="year" value="2001-2020" class="check">2001-2020</br><hr>'
        );
    $('<div></div>').attr({"class":"button"}).appendTo('.form_filters').html(
           '<input type="button" value="Filter" id="send_filters">'+
           '<input type="button" value="Remove Filters" id="clear_filters">'
        );
        filter_query();

}
function filter_name(){
    type = localStorage.getItem('val');
    // console.log(type);
    list_ajax("module/shop/controller/controller_shop.php?op=list_cat&type="+type);
}
function filter_query(){
    count=0;
    checks="";

        $('.check').on("click", function(){
            console.log(this.getAttribute('id'));
            
            // if ($('#'+this.getAttribute('id')).is (':checked')){ 
                if (count==0){
                    checks='WHERE ' +  this.getAttribute('id') + '="'+this.getAttribute('value')+'"';
                    count++; 
                    console.log(checks);
                }else{
                    checks=checks + ' OR ' +  this.getAttribute('id') + '="'+this.getAttribute('value')+'"';
                }
                
                if ($('#'+this.getAttribute('id')).is(':checked')){ 

                    
                    if (count==0){
                        checks= checks.replace(/'WHERE  '+ this.getAttribute('id') + "='"+this.getAttribute('value')+"'"/g, "");
                        count++; 
                        console.log(checks);
                    }else{
                        checks=checks.replace(/"OR " +  this.getAttribute('id') + "='"+this.getAttribute('value')+"'"/g, "");
                }

            }
        });
       
        $(document).on("click", '#send_filters',function(){
            console.log(checks);
            $('#prods').empty();
            list_ajax("module/shop/controller/controller_shop.php?op=filter&checks="+checks);
        });
        $(document).on("click", '#clear_filters',function(){
            console.log(checks);
                $(".check").prop('checked', false);
                checks="";
                count=0;
            
        });

    
}

function map(){
    $(document).on("click", '#btn-loadmap',function() {

    var markers = [];
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: "module/shop/controller/controller_shop.php?op=map",
    })
    .done(function(data) {
        console.log(data);
        $('<div></div>').attr({'id': 'container-map'}).appendTo('#modal_map').hide().html();
        var map = new google.maps.Map(document.getElementById('container-map'), {
            zoom: 10,
            center: new google.maps.LatLng(39.922505, -3.844235),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        var infowindow = new google.maps.InfoWindow();
    
        for (var i = 0; i < data.length; i++) {
            console.log(data[i].name);

            var newMarker = new google.maps.Marker({
                position: new google.maps.LatLng(data[i].latitude, data[i].longitude),
                map: map,
                title: data[i].name
            });
    
            google.maps.event.addListener(newMarker, 'click', (function (newMarker, i) {
                return function () {
                    infowindow.setContent(data[i].name);
                    infowindow.open(map, newMarker);
                }
            })(newMarker, i));
    
            markers.push(newMarker);
        }
        modal_map();
    })
    .fail(function() {
        console.log("fail");

});
    });
  
}

function modal_map(){
                $("#details_map").show();
                $("#container-map").dialog({
                    title:"Map",
                    width: 850, //<!-- ------------- ancho de la ventana -->
                    height: 500, //<!--  ------------- altura de la ventana -->
                    resizable: "false", //<!-- ------ fija o redimensionable si ponemos este valor a "true" -->
                    modal: "true", //<!-- ------------ si esta en true bloquea el contenido de la web mientras la ventana esta activa (muy elegante) --> modal: "true", //<!-- ------------ si esta en true bloquea el contenido de la web mientras la ventana esta activa (muy elegante) -->
                    buttons: {
                        Ok: function () {
                            $(this).dialog('close');
                        }
                    },
                    show: {
                        effect: "blind",
                        duration: 1000
                    },
                    hide: {
                        effect: "explode",
                        duration: 1000
                    }
                });
}
function demand_name(){
     var val = localStorage.getItem('val');
    var type = localStorage.getItem('type_search');
    var mark = localStorage.getItem('mark');
    list_ajax("module/shop/controller/controller_shop.php?op=demand_name&val="+val+"&type="+type+"&mark="+mark);
    localStorage.removeItem('type_search');
              localStorage.removeItem('val');
              localStorage.removeItem('mark');
}
function add_visited(){
    $(document).on("click", '.prodcard',function(){
        id = this.getAttribute('id');
        console.log(id);
        $.ajax({
            type: "GET",
            dataType: "JSON",
            url: "module/shop/controller/controller_shop.php?op=visited&id="+id,
        })
        .done(function(data) {
            console.log(data);
        })
        .fail(function() {
            console.log("fail");
    
        });

    });
}

// function scroll_cat(){
//     $(document).on("scroll", function() {
//         if($(window).scrollTop() === ($(document).height()-$(window).height())){
//             var num=($('.prodiv').length);
//             list_ajax("module/shop/controller/controller_shop.php?op=list_all&num="+num);

//         }    
//     });
// }
function Pagination(){
    var totalPages=0;

    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: "module/shop/controller/controller_shop.php?op=count_pagination",
    })
    .done(function(data) {
        // console.log(data[0].total);
        for(i=0;i<data[0].total;i++){
            // console.log("data");
            if (i % 10 == 0){
            totalPages=totalPages+1;
            }
        }
        
        $("#pagination").bootpag({
            total: totalPages,
            page: 1,
            maxVisible: 3,
            next: ' next',
            prev: 'prev '
        }).on("page", function (event, num) {
            item_num=(num-1) * 10;
            console.log(item_num);
            $.ajax({
                type: "GET",
                dataType: "JSON",
                url: "module/shop/controller/controller_shop.php?op=pagination&item_num="+item_num,
            })
            .done(function(data) {
                    console.log(data);
                    list_ajax("module/shop/controller/controller_shop.php?op=pagination&item_num="+item_num);

            })
            .fail(function() {
                console.log("fail");
        
            });
        });
    })
    .fail(function() {
        console.log("fail");
    });
}

$(document).ready(function(){
    
    list_prod();

    // add_visited();
    // if (localStorage.getItem('type')){
    //     list_categories();
    //     map();
    //     create_filters();
    //     // Pagination();
    // }else if(localStorage.getItem('id')){ 
    //     detail_carousel();
    // }else if(localStorage.getItem('val')||localStorage.getItem('type_search')||localStorage.getItem('mark')) { 
    //     map();
    //     create_filters();
    //     demand_name();
    //     Pagination();
    // }else{
    //     // scroll_cat();
    //     list_prod();
    //     map();
    //     create_filters();
    //     Pagination();
    // }
});